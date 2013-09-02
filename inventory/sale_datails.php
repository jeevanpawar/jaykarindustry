<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$per_page =19;

$sql = "select * from sale";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);

$qry_c="select * from client";
$res_c=mysql_query($qry_c);
?>
<?php
	if(isset($_REQUEST['submit']))
	{
		$t1=$_POST['client_nm'];
		$t2=date('Y-m-d', strtotime($_POST['i_date']));
		$t3=$_POST['vat'];
		$t4=$_POST['total'];
		$t5=$_POST['g_total'];
		
		$qry_b="insert into invoice(i_cname,i_date,i_vat,i_total,i_gtotal) values('".$t1."','".$t2."','".$t3."','".$t4."','".$t5."')";
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
			
			$qry_sale="select * from sale where sl_pname='$p1'";
			$res_sale=mysql_query($qry_sale);
			$row_sale=mysql_fetch_array($res_sale);
			
			$qry_up="update sale SET sl_pqty=$row_sale[2] - '".$p2."' where sl_pname='$p1'";
			$res_up=mysql_query($qry_up);
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
<link rel="stylesheet" href="jquery-ui.css" />
<script src="jquery-1.8.2.js"></script>
<script src="jquery-ui.js"></script>
<script type="text/javascript">
$(function(){
	$('.datepicker').live('click', function() {
    $(this).datepicker('destroy').datepicker({changeMonth: true,changeYear: true,dateFormat: "yy-mm-dd",yearRange: "1900:+10",showOn:'focus'}).focus();
    });
});
</script>
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
        total=0;
		add=0;
}

</script>

	<script type="text/javascript">
	function chk()
	{
		if(document.getElementById("d1").value!='' && document.getElementById("d2").value!='')
		{
			return(true);
		}
		else
		{
		  alert("Select date");
			return(false);
		}
	}
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
	
	$("#content").load("sale_pagination.php?page=1", Hide_Load());
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
		
		$("#content").load("sale_pagination.php?page=" + pageNum, Hide_Load());
	});
	
	
});
	</script>
   
<script language="javascript">
function getText(){
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
       
        <td class="info" ><span class="newbook"><a href="#" rel="popuprel" class="popup new">Sales Report</a> </span>  
        </td>
        </tr>
        </table>
        
        <div class="popupbox7" id="popuprel">
		<div id="intabdiv">
        <h2>Sales Details</h2>
                
                <form name="form5" action="rptSale.php" method="post" onSubmit="return chk()">
 				 Select Date1 : <input type="text" name="dt1" class="datepicker" id="d1" >
                 <br/><br/>
                 Select Date2 : <input type="text" name="dt2" class="datepicker" id="d2">
                 <br/><br/>
 				 <div class="i_button29">                 
                 <input type="submit" name="go" value="Show">
                 </div> 
				</form>
        
		</div>
        </div>
        
        <div id="loading" ></div>
		<div id="content" ></div>
        
        <table width="800px">
        
	<tr>
    <td>
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
