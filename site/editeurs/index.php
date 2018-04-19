<?php
require('../../lib/editeursManager.php');
include('../include/config_defaut.php');
include("../include/class.php");
$page = new Page("THE Jeux Video DB","Liste des éditeurs");
include("../include/header.php");
$db = new PDO('mysql:host=localhost;dbname=jeuxvideo', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


$manager = new EditeursManager($db);
$editeurs = $manager->getList();
?>

<main>
	<?php
	if(!empty($editeurs)){
	  foreach ($editeurs as $editeur) {
	?>
	    <ul>
	    	<li>
	    		<a href="voir.php?nom=<?php echo htmlspecialchars($editeur->nom()); ?>"><?php echo htmlspecialchars($editeur->nom()); ?></a><br>
	    		<a href="modifier.php?nom=<?php echo htmlspecialchars($editeur->nom()); ?>&id=<?php echo($editeur->id()); ?>"> Modifier </a>
	    		<a href="voir.php?nom=<?php echo htmlspecialchars($editeur->nom()); ?>"> Accéder à sa fiche </a>
	    	</li>
	    </ul>
	  <?php
	  }
	}
	?>
<a href="../index.php">Revenir sur la page d'accueil</a>

</main>

<?php
include("../include/footer.php");
?>
</body>
</html>