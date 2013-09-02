<?php
session_start();
$a=$_SESSION['user'];
$c=$_SESSION['com'];
if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
error_reporting(0);

include("../include/database.php");
$id=$_REQUEST['id'];
$m_id='C'.$id;

$qry="select * from reciept where p_id='$id'";
$res=mysql_query($qry);
$row=mysql_fetch_array($res);

$qry_d="select * from partial_payment where p_id=".$id;
$res_d=mysql_query($qry_d);
$row_d=mysql_fetch_array($res_d);

	if(isset($_REQUEST['e_add']))
	{
 		$t1=$_POST['t1'];
 		$t2=$_POST['t2'];
		$date=date('Y-m-d', strtotime($t2));
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$t6=$_POST['t6'];
		
		$pa_qry="insert into reciept(p_id,c_id,b_id,r_date,r_mode,r_no,r_amt,r_word,m_id) values('".$id."','".$c."','".$t1."','".$date."','".$t3."','".$t4."','".$t5."','".$t6."','".$m_id."')";
		$pa_res=mysql_query($pa_qry);
		if($pa_res)
		{
			header("location:addreciept.php?id=$id");
		}
		else
		{
			echo "error";
		}
	}
	
	if(isset($_REQUEST['e_can']))
	{
		header("location:payment.php");
	}
	
	$d=date('d-m-Y');
?>
<html>
<head>
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
</head>
<body>
<div id="container">
	 <div id="sub-header">
    	<?php
			include("include/p_header.php");
		?>
        <div>
        <br />
        <table class="reciept">
        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>No:</td>
        <td><?php echo $row[0]; ?></td>
        </tr>
        <tr>
        <td width="300">&nbsp;&nbsp;&nbsp;Chaturang Tours Pvt Ltd</td>
        <td width="450"></td>
        <td></td>
        <td width="50">Date:</td>
        <td width="50">&nbsp;&nbsp;<?php echo $row[4]; ?></td>
        </tr>
        <tr>
        <td colspan="5" class="high"><center>Reciept</center></td>
        </tr>
        <tr></tr>
        <tr>
        <td colspan="5">&nbsp;&nbsp;&nbsp;Received with thanks from Mr. Mrs./Ms.&nbsp;&nbsp;<u><?php ?></u></td>
        </tr>
        <tr>
        <td colspan="5">&nbsp;&nbsp;&nbsp;Sum Of Rupees:&nbsp;&nbsp;<u><?php echo $row[8]; ?></u></td>
        </tr>
        <tr>
        <td colspan="4">&nbsp;&nbsp;&nbsp;By /Cheque/D.D. No.:&nbsp;&nbsp;<u><?php echo $row[6]; ?></u></td><td>Dated</td>
        </tr>
        <tr>
        <td colspan="5">&nbsp;&nbsp;&nbsp;of</td>
        </tr>
        <tr>
        <td colspan="4">&nbsp;&nbsp;&nbsp;in Full/Part Payment against</td><td>Booking Ref. No.:&nbsp;&nbsp;<u><?php echo $row[3]; ?></u></td>
        </tr>
        <tr>
        </tr>
		<tr>
        </tr>
        <tr>
        <td width="200" class="rs">&nbsp;&nbsp;&nbsp;Rs:<?php echo $row[7].'/-'; ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td width="450" align="center">For Chaturang Tours Pvt. Ltd.</td>
        </tr>
        <tr></tr>
        <tr>
        <td></td>
        <td colspan="5" class="print1"><a href="">Print</a></td>
        </tr>
        </table>
        
        <form name="form1" action="" method="post">
        <table class="pay">
        <tr class="menu_header"><td colspan="2">Add Reciept Details</td></tr>
        <tr>
        <td class="l_form">Bkg No:</td>
        <td><input id="ename" type="text" readonly class="q_in" name="t1" value="<?php echo $row_d[2]; ?>"></td>
        </tr>
        <tr>
        <td class="l_form">Date:</td>
        <td><input id="des" type="text" class="q_in" name="t2" value="<?php echo $d; ?>"></td>
        </tr>
        
        <tr>
        <td class="l_form">Payment Mode:</td>
        <td><input id="des" type="text" class="q_in" name="t3" value="<?php echo $row_d[3]; ?>"></td>
        </tr>
        <tr>
        <td class="l_form">Check No/D.D.No.:</td>
        <td><input id="contact" type="text" class="q_in" name="t4" value="<?php echo $row_d[5]; ?>"></td>
        </tr>
        <tr>
        <td class="l_form">Reciept Amount:</td>
        <td><input id="ename" type="text" readonly name="t5" class="q_in" value="<?php echo $row_d[6]; ?>"></td>
        </tr>
        <tr>
        <td class="l_form">In Words:</td>
        <td><textarea class="q_add" name="t6"></textarea></td>
        </tr>
        </table>
        <div class="pay_button">
         <input name="e_add" class="formbutton" value=" Add " type="submit" />
         <input name="e_can" class="formbutton" value="Cancel" type="submit" />
        </div>
        
        </form>
    </div>
    </div>
        
    
    	<div class="clear"></div>
    </div>
</div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>
</body>
</html>
