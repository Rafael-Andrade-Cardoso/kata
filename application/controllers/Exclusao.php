<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Exclusao extends MY_Controller {

	public function __construct() {
		parent::__construct();
    	$this->load->model('Aluno_model', 'aluno_model', TRUE);
	}

	public function excluir_aula() {
		$reg = $this->input->post();
		$status = $this->crud->update_ativos('aula', 'id_aula', $reg["id"]);        
        return $status; 
	}

	public function excluir_aluno() {
		$reg = $this->input->post();
        echo $reg['id'];
		$status = $this->crud->update_ativos('aluno', 'id_aluno', $reg["id"]);        
        //return $status;
	}
    
    public function excluir_turma() {
		$reg = $this->input->post();
        echo $reg['id'];
		$status = $this->crud->update_ativos('turma', 'id_turma', $reg["id"]);        
        //return $status;
	}
    
    public function excluir_arte_marcial(){
        $reg = $this->input->post();
        echo $reg['id'];
		$status = $this->crud->update_ativos('arte_marcial', 'id_arte_marcial', $reg["id"]); 
    }
    
    public function excluir_menu(){
        $reg = $this->input->post();
        echo $reg['id'];
		$status = $this->crud->update_ativos('menu', 'id_menu', $reg["id"]); 
    }
    
    public function excluir_instrutor(){
        $reg = $this->input->post();
        echo $reg['id'];
		$status = $this->crud->update_ativos('instrutor', 'id_instrutor', $reg["id"]); 
    }
    
    public function excluir_atividade(){
        $reg = $this->input->post();
        echo $reg['id'];
		$status = $this->crud->update_ativos('ta_atividade', 'id_ta_atividade', $reg["id"]);         
    }
    
    public function excluir_comunicado(){
        $reg = $this->input->post();
        echo $reg['id'];
		$status = $this->crud->update_ativos('comunicado', 'id_comunicado', $reg["id"]);         
    }
    
   public function excluir_graduacao(){
        $reg = $this->input->post();
        echo $reg['id'];
		$status = $this->crud->update_ativos('ta_graduacao', 'id_ta_graduacao', $reg["id"]);         
    }
    
    public function excluir_horario() {
        $reg = $this->input->post();
        echo $reg['id'];
        $status = $this->crud->update_ativos('horario', 'id_horario', $reg['id']);
    }
    
    public function excluir_situacao() {
        $reg = $this->input->post();
        echo $reg['id'];
        $status = $this->crud->update_ativos('ta_situacao', 'id_ta_situacao', $reg['id']);
    }
    
    public function excluir_tipo_telefone() {
        $reg = $this->input->post();
        echo $reg['id'];
        $status = $this->crud->update_ativos('ta_tipo_telefone', 'id_ta_tipo_telefone', $reg['id']);
    }
    
    public function excluir_tipo_usuario() {
        $reg = $this->input->post();
        echo $reg['id'];
        $status = $this->crud->update_ativos('ta_tipo_usuario', 'id_ta_tipo_usuario', $reg['id']);
    }
    
    

}