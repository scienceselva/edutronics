

<table width="100%">
<tr>

<td width="20%">
<div>
<img src="image/amlogo.png" height="100px" width="100px"/>
</div>
</td>


<td  width="30%">
<?php
	echo "<div class='calcov'>";
	echo "<div class='cale1'>". date("M") ."</div>";
	echo "<div class='cale2'>". date("d") ."</div>";
	echo "<div class='cale3'>". date("D") ."</div>";
	echo "</div>";
?>
</td>


<td  width="40%">
<div style="font-family:Arial;  padding:15px;  font-size:18px;  color:#565656;">
<?php  
	echo "Faculty Name :<b>" . $_SESSION['login_name'] . "</b>"; 
?>
</div>
</td>

<td width="10%" align="right">
<a href="logout.php" class="btn"> logout</a><br>
</td>


</tr>
</table>

<br>
<center>
<div class="ammenu">

<?php

$curmenu = $_SESSION['login_menu'];

echo "<a href='index.php' class='amitem'> Home	</a>";



if ( $curmenu == 1)
{
	echo "<a href='teach.php' class='amitem11'> Todays entry</a>";
}else{
	echo "<a href='teach.php' class='amitem'> Todays entry	</a>";
}



if ( $curmenu == 2)
{
	echo "<a href='datentry.php' class='amitem11'> Edit by Date</a>";
}else{
	echo "<a href='datentry.php' class='amitem'> Edit by Date</a>";
}


if ( $curmenu == 3)
{
	echo "<a href='stuentry.php' class='amitem11'> View by Student</a>";
}else{
	echo "<a href='stuentry.php' class='amitem'> View by Student</a>";
}



if ( $curmenu == 4)
{
	echo "<a href='ediprof.php' class='amitem11'> Edit Profile	</a>";
}else{
	echo "<a href='ediprof.php' class='amitem'> Edit Profile	</a>";
}




if ( $curmenu == 5)
{
	echo "<a href='addprof.php' class='amitem11'> Add Profile	</a>";
}else{
	echo "<a href='addprof.php' class='amitem'> Add Profile	</a>";
}



if ( $curmenu == 6)
{
	echo "<a href='exam.php' class='amitem11'> Exams   </a>";
}else{
	echo "<a href='exam.php' class='amitem'> Exams </a>";
}


if ( $curmenu == 7)
{
	echo "<a href='marks.php' class='amitem11'> Marks </a>";
}else{
	echo "<a href='marks.php' class='amitem'> Marks </a>";
}
?>


</div>
<br><br>
