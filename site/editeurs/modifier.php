<?php
require ("../include/config_defaut.php");
$page = new Page("Modification d'un éditeur");
include(SITE["installDir"]."include/header.php"); 

$nom = $_GET['nom'];
$id = $_GET['id'];
?>
<main>
	<h2><?php echo $page->getPage(); ?></h2>
	<form action="modif_editeur.php" method="POST">
		<label>Nom :</label>
		<input type="text" name="id" id="id" value="<?php echo $id; ?>" hidden>
		<input type="text" name="nom" id="nom" required value="<?php echo $nom; ?>"><br>
		<input type="submit" name="envoyer" value="envoyer" id="envoyer">
	</form>
</main>
<?php include(SITE["installDir"]."include/footer.php"); ?>
