<?php

// création de la classe page
// Détient les infos sur la page
class Page{
// les variable privées
	private $_titre;
	private $_page;

// les variables publiques


// le constructeur
	public function __construct($titre, $page) {
		$this->setTitre($titre);
		$this->setPage($page);
	}


// les fonctions
// le titre
	public function setTitre($str){
		if (is_string($str)){
			$this->_titre = $str;
			return True;
		}else{
			return False;
		};
	}

	public function getTitre(){
		return $this->_titre;
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
