<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends MY_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('crud_model', 'crud');
	}
	
	public function index()	{
		$data = array();
        $data['alunos_turma'] = $this->crud->get_qtd_alunos_turma()->result();
        //echo "<pre>";
		//die(print_r($data));
        
		
		$this->template->load('dashboard', $data);
	}
	
	public function dashboard() {
		$this->template->load('dashboard');
	}
	
	public function aluno_cadastrar(){
		$this->template->load('aluno/cadastro');
	}
	
	public function cadastrar() {
		//$this->template->load('inicio');		
	}
	
	public function info() {
    	phpinfo();
    	exit();
	}
	
}
