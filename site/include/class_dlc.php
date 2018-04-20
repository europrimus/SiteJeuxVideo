<?php
class dlc {

// les variables
// privées
  private $_id;
  private $_nom;
  private $_description;
  private $_editeur;
  private $_console;
  private $_jeu;
  private $_date; // en timestamp
  
  
// publiques
//rien, tout est privées

// les fonctions:
// le constructeur
  public function __construct(array $donnees) {
	if(is_array($donnees)){
		$this->hydrate($donnees);
	}else{
		return false;
	};
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
    }
   }
  }


// les fonctions d'écritures
  public function setId($id)
  {
    // on vérifie si c'est un int et si l'id n'est pas déjà défini.
    if ( is_int($id) and !isset($this->_id) ){
		$this->_id = $id;
	};
  }

  public function setNom($str) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 100 caractères.
    if (is_string($str) && strlen($str) <= 100) {
      $this->_nom = strip_tags($str);
    }
  }

  public function setEditeur($str) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 100 caractères.
    if (is_string($str) && strlen($str) <= 100) {
      $this->_editeur = strip_tags($str);
    }
  }

  public function setDescription($str) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 500 caractères.
    if (is_string($str) && strlen($str) <= 500) {
      $this->_Description = strip_tags($str);
    }
  }

  public function setConsole($str) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 100 caractères.
    if (is_string($str) && strlen($str) <= 100) {
      $this->_console = strip_tags($str);
    }
  }

  public function setJeu($str) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 100 caractères.
    if (is_string($str) && strlen($str) <= 100) {
      $this->_jeu = strip_tags($str);
    }
  }

  public function setDate($dateIn) {
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
		$this->_date = $date->getTimestamp();
	};
  }


// les fonctions de lectures
  public function getId() { return $this->_id; }
  public function getNom() { return $this->_nom; }
  public function getDescription() { return $this->_description; }
  public function getEditeur() { return $this->_editeur; }
  public function getConsole() { return $this->_console; }
  public function getJeu() { return $this->_jeu; }
  
// retourne la date en timestamp
  public function getTimestamp() { return $this->_date; }

// retourne la date formaté: "d/m/Y" => 01/05/2015 ou "j/n/Y" => 1/5/2015
  public function getDate($format = "j/n/Y") {
	return date( $format , $this->_date );
  }



}

?>
