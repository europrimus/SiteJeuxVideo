<?php
// charge la configuration et renvoi un objet PDO $db
require ("../include/config.php");

$page = new Page("Modification d'un DLC");
// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");
?>
<main class="container-fluid">
	<h2><?=$page->getPage(); ?></h2>
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
if(!$erreur):
?>
	<form action="traitement.php" method="POST">
		<input type="hidden" name="id" value="<?=$dlc->getId()?>">
		<label>Nom :</label>
		<input type="text" name="nom" id="nom" value="<?=$dlc->getNom()?>" required><br>

		<label for="description">Description :</label>
		<textarea id="description" name="description" required><?=$dlc->getDescription()?></textarea><br>

		<label for="editeurId">Editeur</label>
		<select id="editeurId" name="editeurId" class="" data-live-search="true"><!-- selectpicker -->
<?php
$editeurManager=new editeursManager($db);
$editeurListe=$editeurManager->getList();
//echo "editeurListe:<br><pre>";var_dump($editeurListe);echo "</pre>";
foreach($editeurListe as $editeur)
	{
		echo '<option value="'.$editeur->id().'" data-tokens="'.$editeur->nom().'"';
		if( $dlc->getEditeurId() == $editeur->id() ){echo "selected";};
		echo '>'.$editeur->nom().'</option>';
	}
?>
		</select>
		<br>

		<label for="jeuxSupportId">Jeux pour la plate-forme :</label><br>
<?php
//$jeuxManager=new jeuManager($db);
//$jeuxListe=$jeuxManager->getList();
//array( idsupport => array ("id"=>id, "nom"=>nom, "date"=>date ) )

// pas propre mais en attendant l'objet jeu
$result = $db->query('SELECT 
	jeux.nom as jeuNom, 
	jeux_has_support.jeux_id as jeuId, 
	jeux_has_support.support_id as plateformeId, 
	support.nom as plateformeNom,
	jeux_has_support.id as jeuxSupportId
FROM jeux_has_support
	JOIN jeux ON jeux_has_support.jeux_id = jeux.id
	JOIN support ON jeux_has_support.support_id = support.id');

//echo "result : <pre>";var_dump($result);echo "</pre>";
//echo "dlc/modifier : dlc->getListeSupport()<pre>";var_dump($dlc->getListeSupport());echo "</pre>";

$dlcSupports = array_column($dlc->getListeSupport("Y-m-d"),"dateSortie" , "jeuSupportId") ;
//echo "dlcSupports:<br><pre>";var_dump($dlcSupports);echo "</pre>";

while ($jeu = $result->fetch(PDO::FETCH_ASSOC)):

if( isset($dlcSupports[$jeu["jeuxSupportId"]]) )
{$checked=True;} else {$checked=False;};

//echo "jeu : <pre>";var_dump($jeu);echo "</pre>";
?>
			<label for="date_sortie[<?=$jeu["jeuxSupportId"]?>]">Sortie le </label>
			<input type="date" name="date_sortie[<?=$jeu["jeuxSupportId"]?>]" id="date_sortie[<?=$jeu["jeuxSupportId"]?>]" 
			<?php if($checked ){echo ' value="'.$dlcSupports[$jeu["jeuxSupportId"]].'"';}; ?> >
			sur <input name="jeuxSupport[<?=$jeu["jeuxSupportId"]?>]" id="jeuxSupport[<?=$jeu["jeuxSupportId"]?>]" type="checkbox"
			<?php if($checked ){echo " checked ";}; ?>
			>
			<strong><?=$jeu["jeuNom"]?></strong> sur <strong><?=$jeu["plateformeNom"]?></strong>
			<br>

<?php
endwhile;
?>

		<input type="submit" name="modifier" value="Modifier" id="modifier">
	</form>
<?php
endif; // fin si pas d'erreur
?>
	<!--<p><em>(autocompletion pour editeur et jeu et création dynamique si nouveau jeu, support ou éditeur)</em></p>-->
</main>
<?php 
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
