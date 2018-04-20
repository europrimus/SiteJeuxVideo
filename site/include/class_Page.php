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
}

?>
