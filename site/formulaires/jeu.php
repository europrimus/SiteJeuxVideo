<?php
include("../include/class.php");
include("../include/header.php"); ?>
<main>
	<h2>Création d'un jeu vidéo</h2>
	<form action="" method="POST">

		<label for="titre">Titre :</label>
		<input type="text" name="titre" id="titre" required><br>

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

		<label for="editeur">Editeur :</label>
		<select name="editeur" required>
			<option selected disabled hidden value>Sélectionnez un édieur</option>
			<option value="valeur1">Valeur1</option>
			<option value="valeur2">Valeur2</option>
			<option value="valeur3">Valeur3</option>
		</select><br>

		<input type="submit" name="envoyer" value="envoyer" id="envoyer">
	</form>
	<ul>
		<li><a href="support.php">Créer ou modifier un nouveau support</a></li>
		<li><a href="editeur.php">Créer ou modifier un nouvel éditeur</a></li>
	</ul>
	<a href="../index.php">Revenir sur la page d'accueil</a>
</main>
<?php include("../include/footer.php"); ?>
</body>
</html>