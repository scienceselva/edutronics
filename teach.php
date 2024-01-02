<?php
include('secure/lock.php');
include('resfiles/attupdate.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head> 

<link rel="stylesheet" type="text/css" href="css\forms.css">
<link rel="stylesheet" type="text/css" href="css\table.css">
<link rel="stylesheet" type="text/css" href="css\widget.css">

<script type="text/javascript" src="script/attmatrix.js"></script>

</head>



<body> 

<?php   
$_SESSION['login_menu'] = 1;
include('resfiles/header1.php');  
?>


<center>


<?php   
include('resfiles/boxams.php');  
?>





<div class="label11">

Todays attendance for Batch / Class :<b>
<?php echo $_SESSION['login_class']; ?>
</b>
<br><br>


<?php
$_SESSION['action_date'] = date("Y-m-d");
include('resfiles/attmatrix.php');
?>


</center>
</body>
</html>
