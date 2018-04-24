<?php

class avisManager {

  private $_db; // Instance de PDO

  public function __construct($db){
    $this->setDb($db);
  }


  public function add(avis $avis){

  $q = $this->_db->prepare('INSERT INTO avis(pseudo) VALUES(:pseudo)');

  $q->bindValue(':pseudo', $avis->pseudo());
   $q->bindValue(':lavis', $avis->lavis());
  $q->execute();

  }


  public function delete(avis $avis){
    $this->_db->exec('DELETE FROM avis WHERE id = '.$avis->id());
  }


  public function get($id){
    $id = (int) $id;
    $q = $this->_db->query('SELECT id, pseudo,lavis FROM avis WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    return new Editeur($donnees);
  }


  public function getList(){
    $avis = [];
    $q = $this->_db->query('SELECT id, pseudo,avis FROM avis ORDER BY pseudo');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
      $avis[] = new avis($donnees);
    }

    return $avis;
  }


  public function update(avis $avis){
    $q = $this->_db->prepare('UPDATE avis SET lavis = :pseudo WHERE id = :id');

    $q->bindValue(':pseudo', $avis->pseudo(), PDO::PARAM_INT);
   
    $q->execute();
  }


  public function setDb(PDO $db){
    $this->_db = $db;
  }

}
