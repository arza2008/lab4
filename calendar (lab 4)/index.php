<html>
<body>
<center>

<?php

  	$date=time ();
	$day=date('d',$date);
	//$month=date('m',$date);
	$year=date('Y',$date);
	
	$month=$_GET["m"];	

	
	if($month==null){
		$month=date('m',$date);
	}else{
		$command=$_GET["nav"];
	if($command=='n'){
		$month=$month+1;
		
		$month=$month%13;

			if($month==0){
				$month=1;
			}
	}else if($command=='p'){
		$month=$month-1;
			if($month==0){
				$month=12;
			}
		}
}
	$first_day=mktime(0,0,0,$month,1,$year);

	$day_of_week=date('D',$first_day);
	$title=date('F',$first_day);
	switch($day_of_week){
		case "Sun": $blank=0;break;
		case "Mon": $blank=1;break;
		case "Tue": $blank=2;break;
		case "Wed": $blank=3;break;
		case "Thu": $blank=4;break;
		case "Fri": $blank=5;break;
		case "Sat": $blank=6;break;
}

$days_in_month=cal_days_in_month(0,$month,$year);

echo"<table border=3 width=394>";
echo'<tr><th colspan=60><a href="test1.php?m
='.$month.'&nav=p"><</a> '.strtoupper($title).' '. $year.' <a href="test1.php?m
='.$month.'&nav=n" >></a></th></tr>';

echo"<tr><td width=62>Sun</td><td width=62>Mon</td><td width=62>Tue</td>
<td width=62>Wed</td><td width=62>Thu</td><td width=62>Fri</td><td width=62>Sat</td>";
$monthName=date("M",mktime(0,0,0,$month));
$day_count=1;

echo"<tr>";
while
( $blank >0)
{ 
echo "<td></td>";
$blank=$blank-1;
$day_count++;
}

$day_num=1;

while( $day_num <=$days_in_month)
{
echo'<td> <a href="events.php?d
='.$day_num.strtoupper($monthName).$year.'">'.$day_num.'</a> </td>';
$day_num++;
$day_count++;

if($day_count>7)
{
echo"</tr><tr>";
$day_count=1;
}
}
while( $day_count>1 && $day_count<=7)
{
echo "<td></td>";

$day_count++;
}

echo"</tr></table>";

?>
</center>
</body>
</html>
