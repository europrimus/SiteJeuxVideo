<?php
class jeu {

  private $_id;
  private $_nom;
  private $_editeur;
  private $_support;
  private $_date;
  private $_description;

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
  public function date() { return $this->_date; }
  public function description() { return $this->_description; }

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
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 100 caractères.
    if (is_string($editeur) && strlen($editeur) <= 100) {
      $this->_editeur = $editeur;
    }
  }

  public function setSupport($support) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 100 caractères.
    if (is_string($support) && strlen($support) <= 100) {
      $this->_support = $support;
    }
  }

  public function setDate($date) {
    // On vérifie qu'il s'agit bien d'une date.
    $this->_date = $date;

  }

  public function setDescription($description) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 100 caractères.
    if (is_string($description) && strlen($description) <= 100) {
      $this->_description = $description;
    }
  }

  public function __construct(array $donnees) {
    $this->hydrate($donnees);
  }
}
?>