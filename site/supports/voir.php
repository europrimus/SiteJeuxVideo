<?php
require ("../include/config.php");

$page = new Page("Informations sur un Support");
include(SITE["installDir"]."include/header.php");
?>
<main>
	<h3>Informations</h3>
	<ul>
		<li>Nom : Nom du support</li>
	</ul>

</main>

<?php
include(SITE["installDir"]."include/footer.php");
?>
</body>
</html>
