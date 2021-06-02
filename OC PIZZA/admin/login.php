<?php include('../config/constants.php') ?>

<html>
    <head>
        <title>Connexion - OC Pizza</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>

        <div class="login">
            <h1 class="text-center">Connexion</h1>
            <br><br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!-- La forme se connecter commence ici -->
            <form action="" method="POST" class="text-center">
            Identifiant: <br>
            <input type="text" name="username" placeholder="Entrer l'identifiant"><br><br>

            Mot de passe: <br>
            <input type="password" name="password" placeholder="Entrer le mot de passe"><br><br>

            <input type="submit" name="submit" value ="Me Connecter" class="btn-primary">
            <br><br>
            </form>
            <!-- La forme de connexion s'arrette ici -->


            <p class="text-center">Crée Par - <a href="www.jonathanpottier.com">Jonathan Pottier</a></p>
        </div>

    </body>
</html>

<?php

//Verifier si le bouton est clické ou pas
if(isset($_POST['submit']))
{
    //Proceder a la connexion
    //1. Recuperer les donnees depuis la forme se connecter
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    //2. SQL pour verifier si l'identifiant et le mdp existe ou pas
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    //3. executer la requete
    $res = mysqli_query($conn, $sql);

    //4. compter les lignes pour verifier si un utilisateur existe ou pas
    $count = mysqli_num_rows($res);

    if($count==1)//1 utilisateur
    {
        //l'utilisateur Existe et connexion reussi
        $_SESSION['login'] = "<div class='success'>Connexion Réussie.</div>";
        $_SESSION['user'] = $username; //Pour verifier si l'utillisateur est connecté ou pas et la déconnexion sera désactivé

        //retourne a la page d'accueil/tableau de bord
        header('location:'.SITEURL.'admin/');
    }
    else
    {
        //l'utilisateur n'existe pas et connexion echoué
        $_SESSION['login'] = "<div class='error text-center'>identifiant ou mot de passe ne correspond pas.</div>";
        //retourne a la page d'accueil/tableau de bord
        header('location:'.SITEURL.'admin/login.php');

    }

}

?>

