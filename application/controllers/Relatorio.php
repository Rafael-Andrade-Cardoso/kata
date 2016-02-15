<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('crud_model', 'crud');
        $this->load->library('pagination');
    }

    public function menu($qtd = 'null', $inicio = 'null') {
        $consulta = $this->crud->get_menus();
        $num_rows = $consulta->num_rows();
        $config = $this->config_pagination('relatorio/menu', $num_rows);

        /* Define $qtd */
        $qtd = $config['per_page'];
        /* Define $inicio */
        ($this->uri->segment(3) != '')? $inicio=$this->uri->segment(3): $inicio = 0;
        $this->pagination->initialize($config);
        $data = array();
        $data['menus'] = $this->crud->get_menus($qtd, $inicio)->result();
        $data['paginacao'] = $this->pagination->create_links();
        $this->template->load('menu/lista', $data);
    }

    public function aluno($qtd = 'null', $inicio = 'null') {
        $consulta = $this->crud->get_alunos();
        $num_rows = $consulta->num_rows();
        $config = $this->config_pagination('relatorio/aluno', $num_rows);

        /* Define $qtd */
        $qtd = $config['per_page'];
        /* Define $inicio */
        ($this->uri->segment(3) != '')? $inicio=$this->uri->segment(3): $inicio = 0;
        $this->pagination->initialize($config);
        $data = array();
        $data['alunos'] = $this->crud->get_alunos($qtd, $inicio)->result();
        $data['paginacao'] = $this->pagination->create_links();
        $this->template->load('aluno/lista', $data);
    }

    public function instrutor($qtd = 'null', $inicio = 'null') {
        $consulta = $this->crud->get_instrutores();
        $num_rows = $consulta->num_rows();
        $config = $this->config_pagination('relatorio/instrutor', $num_rows);

        /* Define $qtd */
        $qtd = $config['per_page'];
        /* Define $inicio */
        ($this->uri->segment(3) != '')? $inicio=$this->uri->segment(3): $inicio = 0;
        $this->pagination->initialize($config);
        $data = array();
        $data['instrutores'] = $this->crud->get_instrutores($qtd, $inicio)->result();
        $data['paginacao'] = $this->pagination->create_links();
        $this->template->load('instrutor/lista', $data);
    }

    public function atividade($qtd = 'null', $inicio = 'null') {
        $consulta = $this->crud->get_atividades();
        $num_rows = $consulta->num_rows();
        $config = $this->config_pagination('relatorio/atividade', $num_rows);

        /* Define $qtd */
        $qtd = $config['per_page'];
        /* Define $inicio */
        ($this->uri->segment(3) != '')? $inicio=$this->uri->segment(3): $inicio = 0;
        $this->pagination->initialize($config);
        $data = array();
        $data['atividades'] = $this->crud->get_atividades($qtd, $inicio)->result();
        $data['paginacao'] = $this->pagination->create_links();
        $this->template->load('atividade/lista', $data);
    }

    public function graduacao($qtd = 'null', $inicio = 'null') {
        $consulta = $this->crud->get_graduacao();
        $num_rows = $consulta->num_rows();
        $config = $this->config_pagination('relatorio/graduacao', $num_rows);

        /* Define $qtd */
        $qtd = $config['per_page'];
        /* Define $inicio */
        ($this->uri->segment(3) != '')? $inicio=$this->uri->segment(3): $inicio = 0;
        $this->pagination->initialize($config);
        $data = array();
        $data['graduacoes'] = $this->crud->get_graduacao($qtd, $inicio)->result();
        $data['paginacao'] = $this->pagination->create_links();
        $this->template->load('graduacao/lista', $data);
    }

    public function turma($qtd = 'null', $inicio = 'null') {
        $consulta = $this->crud->get_turma_instrutor();
        $num_rows = $consulta->num_rows();
        $config = $this->config_pagination('relatorio/turma', $num_rows);

        /* Define $qtd */
        $qtd = $config['per_page'];
        /* Define $inicio */
        ($this->uri->segment(3) != '')? $inicio=$this->uri->segment(3): $inicio = 0;
        $this->pagination->initialize($config);
        $data = array();
        $data['turma'] = $consulta->result();
        $data['paginacao'] = $this->pagination->create_links();
        $this->template->load('turma/lista', $data);
    }

    public function horario($qtd = 'null', $inicio = 'null') {
        $consulta = $this->crud->get_horario();
        $num_rows = $consulta->num_rows();
        $config = $this->config_pagination('relatorio/horario', $num_rows);

        /* Define $qtd */
        $qtd = $config['per_page'];
        /* Define $inicio */
        ($this->uri->segment(3) != '')? $inicio=$this->uri->segment(3): $inicio = 0;
        $this->pagination->initialize($config);
        $data = array();
        $data['horarios'] = $this->crud->get_horario($qtd, $inicio)->result();
        $data['paginacao'] = $this->pagination->create_links();
        $this->template->load('horario/lista', $data);
    }

    public function situacao($qtd = 'null', $inicio = 'null') {
        $consulta = $this->crud->get_situacao();
        $num_rows = $consulta->num_rows();
        $config = $this->config_pagination('relatorio/situacao', $num_rows);

        /* Define $qtd */
        $qtd = $config['per_page'];
        /* Define $inicio */
        ($this->uri->segment(3) != '')? $inicio=$this->uri->segment(3): $inicio = 0;
        $this->pagination->initialize($config);
        $data = array();
        $data['situacoes'] = $this->crud->get_situacao($qtd, $inicio)->result();
        $data['paginacao'] = $this->pagination->create_links();
        $this->template->load('situacao/lista', $data);
    }

    public function comunicado($qtd = 'null', $inicio = 'null') {
        $consulta = $this->crud->get_comunicado();
        $num_rows = $consulta->num_rows();
        $config = $this->config_pagination('relatorio/comunicado', $num_rows);

        /* Define $qtd */
        $qtd = $config['per_page'];
        /* Define $inicio */
        ($this->uri->segment(3) != '')? $inicio=$this->uri->segment(3): $inicio = 0;
        $this->pagination->initialize($config);
        $data = array();
        $data['comunicados'] = $this->crud->get_comunicado($qtd, $inicio)->result();
        $data['paginacao'] = $this->pagination->create_links();
        $this->template->load('comunicado/lista', $data);
    }

    public function tipo_usuario($qtd = 'null', $inicio = 'null') {
        $consulta = $this->crud->get_tipo_usuario();
        $num_rows = $consulta->num_rows();
        $config = $this->config_pagination('relatorio/tipo_usuario', $num_rows);

        /* Define $qtd */
        $qtd = $config['per_page'];
        /* Define $inicio */
        ($this->uri->segment(3) != '')? $inicio=$this->uri->segment(3): $inicio = 0;
        $this->pagination->initialize($config);
        $data = array();
        $data['tipos_usuario'] = $this->crud->get_tipo_usuario($qtd, $inicio)->result();
        $data['paginacao'] = $this->pagination->create_links();
        $this->template->load('tipo_usuario/lista', $data);
    }

    public function tipo_telefone($qtd = 'null', $inicio = 'null') {
        $consulta = $this->crud->get_tipo_telefone();
        $num_rows = $consulta->num_rows();
        $config = $this->config_pagination('relatorio/tipo_telefone', $num_rows);

        /* Define $qtd */
        $qtd = $config['per_page'];
        /* Define $inicio */
        ($this->uri->segment(3) != '')? $inicio=$this->uri->segment(3): $inicio = 0;
        $this->pagination->initialize($config);
        $data = array();
        $data['tipos_telefone'] = $this->crud->get_tipo_telefone($qtd, $inicio)->result();
        $data['paginacao'] = $this->pagination->create_links();
        $this->template->load('tipo_telefone/lista', $data);
    }

    public function exame($qtd = 'null', $inicio = 'null') {
        $consulta = $this->crud->get_exame();
        //die('teste');
        $num_rows = $consulta->num_rows();
        $config = $this->config_pagination('relatorio/exame', $num_rows);

        /* Define $qtd */
        $qtd = $config['per_page'];
        /* Define $inicio */
        ($this->uri->segment(3) != '')? $inicio=$this->uri->segment(3): $inicio = 0;
        $this->pagination->initialize($config);
        $data = array();
        $data['exames'] = $this->crud->get_exame($qtd, $inicio)->result();
        $data['paginacao'] = $this->pagination->create_links();
        $this->template->load('exame/lista', $data);
    }

    public function arte_marcial($qtd = 'null', $inicio = 'null') {
        $consulta = $this->crud->get_arte_marcial();
        $num_rows = $consulta->num_rows();
        $config = $this->config_pagination('relatorio/arte_marcial', $num_rows);

        /* Define $qtd */
        $qtd = $config['per_page'];
        /* Define $inicio */
        ($this->uri->segment(3) != '')? $inicio=$this->uri->segment(3): $inicio = 0;
        $this->pagination->initialize($config);
        $data = array();
        $data['artes_marciais'] = $this->crud->get_arte_marcial($qtd, $inicio)->result();
        $data['paginacao'] = $this->pagination->create_links();
        $this->template->load('arte_marcial/lista', $data);
    }


    public function config_pagination($url, $num_rows ) {
        $config['base_url'] = base_url($url);
        $config['total_rows'] = $num_rows;
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
    
    public function aluno_turma($qtd = 'null', $inicio = 'null', $id_turma = 'null') {
        //die(print_r($this->input->post));
        $consulta = $this->crud->get_horario_somente();
        $num_rows = $consulta->num_rows();
        $config = $this->config_pagination('relatorio/aluno_turma', $num_rows);  
        
        /* Define $qtd */
        $qtd = $config['per_page'];
        /* Define $inicio */
        ($this->uri->segment(3) != '')? $inicio=$this->uri->segment(3): $inicio = 0;
        $this->pagination->initialize($config);
        $data = array();
        
        if(!empty($this->input->post("id_horario")))
            $id_turma = $this->input->post("id_horario");
        else  
            $id_turma = NULL;
       //$id_turma = $this->input->post("id_horario");
       // die(print_r($id_turma));
        //$result = $this->crud->get_alunos_turma($id_turma);
        if(!is_null($id_turma)){
            $result = $this->crud->get_alunos_turma($id_turma);
            //die(print_r($result));  
            $data['aluno'] = $result;  
        } 
            
        $data['horario'] = $this->crud->get_horario_somente();
        $data['paginacao'] = $this->pagination->create_links();
        $this->template->load('aluno_turma/lista', $data);  
       
    }
    
    public function aula($qtd = 'null', $inicio = 'null', $id_turma = 'null'){
        $consulta = $this->crud->get_aula('1', 2);
        $num_rows = $consulta->num_rows();
        $config = $this->config_pagination('relatorio/aula', $num_rows);
        
        /* Define $qtd */
        $qtd = $config['per_page'];
        /* Define $inicio */
        ($this->uri->segment(3) != '')? $inicio=$this->uri->segment(3): $inicio = 0;
        $this->pagination->initialize($config);
        //$data = array();
        
        $aula['aula'] = $consulta->result();
        $aula['paginacao'] = $this->pagination->create_links();
        /*echo "<pre>";
        die(print_r($data));*/
        $this->template->load('aula/lista', $aula);        
    }
    
    public function aluno_turma_2(){
        $id_turma = $this->input->post("id_horario");
        $this->aluno_turma($id_turma);
    }

    public function get_alunos_faixa() {
        $lista = $this->crud->get_alunos_faixa();
        debug($lista->result());
    }



}

