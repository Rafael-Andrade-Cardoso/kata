<?php
	/*
	*	Controller País
	*/
	class Pais extends MY_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->model('auxiliar_model');
		}
		
		public function form_cadastro(){
			$this->template->load('pais/form_cadastro');
		}
		
		public function get(){
			$data = $this->auxiliar_model->get(1);
			print_r($data);
		}
		
		public function cadastro(){
			$nm_pais = $this->input->post('nm_pais');
			$data = array(
				'nm_pais' => $nm_pais
			);
			$result = $this->auxiliar_model->insert('ta_pais', $data);
			print_r($result);
		}
		
		public function update(){
			$result = $this->auxiliar_model->update([
				'login' => 'Peggy'
			], 1);
			print_r($result);
		}
		
		public function delete($id_usuario){
			$result = $this->auxiliar_model->delete($id_usuario);
			print_r($result);
		}
		
	}