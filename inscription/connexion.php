<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
</head>
<body>

	<form method="post" action="index.php" enctype="multipart/form-data">
		<p>
			<label for="identifiant">Identifiant/Pseudonyme</label>
			<input type="text" name="identifiant" id="identifiant">
		</p>
		<p>
			<label for="pw">Mot de Passe</label>
			<input type="password" name="pw" id="pw">
		</p>
		<input type="submit" value="Connexion">
	</form>

	<?php
		if (!empty($_POST['identifiant'])) {
			$db=new PDO('mysql:host=localhost;dbname=testinscription', 'root', '');

			

		}
	?>

</body>
</html>