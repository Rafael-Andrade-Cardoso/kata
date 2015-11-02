<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("usuario_model");
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
		$regras = array(
		        array(
		                'field' => 'user',
		                'label' => '<b>Usuário</b>',
		                'rules' => 'required'
		        ),
		        array(
		                'field' => 'pass',
		                'label' => '<b>Senha</b>',
		                'rules' => 'required'
		        ),
		);
		/*
		array(
		                'field' => 'userfile',
		                'label' => 'Anexar Imagem',
		                'rules' => 'callback_verifica_tamanho_anexo'
		        ),
		*/


		$this->form_validation->set_rules($regras);
		$this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
		$dados['erro'] = null;
		if ($this->form_validation->run() == FALSE) {
			$dados['erro'] = "Usuário/Senha incorretos";
			//$this->load->view("login", $dados);
			$this->load->view('login', $dados);
			//$this->form_validation->set_message('verifica_tamanho_anexo', $this->upload->display_errors());

		} else {
			// Chama a função de validadção do model usuario
			$usuario = $this->usuario_model->validate();

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