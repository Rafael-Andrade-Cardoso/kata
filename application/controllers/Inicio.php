<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('template'); 
	}
	
	public function index()	{
		$this->template->load('dashboard');
	}
	
	public function cadastrar() {
		//$this->template->load('inicio');		
	}
	
}
