<?php
class avis {

  private $_id;
  private $_id_DLC;
  private $_id_JeuxSupport;
  private $_id_Testes;
  private $_texte;
  private $_id_Utilisateur;
  private $_id_date;
  

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
  public function id_dlc() { return $this->_id_DLC; }
  public function id_JeuxSupport() { return $this->_id_JeuxSupport; }
  public function id_Testes() { return $this->_id_Testes; }
  public function texte() { return $this->_texte; }
  public function idUtilisateur() { return $this->_idUtilisateur; }
  public function date { return $this->_date; }


  public function setId($id)
  {
    // L'identifiant du éditeur sera, quoi qu'il arrive, un nombre entier.
    $this->_id = (int) $id;
  }
    public function setIdDLC($id_DLC)
  {
    // L'identifiant du éditeur sera, quoi qu'il arrive, un nombre entier.
    $this->_DLC = (int) $id_DLC;
  }
   
    public function setId_JeuxSupport($id_JeuxSupport)
  {
    // L'identifiant du éditeur sera, quoi qu'il arrive, un nombre entier.
    $this->_JeuxSupport = (int) $id_JeuxSuport;
  }
       public function setId_Testest($id_Testes)
  {
    // L'identifiant du éditeur sera, quoi qu'il arrive, un nombre entier.
    $this->_Testes = (int) $id_Testest;
  }
  
   public function setTexte($Texte) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 500 caractères.
    if (is_string($Texte) && strlen($IdUtilisateur) >500 ) {
      $this->_IdUtlisateur = $IdUtilisateut;
    }
  }
        
  public function setIdUtilisateur($IdUtilisateur) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 100 caractères.
    if (is_string($IdUtilisateur) && strlen($IdUtilisateur) >20 ) {
      $this->_IdUtlisateur = $IdUtilisateut;
    }
  }
  public function setDateSortie($DateSortie) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 10 caractères.
    if (is_string($DateSortie) && strlen($DateSortie) <= 10) {
      $this->_DateSortie = $DateSortie;
    }
  }
  
  
  
  
  

  public function __construct(array $donnees) {
    $this->hydrate($donnees);
  }
}

?>
