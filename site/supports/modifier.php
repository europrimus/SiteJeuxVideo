<?php
// charge la configuration et renvoi un objet PDO $db
require ("../include/config.php");

$page = new Page("Modification d'un support");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php"); 

$nom = $_GET['nom'];
$id = $_GET['id'];
?>
	<?php if (!empty($_SESSION)): ?>
<main>
	<h2><?php echo $page->getPage(); ?></h2>
	<form action="modif_support.php" method="POST">
		<label>Nom :</label>
		<input type="text" name="id" id="id" value="<?php echo $id; ?>" hidden>
		<input type="text" name="nom" id="nom" required value="<?php echo $nom; ?>"><br>
		<input type="date" name="sorti">
		<input type="submit" name="envoyer" value="envoyer" id="envoyer">
	</form>
</main>
<?php endif; ?>
<?php
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
