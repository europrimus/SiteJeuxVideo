<?php 
require('../../lib/editeursManager.php');

$id = $_GET['id'];

if(isset($id)){
	// Accès base de donnéees
	$db = new PDO('mysql:host=localhost;dbname=jeuxvideo', 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$manager = new EditeursManager($db);
	$editeur = new Editeur([
		'id' => $id
	]);

	$manager->delete($editeur);
	header('Location: index.php');

}