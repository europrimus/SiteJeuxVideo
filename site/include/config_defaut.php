<?php
/*
Renommer le fichier en config.php et éditer les infos relatives au serveur.
*/

/*
 * Configuration de la base de données
 */

/** Nom */
define('DB_NAME', 'jeuxVideo');

/** Utilisateur */
define('DB_USER', '');

/** Mot de passe */
define('DB_PASSWORD', '');

/** adresse */
define('DB_HOST', 'localhost');

/** encodage */
define('DB_CHARSET', 'utf8_general_ci');


/*
 * Configuration du site
 */
define('SITE', array(
"titreComplet" => "La base de données des Jeux Video", 			// Le nom complet du site
"TitreCourt" => "LBDJV",										// Le nom court, pour la balise <title>
"installDir" => "Le répertoire d'installation coté serveur",	// Le répertoire d'installation coté serveur
"baseUrl" => "l'url du site visible par l'utilisateur",			// l'url du site visible par l'utilisateur
 ) );



/*
 * Ne rien modifier sous cette ligne
 */
// ajoute le chemion de recherche des class
set_include_path(get_include_path() . PATH_SEPARATOR .SITE["installDir"].'include/');


// Charger les classes automatique si nécessaire
function chargerClasse($class){
	// echo "chargerClasse : $class";
	require 'class_'.$class.'.php';
}

// On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.
spl_autoload_register('chargerClasse'); 

?>
