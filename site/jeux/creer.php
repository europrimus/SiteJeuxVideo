<?php
require ("../include/config.php");
$page = new Page("Création d'un jeu");
include(SITE["installDir"]."/include/header.php");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$manager = new EditeursManager($db);
$editeurs = $manager->getList(); 
?>
<main>
	<h2><?php echo $page->getPage(); ?></h2>
	<form action="ajout_jeu.php" method="POST">

		<label for="nom">Nom :</label>
		<input type="text" name="nom" id="nom" required><br>

		<label for="editeur">Editeur :</label>
		<select name="editeur" required>
			<option selected disabled hidden value>Sélectionnez un éditeur dans la liste</option>
			<?php foreach ($editeurs as $editeur): ?>
	    	<option value="<?php ($editeur->id()); ?>"><?= htmlspecialchars($editeur->nom()); ?></option>
			<?php endforeach; ?>
		</select>
		<a href="..\editeurs\creer.php" style="text-decoration: none"><input type="button" value="Ajouter un nouvel éditeur"/></a><br>

		<label for="date_sortie">Date de sortie :</label>
		<input type="date" name="date_sortie" id="date_sortie" required><br>

		<label for="console">Support :</label>
		<select name="console" required>
			<option selected disabled hidden value>Sélectionnez un support dans la liste</option>
			<option value="valeur1">Valeur1</option>
			<option value="valeur2">Valeur2</option>
			<option value="valeur3">Valeur3</option>
		</select><br>

		<label for="description">Description :</label>
		<textarea id="description" name="description" rows="6" cols="50" placeholder="Ajouter une description du jeu ici..." required></textarea><br>

		<input type="submit" name="envoyer" value="envoyer" id="envoyer">
	</form>
	<p><em>(Création dynamique si nouveau support ou éditeur et recherche autocompletion pour editeur)</em></p>
</main>
<?php include(SITE["installDir"]."/include/footer.php"); ?>
