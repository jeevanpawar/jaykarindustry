<?php
session_start();
unset($_SESSION['user']);
error_reporting(0);

	include("include/database.php");
	if(isset($_REQUEST['login']))
	{
		$sql="select * from user where u_name = '". $_POST['username'] ."' and u_password = '".$_POST['password']."'";
		$result = mysql_query($sql);
		if($row = mysql_fetch_array($result))
		  {
			 $_SESSION['user']=$row[1];
			 session_is_registered();

			 header("Location:inventory/home.php");
		  }
		else
		{
			header("location:index.php");
		}
	}
?>
<html>
<head>
<title>Jaykar Industries</title>
<link href="login-box.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico">
<style type="text/css">

.reference {
	
	position:fixed;
	width:100%;
	left:-1px;
	right:-1px;
	font-size:14px;
	text-align:center;
	height:20px;
	opacity:1;
	color:#000;
	display: inline-block;
  *display: inline;
  padding: 2px 2px 2px;
  margin-bottom: 0;
  font-size: 12px;
  
  text-align: center;
  text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
  vertical-align: middle;
  cursor: pointer;
  background-color: #f5f5f5;
  *background-color: #e6e6e6;
  background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
  background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
  background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
  background-image: linear-gradient(top, #ffffff, #e6e6e6);
  background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
  background-repeat: repeat-x;
  border: 1px solid #cccccc;
  *border: 0;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  border-color: #e6e6e6 #e6e6e6 #bfbfbf;
  border-bottom-color: #b3b3b3;
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
	bottom:0px;
}
</style>


</head>
<body class="fade-in">
<div style="padding: 130px 0 0 0;" align="center">
<form action="" method="post">
<div id="login-box">
<H2>JAYKAR INDUSTRIES</H2>

<br>
<div class="all">
<table class="user">
<tr>
<td>
<label>User Name:</label><br><input name="username" class="form-login" title="Username" placeholder="Enter User Name" size="30" maxlength="2048" /></div>
</td>
</tr>
<tr>
<td>
<label>Password:</label><br><input name="password" type="password" class="form-login" title="Password" placeholder="Enter Password" size="30" maxlength="2048" /></div>
</td>
</tr>
</table>
<br />
<div><input  class="log" type="submit" value="Login" name="login" /></div>
</form>
</div>

</div>



<div class="reference">Copyright @ 2013 Jaykar Industries. Powered By: Wave TechLine India Pvt. Ltd.</div>

</body>
</html>
