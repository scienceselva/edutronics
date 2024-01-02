<?php
include('secure/lock.php');



if(isset($_POST['postedit']))
{
	$yearpl = $_POST['yearls']; 
	$montpl = $_POST['monthls']; 
	$dayspl = $_POST['dayls']; 
	$_SESSION['action_date'] = $yearpl . "-" . $montpl . "-" . $dayspl;
	header("location: teached.php");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Home ::. </title>
<link rel="stylesheet" type="text/css" href="css\forms.css">
<link rel="stylesheet" type="text/css" href="css\table.css">
<link rel="stylesheet" type="text/css" href="css\widget.css">

<script type="text/javascript" src="script/attmatrix.js"></script>

</head>
<body>
<?php   
$_SESSION['login_menu'] = 2;
include('resfiles/header1.php');  
?>
<center>


<form  action="" method="post">


    <div id="dat11" style="display:block; border-style: solid; border-color: #C0C0C0;border-width: 1px;width:75%">
	<br><br>
	<select name="monthls" class="combo2">
		<option value="na">Month</option>
		<option value="01">January</option>
		<option value="02">February</option>
		<option value="03">March</option>
		<option value="04">April</option>
		<option value="05">May</option>
		<option value="06">June</option>
		<option value="07">July</option>
		<option value="08">August</option>
		<option value="09">September</option>
		<option value="10">October</option>
		<option value="11">November</option>
		<option value="12">December</option>
	</select>

	<select name="dayls" class="combo2">
		<option value="na">Day</option>
		<option value="01">01</option>
		<option value="02">02</option>
		<option value="03">03</option>
		<option value="04">04</option>
		<option value="05">05</option>
		<option value="06">06</option>
		<option value="07">07</option>
		<option value="08">08</option>
		<option value="09">09</option>
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

	<select name="yearls" class="combo2">
		<option value="na">Year</option>


<?php
		$yr2000 = date("Y");
		echo "<option value='$yr2000'>$yr2000</option>";
		$yr2000 = $yr2000 - 1;
		echo "<option value='$yr2000'>$yr2000</option>";
?>

	</select>
	<br><br>
	<button type="submit" name="postedit" class="btn1" id="eentry">Edit Entry</button>
	<br>
</div>



</form>
</body>
</html>

