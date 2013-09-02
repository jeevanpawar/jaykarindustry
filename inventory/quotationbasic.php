<?php
error_reporting(0);
include("include/database.php");

$in=$_REQUEST['i_id'];

$c_query="select * from quotation where q_id=".$in;
$c_res=mysql_query($c_query);
$c_row=mysql_fetch_array($c_res);

?>

<?php

if(isset($_REQUEST['submit']))
{	
	$a=$_POST['d'];
	$b = count($a);
	for($i=0; $i<$b; $i++)
	{
		$id=$_REQUEST['i_id'];	
		$q_d=$_POST['d'][$i];
		$q_c=$_POST['c'][$i];
		$q_q=$_POST['q'][$i];
		$q_r=$_POST['r'][$i];
		$q_a=$_POST['s'][$i];
		
		$total=$q_q * $q_r * $q_a;
		
	$quo="insert into sub_quotation(q_id,des,capacity,quantity,rate,service,total) values('".$id."','".$q_d."','".$q_c."','".$q_q."','".$q_r."','".$q_a."','".$total."')";
	$quo_res=mysql_query($quo);
	if($quo_res)
	{
		header("location:quotation.php");
	}
	else
	{
		echo"error";
	}
	}
	
}
if(isset($_REQUEST['cancel']))
{
	header("location:invoicedetails.php");
}
?>
<html>
<head>
<title>Anmol Water Tank Cleaners</title>
<link rel="stylesheet" href="styles.css" type="text/css" />

<script>
 var counter = 1;
 function add_phone_field()
 {
  var obj = document.getElementById("phone");
  var data = obj.innerHTML;
  data += "<table class='des'><tr><td><input class='des_in' type='text' name='d["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='des_cap' type='text' name='c["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='des_q' type='text' name='q["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='des_r' type='text' name='r["+counter+"]' id='person_phone"+counter+"' /></td><td><input class='des_ser' type='text' name='s["+counter+"]' id='person_phone"+counter+"' /></td></tr></table>";
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
                
                <div class="quotationI"><center>AMC QUOTATION</center></div>
                <br />
                <table class="q_info3">
                <tr><td class="l_form">Date:</td><td><input name="q_date" class="q_in" type="text" value="<?php  echo date("d-m-Y"); ?>"/></td></tr>
                <tr><td class="l_form">Client Name:</td>
                <td>
                <input type="text" class="q_in" name="q_name" value="<?php echo $c_row[3]; ?>">
				</td>
                </tr>
                <tr><td class="l_form">Address:</td><td><textarea class="q_add" name="q_address"><?php echo $c_row[4]; ?></textarea></td></tr>
                </table>
                <table class="q_info4">
                <tr><td class="l_form">Quotation No</td>
                <td><input name="q_mo" class="q_in" type="text" value="<?php echo $c_row[0]; ?>"/></td></tr>
                <tr><td class="l_form">Kind Attn:</td>
                <td><input name="q_mo" class="q_in" type="text" value="<?php echo $c_row[5]; ?>"/></td>
                </tr>
                <tr><td class="l_form">Mo No:</td><td><input name="q_mo" class="q_in" type="text" value="<?php echo $c_row[6]; ?>"/></td>
                </table>
                <br />
                <table class="des">
                <tr>
                <td class="heading">Description</td>
                <td class="heading">Capacity</td>
                <td class="heading" >Quantity</td>
                <td class="heading">Rate</td>
                <td class="heading">Service in Year</td>
                </tr>
                <span style="color:#00f;font-size:20px;font-weight:bold;cursor:pointer;" onClick="add_phone_field()">[+]</span>
                <tr>
                <td>
                 <input class="des_in" type="text" name="d[]" id="0"><br>
                </td>
                <td>
                 <input class="des_cap" type="text" name="c[]" id="0"><br>
                </td>
                <td>
                 <input class="des_q" type="text" name="q[]" id="0"><br>
                </td>
                <td>
                 <input class="des_r" type="text" name="r[]" id="0"><br>
                </td>
                <td>
                 <input class="des_ser" type="text" name="s[]" id="0"><br>
                </td>
                
                </tr>
                
                </table>
                 <div id="phone">
                
                </div>
                <div class="q_button5">
                
                <input name="submit" class="formbutton" value=" Submit " type="submit" onClick="javascript:return validateMyForm();" />
                <input name="cancel" class="formbutton" value="Cancel" type="submit" />
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
