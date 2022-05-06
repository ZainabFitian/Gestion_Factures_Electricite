<?php    
    // Informations d'identification 

    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "db_tp2";  

    // Connexion à la base de données MySQL 

try {  
    $con = new PDO("mysql:host={$host};dbname={$db_name}",$user,$password);

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    $conDB = mysqli_connect($host, $user, $password,$db_name)or
    die('Error: Could not connect to database.');

}
catch(PDOException $e){
  echo $e->getMessage();
} 
?>  