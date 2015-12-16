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
            $this->db->order_by("nome", "asc");
            if ($qtd > 0){
                $this->db->limit($qtd, $inicio);
            }
            //$this->output->enable_profiler(TRUE);
            return $this->db->get();
    }

    function get_where($table, $where) {
        return $this->db->get_where($table, $where);
        //$this->db->from($this->table)->where($where)
    }

    function get_alunos($qtd = 0, $inicio = 0) {
        $this->db->select('*');
        $this->db->from('aluno a');
        $this->db->join('pessoa_fisica pf', 'pf.id_pessoa_fisica = a.id_pessoa_fisica', 'left');
        $this->db->join('pessoa p', 'p.id_pessoa = pf.id_pessoa_fisica', 'left');
        $this->db->join('pessoa_dados pd', 'pd.id_pessoa_fisica = pf.id_pessoa_fisica', 'left');
        $this->db->join('matricula m', 'm.id_aluno = a.id_aluno', 'left');
        $this->db->join('matricula_turma mt', 'm.id_matricula = mt.id_matricula', 'left');
        $this->db->join('turma t', 't.id_turma = mt.id_turma', 'left');
        $this->db->join('presenca pr', 'pr.id_matricula = m.id_matricula', 'left');
        $this->db->order_by('p.nome','asc');
        //debug($this->db->get()->result());
        if ($qtd > 0 && $inicio > 0){
            $this->db->limit($qtd, $inicio);
        }
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }

    function get_instrutores($qtd = 0, $inicio = 0) {
        $query=$this->db->query('Select * from  
                                ( 
                                SELECT * from 
                                    pessoa as p 
                                        inner join pessoa_fisica as pf 
                                            ON(p.id_pessoa = pf.id_pessoa_fisica) 			
                                ) as ppf
                                    inner join instrutor as i 
                                        ON (i.id_pessoa_fisica = ppf.id_pessoa_fisica)
                                order by ppf.nome;
                                ');
        /*$this->db->select('*');
        $this->db->from('instrutor i');
        $this->db->join('pessoa_fisica pf', 'pf.id_pessoa_fisica = i.id_pessoa_fisica', 'left');
        $this->db->join('pessoa p', 'p.id_pessoa = pf.id_pessoa_fisica', 'left');
        $this->db->join('pessoa_dados pd', 'pd.id_pessoa_fisica = pf.id_pessoa_fisica', 'left');
        $this->db->order_by('p.nome','asc');
        $query = $this->db->get();      */  
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }

    function get_menus($qtd = 0, $inicio = 0) {
        $this->db->select('m.*, mp.nome as nome_pai, tu.ds_tipo_usuario as tipo_usuario');
        $this->db->from('menu m');
        $this->db->join('menu mp', 'mp.id_menu = m.id_menu_pai', 'left');
        $this->db->join('menu_tipo_usuario mtu', 'mtu.id_menu = m.id_menu');
        $this->db->join('ta_tipo_usuario tu', 'tu.id_ta_tipo_usuario = mtu.id_ta_tipo_usuario');
        $this->db->order_by('m.ordem','asc');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }

    function get_atividades($qtd = 0, $inicio = 0) {
        $this->db->select('*');
        $this->db->from('ta_atividade');
        $this->db->order_by('nm_atividade','asc');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }

    function get_arte_marcial($qtd = 0, $inicio = 0) {
        $this->db->select('*');
        $this->db->from('arte_marcial');
        $this->db->order_by('nm_arte_marcial','asc');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }

    function get_graduacao($qtd = 0, $inicio = 0) {
        $this->db->select('*');
        $this->db->from('ta_graduacao');
        $this->db->order_by('ordem','asc');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }
    
    function get_turma_somente($id_horario){
        $query = $this->db->query('Select id_turma from turma
                                    Where turma.id_horario = '.$id_horario.'; 
                                  ');
                                  //die(print_r($query->result()));
        return $query->result();
    }

    function get_turma($qtd = 0, $inicio = 0) {
        $this->db->select('t.*, h.*, p.nome, pf.sobrenome');
        $this->db->from('turma t');
        $this->db->join('horario h', 'h.id_horario = t.id_horario');
        $this->db->join('instrutor i', 'i.id_instrutor = h.id_instrutor');
        $this->db->join('pessoa_fisica pf', 'pf.id_pessoa_fisica = i.id_pessoa_fisica');
        $this->db->join('pessoa p', 'p.id_pessoa = pf.id_pessoa_fisica');
        $this->db->order_by('dt_inicio','asc');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }
    
    function get_horario_somente(){
        $query=$this->db->query('Select * from  
									( 
									SELECT * from 
										pessoa as p 
											inner join pessoa_fisica as pf 
												ON(p.id_pessoa = pf.id_pessoa_fisica) 			
									) as ppf 
										inner join instrutor as i 
											ON (i.id_pessoa_fisica = ppf.id_pessoa_fisica)
										inner join horario as h
											ON (h.id_instrutor = i.id_instrutor)                                            
                                        inner join turma as t 
                                            ON (t.id_horario = h.id_horario)   
                                order by h.dia_semana;
                                ');
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        } 
    }
    
    function get_horario($qtd = 0, $inicio = 0) {
        $this->db->select('h.*, p.nome, pf.sobrenome');
        $this->db->from('horario h');
        $this->db->join('instrutor i', 'i.id_instrutor = h.id_instrutor');
        $this->db->join('pessoa_fisica pf', 'pf.id_pessoa_fisica = i.id_pessoa_fisica');
        $this->db->join('pessoa p', 'p.id_pessoa = pf.id_pessoa_fisica');
        $this->db->order_by('hr_inicio','asc');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }

    function get_situacao($qtd = 0, $inicio = 0) {
        $this->db->select('*');
        $this->db->from('ta_situacao');
        $this->db->order_by('nm_situacao','asc');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }

    function get_comunicado($qtd = 0, $inicio = 0) {
        $this->db->select('*');
        $this->db->from('comunicado');
        $this->db->order_by('titulo','asc');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }

    function get_tipo_usuario($qtd = 0, $inicio = 0) {
        $this->db->select('*');
        $this->db->from('ta_tipo_usuario');
        $this->db->order_by('ds_tipo_usuario','asc');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }

    function get_tipo_telefone($qtd = 0, $inicio = 0) {
        $this->db->select('*');
        $this->db->from('ta_tipo_telefone');
        $this->db->order_by('desc_tipo_telefone','asc');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }

    function get_exame($qtd = 0, $inicio = 0) {
        $this->db->select('e.*, am.nm_arte_marcial, p.nome, pf.sobrenome, tg.graduacao');
        $this->db->from('exame e');
        $this->db->join('arte_marcial am', 'am.id_arte_marcial = e.id_arte_marcial', 'left');
        $this->db->join('ta_graduacao tg', 'tg.id_ta_graduacao = e.id_ta_graduacao', 'left');
        $this->db->join('matricula m', 'm.id_matricula = e.id_matricula', 'left');
        $this->db->join('aluno a', 'a.id_pessoa_fisica = m.id_pessoa_fisica', 'left');
        $this->db->join('pessoa_fisica pf', 'pf.id_pessoa_fisica = a.id_pessoa_fisica', 'left');
        $this->db->join('pessoa p', 'p.id_pessoa = pf.id_pessoa_fisica', 'left');
        $this->db->order_by('dt_exame','asc');
        $query = $this->db->get();
        debug($query->result());
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }

    function get_alunos_faixa() {
        $this->db->select('count(mat.id_matricula) as qtd, tg.graduacao, tg.id_ta_graduacao');
        $this->db->from('matricula mat');
        $this->db->join('matricula_graduacao mg', 'mg.id_matricula = mat.id_matricula');
        $this->db->join('ta_graduacao tg', 'tg.id_ta_graduacao = mg.id_ta_graduacao');
        $this->db->group_by('tg.id_ta_graduacao');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }

    function get_matricula() {
        $this->db->select('mat.*, p.nome, pf.sobrenome');
        $this->db->from('matricula mat');
        $this->db->join('aluno a', 'a.id_aluno = mat.id_aluno');
        $this->db->join('pessoa_fisica pf', 'pf.id_pessoa_fisica = a.id_pessoa_fisica');
        $this->db->join('pessoa p', 'p.id_pessoa = pf.id_pessoa_fisica');
        $this->db->group_by('p.nome');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }
    
    function get_matricula_alu($id_aluno) {
        $query = $this->db->query('select * from matricula as m
                                    WHERE m.id_aluno = '.$id_aluno.';
                                ');        
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }

    function get_mensagens_usuario($id_pessoa) {
        $this->db->select('*, count(*) as qtd');
        $this->db->from('comunicado c');
        $this->db->join('pessoa_comunicado pc', 'pc.id_comunicado = c.id_comunicado');
        $this->db->where('pc.id_pessoa =' . $id_pessoa);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }
}
/*
matricula
matricula_graduacao
ta_graduacao


select count(mat.id_matricula) as qtd, tg.graduacao, tg.id_ta_graduacao from matricula mat
    join matricula_graduacao mg
        on mg.id_matricula = mat.id_matricula
    join ta_graduacao tg
        on tg.id_ta_graduacao = mg.id_ta_graduacao
    group by(tg.id_ta_graduacao);








*/