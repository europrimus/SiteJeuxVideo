<?php
session_start();
$titre="Enregistrement";
include("../include/config.php");
include("includes/debut.php");
include("includes/menu.php");
echo '<a href="'.SITE["baseUrl"].'index.php">Index du forum</a><p>Vous êtes ici : Enregistrement';

if ($id!=0) erreur(ERR_IS_CO);
?>
<?php
if (empty($_POST['pseudo'])) // Si on la variable est vide, on peut considérer qu'on est sur la page de formulaire
{
    echo '<h1>Inscription</h1>';
    echo '<form method="post" action="register.php" enctype="multipart/form-data">
    <fieldset><legend>Identifiants</legend>
    <label for="pseudo">* Pseudo :</label>  <input name="pseudo" type="text" id="pseudo" /> (le pseudo doit contenir entre 3 et 15 caractères)<br />
    <label for="password">* Mot de Passe :</label><input type="password" name="password" id="password" /><br />
    <label for="confirm">* Confirmer le mot de passe :</label><input type="password" name="confirm" id="confirm" />
    </fieldset>
    <fieldset><legend>Contacts</legend>
    <label for="email">* Votre adresse Mail :</label><input type="text" name="email" id="email" /><br />
    </fieldset>
    <p>Les champs précédés d un * sont obligatoires</p>
    <p><input type="submit" value="S\'inscrire" /></p></form>
    </div>
    </body>
    </html>';
    
    
} //Fin de la partie formulaire
else //On est dans le cas traitement
{
    $pseudo_erreur1 = NULL;
    $pseudo_erreur2 = NULL;
    $mdp_erreur = NULL;
    $email_erreur1 = NULL;
    $email_erreur2 = NULL;

    //On récupère les variables
    $i = 0;
    $temps = time(); 
    $pseudo=$_POST['pseudo'];
    $pass = $_POST['password'];
    $confirm = $_POST['confirm'];
    $email = $_POST['email'];
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    
    //Vérification du pseudo
    $query=$db->prepare('SELECT COUNT(*) AS nbr FROM utilisateurs WHERE pseudo =:pseudo');
    $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
    $query->execute();
    $pseudo_free=($query->fetchColumn()==0)?1:0;
    $query->CloseCursor();
    if(!$pseudo_free)
    {
        $pseudo_erreur1 = "Votre pseudo est déjà utilisé par un membre";
        $i++;
    }
    if (strlen($pseudo) < 3 || strlen($pseudo) > 15)
    {
        $pseudo_erreur2 = "Votre pseudo est soit trop grand, soit trop petit";
        $i++;
    }

    //Vérification du mdp
    if ($pass != $confirm || empty($confirm) || empty($pass))
    {
        $mdp_erreur = "Votre mot de passe et votre confirmation sont diffèrent, ou sont vides";
        $i++;
    }

    //Vérification de l'adresse email

    //Il faut que l'adresse email n'ait jamais été utilisée
    $query=$db->prepare('SELECT COUNT(*) AS nbr FROM Utilisateurs WHERE email =:mail');
    $query->bindValue(':mail',$email, PDO::PARAM_STR);
    $query->execute();
    $mail_free=($query->fetchColumn()==0)?1:0;
    $query->CloseCursor();
    
    if(!$mail_free)
    {
        $email_erreur1 = "Votre adresse email est déjà utilisée par un membre";
        $i++;
    }
    //On vérifie la forme maintenant
    if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email))
    {
        $email_erreur2 = "Votre adresse E-Mail n'a pas un format valide";
        $i++;
    }

   if ($i==0)
   {
    echo'<h1>Inscription terminée</h1>';
        echo'<p>Bienvenue '.stripslashes(htmlspecialchars($_POST['pseudo'])).' vous êtes maintenant inscrit et connecté sur le forum</p>
    <p>Cliquez <a href="'.SITE["baseUrl"].'index.php">ici</a> pour retourner à la page d\'accueil</p>';

        $query=$db->prepare('INSERT INTO utilisateurs (pseudo, motPass, email)
        VALUES (:pseudo, :hash, :email)');
    $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $query->bindValue(':hash', $hash, PDO::PARAM_STR);
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->execute();

    //Et on définit les variables de sessions
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['id'] = $db->lastInsertId(); ;
        $_SESSION['level'] = 2;
        $query->CloseCursor();
    }
    else
    {
        echo'<h1>Inscription interrompue</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites pendant l incription</p>';
        echo'<p>'.$i.' erreur(s)</p>';
        echo'<p>'.$pseudo_erreur1.'</p>';
        echo'<p>'.$pseudo_erreur2.'</p>';
        echo'<p>'.$mdp_erreur.'</p>';
        echo'<p>'.$email_erreur1.'</p>';
        echo'<p>'.$email_erreur2.'</p>';
       
        echo'<p>Cliquez <a href="./register.php">ici</a> pour recommencer</p>';
    }
}
?>
</div>
</body>
</html>
