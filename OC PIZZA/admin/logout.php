<?php
    //Include constants.php for SITEURL
    include('../config/constants.php');
    //1. terminer la session
    session_destroy(); //Unsets $_SESSION['user']

    //2. rediriger vers la page se connecter
    header('location:'.SITEURL.'admin/login.php');
?>