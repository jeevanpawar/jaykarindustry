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
$qry_u="select * from dc order by d_id desc limit $start,$per_page";
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
        <td width="100">S No</td>
        <td width="200">Date</td>
        <td width="200">Customer Name</td>
        <td width="200">Contact</td>
        <td width="200">Address</td>
        <td width="250">Action</td>
        </tr>
        <?php
		while($row_u=mysql_fetch_array($res_u))
		{
		$qry_cl="select * from client where c_name='$row_u[2]'";
		$res_cl=mysql_query($qry_cl);
		$row_cl=mysql_fetch_array($res_cl);
		echo "<tr class='pagi'>";
        echo "<td>";
		echo $row_u[0]; 
		echo "</td>";
		echo "<td>";
		echo date('d-m-Y', strtotime($row_u[1]));
		echo "</td>";
		echo "<td>";
		echo $row_u[2];
		echo "</td>";
		echo "<td>";
		echo $row_cl[3];
		echo "</td>";
		echo "<td>";
		echo $row_cl[2];
		echo "</td>";
		echo "<td>";
		echo "<a  href='update_dc.php?c_id2=$row_u[0]' class='print'>Update</a>&nbsp;<a href='quot.php?id=$row_u[0]' class='print'>DC</a>";
		echo "</td>";
		}
		?>
        
        </table>
        
      
