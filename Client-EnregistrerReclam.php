<?php
 session_start();
require_once('config.php');

$stmt = $con->prepare("INSERT INTO reclamation (NumContrat, Nom, Prenom, Objet, Message) VALUES ('".$_SESSION['NumContrat']."', '".$_SESSION['Nom']."', '".$_SESSION['Prenom']."','".$_POST["objet"]."','".$_POST['message']."')");
$stmt->execute();




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
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
                <p><b>Votre réclamation est prise en considération.<br> Une réponse vous sera envoyée le plutot possible.</b></p>
            </div>
            <p><a href="Client-Reclamer.php" ><button class="button" >Retour</button</a></p>
        </div>