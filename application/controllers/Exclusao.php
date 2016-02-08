<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {


    public function __construct() {
        parent:: __construct();
        $this->load->model('crud_model', 'crud');
    }   

    public function excluir_turma() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('turma', 'id_turma', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_aluno($id) {
        $id = $this->input->post('id');
        
        $status = $this->crud->update_ativos('aluno', 'id_aluno', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_arte_marcial() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('arte_marcial', 'id_arte_marcial', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
     
    function excluir_aula($id=null) {
        $data = array();
        $id_aula = $this->uri->segment(3);
        
        $id = $this->input->post("id");
        die(print_r($id));
        $status = $this->crud->update_ativos('aula', 'id_aula', $id);        
        //return $status;        
    }
    
    public function excluir_comunicado() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('comunicado', 'id_comunicado', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_endereco() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('endereco', 'id_endereco', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_exame() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('exame', 'id_exame', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_horario() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('horario', 'id_horario', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_instrutor() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('instrutor', 'id_instrutor', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_matricula() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('matricula', 'id_matricula', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_mensalidade() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('mensalidade', 'id_mensalidade', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_menu() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('menu', 'id_menu', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_pessoa() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('pessoa', 'id_pessoa', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_presenca() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('presenca', 'id_presenca', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_ta_atividade() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('ta_atividade', 'id_ta_atividade', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_ta_cidade() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('ta_cidade', 'id_ta_cidade', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_ta_graduacao() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('ta_graduacao', 'id_ta_graduacao', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_ta_pais() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('ta_pais', 'id_ta_pais', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_ta_situacao() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('ta_situacao', 'id_ta_situacao', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_ta_tipo_telefone() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('ta_tipo_telefone', 'id_ta_tipo_telefone', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_ta_tipo_usuario() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('ta_tipo_usuario', 'id_ta_tipo_usuario', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
    }
    
    public function excluir_usuario() {
        $id = $this->input->post('id');
        $status = $this->crud->update_ativos('usuario', 'id_usuario', $id);
        return $status;
        //redirect('/turma/lista/'. $qtd . '/' . $inicio, 'refresh');
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
}
?>