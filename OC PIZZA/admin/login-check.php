<?php
    //Authorisation - Droit d'Accès
    //Verifier si l'utilisateur est connecté ou pas
    if(!isset($_SESSION['user'])) //Si la session utilisateur n'est pas fixé
    {
        //Utilisateur n'est pas connecté
        //Rediriger vers la page se connecter avec message
        $_SESSION['no-login-message'] = "<div class='error text-center'>Connectez vous pour accéder au panneau d'administration.</div>";
        //Rediriger vers la page se connecter
        header('location:'.SITEURL.'admin/login.php');
   
    }


?>

