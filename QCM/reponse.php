<a href="index.php">Retour au choix d'un questionnaire</a>
<?php

$questionnaire=$_POST['qcm'];
$tab=file("question/$questionnaire");

	echo "<center><span style='font-size:20px;'>Correction du questionnaire : ".$tab[0]."</span><br /><hr /></center>";
	$nbr = count($tab, COUNT_RECURSIVE);
	$i=2;
	$question=false;
	$nbr_question=1;
	$nbr_reponse=1;
	$nbr_reponse_vrai = 0 ;
	while ( $i != $nbr )
	{
		if (trim($tab[$i]) == "")
		{
			$question=true;
		}
		elseif (trim($tab[$i]) != "*" && $question == true)
		{
			echo "<span style='font-weight: bold;'>".$tab[$i]."</span><br />";
			$question=false;
			$nbr_question=$nbr_question+1;
			$nbr_reponse=1;
		}
		elseif (trim($tab[$i]) != "*" && $question == false)
		{
			echo $tab[$i];
			
			if ( $_POST["reponse$nbr_question"] == "$nbr_reponse")
			{
				echo "&nbsp;<img src='reponse.jpg' height='10px' width='10px'>";
			}
			if (isset ($_POST["$nbr_question"]))
			{
				if ( $_POST["$nbr_question"] == "$nbr_reponse")
				{
					if ($_POST["$nbr_question"] == $_POST["reponse$nbr_question"])
					{
						echo "&nbsp;<img src='vrai.jpg' height='10px' width='10px'>";
						$nbr_reponse_vrai = $nbr_reponse_vrai +1;
					}
					else
					{
						echo "&nbsp;<img src='faux.jpg' height='10px' width='10px'>";
					}
					
				}
			}
			echo "<br />";
			$nbr_reponse=$nbr_reponse+1;
		}
		$i=$i+1;
	}

	$resultat = ($nbr_reponse_vrai /$nbr_question) * 20;
	echo "<center><h3>résultat : ".round($resultat)."/20</h3></center>";

?>