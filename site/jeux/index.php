<?php
require ("../include/config.php");
$page = new Page("Liste de jeux");

include(SITE["installDir"]."include/header.php");
?>
<main>
	<ul>
		<li><a href="voir.php">Nom du jeu(support) 1</a></li>
		<li><a href="#">Nom du jeu(support) 2</a></li>
		<li><a href="#">Nom du jeu(support) 3</a></li>
	</ul>
</main>

<?php
include(SITE["installDir"]."include/footer.php");
?>
