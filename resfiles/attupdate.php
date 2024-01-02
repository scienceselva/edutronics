<?php

$message001 = 0;

if(isset($_POST['posti']))
{

	$stud_count1 = 0;
	$inpusr1 = $_SESSION['login_user'];
	$inpcls1 = $_SESSION['login_class'];

	$stud_list1="SELECT STROLL FROM student WHERE SHCODE='$inpusr1' AND SHCLASS='$inpcls1'";
	$stud_list_result1=mysql_query($stud_list1);
	while ($stud_list_row1 = mysql_fetch_array($stud_list_result1)) 
	{ 	
		$rollno1 = $stud_list_row1['STROLL']; 

		$pinsrol = "RLPN" . $rollno1;
		$pindata = "RL" . $rollno1;
		$pincont = "RLCN" . $rollno1;

		$today_dt = $_SESSION['action_date'];

		$insroll = $_POST[$pinsrol];
		$insdata = $_POST[$pindata];
		$inscont = $_POST[$pincont];

		if ($insroll == "UN")
		{
   			$updquery = "UPDATE " . $inpusr1 . " SET ATTACT='$insdata', ATTVAL=$inscont WHERE SHCLASS='$inpcls1' AND STROLL='$rollno1' AND ATTDATE='$today_dt'";
			$resultup = mysql_query($updquery);
			if (!$resultup) {
				die('Query failed: ' . mysql_error());
				$message001 = 2;
			}
			$message001 = 1;

		}else if ($insroll == "IN"){

   			$insquery = "INSERT INTO " . $inpusr1 . " (SHCLASS, STROLL, ATTDATE, ATTACT ,ATTVAL) VALUES('$inpcls1','$rollno1','$today_dt','$insdata',$inscont)";
			$resultqr = mysql_query($insquery);

			if (!$resultqr) {
				die('Query failed: ' . mysql_error());
				$message001 = 2;
			}
			$message001 = 1;	

		}
		
	}

}

?>