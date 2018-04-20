<?php
require ("../include/config.php");

$page = new Page("Informations sur un éditeur");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");

$nom = $_GET['nom'];
?>
<main>
	<?php if(!empty($nom)){ ?>
		<h3>Informations</h3>
		<ul>
			<li>Nom : <?php echo $nom; ?></li>
		</ul>
	<?php } ?>
</main>

<?php
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
