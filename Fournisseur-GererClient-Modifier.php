<?php
include_once 'config.php';

if($_GET['enumContrat'])
{
	$numContrat = $_GET['enumContrat'];
	$stmt=$con->prepare("SELECT * FROM client WHERE NumContrat=:enumContrat");
	$stmt->execute(array(':enumContrat'=>$numContrat));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Modifier Client</title>
    <link href="Fournisseur-AjouterModifier.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
    <h1>Edit Information </h1>
    <section class="section-1">
        <div id="main2">
	        <form method='post' action="update.php">
                <table class='table table-bordered'>
                    <tr>
                        <td>Numéro de contrat</td>
                        <td><input type='text' name='numCtr' value="<?php echo $row['NumContrat']; ?>" placeholder='' required /></td>
                    </tr>
                    <tr>
                        <td>Nom</td>
                        <td><input type='text' name='nom' value="<?php echo $row['Nom']; ?>" placeholder='' required /></td>
                    </tr>
				    <tr>
						<td>Prénom</td>
						<td><input type='text' name='prenom' value="<?php echo $row['Prenom']; ?>" placeholder='' required /></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type='text' name='mail' value="<?php echo $row['Mail']; ?>" placeholder='' ></td>
                    </tr>
                    <tr>
                            <td>Tel</td>
                            <td><input type='text' name='tel' value="<?php echo $row['Tel']; ?>" class='form-control' placeholder=''>
                    </tr>
                    <tr>
                            <td>Date début contrat</td>
                            <td><input type='text' name='ddcontrat' value="<?php echo $row['DateDebutCtr']; ?>" required pattern="\d{4}-\d{2}-\d{2}">
                    </tr>
                    <tr>
                            <td>Id Zone</td>
                            <td><input type='number' name='idZone' value="<?php echo $row['IdZone']; ?>" class='form-control' placeholder=''>
                    </tr>
                
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="button" >Enregistrer
                            </button>
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
    </div>
</body>
</html>