<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Access Denied</title>
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>
<?php
	include_once 'config.php';

	if(isset($_GET['eidFacture']))
	{
		$idFacture = $_GET['eidFacture'];
		$stmt=$con->prepare("UPDATE facture SET Valider=1 WHERE IdFacture=:idFacture");
		$stmt->execute(array(':idFacture'=>$idFacture));
	}
?>
	<div id="main2">

		<h1><font color='red'>Vous avez validé le montant généré par la facture !</font></h1>

       


		<p><a href="Fournisseur-GererFactures.php" ><button class="button" >Retour</button</a>
</p>
        </div>