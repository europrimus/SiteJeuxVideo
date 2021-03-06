<?php
class editeur {

  private $_id;
  private $_nom;

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



  public function setId($id)
  {
    // L'identifiant du éditeur sera, quoi qu'il arrive, un nombre entier.
    $this->_id = (int) $id;
  }
        
  public function setNom($nom) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 100 caractères.
    if (is_string($nom) && strlen($nom) <= 100) {
      $this->_nom = strip_tags($nom);
    }
  }

  public function __construct(array $donnees) {
    $this->hydrate($donnees);
  }
}

?>
