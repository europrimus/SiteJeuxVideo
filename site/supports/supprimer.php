<?php
require('../include/config.php');

$id = $_GET['id'];

if(isset($id)){
	// Accès base de donnéees
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$manager = new supportManager($db);
	$support = new support([
		'id' => $id
	]);

	$manager->delete($support);

	header('Location: index.php','supr');
	
	

}
