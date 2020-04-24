<?php
class M_Dokter extends CI_model
{

	// get data dropdown
    
	public function getAllJadwalKosong()
	{
		//use query builder to get data table "jadwal_kosong"
		$this->db->select('idjadwal', 'Username_Dokter', 'nama', 'jam','tanggal');
		$this->db->from('jadwal_kosong');
		$this->db->join('dokter', 'jadwal_kosong.Username_Dokter = dokter.username', 'inner');
		return $this->db->get('jadwal_kosong')->result_array();
	}

	public function getJadwalKosongByUsername() {
		$username = $this->session->userdata('session_username');
		return $this->db->from('jadwal_kosong')->where('Username_Dokter',$username)->get()->result_array();
	}

	public function tambahJadwalKosong()
	{
		$data = [
			"Username_Dokter" => $this->session->userdata('session_username'),
			"jam" => $this->input->post('jam', true),
			"Tanggal" => $this->input->post('Tanggal', true),
		];

		//use query builder to insert $data to table "jadwal_kosong"
		$this->db->insert('jadwal_kosong',$data);
	}
	public function hapusJadwalKosong($id)
	{
		//use query builder to delete data based on id 
		$this->db->where('id',$id);
		$this->db->delete('jadwal_kosong');

	}
	public function getJadwalKosongById($id)
	{
		//get data jadwal_kosong based on id 
		$this->db->from('jadwal_kosong')->where('Username_Dokter',$id)->get()->result_array();
	}

	public function ubahJadwalKosong($id)
	{
		$data = [
			"Username_Dokter" => $this->input->post('Username_Dokter', true),
			"jam" => $this->input->post('jam', true),
			"Tanggal" => $this->input->post('Tanggal', true)
		];
		//use query builder class to update data jadwal_kosong based on id
		$this->db->where('Username_Dokter',$id);
		$this->db->update('jadwal_kosong',$data);
	}
	public function cariJadwalKosong()
	{
		$keyword = $this->input->post('keyword', true);
		//use query builder class to search data jadwal_kosong based on keyword "Usernmae_Dokter" or "jam" or "tanggal" 
		$this->db->or_like('Username_Dokter',$keyword);
		$this->db->or_like('jam',$keyword);
		$this->db->or_like('Tanggal',$keyword);
		return $this->db->get('jadwal_kosong')->result_array();
		//return data jadwal_kosong that has been searched
	}
}