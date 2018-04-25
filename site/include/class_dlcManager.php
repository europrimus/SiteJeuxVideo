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

/*
object(dlc)#3 (13) {
	["_nom":"dlc":private]=>  string(17) "Mon DLC PS et Wii"
	["_description":"dlc":private]=>  string(17) "Mon DLC PS et Wii"
	["_editeurId":"dlc":private]=>  int(1)
	["_jeuSupportId":"dlc":private]=>  int(2)
	["_date":"dlc":private]=>  int(1399275397)
}
 */ 
  public function add(dlc $objet){
	if(	$objet->getNom() ==! null AND 
		$objet->getDescription() ==! null AND 
		$objet->getEditeurId() ==! null AND 
		$objet->getJeuSupportId() ==! null AND 
		$objet->getDate() ==! null ){

//La table DLC
		$q = $this->_db->prepare('INSERT INTO `dlc`( `nom`, `description`, `editeur_id`, `lien`)
VALUES (:nom, :description, :editeur_id, :lien);');
		$q->bindValue( ':nom', $objet->getNom() );
		$q->bindValue( ':description', $objet->getDescription() );
		$q->bindValue( ':editeur_id', $objet->getEditeurId() );
		if($objet->getLien()){
			$q->bindValue( ':lien', $objet->getLien() );
		}else{
			$q->bindValue( ':lien', SITE["baseUrl"] );
		};
		if(!$q){echo "dlcManager > add : this->_db->prepare errorInfo():<pre>";var_dump($this->_db->errorInfo()); echo "</pre>";};
		$r=$q->execute();
		$objet->setId( $this->_db->lastInsertId() );
//echo "dlcManager > add() > objet : <pre>";var_dump($objet);echo "</pre>";

//La table jeuxsupportdlc
		$q = $this->_db->prepare('INSERT INTO `jeuxsupportdlc`( `id_jeuxsupport`, `id_dlc`, `datesortie`) 
VALUES (:id_jeuxsupport, :id_dlc, :datesortie);');
		if(!$q){echo "add : this->_db->prepare errorInfo():<pre>";var_dump($this->_db->errorInfo()); echo "</pre>";};
		$q->bindValue( ':id_jeuxsupport', $objet->getJeuSupportId(), PDO::PARAM_INT );
		$q->bindValue( ':id_dlc', $objet->getId(), PDO::PARAM_INT );
		$q->bindValue( ':datesortie', $objet->getDate("Y-m-d"), PDO::PARAM_STR );
//echo "dlcManager > add() > q : <pre>";var_dump($q);echo "</pre>";

		$r=$q->execute();
//echo "dlcManager > add() > r : <pre>";var_dump($r);echo "</pre>";

	return $r;
	};
  }

/*
[Wed Apr 25 10:01:26.323896 2018] [:error] [pid 3902] [client 172.29.100.121:57171] 
* PHP Fatal error:  Uncaught PDOException: SQLSTATE[HY093]: 
* Invalid parameter number: parameter was not defined in /home/didier/Documents/www/SiteJeuxVideo/site/include/class_dlcManager.php:74\n
* Stack trace:\n
* #0 /home/didier/Documents/www/SiteJeuxVideo/site/include/class_dlcManager.php(74): PDOStatement->execute()\n
* #1 /home/didier/Documents/www/SiteJeuxVideo/site/dlc/ajout_dlc.php(30): dlcManager->add(Object(dlc))\n
* #2 {main}\n  thrown in /home/didier/Documents/www/SiteJeuxVideo/site/include/class_dlcManager.php on line 74, referer: http://172.29.100.125/SiteJeuxVideo/site/dlc/creer.php


*/

// Lire - Read
// id , nom , description , editeur , editeurId , plateforme , plateformeId , jeu , jeuId , jeuSupportId , jeuSupportDlcId , lien , date

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
		jeux_has_support.id as jeuSupportId , 
		jeuxsupportdlc.id as jeuSupportDlcId , 
		dlc.lien, 
		jeuxsupportdlc.datesortie as date
FROM dlc 
		JOIN editeur ON editeur_id = editeur.id
        JOIN jeuxsupportdlc ON dlc.id = jeuxsupportdlc.id_dlc
		JOIN jeux_has_support ON jeuxsupportdlc.id_jeuxsupport = jeux_has_support.id
		JOIN support ON jeux_has_support.support_id = support.id
		JOIN jeux ON jeux.id = jeux_has_support.jeux_id
*/
  public function getFromNom($nom){
    if(!is_string($nom)){
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
		jeux_has_support.id as jeuSupportId , 
		jeuxsupportdlc.id as jeuSupportDlcId , 
		dlc.lien, 
		jeuxsupportdlc.datesortie as date
FROM dlc 
		JOIN editeur ON editeur_id = editeur.id AND dlc.nom = '.$nom.'
        JOIN jeuxsupportdlc ON dlc.id = jeuxsupportdlc.id_dlc
		JOIN jeux_has_support ON jeuxsupportdlc.id_jeuxsupport = jeux_has_support.id
		JOIN support ON jeux_has_support.support_id = support.id
		JOIN jeux ON jeux.id = jeux_has_support.jeux_id
		' );
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
		jeux_has_support.id as jeuSupportId , 
		jeuxsupportdlc.id as jeuSupportDlcId , 
		dlc.lien, 
		jeuxsupportdlc.datesortie as date
FROM dlc 
		JOIN editeur ON editeur_id = editeur.id AND dlc.id = '.$id.'
        JOIN jeuxsupportdlc ON dlc.id = jeuxsupportdlc.id_dlc
		JOIN jeux_has_support ON jeuxsupportdlc.id_jeuxsupport = jeux_has_support.id
		JOIN support ON jeux_has_support.support_id = support.id
		JOIN jeux ON jeux.id = jeux_has_support.jeux_id
		');
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return new dlc($donnees);
	};
  }


  public function getFind($recherche,$debut=0,$fin=10){
    if(!is_string($recherche,$debut=0,$fin=10)){
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
		//$donnees = $q->fetch(PDO::FETCH_ASSOC);
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
		  //echo "function getList , donnees : <pre>";var_dump($donnees);echo "</pre>";
		  $liste[] = new dlc($donnees);
		};
		return new dlc($liste);
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
		jeux_has_support.id as jeuSupportId , 
		jeuxsupportdlc.id as jeuSupportDlcId , 
		dlc.lien, 
		jeuxsupportdlc.datesortie as date
FROM dlc 
		JOIN editeur ON editeur_id = editeur.id
        JOIN jeuxsupportdlc ON dlc.id = jeuxsupportdlc.id_dlc
		JOIN jeux_has_support ON jeuxsupportdlc.id_jeuxsupport = jeux_has_support.id
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

// regarde si existe dans la base
  public function existeNom($nom){
    if(is_string($nom)){

		$q = $this->_db->query('SELECT COUNT( dlc.id ) FROM dlc WHERE dlc.nom = "'.$nom.'" GROUP BY dlc.id');
		if($q->fetch() == 0){
			echo "pas trouvé \"$nom\" donc création<br>";
			return False;
		}else{
			echo "trouvé $nom<br>";
			return True;
		};
	}else{
		echo "Pas une chaine de texte : $nom<br>";
		return True;
	};
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
    $this->_db->exec('DELETE FROM jeuxsupportdlc WHERE jeuxsupportdlc.id_dlc = '.$objet->getId().';
    DELETE FROM dlc WHERE id = '.$objet->getId());
  }


}
