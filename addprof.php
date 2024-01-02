<?php
include('secure/lock.php');
include('resfiles/addprofile.php');
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
$_SESSION['login_menu'] = 5;
include('resfiles/header1.php');  
?>
<center>

<?php   
include('resfiles/boxams.php');  
?>

<form name="addpro" action="" method="post">
<table class="design2">
<tr class="tblhd"><td><b><center>R.No.</b></td><td><b><center>Name</b></td></tr>
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

		echo "<tr><td><b><center>"; 
		echo $rollno;
		echo "</center></td><td><b>"; 
		echo $ssname;
		echo "</td></tr>"; 
	}

	echo "<tr><td>"; 
	echo "<input type='text' name='attroll' class='combo2' value=''/>";
	echo "</td><td>"; 
	echo "<input type='text' name='attname' class='combo2' value=''/>";
	echo "</td></tr>"; 

?>
</table>

<br>
<button name="posti" class="btn1" onclick="return valrec()">Add Student</button>
</form>
</body>
</html>