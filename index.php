<?php
include('secure/lock.php');


$error2 = '';

if(isset($_POST['posti']))
{

	$attenUser = $_POST['attuser']; 
	$attenClass = $_POST['attclass']; 
	$attenCode = $_POST['attcode']; 

	$inpins = $_SESSION['login_user'];

	$_SESSION['login_class']=$attenClass;


	if($attenUser==2)
	{

		$sql="SELECT TUNAME FROM teacher WHERE SHCODE='$inpins' AND TUCODE='$attenCode'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$tuname=$row['TUNAME'];
		$_SESSION['login_name']=$tuname;



		$num_rows = mysql_num_rows($result);

		if($num_rows == 1)
		{
			header("location: teach.php");
		}else{
			$error2 = "invalid passcode";
		}
	}
	else
	{
		$sql="SELECT STNAME FROM student WHERE  SHCODE='$inpins' AND SHCLASS='$attenClass' AND STROLL='$attenCode'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$stname=$row['STNAME'];
		$_SESSION['login_stname']=$stname;
		$_SESSION['login_stroll']=$attenCode;



		$num_rows = mysql_num_rows($result);

		if($num_rows == 1)
		{
			header("location: student.php");
		}else{
			$error2 = "invalid passcode";
		}

	}

}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html> 
<head> 

<link rel="stylesheet" type="text/css" href="css\forms.css">
</head>




<body> 


<?php   include('resfiles/header.php');  ?>


<form action="" method="post">
<br><br>
<center>
<div class="loginbg">

<center>

   <div class="radiock">
	<table><tr><td>
      <div>
        <input type="radio" id="radio1" name="attuser" value="1" checked="checked"><label for="radio1">Student</label>
      </div>
	</td><td>&nbsp&nbsp&nbsp </td><td>
      <div>
        <input type="radio" id="radio2" name="attuser" value="2"><label for="radio2">Tutor</label>
      </div>
	</td></tr></table>
    </div>


<br>
<div class="label11">
Batch / class
</div>

	<select name="attclass" class="combo1">
	<?php
		include('resfiles/batchld.php');
	?>
	</select>

<br><br>
<div class="label11">
Passcode
</div>
	<table>
	<tr><td><input type="text" name="attcode" class="combo1" value="" onfocus="inputFocus(this)" onblur="inputBlur(this)"></td>
	</tr><tr><td><div style="font-family:Arial;color:#C11B17;font-size:12px;">
	<b><?php   echo $error2;   ?></b>
	</div>
	</td>
	</tr>
	</table>

<br>
		

<button type="submit" name="posti" class="btn1">Enter</button>


</div>

</form>




</center>
</body>
</html>
