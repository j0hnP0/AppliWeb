<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Mettre à jour l'aministrateur</h1>

        <br><br>

        <?php
            //1. Obtenir l'ID de l'administrateur sélectionné
            $id=$_GET['id'];

            //2. créer une requête SQL pour obtenir les détails
            $sql="SELECT * FROM tbl_admin WHERE id=$id";

            //Exécuter la requête
            $res=mysqli_query($conn, $sql);

            //Vérifiez si la requête est exécutée ou non
            if($res==true)
            {
                //check whether the data is available or not
                $count=mysqli_num_rows($res);
                //vérifier si nous avons des données d'administration ou non
                if($count==1)
                {
                    //obtenir les détails
                    //echo "Admin disponible";
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else
                {
                    //Redirect to mange admin page
                    header("location:".SITEURL.'admin/manage-admin.php');
                }
            }

        ?>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Nom et Prénom:</td>
                <td>
                    <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                </td>
            </tr>

            <tr>
                <td>Identifiant: </td>
                <td>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name='id' value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                </td>
            </tr>
        </table>

        </div>
</div>

<?php

// Vérifier si le bouton d'envoi est cliqué ou non
     if(isset($_POST['submit']))
     {
         //echo "Bouton cliqué";
         //Obtenez toutes les valeurs du formulaire à la mise à jour
         $id = $_POST['id']; //echo pour vérifier
         $full_name = $_POST['full_name']; //echo pour vérifier
         $username = $_POST['username']; //echo pour vérifier

         //Créer une requête SQL pour mettre à jour l'administrateur
         $sql = "UPDATE tbl_admin SET
         full_name = '$full_name',
         username = '$username'
         WHERE id='$id'
         ";

        //Exécuter la requête
        $res = mysqli_query($conn, $sql);

        //Vérifiez si la requête s'est exécutée avec succès ou non
        if($res==true)
        {
            //Requête exécutée et administration mise à jour
            $_SESSION['update'] = "<div class='success'>L'administrateur a bien été mis à jour.</div>";
            //REdiriger pour gérer la page d'administration
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else{

            //Échec de la mise à jour de l'administrateur
            $_SESSION['update'] = "<div class='error'>Failed to Delete Admin.</div>";
            //REdiriger pour gérer la page d'administration
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
     }

?>

<?php include('partials/footer.php'); ?>
