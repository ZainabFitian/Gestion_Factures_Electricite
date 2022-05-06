<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns:mso="urn:schemas-microsoft-com:office:office" xmlns:msdt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="Agent.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        #titre{
            font-size: 40px;
        }
        table.altrowstable {
            border-width: 1px;
            border-color:  #ddd;
            border-collapse: collapse;
        }
        table.altrowstable th {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #ddd;
            font-size: 20px;
        }
        table.altrowstable td {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #ddd;
            font-size: 22px;
        }
        #reclamations{
            position: absolute;
            right:50px;
        }
         #reclamations button {
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: #6f0a06;
        font-size: 16px;
        text-decoration: none;
        text-transform: uppercase;
        overflow: hidden;
        margin-top: 40px;
        letter-spacing: 4px
        }
        #reclamations button:hover {
            background-color: #6f0a06;
            color: #ddd;
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
            <a href="Client-accueil.php" class="nav-link">Accueil</a>
            <a href="Client-SaisirConso.php" class="nav-link">Saisir ma consommation</a>
            <a href="Client-ConsulterFactures.php" class="nav-link">Consulter mes factures</a>
            <a href="Client-Reclamer.php" class="nav-link">Réclamer</a>
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

    <section class="section-1" id="home">
	<div id="main"><br>
    <center>
	<h1 id="titre">Réclamations</h1>
 

        <table class="altrowstable" id="alternatecolor">
        <thead>
        <tr>
		<th>Objet</th>
		<th>Message</th>
        <th>Réponse</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once 'config.php';
        $stmt = $con->prepare("SELECT * FROM reclamation where NumContrat=:num ORDER BY IdReclamation DESC");
        $stmt->bindParam(":num", $_SESSION['NumContrat']);
        $stmt->execute();
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<tr>
			<td><?php echo $row['Objet']; ?></td>
			<td><?php echo $row['Message']; ?></td>
            <td><?php echo $row['Reponse']; ?></td>
			</tr>
			<?php
		}
		?>
        </table>
				<br>


        </center>

    </div>
    <a id="reclamations" href="Client-Reclamer.php"><button>Retour</button></a>
    </section>
   
     <!-- Footer -->
     <footer class="footer">
            <div class="footer-nav">
                <a href="Client-accueil.php">Accueil</a>
                <a href="Client-SaisirConso.php">Saisir ma consommation</a>
                <a href="Client-ConsulterFactures.php">Consulter mes factures</a>
                <a href="Client-Reclamer.php">Réclamer</a>
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