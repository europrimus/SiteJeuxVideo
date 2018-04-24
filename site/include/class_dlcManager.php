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
`dlc` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `editeur_id` int(11) NOT NULL,
  `datesortie` date NOT NULL,
  `id_jeuxsupport` int(11) NOT NULL,
  `lien` varchar(250)
  * 
  *   `id` , `nom` , `description` ,  `editeur_id` ,  `datesortie` ,  `id_jeuxsupport` ,  `lien` 
*/

// Fonction de base de données
// écrit - Create
  public function add(dlc $objet){
	if(	$objet->getNom() ==! null AND 
		$objet->getDescription() ==! null AND 
		$objet->getJeuId() ==! null AND 
		$objet->getEditeurId() ==! null AND 
		$objet->getJeuSupportId() ==! null AND 
		$objet->getgetDate() ==! null )

  $q = $this->_db->prepare('INSERT INTO dlc(nom, description, editeur_id, datesortie, id_jeuxsupport, lien) 
 VALUE (:nom, :description, :editeurId, :dateSortie, :jeuxSupportId, :lien)');
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
		dlc.id as id ,
		dlc.nom as nom, 
		dlc.Description as description , 
		editeur.nom as editeur, 
		dlc.editeur_id as editeurId, 
		support.nom as plateforme, 
		support.id as plateformeId, 
		jeux.nom as jeu, 
		jeux.id as jeuId, 
		dlc.id_jeuxsupport as jeuSupportId , 
		dlc.lien, 
		dlc.datesortie as date
FROM dlc 
		JOIN editeur ON editeur_id = editeur.id
		JOIN jeux_has_support ON id_jeuxsupport = jeux_has_support.id
		JOIN support ON jeux_has_support.support_id = support.id
		JOIN jeux ON jeux.id = jeux_has_support.jeux_id
 */
  public function getFromNom($nom){
    if(!is_string($nom)){
		return False;
	}else{
		$q = $this->_db->query('SELECT 
		dlc.id as id,
		dlc.nom as nom, 
		dlc.description as description, 
		editeur.nom as editeur, 
		dlc.editeur_id as editeurId, 
		support.nom as plateforme, 
		support.id as plateformeId, 
		jeux.nom as jeu, 
		jeux.id as jeuId, 
		dlc.id_Jeuxsupport as jeuSupportId, 
		dlc.lien, 
		dlc.datesortie as date
	FROM dlc 
		JOIN editeur ON dlc.editeur_id = editeur.id AND dlc.nom = '.$nom.'
		JOIN jeux_has_support ON id_jeuxsupport = jeux_has_support.id
		JOIN support ON jeux_has_support.support_id = support.id
		JOIN jeux ON jeux.id = jeux_has_support.jeux_id' );
		//echo "getFromNom($nom):<pre>";var_dump($q);echo "</pre>";
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return new dlc($donnees);
	};
  }

  public function getFromId($id){
    $id = intval($id);
    if(!is_int($id)){
		return False;
	}else{
		$q = $this->_db->query('SELECT 
		dlc.id as id ,
		dlc.nom as nom, 
		dlc.Description as description , 
		editeur.nom as editeur, 
		dlc.editeur_id as editeurId, 
		support.nom as plateforme, 
		support.id as plateformeId, 
		jeux.nom as jeu, 
		jeux.id as jeuId, 
		dlc.id_jeuxsupport as jeuSupportId , 
		dlc.lien, 
		dlc.datesortie as date
	FROM dlc 
		JOIN editeur ON dlc.editeur_id = editeur.id AND dlc.id = '.$id.'
		JOIN jeux_has_support ON id_jeuxsupport = jeux_has_support.id
		JOIN support ON jeux_has_support.support_id = support.id
		JOIN jeux ON jeux.id = jeux_has_support.jeux_id');
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return new dlc($donnees);
	};
  }


  public function getFind($recherche,$debut=0,$fin=10){
    if(!is_string($recherche)){
		return False;
	}else{
		$q = $this->_db->query('SELECT 
		dlc.id as id ,
		dlc.nom as nom, 
		dlc.Description as description , 
		editeur.nom as editeur, 
		dlc.editeur_id as editeurId, 
		support.nom as plateforme, 
		support.id as plateformeId, 
		jeux.nom as jeu, 
		jeux.id as jeuId, 
		dlc.id_jeuxsupport as jeuSupportId , 
		dlc.lien, 
		dlc.datesortie as date
	FROM dlc 
		JOIN editeur ON editeur_id = dlc.editeur.id LIKE dlc.nom = %'.$recherche.'% OR LIKE dlc.description = %'.$recherche.'%
		JOIN jeux_has_Support ON id_JeuxSupport = jeux_has_support.id
		JOIN support ON jeux_has_support.Support_id = support.id
		JOIN jeux ON jeux.id = jeux_has_support.jeux_id
		LIMIT '.$debut.' , '.$fin);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return new dlc($donnees);
	};
  }


  public function getList($debut=0,$fin=10){
    if(is_int($debut) AND is_int($fin)){
		$liste = [];
		$q = $this->_db->query('SELECT 
		dlc.id as id ,
		dlc.nom as nom, 
		dlc.Description as description , 
		editeur.nom as editeur, 
		dlc.editeur_id as editeurId, 
		support.nom as plateforme, 
		support.id as plateformeId, 
		jeux.nom as jeu, 
		jeux.id as jeuId, 
		dlc.id_jeuxsupport as jeuSupportId , 
		dlc.lien, 
		dlc.datesortie as date
	FROM dlc 
		JOIN editeur ON editeur_id = editeur.id
		JOIN jeux_has_support ON id_jeuxsupport = jeux_has_support.id
		JOIN support ON jeux_has_support.support_id = support.id
		JOIN jeux ON jeux.id = jeux_has_support.jeux_id LIMIT '.$debut.' , '.$fin);

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
    $q = $this->_db->prepare('UPDATE dlc SET nom = :nom WHERE id = :id');

    $q->bindValue(':id', $objet->id(), PDO::PARAM_INT);
    $q->bindValue(':nom', $objet->nom(), PDO::PARAM_STR);
    $q->execute();
  }


// Supprime - Delete
  public function delete(dlc $objet){
    $this->_db->exec('DELETE FROM dlc WHERE id = '.$objet->getId());
  }


}
