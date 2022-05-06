<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Client</title>
</head>
<body>
    <div id="main2">
        <h1><font color='red'>Opps! Something went wrong</font></h1>
        <?php
        require_once 'config.php';

        if($_POST)
        {
       

            try{
                $stmt = $con->prepare("INSERT INTO 
                client(NumContrat, Pswd, Nom, Prenom, Mail, Tel, DateDebutCtr, IdZone) 
                VALUES('$_POST[numCtr]', '$_POST[pswd]', '$_POST[nom]', '$_POST[prenom]', '$_POST[mail]','$_POST[tel]','$_POST[ddcontrat]', '$_POST[idZone]')");
            

                if($stmt->execute())
                    {
                        echo "Successfully Added";
                    }
                    else{
                        echo "Query Problem";
                    }
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                }
            }
                header("Location: Fournisseur-GererClients.php");
        ?>
        
        <p>
            <a href="Fournisseur-GererClients.php" ><button class="button" >Back</button</a>
        </p>
    </div>
</body>
</html>