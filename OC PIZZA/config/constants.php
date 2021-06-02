<?php 
    //Démarrer la session
    session_start();

//Créer une constante pour stocker des valeurs non répétitives
define('SITEURL', 'http://localhost:8888/OC PIZZA/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'jonathan');
define('DB_PASSWORD', 'admin');
define('DB_NAME', 'OC PIZZA');

//3. Exécuter la requête et enregistrer les données dans la base de données

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Connexion à la base de données / ERREUR D'AFFICHAGE DE CETTE LIGNE
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Sélection de la base de données
 

?>

