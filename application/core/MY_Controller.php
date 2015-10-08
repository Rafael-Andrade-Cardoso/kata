<?php
class MY_Controller extends CI_Controller {

	protected $protegido = true;

	public function __construct() {
		parent::__construct();
		$this->proteger();
	}

	protected function getPost() {
		$obj = new stdClass();
		foreach($_POST as $post => $valor) {

			$campo = explode('ed_', $post);
			if (count($campo) == 2) {
				$obj->$campo[1] = $valor;
			}
		}

		return $obj;
	}

	protected function proteger() {
		if ($this->protegido) {
			$this->getUsuario();

			if (!$this->user->logado) {
				redirect('login');
			}
			$this->get_mensagens_usuario();
			/*
			$permitidos = array('pedido', 'arquivo', 'cliente');
			if ($this->user->administrador == 0 && !in_array($this->router->fetch_class(), $permitidos)) {
				redirect('');
			}
			*/
		}
	}

	private function getUsuario() {
		$usuario = $this->session->userdata('usuario');
		if (is_object($usuario) && $usuario->id_usuario > 0) {
			$this->user = $usuario;
			$this->user->logado = true;

		} else {
			$this->user->logado = false;
		}
	}

	/**
	 * Validações (callbacks)
	 */
	public function formatar_numero($str) {
		return str_replace(',', '.', $str);
	}

	/**
	 * Callback para checkbox ativo
	 * Seta ativo=0 caso venha vazio
	 */
	public function is_ativo($valor, $campo) {
		if (!$valor) {
			$_POST[$campo] = '0';
			return '0';
		} else {
			return '1';
		}
	}

	public function get_mensagens_usuario() {
		$this->load->model('crud_model', 'crud');
		//debug($this->session);
		$id_pessoa = $this->session->userdata['usuario']->id_pessoa;
		$comunicados = $this->crud->get_mensagens_usuario($id_pessoa);
		return $comunicados;
	}
}
