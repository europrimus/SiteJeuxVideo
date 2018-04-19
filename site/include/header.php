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
	<header>
		<a class="navbar-brand" href="<?php echo SITE["baseUrl"]; ?>"><h1><?php echo $page->getTitre(); ?></h1></a>
		<h2><?php echo $page->getPage(); ?></h2>
		<nav class="navbar navbar-light bg-light">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="jeux">Jeux</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="supports">Supports</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="editeurs">Éditeurs</a>
				</li>
			</ul>
		</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Menu principal">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="menuPrincipal">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


	</header>
