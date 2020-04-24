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
		/*$temp = $this->input->post('jadwal'),true);
		$jam = substr($temp, 0,9); //mengambil data jam
		$Tanggal = substr($temp,17,21); //mengambil data tanggal

		$i = strlen($temp)-2;
		while (substr($temp, $i,$i-1) != "(") {
			$i=$i-1;
		}
		$uname_dokter = substr($temp, $i+1,strlen($temp)-2)*/
		$data = [
			"Username_Pasien" => $this->session->userdata('session_nama'),
			"Username_Dokter" => $this->input->post('username', true),
			"jam" => $this->input->post('jam', true),
			"Tanggal" => $this->input->post('Tanggal', true),
			"Penyakit" => $this->input->post('Penyakit', true),
		];

		//use query builder to insert $data to table "jadwaltemu"
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

	public function ubahJadwalTemu($id)
	{
		$data = [
			"Username_Pasien" => $this->session->userdata('session_name'),
			"Username_Dokter" => $this->input->post('Username_Dokter', true),
			"jam" => $this->input->post('jam', true),
			"Tanggal" => $this->input->post('Tanggal', true),
			"Penyakit" => $this->input->post('Penyakit', true),
		];
		//use query builder class to update data jadwaltemu based on id
		$this->db->where('id',$id);
		$this->db->update('jadwaltemu',$data);
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
}
