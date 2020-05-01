<?php
class dokter_model extends CI_Model{
 
    function dokter_data(){
    	$hasil=$this->db->get('dokter');
        return $hasil->result();
    }
 
    function save_data(){
        $data = array(
                'nama' => $this->input->post('nama'),
                'jeniskelamin' => $this->input->post('jeniskelamin'),
                'alamat' => $this->input->post('alamat'),
                'spesialis'=> $this->input->post('spesialis'),
                'email' => $this->input->post('email'),
                'telp' => $this->input->post('telp'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),

            
            );
        $result=$this->db->insert('dokter',$data);
        return $result;
    }
 
    function update_data(){
        $nama=$this->input->post('nama');
        $jeniskelamin=$this->input->post('jeniskelamin');
        $alamat=$this->input->post('alamat');
        $spesialis=$this->input->post('spesialis');
        $email=$this->input->post('email');
        $telp=$this->input->post('telp');
 
        $this->db->set('nama', $nama);
        $this->db->set('jeniskelamin', $jeniskelamin);
        $this->db->set('alamat', $alamat);
        $this->db->set('spesialis', $spesialis);
        $this->db->set('email', $email);
        $this->db->set('telp', $telp);
        $this->db->where('username',$this->session->userdata('session_username'));
        $result=$this->db->update('dokter');
        return $result;
    }
 
    function delete_data(){
        $this->db->where('username',$this->session->userdata('session_username'));
        $result=$this->db->delete('dokter');
        return $result;
    }
     
    public function get_all_dokter() {
		$this->db->from('dokter');
		$query = $this->db->get();
		return $query->result();
	}

    public function get_by_username($username) {
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query->result_array();
    }
}