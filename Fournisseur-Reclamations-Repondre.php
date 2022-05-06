<?php
session_start();
include_once 'config.php';

if($_GET['enumContrat'])
{
	$numContrat = $_GET['enumContrat'];
	$stmt=$con->prepare("SELECT * FROM reclamation WHERE NumContrat=:enumContrat");
	$stmt->execute(array(':enumContrat'=>$numContrat));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Répondre aux réclamations</title>
    <link href="Fournisseur-Reclamations-Repondre.css" rel="stylesheet" type="text/css">

    </head>
    <body>
         <!-- Navbar -->
 <nav class="navbar">
        <div class="logo">
            <a href="#">
                <span>F</span>actur<span>E</span>nsa<span>.</span>
            </a>
        </div>
        <div class="nav-list">
            <a href="Fournisseur-Dashboard.php" class="nav-link">Dashboard</a>
            <a href="Fournisseur-GererClients.php" class="nav-link">Gérer les clients</a>
            <a href="Fournisseur-GererFactures.php" class="nav-link">Gérer les factures</a>
            <a href="Fournisseur-Reclamations.php" class="nav-link">Réclamations</a>
            <a href="Fournisseur-VerificationAnnuelle.php" class="nav-link">Vérification Annuelle</a>
            <a href="Logout.php" class="nav-link">Log out</a>
        </div>
    </nav>
     <!-- Menu -->
     <div class="menu">
        <div class="line line-1"></div>
        <div class="line line-2"></div>
        <div class="line line-3"></div>
    </div>
    <!-- End of Menu -->
    <h1>Répondre à la réclamation du porteur du contrat <?php echo $row['NumContrat']; ?> </h1>
    <section class="section-1">
        <div id="main2">
	        <form method='post' action="">
                <table class='table table-bordered'>
                    <tr>  
                        <td>Numéro de contrat</td>
                        <td><input type='text' name='numCtr' value="<?php echo $row['NumContrat']; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Objet</td>
                        <td><input type='text' name='objet' value="<?php echo $row['Objet']; ?>" class='form-control'></td>
                    </tr>
                    <tr>
                        <td>Message</td>
                        <td><textarea name='message'><?php echo $row['Message']; ?></textarea>
                    </tr>
                    <tr>
                        <td>Réponse</td>
                        <td><textarea name='reponse' class='form-control'></textarea>
                    </tr>            
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" name="envoyer" class="button" >Envoyer</button>
                        </td>
                    </tr>
            </table>
</form>
</div>
</section>
 
     <!-- Footer -->
     <footer class="footer">
            <div class="footer-nav">
                <a href="Fournisseur-Dashboard.php" >Dashboard</a>
                <a href="Fournisseur-GererClients.php">Gérer clients</a>
                <a href="Fournisseur-GererFactures.php">Gérer factures</a>
                <a href="Fournisseur-Reclamations.php">Réclamations</a>
                <a href="Fournisseur-VerificationAnnuelle.php">Vérification Annuelle</a>
            </div>
            <p class="copyright">
                Copyright &copy; FacturEnsa All Rights Reserved
            </p>
        </footer>
        <!-- End of Footer -->
        <script src="script.js"></script>
</body>
</html>

<?php

if(array_key_exists('envoyer',$_POST))
     {
         try{
             $stmt2 = $con->prepare("UPDATE reclamation SET Reponse='$_POST[reponse]' where NumContrat=:enumContrat");
             $stmt2->bindParam(":enumContrat", $numContrat);
             if($stmt2->execute())
                 {
                    echo '<script> alert("Réponse envoyée avec succès ! ")</script>';
                 }
                 else{
                     echo "Query Problem";
                 }
             }
             catch(PDOException $e){
                 echo $e->getMessage();
             }
             header("Location: Fournisseur-Reclamations.php");
         }
             

?>