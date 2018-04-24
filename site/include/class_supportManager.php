<?php

class supportManager {

  private $_db; // Instance de PDO

  public function __construct($db){
    $this->setDb($db);
  }


  public function add(Support $support){

  $q = $this->_db->prepare('INSERT INTO support(nom,DateSortie) VALUES(:nom, :DateSortie)');

  $q->bindValue(':nom', $support->nom());
  $q->bindValue(':DateSortie' ,$support->DateSortie());
  $q->execute();

  }


  public function delete(Support $support){
    $this->_db->exec('DELETE FROM support WHERE id = '.$support->id());
  }


  public function get($id){
    $id = (int) $id;
    $q = $this->_db->query('SELECT id, nom , DateSortie FROM support WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    return new support($donnees);
  }
  
    public function getNom($nom){
    $nom =(string) $nom;
    $q = $this->_db->query('SELECT id, nom , DateSortie FROM support WHERE nom = "'.$nom.'"');
    //var_dump($q);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    return new support($donnees);
  }

public function getDateSortie($DateSortie){
    $DateSortie =(string) $DateSortie;
    $q = $this->_db->query('SELECT id, nom , DateSortie FROM support WHERE DateSortie = "'.$DateSortie.'"');
    //var_dump($q);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    return new support($donnees);
  }

  public function getList(){
    $support = [];
    $q = $this->_db->query('SELECT id, nom, DateSortie FROM support ORDER BY nom');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
      $support[] = new support($donnees);
    }

    return $support;
  }


  public function update(Support $support){
    $q = $this->_db->prepare('UPDATE support SET nom  = :nom, DateSortie = :DateSortie WHERE id = :id');
echo'<pre>';
var_dump($support);
echo'</pre>';
	$q->bindValue(':id', $support->id(), PDO::PARAM_INT);
    $q->bindValue(':nom', $support->nom(), PDO::PARAM_STR);
    $q->bindValue(':DateSortie', $support->DateSortie());//, PDO::PARAM_STR);
$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
    $q->execute();
echo'<pre>';
var_dump($q);
$q->errorInfo();
echo'</pre>';    
  }


  public function setDb(PDO $db){
    $this->_db = $db;
  }

}
