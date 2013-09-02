<?php
session_start();

$a=$_SESSION['user'];
$c=$_SESSION['com'];
include("../include/database.php");
$qry_i="select * from invoice where c_id='$c' order by i_no desc";
$res_i=mysql_query($qry_i);
$row=mysql_fetch_array($res_i);
$count=$row[1]+1;
echo $count;
?>

<?php

if(isset($_REQUEST['submit']))
{	
	$t1=$_REQUEST['i_no'];
	$t2=$_REQUEST['i_name'];
	$t3=$_REQUEST['i_address'];
	$t4=$_REQUEST['i_word'];
	$t5=$_REQUEST['i_advance'];
	$t6=$_REQUEST['i_tax'];
	$qry="insert into invoice(i_id,c_id,i_name,i_address,i_word,i_advance,i_tax) values('".$t1."','".$c."','".$t2."','".$t3."','".$t4."','".$t5."','".$t6."')";
	$res=mysql_query($qry);
	
	$h=$_POST['s'];
	$d = count($h);
	for($i=0; $i<$d; $i++)
	{
		
		$q_s=$_POST['s'][$i];
		$q_d=$_POST['d'][$i];
		$q_r=$_POST['r'][$i];
		$q_a=$_POST['a'][$i];
			
	$quo="insert into sub_invoice(i_id,c_id,s_no,des,rate,amt) values('".$t1."','".$c."','".$q_s."','".$q_d."','".$q_r."','".$q_a."')";
	$quo_res=mysql_query($quo);

	}
	
	if($res)
	{
		header("location:invoicedetails.php");
	}
	else
	{
		echo"error";
	}
	
}
if(isset($_REQUEST['cancel']))
{
	header("location:invoicedetails.php");
}


?>
<html>
<head>
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<script>
 var counter = 1;
 function add_phone_field()
 {
  var obj = document.getElementById("phone");
  var data = obj.innerHTML;
  data += "<table class='des'><tr><td><input class='des_sr' type='text' name='s["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='des_in' type='text' name='d["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='des_cap' type='text' name='r["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='des_q' type='text' name='a["+counter+"]' id='person_phone"+counter+"' /></td></tr></table>";
  obj.innerHTML = data;
  counter++;
  }
 </script>
  
</head>

<body>
<div id="container">
	
    
    <div id="sub-header">
    			
                <div class="quo">
                
                
                <form name="form5" action="" method="post" enctype="multipart/form-data">
                <br />
                <div class="quotationI"><center>INVOICE</center></div>
                <br />
                <table class="invoice">
                <tr><td class="l_form">Invoce No:</td>
                <td>
                <input type="text" class="q_in" name="i_no" readonly value="<?php echo $count; ?>">
				</td>
                <tr><td class="l_form">Client Name:</td>
                <td>
                <input type="text" class="q_in" name="i_name">
				</td>
                </tr>
                <tr>
                <td class="l_form">Address:</td><td><textarea class="q_add" name="i_address"></textarea></td></tr>
                </table>
                <table class="invoice1">
                <tr><td class="l_form">&nbsp;</td>
                <td>&nbsp;
                
				</td>
                </tr>
                <tr>
                <td class="l_form">Advance:</td>
                <td>
                <input type="text" class="q_in" name="i_advance" >
				</td>
                </tr>
                <tr>
                <td class="l_form">S.Tax:</td>
                <td>
                <input type="text" class="q_in" name="i_tax">
				</td>
                </tr>
                </table>
                <table class="des">
                <tr class="menu_header">
                <td>Sr.No.</td>
                <td>Particulars</td>
                <td width="100">Rate</td>
                <td width="100">Amount</td>
                </tr>
                <span style="color:#00f;font-size:20px; margin-left:100px;font-weight:bold;cursor:pointer;" onClick="add_phone_field()">[+]</span>
                <tr>
                <td>
                 <input class="des_sr" type="text" name="s[]" id="0"><br>
                </td>
                <td>
                 <input class="des_in" type="text" name="d[]" id="0"><br>
                </td>
                <td>
                 <input class="des_cap" type="text" name="r[]" id="0"><br>
                </td>
                <td>
                 <input class="des_q" type="text" name="a[]" id="0"><br>
                </td>
                
                </tr>
                
                </table>
                
                 <div id="phone">
                
                </div>
                <table class="word">
                <tr>
                <td>Amount In a Word</td>
              
                <td><input type="text" class="i_in" name="i_word"></td>
                </tr>
                </table>
                <div class="invoice_b">
            	<input name="submit" class="formbutton" value=" Submit " type="submit"/>
                <input name="cancel" class="formbutton" value="Cancel" type="submit"/>
                </div>
                
                </form>
  				</div>
                
                </div>
                
        
    
    	<div class="clear"></div>
    
</div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>
</body>
</html>
