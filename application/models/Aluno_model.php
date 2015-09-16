<?php

class Aluno_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert($data) {
        return $this->db->insert('aluno', $data);
    }

	function retrieve() {
		$query = $this->db->get('aluno');
		return $query->result();
	}

    function update($data) {
        $this->db->where('id_aluno', $data['id']);
        $this->db->set($data);
        return $this->db->update('aluno');
    }

    function delete($id) {
        $this->db->where('id_aluno', $id);
        return $this->db->delete('aluno');
    }
}