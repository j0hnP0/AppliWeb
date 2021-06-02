<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">       
        <h1>Ajouter Administrateur</h1>

        <br/><br/>

        <?php
                if(isset($_SESSION['add'])) //vérifier si la session est définie ou non
                {
                    echo $_SESSION['add']; //affichage du message de session si défini
                    unset($_SESSION['add']); //affichage du message de session

                }
            ?>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Nom et Prénom</td>
                <td>
                    <input type="text" name="full_name" placeholder="Entrez votre Nom et Prénom">
                </td>
            </tr>

            <tr>
                <td>Identifiant</td>
                <td> <input type="text" name="username" placeholder="Votre Identifiant"></td>
            </tr>

            <tr>
                <td>Mot de passe</td>
                <td> <input type="password" name="password" placeholder="Votre mot de passe"></td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Ajouter Administrateur" class="btn-secondary"></td>
            </tr>

        </table>

    </form>

    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
    //Traitez la valeur du formulaire et enregistrez-la dans la base de données

    //Vérifiez si le bouton est cliqué ou non


    if(isset($_POST['submit']))
    {
        //1. Récupérez les données du formulaire
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']) ; //Chiffrement de mot de passe avec MD5
    
        //2. Requête SQL pour enregistrer les données dans la base de données
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        // echo $sql; // Pour tester si ça fonctionne uniquement
    
        //$conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error()); //Connexion à la base de données - pour test uniquement
        //$db_select = mysqli_select_db($conn, 'OC PIZZA') or die(mysqli_error()); //Sélection de la base de données - pour test uniquement
        
        //3. Exécuter la requête et enregistrer les données dans la base de données

        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        //4. Vérifiez si les données (la requête est exécutée) sont insérées ou non et affichez le message approprié
        if($res==TRUE)
        {
        //données insérées
        //echo "données insérées";
        //créer une variable pour afficher le message
        $_SESSION['add'] =  "L'administrateur a bien été ajouté";
        //Rediriger la page pour gérer l'administrateur
        header("location:".SITEURL.'admin/manage-admin.php');

        }
        else
        {
        //échec de l'insertion des données
        //echo "échec de l'insertion des données";
        //créer une variable pour afficher le message
        $_SESSION['add'] =  "Échec de l'ajout de l'administrateur ";
        //Rediriger la page pour ajouter un administrateur
        header("location:".SITEURL.'admin/manage-admin.php');
        }

        
    }
    


    

?>

