<?php
require ("../include/config.php");
require ("../include/class.php");
$page = new Page("Informations sur un Support");
include("../include/header.php");
?>
<main>
	<h3>Informations</h3>
	<ul>
		<li>Nom : Nom du support</li>
	</ul>

	<a href="../index.php">Revenir sur la page d'accueil</a>
</main>

<?php
include("../include/footer.php");
?>
</body>
</html>