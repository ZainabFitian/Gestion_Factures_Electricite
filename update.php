<?php
require_once 'config.php';


	if($_POST)
	{
        $numCtr = $_POST['numCtr'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['mail'];
        $tel = $_POST['tel'];
        $ddContrat = $_POST['ddcontrat'];
        $IdZone = $_POST['idZone'];


		$stmt = $con->prepare("UPDATE client SET NumContrat=:en,
			 Nom=:gd, Prenom=:gad, Mail=:em, Tel=:god, DateDebutCtr=:cd, IdZone=:ct WHERE NumContrat=:idr");
		
        $stmt->bindParam(":en", $numCtr);
        $stmt->bindParam(":gd", $nom);
		$stmt->bindParam(":gad", $prenom);
		$stmt->bindParam(":em", $email);
        $stmt->bindParam(":god", $tel);
		$stmt->bindParam(":cd", $ddContrat);
		$stmt->bindParam(":ct", $IdZone);
		$stmt->bindParam(":idr", $numCtr);

		if($stmt->execute())
		{
		  echo '<h1>Le client <span>'.$nom.' '.$prenom.'</span> est modifié avec succès.</h1>';
		}
		else{
			echo "Query Problem";
		}
	}

?>

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
        span{
            color: red;
        }
        h1{
            position: absolute;
            top: 100px;
            left: 300px;
            font-size: 30px;
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
        <div id="main2">
            <div id="text">
                <h2>DONE !</h2>
                <p><b>Client modifié dans la base de données.</b></p>
            </div>
            <p><a href="Fournisseur-GererClients.php" ><button class="button" >Retour</button</a></p>
        </div>