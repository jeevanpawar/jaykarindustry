<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$id=$_REQUEST['id'];
$sid='s'.$id;

$qry_s="select * from purches where s_id='$id'";
$res_s=mysql_query($qry_s);
$row_s=mysql_fetch_array($res_s);

$qry_sn="select * from supplier where s_name='$row_s[5]'";
$res_sn=mysql_query($qry_sn);
$row_sn=mysql_fetch_array($res_sn);

$qry_d="select * from partial_payment where sl_id='$sid'";
$res_d=mysql_query($qry_d);

$qry_sum="select SUM(p_amt) from partial_payment where sl_id='$sid'";
$res_sum=mysql_query($qry_sum);
$row_sum=mysql_fetch_array($res_sum);

$bal=$row_s[4]-$row_sum[0];

	if(isset($_REQUEST['e_add']))
	{
 		$t1=$_POST['t1'];
 		$t2=$_POST['t2'];
		$date=date('Y-m-d', strtotime($t2));
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$t6=$_POST['bank'];
		$pa_qry="insert into partial_payment(sl_id,c_name,p_date,p_mode,p_check,p_amt,bank) values('".$sid."','".$t1."','".$date."','".$t3."','".$t4."','".$t5."','".$t6."')";
		$pa_res=mysql_query($pa_qry);
		
		if($pa_res)
		{
			header("location:subpay.php?id=$id");
		}
		else
		{
			echo "error";
		}
	}
	
	if(isset($_REQUEST['e_can']))
	{
		header("location:subpay.php?id=$id");
	}
	
	$d=date('d-m-Y');
?>

<html>
<head>
<title>Jaykar Industries</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<link rel="shortcut icon" href="images/favicon.ico">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="custom.js"></script>
</head>
<body>
		<div id="container">
	 	<div id="sub-header">
    	<?php
			include("include/p_header.php");
		?>
       	<div>
        <table class="emp_tab">
        <tr class="search_res">
        <td class="info">
        <center>Supplier:<?php echo $row_s[5]; ?></center>
        </td>
        </tr>
        </table>
        <span class="bank"><a href="#" rel="popuprel" class="popup new">New Payment</a> </span>
        <br>
        <table class="detail">
        <tr class="menu_header">
     
        <td width="150">Date</td>
        <td width="180">Payment Mode</td>
        <td width="300">Bank Name</td>
        <td>Check No</td>
        <td width="120">Amount</td>
        </tr>
        <?php
		while($row_d=mysql_fetch_array($res_d))
		{
			echo "<tr class='pagi'>";
			
			echo "<td>";
			echo date('d-m-Y', strtotime($row_d[4]));
			echo "</td>";
			echo "<td>";
			echo $row_d[3];
			echo "</td>";
			echo "<td>";
			echo $row_d[7];
			echo "</td>";
			echo "<td>";
			echo $row_d[5];
			echo "</td>";
			echo "<td>";
			echo $row_d[6].'&nbsp;'.'Rs/-';
			echo "</td>";
			echo "</tr>";
		}
		?>
        <tr class="pagi">
        <td></td>
        <td width="50"></td>
        <td></td>
        <td>Total Paid:</td>
        <td><?php echo $row_sum[0].'&nbsp;'.'Rs/-'; ?></td>
        </tr>
        <tr class="pagi">
        <td></td>
        <td width="50"></td>
        <td></td>
        <td>Total Amount:</td>
        <td><?php echo $row_s[4].'&nbsp;'.'Rs/-'; ?></td>
        </tr>
         <?php
		if($bal!= '0')
		{
			echo "<tr class='pagi'>";
			echo "<td></td>";
			echo "<td width='50'></td>";
			echo "<td></td>";
			echo "<td>Balance</td>";
			echo "<td style='color:#F00'>$bal&nbsp;Rs/-</td>";
			echo "</tr>";
		}
		?>
		
        </table>
        <div class="popupbox_pay" id="popuprel">
		<div id="intabdiv">
        <form name="" action="" method="post">
        <table class="pay">
        <tr><td colspan="2"><center>Supplier Payment Details</center></td></tr>
        <tr>
        <td class="l_form">Name:</td>
        <td><input id="ename" type="text" readonly class="q_in" name="t1" value="<?php echo $row_s[5]; ?>"></td>
        </tr>
        <tr>
        <td class="l_form">Date:</td>
        <td><input id="des" type="text" class="q_in" name="t2" value="<?php echo $d; ?>"></td>
        </tr>
        
        <tr>
        <td class="l_form">Payment Mode:</td>
        <td>
        <select class="a" name="t3">
        <option name="image">Cheque</option>
        <option name="text">Cash</option>
        </select>
        </td>
        </tr>
       	<tr>
        <td class="l_form">Bank Name:</td>
        <td><input id="contact" type="text" class="q_in" name="bank"></td>
        </tr>
		
        <tr>
        <td class="l_form">Cheque No:</td>
        <td><input id="contact" type="text" class="q_in" name="t4"></td>
        </tr>
        
        <tr>
        <td class="l_form">Balance:</td>
        <td><input id="ename" type="text" readonly class="q_in" value="<?php echo $bal; ?>"></td>
        </tr>
        <?php
		
        echo "<tr>";
        echo "<td class='l_form'>Pay Amount:</td>";
        echo "<td><input id='i_amt' type='text' class='q_in' name='t5'></td>";
        echo "</tr>";
		
		?>
		</table>
        <?php
		
		echo "<div class='pay_b'>";
        echo "<input name='e_add' value=' Add ' type='submit' />&nbsp;";
        echo "<input name='e_can' value='Cancel' type='submit' />";
        echo "</div>";
		
		?>
        </form>
        
        </div>
        </div>
    </div>
    </div>
        
    <div id="fade"></div>
    	<div class="clear"></div>
    </div>
</div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>
</body>
</html>
