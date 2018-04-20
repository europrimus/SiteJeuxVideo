<?php
require ("../include/config.php");
$page = new Page("Informations sur un éditeur");
include(SITE["installDir"]."include/header.php");

$nom = $_GET['nom'];
?>
<main>
	<?php if(!empty($nom)){ ?>
		<h3>Informations</h3>
		<ul>
			<li>Nom : <?php echo $nom; ?></li>
		</ul>
	<?php } ?>
</main>

<?php
include(SITE["installDir"]."include/footer.php");
?>

</body>
</html>
