<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	require('fpdf.php');
	
		class Pdf extends FPDF{
		// Extend FPDF using this class
		// More at fpdf.org -> Tutorials
			function __construct($orientation='P', $unit='mm', $size='A4')
			{
				// Call parent constructor
				parent::__construct($orientation,$unit,$size);
			}
			
			function Header() {
				//insere e posiciona a imagem/logomarca
				//$this->Cell(26,26,'',1,0,'C');
				$this->Image('assets/img/logoasatoacademy.png',8,10,26);			
				//Informa a fonte, seu estilo e seu tamanho     
				$this->SetFont('Arial','B',16);			
				//Informa o tamanho do box que receberá o cabeçalho
				//o texto que ele conterá, suas bordas e o alinhaento do texto
				$this->Cell(190,20,'Asamco Academy',1,0,'C');
				//$this->Cell(20,20,(base_url('assets/img/logoasatoacademy.png')), 1,0,'C');			
			}
			
			//Método Footer que estiliza o rodapé da página
			function Footer() {			
				//posicionamos o rodapé a 1cm do fim da página
				$this->SetY(-10);				
				//Informamos a fonte, seu estilo e seu tamanho
				$this->SetFont('Arial','I',8);			
				//Informamos o tamanho do box que vai receber o conteúdo do rodapé
				//e inserimos o número da página através da função PageNo()
				//além de informar se terá borda e o alinhamento do texto
				$this->Cell(0,10,'Page '.$this->PageNo().'/',0,0,'C');
			}			
	}
?>