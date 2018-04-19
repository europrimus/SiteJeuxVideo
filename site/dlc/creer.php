<?php
require ("../include/config.php");
require ("../include/class.php");
$page = new Page("Création d'un DLC");
include("../include/header.php"); ?>
<main>
	<h2><?php echo $page->getPage(); ?></h2>
	<form action="" method="POST">

		<label>Nom :</label>
		<input type="text" name="nom" id="nom" required><br>

		<label for="description">Description :</label>
		<textarea id="description" name="description" placeholder="Ajouter une description du DLC ici..." required></textarea><br>

		<label for="date_sortie">Date de sortie :</label>
		<input type="date" name="date_sortie" id="date_sortie" required><br>

		<label for="editeur">Editeur</label>
		<input type="search" name="editeur" id="editeur" required><br>

		<label for="jeu">Jeu</label>
		<input type="search" name="jeu" id="jeu" required><br>

		<label for="support" required>Support</label>
		<select name="support" required>
			<option selected disabled hidden value>Sélectionnez un support</option>
			<option value="valeur1">Valeur1</option>
			<option value="valeur2">Valeur2</option>
			<option value="valeur3">Valeur3</option>
		</select><br>

		<input type="submit" name="envoyer" value="envoyer" id="envoyer">
	</form>
	<p><em>(autocompletion pour editeur et jeu et création dynamique si nouveau jeu, support ou éditeur)</em></p>
	<a href="../index.php">Revenir sur la page d'accueil</a>
</main>
<?php include("../include/footer.php"); ?>
