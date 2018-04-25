<?php
session_start();
session_destroy();
$titre="Déconnexion";
include("../include/config.php");
include("includes/debut.php");
include("includes/menu.php");

if ($id==0) erreur(ERR_IS_NOT_CO);

echo '<p>Vous êtes à présent déconnecté <br />
Cliquez <a href="'.SITE["baseUrl"].'index.php">ici</a> pour revenir à la page principale</p>';
echo '</div></body></html>';
?>
