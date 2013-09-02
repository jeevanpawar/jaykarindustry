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
?>
<link href="id_popup/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="id_popup/jquery.js" type="text/javascript"></script>
<script src="id_popup/facebox.js" type="text/javascript"></script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
		 
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
	
</script>
        <table class="emp_tab">
        <tr class="menu_header">
        <td width="100">In No</td>
        <td width="200">Date</td>
        <td width="200">Client Name</td>
        <td width="200">Total Amount</td>
        <td width="200">Vat</td>
        <td width="200">Grand Total</td>
        <td width="150">Action</td>
        </tr>
        <?php
		while($row_u=mysql_fetch_array($res_u))
		{
		echo "<tr class='pagi'>";
        echo "<td>";
		echo $row_u[0]; 
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
		echo "<td class=>";
		echo "<a  href='update_invoice.php?c_id2=$row_u[0]' class='print'>Update</a>&nbsp;<a href='rpt.php?id=$row_u[0]' class='print'>Invoice</a>";
		echo "</td>";
		}
		?>
        
        </table>
        
      
