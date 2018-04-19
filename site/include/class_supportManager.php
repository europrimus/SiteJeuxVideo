<?php

class supportManager {

  private $_db; // Instance de PDO

  public function __construct($db){
    $this->setDb($db);
  }


  public function add(Support $support){

  $q = $this->_db->prepare('INSERT INTO support(nom) VALUES(:nom)');

  $q->bindValue(':nom', $support->nom());
  $q->execute();

  }


  public function delete(Support $support){
    $this->_db->exec('DELETE FROM supportr WHERE id = '.$support->id());
  }


  public function get($id){
    $id = (int) $id;
    $q = $this->_db->query('SELECT id, nom FROM support WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    return new Editeur($donnees);
  }


  public function getList(){
    $support = [];
    $q = $this->_db->query('SELECT id, nom FROM support ORDER BY nom');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
      $editeurs[] = new Editeur($donnees);
    }

    return $support;
  }


  public function update(Support $support){
    $q = $this->_db->prepare('UPDATE support SET nom = :nom WHERE id = :id');

    $q->bindValue(':nom', $suppoort->nom(), PDO::PARAM_INT);
    $q->bindValue(':id', $support->id(), PDO::PARAM_INT);
    $q->execute();
  }


  public function setDb(PDO $db){
    $this->_db = $db;
  }

}
