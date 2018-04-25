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

<main class="container">
	
	<?php
	if(!empty($supports)){
	  foreach ($supports as $support) {
	?>
	
	    <ul >
			
				<li  >
				
	    		<a  href="voir.php?nom=<?php echo htmlspecialchars($support->nom()); ?>"><?php echo htmlspecialchars($support->nom()); ?><br>
	    		<a  href="modifier.php?nom=<?php echo htmlspecialchars($support->nom()); ?>&id=<?php echo($support->id()); ?>">  <input type="button" value="Modifier" /></a>
	    		<a  href="supprimer.php?id=<?php echo $support->id(); ?>"> <input type="button" value="suprimer" /></a>
	    		<a  href="voir.php?nom=<?php echo htmlspecialchars($support->nom()); ?>"><input type="button" value="Accéder à sa fiche" /></a>
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
