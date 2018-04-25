<?php
// charge la configuration et renvoi un objet PDO $db
require ("../include/config.php");

$page = new Page("Liste de jeux");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");

$manager = new jeuManager($db);
$jeux = $manager->getListSimple();
?>

<main>

<table>
	<thead class="table table-bordered">
		<tr>
			<th>Nom du jeu</th>
			<th>Editeur</th>
			<th>PEGI</th>
			<th>Description</th>
			<th>Lien vers le site du jeu</th>
			<th>Plateforme</th>
			<th>Date de sortie</th>
		</tr>
	</thead>
	<tbody class="table table-bordered">
		<?php foreach ($jeux as $jeu):?>
		<tr>
			<td><?=$jeu['jeux']?></td>
			<td><?=$jeu['editeur']?></td>
			<td>PEGI <?=$jeu['pegi']?></td>
			<td><?=$jeu['description']?></td>
			<td><?=$jeu['lien']?></td>
			<td><?=$jeu['plateforme']?></td>
			<td><?=$jeu['DateSortie']?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

</main>

<?php
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
