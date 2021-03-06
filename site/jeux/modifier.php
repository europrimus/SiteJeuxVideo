<?php
require ("../include/config.php");
$page = new Page("Modifier le jeu");
include(SITE["installDir"]."/include/header.php");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$managerEditeurs = new editeursManager($db);
$editeurs = $managerEditeurs->getList();
$id = $_GET['id'];
$managerjeu = new jeuManager($db);
$jeu = $managerjeu->getbyId($id);
$support=$jeu->support();
?>
<?php if (!empty($_SESSION)): ?>
<main>
	<h2><?php echo $page->getPage(); ?></h2>
	<form action="modif_jeu.php" method="POST">

		<p>
		<label for="nom">Nom :</label>
		<input type="text" name="nom" id="nom" value="<?=$jeu->nom()?>" required>
		</p>

		<p>
		<label for="editeur">Editeur :</label>
		<select name="editeur" required>
			<option selected disabled hidden value>Sélectionnez un éditeur dans la liste</option>
			<?php foreach ($editeurs as $editeur): ?>
	    	<option value='<?= $editeur->id(); ?>' ><?= htmlspecialchars($editeur->nom()); ?></option>
			<?php endforeach; ?>
		</select>
		<a href="..\editeurs\creer.php" style="text-decoration: none"><input type="button" value="Ajouter un nouvel éditeur"/></a>
		</p>

		<p>
		<label for="lien">Lien vers le site du jeu :</label>
		<input type="url" name="lien" id="lien" value="<?=$jeu->lien() ?>" required>
		</p>

		
		<p>
		<label for="description">Description :</label>
		<textarea id="description" name="description" rows="6" cols="50" required><?=$jeu->description()?></textarea>
		</p>

		<p>
		<label for="pegi">Indiquer le PEGI du jeu :</label><br>
		<input type="radio" name="pegi" id="pegi3" value="3" checked/><label for="pegi3">PEGI 3 (Le jeu peut être utilisé par tout enfant quel que soit son âge. Il ne comporte pas d'images effrayantes. Aucun langage grossier n'est utilisé.)</label><br>
		<input type="radio" name="pegi" id="pegi7" value="7"/><label for="pegi7"> PEGI 7 (Le jeu est destiné aux enfants de plus de 7 ans. Certaines scènes peuvent en effet faire peur aux très jeunes enfants.)</label><br>
		<input type="radio" name="pegi" id="pegi12" value="12"/><label for="pegi12">PEGI 12 (Le jeu est interdit aux moins de 12 ans. Il peut comporter des scènes pouvant choquer les plus jeunes (nudité, violence). Il peut aussi comporter un langage légèrement grossier (mais pas d'insultes à caractère sexuel).)</label><br>
		<input type="radio" name="pegi" id="pegi16" value="16"/><label for="pegi16">PEGI 16 (Le jeu est interdit aux moins de 16 ans. Il comporte des scènes de grande violence et à caractère sexuel. Un langage fortement grossier est utilisé. Des séquences où il est fait usage de tabac et de stupéfiants sont présentes.)</label><br>
		<input type="radio" name="pegi" id="pegi18" value="18"/><label for="pegi18">PEGI 18 (Le jeu est interdit aux moins de 18 ans. Il contient des scènes de violence particulièrement explicites et réalistes.)</label><br>
		</p>

		<input type="text" name="id" id="id" value="<?=$jeu->id()?>" hidden>


		<p><input type="submit" name="envoyer" value="envoyer" id="envoyer"></p>
	</form>
	<p><em>(Création dynamique si nouveau support ou éditeur et recherche autocompletion pour editeur (fait pour éditeur))</em></p>
</main>
<?php endif; ?>
<?php include(SITE["installDir"]."/include/footer.php"); ?>
