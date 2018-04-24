<?php
// charge la configuration et renvoi un objet PDO $db
require ("../include/config.php");

$page = new Page("Création d'un DLC");
// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");
?>
<main class="container-fluid">
	<h2><?php echo $page->getPage(); ?></h2>
	<form action="ajout_dlc.php" method="POST">

		<label>Nom :</label>
		<input type="text" name="nom" id="nom" required><br>

		<label for="description">Description :</label>
		<textarea id="description" name="description" placeholder="Ajouter une description du DLC ici..." required></textarea><br>

		<label for="date_sortie">Date de sortie :</label>
		<input type="date" name="date_sortie" id="date_sortie" required><br>

		<label for="editeurId">Editeur</label>
		<select id="editeurId" class="" data-live-search="true"><!-- selectpicker -->
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

		<label for="jeuxSupportId">Jeux pour la plate-forme :</label><br>
<?php
$jeuxManager=new jeuManager($db);
$jeuxListe=$jeuxManager->getList();
foreach($jeuxListe as $jeu):
echo "jeu : <pre>";var_dump($jeu);echo "</pre>";
?>

			<label for="date_sortie[jeuxSupportId]">Sortie le </label>
			<input type="date" name="date_sortie[jeuxSupportId]" id="date_sortie[jeuxSupportId]">
			sur <input name="jeuxSupport[jeuxSupportId]" id="jeuxSupport[jeuxSupportId]" type="checkbox">jeuxNom - Plate-formeNom
			<br>

<?php
endforeach;
?>

		<br>

		<label for="plateformeId" required>Plate-forme</label>
		<select id="plateformeId" class="" data-live-search="true"><!-- selectpicker -->
			<option selected disabled hidden value>Sélectionnez ...</option>
<?php

$supportManager=new supportManager($db);
$supportListe=$supportManager->getList();
foreach($supportListe as $support)
	{
		echo '<option value="'.$support->id().'" data-tokens="'.$support->nom().'">'.$support->nom().'</option>';
	}

?>
			<option value="1" data-tokens="Ma Console">Ma Console</option>
		</select>
		<br>

<select name="support" required>
       <option selected disabled hidden value>Sélectionnez une plateforme dans la liste</option>
      <?php foreach ($supportListe as $support): ?>
        <option value='<?= $support->id(); ?>'><?= htmlspecialchars($support->nom()); ?></option>
      <?php endforeach; ?>      
</select>
		<input type="submit" name="envoyer" value="envoyer" id="envoyer">
	</form>
	<p><em>(autocompletion pour editeur et jeu et création dynamique si nouveau jeu, support ou éditeur)</em></p>
</main>
<?php 
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
