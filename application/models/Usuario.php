<?php
class Usuario extends CI_Model {
    # VALIDA USUÁRIO
    function validate() {
        //$where = array('login' => $this->input->post('user'), 'senha' => $this->input->post('pass'));
        $this->db->where('login', $this->input->post('user')); 
        $this->db->where('senha', $this->input->post('pass'));
        //$this->db->where('status', 1); // Verifica o status do usuário

        $query = $this->db->get('usuario');
        if ($query->num_rows() == 1) { 
            return $query->row(); // RETORNA VERDADEIRO
        } else {
            return false;           
        }
    }

    # VERIFICA SE O USUÁRIO ESTÁ LOGADO
    function logged() {
        $logged = $this->session->userdata('logged');

        if (!isset($logged) || $logged != true) {
            echo 'Voce nao tem permissao para entrar nessa pagina. <a href="http://www.oficinadanet.com.br/login">Efetuar Login</a>';
            die();
        }
    }
    
    function user_list() {
        echo "<pre>";
        $query = $this->db->get('usuario', 10);
        $teste =  $query->num_rows();
        die(print_r($teste));
    }
}
