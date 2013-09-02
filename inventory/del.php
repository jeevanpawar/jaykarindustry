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
		echo  $c_del="delete from dc where d_id='$c_d'";
		$c_dres=mysql_query($c_del);
		$q1="delete from sub_dc where d_id='$c_d'";
		$c_dres1=mysql_query($q1);
		
		if($c_dres)
		{
			header("location:del.php?res=suc");
		}
		else	
		{
			header("location:del.php?res=er1");
		}
	}
	if(isset($_REQUEST['submit']))
	{
		$t1=date('Y-m-d', strtotime($_POST['t1']));
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$t6=$_POST['t6'];
		$qry_b="insert into dc(d_date,d_cname,doc_no,doc_date,ch_no,ch_date) values('".$t1."','".$t2."','".$t3."','".$t4."','".$t5."','".$t6."')";
		$res_b=mysql_query($qry_b);
		
		$m_id=mysql_insert_id();
		$dd=$_POST['pr'];
		$ed = count($dd);
		for($i=0; $i<$ed; $i++)
		{	
		  	$p1=$_POST['pr'][$i];
		  	$p2=$_POST['qnt'][$i];
			
		  	$qry_p="insert into sub_dc(d_id,d_des,d_qty) values('".$m_id."','".$p1."','".$p2."')";
			$res_p=mysql_query($qry_p);
			
			$qry_sale="select * from sale where sl_pname='$p1'";
			$res_sale=mysql_query($qry_sale);
			$row_sale=mysql_fetch_array($res_sale);
			
			$qry_up="update sale SET sl_pqty=$row_sale[2] - '".$p2."' where sl_pname='$p1'";
			$res_up=mysql_query($qry_up);
		}
		if($res_b)
		{
			header("location:del.php");
		}
		else
		{
			echo "error";
		}
	}
	if(isset($_REQUEST['cancel']))
	{
		header("location:del.php");
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
	
	$("#content").load("delpagignation.php?page=1", Hide_Load());
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
		
		$("#content").load("delpagignation.php?page=" + pageNum, Hide_Load());
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
function getValues(val){

var numVal1=parseInt(document.getElementById("one").value);
var numVal2=parseInt(document.getElementById("two").value);

var totalValue = numVal1 + numVal2;

document.getElementById("main").value = totalValue;
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
       
        <span class="newbook"><a href="#" rel="popuprel" class="popup new">Add New DC</a> </span>
        </td>
        </tr>
        </table>
        <div class="popupbox_small" id="popuprel">
		<div id="intabdiv">
        <h2>Add New Delivery Challan</h2>
                
                <form action="" method="post" name="po">
                <table class="sale">
               <tr>
               <td>Client Name:</td>
 				<td>
            	<select name="t2" id="c_name" class="q_in">
                <?php
				while($row_c=mysql_fetch_array($res_c))
				{
					echo "<option>";
					echo $row_c[1];
					echo "</option>";
				}
				?>
                </select><br>
                </td>
                <td>Date:</td>
                <td><input type="text" name="t1" class="q_in" value="<?php echo date('d-m-Y'); ?>"></td>
                
                </tr>
                  <tr>
                <td>Document No:</td>
                <td><input type="text" name="t3" class="q_in" value=""></td>
                 
                <td>Date:</td>
                <td><input type="date" name="t4" class="q_in" value="<?php echo date('d-m-Y'); ?>"></td>
                </tr>
                <tr>
                <td>Your Ch. No:</td>
                <td><input type="text" name="t5" class="q_in" value=""></td>
            
                <td>Date:</td>
                <td><input type="date" name="t6" class="q_in" value="<?php echo date('d-m-Y'); ?>"></td>
                </tr>
                </table>
                <br><br>
                <table class="des">
                <tr class="menu_header">
                <td width="2%">S</td>
                <td width="10%">Finish Good </td>
                <td width="10%">Quantity(Kg.)</td>
                </tr>
               
                </table>
                <table class="des" id="dataTable">
                <tr>
                <td width="2%"><input class="ch" type="checkbox" name="chk[]"/></td>
                
                <td width="10%">
                <select name="pr[]" id="product" class="des_cap">
                <?php
				while($row_rs=mysql_fetch_array($rsd))
				{
					echo "<option>";
					echo $row_rs[1];
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
