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
$qry_u="select * from invoice order by i_id desc limit $start,$per_page";
$res_u=mysql_query($qry_u);

$q1="select SUM(i_total) from invoice";
$r1=mysql_query($q1);
$res1=mysql_fetch_array($r1);

$q2="select SUM(i_vat) from invoice";
$r2=mysql_query($q2);
$res2=mysql_fetch_array($r2);

$q3="select SUM(i_gtotal) from invoice";
$r3=mysql_query($q3);
$res3=mysql_fetch_array($r3);
?>
        <table class="emp_tab">
        <tr class="menu_header">
        <td width="100">S No</td>
        <td width="200">Date</td>
        <td width="200">Client Name</td>
        <td width="200">Total Amount</td>
        <td width="200">Vat</td>
        <td width="200">Grand Total</td>
      
        </tr>

        <?php
		$count=0;
		while($row_u=mysql_fetch_array($res_u))
		{
		$count+=1;
		echo "<tr class='pagi'>";
        echo "<td>";
		echo $count; 
		echo "</td>";
		echo "<td>";
		echo date('d-m-Y', strtotime($row_u[2]));
		echo "</td>";
		echo "<td>";
		echo $row_u[1];
		echo "</td>";
		echo "<td>";
		echo $row_u[4];
		echo "</td>";
		echo "<td>";
		echo $row_u[3];
		echo "</td>";
		echo "<td>";
		echo $row_u[5];
		echo "</td>";
		
		}
		?>
        <tr class="pagi"><td></td>
        <td></td>
        <td></td>
        <td style="color:#F00"><?php echo $res1[0];?></td>
        <td style="color:#F00"><?php echo $res2[0];?></td>
        <td style="color:#F00"><?php echo $res3[0];?></td>
        <td></td>
        </tr>
        </table>
        
      
