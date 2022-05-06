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
            <a href="Fournisseur-VerificationAnuelle.php" class="nav-link">Vérification Annuelle</a>
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
	<h1>Vérification Annuelle</h1>
 

        <table class="altrowstable" id="alternatecolor">
        <thead>
        <tr>
        <th>Id Zone</th>
        <th>Année</th>
        <th>Numero Contrat</th>
        <th>Consommation Annuelle</th>
        <th>Consomation Annuelle Saisie</th>
		<th>Supplément</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once 'config.php';
        include_once('Fournisseur-VerificationAnnuelle-Navigation.php');

        $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
        if ($page <= 0) $page = 1;

        // Nombre d'enregistrements par page.
        $per_page = 5; 

        $startpoint = ($page * $per_page) - $per_page;
        $statement = "`fichier` ORDER BY `id` ASC";

        $stmt = $con->prepare("SELECT * FROM fichier ORDER BY id DESC LIMIT {$startpoint} , {$per_page}");
        $stmt->execute();
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<tr>
            <td><?php echo $row['IdZone']; ?></td>
            <td><?php echo $row['Annee']; ?></td>
			<td><?php echo $row['NumContrat']; ?></td>
			<td><?php echo $row['Consommation']; ?></td>
            <td><?php echo $row['ConsoSaisieCumule']; ?></td>
			<td><?php echo $row['Supplement']; ?></td>
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