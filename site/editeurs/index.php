<?php
require('../../lib/editeursManager.php');
include("../include/class.php");
$page = new Page("THE Jeux Video DB","Liste des éditeurs");
include("../include/header.php");
$editeurs->getList();

?>
<main>
	<?php foreach ($editeurs as $editeur) {
		echo "<ul><li><a href='voir.php?nom=".$editeur['nom']."'>".$editeur['nom']."</a></li></ul>";
	} 
	?>

</main>

<?php
include("../include/footer.php");
?>
</body>
</html>