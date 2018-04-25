<?php
class jeuManager  {

  private $_db; // Instance de PDO.

  public function add(jeu $game) {
    // Préparation de la requête d'insertion. Assignation des valeurs. Exécution de la requête.
    $q = $this->_db->prepare(
     'INSERT INTO jeux(nom, editeur_id, description, pegi, lien) VALUES(:nom, :editeur, :description, :pegi, :lien);');    
    $q->bindValue(':nom', $game->nom(), PDO::PARAM_STR);
    $q->bindValue(':editeur', $game->editeur(), PDO::PARAM_INT);    
    $q->bindValue(':description', $game->description(), PDO::PARAM_STR);
    $q->bindValue(':pegi', $game->pegi(), PDO::PARAM_INT);
    $q->bindValue(':lien', $game->lien(), PDO::PARAM_STR);
    $q->execute();
//var_dump($jeuid);
	  $jeuid = $this->_db->lastInsertId();
//var_dump($jeuid);
	foreach($game->support() as $idsupport => $tableau){
		$q = $this->_db->prepare('INSERT INTO jeux_has_support (Jeux_id, Support_id, DateSortie) VALUES(:jeuid, :Support_id, :DateSortie);');     
		$q->bindValue(':jeuid', $jeuid, PDO::PARAM_INT);    
		$q->bindValue(':Support_id', $idsupport, PDO::PARAM_INT);    
		$q->bindValue(':DateSortie', $tableau["date"], PDO::PARAM_STR);
		$q->execute();
	}
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

  public function getbyId($id){
    $id = (int) $id;
    $q = $this->_db->query('SELECT id, nom, editeur , description, pegi, lien, support FROM jeux WHERE id = '.$id);

    if (!$q) {return False; }
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    return new jeu($donnees);
  }    

    public function getListSimple() {
    // Retourne la liste de tous les jeux dans un tableau
    $result = [];
      $q = $this->_db->query('SELECT jeux.id as id, jeux.nom as jeux, editeur.nom as editeur, pegi, description, jeux.lien, support.nom as plateforme, jeux_has_support.DateSortie
      FROM jeux LEFT JOIN jeux_has_support ON jeux.id = jeux_has_support.Jeux_id
      JOIN editeur ON jeux.Editeur_id = editeur.id
      JOIN support ON jeux_has_support.Support_id = support.id
      ORDER by jeux.nom;');

      while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
      $result[] = $donnees;
    }
      return $result;
  }

  public function getList() {
    // Retourne la liste de tous les jeux dans un tableau d'objets jeu
    $jeux = [];
    $q = $this->_db->query('SELECT jeux.id, jeux.nom, jeux.Editeur_id as editeur, description, pegi, jeux.lien, Support_id as support
      FROM jeux INNER JOIN jeux_has_support ON jeux.id = jeux_has_support.Jeux_id 
      INNER JOIN support ON jeux_has_support.id = support.id
      ORDER BY jeux.nom;');

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
