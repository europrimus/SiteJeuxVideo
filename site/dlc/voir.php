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
$manager = new dlcManager($db);

if( isset($_REQUEST['id']) ) {
	if ($_REQUEST['id'] != Null) {
		$dlc = $manager->getFromId($_REQUEST['id']);
		if($dlc->getId() != Null) {$erreur=False;};
	};
}elseif( isset($_REQUEST['nom']) ){
	if ($_REQUEST['nom'] != Null) {
		$dlc = $manager->getFromNom($_REQUEST['nom']);
		if($dlc->getId() != Null) {$erreur=False;};
	};
};

//echo "dlc : <pre>";var_dump($dlc);echo "</pre>";
if (!$erreur):
?>

	<dl>
		<dt>Nom</dt><dd><?=$dlc->getNom()?></dd>
		<dt>Pour le jeu</dt><dd><a href="../jeux/voir.php?id=<?=$dlc->getJeuId()?>&nom=<?=$dlc->getJeu()?>"><?=$dlc->getJeu()?></a></dd>
		<dt>Plate-forme</dt><dd>
<?php foreach($dlc->getListeSupport() as $val):?>
			<a href="../supports/voir.php?id=<?=$val["plateformeId"]?>&nom=<?=$val["plateforme"]?>"><?=$val["plateforme"]?></a> sortie le <?=$val["dateSortie"]?><br>
<?php endforeach;?>
			</dd>
		<dt>Éditeur</dt><dd><a href="../editeurs/voir.php?id=<?=$dlc->getEditeurId()?>"><?=$dlc->getEditeur()?></a></dd>
		<dt>Description</dt><dd><?=$dlc->getDescription()?></dd>
	</dl>
	<p><a href="modifier.php?id=<?=$dlc->getId()?>">Modifier</a> | 
	<a href="supprimer.php?id=<?=$dlc->getId()?>">Supprimer</a></p>
<?php
else:
?>
<p>DLC non trouvé, vous pouvez  retourner à la <a href="./">liste des DLC</a> ou le <a href="creer.php">créer</a>.</p>
<?php
endif;
?>
</main>

<?php
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
