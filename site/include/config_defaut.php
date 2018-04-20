<?php
/*
Renommer le fichier en config.php et éditer les infos relatives au serveur.
*/

/*
 * Configuration de la base de données
 */

/** Nom */
$DB['NAME'] = 'jeuxVideo';

/** Utilisateur */
$DB['USER'] = '';

/** Mot de passe */
$DB['PASSWORD'] = '';

/** adresse */
$DB['HOST'] = 'localhost';

/** encodage */
$DB['CHARSET'] = 'utf8';

/** Typez de base de données */
$DB['TYPE'] = 'mysql';

/*
 * Configuration du site
 */
define('SITE', array(
// Le nom complet du site
"titreComplet" => "La base de données des Jeux Video",
// Le nom court, pour la balise <title>
"TitreCourt" => "LBDJV",
// Le répertoire d'installation coté serveur avec le / ou \ de fin
"installDir" => "",
// l'url du site visible par l'utilisateur avec le / de début et de fin
"baseUrl" => "/siteJeuxVideo/",
 ) );



/*
 * Ne rien modifier sous cette ligne
 */

/*
 * La gestion automatique des class
 */
// ajoute le chemion de recherche des class
set_include_path(get_include_path() . PATH_SEPARATOR .SITE["installDir"].'include'.DIRECTORY_SEPARATOR);

// Charger les classes automatique si nécessaire
function chargerClasse($class){
	// echo "chargerClasse : $class";
	require 'class_'.$class.'.php';
}

// On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.
spl_autoload_register('chargerClasse'); 


/*
 * La connexion à la base de données
 * renvoi un objet PDO $db
 */

// Connexion à la base de données
$db = new PDO($DB['TYPE'].':host='.$DB['HOST'].';dbname='.$DB['NAME'].'charset='.$DB['CHARSET', $DB['USER'], $DB['PASSWORD']);

// on supprime la config de la basse de données
unset($DB);
?>
