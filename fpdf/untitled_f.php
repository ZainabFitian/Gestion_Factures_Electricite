<?php
header( 'content-type: text/html; charset=utf-8' );
require "fpdf.php";
session_start();
$db = new PDO('mysql:host=localhost;dbname=facturation','root','root');
#$ID_CLIENT = $_GET['ID_CLIENT'];

#echo $ID_CLIENT;

//echo $consommation;

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
		$stmt = $db->query('select ID_CLIENT,adresse_client from client where ID_CLIENT='.$_GET['ID_CLIENT']);
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
			$this->Cell(40,6,$data->ID_CLIENT,'T',0,'C',TRUE);
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
		}
	}

	function viewTable1($db){
		$this->SetFont('Times','',11);

		$stmt1 = $db->query('select annee,ID_CLIENT,id_agent from consommation_annuelle where annee='.$_GET['annee'].' and ID_CLIENT='.$_GET['ID_CLIENT']);
		while($data1 = $stmt1->fetch(PDO::FETCH_OBJ)){


			$this->SetY( +65 ); 
			$this->SetX( +120 ); 
			$this->SetFont('Arial','B',12);
			$this->Cell(0,5,'Annee ',1,0,'L');
			$this->SetX( +145 ); 
			$this->Cell(0,5,$data1->annee,1,0,'L');

			
			$this->SetX( +60 ); 
			$this->SetFont('Times','B',12);
			$this->Cell(0,5,'ID client',1,0,'L');
			$this->SetX( +80 ); 
			$this->SetFont('Times','',12);
			$this->Cell(0,5,$data1->ID_CLIENT,1,0,'L');


			$this->SetX( +200 ); 
			$this->SetFont('Times','B',12);
			$this->Cell(0,5,'ID Agent',1,0,'L');
			$this->SetX( +220 ); 
			$this->SetFont('Times','',12);
			$this->Cell(0,5,$data1->id_agent,0,0,'L');
			$this->Ln();

		}
	}

	function viewTable2($db){
		$this->SetFont('Times','',11);
		$stmt2 = $db->query('select sum(consommation) as c_a,sum(prix_ht) as p_a,sum(prix_ttc) as t_a from facture where year(date_facture)='.$_GET['annee'].' and ID_CLIENT='.$_GET['ID_CLIENT']);


		while($data2 = $stmt2->fetch(PDO::FETCH_OBJ)){

			$this->SetDrawColor(200,200,200);
			$this->SetY( +85 ); 
			$this->SetFont('Arial','',12);
			$this->SetX( +60 ); 
			$this->Cell(50,8,'','LT',0,'L');
			$this->Cell(60,8,'Consommation en Kwh','T',0,'C');
			$this->Cell(60,8,'Montant en Dhs','TR',0,'C');

			$this->Ln();
			$this->SetX( +60 ); 
			$this->SetFont('Arial','B',12);
			$this->Cell(50,8,'Electricite','L',0,'L');
			$this->Cell(60,8,$data2->c_a,0,0,'C');
			$this->Cell(60,8,$data2->p_a,'R',0,'C');
			$this->Ln();

			$this->SetX( +60 ); 
			$this->Cell(50,8,'Taxes','L',0,'L');
			$this->Cell(60,8,'','',0,'C');
			$this->Cell(60,8,$data2->t_a-$data2->p_a,'R',0,'C');
			$this->Ln();

			$this->SetX( +60 ); 
			$this->Cell(50,8,'Total TTC','LB',0,'L');
			$this->Cell(60,8,'','B',0,'C');
			$this->Cell(60,8,$data2->t_a,'BR',0,'C');
			$this->Ln();
			$da = $data2->c_a;
			$consom = $_GET['consommation'];
			

		}
		if ($data2->c_a == $consom) {
			$this->SetX( +60 ); 
			#echo $da;
			#echo $consom;
			$this->Cell(170,8,'Tout est bien regler','LBR',0,'C');
		}else{
			$this->SetX( +60 ); 
			#echo $da;
			#echo $consom;
			$this->Cell(170,8,'Il vous reste a payer '.abs($da-$consom*1.07).' Dhs.','LBR',0,'C');
		}
	}

	function viewTable3($db){
		$this->SetFont('Times','',11);
			$this->SetY( +130 ); 
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

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->viewTable($db);
$pdf->viewTable1($db);
$pdf->viewTable2($db);
$pdf->viewTable3($db);
$pdf->Output();




?>