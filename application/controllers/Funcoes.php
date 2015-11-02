<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcoes extends MY_Controller {
	
	public function verifica_tamanho_anexo(){
	
		$anexo = $_FILES['userfile'];	
				
		if (empty($anexo['name'])) {
			return TRUE;
		} else {
			$config['upload_path']   = './uploads/';
	                $config['allowed_types'] = 'png|gif|jpg|jpeg';
   	                $config['max_size']      = 2048;
	
	        $this->load->library('upload', $config);
	
	        if ( $this->upload->do_upload())
	        {
	        	return TRUE;
	        }
	        else
	        {
	            $this->form_validation->set_message('verifica_tamanho_anexo', $this->upload->display_errors());
	            return FALSE;  
	        }		
		}
		
	}
}

?>