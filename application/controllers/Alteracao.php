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
            redirect('aula/lista');
        }
        
        $data['arte_marcial'] = $this->crud->get_all('arte_marcial')->result();
        $data['turma'] = $this->crud->get_all('turma')->result();   
        $data['atividade'] = $this->crud->get_all('ta_atividade')->result();     
        $data['horario'] = $this->crud->get_all('horario')->result(); 
        //$data['query'] = $this->crud->get_aula($id_aula, 1)->result();
        $data['query'] = $this->crud->get_aula($id_aula, 1)->row();
        /*echo "<pre>";
        die(print_r($data['query']));*/
        $this->template->load('aula/form_alterar', $data);
    }


    public function alterar_aula() {
        foreach ($this->input->post() as $key => $value){
            if (!is_null($value) && $value != ""){
                //echo $value;
                $data[$key] = $value;
            }
        }
        $atividade = $this->input->post('id_ta_atividade');
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
            ),
            array(
                'field' => 'id_ta_atividade[]',
                'label' => 'Atividade',
                'rules' => 'required'
            )            
        );
        $this->form_validation->set_rules($validacoes);

        /* Executa a validação e caso houver erro chama a função que retorna ao formulário */
        if ($this->form_validation->run() === FALSE) {
            $this->form_alterar_aula();
        /* Senão, caso sucesso: */
        } else {
            $id_aula = $this->menu->update($data, $data['id_aula']);
            if ($id_aula){
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
        
        $data['arte_marcial'] = $this->crud->get_all('arte_marcial')->result();
        $data['instrutor'] = $this->crud->get_instrutores()->result();
        $data['query'] = $this->crud->get_turma($id_turma)->row();
        //echo "<pre>";
        //die(print_r($data['query']));
        $this->template->load('turma/form_alterar', $data);
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

    public function excluir() {
        $id = $this->input->post('id');
        //redirect(base_url().'news-and-events');
        $status = $this->menu->delete($id);
        return $status;
        //redirect('/menu/lista/'. $qtd . '/' . $inicio, 'refresh');
    }

    public function inserir() {
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
                'rules' => 'trim|max_length[45]'
            )
        );
        $this->form_validation->set_rules($validacoes);

        /* Executa a validação e caso houver erro chama a função que retorna ao formulário */
        if ($this->form_validation->run() === FALSE) {
            $this->form_cadastro();
        /* Senão, caso sucesso: */
        } else {
            $id_ta_tipo_usuario = $data['id_ta_tipo_usuario'];
            unset($data['id_ta_tipo_usuario']);
            $id_menu = $this->menu->insert($data);
            if ($id_menu != 0){
                $dados['id_menu'] = $id_menu;
                foreach ($id_ta_tipo_usuario as $value) {
                    $dados['id_ta_tipo_usuario'] = $value;
                    $menuusuario = $this->menu->insert_tipo_usuario($dados);
                }
                $this->sucesso();
            } else {
                $this->erro();
            }

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
