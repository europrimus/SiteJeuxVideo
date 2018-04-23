<?php
// charge la configuration et renvoi un objet PDO $db
require ("../include/config.php");
$page = new Page("Informations sur un DLC");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");
?>
<main class="container-fluid">
	<h3>Informations</h3>
<?php
$erreur=True;
if( isset($_REQUEST['id']) ) :
$manager = new dlcManager($db);
$dlc = $manager->getFromId($_REQUEST['id']);
//echo "dlc : <pre>";var_dump($dlc);echo "</pre>";
	if ($dlc->getId() != Null):
	$erreur=False;
?>

	<dl>
		<dt>Nom</dt><dd><?=$dlc->getNom()?></dd>
		<dt>Jeu</dt><dd><a href="../jeux/voir.php?id=<?=$dlc->getJeuId()?>"><?=$dlc->getJeu()?></a></dd>
		<dt>Plate-forme</dt><dd><a href="../supports/voir.php?id=<?=$dlc->getPlateformeId()?>"><?=$dlc->getPlateforme()?></a></dd>
		<dt>Editeur</dt><dd><a href="../editeurs/voir.php?id=<?=$dlc->getEditeurId()?>"><?=$dlc->getEditeur()?></a></dd>
		<dt>Date de sortie</dt><dd><?=$dlc->getDate()?></dd>
		<dt>Description</dt><dd><?=$dlc->getDescription()?></dd>
	</dl>
<?php
	endif;
endif;
if($erreur){echo '<p>DLC non trouvé, vous pouvez  retourner à la <a href="./">liste des DLC</a> ou le <a href="creer.php">créer</a>.</p>';};
?>
</main>

<?php
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
