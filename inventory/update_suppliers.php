<?php
	include("../include/database.php");
	if(isset($_REQUEST['c_up']))
	{	
		$s=$_REQUEST['suppliers_id'];
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		
		 $qry_up="update suppliers SET s_name='".$t1."', s_address='".$t2."', s_mo='".$t3."', s_ph='".$t4."',s_email='".$t5."' where s_id=$s";
		 $res_up=mysql_query($qry_up) or die(mysql_error());
		 header("Location:supplier.php");
		 
	}

?>