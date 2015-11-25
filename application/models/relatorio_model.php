<?php

	class relatorio_model extends CI_Model{
		
		public function __construct(){
			parent::__construct();
			
		}
		
		public function aluno_matri(){
			$query=$this->db->query('Select * from  
									( 
									SELECT * from 
										pessoa as p 
									inner join pessoa_fisica as pf 
										ON(p.id_pessoa = pf.id_pessoa_fisica) 
									) as ppf 
									inner join pessoa_dados as pd 
										ON (ppf.id_pessoa_fisica = pd.id_pessoa_fisica)  
									inner join aluno as a 
										ON (a.id_pessoa_fisica = ppf.id_pessoa_fisica); 
									');
			$data = $query;
			//return $query;
			return $data;
		} 	
		
		public function get_instrutor(){
			$query=$this->db->query('Select * from  
									( 
									SELECT * from 
										pessoa as p 
									inner join pessoa_fisica as pf 
										ON(p.id_pessoa = pf.id_pessoa_fisica) 
									) as ppf  
									inner join instrutor as i 
										ON (i.id_pessoa_fisica = ppf.id_pessoa_fisica); 
									');
			$data = $query;
			//return $query;
			return $data;
		} 
		
		
		public function recebe(){
			$query=$this->db->query('SELECT * FROM pessoa');
			$data = (array) $query->result();
			//return $query;
			return $data;
		} 	
		
		# VERIFICA SE O USUÁRIO ESTÁ LOGADO
		function logged() {
			$logged = $this->session->userdata('logged');
	
			if (!isset($logged) || $logged != true) {
				echo 'Voce nao tem permissao para entrar nessa pagina. <a href="http://www.oficinadanet.com.br/login">Efetuar Login</a>';
				die();
			}
		}
	}	
?>