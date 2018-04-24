<?php
require('../include/config.php');

$id = $_GET['id'];

if(isset($id)){
	$manager = new dlcManager($db);
	$dlc = new dlc([
		'id' => $id
	]);

	$manager->delete($dlc);

	header('Location: index.php','supr');
	
	

}
