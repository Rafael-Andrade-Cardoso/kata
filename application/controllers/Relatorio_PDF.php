
<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	
	class Relatorio_pdf extends MY_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->helper('date');
			$this->load->model('relatorio_model');
			$this->load->library('pdf');
			$this->pdf->fontpath = 'font/';
		}
		
		public function form_relatorio(){
			$this->template->load('relatorio/form_relatorio');
		}
		
		function alunos_matri($per_ini, $per_fim){
			$result = $this->relatorio_model->aluno_matri($per_ini, $per_fim);
			
			//200 tamanho máximo da celula
			$this->pdf->SetFont('Arial','B',12);// Configurando a fonte
			$this->pdf->SetXY(10,55);// Posicionando as células
			$this->pdf->Cell(55,10,"Nome",1,1,'C');// Configurando as células
			$this->pdf->SetXY(65,55);
			$this->pdf->Cell(30,10,"Nascimento",1,1,'C');
			$this->pdf->SetXY(95,55);
			$this->pdf->Cell(20,10,"Sexo",1,1,'C');
			$this->pdf->SetXY(115,55);
			$this->pdf->Cell(25,10,"CPF",1,1,'C');
			$this->pdf->SetXY(140,55);
			$this->pdf->Cell(60,10,utf8_decode("Observações"),1,1,'C');
			$this->pdf->SetFont('Arial','B',10);// Configurando a fonte
			
			$y = 65;
			foreach($result->result_array() as $row){
				$this->pdf->SetXY(10,$y);
				$this->pdf->Cell(55,6,$row['nome']. " " . $row['sobrenome'],1,0,'L');//,$fill);
				$this->pdf->SetXY(65,$y);
				$this->pdf->Cell(30,6,data_from_db($row['dt_nascimento']),1,0,'R');
				$this->pdf->SetXY(95,$y);
				if($row['sexo'] == "F")
					$this->pdf->Cell(20,6,"Feminino",1,0,'R');
				else
					$this->pdf->Cell(20,6,"Masculino",1,0,'R');
				$this->pdf->SetXY(115,$y);
				$this->pdf->Cell(25,6,$row['cpf'],1,0,'R');
				$this->pdf->SetXY(140,$y);
				$this->pdf->Cell(60,6,$row['observacao'],1,0,'L');
				$y = $y+6; 		
			}
		}
		
		function instrutor($per_ini, $per_fim){
			$result = $this->relatorio_model->get_instrutor($per_ini, $per_fim);			
			//190 tamanho máximo da celula
			$this->pdf->SetFont('Arial','B',12);// Configurando a fonte
			$this->pdf->SetXY(10,55);// Posicionando as células
			$this->pdf->Cell(55,10,"Nome",1,1,'C');// Configurando as células
			$this->pdf->SetXY(65,55);
			$this->pdf->Cell(30,10,"Nascimento",1,1,'C');
			$this->pdf->SetXY(95,55);
			$this->pdf->Cell(20,10,"Sexo",1,1,'C');
			$this->pdf->SetXY(115,55);
			$this->pdf->Cell(25,10,"CPF",1,1,'C');
			$this->pdf->SetXY(140,55);
			$this->pdf->Cell(60,10,utf8_decode("E-mail"),1,1,'C');
			
			$this->pdf->SetFont('Arial','B',10);// Configurando a fonte
			$y = 65;
			foreach($result->result_array() as $row){
				$this->pdf->SetXY(10,$y);
				$this->pdf->Cell(55,6,$row['nome']. " " . $row['sobrenome'],1,0,'L');//,$fill);
				$this->pdf->SetXY(65,$y);
				$this->pdf->Cell(30,6,data_from_db($row['dt_nascimento']),1,0,'R');
				$this->pdf->SetXY(95,$y);
				if($row['sexo'] == "F")
					$this->pdf->Cell(20,6,"Feminino",1,0,'R');
				else
					$this->pdf->Cell(20,6,"Masculino",1,0,'R');
				
				$this->pdf->SetXY(115,$y);
				$this->pdf->Cell(25,6,$row['cpf'],1,0,'R');
				$this->pdf->SetXY(140,$y);
				$this->pdf->Cell(60,6,$row['email'],1,0,'L');
				$y = $y+6; 		
			}
		}
		
		function aluno_instrutor($per_ini, $per_fim){
			$result = $this->relatorio_model->aluno_instrutor($per_ini, $per_fim);
			//200 tamanho máximo da celula
			$this->pdf->SetFont('Arial','B',12);// Configurando a fonte
			$this->pdf->SetXY(10,55);// Posicionando as células
			$this->pdf->Cell(55,10,"Nome do Aluno",1,1,'C');// Configurando as células
			$this->pdf->SetXY(65,55);
			$this->pdf->Cell(40,10,"Nascimento",1,1,'C');
			$this->pdf->SetXY(105,55);
			$this->pdf->Cell(40,10,"Sexo",1,1,'C');
			$this->pdf->SetXY(145,55);
			$this->pdf->Cell(55,10,utf8_decode("Instrutor"),1,1,'C');
			$this->pdf->SetFont('Arial','B',10);// Configurando a fonte
			$y = 65;
			foreach($result->result_array() as $row){
				$this->pdf->SetXY(10,$y);
				$this->pdf->Cell(55,6,$row['nome_aluno'] . " ". $row['sobrenome_aluno'],1,0,'L');//,$fill);
				$this->pdf->SetXY(65,$y);
				$this->pdf->Cell(40,6,data_from_db($row['nasc_aluno']),1,0,'R');
				$this->pdf->SetXY(105,$y);
				if($row['sexo_aluno'] == "F")
					$this->pdf->Cell(40,6,"Feminino",1,0,'R');
				else
					$this->pdf->Cell(40,6,"Masculino",1,0,'R');
				
				$this->pdf->SetXY(145,$y);
				$this->pdf->Cell(55,6,$row['nome_instrutor']. " " .$row['sobrenome_instrutor'],1,0,'L');
				$y = $y+6; 		
			}
		}
		
		function turma($per_ini, $per_fim){
			$result = $this->relatorio_model->get_turma($per_ini, $per_fim);
			//200 tamanho máximo da celula
			$this->pdf->SetFont('Arial','B',12);// Configurando a fonte
			$this->pdf->SetXY(10,55);
			$this->pdf->Cell(50,10,"Instrutor",1,1,'C');
			$this->pdf->SetXY(60,55);// Posicionando as células			
			$this->pdf->Cell(22.5,10,"Hora inicio",1,1,'C');// Configurando as células
			$this->pdf->SetXY(82.5,55);
			$this->pdf->Cell(22.5,10,"Hora Fim",1,1,'C');
			$this->pdf->SetXY(105,55);
			$this->pdf->Cell(30,10,"Dia da semana",1,1,'C');
			$this->pdf->SetXY(135,55);
			$this->pdf->Cell(40,10,utf8_decode("Máximo de alunos"),1,1,'C');
			$this->pdf->SetXY(175,55);
			$this->pdf->Cell(25,10,utf8_decode("Valor"),1,1,'C');
			
			$this->pdf->SetFont('Arial','B',10);// Configurando a fonte
			$y = 65;
			foreach($result->result_array() as $row){
				$this->pdf->SetXY(10,$y);
				$this->pdf->Cell(50,6,$row['nome']. " ". $row['sobrenome'],1,0,'L');
				$this->pdf->SetXY(60,$y);
				$this->pdf->Cell(22.5,6,$row['hr_inicio'],1,0,'R');//,$fill);
				$this->pdf->SetXY(82.5,$y);
				$this->pdf->Cell(22.5,6,$row['hr_termino'],1,0,'R');
				$this->pdf->SetXY(105,$y);
				if($row['dia_semana'] == 0)
					$this->pdf->Cell(30,6,"Domingo",1,0,'L');
				else if($row['dia_semana'] == 1)
					$this->pdf->Cell(30,6,"Segunda",1,0,'L');
				else if($row['dia_semana'] == 2)
					$this->pdf->Cell(30,6,utf8_decode("Terça"),1,0,'L');
				else if($row['dia_semana'] == 3)
					$this->pdf->Cell(30,6,"Quarta",1,0,'L');
				else if($row['dia_semana'] == 4)
					$this->pdf->Cell(30,6,"Quinta",1,0,'L');
				else if($row['dia_semana'] == 5)
					$this->pdf->Cell(30,6,"Sexta",1,0,'L');
				else if($row['dia_semana'] == 6)
					$this->pdf->Cell(30,6,utf8_decode("Sábado"),1,0,'L');
				$this->pdf->SetXY(135,$y);
				$this->pdf->Cell(40,6,$row['max_aluno'],1,0,'R');
				$this->pdf->SetXY(175,$y);
				$this->pdf->Cell(25,6,$row['valor_mensalidade'],1,0,'R');
				$y = $y+6; 		
			}
		}
		
		function aula_instrutor($per_ini, $per_fim){
			$result = $this->relatorio_model->get_aula_instrutor($per_ini, $per_fim);
			//190 tamanho máximo da celula
			$this->pdf->SetFont('Arial','B',12);// Configurando a fonte
			$this->pdf->SetXY(10,55);
			$this->pdf->Cell(55,10,"Instrutor",1,1,'C');
			$this->pdf->SetXY(65,55);// Posicionando as células			
			$this->pdf->Cell(20,10,"Inicio",1,1,'C');// Configurando as células
			$this->pdf->SetXY(85,55);
			$this->pdf->Cell(20,10,"Fim",1,1,'C');
			$this->pdf->SetXY(105,55);
			$this->pdf->Cell(40,10,"Dia da semana",1,1,'C');
			$this->pdf->SetXY(145,55);
			$this->pdf->Cell(30,10,utf8_decode("Data"),1,1,'C');
			$this->pdf->SetXY(175,55);
			$this->pdf->Cell(25,10,utf8_decode("Arte Marcial"),1,1,'C');
			
			$this->pdf->SetFont('Arial','B',10);// Configurando a fonte
			$y = 65;
			foreach($result->result_array() as $row){
				$this->pdf->SetXY(10,$y);
				$this->pdf->Cell(55,6,$row['nome']. " ". $row['sobrenome'],1,0,'L');
				$this->pdf->SetXY(65,$y);
				$this->pdf->Cell(20,6,$row['hr_inicio'],1,0,'R');//,$fill);
				$this->pdf->SetXY(85,$y);
				$this->pdf->Cell(20,6,$row['hr_termino'],1,0,'R');
				$this->pdf->SetXY(105,$y);
				if($row['dia_semana'] == 0)
					$this->pdf->Cell(40,6,"Domingo",1,0,'L');
				else if($row['dia_semana'] == 1)
					$this->pdf->Cell(40,6,"Segunda",1,0,'L');
				else if($row['dia_semana'] ==2)
					$this->pdf->Cell(40,6,utf8_decode("Terça"),1,0,'L');
				else if($row['dia_semana'] ==3)
					$this->pdf->Cell(40,6,"Quarta",1,0,'L');
				else if($row['dia_semana'] ==4)
					$this->pdf->Cell(40,6,"Quinta",1,0,'L');
				else if($row['dia_semana'] == 5)
					$this->pdf->Cell(40,6,"Sexta",1,0,'L');
				else if($row['dia_semana'] == 6)
					$this->pdf->Cell(40,6,utf8_decode("Sábado"),1,0,'L');
				$this->pdf->SetXY(145,$y);
				$this->pdf->Cell(30,6,data_from_db($row['dt_aula']),1,0,'R');
				$this->pdf->SetXY(175,$y);
				$this->pdf->Cell(25,6,$row['nm_arte_marcial'],1,0,'R');
				$y = $y+6; 		
			}
		}
		
		function aluno_grad($per_ini, $per_fim){
			$result = $this->relatorio_model->get_aluno_grad($per_ini, $per_fim);
			//190 tamanho máximo da celula
			$this->pdf->SetFont('Arial','B',12);// Configurando a fonte
			$this->pdf->SetXY(10,55);
			$this->pdf->Cell(55,10,"Aluno",1,1,'C');
			$this->pdf->SetXY(65,55);// Posicionando as células			
			$this->pdf->Cell(40,10,"Data de Nascimento",1,1,'C');// Configurando as células
			$this->pdf->SetXY(105,55);
			$this->pdf->Cell(20,10,"Sexo",1,1,'C');
			$this->pdf->SetXY(125,55);
			$this->pdf->Cell(75,10,utf8_decode("Graduação"),1,1,'C');
			
			$this->pdf->SetFont('Arial','B',10);// Configurando a fonte
			$y = 65;
			foreach($result->result_array() as $row){
				$this->pdf->SetXY(10,$y);
				$this->pdf->Cell(55,6,$row['nome']. " ". $row['sobrenome'],1,0,'L');
				$this->pdf->SetXY(65,$y);
				$this->pdf->Cell(40,6,data_from_db($row['dt_nascimento']),1,0,'R');//,$fill);
				$this->pdf->SetXY(105,$y);
				if($row['sexo'] == "F")
					$this->pdf->Cell(20,6,"Feminino",1,0,'R');
				else
					$this->pdf->Cell(20,6,"Masculino",1,0,'R');
				$this->pdf->SetXY(125,$y);
				$this->pdf->Cell(75,6,$row['graduacao'],1,0,'L');
				$y = $y+6; 		
			}
		}	
		
		function aulas(){
		
		}	
			
		function gerar_pdf($dados = NULL) {
			/* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
			$this->load->library('form_validation');
			$per_ini = $this->input->post('dt_inicio');	
			$per_fim = $this->input->post('dt_fim');
            $nome_instrutor = $this->input->post('nome_instrutor');
			$datestring = "%Y-%m-%d";
			$data=mdate($datestring);	
            //die(print_r($nome_instrutor));		
			/* Define as tags onde a mensagem de erro será exibida na página */
			$this->form_validation->set_error_delimiters('<span class="alert alert-danger">', '</span>');
			
			$validacoes = array(
				array(
					'field' => 'relatorio',
					'label' => 'Relatório',
					'rules' => 'required'
				)/*,
				array(
					'field' => 'dt_inicio',
					'label' => 'Data início',
					'rules' => 'required'
				),
				array(
					'field' => 'dt_fim',
					'label' => 'Data Fim',
					'rules' => 'required'
				)*/
	    	);		
			
    		$this->form_validation->set_rules($validacoes);			
			
			
			if ($this->form_validation->run() === FALSE) {
				$this->form_relatorio();
			}else{
				$tp_report = $this->input->post('relatorio');
                
                if($this->input->post('dt_inicio') != ""){
				    $per_ini = $this->input->post('dt_inicio');			
				    $per_fim = $this->input->post('dt_fim');
                } else if($this->input->post('dt_inicio_2') != ""){
				    $per_ini = $this->input->post('dt_inicio_2');			
				    $per_fim = $this->input->post('dt_fim_2');
                }else if($this->input->post('dt_inicio_3') != ""){
				    $per_ini = $this->input->post('dt_inicio_3');			
				    $per_fim = $this->input->post('dt_fim_3');
                }else if($this->input->post('dt_inicio_4') != ""){
				    $per_ini = $this->input->post('dt_inicio_4');			
				    $per_fim = $this->input->post('dt_fim_4');
                }else if($this->input->post('dt_inicio_5') != ""){
				    $per_ini = $this->input->post('dt_inicio_5');			
				    $per_fim = $this->input->post('dt_fim_5');
                }else if($this->input->post('dt_inicio_6') != ""){
				    $per_ini = $this->input->post('dt_inicio_6');			
				    $per_fim = $this->input->post('dt_fim_6');
                }
				//echo $per_fim;
				//$tp_report = "teste";
							
				$this->pdf->AddPage();			
				
				$this->pdf->SetXY(10,35);// Posicionando as células
				$this->pdf->Cell(190,15,"",1,1,'C');// Célula do cabeçalho
				$this->pdf->SetFont('Arial','B',15);
				$this->pdf->SetXY(25,25);
				$this->pdf->Cell(5,35,utf8_decode($tp_report));
				$this->pdf->SetFont('Arial','I',9);
				$this->pdf->SetXY(150,25);
				$this->pdf->Cell(45,35,utf8_decode("período: "). data_from_db($per_ini). " a ". data_from_db($per_fim));
				$this->pdf->SetFont('Arial','I',7);
				
				//fonte dos campos 
				$this->pdf->SetFont('Arial','B',9);
				//posicionamento dos campos
				$this->pdf->SetXY(10,55);
				$x = 10;
				//campos do relatorio
				if($tp_report == "Relatório de alunos matriculados."){
					$this->alunos_matri($per_ini, $per_fim);
					$nome_report = "Alunos Matriculados.pdf";
				}
				else if($tp_report == "Relatório de instrutores."){
					$this->instrutor($per_ini, $per_fim);
					$nome_report = "Instrutores.pdf";
				}
				else if($tp_report == "Relatório de alunos por instrutor."){
					$this->aluno_instrutor($per_ini, $per_fim, $nome_instrutor);
					$nome_report = "Alunos por instrutor.pdf";
				}
				else if($tp_report == "Relatório de turmas."){
					$this->turma($per_ini, $per_fim);
					$nome_report = "Turmas.pdf";
				}
				else if($tp_report == "Relatório de aulas por instrutor."){
					$this->aula_instrutor($per_ini, $per_fim);
					$nome_report = "Aulas por instrutor.pdf";
				}
				else if($tp_report == "Relatório de alunos por graduação."){
					$this->aluno_grad($per_ini, $per_fim);
					$nome_report = "Aluno graduação.pdf";
				}else if($tp_report == "Relatório de aulas."){
					$this->aulas();
					$nome_report = "Relatório de aulas.";
				}
				$this->pdf->Output($nome_report,"D");
			}
		}
		
		
		/*public function get(){
			$data = $this->relatorio_model->get(1);
			print_r($data);
			
			//$this->output->enable_profiler(true);
		}*/
	}