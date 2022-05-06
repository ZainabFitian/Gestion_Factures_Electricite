<?php
require_once('config.php');  
    session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $login = $_POST["NomUtili"];
            $mdp_f = $_POST["Pswd"];
			$choix = $_POST["choix"];

            if($login && $mdp_f && $choix)
            {
				if($choix=='fournisseur')
				{
					$requette = $con->prepare("SELECT * FROM fournisseur WHERE NomUtili = '$login'");
					$requette->execute(['NomUtili'=> $login]);
					$resultat = $requette->fetch();

					if($resultat)
					{
						if($mdp_f == $resultat["Pswd"])
						{
							$_SESSION["NomUtili"] = $resultat["NomUtili"];
							header('location:Fournisseur-GererClients.php');
						}
						else
						{
							echo '<script> alert("Le login ou le mot de passe n\'est pas correct! ")</script>';

						}
					}
				}
				elseif($choix=='agent')
				{
					$requette = $con->prepare("SELECT * FROM agent WHERE NomUtili = '$login'");
					$requette->execute(['NomUtili'=> $login]);
					$resultat = $requette->fetch();

					if($resultat)
					{
						if($mdp_f == $resultat["Pswd"])
						{
							$_SESSION["NomUtili"] = $resultat["NomUtili"];
							$_SESSION["IdZone"] = $resultat["IdZone"];
							header('location:Agent.php');
						}
						else
						{
							echo '<script> alert("Le login ou le mot de passe n\'est pas correct! ")</script>';

						}
					}
				}elseif($choix=='client')
				{
					$requette = $con->prepare("SELECT * FROM client WHERE NumContrat = '$login'");
					$requette->execute(['NumContrat'=> $login]);
					$resultat = $requette->fetch();

					if($resultat)
					{
						if($mdp_f == $resultat["Pswd"])
						{
							$_SESSION["NumContrat"] = $resultat["NumContrat"];
							$_SESSION["Nom"] = $resultat["Nom"];
							$_SESSION["Prenom"] = $resultat["Prenom"];
							$_SESSION["Mail"] = $resultat["Mail"];
							$_SESSION["Tel"] = $resultat["Tel"];
							$_SESSION["DateDebutCtr"] = $resultat["DateDebutCtr"];
							$_SESSION["IdZone"] = $resultat["IdZone"];
							header('location:Client-accueil.php');
						}
						else
						{
							echo '<script> alert("Le login ou le mot de passe n\'est pas correct! ")</script>';

						}
					}
				}

            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="login_style.css">
</head>
<body>
	<div class="body">
	</div>
		<div class="grad"></div>
		<div class="header">
			<div><span>F</span>actur<span>E</span>nsa<span>.</span></div>
		</div>
		<br>
		<div class="login">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<input type="text" placeholder="Identifiant" name="NomUtili" required><br>
				<input type="password" placeholder="mot de passe" name="Pswd" required><br><br>
				<div class="choices">						
				<input type="radio" name="choix" value="client" id="client" >
				<label for="client">Client</label>
				<input type="radio" name="choix" value="fournisseur" id="fournisseur" >
				<label for="fournisseur">Fournisseur</label>
				<input type="radio" name="choix" value="agent" id="agent" >
				<label for="agent">Agent</label>
		</div><br>
		<input type="submit" value="Login">
		</form>
					
		</div>
</body>
</html>