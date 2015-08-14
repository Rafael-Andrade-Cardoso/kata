<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("usuario");
		$this->load->library('form_validation');
	}
	 
	/*
	*  Carrega a tela de login
	*/
	public function index() {
		$this->load->view('login');
	}
	
	/*
	*  Autentica usuário e senha informados na tela de login
	*/
	public function autenticar() {
		$this->form_validation->set_rules('user', 'Username', 'required');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {
			
		}	
		// Chama a função de validadção do model usuario
		$usuario = $this->usuario->validate();
		
		if ($usuario) {
			$this->session->set_userdata("logado", 1);
			$this->session->set_userdata("usuario", $usuario);
			redirect(base_url(inicio));
		} else {
			//caso a senha/usuário estejam incorretos, então mando o usuário novamente para a tela de login com uma mensagem de erro.
			$dados['erro'] = "Usuário/Senha incorretos";
			$this->load->view("login", $dados);
		}
	}
	
	/*
	*  Destroi a sessão, se existir
	*/
	public function logout() {
		$this->session->unset_userdata("logado");
		$this->session->sess_destroy();
		redirect(base_url());
		
	}
	
	
}