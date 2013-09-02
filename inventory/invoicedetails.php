<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$per_page = 19;

$sql = "select * from sale";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);

$qry_c="select * from client";
$res_c=mysql_query($qry_c);
?>
<?php
	if(isset($_REQUEST['c_id1']))
	{
		$c_d=$_REQUEST['c_id1'];
		echo  $c_del="delete from invoice where i_id='$c_d'";
		$c_dres=mysql_query($c_del);
		$q1="delete from sub_invoice where i_id='$c_d'";
		$c_dres1=mysql_query($q1);
		
		if($c_dres)
		{
			header("location:invoicedetails.php?res=suc");
		}
		else	
		{
			header("location:invoicedetails.php?res=er1");
		}
	}
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
		
		echo $qry_b="insert into invoice(i_cname,i_date,i_vat,i_total,i_gtotal,po_no,po_date,dc_no,dc_date,i_words) values('".$t1."','".$t2."','".$t3."','".$t4."','".$t5."','".$t6."','".$t7."','".$t8."','".$t9."','".$t10."')";
		$res_b=mysql_query($qry_b);
		$m_id=mysql_insert_id();
		
		$dd=$_POST['d'];
		$ed = count($dd);
		for($i=0; $i<$ed; $i++)
		{	
		    $p1=$_POST['d'][$i];
			$p2=$_POST['qnt'][$i];
			$p3=$_POST['r'][$i];
			$p4=$_POST['value'][$i];
			
			$qry_p="insert into sub_invoice(i_id,i_fg,i_qty,i_rate,i_amt) values('".$m_id."','".$p1."','".$p2."','".$p3."','".$p4."')";
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
	if(isset($_REQUEST['can']))
	{
		header("location:invoicedetails.php");
	}
?>
<html>
<head>
<title>Jaykar Industries</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<link rel="shortcut icon" href="images/favicon.ico">
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
	<script type="text/javascript">
	
	$(document).ready(function(){
		
	//Display Loading Image
	function Display_Load()
	{
	    $("#loading").fadeIn(900,0);
	
	}
	//Hide Loading Image
	function Hide_Load()
	{
		$("#loading").fadeOut('slow');
	};
    //Default Starting Page Results
   
	$("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
	
	Display_Load();
	
	$("#content").load("invoicepagination.php?page=1", Hide_Load());
00000000000


	//Pagination Click
	$("#pagination li").click(function(){
			
		Display_Load();
		
		//CSS Styles
		$("#pagination li")
		.css({'color' : '#0063DC'});
		
		$(this)
		.css({'color' : '#FF0084'})
		.css({'border' : 'none'});

		//Loading Data
		var pageNum = this.id;
		
		$("#content").load("invoicepagination.php?page=" + pageNum, Hide_Load());
	});
});
	</script>
   
<script language="javascript">
function confirmSubmit()
	{
		var agree=confirm("Are you sure to Delete this Entry?");
		if (agree)
			return true ;
		else
			return false ;
	}
</script>
</head>
<body>
<div id="container">
<div id="sub-header">
		<?php
		   include("include/p_header.php");
		?>
        <form action="" method="post">
       	<table class="emp_tab">
        <tr class="search_res">
        <td class="info">
       
        <span class="newbook"><a href="#" rel="popuprel" class="popup new">Create Invoice</a></span>
        </td>
        </tr>
        </table>
        
        <div class="popupbox2" id="popuprel">
		<div id="intabdiv">
        <h2>Invoice Details</h2>
                
                <form name="form5" action="" method="post" enctype="multipart/form-data">
                <table class="invoice">
                                
                <tr><td class="l_form">Select Client:</td>
                <td>
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
                <td><input type="date" class="q_in" name="i_date" ></td>
                </tr>
                 <tr>
                <td class="l_form">PO No:</td>
                <td><input type="text" name="t3" class="q_in" value=""></td>
                 
                <td class="l_form">Date:</td>
                <td><input type="date" name="t4" class="q_in" value="<?php echo date('d-m-Y'); ?>"></td>
                </tr>
                <tr>
                <td class="l_form">DC No:</td>
                <td><input type="text" name="t5" class="q_in" value=""></td>
                
                <input type="text" name="t15" class="q_in"  style="display:none" id="t15">
            
                <td >Date:</td>
                <td><input type="date" name="t6" class="q_in" value="<?php echo date('d-m-Y'); ?>"></td>
                </tr>
                </table>
                <br><br>
                <table class="des">
                <tr class="menu_header">
                <td width="2%">S</td>
                <td width="53%">Particulars</td>
                 <td width="15%">Qty</td>
                <td width="15%">Rate</td>
                <td width="15%">Amount</td>
                </tr>
                
                </table>
                <table class="des" id="dataTable">
                <tr>
                <td width="2%"><input class="ch" type="checkbox" name="chk[]"/></td>
                
                <td width="53%">
                <select  id="product" class="des_cap" name="d[]">
                <?php
				while($row_s=mysql_fetch_array($rsd))
				{
					echo "<option>";
					echo $row_s[1];
					echo "</option>";
				}
				?>
                </select>
                
                </td>
                <td width="15%">
                 <input class="des_cap" type="text" name="qnt[]" id="" value=""><br>
                </td>
                <td width="15%">
                 <input class="des_cap" type="text" name="r[]" id="r" value=""  onkeyup="getValues()"><br>
                </td>
                <td width="15%">
                 <input class="des_q" type="text" name="value[]" id="value" value=""  readonly><br>
                </td>
                </tr>
                </table>
                <div class="adddel">
       			<input type="button" value="+" class="add" onClick="addRow('dataTable')" >&nbsp;
		 		<input type="button" value="-" class="add" onClick="deleteRow('dataTable')" >
         		</div>
                <br>
                <table class="des">
                <tr>
                <td style="border:hidden;" width="20">&nbsp;&nbsp;</td>
                
                <td colspan="5" class="l_form">
                Total:
                </td>
                <td width="100"><input type='text' name='total' id="total" readonly /></td>
                </tr>
                <tr>
                <td style="border:hidden;" width="20">&nbsp;&nbsp;</td>
                
                <td colspan="5" class="l_form">
                VAT @12.5%: RS.
                </td>
                <td width="100"><input type='text' name='vat' id="vat"  onkeyup="getValues()" readonly/></td>
                </tr>
                <tr>
                <td style="border:hidden;" width="20">&nbsp;&nbsp;</td>
                <td colspan="5" class="l_form">
                 Grand Total PO Value:-
                 <div align="right"> Rs:-</div>
                </td>
                <td width="100"> 
                <input type='text' name='g_total' id="g_total" value="" readonly/>
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
               
 				<div class="q_button">
       			 <input type="submit" value="Submit" name="submit">
        		<input type="submit" value="Cancel" name="cancel">
       
      			</div>
				</form>
        
		</div>
        </div>
        <div>        
        <div id="loading" ></div>
		<div id="content" ></div>
        <table width="800px">
	<tr><td>
			<ul id="pagination">
				<?php
				//Show page links
				for($i=1; $i<=$pages; $i++)
				{
					echo '<li id="'.$i.'">'.$i.'</li>';
				}
				?>
	</ul>	
	</td></tr></table>

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
