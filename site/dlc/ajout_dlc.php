<?php
// charge la configuration et renvoi un objet PDO $db
require('../include/config.php');

$page = new Page("Ajout d'un DLC");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");
/*
 * les variable de l'objet DLC
 * "id","nom","description","editeur","editeurId","plateforme","plateformeId","jeu","jeuId","jeuSupportId","jeuSupportDlcId","lien","date"
 */ 

//echo "post: <pre>";var_dump($_POST);echo "</pre>";

$dlcnew=new dlc($_POST);
foreach($_POST["jeuxSupport"] as $jeuxSupportId => $val){
	//echo "jeuxSupportId : $jeuxSupportId<br>date : ".$_POST["date_sortie"][$jeuxSupportId]."<br>";
	$dlcnew->setJeuSupportId($jeuxSupportId);
	$dlcnew->setDate($_POST["date_sortie"][$jeuxSupportId]);
}

echo "dlcnew: <pre>";var_dump($dlcnew);echo "</pre>";


// On vérifie que le nom a été tapé par l'utilisateur
if(!empty($dlcnew->getNom())){
	$manager = new dlcManager($db);
	if( !$manager->existeNom($dlcnew->getNom()) ){
		$manager->add($dlcnew);
		
		echo "Le DLC <strong>". $dlcnew->getNom() ."</strong> a été ajouté avec succès";
	}else{
		echo "Le DLC <strong>". $dlcnew->getNom() ."</strong> Existe déjà";
	}
}
/*
[Tue Apr 24 16:23:46.532097 2018] [:error] [pid 17198] [client 172.29.100.121:56250]
*  PHP Notice:  Array to string conversion in /home/didier/Documents/www/SiteJeuxVideo/site/include/class_dlc.php on line 45, referer: http://172.29.100.125/SiteJeuxVideo/site/dlc/creer.php

[Tue Apr 24 16:23:46.532135 2018] [:error] [pid 17198] [client 172.29.100.121:56250]
*  PHP Notice:  Array to string conversion in /home/didier/Documents/www/SiteJeuxVideo/site/include/class_dlc.php on line 45, referer: http://172.29.100.125/SiteJeuxVideo/site/dlc/creer.php

[Tue Apr 24 16:23:46.532841 2018] [:error] [pid 17198] [client 172.29.100.121:56250]
*  PHP Notice:  Use of undefined constant nom - assumed 'nom' in /home/didier/Documents/www/SiteJeuxVideo/site/include/class_dlcManager.php on line 209, referer: http://172.29.100.125/SiteJeuxVideo/site/dlc/creer.php

[Tue Apr 24 16:23:46.533084 2018] [:error] [pid 17198] [client 172.29.100.121:56250]
*  PHP Fatal error:  Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax;
*  check the manual that corresponds to your MariaDB server version for the right syntax to use near 'Jeux wii PS"" GROUP BY dlc.id' at line 1 
* in /home/didier/Documents/www/SiteJeuxVideo/site/include/class_dlcManager.php:211\nStack trace:\n
#0 /home/didier/Documents/www/SiteJeuxVideo/site/include/class_dlcManager.php(211): PDO->query('SELECT COUNT( d...')\n
#1 /home/didier/Documents/www/SiteJeuxVideo/site/dlc/ajout_dlc.php(29): dlcManager->existeNom('DLC WII pour "J...')\n
#2 {main}\n  thrown in /home/didier/Documents/www/SiteJeuxVideo/site/include/class_dlcManager.php on line 211, referer: http://172.29.100.125/SiteJeuxVideo/site/dlc/creer.php


[Tue Apr 24 16:32:17.077945 2018] [:error] [pid 15488] [client 172.29.100.121:56283] PHP Notice:  Array to string conversion in /home/didier/Documents/www/SiteJeuxVideo/site/include/class_dlc.php on line 45, referer: http://172.29.100.125/SiteJeuxVideo/site/dlc/creer.php
[Tue Apr 24 16:32:17.077985 2018] [:error] [pid 15488] [client 172.29.100.121:56283] PHP Notice:  Array to string conversion in /home/didier/Documents/www/SiteJeuxVideo/site/include/class_dlc.php on line 45, referer: http://172.29.100.125/SiteJeuxVideo/site/dlc/creer.php
[Tue Apr 24 16:32:17.078064 2018] [:error] [pid 15488] [client 172.29.100.121:56283] PHP Notice:  Undefined offset: 2 in /home/didier/Documents/www/SiteJeuxVideo/site/include/class_dlc.php on line 159, referer: http://172.29.100.125/SiteJeuxVideo/site/dlc/creer.php
[Tue Apr 24 16:32:17.078075 2018] [:error] [pid 15488] [client 172.29.100.121:56283] PHP Notice:  Undefined offset: 1 in /home/didier/Documents/www/SiteJeuxVideo/site/include/class_dlc.php on line 160, referer: http://172.29.100.125/SiteJeuxVideo/site/dlc/creer.php
[Tue Apr 24 16:32:17.078084 2018] [:error] [pid 15488] [client 172.29.100.121:56283] PHP Warning:  checkdate() expects parameter 3 to be integer, string given in /home/didier/Documents/www/SiteJeuxVideo/site/include/class_dlc.php on line 169, referer: http://172.29.100.125/SiteJeuxVideo/site/dlc/creer.php
[Tue Apr 24 16:32:17.078779 2018] [:error] [pid 15488] [client 172.29.100.121:56283] PHP Notice:  Undefined variable: q in /home/didier/Documents/www/SiteJeuxVideo/site/include/class_dlcManager.php on line 45, referer: http://172.29.100.125/SiteJeuxVideo/site/dlc/creer.php
[Tue Apr 24 16:32:17.078826 2018] [:error] [pid 15488] [client 172.29.100.121:56283] PHP Fatal error:  Uncaught Error: Call to a member function bindValue() on null in /home/didier/Documents/www/SiteJeuxVideo/site/include/class_dlcManager.php:45\nStack trace:\n#0 /home/didier/Documents/www/SiteJeuxVideo/site/dlc/ajout_dlc.php(30): dlcManager->add(Object(dlc))\n#1 {main}\n  thrown in /home/didier/Documents/www/SiteJeuxVideo/site/include/class_dlcManager.php on line 45, referer: http://172.29.100.125/SiteJeuxVideo/site/dlc/creer.php

 */
 
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
