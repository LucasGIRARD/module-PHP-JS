<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Bienvenue sur mon site</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <style type="text/css">
        h1, h3
        {
            text-align:center;
        }
        h3
        {
            background-color:black;
            color:white;
            font-size:0.9em;
            margin-bottom:0px;
        }
        .news p
        {
            background-color:#CCCCCC;
            margin-top:0px;
        }
        .news
        {
            width:70%;
            margin:auto;
        }
        </style>
    </head>
   
    <body>
<h1>Bienvenue sur mon site !</h1>
<p>Voici les derni�res news :</p>
 
<?php
mysql_connect("localhost", "root", "mysql");
mysql_select_db("exemple");
// On r�cup�re les 5 derni�res news
$retour = mysql_query('SELECT * FROM NEWS ORDER BY id DESC LIMIT 0, 5');
while ($donnees = mysql_fetch_array($retour))
{
?>
<div class="news">
    <h3>
        <?php echo $donnees['titre']; ?>
        <em>le <?php echo date('d/m/Y � H\hi', $donnees['timestamp']); ?></em>
    </h3>
   
    <p>
    <?php
    // On enl�ve les �ventuels antislash PUIS on cr�e les entr�es en HTML (<br />)
    $contenu = nl2br(stripslashes($donnees['contenu']));
    echo $contenu;
    ?>
    </p>
</div>
<?php
} // Fin de la boucle des news
?>
</body>
</html>