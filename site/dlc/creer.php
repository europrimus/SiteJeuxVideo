<?php
// charge la configuration et renvoi un objet PDO $db
require ("../include/config.php");

$page = new Page("Création d'un DLC");
// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");
?>
<main class="container-fluid">
	<h2><?php echo $page->getPage(); ?></h2>
	<form action="" method="POST">

		<label>Nom :</label>
		<input type="text" name="nom" id="nom" required><br>

		<label for="description">Description :</label>
		<textarea id="description" name="description" placeholder="Ajouter une description du DLC ici..." required></textarea><br>

		<label for="date_sortie">Date de sortie :</label>
		<input type="date" name="date_sortie" id="date_sortie" required><br>

		<label for="editeur">Editeur</label>
		<select id="editeur" class="selectpicker" data-live-search="true">
<?php
$editeurManager=new EditeursManager($db);
$editeurListe=$editeurManager->getList();
//echo "editeurListe:<br><pre>";var_dump($editeurListe);echo "</pre>";
foreach($editeurListe as $editeur)
	{
		echo '<option value="'.$editeur->id().'" data-tokens="'.$editeur->nom().'">'.$editeur->nom().'</option>';
	}
?>
		</select>
		<br>

		<label for="jeu">Jeu</label>
		<select id="jeu" class="selectpicker" data-live-search="true">
<?php
$jeuxManager=new jeuManager($db);
$jeuxListe=$jeuxManager->getList();
foreach($jeuxListe as $jeu)
	{
		echo '<option value="'.$jeu->id().'" data-tokens="'.$jeu->nom().'">'.$jeu->nom().'</option>';
	}
?>
		</select>
		<br>

		<label for="support" required>Support</label>
		<select id="support" class="selectpicker" data-live-search="true">
<?php
$supportManager=new supportManager($db);
$supportListe=$supportManager->getList();
foreach($supportListe as $support)
	{
		echo '<option value="'.$support->id().'" data-tokens="'.$support->nom().'">'.$support->nom().'</option>';
	}
?>
		</select>
		<br>

		<input type="submit" name="envoyer" value="envoyer" id="envoyer">
	</form>
	<p><em>(autocompletion pour editeur et jeu et création dynamique si nouveau jeu, support ou éditeur)</em></p>
</main>
<?php 
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
