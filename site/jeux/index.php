<?php
require ("../include/config.php");
$page = new Page("Liste de jeux");

include(SITE["installDir"]."include/header.php");

// Accès base de donnéees
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


$manager = new jeuManager($db);
$jeux = $manager->getList();

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
include(SITE["installDir"]."include/footer.php");
?>
