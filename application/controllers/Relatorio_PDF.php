<?php 
	
	class Relatorio_PDF extends MY_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->model('relatorio_model');
			$this->load->library('pdf');
			$this->pdf->fontpath = 'font/';
		}
		
		public function form_relatorio(){
			$this->template->load('relatorio/form_relatorio');
		}
		
		function alunos_matri(){
			$result = $this->relatorio_model->aluno_matri();
			
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
				$this->pdf->Cell(30,6,$row['dt_nascimento'],1,0,'R');
				$this->pdf->SetXY(95,$y);
				$this->pdf->Cell(20,6,$row['sexo'],1,0,'L');
				$this->pdf->SetXY(115,$y);
				$this->pdf->Cell(25,6,$row['cpf'],1,0,'R');
				$this->pdf->SetXY(140,$y);
				$this->pdf->Cell(60,6,$row['observacao'],1,0,'L');
				$y = $y+6; 		
			}
		}
		
		function instrutor(){
			$result = $this->relatorio_model->get_instrutor();			
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
				$this->pdf->Cell(30,6,$row['dt_nascimento'],1,0,'R');
				$this->pdf->SetXY(95,$y);
				$this->pdf->Cell(20,6,$row['sexo'],1,0,'L');
				$this->pdf->SetXY(115,$y);
				$this->pdf->Cell(25,6,$row['cpf'],1,0,'R');
				$this->pdf->SetXY(140,$y);
				$this->pdf->Cell(60,6,$row['email'],1,0,'L');
				$y = $y+6; 		
			}
		}
		
		function aluno_instrutor(){
			$result = $this->relatorio_model->aluno_instrutor();
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
				$this->pdf->Cell(40,6,$row['nasc_aluno'],1,0,'R');
				$this->pdf->SetXY(105,$y);
				$this->pdf->Cell(40,6,$row['sexo_aluno'],1,0,'L');
				$this->pdf->SetXY(145,$y);
				$this->pdf->Cell(55,6,$row['nome_instrutor']. " " .$row['sobrenome_instrutor'],1,0,'L');
				$y = $y+6; 		
			}
		}
		
		function turma(){
			$result = $this->relatorio_model->get_turma();
			//200 tamanho máximo da celula
			$this->pdf->SetFont('Arial','B',12);// Configurando a fonte
			$this->pdf->SetXY(10,55);
			$this->pdf->Cell(55,10,"Instrutor",1,1,'C');
			$this->pdf->SetXY(65,55);// Posicionando as células			
			$this->pdf->Cell(20,10,"Inicio",1,1,'C');// Configurando as células
			$this->pdf->SetXY(85,55);
			$this->pdf->Cell(20,10,"Fim",1,1,'C');
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
				$this->pdf->Cell(55,6,$row['nome']. " ". $row['sobrenome'],1,0,'L');
				$this->pdf->SetXY(65,$y);
				$this->pdf->Cell(20,6,$row['hr_inicio'],1,0,'R');//,$fill);
				$this->pdf->SetXY(85,$y);
				$this->pdf->Cell(20,6,$row['hr_termino'],1,0,'R');
				$this->pdf->SetXY(105,$y);
				if($row['dia_semana'] == "D")
					$this->pdf->Cell(30,6,"Domingo",1,0,'L');
				else if($row['dia_semana'] == "S")
					$this->pdf->Cell(30,6,"Segunda",1,0,'L');
				else if($row['dia_semana'] == "T")
					$this->pdf->Cell(30,6,"Terça",1,0,'L');
				else if($row['dia_semana'] == "Q")
					$this->pdf->Cell(30,6,"Quarta",1,0,'L');
				else if($row['dia_semana'] == "Q")
					$this->pdf->Cell(30,6,"Quinta",1,0,'L');
				else if($row['dia_semana'] == "S")
					$this->pdf->Cell(30,6,"Sexta",1,0,'L');
				else if($row['dia_semana'] == "S")
					$this->pdf->Cell(30,6,"Sábado",1,0,'L');
				$this->pdf->SetXY(135,$y);
				$this->pdf->Cell(40,6,$row['max_aluno'],1,0,'R');
				$this->pdf->SetXY(175,$y);
				$this->pdf->Cell(25,6,$row['valor_mensalidade'],1,0,'R');
				$y = $y+6; 		
			}
		}
		
		function aula_instrutor(){
			$result = $this->relatorio_model->get_aula_instrutor();
			//190 tamanho máximo da celula
			$this->pdf->SetFont('Arial','B',12);// Configurando a fonte
			$this->pdf->SetXY(10,55);
			$this->pdf->Cell(55,10,"Instrutor",1,1,'C');
			$this->pdf->SetXY(65,55);// Posicionando as células			
			$this->pdf->Cell(20,10,"Inicio",1,1,'C');// Configurando as células
			$this->pdf->SetXY(85,55);
			$this->pdf->Cell(20,10,"Fim",1,1,'C');
			$this->pdf->SetXY(105,55);
			$this->pdf->Cell(30,10,"Dia da semana",1,1,'C');
			$this->pdf->SetXY(135,55);
			$this->pdf->Cell(40,10,utf8_decode("Data"),1,1,'C');
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
				if($row['dia_semana'] == "D")
					$this->pdf->Cell(30,6,"Domingo",1,0,'L');
				else if($row['dia_semana'] == "S")
					$this->pdf->Cell(30,6,"Segunda",1,0,'L');
				else if($row['dia_semana'] == "T")
					$this->pdf->Cell(30,6,"Terça",1,0,'L');
				else if($row['dia_semana'] == "Q")
					$this->pdf->Cell(30,6,"Quarta",1,0,'L');
				else if($row['dia_semana'] == "Q")
					$this->pdf->Cell(30,6,"Quinta",1,0,'L');
				else if($row['dia_semana'] == "S")
					$this->pdf->Cell(30,6,"Sexta",1,0,'L');
				else if($row['dia_semana'] == "S")
					$this->pdf->Cell(30,6,"Sábado",1,0,'L');
				$this->pdf->SetXY(135,$y);
				$this->pdf->Cell(40,6,$row['dt_aula'],1,0,'R');
				$this->pdf->SetXY(175,$y);
				$this->pdf->Cell(25,6,$row['nm_arte_marcial'],1,0,'R');
				$y = $y+6; 		
			}
		}
		
		function aluno_grad(){
			$result = $this->relatorio_model->get_aluno_grad();
			//190 tamanho máximo da celula
			$this->pdf->SetFont('Arial','B',12);// Configurando a fonte
			$this->pdf->SetXY(10,55);
			$this->pdf->Cell(55,10,"Aluno",1,1,'C');
			$this->pdf->SetXY(65,55);// Posicionando as células			
			$this->pdf->Cell(40,10,"Data de Nascimento",1,1,'C');// Configurando as células
			$this->pdf->SetXY(105,55);
			$this->pdf->Cell(20,10,"Sexo",1,1,'C');
			$this->pdf->SetXY(125,55);
			$this->pdf->Cell(75,10,"Graduação",1,1,'C');
			
			$this->pdf->SetFont('Arial','B',10);// Configurando a fonte
			$y = 65;
			foreach($result->result_array() as $row){
				$this->pdf->SetXY(10,$y);
				$this->pdf->Cell(55,6,$row['nome']. " ". $row['sobrenome'],1,0,'L');
				$this->pdf->SetXY(65,$y);
				$this->pdf->Cell(40,6,$row['dt_nascimento'],1,0,'R');//,$fill);
				$this->pdf->SetXY(105,$y);
				$this->pdf->Cell(20,6,$row['sexo'],1,0,'R');
				$this->pdf->SetXY(125,$y);
				$this->pdf->Cell(75,6,$row['graduacao'],1,0,'L');
				$y = $y+6; 		
			}
		}		
			
		function gerar_pdf($dados = NULL) {
			
			$tp_report = $this->input->post('relatorio');
			$per_ini = $this->input->post('dt_inicio');
			//echo $per_ini;
			$per_fim = $this->input->post('dt_fim');
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
			$this->pdf->Cell(45,35,utf8_decode("período: "). $per_ini. " a ". $per_fim);
			$this->pdf->SetFont('Arial','I',7);
			
			//fonte dos campos 
			$this->pdf->SetFont('Arial','B',9);
			//posicionamento dos campos
			$this->pdf->SetXY(10,55);
			$x = 10;
			//campos do relatorio
			if($tp_report == "Relatório de alunos matriculados."){
				$this->alunos_matri();
				$nome_report = "Alunos Matriculados.pdf";
			}
			else if($tp_report == "Relatório de instrutores."){
				$this->instrutor();
				$nome_report = "Instrutores.pdf";
			}
			else if($tp_report == "Relatório de alunos por instrutor."){
				$this->aluno_instrutor();
				$nome_report = "Alunos por instrutor.pdf";
			}
			else if($tp_report == "Relatório de turmas."){
				$this->turma();
				$nome_report = "Turmas.pdf";
			}
			else if($tp_report == "Relatório de aulas por instrutor."){
				$this->aula_instrutor();
				$nome_report = "Aulas por instrutor.pdf";
			}
			else if($tp_report == "Relatório de alunos por graduação."){
				$this->aluno_grad();
				$nome_report = "Aluno graduação.pdf";
			}
			/*$result = $this->relatorio_model->recebe();
			//print_r($result);
			//die();
			//$dados = array('nomedb'=> array('nome' => 'nome', 'display' => 'NOME', 'x' => '5', 'orientacao' => '0', 'L,R,C' => 'L', '1' => '1', '1' => 1))
			foreach($result as $chave => $row){
				//190 tamanho máximo da celula
				
				die(print_r(array ($row)));
				$teste = array_keys(array ($row));
				die(print_r($teste));
				$this->pdf->Cell(5,15, $teste[$chave],1,1,'L');// Configurando as células
				$x = $x+25;
				$this->pdf->SetXY($x,55);
			}*/
			/*foreach($dados as $row){
				//190 tamanho máximo da celula
				$this->pdf->Cell($row['x'],15,$row['display'],1,1,'L');// Configurando as células
				$x = $x+$row['x'];
				$this->pdf->SetXY($x,55);
			}		
			/* Colunas do Formulário */
			/*$this->pdf->SetFont('Arial','B',9);// Configurando a fonte
			$this->pdf->SetXY(10,55);// Posicionando as células
			$this->pdf->Cell(100,15,"Nome",1,1,'L');// Configurando as células
			$this->pdf->SetXY(110,55);
			$this->pdf->Cell(20,15,"Idade",1,1,'L');
			$this->pdf->SetXY(130,55);
			$this->pdf->Cell(25,15,"Faixa",1,1,'L');
			$this->pdf->SetXY(155,55);
			$this->pdf->Cell(45,15,utf8_decode("Data da Matrícula"),1,1,'L');
			*/
			//$fill = 0;
			//$y=75;
			
		/*	foreach($result->result_array() as $chave => $row){
				$this->pdf->SetXY(10,$y);
				$this->pdf->Cell(100,8,$chave,1,0,'L');//,$fill);
				//$fill=!$fill;
				$y = $y+8;   
			}			*/
			$this->pdf->Output($nome_report,"D");
		}
		
		
		
		/*public function get(){
			$data = $this->relatorio_model->get(1);
			print_r($data);
			
			//$this->output->enable_profiler(true);
		}*/
		
	}