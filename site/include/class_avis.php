<?php
class avis {

  private $_id;
  private $_pseudo;
  private $_lavis;

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
  public function pseudo() { return $this->_pseudo; }
    public function lavis() { return $this->_lavis; }


  public function setId($id)
  {
    // L'identifiant du éditeur sera, quoi qu'il arrive, un nombre entier.
    $this->_id = (int) $id;
  }
        
  public function setPseudo($lavis) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 100 caractères.
    if (is_string($lavis) && strlen($lavis) >20 ) {
      $this->_lavis = $lavis;
    }
  }

  public function __construct(array $donnees) {
    $this->hydrate($donnees);
  }
}

?>
