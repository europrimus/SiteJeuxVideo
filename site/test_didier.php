<?php
require ("include/config.php");

$page = new Page("Test Didier");

include(SITE["installDir"]."include/header.php");
?>
<main>
<h2>Teste de PDO</h2>

<?php
/* Connexion à une base */


$sth = $db->prepare('SELECT
Jeux.id as id,
Jeux.nom as nom,
Jeux.description as description,
Editeur.nom as editeur,
Editeur.id as editeurid,
Jeux_has_Support.DateSortie as date,
Support.nom as support
FROM Jeux_has_Support
JOIN Jeux  ON Jeux.id = Jeux_has_Support.Jeux_id AND Jeux.nom = ?
JOIN Support ON Jeux_has_Support.Support_id = Support.id
JOIN Editeur ON Jeux.Editeur_id=Editeur.id
ORDER BY Jeux.nom
LIMIT 0, 10');
$sth->execute(array('Wii sport'));
$jeux = $sth->fetchAll();
foreach($jeux as $jeu)
$listeJeux[]= new jeu($jeu);
/*
  private $_id;
  private $_nom;
  private $_editeur;
  private $_support;
  private $_date;
  private $_description
*/

$sth->execute(array('Mario kart'));
$jeu2 = $sth->fetchAll();
/*
echo "listeJeux : <pre>";var_dump($listeJeux);echo "</pre>";
echo "jeu2 : <pre>";var_dump($jeu2);echo "</pre>";
*/
?>
<h2>Formulaire de date</h2>
<form action="" method="POST">
	une date
	<input type="date" name="date"><br>
	<input type="submit" name="envoyer" value="envoyer" id="envoyer">
</form>
<?php
if(isset($_POST["date"])){
	echo "date : ";var_dump($_POST["date"]);
	$dlc=new dlc(array("nom"=>"teste date","date"=>$_POST["date"]));
	echo "dlc : <pre>";var_dump($dlc);echo "</pre>";
echo "date:".$dlc->getDate()."<br>";
echo "date:".$dlc->getDate("d/m/Y")."<br>";
};

?>
</main>

<?php
include(SITE["installDir"]."include/footer.php");
?>
</body>
</html>
