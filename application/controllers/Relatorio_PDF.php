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
			//die(print_r($result->result_array()));
			//die();
			//$dados = array('nomedb'=> array('nome' => 'nome', 'display' => 'NOME', 'x' => '5', 'orientacao' => '0', 'L,R,C' => 'L', '1' => '1', '1' => 1))
			
				//190 tamanho máximo da celula
			$this->pdf->SetFont('Arial','B',9);// Configurando a fonte
			$this->pdf->SetXY(10,55);// Posicionando as células
			$this->pdf->Cell(70,15,"Nome",1,1,'L');// Configurando as células
			$this->pdf->SetXY(80,55);
			$this->pdf->Cell(35,15,"Data de Nascimento",1,1,'L');
			$this->pdf->SetXY(115,55);
			$this->pdf->Cell(20,15,"Sexo",1,1,'L');
			$this->pdf->SetXY(135,55);
			$this->pdf->Cell(25,15,"CPF",1,1,'L');
			$this->pdf->SetXY(160,55);
			$this->pdf->Cell(40,15,utf8_decode("Observações"),1,1,'L');
			
			$y = 75;
			foreach($result->result_array() as $row){
				//die(print_r($row));
				$this->pdf->SetXY(10,$y);
				$this->pdf->Cell(70,10,$row['nome']. " " . $row['sobrenome'],1,0,'L');//,$fill);
				$this->pdf->SetXY(80,$y);
				$this->pdf->Cell(35,10,$row['dt_nascimento'],1,0,'L');
				$this->pdf->SetXY(115,$y);
				$this->pdf->Cell(20,10,$row['sexo'],1,0,'L');
				$this->pdf->SetXY(135,$y);
				$this->pdf->Cell(25,10,$row['cpf'],1,0,'L');
				$this->pdf->SetXY(160,$y);
				$this->pdf->Cell(40,10,$row['observacao'],1,0,'L');
				$y = $y+10; 		
			}
		}
		
		function instrutor(){
			$result = $this->relatorio_model->get_instrutor();
			//die(print_r($result->result_array()));
			//die();
			//$dados = array('nomedb'=> array('nome' => 'nome', 'display' => 'NOME', 'x' => '5', 'orientacao' => '0', 'L,R,C' => 'L', '1' => '1', '1' => 1))
			
				//190 tamanho máximo da celula
			$this->pdf->SetFont('Arial','B',9);// Configurando a fonte
			$this->pdf->SetXY(10,55);// Posicionando as células
			$this->pdf->Cell(70,15,"Nome",1,1,'L');// Configurando as células
			$this->pdf->SetXY(80,55);
			$this->pdf->Cell(35,15,"Data de Nascimento",1,1,'L');
			$this->pdf->SetXY(115,55);
			$this->pdf->Cell(20,15,"Sexo",1,1,'L');
			$this->pdf->SetXY(135,55);
			$this->pdf->Cell(25,15,"CPF",1,1,'L');
			$this->pdf->SetXY(160,55);
			$this->pdf->Cell(40,15,utf8_decode("E-mail"),1,1,'L');
			
			$y = 75;
			foreach($result->result_array() as $row){
				//die(print_r($row));
				$this->pdf->SetXY(10,$y);
				$this->pdf->Cell(70,10,$row['nome']. " " . $row['sobrenome'],1,0,'L');//,$fill);
				$this->pdf->SetXY(80,$y);
				$this->pdf->Cell(35,10,$row['dt_nascimento'],1,0,'L');
				$this->pdf->SetXY(115,$y);
				$this->pdf->Cell(20,10,$row['sexo'],1,0,'L');
				$this->pdf->SetXY(135,$y);
				$this->pdf->Cell(25,10,$row['cpf'],1,0,'L');
				$this->pdf->SetXY(160,$y);
				$this->pdf->Cell(40,10,$row['email'],1,0,'L');
				$y = $y+8; 		
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
			}
			if($tp_report == "Relatório de instrutores."){
				$this->instrutor();
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
			$this->pdf->Output("arquivo.pdf","D");
		}
		
		/*public function index() {
			$this->template->load('relatorio/form_relatorio');
		}*/
		
		
		
		/*public function get(){
			$data = $this->relatorio_model->get(1);
			print_r($data);
			
			//$this->output->enable_profiler(true);
		}*/
		
	}