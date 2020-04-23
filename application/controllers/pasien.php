 <?php

 class pasien extends CI_Controller {

 	public function __construct() {
 		parent::__construct();
 		$this->load->model('pasien_model');
 	}

 	public function index() {
 		$data['pasien'] = $this->pasien_model->get_all_pasien();
 		$this->load->view('pasien/V_KelolaPasien', $data);  
 	}

 	public function pasien_add() {
 		$data = array(
 			'nama' => $this->input->post('nama'),
 			'jeniskelamin' => $this->input->post('jeniskelamin'),
 			'alamat' => $this->input->post('alamat'),
 			'email' => $this->input->post('email'),
 			'telp' => $this->input->post('telp'),
			'username' => $this->input->post('username'),
 			'password' => $this->input->post('password'),
 		);

		$insert = $this->pasien_model->pasien_add($data);
 		echo json_encode(array("status" => true));

 	}

 	public function ajax_edit($username) {
 		$data = $this->pasien_model->get_by_username($username);
 		echo json_encode($data);
 	}

 	public function pasien_update() {
 		$data = array(
 			'nama' => $this->input->post('nama'),
 			'jeniskelamin' => $this->input->post('jeniskelamin'),
 			'alamat' => $this->input->post('alamat'),
 			'email' => $this->input->post('email'),
 			'telp' => $this->input->post('telp'),
			'username' => $this->input->post('username'),
 			'password' => $this->input->post('password'),
 		);
 		$this->pasien_model->dokter_update(array('username'=> $this->input->post('username')), $data);

 		echo json_encode(array("status" => TRUE));
 	}

} 