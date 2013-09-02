<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$per_page = 19;

$sql = "select * from client";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);
?>
<?php
	if(isset($_REQUEST['c_id1']))
	{
		$s_d=$_REQUEST['c_id1'];
		echo  $c_del="delete from suppliers where s_id='$s_d'";
		$c_dres=mysql_query($c_del);
		if($c_dres)
		{
			header("location:supplier.php?res=suc");
		}
		else	
		{
			header("location:supplier.php?res=er1");
		}
	}
?>
<?php
	if(isset($_REQUEST['add']))
	{
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		
	if(($t1 == "") || ($t2 == "")|| ($t3 == "") || ($t4 == "") || ($t5 == ""))
		{					
            ?>
			<p><font color="#CC0000" size="+1"> ** Record not inserted. All fields are required.</font></p>
            <?php
		}
		else
		{
		$qry_b="insert into suppliers(s_name,s_address,s_mo,s_ph,s_email) values('".$t1."','".$t2."','".$t3."','".$t4."','".$t5."')";
		$res_b=mysql_query($qry_b);

		if($res_b)
		{
			header("location:supplier.php");
		}
		else
		{
			echo "error";
		}
		}
	}
	if(isset($_REQUEST['can']))
	{
		header("location:supplier.php");
	}
?>
<html>
<head>
<title>Jaykar Industries</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="js/addrow.js"></script>
<link rel="shortcut icon" href="images/favicon.ico">
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
	
	$("#content").load("supplierpagination.php?page=1", Hide_Load());



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
		
		$("#content").load("supplierpagination.php?page=" + pageNum, Hide_Load());
	});
	
	
});
	</script>
<script language="javascript">
function confirmSubmit(){
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
        
        <span class="newbook"><a href="#" rel="popuprel" class="popup new">Add New Supplier</a> </span>
        </td>
        </tr>
        </table>
        
        <div class="popupbox" id="popuprel">
		<div id="intabdiv">
        <h2>Add New Supplier</h2>
       
        <table class="b_tab1">
        <tr>
        <td width="130">Name:</td>
        <td>
        <input class="q_in" name="t1" type="text"></td>
        </tr>
        <tr>
        <td>Address:</td>
        <td>
        <textarea class="q_add" name="t2"></textarea></td>
        </tr>
        <tr>
        <td>Mobile No:</td>
        <td>
        <input class="q_in"  name="t3" type="text" /></td>
        </tr>
        <tr>
        <td>Phone No:</td>
        <td>
        <input class="q_in"  name="t4" type="text" /></td>
        </tr>
        <tr>
        <td>Email Id:</td>
        <td>
        <input class="q_in"  name="t5" type="text" /></td>
        </tr>
        </table>
        <br>
         <!-- Vehicle Information ends -->
        <div class="b_button">
        <input type="submit" value="Submit" name="add">
        <input type="submit" value="Cancel" name="can">
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
