<?php

require_once('../include/config.php');
// renvoi un objet PDO $db

$page = new Page("Liste des éditeurs");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");


$manager = new editeursManager($db);
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
	    		<a href="voir.php?nom=<?php echo htmlspecialchars($editeur->nom()); ?>" style="text-decoration: none"><?php if (!empty($_SESSION)): ?><input type="button" value="Accéder à sa fiche" /><?php endif; ?></a>
	    		<a href="modifier.php?nom=<?php echo htmlspecialchars($editeur->nom()); ?>&id=<?php echo($editeur->id()); ?>" style="text-decoration: none"><?php if (!empty($_SESSION)): ?><input type="button" value="Modifier" /><?php endif; ?></a>
	    		<a href="supprimer.php?id=<?php echo $editeur->id(); ?>" style="text-decoration: none"><?php if (!empty($_SESSION)): ?><input type="button" value="Supprimer" /><?php endif; ?></a>
	    		
	    	</li>
	    </ul>
	  <?php
	  }
	}
	?>
<?php if (!empty($_SESSION)): ?><a href="creer.php">Créer un éditeur</a><?php endif; ?>
</main>

<?php
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
