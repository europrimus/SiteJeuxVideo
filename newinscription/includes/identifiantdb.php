<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=newinscription', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
