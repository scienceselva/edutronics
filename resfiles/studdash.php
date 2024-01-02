<?php  
	echo "<b>" . $_SESSION['login_stname'] . "</b>"; 
?>
<br><br>
<table class="design1" id="attman">
<tr>
<td class="invaldate1">Month</td>
<td class="invaldate1">01</td>
<td class="invaldate1">02</td>
<td class="invaldate1">03</td>
<td class="invaldate1">04</td>
<td class="invaldate1">05</td>
<td class="invaldate1">06</td>
<td class="invaldate1">07</td>
<td class="invaldate1">08</td>
<td class="invaldate1">09</td>
<td class="invaldate1">10</td>
<td class="invaldate1">11</td>
<td class="invaldate1">12</td>
<td class="invaldate1">13</td>
<td class="invaldate1">14</td>
<td class="invaldate1">15</td>
<td class="invaldate1">16</td>
<td class="invaldate1">17</td>
<td class="invaldate1">18</td>
<td class="invaldate1">19</td>
<td class="invaldate1">20</td>
<td class="invaldate1">21</td>
<td class="invaldate1">22</td>
<td class="invaldate1">23</td>
<td class="invaldate1">24</td>
<td class="invaldate1">25</td>
<td class="invaldate1">26</td>
<td class="invaldate1">27</td>
<td class="invaldate1">28</td>
<td class="invaldate1">29</td>
<td class="invaldate1">30</td>
<td class="invaldate1">31</td>
</tr>

<?php 

	$studentroll = $_SESSION['login_stroll'];
	$studentclas = $_SESSION['login_class'];
	$prev_month = "";
	$prev_year = "";
	$inc_st = 31;
	$flag11 = 1;
	$mon_st = "";
	$year_st = "";
	$leave_days = 0;
	$abs_days = 0;
	$present_days = 0;
	$half_days = 0;
	$total_days = 0;

	$stuquer1 = "SELECT ATTDATE, ATTACT, ATTVAL  FROM ". $_SESSION['login_user'] ." WHERE SHCLASS='$studentclas' AND STROLL='$studentroll' ORDER BY ATTDATE";

	$att_result=mysql_query($stuquer1);
	while ($att_row = mysql_fetch_array($att_result)) 
	{ 
		$total_days = $total_days + 1;
		$attdate01 = $att_row['ATTDATE']; 
		$attact01 = $att_row['ATTACT'];
		$attval01 = $att_row['ATTVAL']; 
		
		$month_st = date("M",strtotime($attdate01));
		$day_st =  date("d",strtotime($attdate01));
		$year_st = date("Y",strtotime($attdate01));
		$mon_st = date("n",strtotime($attdate01));
		$mon_st11 = $mon_st - 1;

		if ($prev_month == $month_st)
		{ }else{

			if ($flag11 == 0)
			{
				if ($prev_year == $year_st)
				{
					$year_st11 = $year_st;
				}else{
					$year_st11 = $year_st - 1;
				}
				
				for ($x = $inc_st; $x <= 31; $x++) 
				{
					if(checkdate($mon_st11, $x , $year_st11))
					{
						$dating1 =  $year_st . "-" . $mon_st11 . "-" . $x ;
						$kilamai = date("D",strtotime($dating1));
						if ($kilamai == "Sat" Or $kilamai == "Sun")
						{ 
							echo "<td class='weekend'></td>";
						}else{
							echo "<td class='attgray'></td>";
						}
					}else{
						echo "<td class='invaldate'></td>";
					}
				}
				echo "</tr>";
			}else{
				$flag11=0;
			}


			echo "<tr>";
			echo "<td>". $month_st . "</td>";
			$inc_st = 1;
		}
		for ($x = $inc_st; $x < $day_st; $x++) 
		{
			if(checkdate($mon_st, $x, $year_st))
			{
						$dating1 =  $year_st . "-" . $mon_st . "-" . $x ;
						$kilamai = date("D",strtotime($dating1));
						if ($kilamai == "Sat" Or $kilamai == "Sun")
						{ 
							echo "<td class='weekend'></td>";
						}else{
							echo "<td class='attgray'></td>";
						}
			}else{
				echo "<td class='invaldate'></td>";
			}
		}

		if ($attval01 == 0)
		{
			if(substr_count($attact01,"L") > 0)
			{
				echo "<td class='leavest'></td>";
				$leave_days = $leave_days + 1;
			}else{
				echo "<td class='abscentst'></td>";
				$abs_days = $abs_days + 1;
			}
		}else{
			if ($attval01 > .5)
			{
				echo "<td class='presentst'></td>";
				$present_days = $present_days + 1;
			}else{
				echo "<td class='yellowst'></td>";
				$half_days = $half_days + 1;
			}
		}
		$inc_st = $day_st + 1 ;
		$prev_month = $month_st ;
		$prev_year = $year_st;
	}
	if ($total_days > 0)
	{
		for ($x = $inc_st; $x <= 31; $x++) 
		{
			if(checkdate($mon_st, $x, $year_st))
			{
						$dating1 =  $year_st . "-" . $mon_st . "-" . $x ;
						$kilamai = date("D",strtotime($dating1));
						if ($kilamai == "Sat" Or $kilamai == "Sun")
						{ 
							echo "<td class='weekend'></td>";
						}else{
							echo "<td class='attgray'></td>";
						}
			}else{
				echo "<td class='invaldate'></td>";
			}
		}
	}


	
?>
</tr>
</table>

<br><br>

<table width="800px">
<tr>
<td width="400px"></td>
<td width="400px"></td>
</tr>


<tr>
<td>

<table>

<tr>
<td> Number of Days Attended</td>
<td  class="bgpresent" width="50px"><?php  echo  $present_days;  ?> </td>
</tr>

<tr>
<td> Number of Days on Leave</td>
<td class="bgleave"> <?php  echo  $leave_days;  ?> </td>
</tr>

<tr>
<td> Number of Days on Absance</td>
<td  class="bgabscent"><?php  echo  $abs_days;  ?> </td>
</tr>

<tr>
<td> Number of Half-day's attended</td>
<td  class="bghalf"><?php  echo  $half_days;  ?> </td>
</tr>

<tr>
<td><hr></td>
<td><hr></td>
</tr>

<tr>
<td> Total number of days in Academics</td>
<td  class="bgtot"><?php  echo  $total_days;  ?> </td>
</tr>

</table>
</td>


<td class="bgpercentage">
Your over all attendance percentage = 
<?php  
	if ($total_days > 0)
	{	
		$days_fn =  0;
		if($half_days > 0)
		{
			$days_fn =  ($half_days / 2) + $present_days;	
		}else{
			$days_fn =  $present_days;	
		}
		$tot_fn = ($days_fn / $total_days) * 100;
		echo "<b>";
		echo round($tot_fn);
		echo " %</b>";
 	}else{
		echo " <b> 0 %</b>";
	}
?>
</td>
</tr>
</table>