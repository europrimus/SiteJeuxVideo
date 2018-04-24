<?php
// charge la configuration et renvoi un objet PDO $db
require ("../include/config.php");

$page = new Page("Liste de jeux");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");

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
		<?php foreach ($jeux as $jeu): 
			$manager = new EditeursManager($db);
			$editeurs = $manager->getbyId($jeu->editeur());
			$editeurs->nom(); ?>
		<tr>
			<td><?=$jeu->nom()?></td>
			<td><?=$editeurs->nom()?></td>
<!-- 			<td><?=$jeu->support()?></td>
			<td><?=$jeu->date()?></td> -->
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
