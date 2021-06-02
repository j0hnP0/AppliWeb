<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Ajouter Menu</h1>

        <br><br>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-date">
        
        <table class="tbl-30">
        
            <tr>
                <td>Titre: </td>
                <td>
                    <input type="text" name="titre" placeholder="Titre du Menu">
                </td>    
            </tr>

            <tr>

                <td>Description: </td>
                <td>
                    <textarea name="description" cols="30" rows="5" placeholder="Description du Menu"></textarea>
                </td>

            </tr>

            <tr>
                <td>Prix: </td>
                <td>
                    <input type="number" name="prix">
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                </td>
            </tr>

            <tr>
             
            
            </tr>
        
            <tr>
                <td></td>
                <td>
                    
  
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Ajouter Menu" class="btn-secondary">
                </td>
            </tr>
        
        
        </table>
        
        
        
        </form>
        <?php
        
        //verifier si le bouton est clické ou pas
        if(isset($_POST['submit']))
        {
            //ajouter menu dans la bdd
            //echo "Clické";

            //1. recuperer les info depuis le formulaire
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];

          
            
           
            //3. inserer dans la bdd

            //Creer une requete SQL pour sauvegarder le menu
            // Pour valeur numeric on a pas besoin de mettre des guillements '' mais pour chaine de valeur c'est obligatoire d'ajouter les guilemets ''
            $sql = "INSERT INTO tbl_menu SET
                titre='$titre',
                description='$description',
                prix=$prix
            ";

            //Executer la requete
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            //verifier si les données sont insérer ou pas
            //4. rediriger avec message pour la page de menu
            if($res==TRUE)
            {
                //données insérées avec success
                $_SESSION['add'] = "<div class='sucess'>Ajouté avec succès.</div>";
                header('location:'.SITEURL.'admin/manage-menu.php');
            }
            else
            {
                //insertion de données echoué
                $_SESSION['add'] = "<div class='error'>Echec..</div>";
                header('location:'.SITEURL.'admin/manage-menu.php');
            }
        }
    
    ?>




</div>

<?php include('partials/footer.php'); ?>

