<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index()	{
		$this->template->load('dashboard');
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
