<?php
include("../include/class.php");
include("../include/header.php"); ?>
<main>
	<h2>Création d'un DLC</h2>
	<form action="" method="POST">
		<label>Nom :</label>
		<input type="text" name="nom" id="nom" required><br>
		<label for="editeur">Editeur</label>
		<select name="editeur">
			<option selected disabled hidden value>Sélectionnez un support</option>
			<option value="valeur1">Valeur1</option>
			<option value="valeur2">Valeur2</option>
			<option value="valeur3">Valeur3</option>
		</select>
		<input type="submit" name="envoyer" value="envoyer" id="envoyer">
	</form>
	<ul>
		<li><a href="editeur.php">Créer ou modifier un editeur</a></li>
	</ul>
	<a href="../index.php">Revenir sur la page d'accueil</a>
</main>
<?php include("../include/footer.php"); ?>
</body>
</html>