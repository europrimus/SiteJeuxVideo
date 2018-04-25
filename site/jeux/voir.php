<?php
require ("../include/config.php");
$page = new Page("Informations sur un jeu");
include(SITE["installDir"]."include/header.php");

$id = $_GET['id'];
$managerjeu = new jeuManager($db);
$jeu = $managerjeu->getbyId($id);
$support=$jeu->support();

/*$managerEditeur = new editeursManager($db);
$managerSupport = new supportManager($db);

$editeur = $managerEditeur->getList();
$support = $managerSupport->getList(); */

?>
<main>
	<h2>Fiche Nom Jeu</h2>
	<h3>Informations</h3>
	<ul>
		<table>
		<thead">
			<tr>
				<th>Nom de la plateforme</th>
				<th>Date de sortie du jeu</th>
			</tr>
		</thead>
		<tbody>
		<li>Nom : <?=$jeu->nom()?></li>
		<li>Editeur : <?=$jeu->editeur()?></li>
		<li>Description : <?=$jeu->description()?></li>
		<li>Pegi : <?=$jeu-> pegi()?></li>
		<li>Lien : <?=$jeu->lien() ?></li>
		<li>Versions :
			<?php foreach ($support as $value):?>
			<tr>
				<td><?=$value['nom']?></td>
				<td><?=$value['date']?></td>
			</tr>
		<?php endforeach; ?>
		</li>
		</tbody>
		</table>
	</ul>
	<h3>Description</h3>
	<p>Description du DLC</p>
</main>

<?php
include(SITE["installDir"]."include/footer.php");
?>
