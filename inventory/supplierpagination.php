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
$qry_u="select * from suppliers order by s_id desc limit $start,$per_page";
$res_u=mysql_query($qry_u);
?>
<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="css/facebox.js" type="text/javascript"></script>
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
        <td width="200">Name</td>
        <td width="200">Mobile No</td>
        <td width="200">Phone No</td>
        <td width="200">Email Id</td>
        <td width="200">Address</td>
        <td>Action</td>
        </tr>

        <?php
		while($row_u=mysql_fetch_array($res_u))
		{
			echo "<tr class='pagi'>";
        	echo "<td>";
			echo $row_u[1]; 
			echo "</td>";
			echo "<td>";
			echo $row_u[3];
			echo "</td>";
			echo "<td>";
			echo $row_u[4];
			echo "</td>";
			echo "<td>";
			echo $row_u[5];
			echo "</td>";
			echo "<td>";
			echo $row_u[2];
			echo "</td>";
			echo "<td>";
			echo "<a href='?c_id1=$row_u[0]' onclick='return confirmSubmit()' class='print'>
			Delete</a>&nbsp;<a rel='facebox' href='updatesupplier.php?c_id2=$row_u[0]' class='print'>Update</a>";
			echo "</td>";
		}
		?>
        
        </table>
        
      
