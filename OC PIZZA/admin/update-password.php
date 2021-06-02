<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
         <h1>Changer mot de passe</h1>
         <br><br>

        <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        
        ?>
         
         <form action="" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Mot de passe:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>
                    <td>Nouveau mot de passe:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirmer nouveau mot de passe:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                        
                        
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
                
            </table>

         
         </form>

    </div>
</div>
<?php

            //VÉRIFIEZ SI LE BOUTON DE SOUMISSION EST CLIQUÉ OU NON
            if(isset($_POST['submit']))
            {
                //echo "Clicqué";  // echo pour tester bouton

                //1.Get the data from form
                $id=$_POST['id'];
                $current_password = md5($_POST['current_password']);
                $new_password = md5($_POST['new_password']);
                $confirm_password = md5($_POST['confirm_password']);

                //2. Vérifiez si l'utilisateur avec l'ID actuel et le mot de passe actuel existe ou non
                $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

                //Exécuter la requête
                $res = mysqli_query($conn, $sql);

                if($res==true)
                {
                    //vérifier si les données sont disponibles ou non
                    $count=mysqli_num_rows($res);

                    if($count==1)
                    {
                        //L'utilisateur existe et le mot de passe peut être modifié
                        echo "User Found";

                        //vérifier si le nouveau mot de passe et confirmer le mot de passe correspondent ou non
                        if($new_password==$confirm_password)
                        {
                            //Mettre à jour le mot de passe
                            //echo "Mot de passe correcte";
                            $sql2= "UPDATE tbl_admin SET
                                password='$new_password'
                                WHERE id=$id
                                ";

                                //Exécuter la requête
                                $res2 = mysqli_query($conn, $sql2);

                                //Vérifiez si la requête a été exécutée ou non
                                if($res2==true)
                                {
                                    //Afficher le message de réussite
                                    //Rediriger pour gérer la page d'administration avec un message de réussite
                                    $_SESSION['change-pwd'] = "<div class='success'>Redirect to manage Admin Page with Success Message. </div>";
                                    //Rediriger l'utilisateur
                                    header('location:'.SITEURL.'admin/manage-admin.php');
                                }
                                else
                                {
                                    //Afficher le message d'erreur
                                    $_SESSION['change-pwd'] = "<div class='error'>Échec de la modification du mot de passe. </div>";
                                    //Rediriger l'utilisateur
                                    header('location:'.SITEURL.'admin/manage-admin.php');
                                }
                        }
                        else
                        {
                            //Redirect to manage Admin Page with Error Message
                            $_SESSION['pwd-not-match'] = "<div class='error'>Password did not match. </div>";
                            // Redirection pour gérer la page d'administration avec un message d'erreur
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }                             
                    }
                    else
                    {
                        //l'utilisateur n'existe pas définir le message et rediriger
                        $_SESSION['user-not-found'] = "<div class='error'>Utilisateur non trouvé. </div>";
                        //Rediriger l'utilisateur
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }

                // 3. vérifier si le nouveau mot de passe et confirmer le mot de passe correspondent ou non
                //4. Changer le mot de passe si tout ce qui précède est vrai
            }
        


?>
<?php include('partials/footer.php'); ?>

