<?php
error_reporting(0);
include("include/database.php");

$in=$_REQUEST['c_id2'];

$c_query="select * from clients where c_id=".$in;
$c_res=mysql_query($c_query);
$c_row=mysql_fetch_array($c_res);

$c_emp="select * from emp";
$c_emp_res=mysql_query($c_emp);
?>

<?php

if(isset($_REQUEST['submit']))
{	
		$c=$c_row[0];
		$q_date=$_POST['q_date'];
		$q_name=$_POST['q_name'];
		$q_address=$_POST['q_address'];
		$q_attn=$_POST['q_attn'];
		$q_mo=$_POST['q_mo'];
		
		$quo="insert into quotation(c_id,q_date,q_name,q_address,q_attn,q_mo) values('".$c."','".$q_date."','".$q_name."','".$q_address."','".$q_attn."','".$q_mo."')";
		$quo_res=mysql_query($quo);
		if($quo_res)
		{
			header("location:qbasic.php");
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
<title>Anmol Water Tank Cleaners</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
 
</head>

<body>
<div id="container">
	
    
    <div id="sub-header">
    			
                <div class="quo">
                
                
                <form name="form5" action="" method="post" enctype="multipart/form-data">
                <br />
                
                <div class="quotationI"><center>AMC QUOTATION</center></div>
                <br />
                <table class="q_info">
                <tr><td class="l_form">Date:</td><td><input name="q_date" class="q_in" type="text" value="<?php  echo date("d-m-Y"); ?>"/></td></tr>
                <tr><td class="l_form">Client Name:</td>
                <td>
                <input type="text" class="q_in" name="q_name" value="<?php echo $c_row[2].' '.$c_row[3]; ?>">
				</td>
                </tr>
                <tr><td class="l_form">Address:</td><td><textarea class="q_add" name="q_address"><?php echo $c_row[4]; ?></textarea></td></tr>
                </table>
                <table class="q_info2">
                <tr><td class="l_form">&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td class="l_form">Kind Attn:</td>
                <td>
                <select class="q_add_i" name="q_attn">
				<?php
				while($c_row_emp=mysql_fetch_array($c_emp_res))
				{
					echo "<option>";
					echo $c_row_emp[1];
					echo "</option>";
				}
				?>
                </select>
                </td>
                </tr>
                <tr><td class="l_form">Mo No:</td><td><input name="q_mo" class="q_in" type="text" value="<?php echo $c_row[8]; ?>"/></td>
                </table>
                <br />
               
                <div class="q_button">
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
