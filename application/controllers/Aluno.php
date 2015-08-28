<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function form_cadastro(){
		$this->template->load('aluno/form_cadastro');
	}
	
	

}