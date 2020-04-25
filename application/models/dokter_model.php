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
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        
 
        $this->db->set('nama', $nama);
        $this->db->set('jeniskelamin', $jeniskelamin);
        $this->db->set('alamat', $alamat);
        $this->db->set('spesialis', $spesialis);
        $this->db->set('email', $email);
        $this->db->set('telp', $telp);
        $this->db->set('username', $username);
        $this->db->set('password', $password);
        $result=$this->db->update('dokter');
        return $result;
    }
 
    function delete_data(){
        $nama=$this->input->post('nama');
        $this->db->where('nama', $nama);
        $result=$this->db->delete('dokter');
        return $result;
    }
     
}