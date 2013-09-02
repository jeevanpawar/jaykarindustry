<?php
session_start();
error_reporting(0);
include("../include/database.php");
$a=$_SESSION['user'];
$c=$_SESSION['com'];
$per_page = 20; 
if($_GET)
{
$page=$_GET['page'];
}
$start = ($page-1)*$per_page;
$sql = "select * from quotation order by q_id desc limit $start,$per_page";
$rsd = mysql_query($sql);
?>
				<table class="emp_tab">
                <tr class="menu_header">
                <td width="80">Quo No</td>
                <td width="250">Client Name</td>
                <td width="160">Date</td>
                <td width="500">Site Address</td>
                <td width="70">Print</td>
                </tr>
                
        <?php
		
		while($row=mysql_fetch_array($rsd))
		{		
        	echo "<tr class='pagi'>";
                echo "<td width='80'>";
                echo $row[0];
                echo "</td>";
                echo "<td width='250'>";
                echo $row[3];
                echo "</td>";
                echo "<td width='160'>";
                echo $row[2];
                echo "</td>";
                echo "<td width='500'>";
                echo $row[4];
                echo "</td>";
				echo "<td width='70' class='print'>";
                echo "<a href='qreport.php?id=$row[0]'>Print</a>";
                echo "</td>";
                echo "</tr>";
                
		}
		?>
        </table>
