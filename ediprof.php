<?php
include('secure/lock.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Home ::. </title>
<link rel="stylesheet" type="text/css" href="css\forms.css">
<link rel="stylesheet" type="text/css" href="css\table.css">
<link rel="stylesheet" type="text/css" href="css\widget.css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript" src="script/quickup.js"></script>



</head>
<body>
<?php   
$_SESSION['login_menu'] = 4;
include('resfiles/header1.php');  
?>
<center>

<form>
<table class="design2">
<tr class="tblhd"><td><b><center>R.No.</b></td><td width="210px"><b><center>Name</b></td><td style="width:75px"><b>Status</b></td></tr>
<?php

	$stud_count = 0;
	$inpusr = $_SESSION['login_user'];
	$inpcls = $_SESSION['login_class'];

	$stud_list="SELECT STROLL, STNAME FROM student WHERE SHCODE='$inpusr' AND SHCLASS='$inpcls'";
	$stud_list_result=mysql_query($stud_list);
	while ($stud_list_row = mysql_fetch_array($stud_list_result)) 
	{ 
		$rollno = $stud_list_row['STROLL']; 
		$ssname = $stud_list_row['STNAME']; 
		$tbname = "RL" . $rollno; 
		$tbname1 = "RRL" . $rollno; 
		$tbname2 = "PRL" . $rollno; 
		$tbname3 = "NRL" . $rollno; 
		$tbname4 = "IRL" . $rollno;

		echo "<tr id='" .  $tbname . "' class='row_edit'>";
		echo "<td> <b><center>"; 
		echo $rollno;
		echo "</center></b></td><td><b>"; 
		echo "<span id='$tbname2' class='name1'>" . $ssname . "</span>";
		echo "<input type='text' id='$tbname3' class='name2' value='$ssname'/>";
		echo "<input type='text' id='$tbname1' class='name2' value='$rollno'/>";
		echo "</b></td> <td id='$tbname4' >  </td></tr>"; 
	}
?>


</table>

<div id="div1">
</div>

</form>
</body>
</html>