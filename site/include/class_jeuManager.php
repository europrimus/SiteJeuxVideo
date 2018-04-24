<?php
class jeuManager  {

  private $_db; // Instance de PDO.

  public function add(jeu $game) {
    // Préparation de la requête d'insertion. Assignation des valeurs. Exécution de la requête.
    $q = $this->_db->prepare(
     'INSERT INTO jeux(nom, Editeur_id, description, pegi, lien) VALUES(:nom, :editeur, :description, :pegi, :lien);
      INSERT INTO jeux_has_support (Jeux_id, Support_id, DateSortie) VALUES(LAST_INSERT_ID(), :Support_id, :DateSortie);');    
    $q->bindValue(':nom', $game->nom(), PDO::PARAM_STR);
    $q->bindValue(':editeur', $game->editeur(), PDO::PARAM_INT);    
    $q->bindValue(':description', $game->description(), PDO::PARAM_STR);
    $q->bindValue(':pegi', $game->pegi(), PDO::PARAM_INT);
    $q->bindValue(':lien', $game->lien(), PDO::PARAM_STR);
    $q->bindValue(':Support_id', $game->support(), PDO::PARAM_INT);    
    $q->bindValue(':DateSortie', $game->date(), PDO::PARAM_STR);
    $q->execute();
  }

  public function delete(jeu $game) {
    // Exécute une requête de type DELETE.
    $this->_db->exec('DELETE FROM jeux WHERE nom = '.$game->nom());
  }

  public function get($nom) {
    // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Jeu.
    $nom = (string) $nom;
    $q = $this->_db->query('SELECT id, nom, editeur, support, date, description FROM jeux WHERE nom = '.$nom);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    return new jeu($donnees);
    }

  public function getList() {
    // Retourne la liste de tous les jeux dans un tableau d'objets jeu
    $jeux = [];
    $q = $this->_db->query('SELECT * FROM jeux JOIN jeux_has_support ON jeux.id = jeux_has_support.Jeux_id ORDER BY nom');
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
      $jeux[] = new jeu($donnees);
    }
    return $jeux;
  }

  public function update(jeu $game) { 
    // Prépare une requête de type UPDATE. Assignation des valeurs à la requête. Exécution de la requête.
    $q = $this->_db->prepare('UPDATE jeux SET editeur = :editeur, support = :support, date = :date, description = :description WHERE nom = :nom');
    $q->bindValue(':editeur', $game->editeur(), PDO::PARAM_STR);
    $q->bindValue(':support', $game->support(), PDO::PARAM_STR);
    $q->bindValue(':date', $game->date(), PDO::PARAM_STR);
    $q->bindValue(':description', $game->description(), PDO::PARAM_STR);
    $q->execute();
  }

  public function setDb(PDO $db) {
    $this->_db = $db;
  }

  public function __construct($db) {
  $this->setDb($db);
  }
}
?>