<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
	$e_qry_f="select * from terms";
	$e_res_f=mysql_query($e_qry_f);
		
?>
<?php
	if(isset($_REQUEST['e_id1']))
	{
		$e_d=$_REQUEST['e_id1'];
		$e_del="delete from terms where t_id=".$e_d;
		$e_dres=mysql_query($e_del);
		if($e_dres)
		{
			header("location:term.php");
		}
		else
		{
			echo "error";
		}
	}
?>
<?php
if(isset($_REQUEST['e_can']))
	{
		header("location:term.php");
	}
	
	if(isset($_REQUEST['e_up']))
	{	

		$t1=$_POST['title'];
		$t2=$_POST['term'];
		
	if(($t1 == "") || ($t2 == ""))
		{					
            ?>
			<p><font color="#CC0000" size="+1"> ** Record not inserted. All fields are required.</font></p>
            <?php
			
		}
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
<title>Jaykar Industries</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="js/addrow.js"></script>
<script type="text/javascript" src="custom.js"></script>
         

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
	    <span class="newbook"><a href="#" rel="popuprel" class="popup new">New</a> </span>  
        </td>        </tr>
        </table>
        <div class="popupbox3" id="popuprel">
		<div id="intabdiv3">
        <h2>Terms and Conditions</h2>
        <table class="addterm_tab">
        <tr>
        <td class="l_form">Title:<br>
        <input type="text" class="q_in" name="title"><br><br></td>
        </tr>
        <tr>
        <td class="l_form">Details:<br>
        <textarea class="q_term" name="term"></textarea></td>
        </tr>
        </table>
        <div class="b_term">
        <input type="submit" value="Submit" name="e_up">
        <input type="submit" value="Cancel" name="e_can">
        </div>
		</form>	
		</div>
        </div>
        <div>
        <table class="emp_tab">
        <tr class="menu_header">
        <td>Title</td>
        <td>Details</td>
        <td width="50" colspan="2">Action</td>        
        </tr>
        <?php
		while($e_row=mysql_fetch_array($e_res_f))
		{
        echo "<tr class='pagi'>";
        echo "<td>";
		echo $e_row[1];
		echo "</td>";
        echo "<td>";
		echo $e_row[2];
		echo "</td>";
		echo "<td class='print'>";
		echo "<a href='?e_id1=$e_row[0]'>Delete</a>";
		echo "</td>";
		echo "<td class='print'>";
		echo "<a href='updateterm.php?e_id2=$e_row[0]'>Update</a>";
		echo "</td>";
		echo "</tr>";
		}
		?>
        </table>
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
