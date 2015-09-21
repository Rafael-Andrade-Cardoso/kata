<?php

	class usuario_model extends CI_Model{

		# VALIDA USUÁRIO
    function validate() {
        //$where = array('login' => $this->input->post('user'), 'senha' => $this->input->post('pass'));
        $this->db->where('login', $this->input->post('user'));
        $this->db->where('senha', hash('sha256', $this->input->post('pass')));
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

		/**
		*	@usage
		*	Single: $this->usuario_model->get(2);
		*	All: $this->usuario_model->get();
		*/
		public function get($id_usuario = null){
			if ($id_usuario === null){
				$query = $this->db->get('usuario');
			} else {
				$query = $this->db->get_where('usuario', ['id_usuario' => $id_usuario]);
			}
			return $query->result();
		}

		/*
		*	@param array $data
		*
		*	@usage
		*	$result = $this->usuario_model->insert(['login' => 'teste']);
		*/
		public function insert($data){
			$this->db->insert('usuario', $data);
			return $this->db->insert_id() or die(mysql_error());
		}

		/*
		*	@usage
		*	$result = $this->user_model->update(['login' => 'teste'], 3);
		*/
		public function update($data, $id_usuario){
			$this->db->where(['id_usuario' => $id_usuario]);
			$this->db->update('usuario', $data);
			return $this->db->affected_rows();
		}


		/*
		*	@usage
		*	$this->user_model->delete(6)
		*/
		public function delete($id_usuario){
			$this->db->delete('usuario', ['id_usuario' => $id_usuario]);
			return $this->db->affected_rows();
		}

        public function get_tipo_usuario() {
            return $this->db->get('ta_tipo_usuario');
        }

	}