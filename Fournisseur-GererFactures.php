<!DOCTYPE html>
<html lang="en" xmlns:mso="urn:schemas-microsoft-com:office:office" xmlns:msdt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="Fournisseur-GererClients.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style type="text/css">
         form {
           margin: 20px 500px 20px 310px;
        }
        ul.pagination {
            text-align:center;
            color:#000;
        }
        ul.pagination li {
            display:inline;
            padding:0 3px;
        }
        ul.pagination a {
            color:#000;
            display:inline-block;
            padding:5px 10px;
            border:1px solid #9e0e09;
            text-decoration:none;
        }
        ul.pagination a:hover,
        ul.pagination a.current {
            background:#9e0e09;
            color:#fff;
        }
        </style>
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

    <!-- Table goes in the document BODY -->
    <section class="section-1" id="home">
	<div id="main"><br>
    <center>
	<h1>Gestion des factures</h1>
    </center>
    <form method="post" action="searchfactures.php">
			<input type="text"  name="search" placeholder="Chercher numero de contrat" required />
			<input value="Recherche" type="submit"  class="button">
	</form>
    <center>
        <table class="altrowstable" id="alternatecolor">
        <thead>
        <tr>
        <th>NumContrat</th>
        <th>Année</th>
        <th>Mois</th>
		<th>Ancien Index</th>
		<th>Nouvel Index</th>
        <th>Consommation</th>
	    <th>Montant Hors Tax</th>
        <th>TVA</th>
        <th>Montant TTC</th>
        <th>Status</th>
        <th>Valider</th>
        <th>Rejeter</th>
        <th>Régler paiement</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once 'config.php';
        include_once('Fournisseur-GererFactures-Navigation.php');

        $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
        if ($page <= 0) $page = 1;

        // Nombre d'enregistrements par page.
        $per_page = 5; 

        $startpoint = ($page * $per_page) - $per_page;
        $statement = "`facture` ORDER BY `IdFacture` ASC";

        $stmt = $con->prepare("SELECT * FROM facture ORDER BY IdFacture DESC LIMIT {$startpoint} , {$per_page}");
        $stmt->execute();
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<tr>
			<td><?php echo $row['NumContrat']; ?></td>
			<td><?php echo $row['Annee']; ?></td>
            <td><?php echo $row['Mois']; ?></td>
            <td><?php echo $row['AncienIndex']." KWH"; ?></td>
            <td><?php echo $row['NouveauIndex']." KWH"; ?></td>
			<td><?php echo $row['Consom']." KWH"; ?></td>
			<td><?php echo $row['MontantHT']." DH"; ?></td>
			<td><?php echo $row['TVA']." DH"; ?></td>
            <td><?php echo $row['MontantTTC']." DH"; ?></td>
            <td><?php echo $row['Status']; ?></td>
    
            <?php 
            if($row['Valider']==0){
			echo "<td align='center'>
			<a   href='Fournisseur-GererFactures-Valider.php?eidFacture=".$row['IdFacture']."'>
			<img src='images/accepter.png' width='20px' />
            </a></td>
			<td align='center'>
			<a   href='Fournisseur-GererFactures-Refuser.php?idFacture=".$row['IdFacture']."'>
			<img src='images/refuser.png' width='20px' />
            </a></td>";
            }
            else{
                echo "<td align='center'> -
			</td>
			<td align='center'>
            -
			</td>";
            }
            ?>
            <td align="center">
			<a   href="Fournisseur-GererFactures-Paiement.php?idFacture=<?php echo $row['IdFacture']; ?>">
			<img src="images/payé.png" width="20px" />
            </a></td>
            </tr>
           <?php
		}
		?>
        </table>
		<br>
        <?php
            // displaying paginaiton.
            echo pagination($statement,$per_page,$page);
        ?>

        </center>

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
    </div>
    <script src="script.js"></script>
</body>
</html>