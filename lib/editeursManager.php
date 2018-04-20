<?php
require('editeur.php');
class EditeursManager {

  private $_db; // Instance de PDO

  public function __construct($db){
    $this->setDb($db);
  }


  public function add(Editeur $editeur){

  $q = $this->_db->prepare('INSERT INTO editeur(nom) VALUES(:nom)');

  $q->bindValue(':nom', $editeur->nom());
  $q->execute();

  }


  public function delete(Editeur $editeur){
    $this->_db->exec('DELETE FROM editeur WHERE id = '.$editeur->id());
  }


  public function get($nom){
    $nom = (int) $nom;
    $q = $this->_db->query('SELECT id, nom FROM editeur WHERE nom = '.$nom);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    return new Editeur($donnees);
  }


  public function getList(){
    $editeurs = [];
    $q = $this->_db->query('SELECT id, nom FROM editeur ORDER BY nom');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
      $editeurs[] = new Editeur($donnees);
    }

    return $editeurs;
  }


  public function update(Editeur $editeur){
    $q = $this->_db->prepare('UPDATE editeur SET nom = :nom WHERE id = :id');

    $q->bindValue(':id', $editeur->id(), PDO::PARAM_INT);
    $q->bindValue(':nom', $editeur->nom(), PDO::PARAM_STR);
    $q->execute();
  }


  public function setDb(PDO $db){
    $this->_db = $db;
  }

}

