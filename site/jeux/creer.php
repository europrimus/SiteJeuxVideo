<?php
require ("../include/config.php");
$page = new Page("Création d'un jeu");
include(SITE["installDir"]."/include/header.php"); 
?>
<main>
	<h2><?php echo $page->getPage(); ?></h2>
	<form action="objeux.php" method="POST">

		<label for="nom">Nom :</label>
		<input type="text" name="nom" id="nom" required><br>

		<label for="description">Description :</label>
		<textarea id="description" name="description" placeholder="Ajouter une description du jeu ici..." required></textarea><br>

		<label for="date_sortie">Date de sortie :</label>
		<input type="date" name="date_sortie" id="date_sortie" required><br>

		<label for="console">Support :</label>
		<select name="console">
			<option selected disabled hidden value>Sélectionnez un support</option>
			<option value="valeur1">Valeur1</option>
			<option value="valeur2">Valeur2</option>
			<option value="valeur3">Valeur3</option>
		</select><br>

		<label for="editeur">Editeur</label>
		<input type="search" name="editeur" id="editeur" required><br>

		<input type="submit" name="envoyer" value="envoyer" id="envoyer">
	</form>
	<p><em>(Création dynamique si nouveau support ou éditeur et recherche autocompletion pour editeur)</em></p>
</main>
<?php include(SITE["installDir"]."/include/footer.php"); ?>
