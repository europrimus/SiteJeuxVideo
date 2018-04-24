<?php
require('../include/config.php');

$id = $_GET['id'];

if(isset($id)){
	// Accès base de donnéees
	//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$manager = new dlcManager($db);
	$dlc = new dlc([
		'id' => $id
	]);

	$manager->delete($dlc);

	header('Location: index.php','supr');
	
	

}
