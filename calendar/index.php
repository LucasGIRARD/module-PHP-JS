<?php
date_default_timezone_set('Europe/Paris');

$tabMonth = array(1 => 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
$tabDay = array(1 => 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi','Dimanche');

$actualDay = date('d');
$actualMonth = date('n');
$actualYear = date('Y');

if (isset($_POST['month']) && $_POST['month'] != "" && isset($_POST['year']) && $_POST['year'] != "") {
	$month = $_POST['month'];
	$year = $_POST['year'];
} else {
	$month = $actualMonth;
	$year = $actualYear;
}

$timestampFirstOfMonth = mktime(0,0,0,$month,1,$year);
$numFirstDayOfMonth = date('N', $timestampFirstOfMonth);
$numDayInMonth = date('t', $timestampFirstOfMonth);

$timestampFirstOfLastMonth = mktime(0,0,0,$month - 1,1,$year);
$numDayInLastMonth = date('t', $timestampFirstOfLastMonth);

$timestampFirstOfNextMonth = mktime(0,0,0,$month + 1,1,$year);
$numDayInNextMonth = date('t', $timestampFirstOfNextMonth);

$previousMonth = $month	- 1;
$previousYear = $year;

$nextMonth = $month	+ 1;
$nextYear = $year;

if ($previousMonth == 0) {
		$previousMonth	= 12;
		$previousYear = $previousYear - 1;
} elseif ($nextMonth == 13) {
		$nextMonth = 1;
		$nextYear = $nextYear + 1;
}

$numCellWeek = 1;
?>
<html>
<head>
	<link rel="stylesheet" media="screen" type="text/css" title="Base" href="cal.css" />
</head>
<body>
	<br>
	<form method="POST">
	<select name="month">
		<?php
		$lists = "";
		foreach ($tabMonth as $key => $value) {
			$lists .= '<option value="'.$key.'" '.($key==$month?'selected="selected"':"").'>'.$value.'</option>';
		}
		$lists .= '</select><select name="year">';
		for ($i=1990 ; $i <= $actualYear + 2; $i++) {
			$lists .= '<option  '.($i==$year?'selected="selected"':"").'>'.$i.'</option>';
		}
		echo $lists;
		?>
	</select>
	<input type="submit" value="charger">
	</form>
	<form method="POST" name="previous">
		<input type="hidden" name="month" value="<?php echo $previousMonth; ?>">
		<input type="hidden" name="year" value="<?php echo $previousYear; ?>">
		<a href="javascript: previous.submit();"><<</a>
	</form>

	<form method="POST" name="next">
		<input type="hidden" name="month" value="<?php echo $nextMonth; ?>">
		<input type="hidden" name="year" value="<?php echo $nextYear; ?>">
		<a href="#" onclick="next.submit();">>></a>
	</form>
	<br>
	<table>
		<tr>
			<th>Lundi</th>
			<th>Mardi</th>
			<th>Mercredi</th>
			<th>Jeudi</th>
			<th>Vendredi</th>
			<th>Samedi</th>
			<th>Dimanche</th>
		</tr><tr>
		<?php
		$cal = "";
		for($i= $numDayInLastMonth - $numFirstDayOfMonth + 2;$i <= $numDayInLastMonth;$i++){
			$cal .= '<td>'.$i.'</td>';
			$numCellWeek++;
		}

		for($i = 1 ;$i <= $numDayInMonth  ; $i++){
			$class = "";
			if ($year == $actualYear && $month == $actualMonth && $i == $actualDay) {
				$class = "today";
			}

			if($numCellWeek > 7){
				$cal .= '</tr><tr>';
				$numCellWeek = 1;
			}

			$cal .= '<td class="'.$class.'"><a href="#">'.$i.'</a></td>';

			
			$numCellWeek++;
		}



		for($i=1;$i <= 7 - $numCellWeek + 1;$i++){			
			$cal .= '<td>'.$i.'</td>';
		}
		echo $cal;
		?>
	</tr></table>
</body>
</html>