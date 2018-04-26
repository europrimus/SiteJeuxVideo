<?php
class dlc {

// les variables
// "id","nom","description","editeur","editeurId","plateforme","plateformeId","jeu","jeuId","jeuSupportId","jeuSupportDlcId","lien","date"
// privées
  private $_id;
  private $_nom;
  private $_description;
  private $_editeur;
  private $_editeurId;
//  private $_plateforme;
//  private $_plateformeId;
  private $_jeu;
  private $_jeuId;
  private $_listeSupport; // _listeSupport[jeuSupportDlcId] = array ("jeuSupportDlcId" => , "jeuSupportId" => , "plateforme" =>, "plateformeId" => , "dateSortie" => )
//  private $_jeuSupportId;
//  private $_jeuSupportDlcId;
  private $_lien;
//  private $_date; // en timestamp
  
  
// publiques
//rien, tout est privées

// les fonctions:
// le constructeur
  public function __construct($donnees=false) {
	//echo "dlc > __construct : donnees: <pre>";var_dump($donnees);echo "</pre>";
	if(!$donnees){return false;};
	if(!is_array($donnees)){return false;};
	$this->hydrate($donnees);
  }

// Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
  public function hydrate(array $donnees) {
   foreach ($donnees as $key => $value) {
    // On récupère le nom du setter correspondant à l'attribut.
    $method = 'set'.ucfirst($key);
    // Si le setter correspondant existe.
    if (method_exists($this, $method)) {
      // On appelle le setter.
      $this->$method($value);
    }else{
		//echo "rien à faire pour : $method => <pre>"; var_dump($value);echo "</pre><br>".PHP_EOL;
	}
   }
  }


// les fonctions d'écritures
  public function setId(int $id)
  {
    // on vérifie si c'est un int et si l'id n'est pas déjà défini.
    if ( is_int($id) and !isset($this->_id) ){
		$this->_id = $id;
	}else{
		echo "erreur id: ";var_dump($id);
	};
  }

  public function setNom($str) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 100 caractères.
    if (is_string($str) && strlen($str) <= 100) {
      $this->_nom = strip_tags($str);
    }
  }

  public function setDescription($str) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 500 caractères.
    if (is_string($str) && strlen($str) <= 500) {
      $this->_description = strip_tags($str);
    }
  }

// Editeur
  public function setEditeur($str) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 100 caractères.
    if (is_string($str) && strlen($str) <= 100) {
      $this->_editeur = strip_tags($str);
    }
  }

  public function setEditeurId(int $int) {
    if (is_string($int)){$int=intval($int);}
    // On vérifie qu'il s'agit bien d'un nombre
    if (is_int($int)) {
      $this->_editeurId = $int;
    }
  }
  

// il faudra vérifier les champs !!
  public function setListeSupport($array){
	//echo "dlc > setListeSupport : array:<pre>";var_dump($array);echo "</pre>";
	if(!is_array($array)){return False;};
	if(isset($array[0])){
		foreach($array as $subarray){
			$this->setListeSupport($subarray);
		};
	}
	if(!array_key_exists("jeuSupportId" , $array ) OR !array_key_exists("dateSortie" , $array ) ){
		//echo "<p>pas de jeuSupportId (".$array["jeuSupportId"].") ou de dateSortie(".$array["dateSortie"].")</p>";
		return False;
	};
	
	$this->_listeSupport[] = array (
	"jeuSupportDlcId" => $this->_formatJeuSupportDlcId($array["jeuSupportDlcId"]), 
	"jeuSupportId" => $this->_formatJeuSupportId($array["jeuSupportId"]), 
	"plateforme" => $this->_formatPlateforme($array["plateforme"]), 
	"plateformeId" => $this->_formatPlateformeId($array["plateformeId"]), 
	"dateSortie" => $this->_formatDate($array["dateSortie"]),
	);
  }

// Support , Plateforme, console
  private function _formatPlateforme($str) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 100 caractères.
    if (is_string($str) && strlen($str) <= 100) {
      return strip_tags($str);
    }
  }

  private function _formatPlateformeId($int) {
    if (is_string($int)){$int=intval($int);}
    // On vérifie qu'il s'agit bien d'un nombre
    if (is_int($int)) {
      return $int;
    }
  }

// Jeu
  public function setJeu($str) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 100 caractères.
    if (is_string($str) && strlen($str) <= 100) {
      $this->_jeu = strip_tags($str);
    }
  }

  public function setJeuId($int) {
    if (is_string($int)){$int=intval($int);}
    // On vérifie qu'il s'agit bien d'un nombre
    if (is_int($int)) {
      $this->_jeuId = $int;
    }
  }

// JeuSupportId
  private function _formatJeuSupportId($int) {
    if (is_string($int)){$int=intval($int);}
    // On vérifie qu'il s'agit bien d'un nombre
    if (is_int($int)) {
      return $int;
    }
  }

// JeuSupporDlctId
  private function _formatJeuSupportDlcId($int) {
    if (is_string($int)){$int=intval($int);}
    // On vérifie qu'il s'agit bien d'un nombre
    if (is_int($int)) {
      return $int;
    }
  }

// Lien
  public function setLien($str) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 250 caractères.
    if (is_string($str) && strlen($str) <= 250) {
      $this->_lien = strip_tags($str);
    }
  }

// La date de sortie
  private function _formatDate($dateIn) {
	$out=False;
	$date = new DateTime();
// on regarde si c'est une string
    if (is_string($dateIn) ) {
// On regarde si il s'agit d'une date dd/mm/yyyy ou "yyyy-mm-dd".
		if( $part=explode("-", $dateIn) ){
			$j=$part[2];
			$m=$part[1];
			$a=$part[0];
		}elseif( $part=explode("/", $dateIn) ){
			$j=$part[0];
			$m=$part[1];
			$a=$part[2];
		};
		
// on vérifie la validité de la date
		if(checkdate($m,$j,$a)){
			$out=True;
			$date->setDate($a, $m, $j);
		};
// on regarde si c'est un int, donc un timestamp
	}elseif(is_int($dateIn)){
		$date->setTimestamp($dateIn);
	}
// si on a une date, on la renvoi
  if($out){
		return $date->getTimestamp();
	};
  }


// les fonctions de lectures
  public function getId() { return $this->_id; }
  public function getNom() { return $this->_nom; }
  public function getDescription() { return $this->_description; }
  public function getEditeur() { return $this->_editeur; }
  public function getEditeurId() { return $this->_editeurId; }
// dans le tableau _listeSupport
//  public function getPlateforme() { return $this->_plateforme; }
//  public function getPlateformeId() { return $this->_plateformeId; }
  public function getJeu() { return $this->_jeu; }
  public function getJeuId() { return $this->_jeuId; }
//  public function getJeuSupportId() { return $this->_jeuSupportId; }
//  public function getJeuSupportDlcId() { return $this->_jeuSupportDlcId; }
  public function getLien() { return $this->_lien; }

  public function getListeSupport($formatDate="d/m/Y"){
	  $retour=$this->_listeSupport;
	  if($formatDate == "timestamp")
		{return $retour;}
	  else{
		  foreach($retour as $key => $val){
			  $retour[$key]["dateSortie"] = date( $formatDate , $val["dateSortie"] );
		  }
	  }
	  return $retour;
  }

// retourne la date en timestamp
//  public function getTimestamp() { return $this->_date; }

// retourne la date formaté: "d/m/Y" => 01/05/2015 ou "j/n/Y" => 1/5/2015 ou "Y-m-d" => 2015-05-01 
/*
  public function getDate($format = "j/n/Y") {
	return date( $format , $this->_date );
  }
*/
}
?>
