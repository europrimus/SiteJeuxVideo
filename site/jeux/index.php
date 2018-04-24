<?php
// charge la configuration et renvoi un objet PDO $db
require ("../include/config.php");

$page = new Page("Liste de jeux");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");

// Accès base de donnéees
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$manager = new jeuManager($db);
$jeux = $manager->getList();


echo "<pre>";
print_r ($jeux);
echo "</pre>";

?>

<main>

<table>
	<thead>
		<tr>
			<th>Nom du jeu</th>
			<th>Editeur</th>
			<th>Support</th>
			<th>Date de sortie</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($jeux as $jeu): ?>
		<tr>
			<td><?=$jeu->nom()?></td>
			<td><?=$jeu->editeur()?></td>
			<td><?=$jeu->support()?></td>
			<td><?=$jeu->date()?></td>
			<td><?=$jeu->description()?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

</main>

<?php
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
