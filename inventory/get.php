<?php
	error_reporting(0);
	include("../include/database.php");
	
	$qry="select * from hotel";
	$res=mysql_query($qry);
	
	while($row=mysql_fetch_array($res))
	{
		
		echo $row[2];
		
	}
?>