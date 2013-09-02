<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$per_page = 19; 
if($_GET)
{
	$page=$_GET['page'];
}
$start = ($page-1)*$per_page;
$qry_u="select * from sale order by sl_id desc limit $start,$per_page";
$res_u=mysql_query($qry_u);
?>
        <table class="emp_tab">
        <tr class="menu_header">
        <td width="100">Sr.No</td>
        <td width="200">Date</td>
        <td width="200">Finish Good Name</td>
        <td width="150">Total Quantity</td>
        </tr>
        <?php
		$count=0;
		while($row_u=mysql_fetch_array($res_u))
		{	
		$count+=1;
		echo "<tr class='pagi'>";
        echo "<td>";
		echo "$row_u[0]";  
		echo "</td>";
		echo "<td>";
		echo date('d-m-Y', strtotime($row_u[3]));
		echo "</td>";
		echo "<td>";
		echo $row_u[1];
		echo "</td>";
		echo "<td>";
		echo $row_u[2];
		echo "</td>";
		
		echo "</tr>";
		}
		?>
        </table>