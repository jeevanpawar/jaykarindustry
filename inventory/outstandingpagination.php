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
	$c_qry_f="select * from booking_form where c_id='$c' order by b_id desc limit $start,$per_page";
	$c_res_f=mysql_query($c_qry_f);
	$row=mysql_num_rows($c_res_f);
	
	
?>
<?php
if(isset($_REQUEST['go']))
{
	$t1=$_REQUEST['result'];
	$qry="select * from Booking_form where b_id='$t1'";
	$res=mysql_query($qry);
	$count=mysql_num_rows($res);
}
?>

        <form action="" method="post">
       	<table class="emp_tab">
        <tr class="search_res">
        <td class="info">
        <a href="outstandingpdf.php">Print</a>
        Outstanding Reports
        </td>        
        </tr>
        </table>
        </div>
        </form>

        <table class="emp_tab" id="history">
        <tr class="menu_header">
        <td width="150">Bkg No</td>
        <td width="150">Bkg Date</td>
        <td>SE</td>
        <td>Client Name</td>
        <td width="150">Paid Amt</td>
        <td width="150">Package Amt</td>
        <td width="90">Action</td>
        </tr>
        <?php
		while($c_row=mysql_fetch_array($c_res_f))
		{
		
		$qry_paid="select SUM(p_amt) from partial_payment where b_id='$c_row[0]' and c_id='$c'";
		$res_paid=mysql_query($qry_paid);
		$row_paid=mysql_fetch_array($res_paid);
		if($c_row[8]!=$row_paid[0])
		{
        echo "<tr class='pagi'>";
        echo "<td>";
		echo $c_row[0];
		echo "</td>";
		echo "<td>";
		echo date('d-m-Y', strtotime($c_row[2]));
		echo "</td>";
		echo "<td>";
		echo $c_row[3];
		echo "</td>";
		echo "<td>";
		echo $c_row[4];
		echo "</td>";
		echo "<td>";
		echo $row_paid[0];
		echo "</td>";
		echo "<td>";
		echo $c_row[8];
		echo "</td>";
		echo "<td class='print'>";
		echo "<a href='pay.php?id=$c_row[0]'>Pay</a>";
		echo "</td>";
		}
		}
		?>
      
        </table>
