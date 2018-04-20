<?php
require ("../include/config.php");

$page = new Page("Liste des Supports");
include(SITE["installDir"]."include/header.php");
?>
<main>
	<ul>
		<li><a href="voir.php?id=1">Support 1</a></li>
		<li><a href="#">Support 2</a></li>
		<li><a href="#">Support 3</a></li>
	</ul>
</main>

<?php
include(SITE["installDir"]."include/footer.php");
?>
