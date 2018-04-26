<?php
// charge la configuration et renvoi un objet PDO $db
require ("../include/config.php");

$page = new Page("Création d'un DLC");
// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");
?>
<main class="container-fluid">
	<h2><?php echo $page->getPage(); ?></h2>
<?php 
//echo "_SESSION: <pre>";var_dump($_SESSION);echo "</pre>";

//echo "dlc: <pre>";var_dump(new dlc());echo "</pre>";

?>
	<form action="traitement.php" method="POST">

		<label for="nom">Nom :</label>
		<input type="text" name="nom" id="nom" required><br>

		<label for="description">Description :</label>
		<textarea id="description" name="description" placeholder="Ajouter une description du DLC ici..." required></textarea><br>

		<label for="lien">Lien vers le site officiel (facultatif) :</label>
		<input type="text" name="lien" id="lien"><br>

		<label for="editeurId">Editeur</label>
		<select id="editeurId" name="editeurId" class="" data-live-search="true"><!-- selectpicker -->
			<option selected disabled hidden value>Sélectionnez ...</option>
<?php
$editeurManager=new editeursManager($db);
$editeurListe=$editeurManager->getList();
//echo "editeurListe:<br><pre>";var_dump($editeurListe);echo "</pre>";
foreach($editeurListe as $editeur)
	{
		echo '<option value="'.$editeur->id().'" data-tokens="'.$editeur->nom().'">'.$editeur->nom().'</option>';
	}
?>
		</select>
		<br>

		<p>Jeux pour la plate-forme :<br>
<?php
//listeJeuSupport[$jeuSupportDlcId] = array ("_jeuSupportDlcId" => , "jeuSupportId" => , "jeu" => , "jeuId" => , "plateforme" =>, "plateformeId" => , "dateSortie" => )

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

while ($jeu = $result->fetch(PDO::FETCH_ASSOC)):
//echo "jeu : <pre>";var_dump($jeu);echo "</pre>";
?>
			<label for="listeSupport[<?=$jeu["jeuxSupportId"]?>][dateSortie]"</label>Sortie le </label>
			<input type="hidden" name="listeSupport[<?=$jeu["jeuxSupportId"]?>][jeuId]" value="<?=$jeu["jeuId"]?>">
			<input type="date" name="listeSupport[<?=$jeu["jeuxSupportId"]?>][dateSortie]" id="listeSupport[<?=$jeu["jeuxSupportId"]?>][dateSortie]">
			sur <input name="listeSupport[<?=$jeu["jeuxSupportId"]?>][checkbox]" id="listeSupport[<?=$jeu["jeuxSupportId"]?>][checkbox]" type="checkbox">
			<strong><?=$jeu["jeuNom"]?></strong> sur <strong><?=$jeu["plateformeNom"]?></strong>
			<br>

<?php
endwhile;
?>
		</p>
		<input type="submit" name="creer" value="Créer" id="creer">
	</form>
	<!--<p><em>(autocompletion pour editeur et jeu et création dynamique si nouveau jeu, support ou éditeur)</em></p>-->
</main>
<?php 
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
