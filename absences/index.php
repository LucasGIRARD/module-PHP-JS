<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
    <title>absence</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <style type="text/css">
        p
        {
            text-align:center;
        }
    </style>
</head>
<body>


    <form method="POST">

        <p>
            Pseudo : <input name="pseudo" type="text" />

            <br />
            <br />

            <b>
                Départ
            </b>
            <br />
            <br />

            <b>Date: </b><select name="jour_D">
            <option value="1" selected="selected">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
        </select>

        &nbsp;

        <select name="mois_D">
            <option value="1" selected="selected">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>

        &nbsp;

        <select name="annee_D">
            <option value="2007" selected="selected">2007</option>
            <option value="2008">2008</option>
        </select>

        &nbsp;
        &nbsp;

        <b>Heure :</b> <input type="text" name="heure_D" size="2" maxlength="2" value="00" />

        &nbsp;
        &nbsp;

        <b>Minute :</b> <input type="text" name="minute_D" size="2" maxlength="2" value="00" />
        <br />
        <br />

        <b>
            Retour
        </b>
        <br />
        <br />

        <b>Date : </b><select name="jour_R">
        <option value="1" selected="selected">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
    </select>

    &nbsp;

    <select name="mois_R">
        <option value="1" selected="selected">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
    </select>

    &nbsp;

    <select name="annee_R">
        <option value="2007" selected="selected">2007</option>
        <option value="2008">2008</option>
    </select>

    &nbsp;
    &nbsp;

    <b>Heure :</b> <input type="text" name="heure_R" size="2" maxlength="2" value="00" />

    &nbsp;
    &nbsp;

    <b>Minute :</b> <input type="text" name="minute_R" size="2" maxlength="2" value="00" />
    <br />
    <br />

    raison de l'absence :  <input type="text" name="raison" />
    <br />
    <br />

    <input type="submit" value="Envoyer" />
</p>
</form>
<p>
    <?php
date_default_timezone_set('Europe/Paris');
mysql_connect("localhost", "root", "mysql");
mysql_select_db("test");

if (isset($_POST['pseudo']) AND isset($_POST['heure_D']) AND isset($_POST['heure_R']) AND isset($_POST['raison']))
{
    if ($_POST['pseudo'] != NULL AND $_POST['heure_D'] != NULL AND $_POST['heure_R'] != NULL AND $_POST['raison'] != NULL)
    {
        $raison = $_POST['raison'];
        $pseudo = $_POST['pseudo'];
        $timestamp_D = date('Y-m-d', mktime ($_POST['heure_D'], $_POST['minute_D'], 0, $_POST['mois_D'], $_POST['jour_D'], $_POST['annee_D']));
        $timestamp_R = date('Y-m-d', mktime ($_POST['heure_R'], $_POST['minute_R'], 0, $_POST['mois_R'], $_POST['jour_R'], $_POST['annee_R']));
        echo "INSERT INTO ABSENCES VALUES('', '" . $pseudo . "', '" . $timestamp_D . "', '" . $timestamp_R . "', '" . $raison . "')";
        mysql_query("INSERT INTO ABSENCES VALUES('', '" . $pseudo . "', '" . $timestamp_D . "', '" . $timestamp_R . "', '" . $raison . "')");
    }
}

$nombreDeMessagesParPage = 10;

$retour = mysql_query('SELECT COUNT(*) AS nb_messages FROM ABSENCES');
$donnees = mysql_fetch_array($retour);
$totalDesMessages = $donnees['nb_messages'];

$nombreDePages  = ceil($totalDesMessages / $nombreDeMessagesParPage);


if ($totalDesMessages > 10)
{

    echo 'Page : ';
    for ($i = 1 ; $i <= $nombreDePages ; $i++)
    {
        echo '<a href="index.php?page=' . $i . '">' . $i . '</a> ';
    }

}

?>
</p>

<?php

if (isset($_GET['page']))
{
    $page = intval($_GET['page']);
}
else
{
    $page = 1;
}
$premierMessageAafficher = ($page - 1) * $nombreDeMessagesParPage;
$reponse = mysql_query('SELECT * FROM ABSENCES ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $nombreDeMessagesParPage);

mysql_close();

while ($donnees = mysql_fetch_array($reponse) )
{
    ?>

    <br />

    <p>
        <?php echo $donnees['pseudo']; ?> est absent du <? echo date('d/m/Y \a H:i', $donnees['timestamp_D']); ?> jusqu'au <? echo date('d/m/Y \a H:i', $donnees['timestamp_R']); ?><br />
        pour la raison suivante : <?php echo $donnees['raison']; ?>
    </p>

    <?php
}
?>
</body>
</html>