<?php
require ("../include/config.php");

$page = new Page("Création d'un Support");
include(SITE["installDir"]."include/header.php");
?>
<main>
	<h2><?php echo $page->getPage(); ?></h2>
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
