<?php
	
	class usuario_model extends CI_Model{
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
			return $this->db->insert_id();
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
		
	}