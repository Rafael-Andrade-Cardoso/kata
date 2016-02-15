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

    function update($tabela, $campo, $id, $data) {
        $this->db->where($campo, $id);
        $result = $this->db->update($tabela, $data);
         
        if ($result){
                return true;
            } else {
                return false;
            }
    }
    
    function update_complexo($tabela, $where, $data) {
        $this->db->where($where);
        $result = $this->db->update($tabela, $data);
         
        if ($result){
                return true;
            } else {
                return false;
            }
    }
    
    /*function update_ativos($tabela=NULL, $campo=NULL, $id=NULL){
        if($tabela != NULL && $id != NULL){
            //unset($data['id_menu']);
            //unset($data['id_ta_tipo_usuario']);
            //update_ativos('ta_atividade', 'id_ta_atvidade', 1);
            $data = new stdClass();
            $data->ativo = '0';
            $result = $this->db->update($tabela, $data, array($campo => $id));
            die(print_r($result));
            if ($result){
                return true;
            } else {
                return false;
            }
        }
    }*/

    function delete($tabela, $campo, $id) {
        $this->db->where($campo, $id);
        return $this->db->delete($tabela);
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
        $this->db->join('matricula_graduacao mg', 'm.id_matricula = mg.id_matricula', 'left');
        $this->db->join('ta_graduacao tg', 'tg.id_ta_graduacao = mg.id_ta_graduacao', 'left');
        $this->db->join('matricula_turma mt', 'm.id_matricula = mt.id_matricula', 'left');
        $this->db->join('turma t', 't.id_turma = mt.id_turma', 'left');
        $this->db->join('presenca pr', 'pr.id_matricula = m.id_matricula', 'left');
        $this->db->where('a.ativo = 1');
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
    
    function get_info_alunos($id_aluno) {
        $this->db->select('*');
        $this->db->from('aluno a');
        $this->db->join('pessoa_fisica pf', 'pf.id_pessoa_fisica = a.id_pessoa_fisica', 'left');
        $this->db->join('pessoa p', 'p.id_pessoa = pf.id_pessoa_fisica', 'left');
        $this->db->join('endereco end', 'p.id_pessoa = end.id_pessoa', 'left');
        $this->db->join('ta_cidade cd', 'cd.id_ta_cidade = end.id_ta_cidade', 'left');
        $this->db->join('ta_estado est', 'est.id_ta_estado = cd.id_ta_estado', 'left');
        $this->db->join('ta_pais pais', 'pais.id_ta_pais = est.id_ta_pais', 'left');
        $this->db->join('pessoa_telefone pt', 'p.id_pessoa = pt.id_pessoa', 'left');
        $this->db->join('ta_tipo_telefone ttt', 'ttt.id_ta_tipo_telefone = pt.id_ta_tipo_telefone', 'left');
        $this->db->join('pessoa_dados pd', 'pd.id_pessoa_fisica = pf.id_pessoa_fisica', 'left');
        $this->db->join('matricula m', 'm.id_aluno = a.id_aluno', 'left');
        $this->db->join('matricula_turma mt', 'm.id_matricula = mt.id_matricula', 'left');
        $this->db->join('turma t', 't.id_turma = mt.id_turma', 'left');
        $this->db->join('presenca pr', 'pr.id_matricula = m.id_matricula', 'left');
        $this->db->where('a.id_aluno = '.$id_aluno);
        $this->db->order_by('p.nome','asc');
        //debug($this->db->get()->result());
        $query = $this->db->get();
        /*echo "<pre>";
        die(print_r($query->result()));*/
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }
    
    function get_info_instrutor($id_instrutor){
        $this->db->select('*');
        $this->db->from('instrutor i');
        $this->db->join('pessoa_fisica pf', 'pf.id_pessoa_fisica = i.id_pessoa_fisica', 'left');
        $this->db->join('pessoa p', 'p.id_pessoa = pf.id_pessoa_fisica', 'left');
        $this->db->join('endereco end', 'p.id_pessoa = end.id_pessoa', 'left');
        $this->db->join('ta_cidade cd', 'cd.id_ta_cidade = end.id_ta_cidade', 'left');
        $this->db->join('ta_estado est', 'est.id_ta_estado = cd.id_ta_estado', 'left');
        $this->db->join('ta_pais pais', 'pais.id_ta_pais = est.id_ta_pais', 'left');
        $this->db->join('pessoa_telefone pt', 'p.id_pessoa = pt.id_pessoa', 'left');
        $this->db->join('ta_tipo_telefone ttt', 'ttt.id_ta_tipo_telefone = pt.id_ta_tipo_telefone', 'left');
       // $this->db->join('pessoa_dados pd', 'pd.id_pessoa_fisica = pf.id_pessoa_fisica', 'left');
        $this->db->join('usuario u', 'u.id_pessoa = p.id_pessoa', 'left');
        $this->db->join('ta_situacao ts', 'ts.id_ta_situacao = u.id_ta_situacao', 'left');
        $this->db->where('i.id_instrutor = '.$id_instrutor);
        $query = $this->db->get();
        
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }
    /* 
    *   Retorna quantidade de alunos por turma
    *
    */
    function get_qtd_alunos_turma(){
        //$sql = "selct count(m.id_matricula) from matricula_turma mt
        $this->db->select("count(mt.id_matricula) as qtd_aluno, t.nm_turma, count(*) as n_turmas");
        $this->db->from("matricula_turma mt");
        $this->db->join("turma t", "t.id_turma = mt.id_turma");   
        $this->db->group_by("mt.id_turma", "asc");
        $result = $this->db->get();
        
        /*
        $sql = "Select count(m.id_matricula) as qtd_aluno, mt.id_turma, t.nm_turma, count(*) as n_turmas from matricula_turma as mt	
                                        inner join matricula as m
                                            ON (mt.id_matricula = m.id_matricula)
                                        inner join aluno as a
                                            ON (m.id_aluno = a.id_aluno)
                                        inner join pessoa_fisica as pf 
                                            ON(a.id_pessoa_fisica = pf.id_pessoa_fisica)
                                        inner join pessoa as p
                                            ON(p.id_pessoa = pf.id_pessoa_fisica)
                                        left join exame as e
                                            ON (m.id_matricula = e.id_matricula)
                                        left join ta_graduacao as tg
                                            ON (e.id_ta_graduacao = tg.id_ta_graduacao)
                                        left join horario h
                                            on h.id_turma = mt.id_turma  
                                        inner join turma t
                                            on t.id_turma = mt.id_turma                                               
                                        group by mt.id_turma;";
        $result = $this->db->query($sql); 
        */
        return $result;                           
    }
    
    function get_alunos_turmas($id_turma) {
        $sql = "Select a.*, p.nome, pf.sobrenome, mt.id_turma from matricula_turma as mt	
                                        inner join matricula as m
                                            ON (mt.id_matricula = m.id_matricula)
                                        inner join aluno as a
                                            ON (m.id_aluno = a.id_aluno)
                                        inner join pessoa_fisica as pf 
                                            ON(a.id_pessoa_fisica = pf.id_pessoa_fisica)
                                        inner join pessoa as p
                                            ON(p.id_pessoa = pf.id_pessoa_fisica)
                                        Where mt.id_turma = '" . $id_turma . "';";
        $result = $this->db->query($sql);
        return $result->result();
        
    }
    
    function get_alunos_turma($id_turma = ""){
        $sql = "Select a.*, p.nome, pf.sobrenome, pf.tipo_sanguineo, tg.graduacao, mt.id_turma from matricula_turma as mt	
                                        inner join matricula as m
                                            ON (mt.id_matricula = m.id_matricula)
                                        inner join aluno as a
                                            ON (m.id_aluno = a.id_aluno)
                                        inner join pessoa_fisica as pf 
                                            ON(a.id_pessoa_fisica = pf.id_pessoa_fisica)
                                        inner join pessoa as p
                                            ON(p.id_pessoa = pf.id_pessoa_fisica)
                                        left join exame as e
                                            ON (m.id_matricula = e.id_matricula)
                                         left join ta_graduacao as tg
                                            ON (e.id_ta_graduacao = tg.id_ta_graduacao)";
        
        if($id_turma != "") {
            $sql .= "Where mt.id_turma = '" . $id_turma . "';";
        }/* else {
            $sql .="group by mt.id_turma;";
        }
        */
         
        $result = $this->db->query($sql);
        /*
        'Select a.*, p.nome, pf.sobrenome, pf.tipo_sanguineo, tg.graduacao from matricula_turma as mt	
                                        inner join matricula as m
                                            ON (mt.id_matricula = m.id_matricula)
                                        inner join aluno as a
                                            ON (m.id_aluno = a.id_aluno)
                                        inner join pessoa_fisica as pf 
                                            ON(a.id_pessoa_fisica = pf.id_pessoa_fisica)
                                        inner join pessoa as p
                                            ON(p.id_pessoa = pf.id_pessoa_fisica)
                                        left join exame as e
                                            ON (m.id_matricula = e.id_matricula)
                                         left join ta_graduacao as tg
                                            ON (e.id_ta_graduacao = tg.id_ta_graduacao)
                                    Where mt.id_turma = '.$id_turma.';
                                  ');
                                  */
        //return $result->result();
        return $result;
                                  
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
                                where i.ativo = 1
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
        $this->db->where('m.ativo = 1');
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
        $this->db->where('ativo = 1');
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
        $this->db->from('arte_marcial am');
        $this->db->where('am.ativo = 1');
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
        $this->db->where('ta_graduacao.ativo = 1');
        $this->db->order_by('ordem','asc');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }
    
    function get_turma_somente($id_turma = null){
        $this->db->select('*');
        $this->db->from('turma');
        $this->db->where('ativo', 1);
        if(!is_null($id_turma)) {
            $this->db->where('id_turma', $id_turma);
        }
        $this->db->order_by('nm_turma', 'asc');
        $return = $this->db->get();
        
        //$query = $this->db->query('Select * from turma where ativo = 1 order by nm_turma;');
        //$query = $this->db->query('Select id_turma from turma Where turma.id_horario = '.$id_horario.';');
                                  //die(print_r($query->result()));
        //return $query->result();
        return $return;
    }
    
    function get_turma_instrutor(){
        $query = $this->db->query(' Select t.*, h.id_instrutor, i.*, pf.*, p.* from turma as t
                                        left join horario as h
                                            ON(t.id_turma = h.id_turma)
                                        left join instrutor as i
                                            ON(h.id_instrutor = i.id_instrutor)
                                        left join pessoa_fisica pf 
                                            ON(i.id_pessoa_fisica = pf.id_pessoa_fisica) 	
                                        left join pessoa as p 
                                            ON(p.id_pessoa = pf.id_pessoa_fisica)
                                        WHERE t.ativo = 1
                                        group by t.id_turma
                                        order by t.nm_turma
                                        ;
                                  ');
        return $query;
    }

    function get_turma($id_turma) {
        $query = $this->db->query(' Select a.*, h.*, t.*, i.*, pf.*, p.* from turma as t
                                        left join horario as h
                                            ON(t.id_turma = h.id_turma)
                                        left join aula as a
                                            ON(a.id_horario = h.id_horario)
                                        left join instrutor as i
                                            ON(h.id_instrutor = i.id_instrutor)
                                        left join pessoa_fisica pf 
                                            ON(i.id_pessoa_fisica = pf.id_pessoa_fisica) 	
                                        left join pessoa as p 
                                            ON(p.id_pessoa = pf.id_pessoa_fisica)
                                        Where t.id_turma = 8
                                        and t.ativo = 1
                                        group by t.id_turma;
                                    ');
        if($query->num_rows() > 0) {
            return $query;
        }
        else {
            return false;
        }
    }
    
    function get_horarios_turma($id_turma) {
        $this->db->select('*');
        $this->db->from('horario');
        $this->db->where('id_turma', $id_turma);
        $return = $this->db->get();
        return $return;        
    }
    
    
    function get_info_turma($id_turma){
        $query=$this->db->query('
                                Select * from horario as h
                                    inner join instrutor as i
                                        ON(h.id_instrutor = i.id_instrutor)
                                    inner join pessoa_fisica pf 
                                        ON(i.id_pessoa_fisica = pf.id_pessoa_fisica) 	
                                    inner join pessoa as p 
                                        ON(p.id_pessoa = pf.id_pessoa_fisica)
                                    Where h.id_turma = '. $id_turma .'
                                ');
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
                                        /*inner join turma as t 
                                            ON (t.id_horario = h.id_horario) */  
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
        $this->db->select('h.*, p.nome, pf.sobrenome, t.*');
        $this->db->from('horario h');
        $this->db->join('turma t', 't.id_turma = h.id_turma');
        $this->db->join('instrutor i', 'i.id_instrutor = h.id_instrutor');
        $this->db->join('pessoa_fisica pf', 'pf.id_pessoa_fisica = i.id_pessoa_fisica');
        $this->db->join('pessoa p', 'p.id_pessoa = pf.id_pessoa_fisica');

        $this->db->where('h.ativo', 1);
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
        $this->db->where('ativo', 1);
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

        $this->db->where('ativo', 1);
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
        $this->db->where('ativo', 1);
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
    
    function get_proxima_grad($id_matricula) {
        $this->db->select("*");
        $this->db->from('ta_graduacao');
        $this->db->order_by("ordem", "asc");
        $lista_graduacao = $this->db->get()->result();
        
        $this->db->select("*");
        $this->db->from('exame');
        $this->db->where('id_matricula =' . $id_matricula);
        $this->db->order_by("dt_exame", "desc");
        $this->db->limit(1);
        $ultima_grad = $this->db->get()->result();
        //echo "<pre>";
        //die(print_r($ultima_grad));
        if(empty($ultima_grad)) {  
            //die(print_r($lista_graduacao[1]->id_ta_graduacao));
            return $lista_graduacao[1]->id_ta_graduacao;
        } else {
            //echo "<pre>";
            //die(print_r($lista_graduacao));
            $flag = 0;
            foreach($lista_graduacao as $valor){
                if($flag == 0){
                    if ($ultima_grad[0]->id_ta_graduacao == $valor->id_ta_graduacao){
                        $flag = 1;
                    }
                } else {
                    return $valor->id_ta_graduacao;
                } 
            }
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

    function update_ativos($tabela, $campo, $id) {
        $this->db->where($campo, $id);
        $this->db->set(array("ativo" => 0));
        return $this->db->update($tabela);
    }
    
    function get_id(  $tabela,$id, $where){
        $result = $this->db->query('Select '.$id.' from '.$tabela.' where '.$where.';');
        return $result;
    }
    
    function get_aula($id_aula = null, $aux){
        if($aux == 1){
            $query = $this->db->query("Select * from aula as a
                                        inner join horario as h
                                            ON(a.id_horario = h.id_horario)
                                        inner join turma as t
                                            ON(h.id_turma = t.id_turma)
                                        left outer join plano_aula as pa
                                            ON(pa.id_aula = a.id_aula)
                                        inner join ta_atividade as ta
                                            ON(ta.id_ta_atividade = pa.id_ta_atividade)
                                        WHERE a.id_aula = ".$id_aula.";
                                    ");
        }else{
            $query = $this->db->query('Select * from aula as a
                                        left outer join horario as h
                                            ON(a.id_horario = h.id_horario)
                                        inner join turma as t
                                            ON(h.id_turma = t.id_turma)
                                       WHERE a.ativo = 1
                                       ;
                                    ');
        }
        /*$this->db->select('*');
        $this->db->from('aula');
        $query = $this->db->get()->result();
        echo "<pre>";
        die(print_r($query->result()));*/
        return $query;
    }
    
    function get_arte_marcial_turma($id_turma) {
        $this->db->select('t.*, am.id_arte_marcial');
        $this->db->from('turma t');
        $this->db->join('horario h', 'h.id_turma = t.id_turma');
        $this->db->join('aula a', 'a.id_horario = h.id_horario');
        $this->db->join('arte_marcial am', 'am.id_arte_marcial = a.id_arte_marcial');
        $this->db->where('t.id_turma =' . $id_turma);
        $this->db->group_by('t.id_turma');
        $query = $this->db->get();
        return $query;
    }
    
    function get_alunos_graduacao() {
        $this->db->select('*, count(e.id_exame) as qtd_alunos, count(*) as qtd_graduacao');
        $this->db->from('exame e');
        $this->db->join('matricula m', 'm.id_matricula = e.id_matricula');
        $this->db->join('ta_graduacao g', 'g.id_ta_graduacao = e.id_ta_graduacao');
        $this->db->group_by('g.id_ta_graduacao');
        $retorno = $this->db->get();
        return $retorno;
    }
    
    function get_pessoas_tipo_usuario($id_tipo_usuario) {
        //echo '<pre>';
        //die(print_r($id_tipo_usuario));
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where("id_ta_tipo_usuario =", $id_tipo_usuario);
        $return = $this->db->get();
        return $return;
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