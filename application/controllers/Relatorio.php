<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('crud_model', 'crud');
        $this->load->library('pagination');
    }

    public function menu($qtd = 'null', $inicio = 'null') {
        $config = $this->config_pagination();

        /* Define $qtd */
        $qtd = $config['per_page'];
        /* Define $inicio */
        ($this->uri->segment(3) != '')? $inicio=$this->uri->segment(3): $inicio = 0;

        $this->pagination->initialize($config);
        $data = array();
        $table = "menu";
        $data['menus'] = $this->crud->get_pagination($table, $qtd, $inicio)->result();
        $data['paginacao'] = $this->pagination->create_links();
        $this->template->load('menu/lista', $data);
    }



    public function config_pagination() {
        $config['base_url'] = base_url('relatorio/menu');
        $config['total_rows'] = $this->crud->get_all('menu')->num_rows();
        $config['per_page'] = 20;
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
        return $config;

    }

}