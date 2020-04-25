<?php
class M_Pasien extends CI_model
{
	public function getAllJadwalTemu()
	{
		//use query builder to get data table "jadwaltemu"
		return $this->db->get('jadwaltemu')->result_array();
	}
	public function tambahJadwalTemu()
	{
		$data = [
			"Username_Pasien" => $this->session->userdata('session_username'),
			"Username_Dokter" => $this->input->post('username', true),
			"jam" => $this->input->post('jam', true),
			"Tanggal" => $this->input->post('Tanggal', true),
			"Penyakit" => $this->input->post('Penyakit', true),
		];
		$this->db->insert('jadwaltemu',$data);
	}
	public function hapusJadwalTemu($id)
	{
		//use query builder to delete data based on id 
		$this->db->where('id',$id);
		$this->db->delete('jadwaltemu');

	}
	public function getJadwalTemuById($id)
	{
		//get data jadwaltemu based on id 
		$this->db->where('id',$id);
	}

	public function ubahJadwalTemu()
	{
		$data = [
			"id" => $this->input->post('id',true),
			"Username_Pasien" => $this->session->userdata('session_username'),
			"Username_Dokter" => $this->input->post('Username_Dokter'),
			"jam" => $this->input->post('jam', true),
			"Tanggal" => $this->input->post('Tanggal', true),
			"Penyakit" => $this->input->post('Penyakit', true),
		];
		$query = "UPDATE jadwaltemu SET 
									jam = '".$data['jam']."',
									Tanggal = '".$data['Tanggal']."',
									Penyakit = '".$data['Penyakit']."'
				  WHERE id = ".$data['id'];
		return $this->db->query($query);
	}
	public function cariJadwalTemu()
	{
		$keyword = $this->input->post('keyword', true);
		//use query builder class to search data jadwaltemu based on keyword "Usernama_Pasien" or "Usernmae_Dokter" or "jam" 
		$this->db->like('Username_Pasien',$keyword);
		$this->db->or_like('Username_Dokter',$keyword);
		$this->db->or_like('jam',$keyword);
		$this->db->or_like('Tanggal',$keyword);
		return $this->db->get('jadwaltemu')->result_array();
		//return data jadwaltemu that has been searched
	}

	public function JadwalTemu_list()
	{
		$result = $this->db->query("SELECT * FROM jadwaltemu join dokter on dokter.username = jadwaltemu.Username_Dokter");
        //$result=$this->db->get('jadwaltemu');
        return $result->result_array();
	}
}
