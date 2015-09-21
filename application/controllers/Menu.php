<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {


    public function __construct() {
        parent:: __construct();
        $this->load->model('menu_model', 'menu');
        $this->load->model('usuario_model', 'usuario');
    }

    public function form_cadastro(){
        $data = array();
        $data['menus'] = $this->get_menu()->result();
        $data['tipos_usuario'] = $this->usuario->get_tipo_usuario()->result();
        $this->template->load('menu/form_cadastro', $data);
    }

    public function form_alterar(){
        $data = array();
        $idmenu = $this->uri->segment(3);
        if($idmenu == NULL){
            redirect('menu/lista');
        }
        $query = $this->menu->get_byid($idmenu);
        $data['tipo_usuario_menu'] = $this->menu->get_tipo_menu_byid($idmenu)->result();
        $data['query'] = $query->row();
        $data['menus'] = $this->get_menu()->result();
        $this->template->load('menu/form_alterar', $data);
    }


    public function alterar(){
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
            $this->form_alterar();
        /* Senão, caso sucesso: */
        } else {
            $id_menu = $this->menu->update($data, $data['id_menu']);
            if ($id_menu){
                $this->session->set_flashdata('edicaook', 'Edição efetuada com sucesso');
                redirect(current_url());
            } else {
                $this->erro();
            }

        }
    }

    public function lista($qtd = 'null', $inicio = 'null'){
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

    public function excluir(){
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
            $id_menu = $this->menu->insert($data);
            if ($id_menu != 0){
                $this->sucesso();
            } else {
                $this->erro();
            }

        }

    }

    public function sucesso($msg = null){
        if ($msg != null){
            $this->template->load("mensagem/sucesso", $msg);
        } else {
            $this->template->load("mensagem/sucesso");
        }
    }

    public function erro($msg = null){
        if ($msg != null){
            $this->template->load("mensagem/erro", $msg);
        } else {
            $this->template->load("mensagem/erro");
        }
    }

    public function alerta($msg = null){
        if ($msg != null){
            $this->template->load("mensagem/alerta", $msg);
        } else {
            $this->template->load("mensagem/alerta");
        }
    }

    public function get_menu(){
        $menus = $this->menu->get_menu();
        return $menus;
    }

}

?>