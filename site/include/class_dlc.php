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
  private $_plateforme;
  private $_plateformeId;
  private $_jeu;
  private $_jeuId;
  private $_jeuSupportId;
  private $_jeuSupportDlcId;
  private $_lien;
  private $_date; // en timestamp
  
  
// publiques
//rien, tout est privées

// les fonctions:
// le constructeur
  public function __construct($donnees) {
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
    }else{
		echo "<!--rien à faire pour : $method => <pre>"; var_dump($value);echo "</pre><br>-->".PHP_EOL;
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
    // On vérifie qu'il s'agit bien d'un nombre
    if (is_int($int)) {
      $this->_editeurId = $int;
    }
  }

// Support , Plateforme, console
  public function setPlateforme($str) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 100 caractères.
    if (is_string($str) && strlen($str) <= 100) {
      $this->_plateforme = strip_tags($str);
    }
  }

  public function setPlateformeId(int $int) {
    // On vérifie qu'il s'agit bien d'un nombre
    if (is_int($int)) {
      $this->_plateformeId = $int;
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

  public function setJeuId(int $int) {
    // On vérifie qu'il s'agit bien d'un nombre
    if (is_int($int)) {
      $this->_jeuId = $int;
    }
  }

// JeuSupportId
  public function setJeuSupportId(int $int) {
    // On vérifie qu'il s'agit bien d'un nombre
    if (is_int($int)) {
      $this->_jeuSupportId = $int;
    }
  }

// JeuSupporDlctId
  public function setJeuSupportDlcId(int $int) {
    // On vérifie qu'il s'agit bien d'un nombre
    if (is_int($int)) {
      $this->_jeuSupportDlcId = $int;
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
  public function getEditeurId() { return $this->_editeurId; }
  public function getPlateforme() { return $this->_plateforme; }
  public function getPlateformeId() { return $this->_plateformeId; }
  public function getJeu() { return $this->_jeu; }
  public function getJeuId() { return $this->_jeuId; }
  public function getJeuSupportId() { return $this->_jeuSupportId; }
  public function getJeuSupportDlcId() { return $this->_jeuSupportDlcId; }
  public function getLien() { return $this->_lien; }
  
// retourne la date en timestamp
  public function getTimestamp() { return $this->_date; }

// retourne la date formaté: "d/m/Y" => 01/05/2015 ou "j/n/Y" => 1/5/2015 ou "Y-m-d" => 2015-05-01 
  public function getDate($format = "j/n/Y") {
	return date( $format , $this->_date );
  }

}
?>
