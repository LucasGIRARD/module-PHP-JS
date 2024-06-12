<?php
session_start() ;

if ( isset($_POST['nom']) && isset($_POST['prenom']) )
{
	$pass = file('pass.txt');
	$nom = trim($pass[0]);
	$prenom = $pass[1];

	if ( $nom = $_POST['nom'] && $prenom == $_POST['prenom'] )
	{
		$_SESSION['nom']= $_POST['nom'];
		$_SESSION['prenom']= $_POST['prenom'];
	}
}

if ( isset($_SESSION['nom']) && isset($_SESSION['prenom']) )
{

	echo "Bonjour ".$_SESSION['nom']." ".$_SESSION['prenom']."!<br /> Vous êtes bien logué. Redirection en cours!";

	echo "<meta http-equiv='Refresh' content='3;URL=index.php'>";
}

?>
<form method="post" action="session.php">
Nom : <input type="text" name="nom" />
<br />
Prenom : <input type="text" name="prenom" />
<br />
<br />
<input type="submit" value="envoyer" />  <input value="reset" type="reset" />

