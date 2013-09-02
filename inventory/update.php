<?php
	include("../include/database.php");
	if(isset($_REQUEST['c_up']))
	{	
		$c=$_REQUEST['client_id'];
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		
		 $qry_up="update client SET c_name='".$t1."', c_address='".$t2."', c_mo='".$t3."', c_ph='".$t4."',c_email='".$t5."' where c_id=$c";
		 $res_up=mysql_query($qry_up) or die(mysql_error());
		 header("Location:client.php");
		 
	}

?>