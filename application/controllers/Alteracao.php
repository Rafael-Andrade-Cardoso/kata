<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alteracao extends MY_Controller {


    public function __construct() {
        parent:: __construct();
        $this->load->model('crud_model', 'crud');
        //$this->load->model('usuario_model', 'usuario');
    }

    public function form_alterar_aula() {
        $data = array();
        $id_aula = $this->uri->segment(3);
        if($id_aula == NULL){
            redirect('relatorio/aula');
        }
        
        $data['arte_marcial'] = $this->crud->get_all('arte_marcial')->result();
        $data['turma'] = $this->crud->get_all('turma')->result();           
        $data['atividade'] = $this->crud->get_all('ta_atividade')->result();    
        $data['query'] = $this->crud->get_aula($id_aula, 1)->row();
        $query = $this->crud->get_aula($id_aula, 1);        
        for($i=0;$i<$query->num_rows();$i++){
            $data['query'.$i] = $query->row($i);
        }
        $data['i'] = $i;
        $teste = $data['query'];
        $data['horario'] = $this->crud->get_where('horario', 'id_turma ='.$teste->id_turma)->result();
        $this->template->load('aula/form_alterar', $data);
    }


    public function alterar_aula() {
        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                //echo $value;
                $data[$key] = $value;
            }
        }
        $id_aula = $this->input->post('id_aula');
        $data['id_aula'] = $id_aula;
        $atividade = $this->input->post('id_ta_atividade');
        $query_atividade = $this->crud->get_aula($id_aula, 1)->result();
        $i=0;
        /*foreach($query as $value){
                if($value == $atividade[$i])
                    $i++;
                echo $atividade[$i];
                echo print_r($value) .'-';
                
        }
        die(print_r($i));*/
        $this->form_validation->set_error_delimiters('<span class="alert alert-danger">', '</span>');
        $validacoes = array(
            array(
                'field' => 'id_turma',
                'label' => 'Turma',
                'rules' => 'required'
            ),
            array(
                'field' => 'id_horario',
                'label' => 'Horário',
                'rules' => 'required'
            ),
            array(
                'field' => 'id_arte_marcial',
                'label' => 'Arte Marcial',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'dt_aula',
                'label' => 'Data Aula',
                'rules' => 'required'
            )           
        );
        $this->form_validation->set_rules($validacoes);
        
        /* Executa a validação e caso houver erro chama a função que retorna ao formulário */
        if ($this->form_validation->run() === FALSE) {
            //redirect('relatorio/aula/lista');
            $this->form_alterar_aula();
        /* Senão, caso sucesso: */
        } else {
            $idaula='';
            $aula = new stdClass();
            $aula->id_arte_marcial = $data['id_arte_marcial'];
            $aula->dt_aula = $data['dt_aula'];
            $aula->id_horario = $data['id_horario'];
            $aula->observacao = $data['observacao'];
            $aula->ativo = 1;
            /* Chama a função de inserção de dados e em caso de sucesso retorna o id inserido */
            //$idaula = $this->crud->update('aula', 'id_aula', $data['id_aula'], $aula);
            
            /*if(count($atividade)>1){
                $i=0;
                while($i < count($data['id_ta_atividade'])){     
                    $plano_aula[$i] = new stdClass();
                    $plano_aula[$i]->id_aula = $id_aula;                
                    $plano_aula[$i]->id_ta_atividade = $atividade[$i];
                    $id_plano_aula = $this->crud->insert('plano_aula', $plano_aula[$i]);
                    $i++;
                }
            }else{
                $plano_aula = new stdClass();
                $plano_aula->id_aula = $id_aula;                
                $plano_aula->id_ta_atividade = $atividade[0];
                $id_plano_aula = $this->crud->insert('plano_aula', $plano_aula);
            } */
            //die(print_r($data));            
            $idaula = $this->crud->update('aula', 'id_aula', $id_aula, $aula);
           // die(print_r($idaula)); 
            if ($idaula){
                $this->session->set_flashdata('edicaook', 'Edição efetuada com sucesso');
                redirect(current_url());
            } else {
                $this->erro();
            }
        }
    }
    
    public function form_alterar_turma() {
        $data = array();
        $id_turma = $this->uri->segment(3);
        if($id_turma == NULL){
            redirect(current_url());
        }
        $i=0;
        $data['arte_marcial'] = $this->crud->get_all('arte_marcial')->result();
        $data['instrutor'] = $this->crud->get_instrutores()->result();
       // $data['query'] = $this->crud->get_turma($id_turma)->result();
        
        $query = $this->crud->get_turma($id_turma);
        /*echo "<pre>";
        die(print_r($query->result())); */
        if($query->num_rows() > 1){
            for($i=0;$i<$query->num_rows();$i++){
                $data['query'.$i] = $query->row($i);
            }
        }
        //$data['i'] = $i;
        $this->template->load('turma/form_alterar', $data);
    }
    
    public function alterar_turma(){
        $data = array();
        $id_turma = $this->uri->segment(3);
        if($id_turma == NULL){
            redirect('relatorio/aula');
        }
        
        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                $data[$key] = $value;
            }
        }        
        
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
        if ($this->form_validation->run() === FALSE) {
            //redirect('relatorio/aula/lista');
            $this->form_alterar_turma();
        /* Senão, caso sucesso: */
        } else {
                        
            $id_turma = $this->input->post('id_turma');
            $data['dia_semana'] = $this->input->post('dia_semana');
            $data['dia_semana_2'] = $this->input->post('dia_semana_2');
            $data['dia_semana_3'] = $this->input->post('dia_semana_3');
            
            $horarios_turma = $this->crud->get_where('horario', 'id_turma ='.$id_turma)->result();
            $i=0;
            $hor = array();
            foreach($horarios_turma as $value){
                $hor[$i] = $value->id_horario;
                $i++;
            }
            /**/
                        
            $this->db->trans_start();
            
            $turma = new stdClass();
            $turma->nm_turma = $data['nm_turma'];
            $turma->max_aluno = $data['max_aluno'];
            $turma->valor_mensalidade = $data['valor_mensalidade'];
            $turma->dt_inicio = $data['dt_inicio'];
            $turma->ativo = 1;
            $this->crud->update('turma', 'id_turma', $id_turma, $turma);
           // $id_turma = $this->crud->insert('turma', $turma);
            
            $horario = new stdClass();
            $horario->hr_inicio = $data['hr_inicio'];
            $horario->hr_termino = $data['hr_termino'];
            $data['dia_semana'] = $this->input->post('dia_semana');
            $horario->dia_semana = $data['dia_semana'];
            $horario->id_instrutor = $data['id_instrutor'];
            //$horario->id_turma = $id_turma;
            
            $where = 'id_turma ='.$id_turma .' and id_horario ='.$hor[0];
            $this->crud->update_complexo('horario', $where, $horario);
            
            if (!empty($data['dia_semana_2'])) {
                $horario_2 = new stdClass();
                $horario_2->hr_inicio = $data['hr_inicio_2'];
                $horario_2->hr_termino = $data['hr_termino_2'];
                $data['dia_semana_2'] = $this->input->post('dia_semana_2');                
                $horario_2->dia_semana = $data['dia_semana_2'];
                $horario_2->id_instrutor = $data['id_instrutor'];
                
                $where = 'id_turma ='.$id_turma .' and id_horario ='.$hor[1];
                $this->crud->update_complexo('horario', $where, $horario_2);                
            }
            if (!empty($data['dia_semana_3'])) {
                $horario_3 = new stdClass();
                $horario_3->hr_inicio = $data['hr_inicio_3'];
                $horario_3->hr_termino = $data['hr_termino_3'];
                $data['dia_semana_3'] = $this->input->post('dia_semana_3');
                $horario_3->dia_semana = $data['dia_semana_3'];
                $horario_3->id_instrutor = $data['id_instrutor'];
                
                $where = 'id_turma ='.$id_turma .' and id_horario ='.$hor[2];
                $this->crud->update_complexo('horario', $where, $horario_3);                
            }  
            /*echo "<pre>";
            die(print_r($data));*/            
            $this->db->trans_complete(); $this->db->trans_complete(); 
                       
            if ($this->db->trans_status() === TRUE) {
                $this->session->set_flashdata('edicaook', 'Edição efetuada com sucesso');
                redirect(current_url());
            } else {
                $this->db->trans_rollback();
                log_message('error', 'Erro ao inserir a aluno.', 'FALSE');
                $this->erro();
            }
        }
    }

    public function lista($qtd = 'null', $inicio = 'null') {
        //die($this->menu->get_all()->num_rows());
        $this->load->library('pagination');
        $config['base_url'] = base_url('menu/lista');
        $config['total_rows'] = $this->menu->lista()->num_rows();
        $config['per_page'] = 3;
        /* Tag que envolve todo o controle de paginação */
        $config['full_tag_open'] = '<span class="pagination">';
        $config['full_tag_close'] = '</span>';
        /* Tag do link de próximo */
        $config['next_link'] = '<span> > </span>';
        $config['prev_link'] = '<span> < </span>';
        /* Tag de número de página */
        $config['num_tag_open'] = '<span>';
        $config['num_tag_close'] = '</span> ';
        /* Utiliza o número da página na url ao invés do número de elementos */
        //$config['use_page_numbers'] = TRUE;
        /* Tag primeiro link */
        $config['first_link'] = '<span> << Primeiro </span>';
        /* Tag último link */
        $config['last_link'] = '<span> Último >> </span>';
        $config['attributes'] = array('class' => 'badge bg-pagination');
        /* Define $qtd */
        $qtd = $config['per_page'];
        /* Define $inicio */
        ($this->uri->segment(3) != '')? $inicio=$this->uri->segment(3): $inicio = 0;

        $this->pagination->initialize($config);
        $data = array();

        $data['menus'] = $this->menu->lista($qtd, $inicio)->result();
        $data['paginacao'] = $this->pagination->create_links();
        $this->template->load('menu/menu_list', $data);
    }
    
    public function form_alterar_aluno() {
        $data = array();
        $id_aluno = $this->uri->segment(3);
        if($id_aluno == NULL){
            redirect('aluno/lista');
        }
        
        $this->load->model('usuario_model', 'usuario');
        
        $data['paises'] = $this->crud->get_all('ta_pais')->result();
        $data['estados'] = $this->crud->get_all('ta_estado')->result();
        $data['cidades'] = $this->crud->get_all('ta_cidade')->result();
        $data['tipos_telefone'] = $this->crud->get_all('ta_tipo_telefone')->result();
        $data['tipos_usuario'] = $this->usuario->get_tipo_usuario()->result();
        $data['situacoes'] = $this->crud->get_all('ta_situacao')->result();
        //$data['horario'] = $this->crud->get_horario_somente();
        $data['turma'] = $this->crud->get_all('turma')->result();
        $data['id_horario'] = null;
        $data['query'] = $this->crud->get_info_alunos($id_aluno)->row(0);
        $data['query2'] = $this->crud->get_info_alunos($id_aluno)->row(5);
        /*echo "<pre>";
        die(print_r($data['query']));*/
        $this->template->load('aluno/form_alterar', $data);
    }
    
    public function alterar_aluno(){
        /* Define as tags onde a mensagem de erro será exibida na página */
        $this->form_validation->set_error_delimiters('<span class="alert alert-danger">', '</span>');
        $data = new stdClass();
        /* Recebe os dados do formulário (visão) */
        foreach ($this->input->post() as $key => $value){
            $data->$key = $value;
        }        
            //echo "<pre>";
            //die(print_r($data));
        $id_aluno = $this->input->post('id_aluno');
        $data->id_aluno = $id_aluno;
        /* Define as regras para validação */
        /*echo "<pre>";
        die(print_r($data));*/
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
            $this->form_alterar_aluno();
        /* Senão, caso sucesso: */
        } else {
            // Tabela, id que quero, condição
            $id_pessoa_fisica = $this->crud->get_id('aluno', 'id_pessoa_fisica', 'id_aluno='.$id_aluno)->row();
            $id_endereco = $this->crud->get_id('endereco', 'id_endereco', 'id_pessoa='.$id_pessoa_fisica->id_pessoa_fisica)->row();
            $id_matricula = $this->crud->get_id('matricula', 'id_matricula', 'id_aluno='.$id_aluno)->row();
            $id_pessoa_telefone = $this->crud->get_id('pessoa_telefone', 'id_pessoa_telefone', 'id_pessoa = '.$id_pessoa_fisica->id_pessoa_fisica)->row();
            $id_pessoa_dados = $this->crud->get_id('pessoa_dados', 'id_pessoa_dados', 'id_pessoa_fisica='.$id_pessoa_fisica->id_pessoa_fisica)->row();
            
            $id_turma = $this->input->post('id_turma');
            /* Abre uma transação */
            $this->db->trans_start();
            
            //die(print_r($id_endereco->id_endereco));
            
            $pessoa = new stdClass();
            $pessoa->nome = $data->nome;
            $pessoa->dt_nascimento = $data->dt_nascimento;
            $pessoa->email = $data->email;
            $id_pessoa = $this->crud->update('pessoa', 'id_pessoa', $id_pessoa_fisica->id_pessoa_fisica, $pessoa);
            
            $aluno = new stdClass();
            $aluno->observacao = $data->observacao;
            $aluno->ativo = 1;
            $this->crud->update('aluno','id_aluno',$data->id_aluno, $aluno);
            
            $pessoa_fisica = new stdClass();
            $pessoa_fisica->sobrenome = $data->sobrenome;
            $pessoa_fisica->tipo_sanguineo = $data->tipo_sanguineo;
            $pessoa_fisica->sexo = $data->sexo;
            $pessoa_fisica->cpf = $data->cpf;
            $this->crud->update('pessoa_fisica','id_pessoa_fisica', $id_pessoa_fisica->id_pessoa_fisica, $pessoa_fisica);

            /* Dados para cadastro de pessoa */
            $endereco = new stdClass();
            $endereco->id_ta_cidade = $data->id_ta_cidade;
            $endereco->logradouro = $data->logradouro;
            $endereco->numero = $data->numero;
            $endereco->complemento = $data->complemento;
            $endereco->cep = $data->cep;
            $this->crud->update('endereco','id_endereco',$id_endereco->id_endereco ,$endereco);

            $pessoa_telefone = new stdClass();
            $pessoa_telefone->id_ta_tipo_telefone = $data->id_ta_tipo_telefone;
            $pessoa_telefone->ddd = substr($data->telefone, 1,3);
            $pessoa_telefone->telefone = substr($data->telefone, 4, strlen($data->telefone));
            $this->crud->update('pessoa_telefone', 'id_pessoa_telefone',$id_pessoa_telefone->id_pessoa_telefone , $pessoa_telefone);            

            /* Dados para cadastro de dados de pessoa */
            $pessoa_dados = new stdClass();
            $pessoa_dados->peso = $data->peso;
            $pessoa_dados->altura = $data->altura;
            $pessoa_dados->dt_dados = $data->dt_matricula;
            $this->crud->update('pessoa_dados','id_pessoa_dados', $id_pessoa_dados->id_pessoa_dados , $pessoa_dados);            

            if (!empty($data->nome_responsavel)) {
                $id_pessoa_respon = $this->crud->get_id('aluno _responsavel', 'id_pessoa', 'id_aluno ='.$id_aluno)->row();
                /* Dados para cadastro de pessoa para responsável */
                $pessoa = new stdClass();
                $pessoa->nome = $data->nome_responsavel;
                $pessoa->dt_nascimento = $data->dt_nascimento_responsavel;
                $pessoa->email = $data->email_responsavel;
               // $id_responsavel = $this->crud->insert('pessoa', $pessoa);
                $this->crud->update('pessoa','id_pessoa', $id_pessoa_respon->id_pessoa , $pessoa);

                /* Dados para cadastro de pessoa para responsável */
                $pessoa_fisica = new stdClass();
                //$pessoa_fisica->id_pessoa_fisica = $id_pessoa_respon->id_pessoa;
                $pessoa_fisica->sobrenome = $data->sobrenome_responsavel;
                $pessoa_fisica->sexo = $data->sexo_responsavel;
                $this->crud->update('pessoa_fisica','id_pessoa_fisica', $id_pessoa_respon->id_pessoa , $pessoa_fisica);
                //$id_pessoa_fisica = $this->crud->insert('pessoa_fisica', $pessoa_fisica);

                /* Dados para cadastro da tabela aluno_responsavel para responsável */
                $aluno_responsavel = new stdClass();
                //$aluno_responsavel->id_responsavel = $id_pessoa_fisica;
                //$aluno_responsavel->id_aluno = $data->observacao;
                $aluno_responsavel->observacao = $data->observacao;
                $this->crud->update('aluno_responsavel','id_aluno', $id_aluno , $aluno_responsavel);
                //$aluno_responsavel = $this->crud->insert('aluno_responsavel', $aluno_responsavel);
            }

            $matricula = new stdClass();
            $matricula->id_ta_situacao = 1;
            $matricula->dia_vencimento = $data->dia_vencimento;
            $matricula->dt_matricula = $data->dt_matricula;
            $matricula->desconto = $data->desconto;
            $matricula->id_aluno = $data->id_aluno;            
            $this->crud->update('matricula','id_matricula', $id_matricula->id_matricula , $matricula);              

            $matricula_turma = new stdClass();
            $matricula_turma->id_matricula = $id_matricula->id_matricula;
            $matricula_turma->id_turma = $id_turma;          
            $this->crud->update('matricula_turma','id_matricula', $id_matricula->id_matricula , $matricula_turma);
            
            $matricula_graduacao = new stdClass();
            $matricula_graduacao->id_matricula = $id_matricula->id_matricula;
            $matricula_graduacao->id_ta_graduacao = 1;
            $matricula_graduacao->observacao = "recem matriculado";
            $this->crud->update('matricula_graduacao','id_matricula', $id_matricula->id_matricula , $matricula_graduacao);
            //$this->crud->insert('matricula_graduacao', $matricula_graduacao);
            /* Fecha a transação */
            $this->db->trans_complete(); 
                       
            if ($this->db->trans_status() === TRUE) {
                $this->session->set_flashdata('edicaook', 'Edição efetuada com sucesso');
                redirect(current_url());
            } else {
                $this->db->trans_rollback();
                log_message('error', 'Erro ao inserir a aluno.', 'FALSE');
                $this->erro();
            }
        }
    
    }
    
    public function form_alterar_instrutor(){
        $data = array();
        $id_instrutor = $this->uri->segment(3);
        if($id_instrutor == NULL){
            redirect('relatorio/instrutor');
        }
        
        $this->load->model('usuario_model', 'usuario');
        $data['paises'] = $this->crud->get_all('ta_pais')->result();
        $data['estados'] = $this->crud->get_all('ta_estado')->result();
        $data['cidades'] = $this->crud->get_all('ta_cidade')->result();
        $data['tipos_usuario'] = $this->usuario->get_tipo_usuario()->result();
        $data['situacoes'] = $this->crud->get_all('ta_situacao')->result();
        $data['tipos_telefone'] = $this->crud->get_all('ta_tipo_telefone')->result();
        $data['query'] = $this->crud->get_info_instrutor($id_instrutor)->row();
        /*echo "<pre>";
        die(print_r($data['query']));*/
        $this->template->load('instrutor/form_alterar', $data);
    }
    
    function alterar_instrutor() {
        $this->form_validation->set_error_delimiters('<span class="alert alert-danger">', '</span>');
        $data = new stdClass();
        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                $data->$key = $value;
            }
        }
        $id_instrutor = $this->input->post('id_instrutor');
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
            
            $id_pessoa_fisica = $this->crud->get_id('instrutor', 'id_pessoa_fisica', 'id_instrutor='.$id_instrutor)->row();
            $id_endereco = $this->crud->get_id('endereco', 'id_endereco', 'id_pessoa='.$id_pessoa_fisica->id_pessoa_fisica)->row();
            //$id_matricula = $this->crud->get_id('matricula', 'id_matricula', 'id_aluno='.$id_aluno)->row();
            $id_pessoa_telefone = $this->crud->get_id('pessoa_telefone', 'id_pessoa_telefone', 'id_pessoa = '.$id_pessoa_fisica->id_pessoa_fisica)->row();
            $id_pessoa_dados = $this->crud->get_id('pessoa_dados', 'id_pessoa_dados', 'id_pessoa_fisica='.$id_pessoa_fisica->id_pessoa_fisica)->row();
            /* Abre uma transação */
            $this->db->trans_start();
            
            /* Dados para cadastro de pessoa */
            $pessoa = new stdClass();
            $pessoa->nome = $data->nome;
            $pessoa->dt_nascimento = $data->dt_nascimento;
            $pessoa->email = $data->email;
            //$id_pessoa = $this->crud->insert('pessoa', $pessoa);
            $this->crud->update('pessoa','id_pessoa', $id_pessoa_fisica->id_pessoa_fisica , $pessoa);

            /* Dados para cadastro de pessoa */
            $pessoa_fisica = new stdClass();
            //$pessoa_fisica->id_pessoa_fisica = $id_pessoa;
            $pessoa_fisica->sobrenome = $data->sobrenome;
            $pessoa_fisica->tipo_sanguineo = $data->tipo_sanguineo;
            $pessoa_fisica->sexo = $data->sexo;
            $pessoa_fisica->cpf = $data->cpf;
            //$id_pessoa_fisica = $this->crud->insert('pessoa_fisica', $pessoa_fisica);
            $this->crud->update('pessoa_fisica','id_pessoa_fisica', $id_pessoa_fisica->id_pessoa_fisica , $pessoa_fisica);

            $endereco = new stdClass();
            $endereco->id_ta_cidade = $data->id_ta_cidade;
            //$endereco->id_pessoa = $id_pessoa;
            $endereco->logradouro = $data->logradouro;
            $endereco->numero = $data->numero;
            $endereco->complemento = $data->complemento;
            $endereco->cep = $data->cep;
            //$this->crud->insert('endereco', $endereco)
            $this->crud->update('endereco', 'id_endereco', $id_endereco->id_endereco, $endereco);

            $pessoa_telefone = new stdClass();
            //$pessoa_telefone->id_pessoa = $id_pessoa;
            $pessoa_telefone->id_ta_tipo_telefone = $data->id_ta_tipo_telefone;
            $pessoa_telefone->ddd = substr($data->telefone, 1,3);
            $pessoa_telefone->telefone = substr($data->telefone, 4, strlen($data->telefone));
            $this->crud->update('pessoa_telefone', 'id_pessoa_telefone',$id_pessoa_telefone->id_pessoa_telefone , $pessoa_telefone); 
            //$this->crud->insert('pessoa_telefone', $pessoa_telefone);
                
            if(!empty($data->id_ta_tipo_telefone_2)){
                $id_pessoa_telefone_2 = $this->crud->get_id('pessoa_telefone', 'id_pessoa_telefone', 'id_pessoa = '.$id_pessoa_fisica->id_pessoa_fisica)->row(1);
                $pessoa_telefone_2 = new stdClass();
                //$pessoa_telefone_2->id_pessoa = $id_pessoa;
                $pessoa_telefone_2->id_ta_tipo_telefone = $data->id_ta_tipo_telefone_2;
                $pessoa_telefone_2->ddd = substr($data->telefone_2, 1,3);
                $pessoa_telefone_2->telefone = substr($data->telefone_2, 4, strlen($data->telefone_2));
                $this->crud->update('pessoa_telefone', 'id_pessoa_telefone',$id_pessoa_telefone_2->id_pessoa_telefone , $pessoa_telefone_2);
               // $this->crud->insert('pessoa_telefone', $pessoa_telefone_2);                
            }
            
            if(!empty($data->login)){
                $id_usuario = $this->crud->get_id('usuario', 'id_usuario', 'id_pessoa='.$id_pessoa_fisica->id_pessoa_fisica)->row();
                if(!empty($id_usuario->id_usuario)){
                    $usuario = new stdClass();
                    $usuario->login = $data->login;
                    $usuario->senha = hash('sha256', $data->senha);
                    $usuario->id_ta_situacao = $data->id_ta_situacao;
                    $usuario->id_ta_tipo_usuario = $data->id_ta_tipo_usuario;
                    $this->crud->update('usuario', 'id_pessoa',$id_pessoa_fisica->id_pessoa_fisica , $usuario);
                }else{
                    $usuario = new stdClass();
                    $usuario->login = $data->login;
                    $usuario->senha = hash('sha256', $data->senha);
                    $usuario->id_ta_situacao = $data->id_ta_situacao;
                    $usuario->id_ta_tipo_usuario = $data->id_ta_tipo_usuario;
                    $usuario->id_pessoa = $id_pessoa_fisica->id_pessoa_fisica;
                    $id_usuario = $this->crud->insert('usuario', $usuario);
                }
                //
                //$id_usuario = $this->crud->insert('usuario', $usuario);
            }
            
            $instrutor = new stdClass();
            //$instrutor->id_pessoa_fisica = $id_pessoa;
            $instrutor->ativo = 1;
            $this->crud->update('instrutor', 'id_instrutor',$id_instrutor , $instrutor);
            //$this->crud->insert('instrutor', $instrutor);

            /* Fecha a transação */
            $this->db->trans_complete();

            if ($this->db->trans_status() === TRUE) {
                $this->session->set_flashdata('edicaook', 'Edição efetuada com sucesso');
                redirect(current_url());
            } else {
                $this->db->trans_rollback();
                log_message('error', 'Erro ao inserir a aluno.', 'FALSE');
                $this->erro();
            }
        /* Em caso de falha: */
        } else {
            $this->form_alterar_instrutor();
        }
    }
    
    function form_alterar_atividade() {
        $data = array();
        $id_atividade = $this->uri->segment(3);
        if($id_atividade == NULL){
            redirect('relatorio/aula');
        }
        $data['query'] = $this->crud->get_where('ta_atividade', 'id_ta_atividade='.$id_atividade)->row();
        $this->template->load('atividade/form_alterar', $data);
    }

    function alterar_atividade() {
        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                $data[$key] = $value;
            }
        }
        /*echo "<pre>";
        die(print_r($data));*/
        $id_atividade = $this->input->post('id_ta_atividade');
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
            
            $this->db->trans_start();
            /* Chama a função de inserção de dados e em caso de sucesso retorna o id inserido */
            
            $data['ativo'] = 1;
            $this->crud->update('ta_atividade','id_ta_atividade',$id_atividade , $data);
            /* Verifica se o retorno da função é um valor numérico e maior que 0 */
            $this->db->trans_complete();
            
            if ($this->db->trans_status() === TRUE) {
                $this->session->set_flashdata('edicaook', 'Edição efetuada com sucesso');
                redirect(current_url());
            } else {
                $this->db->trans_rollback();
                log_message('error', 'Erro ao inserir a aluno.', 'FALSE');
                $this->erro();
            }
        /* Em caso de falha: */
        } else {
            $this->form_alterar_atividade();
        }
    }
    

    public function sucesso($msg = null) {
        if ($msg != null){
            $this->template->load("mensagem/sucesso", $msg);
        } else {
            $this->template->load("mensagem/sucesso");
        }
    }

    public function erro($msg = null) {
        if ($msg != null){
            $this->template->load("mensagem/erro", $msg);
        } else {
            $this->template->load("mensagem/erro");
        }
    }

    public function alerta($msg = null) {
        if ($msg != null){
            $this->template->load("mensagem/alerta", $msg);
        } else {
            $this->template->load("mensagem/alerta");
        }
    }

    public function get_menu() {
        $menus = $this->menu->get_menu();
        return $menus;
    }

}
/*
SELECT m.*, ttu.id_ta_tipo_usuario, ttu.ds_tipo_usuario, mtu.id_ta_tipo_usuario AS mtuid_ta_tipo_usuario
FROM ta_tipo_usuario ttu
left outer JOIN menu_tipo_usuario mtu ON mtu.id_ta_tipo_usuario = ttu.id_ta_tipo_usuario
left outer JOIN menu m ON m.id_menu = mtu.id_menu
WHERE m.id_menu = 61;

select * from
    (select * from ta_tipo_usuario t1
    left join menu_tipo_usuario mtu on mtu.id_ta_tipo_usuario = t1.id_ta_tipo_usuario
    where t1.id_ta_tipo_usuario not in(
        select t2.id_ta_tipo_usuario from ta_tipo_usuario t2
            join menu_tipo_usuario mtu on mtu.id_ta_tipo_usuario = t2.id_ta_tipo_usuario
            WHERE mtu.id_menu = 61
    ))+(select t3.* from ta_tipo_usuario t3
            join menu_tipo_usuario mtu on mtu.id_ta_tipo_usuario = t3.id_ta_tipo_usuario
            WHERE mtu.id_menu = 61);

select distinct id_ta_tipo_usuario, ds_tipo_usuario from ta_tipo_usuario ttu
    left join menu_tipo_usuario mtu on mtu.id_ta_tipo_usuario = ttu.id_ta_tipo_usuario;


select * from ta_tipo_usuario t2
            join menu_tipo_usuario mtu on mtu.id_ta_tipo_usuario = t2.id_ta_tipo_usuario
            WHERE mtu.id_menu = 61


select distinct ds_tipo_usuario , * from ta_tipo_usuario ttu



    join menu m on m.id_menu = mtu.id_menu;

SELECT ttu.id_ta_tipo_usuario, ttu.ds_tipo_usuario, mtu.id_ta_tipo_usuario AS mtuid_ta_tipo_usuario
    FROM ta_tipo_usuario ttu
    left JOIN menu_tipo_usuario mtu ON mtu.id_ta_tipo_usuario = ttu.id_ta_tipo_usuario
    WHERE mtu.id_menu = 61;


    */
?>
