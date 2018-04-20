<?php
// charge la configuration et renvoi un objet PDO $db
require ("../include/config.php");

$page = new Page("Création d'un éditeur");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php"); ?>
<main>
	<h2><?php echo $page->getPage(); ?></h2>
	<form action="ajout_editeur.php" method="POST">
		<label>Nom :</label>
		<input type="text" name="nom" id="nom" required><br>
		<input type="submit" name="envoyer" value="envoyer" id="envoyer">
	</form>
</main>

<?php

// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
