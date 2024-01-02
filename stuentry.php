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

<script type="text/javascript" src="script/attmatrix.js"></script>

</head>
<body>
<?php   
$_SESSION['login_menu'] = 3;
include('resfiles/header1.php');  
?>
<center>


<form name="viewstu" action="" method="post">

   <table><tr><td>
	<select name="studlist" class="combo2">
	<option value="0">---Select a student----</option>

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

			echo "<option value='$rollno'>$rollno" . " : " . $ssname ."</option>";
		}

	?>

			</select>
	</td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td>
			<button name="posti" class="btn1" >View</button>
	</td>
 	</table>
</form>

<br><br>

<?php

if(isset($_POST['posti']))
{

	$comboroll = $_POST['studlist'];

	$stud_list1="SELECT STNAME FROM student WHERE SHCODE='$inpusr' AND SHCLASS='$inpcls' AND STROLL='$comboroll'";
	$stud_list_result1=mysql_query($stud_list1);
	$stud_list_row1 = mysql_fetch_array($stud_list_result1);
	$ssname1 = $stud_list_row1['STNAME']; 

	$_SESSION['login_stname'] = $ssname1;
	$_SESSION['login_stroll'] = $comboroll;
	include('resfiles/studdash.php');
	$_SESSION['login_stname'] = "";
	$_SESSION['login_stroll'] = "";
}else{
	echo "<b>Select a student to View attendance details !</b>";
}

?>

</body>
</html>

