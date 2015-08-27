<?php
	
	class Usuario extends MY_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->model('usuario_model');
		}
		
		public function form_cadastro(){
			$this->template->load('usuario/form_cadastro');
		}
		
		public function get(){
			$data = $this->usuario_model->get(1);
			print_r($data);
			
			//$this->output->enable_profiler(true);
		}
		
		public function cadastro(){
			$login = $this->input->post('login');
			$senha = $this->input->post('senha');
			$confirmaSenha = $this->input->post('confirma_senha');
			$data = array(
				'id_ta_tipo_usuario' => '1',
				'id_ta_situacao' => '1',
				'id_pessoa' => '1',
				'login' => $login,
				'senha' => hash('sha256', $senha)
			);
			$result = $this->usuario_model->insert($data);
			//die('not yet ready');
			print_r($result);
		}
		
		public function update(){
			$result = $this->usuario_model->update([
				'login' => 'Peggy'
			], 1);
			print_r($result);
		}
		
		public function delete($id_usuario){
			$result = $this->usuario_model->delete($id_usuario);
			print_r($result);
		}
		
	}