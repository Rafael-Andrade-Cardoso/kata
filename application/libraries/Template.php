<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Template {
	
	var $ci;
	
	public function __construct(){
		$this->ci = & get_instance();
	}
	
	public function load($view, $template = 'template'){
		$this->ci->load->view($template.'/header');	
		$this->ci->load->view($template.'/topbar');	
		$this->ci->load->view($template.'/sidebar');	
		$this->ci->load->view($view);
		$this->ci->load->view($template.'/footer');	
	}
}
