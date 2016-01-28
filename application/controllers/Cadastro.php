
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('crud_model', 'crud');
    }

    function form_arte_marcial() {
        $this->template->load('arte_marcial/form_cadastro');
    }

    function insert_arte_marcial() {
        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                $data[$key] = $value;
            }
        }
        $validacoes = array(
            array(
                'field' => 'nm_arte_marcial',
                'label' => 'Nome',
                'rules' => 'trim|required|max_length[50]'
            ),
            array(
                'field' => 'descricao',
                'label' => 'Descrição',
                'rules' => 'trim|required|max_length[255]'
            )
        );
        /* Configura as validações */
        $this->form_validation->set_rules($validacoes);

        /* Executa a validação e caso houver erro chama a função que retorna ao formulário */
        if ($this->form_validation->run() === TRUE) {
            /* Chama a função de inserção de dados e em caso de sucesso retorna o id inserido */
            $id = $this->crud->insert('arte_marcial', $data);
            /* Verifica se o retorno da função é um valor numérico e maior que 0 */
            if (is_numeric($id) && $id > 0){
                $this->sucesso();
            } else {
                $this->erro();
            }
        /* Em caso de falha: */
        } else {
            $this->form_arte_marcial();
        }
    }

    function form_menu() {
        $data = array();
        $this->load->model('usuario_model', 'usuario');
        $data['tipo_usuario_menu'] = $this->usuario->get_tipo_usuario()->result();
        $data['menus'] = $this->get_all('menu');
        //die(print_r($data['menus']));
        $data['tipos_usuario'] = $this->usuario->get_tipo_usuario()->result();
        $this->template->load('menu/form_cadastro', $data);
    }

    function insert_menu() {
        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                $data[$key] = $value;
            }
        }
        $validacoes = array(
            array(
                'field' => 'id_menu_pai',
                'label' => 'Menu pai',
                'rules' => 'max_length[11]'
            ),
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'trim|required|max_length[30]'
            ),
            array(
                'field' => 'url',
                'label' => 'URL',
                'rules' => 'trim|required|max_length[255]'
            ),
            array(
                'field' => 'desc_menu',
                'label' => 'Descrição',
                'rules' => 'trim|max_length[255]'
            )
        );
        $this->form_validation->set_rules($validacoes);

        /* Executa a validação e caso houver erro chama a função que retorna ao formulário */
        if ($this->form_validation->run() === FALSE) {
            $this->form_menu();
        /* Senão, caso sucesso: */
        } else {
            $id_ta_tipo_usuario = $data['id_ta_tipo_usuario'];
            unset($data['id_ta_tipo_usuario']);
            $id_menu = $this->crud->insert('menu', $data);
            if (is_numeric($id_menu) && $id_menu > 0){
                $dados['id_menu'] = $id_menu;
                foreach ($id_ta_tipo_usuario as $value) {
                    $dados['id_ta_tipo_usuario'] = $value;
                    $menuusuario = $this->crud->insert('menu_tipo_usuario', $dados);
                }
                $this->sucesso();
            } else {
                $this->erro();
            }

        }
    }


    function form_atividade() {
        $this->template->load('atividade/form_cadastro');
    }

    function insert_atividade() {
        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                $data[$key] = $value;
            }
        }
        $validacoes = array(
            array(
                'field' => 'nm_atividade',
                'label' => 'Nome',
                'rules' => 'trim|required|max_length[50]'
            ),
            array(
                'field' => 'desc_atividade',
                'label' => 'Descrição',
                'rules' => 'trim|required|max_length[255]'
            )
        );
        /* Configura as validações */
        $this->form_validation->set_rules($validacoes);

        /* Executa a validação e caso houver erro chama a função que retorna ao formulário */
        if ($this->form_validation->run() === TRUE) {
            /* Chama a função de inserção de dados e em caso de sucesso retorna o id inserido */
            $id = $this->crud->insert('ta_atividade', $data);
            /* Verifica se o retorno da função é um valor numérico e maior que 0 */
            if (is_numeric($id) && $id > 0){
                $this->sucesso();
            } else {
                $this->erro();
            }
        /* Em caso de falha: */
        } else {
            $this->form_atividade();
        }
    }


    function form_tipo_telefone() {
        $this->template->load('tipo_telefone/form_cadastro');
    }

    function insert_tipo_telefone() {
        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                $data[$key] = $value;
            }
        }
        $validacoes = array(
            array(
                'field' => 'desc_tipo_telefone',
                'label' => 'Descrição',
                'rules' => 'trim|required|max_length[255]'
            )
        );
        /* Configura as validações */
        $this->form_validation->set_rules($validacoes);

        /* Executa a validação e caso houver erro chama a função que retorna ao formulário */
        if ($this->form_validation->run() === TRUE) {
            /* Chama a função de inserção de dados e em caso de sucesso retorna o id inserido */
            $id = $this->crud->insert('ta_tipo_telefone', $data);
            /* Verifica se o retorno da função é um valor numérico e maior que 0 */
            if (is_numeric($id) && $id > 0){
                $this->sucesso();
            } else {
                $this->erro();
            }
        /* Em caso de falha: */
        } else {
            $this->form_tipo_telefone();
        }
    }

    function form_graduacao() {
        $this->template->load('graduacao/form_cadastro');
    }

    function insert_graduacao() {
        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                $data[$key] = $value;
            }
        }
        $validacoes = array(
            array(
                'field' => 'graduacao',
                'label' => 'Graduação',
                'rules' => 'trim|required|max_length[50]'
            )
        );
        /* Configura as validações */
        $this->form_validation->set_rules($validacoes);

        /* Executa a validação e caso houver erro chama a função que retorna ao formulário */
        if ($this->form_validation->run() === TRUE) {
            /* Chama a função de inserção de dados e em caso de sucesso retorna o id inserido */
            $id = $this->crud->insert('ta_graduacao', $data);
            /* Verifica se o retorno da função é um valor numérico e maior que 0 */
            if (is_numeric($id) && $id > 0){
                $this->sucesso();
            } else {
                $this->erro();
            }
        /* Em caso de falha: */
        } else {
            $this->form_graduacao();
        }
    }


    function form_situacao() {
        $this->template->load('situacao/form_cadastro');
    }

    function insert_situacao() {
        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                $data[$key] = $value;
            }
        }
        $validacoes = array(
            array(
                'field' => 'nm_situacao',
                'label' => 'Nome',
                'rules' => 'trim|required|max_length[50]'
            ),
            array(
                'field' => 'descricao_situacao',
                'label' => 'Descrição',
                'rules' => 'trim|required|max_length[255]'
            )
        );
        /* Configura as validações */
        $this->form_validation->set_rules($validacoes);

        /* Executa a validação e caso houver erro chama a função que retorna ao formulário */
        if ($this->form_validation->run() === TRUE) {
            /* Chama a função de inserção de dados e em caso de sucesso retorna o id inserido */
            $id = $this->crud->insert('ta_situacao', $data);
            /* Verifica se o retorno da função é um valor numérico e maior que 0 */
            if (is_numeric($id) && $id > 0){
                $this->sucesso();
            } else {
                $this->erro();
            }
        /* Em caso de falha: */
        } else {
            $this->form_situacao();
        }
    }

    function form_pais() {
        $this->template->load('pais/form_cadastro');
    }

    function insert_pais() {
        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                $data[$key] = $value;
            }
        }
        $validacoes = array(
            array(
                'field' => 'nm_pais',
                'label' => 'Nome',
                'rules' => 'trim|required|max_length[255]'
            )
        );
        /* Configura as validações */
        $this->form_validation->set_rules($validacoes);

        /* Executa a validação e caso houver erro chama a função que retorna ao formulário */
        if ($this->form_validation->run() === TRUE) {
            /* Chama a função de inserção de dados e em caso de sucesso retorna o id inserido */
            $id = $this->crud->insert('ta_pais', $data);
            /* Verifica se o retorno da função é um valor numérico e maior que 0 */
            if (is_numeric($id) && $id > 0){
                $this->sucesso();
            } else {
                $this->erro();
            }
        /* Em caso de falha: */
        } else {
            $this->form_situacao();
        }
    }

    function form_estado() {
        $data['paises'] = $this->get_all('ta_pais');
        $data['estados'] = $this->get_all('ta_estado');
        $this->template->load('estado/form_cadastro', $data);
    }

    function insert_estado() {
        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                $data[$key] = $value;
            }
        }
        $validacoes = array(
            array(
                'field' => 'id_ta_pais',
                'label' => 'Nome',
                'rules' => 'trim|required|max_length[255]'
            ),
            array(
                'field' => 'nm_estado',
                'label' => 'Nome',
                'rules' => 'trim|required|max_length[255]'
            ),
            array(
                'field' => 'sigla',
                'label' => 'Sigla',
                'rules' => 'trim|required|max_length[5]'
            )
        );
        /* Configura as validações */
        $this->form_validation->set_rules($validacoes);

        /* Executa a validação e caso houver erro chama a função que retorna ao formulário */
        if ($this->form_validation->run() === TRUE) {
            /* Chama a função de inserção de dados e em caso de sucesso retorna o id inserido */
            $id = $this->crud->insert('ta_estado', $data);
            /* Verifica se o retorno da função é um valor numérico e maior que 0 */
            if (is_numeric($id) && $id > 0){
                $this->sucesso();
            } else {
                $this->erro();
            }
        /* Em caso de falha: */
        } else {
            $this->form_situacao();
        }
    }

    function form_cidade() {
        $data['paises'] = $this->get_all('ta_pais');
        $this->template->load('cidade/form_cadastro', $data);
    }

    function insert_cidade() {
        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                $data[$key] = $value;
            }
        }
        $validacoes = array(
            array(
                'field' => 'id_ta_pais',
                'label' => 'Nome',
                'rules' => 'trim|required|max_length[11]'
            ),
            array(
                'field' => 'nm_estado',
                'label' => 'Nome',
                'rules' => 'trim|required|max_length[255]'
            ),
            array(
                'field' => 'sigla',
                'label' => 'Sigla',
                'rules' => 'trim|required|max_length[5]'
            )
        );
        /* Configura as validações */
        $this->form_validation->set_rules($validacoes);

        /* Executa a validação e caso houver erro chama a função que retorna ao formulário */
        if ($this->form_validation->run() === TRUE) {
            /* Chama a função de inserção de dados e em caso de sucesso retorna o id inserido */
            $id = $this->crud->insert('ta_cidade', $data);
            /* Verifica se o retorno da função é um valor numérico e maior que 0 */
            if (is_numeric($id) && $id > 0){
                $this->sucesso();
            } else {
                $this->erro();
            }
        /* Em caso de falha: */
        } else {
            $this->form_situacao();
        }
    }

    public function form_aluno(){
        $this->load->model('usuario_model', 'usuario');
        $data['paises'] = $this->get_all('ta_pais');
        $data['estados'] = $this->get_all('ta_estado');
        $data['cidades'] = $this->get_all('ta_cidade');
        $data['tipos_telefone'] = $this->get_all('ta_tipo_telefone');
        $data['tipos_usuario'] = $this->usuario->get_tipo_usuario()->result();
        $data['situacoes'] = $this->crud->get_all('ta_situacao')->result();
        //$data['horario'] = $this->crud->get_horario_somente();
        $data['turma'] = $this->crud->get_all('turma');
        $data['id_horario'] = null; 
        $this->template->load('aluno/form_cadastro', $data);
    }

    function insert_aluno() {
        /* Define as tags onde a mensagem de erro será exibida na página */
        $this->form_validation->set_error_delimiters('<span class="alert alert-danger">', '</span>');
        $data = new stdClass();
            /* Recebe os dados do formulário (visão) */
            foreach ($this->input->post() as $key => $value){
                $data->$key = $value;
            }
        $id_turma = $this->input->post('id_horario');
        /* Define as regras para validação */
        $validacoes = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'required|min_length[3]|max_length[50]'
            ),
            array(
                'field' => 'sobrenome',
                'label' => 'Sobrenome',
                'rules' => 'trim|required|max_length[100]'
            ),            
            array(
                'field' => 'dt_nascimento',
                'label' => 'Data de nascimenot',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'peso',
                'label' => 'Peso',
                'rules' => 'trim|required|max_length[5]'
            ),
            array(
                'field' => 'altura',
                'label' => 'Altura',
                'rules' => 'trim|required|max_length[4]'
            ),
            array(
                'field' => 'tipo_sanguineo',
                'label' => 'Tipo sanguíneo',
                'rules' => 'trim|required|max_length[3]'
            ),
            array(
                'field' => 'sexo',
                'label' => 'Sexo',
                'rules' => 'trim|required|max_length[1]'
            ),
            array(
                'field' => 'observacao',
                'label' => 'Observação',
                'rules' => 'trim|max_length[255]'
            ),
            array(
                'field' => 'id_ta_cidade',
                'label' => 'Cidade',
                'rules' => 'trim|required|max_length[11]'
            ),
            array(
                'field' => 'logradouro',
                'label' => 'Logradouro',
                'rules' => 'trim|required|max_length[255]'
            ),
            array(
                'field' => 'numero',
                'label' => 'Número',
                'rules' => 'trim|required|max_length[10]'
            ),
            array(
                'field' => 'cep',
                'label' => 'CEP',
                'rules' => 'trim|required|max_length[9]'
            ),
            array(
                'field' => 'complemento',
                'label' => 'Complemento',
                'rules' => 'trim|required|max_length[255]'
            ),
            array(
                'field' => 'id_ta_tipo_telefone',
                'label' => 'Tipo de telefone',
                'rules' => 'trim|required|max_length[11]'
            ),
            array(
                'field' => 'telefone',
                'label' => 'Telefone',
                'rules' => 'trim|required|max_length[20]'
            ),
            array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'trim|required|valid_email|max_length[150]'
            ),
            array(
                'field' => 'dia_vencimento',
                'label' => 'Dia de vencimento',
                'rules' => 'trim|required|max_length[2]'
            ),                      
            array(
                'field' => 'id_turma',
                'label' => 'Turma',
                'rules' => 'required'
            )
        );

        if (!empty($data->nome_responsavel)) {
            $validacores_responsavel = array(
                array(
                    'field' => 'nome_responsavel',
                    'label' => 'Nome do responsável',
                    'rules' => 'trim|required|max_length[50]'
                ),
                array(
                    'field' => 'sobrenome_responsavel',
                    'label' => 'Sobrenome do Responsável',
                    'rules' => 'trim|required|max_length[100]'
                ),
                array(
                    'field' => 'dt_nascimento_responsavel',
                    'label' => 'Data de nascimento do responsável',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'email_responsavel',
                    'label' => 'E-mail do responsável',
                    'rules' => 'trim|required|valid_email'
                ),
                array(
                    'field' => 'sexo_responsavel',
                    'label' => 'Sexo do responsável',
                    'rules' => 'trim|required|max_length[1]'
                )
            );
            
            if (!empty($data->id_ta_tipo_telefone_2)) {
                $validacao_telefone_2 = array(
                    array(
                        'field' => 'id_ta_tipo_telefone_2',
                        'label' => 'Tipo de telefone',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'telefone_2',
                        'label' => 'Telefone',
                        'rules' => 'trim|required'
                    )
                );
            }
            $validacoes = array_merge($validacoes, $validacores_responsavel, $validacao_telefone_2);
        }


        $this->form_validation->set_rules($validacoes);

        /* Executa a validação e caso houver erro chama a função que retorna ao formulário */
        if ($this->form_validation->run() === FALSE) {
            $this->form_aluno();
        /* Senão, caso sucesso: */
        } else {

            /* Abre uma transação */
            $this->db->trans_start();


            /* Dados para cadastro de pessoa */
            $pessoa = new stdClass();
            $pessoa->nome = $data->nome;
            $pessoa->dt_nascimento = $data->dt_nascimento;
            $pessoa->email = $data->email;
            $id_pessoa = $this->crud->insert('pessoa', $pessoa);

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
            $pessoa_telefone->ddd = substr($data->telefone, 0,2);
            $pessoa_telefone->telefone = substr($data->telefone, 2, strlen($data->telefone));
            $this->crud->insert('pessoa_telefone', $pessoa_telefone);

            $pessoa_fisica = new stdClass();
            $pessoa_fisica->id_pessoa_fisica = $id_pessoa;
            $pessoa_fisica->sobrenome = $data->sobrenome;
            $pessoa_fisica->tipo_sanguineo = $data->tipo_sanguineo;
            $pessoa_fisica->sexo = $data->sexo;
            $pessoa_fisica->cpf = $data->cpf;
            $this->crud->insert('pessoa_fisica', $pessoa_fisica);

            /* Dados para cadastro de dados de pessoa */
            $pessoa_dados = new stdClass();
            $pessoa_dados->id_pessoa_fisica = $id_pessoa;
            $pessoa_dados->peso = $data->peso;
            $pessoa_dados->altura = $data->altura;
            $pessoa_dados->dt_dados = $data->dt_matricula;
            $this->crud->insert('pessoa_dados', $pessoa_dados);

            $aluno = new stdClass();
            $aluno->observacao = $data->observacao;
            $aluno->id_pessoa_fisica = $id_pessoa;
            $id_aluno = $this->crud->insert('aluno', $aluno);

            if (!empty($data->nome_responsavel)) {
                /* Dados para cadastro de pessoa para responsável */
                $pessoa = new stdClass();
                $pessoa->nome = $data->nome_responsavel;
                $pessoa->dt_nascimento = $data->dt_nascimento_responsavel;
                $pessoa->email = $data->email_responsavel;
                $id_responsavel = $this->crud->insert('pessoa', $pessoa);

                /* Dados para cadastro de pessoa para responsável */
                $pessoa_fisica = new stdClass();
                $pessoa_fisica->id_pessoa_fisica = $id_responsavel;
                $pessoa_fisica->sobrenome = $data->sobrenome_responsavel;
                $pessoa_fisica->sexo = $data->sexo_responsavel;
                $id_pessoa_fisica = $this->crud->insert('pessoa_fisica', $pessoa_fisica);

                /* Dados para cadastro da tabela aluno_responsavel para responsável */
                $aluno_responsavel = new stdClass();
                $aluno_responsavel->id_responsavel = $id_pessoa_fisica;
                $aluno_responsavel->id_aluno = $data->observacao;
                $aluno_responsavel->observacao = $id_pessoa;
                $aluno_responsavel = $this->crud->insert('aluno_responsavel', $aluno_responsavel);
            }

            $matricula = new stdClass();
            $matricula->id_ta_situacao = 1;
            $matricula->dia_vencimento = $data->dia_vencimento;
            $matricula->dt_matricula = $data->dt_matricula;
            $matricula->desconto = $data->desconto;
            //$matricula->valor_mensalidade = $data->valor_mensalidade;
            $matricula->id_pessoa_fisica = $id_pessoa;
            $matricula->id_aluno = $id_aluno;
            $id_matricula=$this->crud->insert('matricula', $matricula);          

           /* $usuario = new stdClass();
            $usuario->login = $data->login;
            $usuario->senha = hash('sha256', $data->senha);
            $usuario->id_ta_situacao = $data->id_ta_situacao;
            $usuario->id_ta_tipo_usuario = $data->id_ta_tipo_usuario;
            $usuario->id_pessoa = $id_pessoa;
            $id_usuario = $this->crud->insert('usuario', $usuario);*/

            $matricula_turma = new stdClass();
            $matricula_turma->id_matricula = $id_matricula;
            $matricula_turma->id_turma = $id_turma;//
            //die(print_r($this->crud->get_turma_somente($id_horario)));
            //$matricula_turma->id_turma = $this->crud->get_turma_somente($id_horario);
            $id_usuario = $this->crud->insert('matricula_turma', $matricula_turma);
            
            $matricula_graduacao = new stdClass();
            $matricula_graduacao->id_matricula = $id_matricula;
            $matricula_graduacao->id_ta_graduacao = 1;
            $matricula_graduacao->observacao = "recem matriculado";
            $this->crud->insert('matricula_graduacao', $matricula_graduacao);
            /* Fecha a transação */
            $this->db->trans_complete();           

            if ($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();
                $this->sucesso();
            } else {
                $this->db->trans_rollback();
                log_message('error', 'Erro ao inserir a aluno.', 'FALSE');
                $this->erro();
            }
        }
    }
    
    function get_info_turma($id_turma){
            
        //$id_turma = $this->uri->segment(3);
        if(!isset($id_turma)){
            $id_turma = $this->input->post("id_turma");
        }
        //$id_turma = "id_turma";
        
        $info = $this->crud->get_info_turma($id_turma)->result();
       /* echo "<pre>";
        die(print_r($info));*/
        //die(print_r($this->object_to_option($estados, 'id_ta_estado', 'nm_estado')));
        //echo $this->object_to_option($info, 'id_turma', 'nome'); 
        $option = "Instrutor: ";
        $ultimo_instrutor = "";
        $ultimo_dia = "";
        foreach ($info as $each) {
            $aux = "";
            //$option .= "<option value='" . $each->$value . "'>" . $each->$display . "</option>";
            if ($ultimo_instrutor != $each->nome ." ". $each->sobrenome) {
                $aux ="<b>" . $each->nome ." ". $each->sobrenome . "</b>";
            }          
            if (isset($each->dia_semana) && $each->dia_semana != $ultimo_dia){  
                switch($each->dia_semana){
                    case 0:
                        $dia="Domingo";
                    break;
                    case 1:
                        $dia="Segunda-feira";
                    break;
                    case 2:
                        $dia="Terça-feira";
                    break;
                    case 3:
                        $dia="Quarta-feira";
                    break;
                    case 4:
                        $dia="Quinta-feira";
                    break;
                    case 5:
                        $dia="Sexta-feira";
                    break;
                    case 6:
                        $dia="Sábado";
                    break;
                }
                $aux .= "<br /><br /> Dia da semana: <b>" . $dia . "</b><br />";
                $ultimo_dia = $dia;
                
            }
            $aux .= "&nbsp;&nbsp; Horário: " . $each->hr_inicio . " às " . $each->hr_termino; 
            $ultimo_instrutor = $each->nome ." ". $each->sobrenome;
            $option .= $aux;
        }
        echo $option;
    }

    function form_instrutor() {
        $this->load->model('usuario_model', 'usuario');
        $data['paises'] = $this->get_all('ta_pais');
        $data['estados'] = $this->get_all('ta_estado');
        $data['cidades'] = $this->get_all('ta_cidade');
        $data['tipos_usuario'] = $this->usuario->get_tipo_usuario()->result();
        $data['situacoes'] = $this->crud->get_all('ta_situacao')->result();
        $data['tipos_telefone'] = $this->get_all('ta_tipo_telefone');
        $this->template->load('instrutor/form_cadastro', $data);
    }

    function insert_instrutor() {
        $this->form_validation->set_error_delimiters('<span class="alert alert-danger">', '</span>');
        $data = new stdClass();
        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                $data->$key = $value;
            }
        }
        $validacoes = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'trim|required|max_length[50]'
            ),
            array(
                'field' => 'sobrenome',
                'label' => 'Nome',
                'rules' => 'trim|required|max_length[100]'
            ),
            array(
                'field' => 'cpf',
                'label' => 'CPF',
                'rules' => 'trim|required|max_length[14]'
            ),
            array(
                'field' => 'dt_nascimento',
                'label' => 'Data de nascimento',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'tipo_sanguineo',
                'label' => 'Tipo sanguineo',
                'rules' => 'trim|required|max_length[3]'
            ),
            array(
                'field' => 'sexo',
                'label' => 'Sexo',
                'rules' => 'trim|required|max_length[5]'
            ),
            array(
                'field' => 'id_ta_cidade',
                'label' => 'Cidade',
                'rules' => 'required|max_length[11]'
            ),
            array(
                'field' => 'id_ta_cidade',
                'label' => 'Cidade',
                'rules' => 'required|max_length[11]'
            ),
            array(
                'field' => 'id_ta_cidade',
                'label' => 'Cidade',
                'rules' => 'required|max_length[11]'
            ),
            array(
                'field' => 'logradouro',
                'label' => 'Logradouro',
                'rules' => 'trim|required|max_length[255]'
            ),
            array(
                'field' => 'numero',
                'label' => 'Número',
                'rules' => 'trim|required|max_length[10]'
            ),
            array(
                'field' => 'cep',
                'label' => 'CEP',
                'rules' => 'trim|required|max_length[9]'
            ),
            array(
                'field' => 'complemento',
                'label' => 'Complemento',
                'rules' => 'trim|required|max_length[255]'
            ),
            array(
                'field' => 'id_ta_tipo_telefone',
                'label' => 'Tipo do telefone',
                'rules' => 'trim|required|max_length[11]'
            ),
            array(
                'field' => 'telefone',
                'label' => 'Telefone',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'trim|required'
            )
        );
        if (!empty($data->login)) {
            $validacores_usuario = array(
                array(
                    'field' => 'login',
                    'label' => 'Login',
                    'rules' => 'trim|required|max_length[50]'
                ),
                array(
                    'field' => 'senha',
                    'label' => 'Senha',
                    'rules' => 'trim|required|max_length[100]'
                ),
                array(
                    'field' => 'id_ta_situacao',
                    'label' => 'Situação',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'id_ta_tipo_usuario',
                    'label' => 'Tipo usuário',
                    'rules' => 'trim|required'
                )
            );
            
            $validacoes = array_merge($validacoes, $validacores_usuario);
        }
        
        if(!empty($data->id_ta_tipo_telefone_2)){
            $validacoes_telefone = array(
                array(
                    'field' => 'id_ta_tipo_telefone_2',
                    'label' => 'Tipo do telefone',
                    'rules' => 'trim|required|max_length[11]'
                ),
                array(
                    'field' => 'telefone_2',
                    'label' => 'Telefone',
                    'rules' => 'trim|required'
                )
            );
            $validacoes = array_merge($validacoes, $validacoes_telefone);
        }
        
        /* Configura as validações */
        $this->form_validation->set_rules($validacoes);

        /* Executa a validação e caso houver erro chama a função que retorna ao formulário */
        if ($this->form_validation->run() === TRUE) {
            /* Abre uma transação */
            $this->db->trans_start();
            
            /* Dados para cadastro de pessoa */
            $pessoa = new stdClass();
            $pessoa->nome = $data->nome;
            $pessoa->dt_nascimento = $data->dt_nascimento;
            $pessoa->email = $data->email;
            $id_pessoa = $this->crud->insert('pessoa', $pessoa);

            /* Dados para cadastro de pessoa */
            $pessoa_fisica = new stdClass();
            $pessoa_fisica->id_pessoa_fisica = $id_pessoa;
            $pessoa_fisica->sobrenome = $data->sobrenome;
            $pessoa_fisica->tipo_sanguineo = $data->tipo_sanguineo;
            $pessoa_fisica->sexo = $data->sexo;
            $pessoa_fisica->cpf = $data->cpf;
            $id_pessoa_fisica = $this->crud->insert('pessoa_fisica', $pessoa_fisica);

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
            $pessoa_telefone->ddd = substr($data->telefone, 0,2);
            $pessoa_telefone->telefone = substr($data->telefone, 2, strlen($data->telefone));
            $this->crud->insert('pessoa_telefone', $pessoa_telefone);
                
            if(!empty($data->id_ta_tipo_telefone_2)){
                $pessoa_telefone_2 = new stdClass();
                $pessoa_telefone_2->id_pessoa = $id_pessoa;
                $pessoa_telefone_2->id_ta_tipo_telefone = $data->id_ta_tipo_telefone_2;
                $pessoa_telefone_2->ddd = substr($data->telefone_2, 0,2);
                $pessoa_telefone_2->telefone = substr($data->telefone_2, 2, strlen($data->telefone_2));
                $this->crud->insert('pessoa_telefone', $pessoa_telefone_2);                
            }
            
            if(!empty($data->login)){
                $usuario = new stdClass();
                $usuario->login = $data->login;
                $usuario->senha = hash('sha256', $data->senha);
                $usuario->id_ta_situacao = $data->id_ta_situacao;
                $usuario->id_ta_tipo_usuario = $data->id_ta_tipo_usuario;
                $usuario->id_pessoa = $id_pessoa;
                $id_usuario = $this->crud->insert('usuario', $usuario);
            }
            
            $instrutor = new stdClass();
            $instrutor->id_pessoa_fisica = $id_pessoa;
            $this->crud->insert('instrutor', $instrutor);

            /* Fecha a transação */
            $this->db->trans_complete();

            if ($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();
                $this->sucesso();
            } else {
                $this->db->trans_rollback();
                log_message('error', 'Erro ao inserir instrutor.', 'FALSE');
                $this->erro();
            }
        /* Em caso de falha: */
        } else {
            $this->form_instrutor();
        }
    }

    function form_exame() {
        $data['arte_marcial'] = $this->get_all('arte_marcial');
        $data['graduacao'] = $this->get_all('ta_graduacao');
        $data['aluno'] = $this->crud->get_alunos()->result();
        $this->template->load('exame/form_cadastro', $data);
    }

    function insert_exame() {
        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                $data[$key] = $value;
            }
        }
       // die(print_r($data));
        $result = $this->crud->get_matricula_alu($data['id_aluno']);
        $validacoes = array(
            array(
                'field' => 'id_ta_graduacao',
                'label' => 'Graduação',
                'rules' => 'trim|required|max_length[11]'
            ),
            array(
                'field' => 'id_arte_marcial',
                'label' => 'Arte marcial',
                'rules' => 'trim|required|max_length[11]'
            ),
            array(
                'field' => 'dt_exame',
                'label' => 'Data do exame',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'valor',
                'label' => 'Valor',
                'rules' => 'trim|max_length[10]'
            ),
            array(
                'field' => 'local',
                'label' => 'Local',
                'rules' => 'trim|required|max_length[255]'
            ),
            array(
                'field' => 'descricao',
                'label' => 'Descrição',
                'rules' => 'trim|required|max_length[255]'
            )/*,
            array(
                'field' => 'id_matricula',
                'label' => '1',
                'rules' => 'trim|required|max_length[11]'
            )*/
        );
        foreach($result->result_array() as $row){            
            if($row['id_matricula']){
                $data['id_matricula']=$row['id_matricula'];                
            }
        }
        unset($data['id_aluno']);
        //$this->removeFromArray($data, $data['id_aluno']);
       //die(print_r($data));
        /* Configura as validações */
        $this->form_validation->set_rules($validacoes);
        /* Executa a validação e caso houver erro chama a função que retorna ao formulário */
        if ($this->form_validation->run() === TRUE) {
            /* Chama a função de inserção de dados e em caso de sucesso retorna o id inserido */
            $id = $this->crud->insert('exame', $data);
            /* Verifica se o retorno da função é um valor numérico e maior que 0 */
            if (is_numeric($id) && $id > 0){
                $this->sucesso();
            } else {
                $this->erro();
            }
        /* Em caso de falha: */
        } else {
            $this->form_exame();
        }
    }   

    public function form_turma(){
        $data['arte_marcial'] = $this->get_all('arte_marcial');
        $data['instrutor'] = $this->crud->get_instrutores();
        $this->template->load('turma/form_cadastro', $data);
    }
    
    public function insert_turma(){
        
        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                $data[$key] = $value;
            }
        }
        //die(print_r($data));
        $this->form_validation->set_error_delimiters('<span class="alert alert-danger">', '</span>');
        $validacoes = array(
            array(
                'field' => 'nm_turma',
                'label' => 'Nome da turma',
                'rules' => 'trim|required|max_length[50]'
            ),
            array(
                'field' => 'dia_semana',
                'label' => 'Dia da Semana',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'hr_inicio',
                'label' => 'Hora Início',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'hr_termino',
                'label' => 'Hora de Início',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'id_arte_marcial',
                'label' => 'Arte Marcial',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'id_instrutor',
                'label' => 'Instrutor',
                'rules' => 'required'
            ),
            array(
                'field' => 'max_aluno',
                'label' => 'Máximo de alunos',
                'rules' => 'required'
            ),
            array(
                'field' => 'dt_inicio',
                'label' => 'Data de início',
                'rules' => 'required'
            ),
            array(
                'field' => 'valor_mensalidade',
                'label' => 'Valor mensalidade',
                'rules' => 'trim|required|max_length[10]'
            )
        );
        
        if (!empty($data['dia_semana_2'])) {
            $validacoes_dia_2 = array(
                array(
                    'field' => 'dia_semana_2',
                    'label' => 'Dia da Semana',
                    'rules' => 'trim|required'  
                ),
                array(
                    'field' => 'hr_inicio_2',
                    'label' => 'Hora Início',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'hr_termino_2',
                    'label' => 'Hora de Início',
                    'rules' => 'trim|required'
                )
            );
            $validacoes = array_merge($validacoes, $validacoes_dia_2);
        }
        
        if (!empty($data['dia_semana_3'])) {
            $validacoes_dia_3 = array(
                array(
                    'field' => 'dia_semana_3',
                    'label' => 'Dia da Semana',
                    'rules' => 'trim|required'  
                ),
                array(
                    'field' => 'hr_inicio_3',
                    'label' => 'Hora Início',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'hr_termino_3',
                    'label' => 'Hora de Início',
                    'rules' => 'trim|required'
                )
            );
            $validacoes = array_merge($validacoes, $validacoes_dia_3);
        }
        
        $this->form_validation->set_rules($validacoes);
        /* Executa a validação e caso houver erro chama a função que retorna ao formulário */
         
        //die(print_r($data));      
        if ($this->form_validation->run() === TRUE) {
            /* Chama a função de inserção de dados e em caso de sucesso retorna o id inserido */
            
            $turma = new stdClass();
            $turma->nm_turma = $data['nm_turma'];
            $turma->max_aluno = $data['max_aluno'];
            $turma->valor_mensalidade = $data['valor_mensalidade'];
            $turma->dt_inicio = $data['dt_inicio'];
            
            $id_turma = $this->crud->insert('turma', $turma);
            
            $horario = new stdClass();
            $horario->hr_inicio = $data['hr_inicio'];
            $horario->hr_termino = $data['hr_termino'];
            $horario->dia_semana = $data['dia_semana'];
            $horario->id_instrutor = $data['id_instrutor'];
            $horario->id_turma = $id_turma;
            
            $this->crud->insert('horario', $horario);            
            
            if (!empty($data['dia_semana_2'])) {
                $horario_2 = new stdClass();
                $horario_2->hr_inicio = $data['hr_inicio_2'];
                $horario_2->hr_termino = $data['hr_termino_2'];
                $horario_2->dia_semana = $data['dia_semana_2'];
                $horario_2->id_instrutor = $data['id_instrutor'];
                $horario_2->id_turma = $id_turma;
                
                $this->crud->insert('horario', $horario_2);                
            }
            if (!empty($data['dia_semana_3'])) {
                $horario_3 = new stdClass();
                $horario_3->hr_inicio = $data['hr_inicio_3'];
                $horario_3->hr_termino = $data['hr_termino_3'];
                $horario_3->dia_semana = $data['dia_semana_3'];
                $horario_3->id_instrutor = $data['id_instrutor'];
                $horario_3->id_turma = $id_turma;
                
                $this->crud->insert('horario', $horario_3);                 
            }            
            
            if (is_numeric($id_turma) && $id_turma > 0){
                $this->sucesso();
            } else {
                $this->erro();
            }
        /* Em caso de falha: */
        } else 
            $this->form_turma();
    }
    
    public function form_aula(){
        $data['arte_marcial'] = $this->get_all('arte_marcial');
        //$data['instrutor'] = $this->crud->get_instrutores();
        $data['horario'] = $this->crud->get_horario_somente();        
        $this->template->load('aula/form_cadastro', $data);
    }
    
    public function insert_aula(){

        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                $data[$key] = $value;
            }
        }
        //die(print_r($data));
        $this->form_validation->set_error_delimiters('<span class="alert alert-danger">', '</span>');
        $validacoes = array(
            array(
                'field' => 'id_arte_marcial',
                'label' => 'Arte Marcial',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'dt_aula',
                'label' => 'Data Aula',
                'rules' => 'required'
            ),
            array(
                'field' => 'id_horario',
                'label' => 'Horário',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validacoes);
        
        if ($this->form_validation->run() === TRUE) {
            /* Chama a função de inserção de dados e em caso de sucesso retorna o id inserido */
            $id = $this->crud->insert('aula', $data);
            /* Verifica se o retorno da função é um valor numérico e maior que 0 */
            if (is_numeric($id) && $id > 0){
                $this->sucesso();
            } else {
                $this->erro();
            }
        /* Em caso de falha: */
        } else {
            $this->form_aula();
        }
    }
        
    
    public function form_plano_aula(){          
        $data['aula'] = $this->get_all('aula');
        $data['atividade'] = $this->get_all('ta_atividade');        
        $this->template->load('plano_aula/form_cadastro', $data);    
    }
    
    public function insert_plano_aula(){
        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                $data[$key] = $value;
            }
        }
        
        $this->form_validation->set_error_delimiters('<span class="alert alert-danger">', '</span>');
        $validacoes = array(
            array(
                'field' => 'id_aula',
                'label' => 'Aula',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'id_ta_atividade',
                'label' => 'Atividade',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validacoes);
        
        if ($this->form_validation->run() === TRUE) {
            /* Chama a função de inserção de dados e em caso de sucesso retorna o id inserido */
            $id = $this->crud->insert('plano_aula', $data);
            /* Verifica se o retorno da função é um valor numérico e maior que 0 */
            if (is_numeric($id) && $id > 0){
                $this->sucesso();
            } else {
                $this->erro();
            }
        /* Em caso de falha: */
        } else {
            $this->form_aula();
        }
        
    }

    public function object_to_option($data, $value, $display) {
        $option = "";
        foreach ($data as $each) {
            $option .= "<option value='" . $each->$value . "'>" . $each->$display . "</option>";
        }
        return $option;
    }

    /* Mensagens de sucesso */

    public function sucesso($msg = null) {
        if ($msg != null){
            $this->template->load("mensagem/sucesso", $msg);
        } else {
            $this->template->load("mensagem/sucesso");
        }
    }

    /* Mensagens de erro */
    public function erro($msg = null) {
        if ($msg != null){
            $this->template->load("mensagem/erro", $msg);
        } else {
            $this->template->load("mensagem/erro");
        }
    }

    /* Mensagens de alerta */
    public function alerta($msg = null) {
        if ($msg != null){
            $this->template->load("mensagem/alerta", $msg);
        } else {
            $this->template->load("mensagem/alerta");
        }
    }
    
    public function get_estado_pais($id_pais) {
        $id_pais = $this->uri->segment(3);
        if(!isset($id_pais)){
            $id_pais = $this->input->post("id_ta_pais");
        }
        $id_ta_pais = "id_ta_pais = $id_pais";
        $estados = $this->crud->get_where("ta_estado", $id_ta_pais)->result();
        //die(print_r($this->object_to_option($estados, 'id_ta_estado', 'nm_estado')));
        echo $this->object_to_option($estados, 'id_ta_estado', 'nm_estado');
    }

    public function get_all($table) {
        return $this->crud->get_all($table)->result();
    }

    /* Retorna todos os registros da "$table" onde o "$campo" = "$valor" */
    public function get_where($table, $field, $value){
        return $this->crud->get_all($table)->result();
    }

}