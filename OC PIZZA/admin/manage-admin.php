<?php include('partials/menu.php'); ?>

    <!--Début des sections du contenu principal-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Utilisateur</h1>

            <br/><br/>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //affichage du message de session
                    unset($_SESSION['add']); //suppression du message de session
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];  //affichage du message de session
                    unset($_SESSION['delete']);  //suppression du message de session
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }

                if(isset($_SESSION['pwd-not-match']))
                {
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                }

                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                }

            ?>

            <br/><br/><br/>


                <!-- Bouton pour ajouter un administrateur(U?tilisateur-->
                <a href="add-admin.php" class="btn-primary">Ajouter Utilisateur</a>

                <br/><br/><br/>

            <table class="tbl-full">
                <tr>
                    <th>No</th>
                    <th>Nom et Prénom</th>
                    <th>Identifiant</th>
                    <th>Actions</th>
                </tr>


                <?php
                    //requête pour obtenir tous les administrateurs
                    $sql = "SELECT * FROM tbl_admin";
                    //exécuter la requête
                    $res = mysqli_query($conn, $sql);   //CETTE LIGNE AFFICHE UNE ERREUR
                    
                    //vérifie si la requête est exécutée ou non
                    if($res==TRUE)
                    {
                        // Comptez les lignes pour vérifier si vous avez ta dans la base de données ou non
                         $count = mysqli_num_rows($res); //fonction pour obtenir toutes les lignes de la base de données

                         $sn=1; //créer une variable et attribuer la valeur

                         //vérifier le nombre de lignes
                         if($count>0) 
                        {
                            //nous avons des données dans la base de données
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //en utilisant la boucle while pour obtenir toutes les données de la base de données.
                                //et la boucle while fonctionnera tant que nous aurons des données dans la base de données

                                //obtenir des données individuelles
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                //Afficher les valeurs dans notre tableau
                ?>

                    <tr>
                        <td><?php echo $sn++; ?> </td>
                        <td><?php echo $full_name; ?> </td>
                        <td><?php echo $username; ?></td>
                        <td>
                         <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-secondary">Changer Mot de passe</a>
                         <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Modifier</a>
                         <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Effacer</a>
                        </td>
                     </tr>
        
                <?php
                
                            }
                        }
                        else
                        {
                            //nous n'avons pas de données dans la base de données
                        }
                    }
                ?>


        </table>

        </div>
    </div>
    <!--Fin des sections du contenu principal-->

<?php include('partials/footer.php'); ?>
