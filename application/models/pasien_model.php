<?php

class pasien_model extends CI_Model {

	var $table = 'pasien';

	public function pasien_add($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_nama();
	}


	public function get_all_pasien() {
		$this->db->from('pasien');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_by_username($username) {
		$this->db->from($this->table);
		$this->db->where('username', $username);
		$query = $this->db->get();
		return $query->row();
	}

	public function pasien_update($where, $data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affeccted_rows();

	}
	
} 