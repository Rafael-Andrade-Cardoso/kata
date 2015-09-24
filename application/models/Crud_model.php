<?php

class Crud_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->db->trans_strict(FALSE);
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

    function full_menu_list(){
        return $this->db->get('menu');
    }

    function get_all($table) {
        return $this->db->get($table);
    }

    function get_pagination($table, $qtd = 0, $inicio = 0){
            $this->db->select('*');
            $this->db->from($table);
            $this->db->order_by("ordem", "asc");
            if ($qtd > 0){
                $this->db->limit($qtd, $inicio);
            }
            //$this->output->enable_profiler(TRUE);
            return $this->db->get();
    }


}