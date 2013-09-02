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
$qry_u="select * from stock order by st_id desc limit $start,$per_page";
$res_u=mysql_query($qry_u);
?>
        <table class="emp_tab">
        <tr class="menu_header">
        <td width="300">Stock Name</td>
        <td width="300">Quantity</td>
        </tr>

        <?php
		while($row_u=mysql_fetch_array($res_u))
		{
		echo "<tr class='pagi'>";
        echo "<td>";
		echo $row_u[1]; 
		echo "</td>";
		echo "<td>";
		echo $row_u[2];
		echo "</td>";				
		}
		?>
        
        </table>
        
      
