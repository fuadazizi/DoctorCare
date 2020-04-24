<?php
class C_Pasien extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//load model "M_Pasien"
		$this->load->model('M_Pasien');
		$this->load->model('M_Dokter');
		//load library form validation
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['judul'] = 'Selamat datang Pasien';
		$data['jadwaltemu'] = $this->M_Pasien->getAllJadwalTemu();
		if ($this->input->post('keyword')) {
			$data['mahasiswa'] = $this->M_Pasien->cariJadwalTemu();
		}
		$this->load->view('template/navbar', $data);
		$this->load->view('pasien/V_UtamaPasien', $data);
		$this->load->view('template/footer');
	}

	public function V_LihatJadwalTemu()
	{
		$data['jadwaltemu'] = $this->M_Pasien->getAllJadwalTemu();
		$this->load->view('Pasien/V_LihatJadwalTemu', $data);
	}
	
	public function V_tambah()
	{
		//from library form_validation, set rules for Usernama_Pasien, Username_Dokter, email = required
		$this->form_validation->set_rules('Penyakit','warning','required');
		//conditon in form_validation, if user input form = false, then load page "tambah" again
		if ($this->form_validation->run() == false){
			$this->load->view('pasien/V_tambah');
		}else{
			$this->M_Pasien->tambahJadwalTemu();
			$this->session->set_flashdata('flash','added success');
			$this->V_LihatJadwalTemu();
			//$this->index();
		}
		//else, when successed {
		//call method "tambahDataPasien" in M_Pasien
		//use flashdata to to show alert "added success"
		//back to controller C_Pasien }
	}

	public function V_hapus()
	{
		$data['jadwaltemu'] = $this->M_Pasien->getAllJadwalTemu();
		$this->load->view('Pasien/V_hapus', $data);
		//call method hapusDataPasien with parameter id from M_Pasien
		$this->M_Pasien->hapusJadwalTemu($id);
		//use flashdata to show alert "dihapus"
		$this->session->set_flashdata('flash','dihapus');
		//back to controller C_Pasien
	}

	public function V_ubah()
	{
		$id = $this->session->userdata['session_username'];
		$data['judul'] = 'Form Ubah Jadwal Temu';
		$data['jadwaltemu'] = $this->M_Pasien->getJadwalTemuById($id);
		//from library form_validation, set rules for Username_Pasien, Usernama_Dokter, jam = required
		$this->form_validation->set_rules('Username Pasien','warning','required');
		$this->form_validation->set_rules('Username Dokter','warning','required');
		$this->form_validation->set_rules('jam','warning','required');
		//conditon in form_validation, if user input form = false, then load page "ubah" again
		if ($this->form_validation->run() == false){
			$this->load->view('template/navbar', $data);
			$this->load->view('Pasien/V_ubah', $data);
		}else{
			$this->M_Pasien->ubahJadwalTemu($id);
			$this->session->set_flashdata('flash','data changed successfully');
			$this->V_LihatJadwalTemu();
			//$this->index();
		}
		//else, when successed {
		//call method "ubahDataPasien" in M_Pasien
		//use flashdata to to show alert "data changed successfully"
		//back to controller C_Pasien }
	}
	public function getData(){
		include 'connect.php';
		$id=$this->session->userdata('session_nama');
    	$queryResult = mysqli_query($connect,"SELECT idjadwal, Username_Dokter, nama, jam, tanggal from jadwal_kosong join dokter on jadwal_kosong.Username_Dokter = dokter.username");
		$result 	 = array();
		while($fethData=$queryResult->fetch_assoc()){
			$result[]=$fethData;
		}
		echo json_encode($result);
	}

	public function fetchData(){
		include 'connect.php';

		$idjadwal =$_POST["idjadwal"];
		$result = array();
		$queryResult = mysqli_query($connect,"SELECT idjadwal, Username_Dokter, nama, jam, tanggal from jadwal_kosong join dokter on jadwal_kosong.Username_Dokter = dokter.username WHERE idjadwal=".$idjadwal);
		$fetchData = $queryResult->fetch_assoc();

		$result=$fetchData;
		echo json_encode($result);
	}
}
