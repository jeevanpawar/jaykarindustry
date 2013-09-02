<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$per_page = 19;

$sql = "select * from stock";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);

$sql1="select * from suppliers";
$res_s = mysql_query($sql1);

?>

<?php
	if(isset($_REQUEST['add']))
	{
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$date1=$_POST['date1'];
     $qry_b="insert into stock(st_name,st_qty) values('".$t1."','".$t3."')";
	 $qry_c=" select * from stock";
	 $res_c=mysql_query($qry_c) or die(mysql_error());
	 $flag=0;
	 while($row_c=mysql_fetch_array($res_c))
		{
			if (strcasecmp($row_c[1],$t1)==0)
			{
				$a=$row_c[2]+$t3;
				$qry_u="update stock set st_qty='".$a."' where st_name='$t1'" ;
				$res_b=mysql_query($qry_u) or die(mysql_error());
				$flag=1;
		    }
			
		}
		if($flag==0)
	 		$res_b=mysql_query($qry_b) or die(mysql_error());
		
		$qry_i="insert into purches(st_name,st_qty,st_amount,sup_name,date)value('".$t1."','".$t3."','".$t4."','".$t2."','".$date1."')";
		$res_i=mysql_query($qry_i) or die(mysql_error());
		if($res_i)
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
	
	$("#content").load("stockpagination.php?page=1", Hide_Load());
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
		
		$("#content").load("stockpagination.php?page=" + pageNum, Hide_Load());
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
        
        <span class="newbook"><a href="#" rel="popuprel" class="popup new">Add New Raw Material</a> </span>
        </td>
        </tr>
        </table>
        
        <div class="popupbox" id="popuprel">
		<div id="intabdiv">
        <h2>Add New Raw Material</h2>
       
        <table class="b_tab1">
         <tr>
        <td>Date:</td>
        <td>
        <input type="date" class="q_in" name="date1"></td>
        </tr>
        <tr>
        <td>Stock Name:</td>
        <td>
        <input type="text" class="q_in" name="t1"></td>
        </tr>
        <tr>
        <td>Supplier Name:</td>
        <td>
        <select class="a" name="t2">
        <?php
		while($row_s=mysql_fetch_array($res_s))
		{
			echo "<option>";
			echo $row_s[1];
			echo "</option>";
		}
		?>
        </select>
        </td>
        </tr>
        <tr>
        <td>Quantity in Kg:</td>
        <td>
        <input class="q_in"  name="t3" type="text" /></td>
        </tr>
     	<tr>
        <td>Amount:</td>
        <td>
        <input class="q_in"  name="t4" type="text" /></td>
        </tr>
        </table>
        <br>
         <!-- Vehicle Information ends -->
        <div class="b_button">
        <input type="submit" value="Submit" name="add">
        <input type="submit" value="Cancel" name="can">
        </div>
       
        </div>
		</div>
        
        <!--FInish Good-->
	    
        
         </form>
       
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
