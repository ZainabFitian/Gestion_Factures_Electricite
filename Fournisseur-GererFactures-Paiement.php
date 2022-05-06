<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Access Denied</title>
<link rel="stylesheet" href="style.css" type="text/css"  />
<style>
        #main2 {
            position: absolute;
            top: 300px;
            left: 350px;
            background-color: powderblue;
            padding : 50px;
            width : 50%;
        }
        #text{
            margin-bottom: 50px;
        }
        h2{
            font-size:30px;
            color:green;
        }
        p  {
            font-size:20px;
        }
        button{
            position: absolute;
            left: 280px;
            width:100px;
            height:30px;
        }
    </style>
</head>
<body>
<?php
	include_once 'config.php';

	if(isset($_GET['idFacture']))
	{
		$idFacture = $_GET['idFacture'];
		$stmt=$con->prepare("UPDATE facture SET Status='payée' WHERE IdFacture=:idFacture");
		$stmt->execute(array(':idFacture'=>$idFacture));
	}
?>

		<div id="main2">
            <div id="text">
                <h2>DONE !</h2>
                <p><b>Status changé à payée.</b></p>
            </div>
            <p><a href="Fournisseur-GererFactures.php" ><button class="button" >Retour</button</a></p>
        </div>