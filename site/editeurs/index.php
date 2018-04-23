<?php

require('../include/config.php');
// renvoi un objet PDO $db

$page = new Page("Liste des éditeurs");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


$manager = new EditeursManager($db);
$editeurs = $manager->getList();
?>

<main class="container-fluid">
	<?php
	if(!empty($editeurs)){
	  foreach ($editeurs as $editeur) {
	?>
	    <ul>
	    	<li>
	    		<?php echo htmlspecialchars($editeur->nom()); ?><br>
	    		<a href="voir.php?nom=<?php echo htmlspecialchars($editeur->nom()); ?>" style="text-decoration: none"><input type="button" value="Accéder à sa fiche" /></a>
	    		<a href="modifier.php?nom=<?php echo htmlspecialchars($editeur->nom()); ?>&id=<?php echo($editeur->id()); ?>" style="text-decoration: none"><input type="button" value="Modifier" /></a>
	    		<a href="supprimer.php?id=<?php echo $editeur->id(); ?>" style="text-decoration: none"><input type="button" value="Supprimer" /></a>
	    		
	    	</li>
	    </ul>
	  <?php
	  }
	}
	?>
<a href="creer.php">Créer un éditeur</a>
</main>

<?php
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
