<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$per_page = 19;

$sql = "select * from stock";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);

if(isset($_REQUEST['go']))
{
	$t1=$_REQUEST['result'];
	$qry="select * from Booking_form where b_id='$t1'";
	$res=mysql_query($qry);
	$count=mysql_num_rows($res);
}
?>
<?php
$qry_s="select * from suppliers";
$res_s=mysql_query($qry_s);

$qry_m="select * from meal";
$res_m=mysql_query($qry_m);

$qry_room="select * from room_type";
$res_room=mysql_query($qry_room);

$qry_v="select * from vehicle";
$res_v=mysql_query($qry_v);

$qry_com="select * from company where comp_id='$c'";
$res_com=mysql_query($qry_com);
$row_com=mysql_fetch_array($res_com);

?>
<?php
	if(isset($_REQUEST['add']))
	{
	
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$t6=$_POST['t6'];
		$qry_b="insert into stock(stock_id,st_name,sup_name,st_qty,com_prise,sell_prise) values('".$t1."','".$t2."','".$t3."','".$t4."','".$t5."','".$t6."')";
		$res_b=mysql_query($qry_b);

		if($res_b)
		{
			header("location:stock.php");
		}
		else
		{
			echo "error";
		}
	}
	if(isset($_REQUEST['can']))
	{
		header("location:stock.php");
	}
?>
<html>
<head>
<title>Jaykar Industries</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
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
	
	$("#content").load("createdelpagignation.php?page=1", Hide_Load());



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
		
		$("#content").load("createdelpagignation.php?page=" + pageNum, Hide_Load());
	});
	
	
});
	</script>
<script language="javascript">
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
        <input class="searchfield" type="text" value="Search..." onFocus="if (this.value == 'Search...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Search...';}" name="result" />
        <input class="go" name="go" type="submit" value="Search">
     	Create New Invoice
        </td>
        </tr>
        </table>
        
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
