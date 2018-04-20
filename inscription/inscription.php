<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
</head>
<body>

	<form method="post" action="Inscription.php" enctype="multipart/form-data">
		<p>
			<label for="nom">Nom</label>
			<input type="text" name="nom" id="nom">
		</p>
		<p>
			<label for="prenom">Prénom</label>
			<input type="text" name="prenom" id="prenom">
		</p>
		<p>
			<label for="identifiant">Identifiant/Pseudonyme</label>
			<input type="text" name="identifiant" id="identifiant">
		</p>
		<p>
			<label for="pw">Mot de Passe</label>
			<input type="password" name="pw" id="pw">
		</p>
		<p>
			<label for="confirm">Confirmation du mot de Passe</label>
			<input type="password" name="confirm" id="confirm">
		</p>
		<p>
			<label for="mail">Email</label>
			<input type="email" name="mail" id="mail" required>
		</p>
		<input type="submit" value="Inscription">
	</form>

	<?php
		if (!empty($_POST['identifiant'])) {
			// D'abord, je me connecte à la base de données.
			$db=new PDO('mysql:host=localhost;dbname=testinscription', 'root', '');

			// Je mets aussi certaines sécurités ici…
			$pw = $_POST['pw'];
			$confirm = $_POST['confirm'];
			if($pw == $confirm)
			{

				$epw = password_hash($pw, PASSWORD_DEFAULT);
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				$identifiant = $_POST['identifiant'];
				$mail = $_POST['mail'];
				
				//  /!\ NE PAS TOUCHER AU COMMENTAIRE SVP
				// // On verifie que l'identifiant n'existe pas déjà
				// $repid = $db-> query("SELECT COUNT(identifiant) FROM validation WHERE identifiant = '$identifiant';");
				// while ($verifid = $repid-> fetch()) {
				// }
				// //Idem pour l'adresse mail
				// $repmail = $db-> query("SELECT COUNT(mail) FROM validation WHERE mail = '$mail';");
				// while ($verifmail = $repmail-> fetch()) {
				// }

				$retour = $db-> exec("INSERT INTO validation(id, nom, prenom, identifiant, pw, mail) VALUES('', '$nom', '$prenom', '$identifiant', '$epw', '$mail')");
				if ($retour===FALSE) {
					echo "Identifiant ou email déjà enregistrés";
				}else{
					echo "Vous etes bien enregistrer";
				}
				
			}else
			{
			echo 'Les deux mots de passe que vous avez rentrés ne correspondent pas…';
			}
		}
	?>

</body>
</html>