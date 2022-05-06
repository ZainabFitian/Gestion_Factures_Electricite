<!DOCTYPE html>
<html lang="en" xmlns:mso="urn:schemas-microsoft-com:office:office" xmlns:msdt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="Fournisseur-AjouterModifier.css">
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

    <!-- Table goes in the document BODY -->
    <h1> Ajouter nouveau client</h1>
    <section class="section-1">
        <div id="main2">
	        <form method='post'  action="Fournisseur-GererClients-CreerClient.php">
                <table class='table table-bordered'>
                       
                    <tr>
                        <td>Numéro de contrat</td>
                        <td><input type='text' name='numCtr'  placeholder='' required /></td>
                    </tr>
                    <tr>
                        <td>Nom</td>
                        <td><input type='text' name='nom'  placeholder='' required /></td>
                    </tr>
				    <tr>
						<td>Prénom</td>
						<td><input type='text' name='prenom'  placeholder='' required /></td>
                    </tr>
                    <tr>
						<td>Mot de passe</td>
						<td><input type='text' name='pswd'  placeholder='' required /></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type='text' name='mail' placeholder='' ></td>
                    </tr>
                    <tr>
                            <td>Tel</td>
                            <td><input type='text' name='tel' class='form-control' placeholder=''>
                    </tr>
                    <tr>
                            <td>Date début contrat</td>
                            <td><input type='date' name='ddcontrat' required pattern="\d{4}-\d{2}-\d{2}">
                    </tr>
                    <tr>
                            <td>Id Zone</td>
                            <td><input type='number' name='idZone' class='form-control' placeholder=''>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="button" >Ajouter</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </section>
  
        <script src="script.js"></script>
</body>
</html>