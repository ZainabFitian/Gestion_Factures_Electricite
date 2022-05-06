<?php
session_start();
include('config.php');
$file = $_FILES["file"]["name"];
//on decompose le fichier ligne par ligne
$array = explode("\n", file_get_contents($file));

$new_array = array();
$indexed_array = Array('numContrat','consommation');

foreach($array as $key =>&$arr){

    $parts = preg_split('/\s+/', trim($arr));
    $new_array[$key] = array_combine($indexed_array,$parts);
}


for ($i = 0; $i < sizeof($new_array); $i++){
$numContrat = $new_array[$i]['numContrat'];
$consommation = $new_array[$i]['consommation'];
$date = date('Y-d-m'); 

$stmt = $con->prepare("SELECT * FROM facture WHERE NumContrat=:num AND Annee=:an AND Mois=:mo LIMIT 1");
$mois = "decembre";
$stmt->bindParam(":num", $numContrat);
$stmt->bindParam(":an", $_POST['date']);
$stmt->bindParam(":mo", $mois);
$stmt->execute();
$recup = $stmt->fetch();
$conso = $recup["NouveauIndex"];
//echo '<p>'.$conso.'</p>';
$supp= $consommation-$conso;

try{
$stmt2 = $con->prepare("INSERT INTO fichier(NumContrat, Consommation, Annee, IdZone, DateSaisie, ConsoSaisieCumule, Supplement) 
                        VALUES ('".$numContrat."', '".$consommation."', '".$_POST['date']."', '".$_SESSION['IdZone']."', '".$date."', $conso, $supp)");
	if($stmt2->execute())
    {
      echo 'Fichié envoyé avec succès !!';
    }
    else{
        echo "Query Problem";
    }
} catch (PDOException $e) {
    echo $e;
}
}



?>