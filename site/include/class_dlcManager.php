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


/*
`DLC` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Editeur_id` int(11) NOT NULL,
  `DateSortie` date NOT NULL,
  `id_JeuxSupport` int(11) NOT NULL,
  `lien` varchar(250)
  * 
  *   `id` , `nom` , `Description` ,  `Editeur_id` ,  `DateSortie` ,  `id_JeuxSupport` ,  `lien` 
*/

// Fonction de base de données
// écrit - Create
  public function add(dlc $objet){
	if( $objet->getNom() ==! null AND $objet->getDescription() ==! null AND $objet->getJeuId() ==! null AND $objet->getEditeurId() ==! null AND $objet->getJeuSupportId() ==! null AND $objet->getgetDate() ==! null )

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

  $q = $this->_db->prepare('INSERT INTO DLC(nom, Description, Editeur_id, DateSortie, id_JeuxSupport, lien) 
 :nom, :description, :editeurId, :dateSortie, :jeuxSupportId, :lien');
  $q->bindValue( ':nom', $objet->getNom() );
  $q->bindValue( ':description', $objet->getDescription() );
  $q->bindValue( ':editeurId', $objet->getEditeurId() );
  $q->bindValue( ':dateSortie', $objet->getgetDate("Y/m/d") );
  $q->bindValue( ':jeuxSupportId', $objet->getJeuSupportId() );
  $q->bindValue( ':lien', $objet->getLien() );
  $r=$q->execute();
  return $r;
  }

// Lire - Read
// id , nom , description , editeur , editeurId , plateforme , plateformeId , jeu , jeuId , jeuSupportId , lien , date

/*
SELECT 
		DLC.id as id ,
		DLC.nom as nom, 
		DLC.Description as description , 
		Editeur.nom as editeur, 
		DLC.Editeur_id as editeurId, 
		Support.nom as plateforme, 
		Support.id as plateformeId, 
		Jeux.nom as jeu, 
		Jeux.id as jeuId, 
		DLC.id_JeuxSupport as jeuSupportId , 
		DLC.lien, 
		DLC.DateSortie as date
FROM DLC 
		JOIN Editeur ON Editeur_id = Editeur.id
		JOIN Jeux_has_Support ON id_JeuxSupport = Jeux_has_Support.id
		JOIN Support ON Jeux_has_Support.Support_id = Support.id
		JOIN Jeux ON Jeux.id = Jeux_has_Support.Jeux_id
 */
  public function getFromNom($nom){
    if(!is_string($nom)){
		return False;
	}else{
		$q = $this->_db->query('SELECT 
		DLC.id as id,
		DLC.nom as nom, 
		DLC.Description as description, 
		Editeur.nom as editeur, 
		DLC.Editeur_id as editeurId, 
		Support.nom as plateforme, 
		Support.id as plateformeId, 
		Jeux.nom as jeu, 
		Jeux.id as jeuId, 
		DLC.id_JeuxSupport as jeuSupportId, 
		DLC.lien, 
		DLC.DateSortie as date
	FROM DLC 
		JOIN Editeur ON DLC.Editeur_id = Editeur.id AND DLC.nom = '.$nom.'
		JOIN Jeux_has_Support ON id_JeuxSupport = Jeux_has_Support.id
		JOIN Support ON Jeux_has_Support.Support_id = Support.id
		JOIN Jeux ON Jeux.id = Jeux_has_Support.Jeux_id' );
		var_dump($q);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return new dlc($donnees);
	};
  }

  public function getFind($recherche,$debut=0,$fin=10){
    if(!is_string($recherche)){
		return False;
	}else{
		$q = $this->_db->query('SELECT 
		DLC.id as id ,
		DLC.nom as nom, 
		DLC.Description as description , 
		Editeur.nom as editeur, 
		DLC.Editeur_id as editeurId, 
		Support.nom as plateforme, 
		Support.id as plateformeId, 
		Jeux.nom as jeu, 
		Jeux.id as jeuId, 
		DLC.id_JeuxSupport as jeuSupportId , 
		DLC.lien, 
		DLC.DateSortie as date
	FROM DLC 
		JOIN Editeur ON Editeur_id = DLC.Editeur.id LIKE DLC.nom = %'.$recherche.'% OR LIKE DLC.Description = %'.$recherche.'%
		JOIN Jeux_has_Support ON id_JeuxSupport = Jeux_has_Support.id
		JOIN Support ON Jeux_has_Support.Support_id = Support.id
		JOIN Jeux ON Jeux.id = Jeux_has_Support.Jeux_id
		LIMIT '.$debut.' , '.$fin);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return new dlc($donnees);
	};
  }

  public function getFromId($id){
    if(!is_int($id)){
		return False;
	}else{
		$q = $this->_db->query('SELECT 
		DLC.id as id ,
		DLC.nom as nom, 
		DLC.Description as description , 
		Editeur.nom as editeur, 
		DLC.Editeur_id as editeurId, 
		Support.nom as plateforme, 
		Support.id as plateformeId, 
		Jeux.nom as jeu, 
		Jeux.id as jeuId, 
		DLC.id_JeuxSupport as jeuSupportId , 
		DLC.lien, 
		DLC.DateSortie as date
	FROM DLC 
		JOIN Editeur ON DLC.Editeur_id = Editeur.id AND DLC.id = '.$id.'
		JOIN Jeux_has_Support ON id_JeuxSupport = Jeux_has_Support.id
		JOIN Support ON Jeux_has_Support.Support_id = Support.id
		JOIN Jeux ON Jeux.id = Jeux_has_Support.Jeux_id');
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return new dlc($donnees);
	};
  }


  public function getList($debut=0,$fin=10){
    if(is_int($debut) AND is_int($fin)){
		$liste = [];
		$q = $this->_db->query('SELECT 
		DLC.id as id ,
		DLC.nom as nom, 
		DLC.Description as description , 
		Editeur.nom as editeur, 
		DLC.Editeur_id as editeurId, 
		Support.nom as plateforme, 
		Support.id as plateformeId, 
		Jeux.nom as jeu, 
		Jeux.id as jeuId, 
		DLC.id_JeuxSupport as jeuSupportId , 
		DLC.lien, 
		DLC.DateSortie as date
	FROM DLC 
		JOIN Editeur ON Editeur_id = Editeur.id
		JOIN Jeux_has_Support ON id_JeuxSupport = Jeux_has_Support.id
		JOIN Support ON Jeux_has_Support.Support_id = Support.id
		JOIN Jeux ON Jeux.id = Jeux_has_Support.Jeux_id LIMIT '.$debut.' , '.$fin);

		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
		  //echo "function getList , donnees : <pre>";var_dump($donnees);echo "</pre>";
		  $liste[] = new dlc($donnees);
		};
	}else{
		$liste=false;
	};
	//echo "function getList , liste : <pre>";var_dump($liste);echo "</pre>";
    return $liste;
  }

// Mise à jour - Update
  public function update(dlc $objet){
    $q = $this->_db->prepare('UPDATE DLC SET nom = :nom WHERE id = :id');

    $q->bindValue(':id', $objet->id(), PDO::PARAM_INT);
    $q->bindValue(':nom', $objet->nom(), PDO::PARAM_STR);
    $q->execute();
  }


// Supprime - Delete
  public function delete(dlc $objet){
    $this->_db->exec('DELETE FROM DLC WHERE id = '.$objet->id());
  }


}
