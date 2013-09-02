<?php
	include("../session/session.php");
	error_reporting(0);
	include("../include/database.php");
	$per_page = 20; 
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
        <input class="searchfield" type="text" value="Search..." onfocus="if (this.value == 'Search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}" name="result" />
        <input class="go" name="go" type="submit" value="Search">
        Pay Information
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
        <td width="90">Balance (<span style="font-family:rupee;font-size:13px">R)</td>
        <td width="110">Total Amt (<span style="font-family:rupee;font-size:13px">R)</td>
        <td width="90">Clients</td>
        <td width="90">Hotel/Vendor</td>
        <td width="90">Transport</td>
        </tr>
        <?php
		while($c_row=mysql_fetch_array($c_res_f))
		{
        $qry_p="select SUM(p_amt) from partial_payment where b_id='$c_row[0]'";
		$res_p=mysql_query($qry_p);
		$row_p=mysql_fetch_array($res_p);
		$balance=$c_row[8]-$row_p[0];
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
		echo $balance;
		echo "</td>";
		echo "<td>";
		echo $c_row[8];
		echo "</td>";
		

		if($c_row[8]==$row_p[0])
		{
		echo "<td class='print'>";
		echo "<a href='pay.php?id=$c_row[0]'>Paid</a>";
		echo "</td>";
		}
		else
		{
		echo "<td class='insert'>";
		echo "<a href='pay.php?id=$c_row[0]'>Pay</a>";
		echo "</td>";
		}
		$qry_h="select * from hotel_pay where b_id='$c_row[0]'";
		$res_h=mysql_query($qry_h);
		$hotel=mysql_num_rows($res_h);
		
		$row_h=mysql_fetch_array($res_h);
		if($hotel > 0)
		{
		echo "<td class='print'>";
		echo "<a href='hotelpay.php?id=$c_row[0]'>Pay</a>";
		echo "</td>";
		}
		else
		{
		echo "<td class='insert'>";
		echo "<a href='hotelpay.php?id=$c_row[0]'>Pay</a>";
		echo "</td>";
		}
		$qry_h="select * from trans_pay where b_id='$c_row[0]'";
		$res_h=mysql_query($qry_h);
		$trans=mysql_num_rows($res_h);
		if($trans>0)
		{
		echo "<td class='print'>";
		echo "<a href='transpay.php?id=$c_row[0]'>Pay</a>";
		echo "</td>";
		echo "</tr>";
		}
		else
		{
		echo "<td class='insert'>";
		echo "<a href='transpay.php?id=$c_row[0]'>Pay</a>";
		echo "</td>";
		echo "</tr>";	
		}
		}
		?>
      
        </table>
