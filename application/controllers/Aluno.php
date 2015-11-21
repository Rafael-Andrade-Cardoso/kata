<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends MY_Controller {

	public function __construct() {
		parent::__construct();
    	$this->load->model('Aluno_model', 'aluno_model', TRUE);
	}

	public function form_cadastro(){
		$this->template->load('aluno/form_cadastro');
	}

	function inserir() {
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span class="alert alert-danger">', '</span>');

		/* Define as regras para validação */
		$validacoes = array(
	        array(
	            'field' => 'nome',
	            'label' => 'Nome',
	            'rules' => 'required|min_length[5]|max_length[45]'
	        ),
	        array(
	            'field' => 'email',
	            'label' => 'E-mail',
	            'rules' => 'trim|required|valid_email|max_length[45]'
	        ),
			array(
				'fields' => 'tipo_sanguineo',
				'label' => 'Tipo sanguineo',
				'rules' => 'required'
			)
	    );
    	$this->form_validation->set_rules($validacoes);

		/* Executa a validação e caso houver erro chama a função que retorna ao formulário */
		if ($this->form_validation->run() === FALSE) {
			$this->form_cadastro();
		/* Senão, caso sucesso: */
		} else {
			$data = new stdClass();
			/* Recebe os dados do formulário (visão) */
			foreach ($this->input->post() as $key => $value){
				$data->$key = $value;
			}

			/* Abre uma transação */
			$this->db->trans_start(TRUE);

			/* Dados para cadastro de pessoa */
			$pessoa = new stdClass();
			$pessoa->id_responsavel = $data->id_responsavel;
			$pessoa->nome = $data->nomepai;
			$pessoa->dt_nascimento = $data->dt_nascimento;
			$pessoa->email = $data->email;
			$id_pessoa = $this->crud->insert('pessoa', $pessoa);

			/* Dados para cadastro de dados de pessoa */
			$pessoa_dados = new stdClass();
			$pessoa_dados->id_pessoa = $id_pessoa;
			$pessoa_dados->peso = $data->peso;
			$pessoa_dados->altura = $data->altura;
			$pessoa_dados->dt_dados = $data->dt_matricula;
			$this->crud->insert('pessoa_dados', $pessoa_dados);

			$endereco = new stdClass();
			$endereco->id_ta_cidade = $data->id_ta_cidade;
			$endereco->id_pessoa = $id_pessoa;
			$endereco->logradouro = $data->logradouro;
			$endereco->numero = $data->numero;
			$endereco->complemento = $data->complemento;
			$endereco->cep = $data->cep;
			$this->crud->insert('endereco', $endereco);

			$pessoa_telefone = new stdClass();
			$pessoa_telefone->id_pessoa = $id_pessoa;
			$pessoa_telefone->id_ta_tipo_telefone = $data->id_ta_tipo_telefone;
			$pessoa_telefone->ddd = $data->ddd;
			$pessoa_telefone->telefone = $data->telefone;
			$this->crud->insert('pessoa_telefone', $pessoa_telefone);

			$pessoa_fisica = new stdClass();
			$pessoa_fisica->sobrenome = $data->sobrenome;
			$pessoa_fisica->tipo_sanguineo = $data->tipo_sanguineo;
			$pessoa_fisica->sexo = $data->sexo;
			$this->crud->insert('pessoa_fisica', $pessoa_fisica);

			$pessoa_documento = new stdClass();
			$pessoa_documento->id_ta_documento = $data->id_ta_documento;
			$pessoa_documento->valor_documento = $data->valor_documento;
			$pessoa_documento->id_pessoa_fisica = $id_pessoa;
			$this->crud->insert('pessoa_documento', $pessoa_documento);

			$aluno = new stdClass();
			$aluno->observacao = $data->observacao;
			$aluno->id_pessoa_fisica = $id_pessoa;
			$id_aluno = $this->crud->insert('aluno', $aluno);

			$matricula = new stdClass();
			$matricula->id_ta_situacao;
			$matricula->dia_vencimento;
			$matricula->dt_matricula;
			$matricula->desconto;
			$matricula->valor_mensalidade;
			$matricula->id_pessoa_fisica;
			$matricula->id_aluno;
			$this->crud->insert('matricula', $matricula);

			/* Fecha a transação */
			$this->db->trans_complete();

			if ($this->db->trans_status() === TRUE) {
			    $this->db->trans_commit();
			} else {
			    $this->db->trans_rollback();
			}
			/*
			if ($this->crud->Insert($data)) {
				redirect('aluno');
			} else {
				log_message('error', 'Erro ao inserir a aluno.');
			}
			*/
		}
	}


	function editar($id)  {

		/* Aqui vamos definir o título da página de edição */
		$data['titulo'] = "CRUD com CodeIgniter | Editar aluno";

		/* Busca os dados da aluno que será editada */
		$data['dados_aluno'] = $this->model->editar($id);

	 	/* Carrega a página de edição com os dados da aluno */
		$this->load->view('aluno_edit', $data);
	}

	function atualizar() {

		/* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
		$this->load->library('form_validation');

		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');

		/* Aqui estou definindo as regras de validação do formulário, assim como
		   na função inserir do controlador, porém estou mudando a forma de escrita */
		$validations = array(
			array(
				'field' => 'nome',
				'label' => 'Nome',
				'rules' => 'trim|required|max_length[40]'
			),
			array(
				'field' => 'email',
				'label' => 'E-mail',
				'rules' => 'trim|required|valid_email|max_length[100]'
			)
		);
		$this->form_validation->set_rules($validations);

		/* Executa a validação e caso houver erro chama a função editar do controlador novamente */
		if ($this->form_validation->run() === FALSE) {
	            $this->editar($this->input->post('id'));
		} else {
			/* Senão obtém os dados do formulário */
			$data['id'] = $this->input->post('id');
			$data['nome'] = ucwords($this->input->post('nome'));
			$data['email'] = strtolower($this->input->post('email'));

			/* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
			if ($this->model->atualizar($data)) {
				redirect('aluno');
			} else {
				log_message('error', 'Erro ao atualizar a aluno.');
			}
		}
	}

	function deletar($id) {

		/* Executa a função deletar do modelo passando como parâmetro o id da aluno */
		if ($this->model->deletar($id)) {
			redirect('aluno');
		} else {
			log_message('error', 'Erro ao deletar a aluno.');
		}
	}

	function lista() {
	    $data['alunos'] = $this->model->listar();
	    $this->template->load('aluno/aluno_view', $data);
	}


}