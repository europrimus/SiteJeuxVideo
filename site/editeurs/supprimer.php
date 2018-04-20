<?php
require('../include/config.php');

$id = $_GET['id'];

if(isset($id)){
	// Accès base de donnéees
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$manager = new EditeursManager($db);
	$editeur = new Editeur([
		'id' => $id
	]);

	$manager->delete($editeur);
	header('Location: index.php');

}
