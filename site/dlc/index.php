<?php
// charge la configuration et renvoi un objet PDO $db
require ("../include/config.php");

$page = new Page("Liste des DLC");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");

$manager = new dlcManager($db);
$editeurs = $manager->getList();

?>
<main class="container-fluid">
	<ul>
		<li><a href="voir.php">DLC - Nom du jeu(support) 1</a></li>
		<li><a href="#">DLC - Nom du jeu(support) 2</a></li>
		<li><a href="#">DLC - Nom du jeu(support) 3</a></li>
	</ul>
	<a href="creer.php">Ajouter un DLC</a>
</main>

<?php
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
