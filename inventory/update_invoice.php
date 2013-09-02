<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$per_page = 19;

$id=$_REQUEST['c_id2'];

$sql = "select * from sale";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);

$qry_c="select * from client";
$res_c=mysql_query($qry_c);

$qry_ic="select * from invoice where i_id=".$id;
$res_ic=mysql_query($qry_ic);
$row_ic=mysql_fetch_array($res_ic);
?>
<?php
	if(isset($_REQUEST['submit']))
	{
		$t1=$_POST['client_nm'];
		$t2=date('Y-m-d', strtotime($_POST['i_date']));
		$t3=$_POST['vat'];
		$t4=$_POST['total'];
		$t5=$_POST['g_total'];
		$t6=$_POST['t3'];
		$t7=date('Y-m-d', strtotime($_POST['t4']));
		$t8=$_POST['t5'];
		$t9=date('Y-m-d', strtotime($_POST['t6']));
		$t10=$_POST['t15'];
		
		$qry_b="UPDATE `invoice` SET `i_cname`='".$t1."',`i_date`='".$t2."',`i_vat`='".$t3."',`i_total`='".$t4."',`i_gtotal`='".$t5."',`po_no`='".$t6."',`po_date`='".$t7."',`dc_no`='".$t8."',`dc_date`='".$t9."',`i_words`='".$t10."' WHERE i_id=".$id;
		
		$res_b=mysql_query($qry_b);

		$qry_d="delete from sub_invoice where i_id='$id'";
		$res_d=mysql_query($qry_d);
		
		$dd=$_POST['d'];
		$ed = count($dd);
		for($i=0; $i<$ed; $i++)
		{	
			$p1=$_POST['d'][$i];
			$p2=$_POST['qnt'][$i];
			$p3=$_POST['r'][$i];
			$p4=$_POST['value'][$i];
			
			$qry_p="insert into sub_invoice(i_id,i_fg,i_qty,i_rate,i_amt) values('".$id."','".$p1."','".$p2."','".$p3."','".$p4."')";
			$res_p=mysql_query($qry_p);
		}
		if($res_b)
		{
			header("location:invoicedetails.php");
		}
		else
		{
			echo "error";
		}
	}
	if(isset($_REQUEST['cancel']))
	{
		header("location:invoicedetails.php");
	}
?>
<html>
<head>
<title>Jaykar Industries</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="js/addrow.js"></script>
<script type="text/javascript" src="../js/slider.js"></script>
<script type="text/javascript" src="../js/superfish.js"></script>
<script type="text/javascript" src="custom.js"></script>
<script type="text/javascript" src="../js/toword.js"></script>
<script>
function showUser(str)
{
  if (str=="")
  {
  	document.getElementById("txtHint").innerHTML="";
  	return;
  } 
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  	xmlhttp=new XMLHttpRequest();
  }
  else
  {// code for IE6, IE5
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
   if (xmlhttp.readyState==4 && xmlhttp.status==200)
   {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
   }
  }
  xmlhttp.open("GET","getUser.php?q="+str,true); 
  xmlhttp.send();
}
</script>
 <script>
var total = 0;
function getValues() {
var qty = 0;
var rate = 0;
var obj = document.getElementsByTagName("input");
      for(var i=0; i<obj.length; i++){
         if(obj[i].name == "qnt[]")
		 {
			 var qty = obj[i].value;		
		 }
         if(obj[i].name == "r[]")
		 {
			 var rate = obj[i].value;
		 }
         if(obj[i].name == "value[]")
		 {
          		if(qty > 0 && rate > 0)
				{
					obj[i].value = qty*rate;
					total+=(obj[i].value*1);
				}
				else
				{
					obj[i].value = 0;
				    total+=(obj[i].value*1);
				}
          }
		 }
		 var vat =document.getElementById("vat").value;
		 var add=total*1;
		 var v1=(total*125)/1000;
		 add+=(v1*1);		 
        document.getElementById("total").value = total*1;
		document.getElementById("vat").value = v1*1;
		document.getElementById("g_total").value = add*1;
		var words = toWords(add);
		document.getElementById("word").innerHTML=words;
		document.getElementById("t15").value = words;
        total=0;
		add=0;
}
</script>
</head>
<body>
<div id="container">
<div id="sub-header">
		<?php
		   include("include/p_header.php");
		?>
        
       	<table class="emp_tab">
        <tr class="search_res">
        <td class="info" align="center">Update Invoice</td>
        </tr>
        </table> 
        <form name="form5" action="" method="post" enctype="multipart/form-data">
        <div class="main">
        <table class="invoice_u">
        <tr><td class="l_form">Select Client:</td>
        <td><option value="0"><?php echo $row_ic[1]; ?></option>
        <select name="client_nm" id="client_nm" class="q_in">
        <?php
        while($row_c=mysql_fetch_array($res_c))
        {
            echo "<option>";
            echo $row_c[1];
            echo "</option>";
        }
        ?>
        </select>
        </td>
       <td class="l_form">Date</td>
        <td><input type="date" class="q_in" name="i_date" value="<?php echo $row_ic[2]; ?>"></td>
        </tr>
         <tr>
        <td class="l_form">PO No:</td>
        <td><input type="text" name="t3" class="q_in" value="<?php echo $row_ic[6]; ?>"></td>
         
        <td class="l_form">Date:</td>
        <td><input type="date" name="t4" class="q_in" value="<?php echo $row_ic[7]; ?>"></td>
        </tr>
        <tr>
        <td class="l_form">DC No:</td>
        <td><input type="text" name="t5" class="q_in" value="<?php echo $row_ic[8]; ?>"></td>
        
        <input type="text" name="t15" class="q_in"  style="display:none" id="t15">
    
        <td >Date:</td>
        <td><input type="date" name="t6" class="q_in" value="<?php echo $row_ic[9]; ?>"></td>
        </tr>
        </table>
        <br><br>
        <table class="des_u">
        <tr class="menu_header">
        <td width="2%">S</td>
        <td width="53%">Particulars</td>
         <td width="15%">Qty</td>
        <td width="15%">Rate</td>
        <td width="15%">Amount</td>
        </tr>
        
        </table>
        <table class="des_u" id="dataTable">
        <?php
		$qry_sd="select * from sub_invoice where i_id=".$id;
		$res_sd=mysql_query($qry_sd);
		
		$qry_sd1="select * from sub_invoice where i_id='$id'";
		$res_sd1=mysql_query($qry_sd1);
		$row_sd1=mysql_fetch_array($res_sd1);
		
		while($row_sd=mysql_fetch_array($res_sd))
		{
			echo "<tr>";
			echo "<td width='2%'>";
			echo "<input class='ch' type='checkbox' name='chk[]'/>";
			echo "</td>";
			echo "<td width='53%'>";
			echo "<select id='product' class='des_cap' name='d[]'>";
			
			echo "<option>";
			echo $row_sd[2];
			echo "</option>";
			
			$qry_a="select * from sale";
			$res_a=mysql_query($qry_a);
			while($row_a=mysql_fetch_array($res_a))
			{
			echo "<option>";
			echo $row_a[1];
			echo "</option>";
			}
			echo "<select>";
			echo "</td>";
			echo "<td width='15%'>";
			echo "<input class='des_cap' type='text' name='qnt[]' id='' value='$row_sd[3]'>";
			echo "</td>";
			echo "<td width='15%'>";
			echo "<input class='des_cap' type='text' name='r[]' id='r' value='$row_sd[4]' onkeyup='getValues()'>";
			echo "</td>";
			echo "<td width='15%'>";
			echo "<input class='des_cap' type='text' name='value[]' id='value' value='$row_sd[5]' readonly>";
			echo "</td>";
			echo "</tr>";
		}
		?>
        
        </table>
        <div class="adddel_u">
        <input type="button" value="+" class="add" onClick="addRow('dataTable')" >&nbsp;
        <input type="button" value="-" class="add" onClick="deleteRow('dataTable')" >
        </div>
        <br>
        <table class="des_u">
        <tr>
        <td style="border:hidden;" width="20">&nbsp;&nbsp;</td>
        
        <td colspan="5" class="l_form">
        Total:
        </td>
        <td width="100"><input type='text' name='total' id="total"  value="<?php echo $row_ic[4]; ?>" readonly /></td>
        </tr>
        <tr>
        <td style="border:hidden;" width="20">&nbsp;&nbsp;</td>
        
        <td colspan="5" class="l_form">
        VAT @12.5%: RS.
        </td>
        <td width="100"><input type='text' name='vat' id="vat"  value="<?php echo $row_ic[3]; ?>"  onkeyup="getValues()" readonly/></td>
        </tr>
        <tr>
        <td style="border:hidden;" width="20">&nbsp;&nbsp;</td>
        <td colspan="5" class="l_form">
         Grand Total PO Value:-
         <div align="right"> Rs:-</div>
        </td>
        <td width="100"> 
        <input type='text' name='g_total' id="g_total"  value="<?php echo $row_ic[5]; ?>" readonly/>
        </td>               
        </tr>
        <tr>
        <td style="border:hidden;" width="20">&nbsp;&nbsp;</td>
        <td colspan="6" class="l_form">
        Order Value (in words):-
        <h4><div id='word'></div></h4>
        </td>                              
        </tr>
        </table>
       
        <div class="q_button_u">
         <input type="submit" value="Update" name="submit">
        <input type="submit" value="Cancel" name="cancel"><br><br>

        </div>
           </div>
        </form>
     
		</div>
        </div>
        
</body>
</html>
