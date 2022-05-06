<?php session_start(); ?>
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
            <a href="Agent-Acceder.php" class="nav-link">Accéder aux fichiers</a>
            <a href="Agent.php" class="nav-link">Ajouter fichier</a>
            <a href="index.php" class="nav-link">Log out</a>
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
            <h2>Fichier de Consommation Annuelle</h2>
            <form enctype="multipart/form-data" method="post" action="fichier.php">
                <div class="user-box">
                    <label>Année</label>
                    <br>
                    <select name="date" id="select">
                        <option >--Choisir l'année--</option>
                        <option>2017</option>
                        <option>2018</option>
                        <option>2019</option>
                        <option>2020</option>
                        <option>2021</option>
                        <option>2022</option>
                    </select>
                </div>
                <div class="user-box">
                    <label>Fichier</label>
                    <input type="file" name="file" required="">
                </div>
                <button type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Envoyer
                </button>
            </form>
        </div>
  </section>


     <!-- Footer -->
     <footer class="footer">
            <div class="footer-nav">
                <a href="Agent-Acceder.php">Accéder aux fichiers</a>
                <a href="Agent.php" >Ajouter fichier</a>
                <a href="index.php" >Log out</a>
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