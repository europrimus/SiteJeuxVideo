<?php
require ("../include/config_defaut.php");
require ("../include/class.php");
$page = new Page("Informations sur un éditeur");
include("../include/header.php");

$nom = $_GET['nom'];
?>
<main>
	<?php if(!empty($nom)){ ?>
		<h3>Informations</h3>
		<ul>
			<li>Nom : <?php echo $nom; ?></li>
		</ul>
	<?php } ?>
	<a href="../index.php">Revenir sur la page d'accueil</a>
</main>

<?php
include("../include/footer.php");
?>

</body>
</html>