<?php
require ("include/config.php");
require ("include/class.php");

$page = new Page("Test Didier");
$menu = new Menu("$page->getPage()");
//var_dump($page);


include("include/header.php");
?>
<main>
<h2>Teste de PDO</h2>

<?php
/* Connexion à une base */

try {
    $dbh = new PDO( 'mysql:dbname='.DB_NAME.';host='.DB_HOST , DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

$sth = $dbh->prepare('SELECT
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

echo "listeJeux : <pre>";var_dump($listeJeux);echo "</pre>";
echo "jeu2 : <pre>";var_dump($jeu2);echo "</pre>";

?>


</main>

<?php
include("include/footer.php");
?>
</body>
</html>
