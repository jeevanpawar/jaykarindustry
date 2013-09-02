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
$qry_u="select * from invoice order by i_id desc limit $start,$per_page";
$res_u=mysql_query($qry_u);

?>
        <table class="emp_tab">
        <tr class="menu_header">
        <td width="200">Customer Name</td>
        <td width="200">Contact</td>
         <td width="200">Total Paid</td>
        <td width="200">Balance (Rs/-)</td>
        <td width="200">Total Amt (Rs/-)</td>
        </tr>

        <?php
		while($row_u=mysql_fetch_array($res_u))
		{
		$qry_c="select * from client where c_name='$row_u[1]' ";
		$res_c=mysql_query($qry_c);
		$row_c=mysql_fetch_array($res_c);
			
		$qry_2="select SUM(p_amt) from partial_payment where sl_id='$row_u[0]'";
		$res_2=mysql_query($qry_2);
		$row_2=mysql_fetch_array($res_2);
		
		$balance=$row_u[5]-$row_2[0];
		$paid=$row_u[5]-$balance;
		echo "<tr class='pagi'>";
		echo "<td>";
		echo $row_u[1]; 
		echo "</td>";
		echo "<td>";
		echo $row_c[3];
		echo "</td>";
		echo "<td>";
		echo $paid; 
		echo "</td>";
		echo "<td>";
		echo $balance;
		echo "</td>";
		echo "<td>";
		echo $row_u[5];
		echo "</td>";
		}
		?>
        
        </table>
        
      
