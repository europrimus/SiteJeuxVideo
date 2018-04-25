<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="utf-8">
<title><?php echo $page->getTitreCourt()." | ".$page->getPage(); ?></title>
<meta name="generator" content="Geany 1.27">
<!-- Feuille de style -->
	<link rel="stylesheet" href="<?=SITE["baseUrl"]."css/bootstrap.min.css"; ?>">

<!-- Open Graph (http://ogp.me/) -->
	<meta property="og:title" content="<?php echo $page->getTitre()." | ".$page->getPage(); ?>">
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?=SITE["baseUrl"]?>">
	<meta property="og:image" content="">
</head>

<body>
	<header class="container-fluid">
		<a class="navbar-brand" href="<?=SITE["baseUrl"]; ?>"><h1><?=$page->getTitre(); ?></h1></a>
		<h2><?php echo $page->getPage(); ?></h2>
		<ul>
			<?php
			if (empty($_SESSION)) {
				echo '<li><a href="'.SITE["baseUrl"].'utilisateurs/connexion.php">Connexion</a></li>
			<li><a href="'.SITE["baseUrl"].'utilisateurs/register.php">Inscription</a></li>';
			}else{
				$name=$_SESSION['pseudo'];
				echo "<p>Bonjour " , $name, ' !</p>
				<li><a href="'.SITE["baseUrl"].'utilisateurs/deconnexion.php">Déconnexion</a></li>';
			}
			?>
		</ul>


<nav class="navbar navbar-expand-md navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Menu principal">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="menuPrincipal">
    <ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?=SITE["baseUrl"] ?>">Accueil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?=SITE["baseUrl"] ?>jeux">Jeux</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?=SITE["baseUrl"] ?>dlc">DLC</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?=SITE["baseUrl"] ?>supports">Plate-forme</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?=SITE["baseUrl"] ?>editeurs">Éditeurs</a>
				</li>
    </ul>
<!-- Formulaire de recherche encore non fonctionnelle

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
-->
  </div>
</nav>

<?php
/*
 * un menu automatique, mais moin beau
echo $page->getNav();
*/
?>

	</header>
