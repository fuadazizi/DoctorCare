 <?php

 class dokter extends CI_Controller {

 	public function __construct() {
 		parent::__construct();
 		$this->load->model('dokter_model');
 	}

 	public function index() {
 		$username = $this->session->userdata('session_username');
 		$data['dokter'] = $this->dokter_model->get_all_dokter();
 		$this->load->view('dokter/V_KelolaDokter', $data);  
 	}

 	public function dokter_add() {
 		$data = array(
 			'nama' => $this->input->post('nama'),
 			'jeniskelamin' => $this->input->post('jeniskelamin'),
 			'alamat' => $this->input->post('alamat'),
 			'spesialis' => $this->input->post('spesialis'),
 			'email' => $this->input->post('email'),
 			'telp' => $this->input->post('telp'),
			'username' => $this->input->post('username'),
 			'password' => $this->input->post('password'),
 		);

		$insert = $this->dokter_model->dokter_add($data);
 		echo json_encode(array("status" => true));

 	}

 	public function ajax_edit($username) {
 		$data = $this->dokter_model->get_by_username($username);
 		echo json_encode($data);
 	}

 	public function dokter_update() {
 		$data = array(
 			'nama' => $this->input->post('nama'),
 			'jeniskelamin' => $this->input->post('jeniskelamin'),
 			'alamat' => $this->input->post('alamat'),
 			'spesialis' => $this->input->post('spesialis'),
 			'email' => $this->input->post('email'),
 			'telp' => $this->input->post('telp'),
 		);
 		$this->dokter_model->dokter_update(array('username'=> $this->input->post('username')), $data);
 		echo json_encode(array("status" => TRUE));
 	}
} 