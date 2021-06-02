<?php
    //Inclure la page constants
    include('../config/constants.php');
    //echo "Page effacer menu";


        //Effacer
        //echo "Effacer";

        //1. Recuperer le id qui a effacer
        $id = $_GET['id'];

        //2. enlever l'image
        //Verifier si l'image est disponible ou pas et effacer seulement si disponible

        //3. effacer le menu dans la bdd
        $sql = "DELETE FROM tbl_menu WHERE id=$id";
        //Executer la requete
        $res = mysqli_query($conn, $sql);

        //verifier si la requete a marché ou pas et ajouter la message session respectivement
                //4. rediriger vers la page Menu avec message session
        if($res==true)
        {
            //effacer
            $_SESSION['delete'] = "<div class='success'>Menu effacé.</div>";
            header('location:'.SITEURL.'admin/manage-menu.php');
        }
        else
        {
            //Echec
            $_SESSION['delete'] = "<div class='error'>Echec.</div>";
            header('location:'.SITEURL.'admin/manage-menu.php');
        }
        //else
        //{
            //Rediriger vers la page de Menu
            //echo "Rediriger";
           // $_SESSION['delete'] = "<div class='error'>pas autorisé</div>";
           // header('location:'.SITEURL.'admin/manage-menu.php');
       // }

?>