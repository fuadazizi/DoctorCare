<?php
class dokter extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('dokter_model');
    }
    function index(){
        $this->load->view('dokter/V_KelolaDokter');
    }
 
    function akun_data($username){
        $data=$this->dokter_model->dokter_data($username);
        echo json_encode($data);
    }
 
    function save(){
        $data=$this->dokter_model->save_data();
        echo json_encode($data);
    }
 
    function update(){
        $data=$this->dokter_model->update_data();
        echo json_encode($data);
    }
 
    function delete(){
        $data=$this->dokter_model->delete_data();
        echo json_encode($data);
    }
 
}