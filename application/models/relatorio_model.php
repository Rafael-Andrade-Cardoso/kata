<?php

	class relatorio_model extends CI_Model{
		
		public function __construct(){
			parent::__construct();
			
		}
		
		public function aluno_matri($per_ini, $per_fim){
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
											ON (a.id_pessoa_fisica = ppf.id_pessoa_fisica)
										inner join matricula as m
											ON (m.id_aluno = a.id_aluno)
									WHERE m.id_ta_situacao = 1 
                                    AND a.ativo = 1
									AND m.dt_matricula 
									BETWEEN "'. $per_ini .'"
									AND "'. $per_fim .'"                                   
									order by ppf.nome;
									');
			$data = $query;
			return $data;
		} 	
		
		public function get_instrutor($per_ini, $per_fim){
			$query=$this->db->query('Select * from  
									( 
									SELECT * from 
										pessoa as p 
									inner join pessoa_fisica as pf 
										ON(p.id_pessoa = pf.id_pessoa_fisica) 
									) as ppf  
									inner join instrutor as i 
										ON (i.id_pessoa_fisica = ppf.id_pessoa_fisica)
									order by ppf.nome;
									');
			$data = $query;
			//return $query;
			return $data;
		} 
		
		public function aluno_instrutor($per_ini, $per_fim, $nome_instrutor = ""){
			//$per_fim = '0000-00-00';
			//$per_ini = '0000-00-00';
            //$nome_instrutor = '';
            if($nome_instrutor != ""){
                $query=$this->db->query('Select ppf.nome as nome_aluno,ppf.sobrenome as sobrenome_aluno, 
											ps.nome as nome_instrutor, pf2.sobrenome as sobrenome_instrutor,
											ppf.dt_nascimento as nasc_aluno, ppf.sexo as sexo_aluno from 
											( 
												SELECT * from 
													pessoa as p 
												inner join pessoa_fisica as pf
													ON(p.id_pessoa = pf.id_pessoa_fisica) 
											) as ppf 
											inner join pessoa_dados as pd 
												ON (ppf.id_pessoa_fisica = pd.id_pessoa_fisica)  
											inner join aluno as a 
												ON (a.id_pessoa_fisica = ppf.id_pessoa_fisica)
											inner join matricula as m
												ON (a.id_aluno = m.id_aluno)
											inner join matricula_turma as mt
												on m.id_matricula = mt.id_matricula
											inner join turma as t
												ON(mt.id_turma = t.id_turma)
											inner join horario as h
												ON (h.id_turma = t.id_turma)
											inner join instrutor as i
												ON(h.id_instrutor = i.id_instrutor)
											inner join pessoa_fisica as pf2  				
												ON (pf2.id_pessoa_fisica = i.id_pessoa_fisica)
											inner join pessoa as ps
												ON (ps.id_pessoa = pf2.id_pessoa_fisica)
											WHERE t.dt_inicio
											BETWEEN "'. $per_ini .'"
											AND "'. $per_fim .'" 
                                            AND ps.nome = "'.$nome_instrutor.'"
                                            group by ppf.nome
											order by ppf.nome;
									');
            }else{
			     $query=$this->db->query('Select ppf.nome as nome_aluno,ppf.sobrenome as sobrenome_aluno, 
											ps.nome as nome_instrutor, pf2.sobrenome as sobrenome_instrutor,
											ppf.dt_nascimento as nasc_aluno, ppf.sexo as sexo_aluno from 
											( 
												SELECT * from 
													pessoa as p 
												inner join pessoa_fisica as pf
													ON(p.id_pessoa = pf.id_pessoa_fisica) 
											) as ppf 
											inner join pessoa_dados as pd 
												ON (ppf.id_pessoa_fisica = pd.id_pessoa_fisica)  
											inner join aluno as a 
												ON (a.id_pessoa_fisica = ppf.id_pessoa_fisica)
											inner join matricula as m
												ON (a.id_aluno = m.id_aluno)
											inner join matricula_turma as mt
												on m.id_matricula = mt.id_matricula
											inner join turma as t
												ON(mt.id_turma = t.id_turma)
											inner join horario as h
												ON (h.id_turma = t.id_turma)
											inner join instrutor as i
												ON(h.id_instrutor = i.id_instrutor)
											inner join pessoa_fisica as pf2  				
												ON (pf2.id_pessoa_fisica = i.id_pessoa_fisica)
											inner join pessoa as ps
												ON (ps.id_pessoa = pf2.id_pessoa_fisica)
											WHERE t.dt_inicio
											BETWEEN "'. $per_ini .'"
											AND "'. $per_fim .'" 
                                            group by ppf.nome
											order by ppf.nome;
									');
            }
		$data = $query;							
		return $data;
		}
		
		public function get_turma($per_ini, $per_fim){
			$query=$this->db->query('Select * from  
									( 
										SELECT * from 
											pessoa as p 
												inner join pessoa_fisica as pf 
													ON(p.id_pessoa = pf.id_pessoa_fisica) 			
									) as ppf 
										inner join instrutor as i 
											ON (i.id_pessoa_fisica = ppf.id_pessoa_fisica)
										inner join horario as h
											ON (h.id_instrutor = i.id_instrutor)
										inner join turma as t
											ON (h.id_turma = t.id_turma)
									WHERE t.dt_final <= "'.  $per_fim . '"
									AND t.dt_inicio >= "'.  $per_ini . '"
                                    AND t.ativo = 1
                                    group by nm_turma                                    
									order by ppf.nome;
									');
			return $query;
		}
		
		public function get_aula_instrutor($per_ini, $per_fim){
			$query=$this->db->query('Select * from  
									( 
									SELECT * from 
										pessoa as p 
											inner join pessoa_fisica as pf 
												ON(p.id_pessoa = pf.id_pessoa_fisica) 			
									) as ppf 
										inner join instrutor as i 
											ON (i.id_pessoa_fisica = ppf.id_pessoa_fisica)
										inner join horario as h
											ON (h.id_instrutor = i.id_instrutor)
										inner join aula a 
											ON (h.id_horario = a.id_horario)
										inner join arte_marcial am
											ON (a.id_arte_marcial = am.id_arte_marcial)
									WHERE a.dt_aula <= "'.  $per_fim . '"
									AND a.dt_aula >= "'.  $per_ini . '"
									order by ppf.nome, a.dt_aula;
									');
			return $query;
		}
		
		public function get_aluno_grad($per_ini, $per_fim){
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
											ON (a.id_pessoa_fisica = ppf.id_pessoa_fisica)
										inner join matricula as m
											ON (m.id_aluno = a.id_aluno)
										inner join matricula_graduacao as mg
											ON (m.id_matricula = mg.id_matricula)
										inner join ta_graduacao g
											ON (mg.id_ta_graduacao = g.id_ta_graduacao)
									WHERE m.dt_matricula <= "'.  $per_fim . '"
									AND m.dt_matricula >= "'.  $per_ini . '"
									order by ppf.nome, g.ordem;
									');
			return $query;
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