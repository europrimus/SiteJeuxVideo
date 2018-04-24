<?php
class jeuManager  {

  private $_db; // Instance de PDO.

  public function add(jeu $game) {
    // Préparation de la requête d'insertion. Assignation des valeurs. Exécution de la requête.
    $q = $this->_db->prepare(
     'INSERT INTO jeux(nom, Editeur_id, description, pegi, lien) VALUES(:nom, :editeur, :description, :pegi, :lien);');    
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

  public function getList() {
    // Retourne la liste de tous les jeux dans un tableau d'objets jeu
    $jeux = [];
    $q = $this->_db->query('SELECT * FROM jeux JOIN jeux_has_support ON jeux.id = jeux_has_support.Jeux_id ORDER BY nom');
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
      var_dump($donnees);
      $manager = new EditeursManager($this->_db);
      $editeurs = $manager->getbyId($donnees['Editeur_id']);


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
