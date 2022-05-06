<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" xmlns:mso="urn:schemas-microsoft-com:office:office" xmlns:msdt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">

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
            <a href="#home" class="nav-link">Accueil</a>
            <a href="Client-SaisirConso.php" class="nav-link">Saisir ma consommation</a>
            <a href="Client-ConsulterFactures.php" class="nav-link">Consulter mes factures</a>
            <a href="Client-Reclamer.php" class="nav-link">Réclamer</a>
            <a href="Logout.php" class="nav-link">Log out</a>
        </div>
    </nav>
    <!-- End of Navbar -->

    <!-- Menu -->
    <div class="menu">
        <div class="line line-1"></div>
        <div class="line line-2"></div>
        <div class="line line-3"></div>
    </div>
    <!-- End of Menu -->
    
    <div class="container">
        <!-- Section 1 -->
        <section class="section-1" id="home">
            <div class="banner">
                <h1 class="banner-heading">
                    <span class="heading-1">Gestion</span>
                    <span class="heading-2">Automatisation</span>
                    <span class="heading-3">Fiabilité</span>
                    <span class="heading-4">Stratégie</span>
                </h1>
                <p class="banner-paragraph">Factures d'éléctricité</p>
            </div>
        </section>
        <!-- End of Section 1 -->

        <!-- Section 2 -->
        <section class="section-2" id="nos-chiffres">
           
            <h1 class="section-heading">Nos chiffres</h1>
            <ul>
               <li id="clients">
                   <div class="title-wrap">
                        <h4>Clients</h4>
                    </div>
                   <span class="numberCount">8<span>K+</span></span>
                   
                </li>
                <li id="agents">
                    <div  class="title-wrap">
                         <h4>Agents</h4>
                    </div>
                   <span class="numberCount">30<span> +</span></span>
                
                </li>
                <li id="experience">
                    <div  class="title-wrap">
                        <h4>Expérience</h4>
                     </div>
                   <span class="numberCount">5<span> ans+</span></span>
                </li>
                <div class="clear"></div>
            </ul>
   
   </section>
        <!-- End of Section 2 -->

    

        <!-- Section 4 -->
        <section class="section-4" id="contact">
            <h1 class="section-heading">Contact</h1>
            <div class="section-heading-line"></div>
            <div class="contact-wrapper">
                <div class="contact-details">
                    <div class="phone">
                        <i class="fas fa-mobile-alt"></i>
                        <h3>Téléphone</h3>
                        <p>+212 676 789 256</p>
                        <p>+212 654 321 567</p>
                    </div>
                    <div class="address">
                        <i class="fas fa-map-marker-alt"></i>
                        <h3>Adresse</h3>
                        <p>Avenue Les Fars</p>
                        <p>Avenue Med Bennouna</p>
                    </div>
                    <div class="email">
                        <i class="far fa-envelope"></i>
                        <h3>Email</h3>
                        <p>support@gmail.com</p>
                        <p>sales@gmail.com</p>
                    </div>
                </div>
                <h1>Contactez-Nous</h1>
                <form class="contact-form" method="post">
                    <input type="text" name="nom" placeholder="Votre Nom">
                    <input type="email" name="mail" placeholder="Votre Email">
                    <textarea name="message" placeholder="Votre Message"></textarea>
                    <input type="submit" value="Envoyer Message">
                </form>
            </div>
        </section>
        <!-- End of Section 4 -->

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-nav">
                <a href="#home">Accueil</a>
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

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="script.js"></script>
</body>
</html>