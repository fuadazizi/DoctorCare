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
		$data['jadwal_kosong'] = $this->M_Dokter->getAllDokter();
		if ($this->input->post('keyword')) {
			$data['mahasiswa'] = $this->M_Dokter->cariDataDokter();
		}
		$this->load->view('template/navbar', $data);
		$this->load->view('dokter/V_UtamaDokter', $data);
		$this->load->view('template/footer');
	}

	public function V_lihatJadwalKosong()
	{
		$id = $this->session->userdata['session_username'];
		$data['jadwal_kosong'] = $this->M_Dokter->getDokterByUs($id);
		$this->load->view('Dokter/V_lihatJadwalKosong', $data);
		$this->load->view('template/back');
	}
	
	public function V_tambah()
	{
		$data['judul'] = 'Form Tambah Jadwal Kosong';
		//from library form_validation, set rules for Usernama_Dokter, email = required
		$this->form_validation->set_rules('Username_Dokter','warning','required');
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
	}
	public function V_hapus()
	{
		$id = $this->session->userdata['session_username'];
		$data['jadwal_kosong'] = $this->M_Dokter->getAllJadwalKosong();
		$this->load->view('Dokter/V_hapus', $data);
		//call method hapusDataDokter with parameter id from M_Dokter
		$this->M_Dokter->hapusJadwalKosong($id);
		//use flashdata to show alert "dihapus"
		$this->session->set_flashdata('flash','dihapus');
		//back to controller C_Dokter
		$this->load->view('template/back');
	}
	public function V_ubah()
	{
		$id = $this->session->userdata['session_username'];
		$data['judul'] = 'Form Ubah Jadwal Kosong';
		$data['jadwal_kosong'] = $this->M_Dokter->getJadwalKosongById($id);
		//from library form_validation, set rules for Username_Dokter, Usernama_Dokter, jam = required
		$this->form_validation->set_rules('Username Dokter','warning','required');
		$this->form_validation->set_rules('jam','warning','required');
		//conditon in form_validation, if user input form = false, then load page "ubah" again
		if ($this->form_validation->run() == false){
			$this->load->view('template/navbar', $data);
			$this->load->view('Dokter/V_ubah', $data);
			$this->load->view('template/footer');
		}else{
			$this->M_Dokter->ubahJadwalKosong($id);
			$this->session->set_flashdata('flash','data changed successfully');
			$this->V_lihatJadwalKosong();
			//$this->index();
		}
		$this->load->view('template/back');
		//else, when successed {
		//call method "ubahDataDokter" in M_Dokter
		//use flashdata to to show alert "data changed successfully"
		//back to controller C_Dokter }
	}
}