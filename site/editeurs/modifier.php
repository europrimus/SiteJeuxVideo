<?php
require ("../include/config_defaut.php");
require ("../include/class.php");
$page = new Page("Modification d'un éditeur");
include("../include/header.php"); 
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
	<a href="../index.php">Revenir sur la page d'accueil</a>
</main>
<?php include("../include/footer.php"); ?>