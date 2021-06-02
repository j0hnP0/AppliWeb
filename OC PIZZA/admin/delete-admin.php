<?php

//inclure constants.php file here
include('../config/constants.php');

//1. recuperer le id de l'utilisateur a effacer
$id = $_GET['id'];

//2. creer la requete SQL pour effacer l'utilisateur
$sql = "DELETE FROM tbl_admin WHERE id=$id";

//Executer la requete
$res = mysqli_query($conn, $sql);

//verifier si la requete a fonctionne ou pas
if($res==true)
{
    //la requete a fonctionné et l'utilisateur a ete effacé
    //echo "admin deleted";
    //Creer une session variable pour afficher un message
    $_SESSION['delete'] = "<div class='success'>L'administrateur a bien été supprimé.</div>"; 
    //Rediriger vers la page utilisateur
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
    //pas effacé
    //echo "failed to delete admin";
    $_SESSION['delete'] = "<div class='error'>Échec de la suppression de l'administrateur. Try Again Later.</div>";  
    header('location:'.SITEURL.'admin/manage-admin.php');
}   

// 3. Rediriger vers la page utilisateur avec un message reussi/erreur
?>