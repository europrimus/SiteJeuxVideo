<?php

// création de la classe page
// Détient les infos sur la page
class Page{
// les variable privées
	private $_page;
	private $_listePage;
	private $_repSysteme = array("css","img","include","js");


// les variables publiques
// reprend la constante SITE

// le constructeur
	public function __construct($page) {
		$this->setPage($page);
// lit les répertoires pour récupérer les possibilités
		$reps = glob( "*" , GLOB_ONLYDIR );
		//echo "<pre>";var_dump($reps);echo "</pre>";
		//echo "<pre>";var_dump($this->_repSysteme);echo "</pre>";
		foreach($reps as $rep)
		{
			if(!in_array($rep, $this->_repSysteme))
			{
				$listPage[]=$rep;
			};
		};
		//echo "<pre>";var_dump($listPage);echo "</pre>";
		$this->_listePage = $listPage;
	}


// les fonctions
// le titre
/*
 * utilisation de la constante SITE["titreComplet"]
	public function setTitre($str){
		if (is_string($str)){
			$this->_titre = $str;
			return True;
		}else{
			return False;
		};
	}
*/
	public function getTitre(){
		return SITE["titreComplet"];
	}

	public function getTitreCourt(){
		return SITE["TitreCourt"];
	}

// la page
	public function setPage($str){
		if (is_string($str)){
			$this->_page = $str;
			return True;
		}else{
			return False;
		};
	}

	public function getPage(){
		return $this->_page;
	}
	

// Le menu
	public function getNav(){
		// ouverture des balises
		$nav = '
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Menu principal">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="menuPrincipal">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="'.SITE["baseUrl"].'">Accueil</a>
				</li>';

		// dessin des éléments
		foreach($this->_listePage as $page){
			$nav .= '
				<li class="nav-item">
					<a class="nav-link" href="'.SITE["baseUrl"].$page.'">'.$page.'</a>
				</li>';
		}

		// fermeture des balises
		$nav .= '
			</ul>';
/*
<!-- Formulaire de recherche encore non fonctionnelle

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
-->
*/
		$nav .= '
		</div>
	</nav>';
		
		return $nav;
	}
}

?>
