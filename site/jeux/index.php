<?php
require ("../include/config.php");
require ("../include/class.php");
$page = new Page("Liste de jeux");
include("../include/header.php");
?>
<main>
	<ul>
		<li><a href="voir.php">Nom du jeu(support) 1</a></li>
		<li><a href="#">Nom du jeu(support) 2</a></li>
		<li><a href="#">Nom du jeu(support) 3</a></li>
	</ul>
	<a href="../index.php">Revenir sur la page d'accueil</a>
</main>

<?php
include("../include/footer.php");
?>
</body>
</html>