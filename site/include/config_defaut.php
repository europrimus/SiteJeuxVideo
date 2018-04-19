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
"titreComplet" => "La base de données des Jeux Video", 
"TitreCourt" => "LBDJV",
"installDir" => "/home/didier/Documents/www/SiteJeuxVideo/site/",
 ) );

?>
