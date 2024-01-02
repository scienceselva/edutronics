<?php
include('secure/config.php');
session_start();
$error='';
if($_SERVER["REQUEST_METHOD"] == "POST")
{

	$myschoolname=addslashes($_POST['username']); 
	$sql="SELECT SHNAME FROM School WHERE SHCODE='$myschoolname'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$active=$row['active'];

	$count=mysql_num_rows($result);
	
	if($count==1)
	{
		session_register("myschoolname");
		$_SESSION['login_user']=$myschoolname;
		$_SESSION['login_shname']=$row['SHNAME'];
		header("location: index.php");
	}
	else 
	{
		$error="School Code invalid !";
	}
}
else
if (isset($_SESSION['login_user']))
{
	$school_check=$_SESSION['login_user'];
	$ses_sql=mysql_query("select SHCODE from School where SHCODE='$school_check' ");
	$row=mysql_fetch_array($ses_sql);

	$login_session=$row['SHCODE'];
	if(isset($login_session))
	{
		header("Location: index.php");
	}
}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="css\forms.css">
<style>
a:hover{color:#C0C0C0;}
</style>


<script >
function inputFocus(i){
    if(i.value==i.defaultValue){ i.value=""; i.style.color="#B6B6B4"; }
}
function inputBlur(i){
    if(i.value==""){ i.value=i.defaultValue; i.style.color="#B6B6B4"; }
}
</script>

</head>


<body style="background-image:url('image/paper_book.png');background-repeat:no-repeat;background-position: center;">




<div style="font-family:Grand Hotel;padding:5px;color:#38ACEC;font-size:30.0pt;">
<center><br>
<img src="image/amlogo.png" height="300px" width="300px"/>
<br>
Attendance Manager</center>
</div>
<hr>
<br><br>


<center>
<div style="border:1px solid #C0C0C0;width:350px;padding:15px;">
<form action="" method="post">
  <table><tr><td>
	<table><tr><td>
	<input type="text" name="username" style="font-family:Arial;font-size:14.0pt;color:#B6B6B4;border:0px;background-color: transparent;" value="Institution Code" onfocus="inputFocus(this)" onblur="inputBlur(this)" />
	</td></table>

  </td><td>
	<button type="submit" name="posti" class="btn">Login</button>
  </td></tr></table>
</form>
</div>
<div style="font-family:Arial;color:#C11B17;font-size:12px;"><b><br>
<?php echo $error; ?>
</b></div>
</center>

<br><br>

<div style="font-family:Grand Hotel;padding:15px;color:#C0C0C0;font-size:16.0pt;">
<center><br>
 
<br></center>
</div>

<br><br><br><br><br><br><br><br>
<div style="font-family:Calibre;padding:12px;color:#848482;font-size:8.0pt;">
<center>
&copy; Copyright Cloudblinks
<center>
</div>

</body>

</html>