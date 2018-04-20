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

<main>
	<?php
	if(!empty($editeurs)){
	  foreach ($editeurs as $editeur) {
	?>
	    <ul>
	    	<li>
	    		<a href="voir.php?nom=<?php echo htmlspecialchars($editeur->nom()); ?>"><?php echo htmlspecialchars($editeur->nom()); ?></a><br>
	    		<a href="modifier.php?nom=<?php echo htmlspecialchars($editeur->nom()); ?>&id=<?php echo($editeur->id()); ?>"> Modifier </a>
	    		<a href="supprimer.php?id=<?php echo $editeur->id(); ?>"> Supprimer</a>
	    		<a href="voir.php?nom=<?php echo htmlspecialchars($editeur->nom()); ?>"> Accéder à sa fiche </a>
	    	</li>
	    </ul>
	  <?php
	  }
	}
	?>

</main>

<?php
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
