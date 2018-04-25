<?php
require ("../include/config.php");

$page = new Page("Création d'une Plateforme");
include(SITE["installDir"]."include/header.php");
?>
<main >
	<h2></h2>
	<p>Entrer les informations de la nouvel plateforme</p>
	
	<form action="traitement.php" method="POST">
		<label>Nom :</label>
		<input type="text" name="nom" id="nom" required><br>
		<input type="date" name="sorti">
		<input type="submit" name="envoyer" value="envoyer" id="envoyer">
	</form>
	<ul>
	</ul>
</main>
<?php include(SITE["installDir"]."include/footer.php"); ?>
