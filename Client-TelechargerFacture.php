<?php
session_start();
$id = $_SESSION['NumContrat'] ;


$conn = mysqli_connect("localhost","root", "","db_tp2");
// echo "1" ;
if (!$conn) {
    // echo "2" ;
    die("Connection failed: " . mysqli_connect_error());
  }

require_once 'fpdf/fpdf.php';

$idfacture = $_GET['idFacture'];
$sql ="SELECT * FROM facture WHERE IdFacture='$idfacture'";
$sql1="SELECT Nom, Prenom, IdZone from client WHERE NumContrat='$id'";
$result = $conn->query($sql);
$result1 = $conn->query($sql1);

//mise en page du pdf
class PDF extends FPDF
{
    //entete
    function Header()
    {
    // Logo
    $this->Image('images/logo.png',110,0,100);

    // Police Arial gras 15
    $this->SetFont('Arial','B',30);
    // Décalage à droite
    $this->Cell(80);
    // Titre
    $this->Ln(60);
    $this->Cell(180,10,'Votre facture d\'electricite de ce mois :',0,0,'C');
    // Saut de ligne
    $this->Ln(20);
    }
    function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Contactez nous +212-539994241     Site web FacturEnsa.       adresse avenue Med Bennouna,Tetouan',0,0,'C');
}
}




//if(isset($_POST['submit']))
//{
    ob_start();
    
    $pdf = new PDF('p','mm','a4');
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','B',16);
    $pdf->AddPage();
//nom et prenom client
    while($row = $result1->fetch_assoc())
    {
        $pdf->cell('60','10','Nom : ','0','0');
        $pdf->cell('60','10',$row["Nom"],'0','1');
        $pdf->cell('60','10','Prenom : ','0','0');
        $pdf->cell('60','10',$row["Prenom"],'0','1');
    }

    //Id facture
    
    while($row = $result->fetch_assoc())
    {
        $pdf->cell('60','10','Numero de Contrat : ','0','0');
        $pdf->cell('60','10',$row["NumContrat"],'0','1');
        $pdf->cell('60','10','Date Echeance : ','0','0');
        $pdf->cell('60','10',$row["DateEcheance"],'0','1');
        $pdf->cell('60','10','Date Emission : ','0','0');
        $pdf->cell('60','10',$row["DateEmission"],'0','1');
        $pdf->cell('60','10','Consommation : ','0','0');
        $pdf->cell('60','10',$row["Consom"].' KWH','0','1');
        $pdf->cell('60','10','MontantHT : ','0','0');
        $pdf->cell('60','10',$row["MontantHT"].' DH','0','1');
        $pdf->cell('60','10','TVA : ','0','0');
        $pdf->cell('60','10',$row["TVA"].' DH','0','1');
        $pdf->cell('60','10','Montant TTC : ','0','0');
        $pdf->cell('60','10',$row["MontantTTC"].' DH','0','1');
    }
   
    
    $pdf->Output('mafacture.pdf','D');
    ob_end_flush();   

//}
?>
