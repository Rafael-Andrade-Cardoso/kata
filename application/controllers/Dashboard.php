<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('crud_model', 'crud');	
	}

	public function index()	{	
		$data = array();
        $data['dados'] = $this->crud>get_alunos_turma()->result();
        echo "<pre>";
	die(print_r($data));
        
        $data['menus'] = $this->get_all('menu');
        //die(print_r($data['menus']));
        $data['tipos_usuario'] = $this->usuario->get_tipo_usuario()->result();
        $this->template->load('menu/form_cadastro', $data);
		
		$this->template->load('dashboard');
        //$this->crud->get_alunos_graduacao();
    }
}