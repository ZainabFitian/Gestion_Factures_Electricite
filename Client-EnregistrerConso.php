<?php 
    session_start();
    require_once 'config.php';
    if(array_key_exists('valider',$_POST))
     {
        $montant;
        $AncienIndex;
        $NouveauIndex;
        $cmois;
    
         try{
            
            if($_SESSION["DateDebutCtr"]==$_POST["dateemission"]){
                $GLOBALS["AncienIndex"] =0;
            }
            else{
            //Recuperer l'ancien index
            $stmt= $con->prepare("SELECT * From facture WHERE NumContrat=:nmr ORDER BY IdFacture DESC LIMIT 1");
            $stmt->execute(array(':nmr'=>$_SESSION['NumContrat']));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $GLOBALS["AncienIndex"] = $row['NouveauIndex'];
            }
            
            //extraire mois
            $date_div = explode("-", $_POST['dateemission']);
 
            $annee = $date_div[0];
            $mois = $date_div[1];
            $jour = $date_div[2];

            if($mois=='01'){
                $GLOBALS["cmois"] = 'janvier';
            }
            elseif($mois=='02'){
                $GLOBALS["cmois"] = 'fevrier';
            }
            elseif($mois=="03"){
                $GLOBALS["cmois"] = 'mars';
            }
            elseif($mois=="04"){
                $GLOBALS["cmois"] = 'avril';
            }
            elseif($mois=="05"){
                $GLOBALS["cmois"] = 'mai';
            }
            elseif($mois=="06"){
                $GLOBALS["cmois"] = 'juin';
            }
            elseif($mois=="07"){
                $GLOBALS["cmois"] = 'juillet';
            }
            elseif($mois=="08"){
                $GLOBALS["cmois"] = 'aout';
            }
            elseif($mois=="09"){
                $GLOBALS["cmois"] = 'septembre';
            }
            elseif($mois=="10"){
                $GLOBALS["cmois"] = 'octobre';
            }
            elseif($mois=="11"){
                $GLOBALS["cmois"] = 'novembre';
            }
            elseif($mois=="12"){
                $GLOBALS["cmois"] = 'decembre';
            }

            $stmt = $con->prepare("SELECT * FROM fichier WHERE NumContrat=:num AND Annee=:an");
            $anneee = intval($annee)-1;
            $stmt->bindParam(":num", $_SESSION['NumContrat']);
            $stmt->bindParam(":an", $anneee);
            $stmt->execute();
            $row = $stmt->fetch();
            @$supplement = $row["Supplement"];

            if($cmois == 'janvier'){
                $GLOBALS['NouveauIndex']=$_POST["nvindex"]+$GLOBALS["supplement"];
            }
            else{
                $GLOBALS['NouveauIndex']=$_POST["nvindex"];
            }

            //calculer la consommation
            $consommation = $NouveauIndex - $AncienIndex;

            //calculer le montant 
            if($GLOBALS["consommation"]<=100){
                $GLOBALS["montant"]= $GLOBALS["consommation"]*0.91;
            }
            elseif(101<=$GLOBALS["consommation"] && $GLOBALS["consommation"]<=200){
                $GLOBALS["montant"]= (100*0.91)+($GLOBALS["consommation"]-100)*1.01;
            }
            elseif($GLOBALS["consommation"]>=201){
                $GLOBALS["montant"]= $GLOBALS["consommation"]*1.12;
            }

            $TVA = $montant*14/100;
            $TTC = $montant + $TVA;
            $consom = $consommation;

            //validation automatique
            if(50<$GLOBALS["consom"] && $GLOBALS["consom"]<=400){
                    $stmt2 = $con->prepare("INSERT INTO 
                    facture(NumContrat, DateEcheance, DateEmission, Consom, MontantHT, TVA, MontantTTC, AncienIndex, NouveauIndex, Status, Valider, Mois, Annee) 
                    VALUES('$_SESSION[NumContrat]','$_POST[dateecheance]', '$_POST[dateemission]', $consommation, $montant, $TVA, $TTC,$AncienIndex, $GLOBALS[NouveauIndex], 'non paye',1,'$GLOBALS[cmois]', '$GLOBALS[annee]')");
                    $stmt2->execute();
            }
            else{
                $stmt2 = $con->prepare("INSERT INTO 
                facture(NumContrat, DateEcheance, DateEmission, Consom, MontantHT, TVA, MontantTTC, AncienIndex, NouveauIndex, Status, Valider, Mois, Annee) 
                VALUES('$_SESSION[NumContrat]','$_POST[dateecheance]', '$_POST[dateemission]', $consommation, $montant, $TVA, $TTC,$AncienIndex, $GLOBALS[NouveauIndex], 'non paye',0, '$GLOBALS[cmois]', '$GLOBALS[annee]')");
                $stmt2->execute();
             }
            }
            
             catch(PDOException $e){
                 echo $e->getMessage();
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
                <p><b>Consommation envoyée avec succès.</b></p>
            </div>
            <p><a href="Client-SaisirConso.php" ><button class="button" >Retour</button</a></p>
        </div>