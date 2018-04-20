<?php
require ("../include/config.php");
$page = new Page("Liste des DLC");
include(SITE["installDir"]."include/header.php");
?>
<main>
	<ul>
		<li><a href="voir.php">DLC - Nom du jeu(support) 1</a></li>
		<li><a href="#">DLC - Nom du jeu(support) 2</a></li>
		<li><a href="#">DLC - Nom du jeu(support) 3</a></li>
	</ul>
</main>

<?php
include(SITE["installDir"]."include/footer.php");
?>
</body>
</html>
