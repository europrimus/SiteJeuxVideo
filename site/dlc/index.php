<?php
// charge la configuration et renvoi un objet PDO $db
require ("../include/config.php");

$page = new Page("Liste des DLC");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");

$manager = new dlcManager($db);
$dlcList = $manager->getList();

?>
<main class="container-fluid">
<?php if($dlcList):?>
	<table>
		<tr><th>Nom</th><th>Jeu</th><!--<th>Plateforme</th>--><th>Editeur</th><!--<th>Date</th>--></tr>

<?php
foreach($dlcList as $dlc):
//echo "foreach(dlcList as dlc) : <pre>";var_dump($dlc);echo "</pre>";
?>
		<tr>
			<td><a href="voir.php?id=<?=$dlc->getId()?>&nom=<?=$dlc->getNom()?>"><?=$dlc->getNom()?></a></td>
			<td><a href="../jeux/voir.php?id=<?=$dlc->getJeuId()?>&nom=<?=$dlc->getJeu()?>"><?=$dlc->getJeu()?></a></td>
			<td><a href="../editeurs/voir.php?id=<?=$dlc->getEditeurId()?>&nom=<?=$dlc->getEditeur()?>"><?=$dlc->getEditeur()?></a></td>
		</tr>
<?php endforeach;?>
	</table>
<?php endif;?>


<?php if (!empty($_SESSION)): ?>
	<p><a href="creer.php">Ajouter un DLC</a></p>
<?php endif; ?>
</main>

<?php
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
