<!DOCTYPE html>
<html id="htmlcontact">
    <head>
        <meta charset="utf-8" />
        <title>Mon site</title>
        <link rel="stylesheet" href="styles.css"/>
    </head>
 
    <body>
 
	<!-- L'en-tête -->
    
    <?php include("header.php")
    ?>
<h1>Page de Contact</h1>

    <!-- Le menu -->
    
    <nav>        
        <div>
        <form action="Réponse.php" method="post">
		<label for="Prénom">Prénom</label>
		<input type="text" name="Prénom"><br/><br/>
        <label for="Nom">Nom</label>
		<input type="text" name="Nom"><br/><br/>
		<label for="Mail">Mail</label>
		<input type="text" name="Mail"><br/><br/>
		<label for="Votre message">Votre message</label><br/>
  		<textarea name="message" rows="8" cols="35"></textarea></br>
		<input type="submit" value="Valider">
    </form>
        </div>    
    </nav>
    
    <!-- Le corps -->
    
    <div> 
        <p>
          
        </p>
    </div>
    
    <!-- Le pied de page -->
    
	<?php include("footer.php");
	?>
  
    
    </body>
</html>





			   