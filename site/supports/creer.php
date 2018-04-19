<?php
require ("../include/config.php");
require ("../include/class.php");
$page = new Page("Création d'un Support");
include("../include/header.php");
?>
<main>
	<h2><?php echo $page->getPage(); ?></h2>
	<form action="" method="POST">
		<label>Nom :</label>
		<input type="text" name="nom" id="nom" required><br>
		<input type="submit" name="envoyer" value="envoyer" id="envoyer">
	</form>
	<ul>
	</ul>
	<a href="../index.php">Revenir sur la page d'accueil</a>
</main>
<?php include("../include/footer.php"); ?>
