<?php
class jeu {

  private $_id;
  private $_nom;
  private $_editeur;  // ID de l'éditeur !!!!!!!
  private $_description;
  private $_pegi;
  private $_lien;
  private $_support;	// un tableau array( idsupport => array ("id"=>id, "nom"=>nom, "date"=>date ) )
//  private $_date;		// passé dans le support



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

  public function id() { return $this->_id; }
  public function nom() { return $this->_nom; }
  public function editeur() { return $this->_editeur; }
  public function support() { return $this->_support; }
/*  public function date() { return $this->_date; }*/
  public function description() { return $this->_description; }
  public function pegi() { return $this->_pegi; }
  public function lien() { return $this->_lien; }

  public function setId($id)
  {
    $this->_id = (int) $id;
  }
        
  public function setNom($nom) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 100 caractères.
    if (is_string($nom) && strlen($nom) <= 100) {
      $this->_nom = $nom;
    }
  }

  public function setEditeur($editeur) {
    $this->_editeur = (int) $editeur;
  }

/*  public function setSupportStr($support) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 100 caractères.
    if (is_string($support) && strlen($support) <= 100) {
      $this->_support = $support;
    }
  }*/

  public function setSupport($array) {
	//array( idsupport => "id"=>id, "nom"=>nom, "date"=>date )
    // On vérifie qu'il s'agit bien d'un tableau
    if ( is_array($array) ) {
		foreach($array as $key => $val){
			if( is_int($key) AND isset($val["date"]) ){
				$retour[$key]=array( "id"=>$key, "nom"=>$val["nom"],"date"=>$val["date"] );
			}
		}
      $this->_support = $retour;
    }
  }

/*  public function setDate($date) {
    // On vérifie qu'il s'agit bien d'une date.
    $this->_date = $date;

  }*/

  public function setDescription($description) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 500 caractères.
    if (is_string($description) && strlen($description) <= 500) {
      $this->_description = $description;
    }
  }

  public function setPegi($pegi) {
    $this->_pegi = (int) $pegi;
  }

  public function setLien($lien) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 250 caractères.
    if (is_string($lien) && strlen($lien) <= 250) {
      $this->_lien = $lien;
    }
  }  

  public function __construct(array $donnees) {
    $this->hydrate($donnees);
  }
}
?>
