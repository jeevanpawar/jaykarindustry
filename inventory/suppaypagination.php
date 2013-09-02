<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$per_page = 19; 
if($_GET)
{
$page=$_GET['page'];
}

include("../include/database.php");
$start = ($page-1)*$per_page;
$qry_u="select * from purches order by s_id desc limit $start,$per_page";
$res_u=mysql_query($qry_u);
?>
        <table class="emp_tab">
        <tr class="menu_header">
        <td width="200">Supplier Name</td>
        <td width="200">Contact</td>
        <td width="200">Balance (Rs/-)</td>
        <td width="200">Total Amt (Rs/-)</td>
        <td width="200">Payment</td>
        </tr>

        <?php
		while($row_u=mysql_fetch_array($res_u))
		{
	    $qry_st="select * from suppliers where s_name='$row_u[5]'";
		$res_st=mysql_query($qry_st);
		$row_st=mysql_fetch_array($res_st);
		
	    $sid='s'.$row_u[0];
		
	    $qry_pt="select SUM(p_amt) from partial_payment where sl_id='$sid'";
		$res_pt=mysql_query($qry_pt);
		$row_pt=mysql_fetch_array($res_pt);
		
		$balance=$row_u[4]-$row_pt[0];
		
		echo "<tr class='pagi'>";
		echo "<td>";
		echo $row_u[5]; 
		echo "</td>";
		echo "<td>";
		echo $row_st[3];
		echo "</td>";
		echo "<td>";
		echo $balance;
		echo "</td>";
		echo "<td>";
		echo $row_u[4];
		echo "</td>";
		echo "<td >";
		echo "<a href='subpay.php?id=$row_u[0]' class='Print'>Payment</a>";
		echo "</td>";
		}
		?>
        
        </table>
        
      
