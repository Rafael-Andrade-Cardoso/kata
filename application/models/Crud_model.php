<?php

class Crud_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function retrieve($where) {
        if ($id == null){
            $query = $this->db->get('aluno');
        } else {
            $query = $this->db->where($where);
            $query = $this->db->get('aluno');
        }
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