<?php
include('secure/lock.php');
include('resfiles/attupdate.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html> 
<head> 

<link rel="stylesheet" type="text/css" href="css\forms.css">
<link rel="stylesheet" type="text/css" href="css\table.css">
<link rel="stylesheet" type="text/css" href="css\widget.css">

<script type="text/javascript" src="script/attmatrix.js"></script>

</head>



<body> 

<?php   
$_SESSION['login_menu'] = 1;
include('resfiles/header2.php');  
?>


<center>

<div class="label11">

<?php
include('resfiles/studdash.php');
?>
</div>

</center>
</body>
</html>
