<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="utf-8">
<title><?php echo $page->getTitreCourt()." | ".$page->getPage(); ?></title>
<meta name="generator" content="Geany 1.27">
<!-- Feuille de style -->
	<link rel="stylesheet" href="<?php echo SITE["baseUrl"]."css/bootstrap.min.css"; ?>">

<!-- Open Graph (http://ogp.me/) -->
	<meta property="og:title" content="<?php echo $page->getTitre()." | ".$page->getPage(); ?>">
	<meta property="og:type" content="website">
	<meta property="og:url" content="">
	<meta property="og:image" content="">
</head>

<body>
	<header class="container-fluid">
		<a class="navbar-brand" href="<?php echo SITE["baseUrl"]; ?>"><h1><?php echo $page->getTitre(); ?></h1></a>
		<h2><?php echo $page->getPage(); ?></h2>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Menu principal">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="menuPrincipal">
    <ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo SITE["baseUrl"] ?>">Accueil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo SITE["baseUrl"] ?>jeux">Jeux</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo SITE["baseUrl"] ?>dlc">DLC</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo SITE["baseUrl"] ?>supports">Plate-forme</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo SITE["baseUrl"] ?>editeurs">Éditeurs</a>
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


	</header>
