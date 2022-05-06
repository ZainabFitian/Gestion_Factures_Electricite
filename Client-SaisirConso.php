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

    <!-- Table goes in the document BODY -->
 <section class="section-1" id="home">
        <div class="login-box">
            <h2>Je saisie ma consommation</h2>
            <form method="post" action="Client-EnregistrerConso.php">
                <div class="user-box">
                    <label>Date d'émission</label>
                    <input type="date" name="dateemission" required>
                </div>
                <div class="user-box">
                    <label>Date d'échéance</label>
                    <input type="date" name="dateecheance" required>
                </div>
                <div class="user-box">
                    <label>Nouveau index</label>
                    <input type="number" step="any"  name="nvindex" placeholder="Votre consommation en KWH" required>
                </div>
                <button type="submit" name='valider'>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Valider
                </button>
            </form>
        </div>
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