<?php

// création de la classe page
// Détient les infos sur la page
class Page{
// les variable privées
	private $_page;

// les variables publiques
// reprend la constante SITE

// le constructeur
	public function __construct($page) {
//		$this->setTitre($titre);
		$this->setPage($page);
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
}
?>
