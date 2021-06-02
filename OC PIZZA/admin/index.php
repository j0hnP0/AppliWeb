<?php include('partials/menu.php'); ?>

    <!--Début des sections du contenu principal-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Tableau de bord</h1>
            <br><br>
            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <br><br> 
            <div class="col-4 text-center">
                <h1><!--ajouter titre--></h1>
                <br/>
                <!--ajouter titre-->
            </div>

            <div class="col-4 text-center">
                <h1><!--ajouter titre--></h1>
                <br/>
                <!--ajouter titre-->
            </div>

            <div class="col-4 text-center">
                <h1><!--ajouter titre--></h1>
                <br/>
                <!--ajouter titre-->
            </div>

            <div class="col-4 text-center">
                <h1><!--ajouter titre--></h1>
                <br/>
                <!--ajouter titre-->
            </div>

            <div class="clearfix"></div>

        </div>
    </div>
    <!--Fin des sections du contenu principal-->

   <?php include ('partials/footer.php'); ?>


