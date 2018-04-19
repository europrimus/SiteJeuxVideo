<?php
require ("../include/config.php");
require ("../include/class.php");
$page = new Page("Informations sur un éditeur");
include("../include/header.php");
?>
<main>
	<h3>Informations</h3>
	<ul>
		<li>Nom : Nom de l'éditeur</li>
	</ul>

	<a href="../index.php">Revenir sur la page d'accueil</a>
</main>

<?php
include("../include/footer.php");
?>
</body>
</html>