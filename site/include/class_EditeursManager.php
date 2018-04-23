<?php

class EditeursManager {

  private $_db; // Instance de PDO

  public function __construct($db){
    $this->setDb($db);
  }


  public function add(Editeur $editeur){

  $q = $this->_db->prepare('INSERT INTO Editeur(nom) VALUES(:nom)');

  $q->bindValue(':nom', $editeur->nom());
  $q->execute();

  }


  public function delete(Editeur $editeur){
    $this->_db->exec('DELETE FROM Editeur WHERE id = '.$editeur->id());
  }


  public function get($nom){
    $nom = (int) $nom;
    $q = $this->_db->query('SELECT id, nom FROM Editeur WHERE nom = '.$nom);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    return new Editeur($donnees);
  }


  public function getList(){
    $editeurs = [];
    $q = $this->_db->query('SELECT id, nom FROM Editeur ORDER BY nom');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
      $editeurs[] = new Editeur($donnees);
    }

    return $editeurs;
  }


  public function update(Editeur $editeur){
    $q = $this->_db->prepare('UPDATE Editeur SET nom = :nom WHERE id = :id');

    $q->bindValue(':nom', $editeur->nom(), PDO::PARAM_STR);
    $q->execute();
  }


  public function setDb(PDO $db){
    $this->_db = $db;
  }

}
