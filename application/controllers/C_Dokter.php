<?php
class C_Dokter extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//load model "M_Dokter"
		$this->load->model('M_Dokter');
		//load library form validation
		$this->load->library('form_validation');
	}
       
        
	public function index()
	{
		$data['judul'] = 'Selamat datang Dokter';
		$data['jadwal_kosong'] = $this->M_Dokter->getAllJadwalKosong();
		if ($this->input->post('keyword')) {
			$data['mahasiswa'] = $this->M_Dokter->cariJadwalKosong();
		}
		$this->load->view('template/navbar', $data);
		$this->load->view('dokter/V_UtamaDokter', $data);
		$this->load->view('template/footer');
	}

	public function getData(){
		include 'connect.php';
		$id=$this->session->userdata('session_username');
    	$queryResult = mysqli_query($connect,"SELECT * FROM jadwal_kosong join dokter on (dokter.username = jadwal_kosong.Username_Dokter) WHERE Username_Dokter='$id'");
		$result 	 = array();
		while($fethData=$queryResult->fetch_assoc()){
			$result[]=$fethData;
		}
		echo json_encode($result);
	}

	public function updateData(){
		include 'connect.php';

		$idjadwal =$_POST["idjadwal"];
		$result = array();
		$queryResult = mysqli_query($connect,"SELECT * FROM jadwal_kosong WHERE idjadwal=".$idjadwal);
		$fetchData = $queryResult->fetch_assoc();

		$result=$fetchData;
		echo json_encode($result);
	}

	public function doUpdateData(){
		include 'connect.php';

		$result['message']=" ";

		$idjadwal=$_POST["idjadwal"];
		$jam=$_POST['jam'];
		$Tanggal=$_POST['Tanggal'];

		if($jam==""){
			$result["mesagge"]="Jam must be filled!";
		}else if($Tanggal=""){
			$result["message"]="Tanggal must be filled!";
		}else{
			$queryResult=mysqli_query($connect,"UPDATE jadwal_kosong SET jam='".$jam."',Tanggal='".$Tanggal."' WHERE idjadwal=".$idjadwal);
			if($queryResult){
				$result["message"]="SUCCESS!";
			}else{
				$result["message"]="FAILED!";
			}
		}
		echo json_encode($result);
	}

	public function ViewData(){
		$this->load->view('Dokter/V_ubah',);
	}

	public function V_lihatJadwalKosong()
	{
		$data['jadwal_kosong'] = $this->M_Dokter->getJadwalKosongByUsername();
		$this->load->view('Dokter/V_lihatJadwalKosong', $data);
	}
	
	public function V_tambah()
	{
		$data['judul'] = 'Form Tambah Jadwal Kosong';
		//from library form_validation, set rules for Usernama_Dokter, email = required
		$this->form_validation->set_rules('jam','warning','required');
		$this->form_validation->set_rules('Tanggal','warning','required');
		//conditon in form_validation, if user input form = false, then load page "tambah" again
		if ($this->form_validation->run() == false){
			$this->load->view('dokter/V_tambah', $data);
			$this->session->set_flashdata('flash','added failed');
		}else{
			$this->M_Dokter->tambahJadwalKosong();
			$this->session->set_flashdata('flash','added success');
			$this->V_lihatJadwalKosong();
			//$this->index();
		}
		//else, when successed {
		//call method "tambahJadwalKosong" in M_Dokter
		//use flashdata to to show alert "added success"
		//back to controller C_Dokter }
	}
	public function V_hapus()
	{

		$this->load->view('Dokter/V_hapus',);
		//call method hapusJadwalKosong with parameter id from M_Dokter
		//back to controller C_Dokter
	}
	//public function V_ubah()
	//{
		//$id = $this->session->userdata['session_username'];
		//from library form_validation, set rules for  Usernama_Dokter, jam = required
		//conditon in form_validation, if user input form = false, then load page "ubah" again
		//$data['jadwal_kosong'] = $this->M_Dokter->tampil_data();
		//$this->load->view('Dokter/V_ubah', $data);
			//$this->index();
		
		//else, when successed {
		//call method "ubahJadwalKosong" in M_Dokter
		//use flashdata to to show alert "data changed successfully"
		//back to controller C_Dokter }
	//}
	    public function create()
    {
        // load model dan form helper
        $this->load->model('M_Dokter');
        $this->load->helper('form_helper');	
        $this->load->view('V_lihatJadwalKosong', $data);
    }
}