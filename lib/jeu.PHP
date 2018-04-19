<?php

<?php
class jeu
{
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
    // L'identifiant du personnage sera, quoi qu'il arrive, un nombre entier.
    $this->_id = (int) $id;
  }
        
  public function setNom($nom) {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 30 caractères.
    if (is_string($nom) && strlen($nom) <= 30) {
      $this->_nom = $nom;
    }
  }

  public function setEditeur($editeur)
  {
    $forcePerso = (int) $forcePerso;
            
    // On vérifie que la force passée est comprise entre 0 et 100.
    if ($forcePerso >= 0 && $forcePerso <= 100)
    {
      $this->_forcePerso = $forcePerso;
    }
  }

  public function setSupport($support)
  {
    $degats = (int) $degats;

    // On vérifie que les dégâts passés sont compris entre 0 et 100.
    if ($degats >= 0 && $degats <= 100)
    {
      $this->_degats = $degats;
    }
  }

  public function setDate($date)
  {
    $niveau = (int) $niveau;

    // On vérifie que le niveau n'est pas négatif.
    if ($niveau >= 0)
    {
      $this->_niveau = $niveau;
    }
  }

  public function setDescription($description)
  {
    $exp = (int) $exp;

    // On vérifie que l'expérience est comprise entre 0 et 100.
    if ($exp >= 0 && $exp <= 100)
    {
      $this->_experience = $exp;
    }
  }
}




?>