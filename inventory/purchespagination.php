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
$qry_u="select * from purches order by s_id desc limit $start,$per_page";
$res_u=mysql_query($qry_u);

$q1="select SUM(st_amount) from purches";
$r1=mysql_query($q1);
$res1=mysql_fetch_array($r1);
?>
        <table class="emp_tab">
        <tr class="menu_header">
        <td width="100">Sr.No</td>
        <td width="200">Date</td>
        <td width="200">Supplier Name</td>
        <td width="150">Raw Material</td>
        <td width="150">Quantity</td>
        <td width="150">Amount</td>
        </tr>
        <?php
		while($row_u=mysql_fetch_array($res_u))
		{	
			echo "<tr class='pagi'>";
			echo "<td>";
			echo $row_u[0]; 
			echo "</td>";
			echo "<td>";
			echo date('d-m-Y', strtotime($row_u[6]));
			echo "</td>";
			echo "<td>";
			echo $row_u[5];
			echo "</td>";
			echo "<td>";
			echo $row_u[2];
			echo "</td>";
			echo "<td>";
			echo $row_u[3];
			echo "</td>";
			echo "<td>";
			echo $row_u[4];
			echo "</td>";
		}
		?>
        <tr class="pagi"><td></td>
        
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="color:#F00"><?php echo $res1[0];?></td>
        </tr>
        </table>