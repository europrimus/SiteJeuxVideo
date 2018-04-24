<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>Installation du site</title>
	<meta name="generator" content="Geany 1.27">
</head>

<body>

<main class="container-fluid">

<h1>Installation</h1>
<p>Impossible de trouver le fichier de configuration "include/config.php"<br>
Le site ne semble pas configuré.<br>
Avez vous renommer le fichier "include/config_defaut.php" en "include/config.php" et modifier les paramètres propre à votre installation?</p>
<h2>La base de donnée</h2>
	<p>Changer les information concernant votre base de données.<br>
	Puis exécuter le fichier pour <a href="include/createDB.sql">créer la base de données</a></p>
<h2>Répertoire de l'installation</h2>
	<p>"titreComplet" => "La base de données des Jeux Video", <br>
		"TitreCourt" => "LBDJV",<br>
		"installDir" => "<?=pathinfo($_SERVER['SCRIPT_FILENAME'], PATHINFO_DIRNAME).DIRECTORY_SEPARATOR?>",<br>
		"baseUrl" => "<?=pathinfo($_SERVER['REQUEST_URI'], PATHINFO_DIRNAME)?>/",</p>
</main>

	<footer class="container-fluid">
		<p>Site réalisée par : Melodie, Vincent, Julien, Didier et Luk</p>
	</footer>
</body>


</html>
