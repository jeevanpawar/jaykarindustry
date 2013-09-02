<?php
session_start();
error_reporting(0);
include("../include/database.php");
$a=$_SESSION['user'];
$c=$_SESSION['com'];

	
	if(isset($_REQUEST['e_can']))
	{
		header("location:term.php");
	}
	
	if(isset($_REQUEST['e_up']))
	{	

		$t1=$_POST['title'];
		$t2=$_POST['term'];
		
		$qry_up="insert into terms(title,des) values('".$t1."','".$t2."')";
	
		$res_up=mysql_query($qry_up);
		
		if($res_up)
		{
			header("location:term.php");
		}
		else
		{
			echo "error";
		}
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />


</head>

<body>
<div id="container">
	<div id="sub-header">
    <?php
		include("include/p_header.php");
	?>
    	<br />
		<div class="quotation"><center>Add Terms & Conditions</center></div>
        <div>
        <form action="" method="post">
        <table class="addemp_tab">
        <tr>
        <td class="l_form">Title:</td>
        <td><input type="text" class="q_in" name="title"></td>
        </tr>
        <tr>
        <td class="l_form">Terms & Conditions:</td>
        <td><textarea class="q_term" name="term"></textarea></td>
        </tr>
        
        </div>
        </table>
        <div class="addemp_b">
         <input name="e_up" class="formbutton" value=" ADD " type="submit" />
         <input name="e_can" class="formbutton" value="Cancel" type="submit" />
        </div>
        
        </form>
    </div>
    </div>
        
    
    	<div class="clear"></div>
    </div>
</div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>
</body>
</html>
