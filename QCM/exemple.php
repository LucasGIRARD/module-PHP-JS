<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>QCM</title>

<style type="text/css">
<!--

* {
  padding:0px;
	margin:0px;
  color: #000099;
	font-family: TimesNR;
}

body {
  background: #FFFFCC;
	margin:30px;
}

h1 {
  font-family: Arial;
	font-size:24pt;
	margin:50px 0px 15px 0px;
}

h2 {
  font-family: Arial;
	font-size:12pt;
	margin:50px 0px 10px 0px;
}

a {
  font-family: Arial;
	font-size:11pt;
	padding:0px 5px;
}

a:hover {
  color:#FF8E1E;
	text-decoration:none;
}

p.descriptif {
  margin:0px 0px 50px 0px;
	color:#0073D2;
	font-weight:bold;
}

input.submit {
  border: solid #000099 1px;
}

.reponse {
  font-weight:bold;
	text-decoration:underline;
}

.correct {
  font-weight:bold;
  color:green;
}

.score {
  font-family: Arial;
	font-size:12pt;
	font-weight:bold;
  margin:40px 0px 0px 0px;
	color:#FF0000;
}
-->
</style>


</head>
<body>

<a href="qcm.php?qcm=soleil.txt">Le système solaire</a> <a href="qcm.php?qcm=france.txt">Connaissance de la France</a> <a href="qcm.php?qcm=europe.txt">Les pays d'Europe</a> <a href="qcm.php?qcm=mythologie.txt">Divinités antiques</a> <br/><h1>Le système solaire</h1>
<p class="descriptif">Testez vos connaissances en astronomie sur le système solaire</p>
<form action="qcm.php?qcm=soleil.txt" method="post"><h2>Qu'est-ce que le Soleil ?</h2>
<input checked="checked" type="radio" name="rep[0]" value="0" /> une étoile naine jaune <br/>
<input  type="radio" name="rep[0]" value="1" /> une étoile noire<br/>
<input  type="radio" name="rep[0]" value="2" /> une constellation<br/>
<h2>A quelle galaxie appartient le Soleil ?</h2>
<input checked="checked" type="radio" name="rep[1]" value="0" /> la galaxie Gutenberg<br/>
<input  type="radio" name="rep[1]" value="1" /> la Pléiade<br/>
<input  type="radio" name="rep[1]" value="2" /> la Voie Lactée <br/>
<h2>Quelle est la distance moyenne entre la Terre et le Soleil ?</h2>
<input checked="checked" type="radio" name="rep[2]" value="0" /> 150 000 km<br/>
<input  type="radio" name="rep[2]" value="1" /> 1 500 000 km<br/>
<input  type="radio" name="rep[2]" value="2" /> 15 millions de km<br/>
<input  type="radio" name="rep[2]" value="3" /> 150 millions de km <br/>
<input  type="radio" name="rep[2]" value="4" /> 15 milliards de km<br/>
<h2>Quel est l'âge du Soleil en années ?</h2>
<input checked="checked" type="radio" name="rep[3]" value="0" /> 5 millions<br/>
<input  type="radio" name="rep[3]" value="1" /> 5 milliards <br/>
<input  type="radio" name="rep[3]" value="2" /> 500 milliards<br/>
<input  type="radio" name="rep[3]" value="3" /> 5 000 milliards<br/>
<h2>Quelle est la température du Soleil en degrés ?</h2>
<input checked="checked" type="radio" name="rep[4]" value="0" /> 0<br/>
<input  type="radio" name="rep[4]" value="1" /> 100<br/>
<input  type="radio" name="rep[4]" value="2" /> 1000<br/>
<input  type="radio" name="rep[4]" value="3" /> 1 million<br/>
<input  type="radio" name="rep[4]" value="4" /> 15 millions <br/>
<h2>Quel est l'âge de la Terre en années ?</h2>
<input checked="checked" type="radio" name="rep[5]" value="0" /> 500 000<br/>
<input  type="radio" name="rep[5]" value="1" /> 4 500 000<br/>
<input  type="radio" name="rep[5]" value="2" /> 45 millions<br/>
<input  type="radio" name="rep[5]" value="3" /> 450 millions<br/>
<input  type="radio" name="rep[5]" value="4" /> 4,5 milliards <br/>
<h2>Quel est l'âge de la Lune ?</h2>
<input checked="checked" type="radio" name="rep[6]" value="0" /> 5 000 ans<br/>
<input  type="radio" name="rep[6]" value="1" /> 50 000 ans<br/>
<input  type="radio" name="rep[6]" value="2" /> 150 000 ans<br/>
<input  type="radio" name="rep[6]" value="3" /> le même âge que la Terre <br/>
<input  type="radio" name="rep[6]" value="4" /> un âge beaucoup plus ancien<br/>
<h2>Quelle est la circonférence de la Terre ?</h2>
<input checked="checked" type="radio" name="rep[7]" value="0" /> 6 000 km<br/>
<input  type="radio" name="rep[7]" value="1" /> 16 000 km<br/>
<input  type="radio" name="rep[7]" value="2" /> 36 000 km<br/>
<input  type="radio" name="rep[7]" value="3" /> 37 000 km<br/>
<input  type="radio" name="rep[7]" value="4" /> 40 000 km <br/>
<h2>En combien de temps la Terre tourne-t-elle sur elle-même ?</h2>
<input checked="checked" type="radio" name="rep[8]" value="0" /> 1 heure<br/>
<input  type="radio" name="rep[8]" value="1" /> 23 heures et 56 minutes <br/>
<input  type="radio" name="rep[8]" value="2" /> 24 heures à la seconde près<br/>
<h2>Quelle est la vitesse de rotation de la Terre ?</h2>
<input checked="checked" type="radio" name="rep[9]" value="0" /> 3 km/h<br/>
<input  type="radio" name="rep[9]" value="1" /> 30 km/h <br/>
<input  type="radio" name="rep[9]" value="2" /> 300 km/h<br/>
<input  type="radio" name="rep[9]" value="3" /> 3 000 km/h<br/>
<input  type="radio" name="rep[9]" value="4" /> 30 km/s<br/>
<br/><input id="submit" type="submit" value="Corriger..." /></form><br/><br/><a href="qcm.php?qcm=soleil.txt">Le système solaire</a> <a href="qcm.php?qcm=france.txt">Connaissance de la France</a> <a href="qcm.php?qcm=europe.txt">Les pays d'Europe</a> <a href="qcm.php?qcm=mythologie.txt">Divinités antiques</a> 
</body>
</html>
