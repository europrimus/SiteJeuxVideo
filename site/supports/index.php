<?php

require('../include/config.php');
// renvoi un objet PDO $db

$page = new Page("Liste des supports");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


$manager = new supportManager($db);
$supports = $manager->getList();
?>

<main>
	<?php
	if(!empty($supports)){
	  foreach ($supports as $support) {
	?>
	    <ul>
	    	<li>
	    		<a href="voir.php?nom=<?php echo htmlspecialchars($support->nom()); ?>"><?php echo htmlspecialchars($support->nom()); ?></a><br>
	    		<a href="modifier.php?nom=<?php echo htmlspecialchars($support->nom()); ?>&id=<?php echo($support->id()); ?>"> Modifier </a>
	    		<a href="supprimer.php?id=<?php echo $support->id(); ?>"> Supprimer</a>
	    		<a href="voir.php?nom=<?php echo htmlspecialchars($support->nom()); ?>"> Accéder à sa fiche </a>
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
