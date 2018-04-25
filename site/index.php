<?php
// charge la configuration et renvoi un objet PDO $db
$ok = include ("include/config.php");
if (!$ok) {
	header('Location: install.php');
	echo 'redirection vers la <a href="install.php" >page d\'installation</a>';
	die;
	}

$page = new Page("Acceuil");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");
?>
<main class="container-fluid">


	<?php if (!empty($_SESSION)): ?>
		<h2>Création </h2>
		<ul>
			<li><a href="jeux/creer.php">Jeu</a></li>
			<li><a href="supports/creer.php">Plateforme</a></li>
			<li><a href="dlc/creer.php">DLC</a></li>
			<li><a href="editeurs/creer.php">Editeur</a></li>
		</ul>

		<!--<h2>Liste des élément (Modification, suppression et fiche individuelle)</h2>
		<ul>
			<li><a href="jeux/modifier.php">Jeu</a></li>
			<li><a href="supports/modifier.php">plateforme</a></li>
			<li><a href="dlc/modifier.php">DLC</a></li>
			<li><a href="editeurs/modifier.php">Editeur</a></li>
		</ul>-->
	<?php endif; ?>

		<h2>Liste des élément</h2>
		<ul>
			<li><a href="jeux/index.php">Jeux</a></li>
			<li><a href="supports/index.php">Plateforme</a></li>
			<li><a href="dlc/index.php">DLC</a></li>
			<li><a href="editeurs/index.php">Editeurs</a></li>
		</ul>

</main>

<?php
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
