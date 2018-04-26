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

<main class="container-fluid">
	
	<?php
	if(!empty($supports)){
	  foreach ($supports as $support) {
	?>
	
	    <ul >
			
				<li  >
				
	    		<a  href="voir.php?nom=<?php echo htmlspecialchars($support->nom()); ?>"><?php echo htmlspecialchars($support->nom()); ?><br>
	    		<a  href="modifier.php?nom=<?php echo htmlspecialchars($support->nom()); ?>&id=<?php echo($support->id()); ?>"><?php if (!empty($_SESSION)): ?>  <input type="button" value="Modifier" /></a><?php endif; ?>
	    		<a  href="supprimer.php?id=<?php echo $support->id(); ?>"><?php if (!empty($_SESSION)): ?> <input type="button" value="suprimer" /><?php endif; ?></a>
	    		<a  href="voir.php?nom=<?php echo htmlspecialchars($support->nom()); ?>"><?php if (!empty($_SESSION)): ?><input type="button" value="Accéder à sa fiche" /><?php endif; ?></a>
				</li>
	    	
	    </ul>
	  <?php
	  }
	}
	?>
	
</main>
<?php if (!empty($_SESSION)): ?><a href="creer.php">Créer une plateforme</a><?php endif; ?>
<?php
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
