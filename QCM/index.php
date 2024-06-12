<?php
$tab = scandir("question");
$nbr = count($tab);
$i=2;
?><center><?php
if (!isset($_GET['q']))
{
	echo "Veullez choisir un questionnaire!<br /><br />";
}
while ($i != $nbr)
{
	echo "<a href='?q=$tab[$i]' >".$tab[$i]."</a>&nbsp;&nbsp;";
	$i = $i + 1;
}
echo "<br /><br />";
if (isset($_GET['q']))
{
	$questionnaire = $_GET['q'];
	$tab2=file("question/$questionnaire");
	echo "<span style='font-size:22px;'>".$tab2[0]."</span></center><br /><hr />";
	echo "<span style='font-size:18px;margin-left:10%;'>".$tab2[1]."</span><hr /><br /><br />";
	$nbr = count($tab2, COUNT_RECURSIVE);
	$i2=2;
	$question=false;
	$nbr_question=1;
	$nbr_reponse=1;
	echo "<form method='post' action='reponse.php'>";
	while ( $i2 != $nbr )
	{
		if (trim($tab2[$i2]) == "")
		{
			$question=true;
		}
		elseif (trim($tab2[$i2]) == "*")
		{
			$true = $nbr_reponse-1;
			echo "<input type='hidden' name='reponse$nbr_question' value='$true' />";
		}
		elseif ($question == true)
		{
			echo "<span style='font-weight: bold;'>".$tab2[$i2]."</span><br />";
			$question=false;
			$nbr_question=$nbr_question+1;
			$nbr_reponse=1;
		}
		elseif ($question == false)
		{
			echo "<input type='radio' name=" . $nbr_question . " value=" . $nbr_reponse . " id=" . $nbr_question.$nbr_reponse . " /> <label for=" . $nbr_question.$nbr_reponse . ">" . $tab2[$i2] . "</label><br />";
			$nbr_reponse=$nbr_reponse+1;
		}
		$i2=$i2+1;
	}
	echo "<br /> <input type='hidden' name='qcm' value='$questionnaire' />	<input value='Envoye' type='submit' /> <input type='reset' /> </form>";
}
?>