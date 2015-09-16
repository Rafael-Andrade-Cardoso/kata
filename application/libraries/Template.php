<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Template {
	
	var $ci;
	
	public function __construct(){
		$this->ci = & get_instance();
	}
	
	public function load($view, $data = array(), $template = 'template'){
		$this->ci->load->view($template.'/header');	
		$this->ci->load->view($template.'/topbar');
		$this->ci->load->model('Menu_model');
		$item_menu = $this->ci->Menu_model->get_menu(); 		
		$data['menu'] = array();
		// Para cada item trazido de menu (primeiro nível)...
		foreach($item_menu->result() as $item){
			array_unshift($data['menu'], $item);
			// Verifica se o item tem submenu			
				if ($lista_submenu = $this->ci->Menu_model->get_submenu($item->id_menu)->result()) {
				$item->submenu = $lista_submenu;
			}
		}
		//echo "<pre>";
		//die(print_r($item_menu));
		$this->ci->load->view($template.'/sidebar', $data);	
		$this->ci->load->view($view);
		$this->ci->load->view($template.'/footer');	
	}
}
