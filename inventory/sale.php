<?php
include("../session/session.php");

include("../include/database.php");
$per_page = 19;

$sql = "select * from sale";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);

?>
<?php
$qry_s="select * from stock";
$res_s=mysql_query($qry_s);

	if(isset($_REQUEST['submit']))
	{
		
		$t1=date('Y-m-d', strtotime($_POST['t11']));
		$t2=$_POST['t12'];
		$t3=$_POST['t13'];
		$flag=0;
		$qry_b="insert into sale(sl_pname,sl_pqty,sl_date) values('".$t2."','".$t3."','".$t1."')";
	 	while($row_sl=mysql_fetch_array($rsd))
		{
			if (strcasecmp($row_sl[1],$t2)==0)
			{
				$a=$row_sl[2]+$t3;
				$qry_u="update sale set sl_pqty='".$a."' where sl_pname='$t2'" ;
				$res_b=mysql_query($qry_u) or die(mysql_error());
				$flag=1;
			}
		}
		if($flag==0)
	 		$res_b=mysql_query($qry_b) or die(mysql_error());
		
		$m_id=mysql_insert_id();
		
		$dd=$_POST['pr'];
		$ed = count($dd);
		for($i=0; $i<$ed; $i++)
		{	
		    $p1=$_POST['pr'][$i];
			$p2=$_POST['qnt'][$i];
			
			$qry_p="insert into sub_sale(sl_id,sb_rname,sb_qty) values('".$m_id."','".$p1."','".$p2."')";
			$res_p=mysql_query($qry_p);
			
			$qry_stock="select * from stock where st_name='$p1'";
			$res_stock=mysql_query($qry_stock);
			$row_stock=mysql_fetch_array($res_stock);
			
			$qry_up="update stock SET st_qty=$row_stock[2] - '".$p2."' where st_name='$p1'";
			$res_up=mysql_query($qry_up);
		}
		if($res_up)
		{
			header("location:sale.php");
		}
		else
		{
			echo "error";
		}
	}
	if(isset($_REQUEST['can']))
	{
		header("location:sale.php");
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
<script type="text/javascript" src="custom.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/slider.js"></script>
<script type="text/javascript" src="../js/superfish.js"></script>
<script type="text/javascript" src="../js/toword.js"></script>
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
		 var tax =document.getElementById("stax").value;
		 var vat =document.getElementById("vat").value;
		 var add=total*1;
		 add+=(tax*1);
		  add+=(vat*1);		 
        document.getElementById("total").value = add;
		var words = toWords(add);
		document.getElementById("word").innerHTML=words;
        total=0;
}
function getQuant()
{
	$q1="select * from sub_sale where product=";
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
	
	$("#content").load("salepagination.php?page=1", Hide_Load());
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
		
		$("#content").load("salepagination.php?page=" + pageNum, Hide_Load());
	});
});
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
        <td class="info">
        <span class="newbook"><a href="#" rel="popuprel" class="popup new">Add New Finish Good</a> </span>
        </td>
        </tr>
        </table>
        <div class="popupbox_small" id="popuprel">
		<div id="intabdiv">
        <h2>Add New Finish Good</h2>
                
                <form action="" method="post" name="po">
                <table class="sale">
               <tr>
                <td>Date:</td>
                <td><input type="text" name="t11" class="q_in" value="<?php echo date('d-m-Y'); ?>"></td>
                <td>Product Name:</td>
                <td><input type="text" name="t12" class="q_in" value=""></td>
                <td>Product Quantity:</td>
                <td><input type="text" name="t13" class="q_in" value=""></td>
                </tr>
                </table>
                <br><br>
                <table class="des">
                <tr class="menu_header">
                <td width="2%">S</td>
                <td width="10%">Raw Material</td>
                <td width="10%">Quantity(Kg.)</td>
                </tr>
               
                </table>
                <table class="des" id="dataTable">
                <tr>
                <td width="2%"><input class="ch" type="checkbox" name="chk[]"/></td>
                
                <td width="10%">
                <select name="pr[]" id="product" class="des_cap">
                <?php
				while($row_s=mysql_fetch_array($res_s))
				{
					echo "<option>";
					echo $row_s[1];
					echo "</option>";
				}
				?>
                </select><br>
                </td>
                <td width="15%">
                 <input class="des_cap" type="text" name="qnt[]" id="" value=""  onkeyup="getValues()">
                </td>
                </tr>
                </table>
                 <div class="adddel">
       			<input type="button" value="+" class="add" onClick="addRow('dataTable');add();" >&nbsp;
		 		<input type="button" value="-" class="add" onClick="deleteRow('dataTable')" >
         		</div>
                
 				<div class="i_button">
       			 <input type="submit" value="Submit" name="submit">
        		<input type="submit" value="Cancel" name="cancel">
       
      			</div>
				</form>
        </div>
		</div>
       		<div id="loading" ></div>
			<div id="content" ></div>
            
        	<table width="800px">
			<tr><Td>
			<ul id="pagination">
				<?php
				//Show page links
				for($i=1; $i<=$pages; $i++)
				{
					echo '<li id="'.$i.'">'.$i.'</li>';
				}
				?>
	</ul>	
	</Td></tr></table>

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
