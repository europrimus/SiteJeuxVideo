<?php

class dlcManager {

// les variables
// privées
  private $_db; // Instance de PDO

// publiques
//rien, tout est privées

// les fonctions:
// le constructeur
  public function __construct($db){
    // pas besoin d'une fonction, la base ne sera jamais modifier en cour d'objet
    $this->_db = $db;
  }


// Fonction de base de données
// écrit
  public function add(dlc $objet){
	if( $objet->getNom() ==! null AND $objet->getJeu() ==! null AND $objet->getEditeur() ==! null AND $objet->getConsole() ==! null AND $objet->getTimestamp() ==! null )

/*
INSERT INTO DLC(nom, Description, Editeur_id )
SELECT "Test DLC2", "un DLC de test", Editeur.id 
    FROM Editeur WHERE Editeur.nom = 'Infogrames';

INSERT INTO Jeux_has_Support(Jeux_id, Support_id, DLC_id)
SELECT Jeux.id , Support.id,  LAST_INSERT_ID() 
	FROM Jeux_has_Support
    JOIN Jeux ON Jeux_has_Support.Jeux_id=Jeux.id AND Jeux.nom="Endless ocean"
    JOIN Support ON Jeux_has_Support.Support_id=Support.id AND Support.nom="Wii"
*/

  $q = $this->_db->prepare('INSERT INTO DLC(nom, Description, Editeur_id ) 
SELECT :nom, :description, Editeur.id
	FROM Editeur WHERE Editeur.nom = :editeur_nom

INSERT INTO Jeux_has_Support(Jeux_id, Support_id, DLC_id, DateSortie)
SELECT Jeux.id , Support.id, LAST_INSERT_ID(), :date
	FROM Jeux_has_Support
    JOIN Jeux ON Jeux_has_Support.Jeux_id=Jeux.id AND Jeux.nom=:jeuNom
    JOIN Support ON Jeux_has_Support.Support_id=Support.id AND Support.nom=:supportNom
');
  $q->bindValue( ':nom', $objet->getNom() );
  $q->bindValue( ':description', $objet->getDescription() );
  $q->bindValue( ':editeur_nom', $objet->getEditeur() );
  $q->bindValue( ':date', $objet->getTimestamp() );
  $q->bindValue( ':jeuNom', $objet->getJeu() );
  $q->bindValue( ':supportNom', $objet->getConsole() );
  $r=$q->execute();
  return $r;
  }


  public function delete(dlc $objet){
    $this->_db->exec('DELETE FROM Editeur WHERE id = '.$objet->id());
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


  public function update(dlc $editeur){
    $q = $this->_db->prepare('UPDATE Editeur SET nom = :nom WHERE id = :id');

    $q->bindValue(':id', $editeur->id(), PDO::PARAM_INT);
    $q->bindValue(':nom', $editeur->nom(), PDO::PARAM_STR);
    $q->execute();
  }


}
