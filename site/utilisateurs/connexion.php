<?php
session_start();
$titre="Connexion";
include("../include/config.php");
include("includes/debut.php");
include("includes/menu.php");
echo '<a href="'.SITE["baseUrl"].'index.php">Index du forum</a><p>Vous êtes ici : Connexion';
?>
<?php
echo '<h1>Connexion</h1>';
if ($id!=0) erreur(ERR_IS_CO);
?>
<?php
if (!isset($_POST['pseudo'])) //On est dans la page de formulaire
{
	echo '<form method="post" action="connexion.php">
	<fieldset>
	<legend>Connexion</legend>
	<p>
	<label for="pseudo">Pseudo :</label><input name="pseudo" type="text" id="pseudo" /><br />
	<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
	</p>
	</fieldset>
	<p><input type="submit" value="Connexion" /></p></form>
	<a href="./register.php">Pas encore inscrit ?</a>
	 
	</div>
	</body>
	</html>';
}//On reprend la suite du code
else
{
    $message='';
    if (empty($_POST['pseudo']) || empty($_POST['password']) ) //Oublie d'un champ
    {
        $message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
    }
    else //On check le mot de passe
    {
        $query=$db->prepare('SELECT motPass, id, droits, pseudo
        FROM utilisateurs WHERE pseudo = :pseudo');
        $query->bindValue(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();
        $hash=$data['motPass'];
		if (password_verify($_POST['password'], $hash)) // Acces OK !
		{
		    $_SESSION['pseudo'] = $data['pseudo'];
		    $_SESSION['level'] = $data['droits'];
		    $_SESSION['id'] = $data['id'];
		    $message = '<p>Bienvenue '.$data['pseudo'].', 
				vous êtes maintenant connecté!</p>
				<p>Cliquez <a href="'.SITE["baseUrl"].'index.php">ici</a> 
				pour revenir à la page d accueil</p>';
		}
		else // Acces pas OK !
		{
		    $message = '<p>Une erreur s\'est produite 
		    pendant votre identification.<br /> Le mot de passe ou le pseudo 
	            entré n\'est pas correcte.</p><p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
		}
	    $query->CloseCursor();
    }
    echo $message.'</div></body></html>';
}
?>
<input type="hidden" name="page" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
<!-- <?php
$page = htmlspecialchars($_POST['page']);
echo 'Cliquez <a href="'.$page.'">ici</a> pour revenir à la page précédente';
?> -->
