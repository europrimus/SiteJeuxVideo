<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=jeuxvideo', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
