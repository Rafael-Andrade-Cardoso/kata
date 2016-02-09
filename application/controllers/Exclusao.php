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

}