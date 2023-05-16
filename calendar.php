<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>月曆</title>
    <!-- CSS連結 -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
body {
    /* height: 100vh; */
    display: grid;
    place-items: center;
    /* background-color: rgb(225, 225, 225); */
    background-image: url(./Los-Minions-Wallpapers-5-21.jpg);
	background-repeat:no-repeat;
}

table {
    height: 500px;
    width: 500px;
    background-image: url(./123.jpg);
	background-repeat:no-repeat;
    background-size:750px;
    border-radius: 30px;
    padding: 50px;
    position: relative;
    overflow: hidden;
}
th, td {
  padding: 10px;
  text-align: center;
  
    
}

th {
	text-align: center;
    font-size: 30px;
    color: rgb(255, 255, 255);
    padding: 10px;
}

td {
  border: 1px solid #ccc;
  text-align: center;
    font-size: 20px;
    color: rgb(255, 255, 255);
    padding: 10px;
  /* background-color: rgb(255, 255, 255); */
}

.today {
  background-color: lightyellow;
  color: blue
}
 
.sel{
	float: left;
	margin-top: 20px;
}

</style>

</head>

<body>
<body>
	<?php
	
	$year = date("Y");
	$month = date("m");
	
	
	if (isset($_GET["year"]) && isset($_GET["month"])) {
		$year = $_GET["year"];
		$month = $_GET["month"];
	}
	
	
	$days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
	$first_day = mktime(0, 0, 0, $month, 1, $year);
	$first_day_of_week = date("N", $first_day);
	
	
	echo "<table>";
	echo "<tr><th colspan='7'>" . date("Y", $first_day) . "年" . date("n", $first_day) . "月" . "</th></tr>";
	echo "<tr><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th><th>日</th></tr>";
	echo "<tr>";
	
	
	for ($i = 1; $i < $first_day_of_week; $i++) {
		echo "<td></td>";
	}
	
	
	for ($day = 1; $day <= $days_in_month; $day++) {
		if ($year == date("Y") && $month == date("m") && $day == date("j")) {
			echo "<td class='today'>$day</td>";
		} else {
			echo "<td>$day</td>";
		}
		
		
		if (date("N", mktime(0, 0, 0, $month, $day, $year)) == 7) {
			echo "</tr><tr>";
		}
	}
	
	
	for ($i = date("N", mktime(0, 0, 0, $month, $days_in_month, $year)); $i < 7; $i++) {
		echo "<td></td>";
	}
    $prev_month_year = strtotime("-1 month", $first_day);
	$prev_month = date("m", $prev_month_year);
    $prev_year = date("Y", $prev_month_year);
    $next_month_year = strtotime("+1 month", $first_day);
	$next_month = date("m", $next_month_year);
	$next_year = date("Y", $next_month_year);

	echo "<div class=sel>";
	echo "<a href='?year=$prev_year&month=$prev_month'>上個月</a>";
	echo "<span> </span>";

	echo "<a href='?year=$next_year&month=$next_month'>下個月</a>";
	echo "</div>";


	
	echo "</tr>";
	echo "</table>";

	
	
?>
</body>
</body>

</html>