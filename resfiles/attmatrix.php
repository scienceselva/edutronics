<?php

	$inpusr = $_SESSION['login_user'];
	$inpcls = $_SESSION['login_class'];

	$sql="SELECT SHSESS FROM schedule WHERE SHCODE='$inpusr' AND SHCLASS='$inpcls'";

	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);

	$shsession = $row['SHSESS'];

?>

<form action="" method="post">
<table class="design1" id="attman">
<tr class="tblhd">
<td>Roll.No.</td>
<td>Name</td>

<?php 

	for ($x = 1; $x <= $shsession; $x++) {
	    echo "<td>S $x ";
	    echo '**</td>';
	} 

?>

</tr>




<tr class="tblhd">
<td>-</td>
<td>---</td>

<?php 

	for ($x = 1; $x <= $shsession; $x++) {
	    echo "<td class='bluetick' onclick='ckall($x,$shsession)'>";
	    echo '</td>';
	} 

?>

</tr>




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

		echo "<tr class='tblrw1'><td>"; 
		echo $rollno;
		echo "</td><td>"; 
		echo $ssname;
		echo "</td>"; 

		$today_dt = $_SESSION['action_date'];
		$today_att = "SELECT ATTACT FROM ". $_SESSION['login_user'] . " WHERE SHCLASS='$inpcls' AND STROLL='$rollno' AND ATTDATE='$today_dt'";
		$today_att_res=mysql_query($today_att);
		$today_att_row = mysql_fetch_array($today_att_res);
		
                $attend11 = $today_att_row['ATTACT']; 

		$stud_count = $stud_count + 1;


		$tbxname = "RL" . $rollno; 
		$tbxupdt = "RLPN" . $rollno;
		$tcnupdt = "RLCN" . $rollno;
		$fillertxt = "";		


		echo "<input type='hidden' name='stucount' value='$shsession'/>";


		for ($st = 1; $st <= $shsession; $st++) 
		{
			$fillertxt = $fillertxt . " ";
			
		}


		if (strlen($attend11) >= 1)
		{
			
			echo "<input type='hidden' id='$tbxname' name='$tbxname' value='$attend11'/>";
			echo "<input type='hidden' id='$tbxupdt' name='$tbxupdt' value='U'/>";
		}else{

			echo "<input type='hidden' id='$tbxname' name='$tbxname' value='$fillertxt'/>";
			echo "<input type='hidden' id='$tbxupdt' name='$tbxupdt' value='I'/>";
		}

		echo "<input type='hidden' id='$tcnupdt' name='$tcnupdt' value=0 />";

		for ($x = 0; $x <= $shsession-1; $x++) 
		{
	

		  if ($x < strlen($attend11))
		  {

			switch ($attend11[$x]) 
			{
			    case "Y":
			        echo "<td class='tick' onclick='cSwap(this," . '"' .$rollno . '"' .",$x)'></td>";
			        break;
			    case "L":
			        echo "<td class='leave' onclick='cSwap(this," . '"' .$rollno . '"' .",$x)'></td>";
			        break;
			    case "A":
			        echo "<td class='abscent' onclick='cSwap(this," . '"' .$rollno . '"' .",$x)'></td>";
			        break;
			    default:
			        echo "<td class='noentry' onclick='cSwap(this," . '"' .$rollno . '"' .",$x)'></td>";
			}		

		  }
		  else
		  {
			echo "<td class='noentry' onclick='cSwap(this," . '"' .$rollno . '"' .",$x)'></td>";
		  }

		}
		echo "</tr>";
	}
 
?>

</table>

<br>
<button type="submit" name="posti" class="btn1">Update</button>
</form>