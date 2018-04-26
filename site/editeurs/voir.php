<?php
require ("../include/config.php");

$page = new Page("Informations sur un éditeur");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");

$nom = $_GET['nom'];
$manager = new editeursManager($db);

$editeur = $manager->get($nom);
?>
<main>
	<?php if(!empty($nom)){ ?>
		<h3>Informations</h3>
		<ul>
			<li>Nom : <?php echo $editeur->nom(); ?></li>
		</ul>
	<?php } ?>
</main>

<?php
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
