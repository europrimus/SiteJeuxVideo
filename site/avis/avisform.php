
<main>
	<h2>Avis</h2>
	<form action="enrengistrement.php" method="POST">
		<label>Nom :</label>
		<p> <?php//echo $_session['pseudo']?></p>
		<textarea roww='10' cols='50'name='comentairee'>Comenter</textarea>
		
		<input type="submit" name="envoyer" value="envoyer" id="envoyer">
	</form>
	<ul>
	</ul>
</main>
