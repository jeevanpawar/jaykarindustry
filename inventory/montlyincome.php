<?php
session_start();
error_reporting(0);
$a=$_SESSION['user'];
$c=$_SESSION['com'];
if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
include("../include/database.php");
?>
<html>
<head>
<title>Chaturang Tours Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />

<link rel="stylesheet" href="../css/myStyle.css" type="text/css">
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript">
$(function(){

$('.page').fadeIn(500);
$('#link').click(function(){
$('.home2').fadeOut(0);
$('.home3').fadeOut(0);
$('.home4').fadeOut(0);
$('.info1').fadeOut(0);
$('.info2').fadeOut(0);
$('.info3').fadeOut(0);
$('.info4').fadeOut(0);
$('.info5').fadeOut(0);
$('.info6').fadeOut(0);
$('.info7').fadeOut(0);
$('.info8').fadeOut(0);
$('.info').fadeIn(200);
});

$('#link2').click(function(){
$('.info').fadeOut(0);
$('.home3').fadeOut(0);
$('.home4').fadeOut(0);
$('.info1').fadeOut(0);
$('.info2').fadeOut(0);
$('.info3').fadeOut(0);
$('.info4').fadeOut(0);
$('.info5').fadeOut(0);
$('.info6').fadeOut(0);
$('.info7').fadeOut(0);
$('.info8').fadeOut(0);
$('.home2').fadeIn(200);
});

$('#link3').click(function(){
$('.info').fadeOut(0);
$('.home2').fadeOut(0);
$('.home4').fadeOut(0);
$('.info1').fadeOut(0);
$('.info2').fadeOut(0);
$('.info3').fadeOut(0);
$('.info4').fadeOut(0);
$('.info5').fadeOut(0);
$('.info6').fadeOut(0);
$('.info7').fadeOut(0);
$('.info8').fadeOut(0);
$('.home3').fadeIn(200);
});

$('#link4').click(function(){
$('.info').fadeOut(0);
$('.home3').fadeOut(0);
$('.home2').fadeOut(0);
$('.info1').fadeOut(0);
$('.info2').fadeOut(0);
$('.info3').fadeOut(0);
$('.info4').fadeOut(0);
$('.info5').fadeOut(0);
$('.info6').fadeOut(0);
$('.info7').fadeOut(0);
$('.info8').fadeOut(0);
$('.home4').fadeIn(200);
});


$('#link5').click(function(){
$('.info').fadeOut(0);
$('.home3').fadeOut(0);
$('.home2').fadeOut(0);
$('.home4').fadeOut(0);
$('.info2').fadeOut(0);
$('.info3').fadeOut(0);
$('.info4').fadeOut(0);
$('.info5').fadeOut(0);
$('.info6').fadeOut(0);
$('.info7').fadeOut(0);
$('.info8').fadeOut(0);
$('.info1').fadeIn(200);
});


$('#link6').click(function(){
$('.info').fadeOut(0);
$('.home3').fadeOut(0);
$('.home2').fadeOut(0);
$('.home4').fadeOut(0);
$('.info1').fadeOut(0);
$('.info3').fadeOut(0);
$('.info4').fadeOut(0);
$('.info5').fadeOut(0);
$('.info6').fadeOut(0);
$('.info7').fadeOut(0);
$('.info8').fadeOut(0);
$('.info2').fadeIn(200);

});


$('#link7').click(function(){
$('.info').fadeOut(0);
$('.home3').fadeOut(0);
$('.home2').fadeOut(0);
$('.home4').fadeOut(0);
$('.info2').fadeOut(0);
$('.info1').fadeOut(0);
$('.info4').fadeOut(0);
$('.info5').fadeOut(0);
$('.info6').fadeOut(0);
$('.info7').fadeOut(0);
$('.info8').fadeOut(0);
$('.info3').fadeIn(200);

});


$('#link8').click(function(){
$('.info').fadeOut(0);
$('.home3').fadeOut(0);
$('.home2').fadeOut(0);
$('.home4').fadeOut(0);
$('.info2').fadeOut(0);
$('.info3').fadeOut(0);
$('.info1').fadeOut(0);
$('.info5').fadeOut(0);
$('.info6').fadeOut(0);
$('.info7').fadeOut(0);
$('.info8').fadeOut(0);
$('.info4').fadeIn(200);

});


$('#link9').click(function(){
$('.info').fadeOut(0);
$('.home3').fadeOut(0);
$('.home2').fadeOut(0);
$('.home4').fadeOut(0);
$('.info2').fadeOut(0);
$('.info3').fadeOut(0);
$('.info4').fadeOut(0);
$('.info1').fadeOut(0);
$('.info6').fadeOut(0);
$('.info7').fadeOut(0);
$('.info8').fadeOut(0);
$('.info5').fadeIn(200);

});


$('#link10').click(function(){
$('.info').fadeOut(0);
$('.home3').fadeOut(0);
$('.home2').fadeOut(0);
$('.home4').fadeOut(0);
$('.info2').fadeOut(0);
$('.info3').fadeOut(0);
$('.info4').fadeOut(0);
$('.info5').fadeOut(0);
$('.info1').fadeOut(0);
$('.info7').fadeOut(0);
$('.info8').fadeOut(0);
$('.info6').fadeIn(200);

});


$('#link11').click(function(){
$('.info').fadeOut(0);
$('.home3').fadeOut(0);
$('.home2').fadeOut(0);
$('.home4').fadeOut(0);
$('.info2').fadeOut(0);
$('.info3').fadeOut(0);
$('.info4').fadeOut(0);
$('.info5').fadeOut(0);
$('.info6').fadeOut(0);
$('.info1').fadeOut(0);
$('.info8').fadeOut(0);
$('.info7').fadeIn(200);

});


$('#link12').click(function(){
$('.info').fadeOut(0);
$('.home3').fadeOut(0);
$('.home2').fadeOut(0);
$('.home4').fadeOut(0);
$('.info2').fadeOut(0);
$('.info3').fadeOut(0);
$('.info4').fadeOut(0);
$('.info5').fadeOut(0);
$('.info6').fadeOut(0);
$('.info7').fadeOut(0);
$('.info1').fadeOut(0);
$('.info8').fadeIn(200);

});


});

</script>
</head>

<body>
<div id="container">
	<div id="sub-header">
    <?php
	include("include/p_header.php");
	?>
    
		
    	<br />
		<div class="quotation"><center>Monthwise Income Reports </center></div>
    
    <div class="page">
			<div class="menu">
			<table class="menuTable">
            <tr class="menu_header">
            <td id="link">Jan</td>
            <td id="link2">Feb</td>
            <td id="link3">March</td>
            <td id="link4">April</td>
            <td id="link5">May</td>
            <td id="link6">June</td>
            <td id="link7">July</td>
            <td id="link8">Aug</td>
            <td id="link9">Sep</td>
            <td id="link10">Oct</td>
            <td id="link11">Nov</td>
            <td id="link12">Des</td>
            </tr>
            </table>
			</div>
			<div class="home2">
		    <table class="emp_month">
        	<tr class="emp_header">
        	<td width="150">Date</td>
        	<td width="350">Income In</td>
        	<td>Payment Mode</td>
        	<td width="150">Cheque No.</td>
        	<td width="100">Amount</td>
        	</tr>
        	<?php
			
			error_reporting(0);
			
			include("include/database.php");
			
			$from_f=date('Y-02-01');
			$date=date('Y-02-01');
			$date1=date('Y-02-31');
			$a=date('Y-m-d', strtotime("$date +1 year"));
			$b=date('Y-m-d', strtotime("$date1 +1 year"));
			$to_f=date('Y-02-31');
			$qry_f="select * from partial_payment where p_date >='".$from_f."' and p_date<='".$to_f."'";
			$res_f=mysql_query($qry_f);
			
			$qry_fe="select SUM(p_amt) from partial_payment where p_date >='".$from_f."' and p_date<='".$to_f."'";
			$res_fe=mysql_query($qry_fe);
			$row_fe=mysql_fetch_array($res_fe);
			?>			

        	<?php
				while($row_f=mysql_fetch_array($res_f))
				{
				echo"<tr class='emp_header'>";
				echo "<td>";
				echo date('d-m-Y', strtotime($row_f[4]));
				echo "</td>";
				echo "<td>";
				echo $row_f[3];
				echo "</td>";
				echo "<td>";
				echo $row_f[4];
				echo "</td>";
				echo "<td>";
				echo $row_f[5];
				echo "</td>";
				echo "<td>";
				echo $row_f[8];
				echo "</td>";
				echo"</tr>";
				}
			?>
		
        </table>
        <div class="exp">Total Income Details This Month&nbsp;:&nbsp;<?php echo $row_fe[0].'&nbsp;'.Rs.'/'.'-'; ?></div>
            </div>
			<div class="home3">
            <table class="emp_month">
        	<tr class="emp_header">
        	<td width="150">Date</td>
        	<td width="350">Income Details</td>
        	<td>Payment Mode</td>
        	<td width="150">Cheque No.</td>
        	<td width="100">Amount</td>
        	</tr>
        	<?php
			
			error_reporting(0);
			
			include("include/database.php");
			
			$from_ma=date('Y-03-01');
			$to_ma=date('Y-03-31');
			$qry_ma="select * from partial_payment where p_date >='".$from_ma."' and p_date<='".$to_ma."'";
			$res_ma=mysql_query($qry_ma);
			
			$qry_me="select SUM(p_amt) from partial_payment where p_date >='".$from_ma."' and p_date<='".$to_ma."'";
			$res_me=mysql_query($qry_me);
			$row_me=mysql_fetch_array($res_me);
			?>			

        	<?php
				while($row_ma=mysql_fetch_array($res_ma))
				{
				echo"<tr class='emp_header'>";
				echo "<td>";
				echo date('d-m-Y', strtotime($row_ma[6]));
				echo "</td>";
				echo "<td>";
				echo $row_ma[3];
				echo "</td>";
				echo "<td>";
				echo $row_ma[4];
				echo "</td>";
				echo "<td>";
				echo $row_ma[5];
				echo "</td>";
				echo "<td>";
				echo $row_ma[8];
				echo "</td>";
				echo"</tr>";
				}
			?>
        	
            
            
        </table>
        <div class="exp">Total Income Details This Month&nbsp;:&nbsp;<?php echo $row_me[0].'&nbsp;'.Rs.'/'.'-'; ?></div>
            
            </div>
			<div class="home4">
            <table class="emp_month">
        	<tr class="emp_header">
        	<td width="150">Date</td>
        	<td width="350">Income Details</td>
        	<td>Payment Mode</td>
        	<td width="150">Cheque No.</td>
        	<td width="100">Amount</td>
        	</tr>
        	<?php
			
			error_reporting(0);
			
			include("include/database.php");
			
			$from_ap=date('Y-04-01');
			$to_ap=date('Y-04-31');
			$qry_ap="select * from partial_payment where p_date >='".$from_ap."' and p_date<='".$to_ap."'";
			$res_ap=mysql_query($qry_ap);
			
			$qry_ae="select SUM(p_amt) from partial_payment where p_date >='".$from_ap."' and p_date<='".$to_ap."'";
			$res_ae=mysql_query($qry_ae);
			$row_ae=mysql_fetch_array($res_ae);
			?>			

        	<?php
				while($row_ap=mysql_fetch_array($res_ap))
				{
				echo"<tr class='emp_header'>";
				echo "<td>";
				echo date('d-m-Y', strtotime($row_ap[6]));
				echo "</td>";
				echo "<td>";
				echo $row_ap[3];
				echo "</td>";
				echo "<td>";
				echo $row_ap[4];
				echo "</td>";
				echo "<td>";
				echo $row_ap[5];
				echo "</td>";
				echo "<td>";
				echo $row_ap[8];
				echo "</td>";
				echo"</tr>";
				}
			?>
        	
        	
            
            
        </table>
            <div class="exp">Total Income Details This Month&nbsp;:&nbsp;<?php echo $row_ae[0].'&nbsp;'.Rs.'/'.'-'; ?></div>
            
            </div>
			<div class="info">
			<table class="emp_month">
        	<tr class="emp_header">
        	<td width="150">Date</td>
        	<td width="350">Income Details</td>
        	<td>Payment Mode</td>
        	<td width="150">Cheque No.</td>
        	<td width="100">Amount</td>
        	</tr>
        	<?php
			
			error_reporting(0);
			
			include("include/database.php");
			
			$from_j=date('Y-01-01');
			$to_j=date('Y-01-31');
			$qry_j="select * from partial_payment where p_date >='".$from_j."' and p_date<='".$to_j."'";
			$res_j=mysql_query($qry_j);
			
			$qry_je="select SUM(p_amt) from partial_payment where p_date >='".$from_j."' and p_date<='".$to_j."'";
			$res_je=mysql_query($qry_je);
			$row_je=mysql_fetch_array($res_je);
			?>			

        	<?php
				while($row_j=mysql_fetch_array($res_j))
				{
				echo"<tr class='emp_header'>";
				echo "<td>";
				echo date('d-m-Y', strtotime($row_j[6]));
				echo "</td>";
				echo "<td>";
				echo $row_j[3];
				echo "</td>";
				echo "<td>";
				echo $row_j[4];
				echo "</td>";
				echo "<td>";
				echo $row_j[5];
				echo "</td>";
				echo "<td>";
				echo $row_j[8];
				echo "</td>";
				echo"</tr>";
				}
			?>
        	
        	
            
            
        </table>
        <div class="exp">Total Income Details This Month&nbsp;:&nbsp;<?php echo $row_je[0].'&nbsp;'.Rs.'/'.'-'; ?></div>
            
			</div>
            <div class="info1">
			<table class="emp_month">
        	<tr class="emp_header">
        	<td width="150">Date</td>
        	<td width="350">Income Details</td>
        	<td>Payment Mode</td>
        	<td width="150">Cheque No.</td>
        	<td width="100">Amount</td>
        	</tr>
        	<?php
			
			error_reporting(0);
			
			include("include/database.php");
			
			$from_m=date('Y-05-01');
			$to_m=date('Y-05-31');
			$qry_m="select * from partial_payment where p_date >='".$from_m."' and p_date<='".$to_m."'";
			$res_m=mysql_query($qry_m);
			
			$qry_em="select SUM(p_amt) from partial_payment where p_date >='".$from_m."' and p_date<='".$to_m."'";
			$res_em=mysql_query($qry_em);
			$row_em=mysql_fetch_array($res_em);
			?>			

        	<?php
				while($row_m=mysql_fetch_array($res_m))
				{
				echo"<tr class='emp_header'>";
				echo "<td>";
				echo date('d-m-Y', strtotime($row_m[6]));
				echo "</td>";
				echo "<td>";
				echo $row_m[3];
				echo "</td>";
				echo "<td>";
				echo $row_m[4];
				echo "</td>";
				echo "<td>";
				echo $row_m[5];
				echo "</td>";
				echo "<td>";
				echo $row_m[8];
				echo "</td>";
				echo"</tr>";
				}
			?>
        	
        	
            
            
        </table>
        <div class="exp">Total Income Details This Month&nbsp;:&nbsp;<?php echo $row_em[0].'&nbsp;'.Rs.'/'.'-'; ?></div>
            
			</div>
            <div class="info2">
			<table class="emp_month">
        	<tr class="emp_header">
        	<td width="150">Date</td>
        	<td width="350">Income Details</td>
        	<td>Payment Mode</td>
        	<td width="150">Cheque No.</td>
        	<td width="100">Amount</td>
        	</tr>
        	<?php
			
			error_reporting(0);
			
			include("include/database.php");
			
			$from_ju=date('Y-06-01');
			$to_ju=date('Y-06-31');
			$qry_ju="select * from partial_payment where p_date >='".$from_ju."' and p_date<='".$to_ju."'";
			$res_ju=mysql_query($qry_ju);
			
			$qry_jue="select SUM(p_amt) from partial_payment where p_date >='".$from_ju."' and p_date<='".$to_ju."'";
			$res_jue=mysql_query($qry_jue);
			$row_jue=mysql_fetch_array($res_jue);
			?>			

        	<?php
				while($row_ju=mysql_fetch_array($res_ju))
				{
				echo"<tr class='emp_header'>";
				echo "<td>";
				echo date('d-m-Y', strtotime($row_ju[6]));
				echo "</td>";
				echo "<td>";
				echo $row_ju[3];
				echo "</td>";
				echo "<td>";
				echo $row_ju[4];
				echo "</td>";
				echo "<td>";
				echo $row_ju[5];
				echo "</td>";
				echo "<td>";
				echo $row_ju[8];
				echo "</td>";
				echo"</tr>";
				}
			?>
        	
        	
            
            
        </table>
        <div class="exp">Total Income Details This Month&nbsp;:&nbsp;<?php echo $row_jue[0].'&nbsp;'.Rs.'/'.'-'; ?></div>
            
			</div>
            <div class="info3">
			<table class="emp_month">
        	<tr class="emp_header">
        	<td width="150">Date</td>
        	<td width="350">Income Details</td>
        	<td>Payment Mode</td>
        	<td width="150">Cheque No.</td>
        	<td width="100">Amount</td>
        	</tr>
        	<?php
			
			error_reporting(0);
			
			include("include/database.php");
			
			$from_jl=date('Y-07-01');
			$to_jl=date('Y-07-31');
			$qry_jl="select * from partial_payment where p_date >='".$from_jl."' and p_date<='".$to_jl."'";
			$res_jl=mysql_query($qry_jl);
			
			$qry_le="select SUM(p_amt) from partial_payment where p_date >='".$from_jl."' and p_date<='".$to_jl."'";
			$res_le=mysql_query($qry_le);
			$row_le=mysql_fetch_array($res_le);
			?>			

        	<?php
				while($row_jl=mysql_fetch_array($res_jl))
				{
				echo"<tr class='emp_header'>";
				echo "<td>";
				echo date('d-m-Y', strtotime($row_jl[6]));
				echo "</td>";
				echo "<td>";
				echo $row_jl[3];
				echo "</td>";
				echo "<td>";
				echo $row_jl[4];
				echo "</td>";
				echo "<td>";
				echo $row_jl[5];
				echo "</td>";
				echo "<td>";
				echo $row_jl[8];
				echo "</td>";
				echo"</tr>";
				}
			?>
        	
        	
            
            
        </table>
        <div class="exp">Total Income Details This Month&nbsp;:&nbsp;<?php echo $row_le[0].'&nbsp;'.Rs.'/'.'-'; ?></div>
            
			</div>
            <div class="info4">
			<table class="emp_month">
        	<tr class="emp_header">
        	<td width="150">Date</td>
        	<td width="350">Income Details</td>
        	<td>Payment Mode</td>
        	<td width="150">Cheque No.</td>
        	<td width="100">Amount</td>
        	</tr>
        	<?php
			
			error_reporting(0);
			
			include("include/database.php");
			
			$from_au=date('Y-08-01');
			$to_au=date('Y-08-31');
			$qry_au="select * from partial_payment where p_date >='".$from_au."' and p_date<='".$to_au."'";
			$res_au=mysql_query($qry_au);
			
			$qry_aue="select SUM(p_amt) from partial_payment where p_date >='".$from_au."' and p_date<='".$to_au."'";
			$res_aue=mysql_query($qry_aue);
			$row_aue=mysql_fetch_array($res_aue);
			?>			

        	<?php
				while($row_au=mysql_fetch_array($res_au))
				{
				echo"<tr class='emp_header'>";
				echo "<td>";
				echo date('d-m-Y', strtotime($row_au[6]));
				echo "</td>";
				echo "<td>";
				echo $row_au[3];
				echo "</td>";
				echo "<td>";
				echo $row_au[4];
				echo "</td>";
				echo "<td>";
				echo $row_au[5];
				echo "</td>";
				echo "<td>";
				echo $row_au[8];
				echo "</td>";
				echo"</tr>";
				}
			?>
        	
        	
            
		
        </table>
        <div class="exp">Total Income Details This Month&nbsp;:&nbsp;<?php echo $row_aue[0].'&nbsp;'.Rs.'/'.'-'; ?></div>
            
			</div>
            <div class="info5">
			<table class="emp_month">
        	<tr class="emp_header">
        	<td width="150">Date</td>
        	<td width="350">Income Details</td>
        	<td>Payment Mode</td>
        	<td width="150">Cheque No.</td>
        	<td width="100">Amount</td>
        	</tr>
        	<?php
			
			error_reporting(0);
			
			include("include/database.php");
			
			$from_se=date('Y-09-01');
			$to_se=date('Y-09-31');
			$qry_se="select * from partial_payment where p_date >='".$from_se."' and p_date<='".$to_se."'";
			$res_se=mysql_query($qry_se);
			
			$qry_see="select SUM(p_amt) from partial_payment where p_date >='".$from_se."' and p_date<='".$to_se."'";
			$res_see=mysql_query($qry_see);
			$row_see=mysql_fetch_array($res_see);
			?>			

        	<?php
				while($row_se=mysql_fetch_array($res_se))
				{
				echo"<tr class='emp_header'>";
				echo "<td>";
				echo date('d-m-Y', strtotime($row_se[6]));
				echo "</td>";
				echo "<td>";
				echo $row_se[3];
				echo "</td>";
				echo "<td>";
				echo $row_se[4];
				echo "</td>";
				echo "<td>";
				echo $row_se[5];
				echo "</td>";
				echo "<td>";
				echo $row_se[8];
				echo "</td>";
				echo"</tr>";
				}
			?>
        	
        	
            
		
        </table>
        <div class="exp">Total Income Details This Month&nbsp;:&nbsp;<?php echo $row_see[0].'&nbsp;'.Rs.'/'.'-'; ?></div>
            
			</div>
            <div class="info6">
			<table class="emp_month">
        	<tr class="emp_header">
        	<td width="150">Date</td>
        	<td width="350">Income Details</td>
        	<td>Payment Mode</td>
        	<td width="150">Cheque No.</td>
        	<td width="100">Amount</td>
        	</tr>
        	<?php
			
			error_reporting(0);
			
			include("include/database.php");
			
			$from_o=date('Y-10-01');
			$to_o=date('Y-10-31');
			$qry_o="select * from partial_payment where p_date >='".$from_o."' and p_date<='".$to_o."'";
			$res_o=mysql_query($qry_o);
			
			$qry_oe="select SUM(p_amt) from partial_payment where p_date >='".$from_o."' and p_date<='".$to_o."'";
			$res_oe=mysql_query($qry_oe);
			$row_oe=mysql_fetch_array($res_oe);
			?>			

        	<?php
				while($row_o=mysql_fetch_array($res_o))
				{
				echo"<tr class='emp_header'>";
				echo "<td>";
				echo date('d-m-Y', strtotime($row_o[6]));
				echo "</td>";
				echo "<td>";
				echo $row_o[3];
				echo "</td>";
				echo "<td>";
				echo $row_o[4];
				echo "</td>";
				echo "<td>";
				echo $row_o[5];
				echo "</td>";
				echo "<td>";
				echo $row_o[8];
				echo "</td>";
				echo"</tr>";
				}
			?>
        	
        	
            
		
        </table>
        <div class="exp">Total Income Details This Month&nbsp;:&nbsp;<?php echo $row_oe[0].'&nbsp;'.Rs.'/'.'-'; ?></div>
            
			</div>
            <div class="info7">
			<table class="emp_month">
        	<tr class="emp_header">
        	<td width="150">Date</td>
        	<td width="350">Income Details</td>
        	<td>Payment Mode</td>
        	<td width="150">Cheque No.</td>
        	<td width="100">Amount</td>
        	</tr>
        	<?php
			
			error_reporting(0);
			
			include("include/database.php");
			
			$from_n=date('Y-11-01');
			$to_n=date('Y-11-31');
			$qry_n="select * from partial_payment where p_date >='".$from_n."' and p_date<='".$to_n."'";
			$res_n=mysql_query($qry_n);
			
			$qry_ne="select SUM(p_amt) from partial_payment where p_date >='".$from_n."' and p_date<='".$to_n."'";
			$res_ne=mysql_query($qry_ne);
			$row_ne=mysql_fetch_array($res_ne);
			?>			

        	<?php
				while($row_n=mysql_fetch_array($res_n))
				{
				echo"<tr class='emp_header'>";
				echo "<td>";
				echo date('d-m-Y', strtotime($row_n[6]));
				echo "</td>";
				echo "<td>";
				echo $row_n[3];
				echo "</td>";
				echo "<td>";
				echo $row_n[4];
				echo "</td>";
				echo "<td>";
				echo $row_n[5];
				echo "</td>";
				echo "<td>";
				echo $row_n[8];
				echo "</td>";
				echo"</tr>";
				}
			?>
        	
        	
            
		
        </table>
        <div class="exp">Total Income Details This Month&nbsp;:&nbsp;<?php echo $row_ne[0].'&nbsp;'.Rs.'/'.'-'; ?></div>
            
			</div>
            <div class="info8">
			<table class="emp_month">
        	<tr class="emp_header">
        	<td width="150">Date</td>
        	<td width="350">Income Details</td>
        	<td>Payment Mode</td>
        	<td width="150">Cheque No.</td>
        	<td width="100">Amount</td>
        	</tr>
        	<?php
			
			error_reporting(0);
			
			include("include/database.php");
			
			$from_d=date('Y-12-01');
			$to_d=date('Y-12-31');
			$qry_d="select * from partial_payment where p_date >='".$from_d."' and p_date<='".$to_d."'";
			$res_d=mysql_query($qry_d);
			
			$qry_de="select SUM(p_amt) from partial_payment where p_date >='".$from_d."' and p_date<='".$to_d."'";
			$res_de=mysql_query($qry_de);
			$row_de=mysql_fetch_array($res_de);
			?>			

        	<?php
				while($row_d=mysql_fetch_array($res_d))
				{
				echo"<tr class='emp_header'>";
				echo "<td>";
				echo date('d-m-Y', strtotime($row_d[6]));
				echo "</td>";
				echo "<td>";
				echo $row_d[3];
				echo "</td>";
				echo "<td>";
				echo $row_d[4];
				echo "</td>";
				echo "<td>";
				echo $row_d[5];
				echo "</td>";
				echo "<td>";
				echo $row_d[8];
				echo "</td>";
				echo"</tr>";
				}
			?>
        	
        	
            
        </table>
        <div class="exp">Total Income Details This Month&nbsp;:&nbsp;<?php echo $row_de[0].'&nbsp;'.Rs.'/'.'-'; ?></div>
            
			</div>
				<div class="news1">
			</div>
			
		</div>
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
