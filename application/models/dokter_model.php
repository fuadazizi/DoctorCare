<?php

class dokter_model extends CI_Model {

	var $data = 'dokter';
	var $table = 'dokter';

	public function dokter_add($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_nama();
	}


	public function get_all_dokter() {
		$this->db->from('dokter');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_by_username($username) {
		$this->db->from($this->table);
		$this->db->where('username', $username);
		$query = $this->db->get();
		return $query->row();
	}

	public function dokter_update($where, $data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affeccted_rows();

	}
	
} 