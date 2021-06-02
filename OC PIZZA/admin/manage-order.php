<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">   
    <h1>Commande</h1>
    
    <br/><br/><br/>

            <table class="tbl-full">
                <tr>
                    <th>No</th>
                    <th>Menu</th>
                    <th>Prix</th>
                    <th>Qtée</th>
                    <th>Total</th>
                    <th>Date/Heure de commande</th>
                    <th>Statut</th>
                    <th>Nom du client</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Adresse</th>
                </tr>

                <?php
                    //Recuperer tous les donnes de la bdd
                    $sql = "SELECT * FROM tbl_order";
                    //Executer la requete
                    $res = mysqli_query($conn, $sql);
                    //compter les lignes
                    $count = mysqli_num_rows($res);
                    
                    //creer une variable et mettre la valeur par defaut par 1
                    $sn=1;

                    if($count>0)
                    {
                        //Commande disponible
                        while($row=mysqli_fetch_assoc($res))
                        {
                        //Recuperer tous les details de la commande
                        $id = $row['id'];
                        $menu = $row['menu'];
                        $prix = $row['prix'];
                        $qtée = $row['qtée'];
                        $total = $row['total'];
                        $dateheure_commande = $row['date/heure_commande'];
                        $statut = $row['statut'];
                        $nom_client = $row['nom_client'];
                        $contact_client = $row['contact_client'];
                        $email_client = $row['email_client'];
                        $adresse_client = $row['adresse_client'];
                        
                        ?>


                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $menu; ?></td>
                            <td><?php echo $prix; ?>€</td> 
                            <td><?php echo $qtée; ?></td>
                            <td><?php echo $total; ?>€</td>
                            <td><?php echo $dateheure_commande; ?></td>
                            <td><?php echo $statut; ?></td>
                            <td><?php echo $nom_client; ?></td>
                            <td><?php echo $email_client; ?></td>
                            <td><?php echo $customer_email; ?></td>
                            <td><?php echo $adresse_client; ?></td>
                            <td>
                            </td>
                       </tr>
                  
                  

                        <?php




                       }
                    }
                    else
                    {
                        //Commande pas disponible
                        echo "<tr><td colspan='12' class='error' >Commandes non disponible</td></tr>"; 
                    }

                    ?>
                      


                 
 
                
        </table>

    </div>
</div>

<?php include('partials/footer.php'); ?>
