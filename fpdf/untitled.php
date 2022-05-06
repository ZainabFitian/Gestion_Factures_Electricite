<?php
header( 'content-type: text/html; charset=utf-8' );
require "fpdf.php";
session_start();
$db = new PDO('mysql:host=localhost;dbname=facturation','root','root');
$id_client = $_SESSION['ID_CLIENT'];




class myPDF extends FPDF{
	function header(){

		$this->Image('Amendis.jpeg',25,10);

		
	}
	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}

	function viewTable($db){
		$this->SetFont('Times','',11);
		$stmt = $db->query('select id_client,adresse_client from client where id_client='.$_SESSION['ID_CLIENT']);
		while($data = $stmt->fetch(PDO::FETCH_OBJ)){
			$this->SetX( +155 ); 
			$this->SetFillColor(200,200,200);
			$this->SetDrawColor(255,255,255);
			$this->SetFont('Times','B',10);
			$this->Cell(40,6,'Tournee','LT',0,'L',TRUE);
			$this->Cell(40,6,'','T',0,'C',TRUE);
			$this->Cell(40,6,'','RT',0,'R',TRUE);


			$this->Ln();
			$this->SetX( +155 ); 
			$this->Cell(40,6,'Numero de client','LT',0,'L',TRUE);
			$this->Cell(40,6,$data->id_client,'T',0,'C',TRUE);
			$this->Cell(40,6,'','RT',0,'R',TRUE);
			$this->Ln();
			$this->SetX( +155 ); 
			$this->Cell(40,6,'ICE','LT',0,'L',TRUE);
			$this->Cell(40,6,'','T',0,'C',TRUE);
			$this->Cell(40,6,'','RT',0,'R',TRUE);
			$this->Ln();
			$this->SetX( +155 ); 
			$this->Cell(40,6,'Agence','LT',0,'L',TRUE);
			$this->Cell(40,6,'MATAR TETOUAN','T',0,'C',TRUE);
			$this->Cell(40,6,'','RT',0,'R',TRUE);
			$this->Ln();

			
			$this->Ln();
			$this->SetX( +155 ); 
			$this->SetFont('Arial','B',10,6);
			$this->Cell(0,5,'MM NAOUFAL ACHAHBAR',0,0,'L');
			$this->Ln();
			$this->SetX( +155 ); 
			$this->SetFont('Arial','B',10,6);
			$this->Cell(0,5,$data->adresse_client,0,0,'L');
			$this->Ln();
			$this->Ln();
		}
	}

	function viewTable1($db){
		$this->SetFont('Times','',11);

		$stmt1 = $db->query('select date_facture from facture where id_facture='.$_GET['ID_FACTUR']);
		while($data1 = $stmt1->fetch(PDO::FETCH_OBJ)){


			$this->SetY( +65 ); 
			$this->SetX( +135 ); 
			$this->SetFont('Arial','B',12);
			$this->Cell(0,5,'Facture N ',1,0,'L');
			$this->SetX( +165 ); 
			$this->Cell(0,5,$_GET['ID_FACTUR'],1,0,'L');

			
			$this->SetX( +65 ); 
			$this->SetFont('Times','B',12);
			$this->Cell(0,5,'Usage',1,0,'L');
			$this->SetX( +85 ); 
			$this->SetFont('Times','',12);
			$this->Cell(0,5,'BT DOMESTIQUE',1,0,'L');


			$this->SetX( +200 ); 
			$this->SetFont('Times','B',12);
			$this->Cell(0,5,'Date',1,0,'L');
			$this->SetX( +220 ); 
			$this->SetFont('Times','',12);
			$this->Cell(0,5,$data1->date_facture,0,0,'L');
			$this->Ln();

		}
	}
	function viewTable2($db){
		$this->SetFont('Times','',11);
		$stmt2 = $db->query('select consommation,prix_ht,prix_ttc,date_facture from facture where id_facture='.$_GET['ID_FACTUR']);
		while($data2 = $stmt2->fetch(PDO::FETCH_OBJ)){

			$this->SetDrawColor(200,200,200);
			$this->SetY( +85 ); 
			$this->SetX( +65 ); 
			$this->SetFont('Arial','',12);
			$this->SetX( +65 ); 
			$this->Cell(50,12,'','LT',0,'L');
			$this->Cell(60,12,'Consommation en Kwh','T',0,'C');
			$this->Cell(60,12,'Montant en Dhs','TR',0,'C');
			$this->Ln();
			$this->SetX( +65 ); 
			$this->SetFont('Arial','B',12);
			$this->Cell(50,10,'Electricite','L',0,'L');
			$this->Cell(60,10,$data2->consommation,0,0,'C');
			$this->Cell(60,10,$data2->prix_ht,'R',0,'C');
			$this->Ln();

			$this->SetX( +65 ); 
			$this->Cell(50,10,'Taxes','L',0,'L');
			$this->Cell(60,10,'','',0,'C');
			$this->Cell(60,10,$data2->prix_ttc-$data2->prix_ht,'R',0,'C');
			$this->Ln();

			$this->SetX( +65 ); 
			$this->Cell(50,10,'Total TTC','LB',0,'L');
			$this->Cell(60,10,'','B',0,'C');
			$this->Cell(60,10,$data2->prix_ttc,'BR',0,'C');
			$this->Ln();

		}
	}

	function viewTable3($db){
		$this->SetFont('Times','',11);
		$stmt3 = $db->query('select consommation,prix_ht,prix_ttc,date_facture from facture where id_facture='.$_GET['ID_FACTUR']);
		while($data3 = $stmt3->fetch(PDO::FETCH_OBJ)){
			$this->Ln();
			$this->Ln();
			$this->SetX( +25 ); 
			$this->SetFont('Times','B',10);
			$this->Cell(250,5,'Messages','LTR',0,'L');
			$this->Ln();
			$this->SetX( +25 ); 
			$this->SetFont('Times','',8);
			$this->Cell(250,5,'Pensez a controler le bon fonctionnement de vos appareils electriques et le thermostat de votre chauffe-eau : un dysfonctionnement peut entrainer une hausse sensible de votre consommation.','LBR',0,'L');
			$this->Ln();
			$this->Ln();
			$this->Ln();
			$this->Ln();
			$this->Ln();


			$this->Image('unnamed.jpeg',25,174,0,15);
			$this->SetX( +65 ); 
			$this->SetFont('Arial','',7);
			$this->Cell(0,3,'Siege social : 20, Rue Imam Ghazali, 90 000, Tanger-Maroc',0,0,'L');
			$this->Ln();
			$this->SetX( +65 ); 
			$this->Cell(0,3,'Societe Anonyme au capital de : 800 000 000 dirhams',0,0,'L');
			$this->Ln();
			$this->SetX( +65 ); 
			$this->Cell(0,3,'Rc Tanger numero 18665, Patente : 50436156, IF : 01087449, ICE: 001525935000020',0,0,'L');
			$this->Image('opere-par-veolia.jpeg',230,177,0,7);

		}
	}

}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->viewTable($db);
$pdf->viewTable1($db);
$pdf->viewTable2($db);
$pdf->viewTable3($db);
$pdf->Output();




?>