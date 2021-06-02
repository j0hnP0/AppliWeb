<?php include('partials/menu.php'); ?>

    <!--Contenu genéral commence ici-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Menu</h1>

            <br/><br/>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; 
                    unset($_SESSION['add']); 
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                

            ?>

            <br/><br/><br/>


                <!-- Bouton pour ajouter menu-->
                <a href="add-menu.php" class="btn-primary">Ajouter Menu</a>

                <br/><br/><br/>

            <table class="tbl-full">
                <tr>
                    <th>No</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>

                <?php
                    //Creer requete sql pour obtenir tous les menus
                    $sql = "SELECT * FROM tbl_menu";

                    //Executer la requete
                    $res = mysqli_query($conn, $sql);

                    //compter les lignes pour verifier si on a les menus ou pas
                    $count = mysqli_num_rows($res);

                    //creer une variable et mettre la valeur par defaut par 1
                    $sn=1;

                    if($count>0)
                    {
                        //on a les menus dans la bdd
                        //recuperer les menus de la bdd et les afficher
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //obtenir les valeurs des colonnes individuel
                            $id = $row['id'];
                            $titre = $row['titre'];
                            $description = $row['description'];
                            $image = $row['image'];
                            $prix = $row['prix'];
                            ?>

                            <tr>
                                <td><?php echo $sn++; ?>. </td>
                                <td><?php echo $titre; ?></td>
                                <td><?php echo $description; ?></td>
                                <td>
                                    <?php echo $image; ?></td>
                                </td>
                                <td><?php echo $prix; ?> €</td>
                                <td>
                                    <a href="#" class="btn-secondary">Modifier</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-menu.php?id=<?php echo $id; ?>" class="btn-secondary">Effacer</a>
                                </td>
                            </tr>
                            <?php

                        }
                    }
                    else
                    {
                        //les menus ne sont pas ajoutés dans la bdd
                        echo "<tr> <td colspan='6' class='error'>Aucun menu disponible</td> </tr>";
                    }

                
                
                ?>

</table>

                </div>
    </div>
    <!--Main Content Sections Ends-->

<?php include('partials/footer.php'); ?>

                