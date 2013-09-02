<?php
session_start();
error_reporting(0);
include("../include/database.php");
$a=$_SESSION['user'];
$c=$_SESSION['com'];
if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
?>
<html>
<head>
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
		<div class="quotation"><center>Total Income & Expense Report Of This Year</center></div>
        <div>
        <table class="emp_tab">
        <tr class="menu_header">
        <td>Month</td>
        <td>Income</td>
        <td>Expense</td>
        <td>Saving</td>
        </tr>
        <?php
		$from_f=date('Y-01-01');
		$to_f=date('Y-01-31');
		$qry_ji="select SUM(p_amt) from partial_payment where p_date >='".$from_f."' and p_date<='".$to_f."'";
		$res_ji=mysql_query($qry_ji);
		$row_ji=mysql_fetch_array($res_ji);
		
		$qry_je="select SUM(e_amt) from expense where e_date >='".$from_f."' and e_date<='".$to_f."'";
		$res_je=mysql_query($qry_je);
		$row_je=mysql_fetch_array($res_je);
		
		$j=$row_ji[0]-$row_je[0];
		?>
        <tr class="emp_header">
        <td>January</td>
        <td><?php echo $row_ji[0]; ?></td>
        <td><?php echo $row_je[0]; ?></td>
        <td><?php echo $j; ?></td>
        </tr>
        <?php
		$from_fi=date('Y-02-01');
		$to_fi=date('Y-02-31');
		$qry_fi="select SUM(p_amt) from partial_payment where p_date >='".$from_fi."' and p_date<='".$to_fi."'";
		$res_fi=mysql_query($qry_fi);
		$row_fi=mysql_fetch_array($res_fi);
		
		$qry_fe="select SUM(e_amt) from expense where e_date >='".$from_fi."' and e_date<='".$to_fi."'";
		$res_fe=mysql_query($qry_fe);
		$row_fe=mysql_fetch_array($res_fe);
		
		$f=$row_fi[0]-$row_fe[0];
		?>
        <tr class="emp_header">
        <td>February</td>
        <td><?php echo $row_fi[0]; ?></td>
        <td><?php echo $row_fe[0]; ?></td>
        <td><?php echo $f; ?></td>
        </tr>
         <?php
		$from_fi=date('Y-03-01');
		$to_fi=date('Y-03-31');
		$qry_mi="select SUM(p_amt) from partial_payment where p_date >='".$from_fi."' and p_date<='".$to_fi."'";
		$res_mi=mysql_query($qry_mi);
		$row_mi=mysql_fetch_array($res_mi);
		
		$qry_me="select SUM(e_amt) from expense where e_date >='".$from_fi."' and e_date<='".$to_fi."'";
		$res_me=mysql_query($qry_me);
		$row_me=mysql_fetch_array($res_me);
		
		$m=$row_mi[0]-$row_me[0];
		?>
        <tr class="emp_header">
        <td>March</td>
        <td><?php echo $row_mi[0]; ?></td>
        <td><?php echo $row_me[0]; ?></td>
        <td><?php echo $m; ?></td>
        </tr>
         <?php
		$from_fi=date('Y-04-01');
		$to_fi=date('Y-04-31');
		$qry_ai="select SUM(p_amt) from partial_payment where p_date >='".$from_fi."' and p_date<='".$to_fi."'";
		$res_ai=mysql_query($qry_ai);
		$row_ai=mysql_fetch_array($res_ai);
		
		$qry_ae="select SUM(e_amt) from expense where e_date >='".$from_fi."' and e_date<='".$to_fi."'";
		$res_ae=mysql_query($qry_ae);
		$row_ae=mysql_fetch_array($res_ae);
		$a=$row_ai[0]-$row_ae[0];
		?>
        <tr class="emp_header">
        <td>April</td>
        <td><?php echo $row_ai[0]; ?></td>
        <td><?php echo $row_ae[0]; ?></td>
        <td><?php echo $a; ?></td>
        </tr>
         <?php
		$from_fi=date('Y-05-01');
		$to_fi=date('Y-05-31');
		$qry_mai="select SUM(p_amt) from partial_payment where p_date >='".$from_fi."' and p_date<='".$to_fi."'";
		$res_mai=mysql_query($qry_mai);
		$row_mai=mysql_fetch_array($res_mai);
		
		$qry_mae="select SUM(e_amt) from expense where e_date >='".$from_fi."' and e_date<='".$to_fi."'";
		$res_mae=mysql_query($qry_mae);
		$row_mae=mysql_fetch_array($res_mae);
		$ma=$row_mai[0]-$row_mae[0];
		?>
        <tr class="emp_header">
        <td>May</td>
        <td><?php echo $row_mai[0]; ?></td>
        <td><?php echo $row_mae[0]; ?></td>
        <td><?php echo $ma; ?></td>
        </tr>
         <?php
		$from_fi=date('Y-06-01');
		$to_fi=date('Y-06-31');
		$qry_ji="select SUM(p_amt) from partial_payment where p_date >='".$from_fi."' and p_date<='".$to_fi."'";
		$res_ji=mysql_query($qry_ji);
		$row_ji=mysql_fetch_array($res_ji);
		
		$qry_je="select SUM(e_amt) from expense where e_date >='".$from_fi."' and e_date<='".$to_fi."'";
		$res_je=mysql_query($qry_je);
		$row_je=mysql_fetch_array($res_je);
		$ju=$row_ji[0]-$row_je[0];
		?>
        <tr class="emp_header">
        <td>Jun</td>
        <td><?php echo $row_ji[0]; ?></td>
        <td><?php echo $row_je[0]; ?></td>
      	<td><?php echo $ju; ?></td>
        </tr>
         <?php
		$from_fi=date('Y-07-01');
		$to_fi=date('Y-07-31');
		$qry_jui="select SUM(p_amt) from partial_payment where p_date >='".$from_fi."' and p_date<='".$to_fi."'";
		$res_jui=mysql_query($qry_jui);
		$row_jui=mysql_fetch_array($res_jui);
		
		$qry_jue="select SUM(e_amt) from expense where e_date >='".$from_fi."' and e_date<='".$to_fi."'";
		$res_jue=mysql_query($qry_jue);
		$row_jue=mysql_fetch_array($res_jue);
		$jue=$row_jui[0]-$row_jue[0];
		?>
        <tr class="emp_header">
        <td>July</td>
        <td><?php echo $row_jui[0]; ?></td>
        <td><?php echo $row_jue[0]; ?></td>
        <td><?php echo $jue; ?></td>
        </tr>
         <?php
		$from_fi=date('Y-08-01');
		$to_fi=date('Y-08-31');
		$qry_aui="select SUM(p_amt) from partial_payment where p_date >='".$from_fi."' and p_date<='".$to_fi."'";
		$res_aui=mysql_query($qry_aui);
		$row_aui=mysql_fetch_array($res_aui);
		
		$qry_aue="select SUM(e_amt) from expense where e_date >='".$from_fi."' and e_date<='".$to_fi."'";
		$res_aue=mysql_query($qry_aue);
		$row_aue=mysql_fetch_array($res_aue);
		$aue=$row_aui[0]-$row_aue[0];
		?>
        <tr class="emp_header">
        <td>August</td>
        <td><?php echo $row_aui[0]; ?></td>
        <td><?php echo $row_aue[0]; ?></td>
        <td><?php echo $aue; ?></td>
        </tr>
         <?php
		$from_fi=date('Y-09-01');
		$to_fi=date('Y-09-31');
		$qry_si="select SUM(p_amt) from partial_payment where p_date >='".$from_fi."' and p_date<='".$to_fi."'";
		$res_si=mysql_query($qry_si);
		$row_si=mysql_fetch_array($res_si);
		
		$qry_se="select SUM(e_amt) from expense where e_date >='".$from_fi."' and e_date<='".$to_fi."'";
		$res_se=mysql_query($qry_se);
		$row_se=mysql_fetch_array($res_se);
		$s=$row_si[0]-$row_se[0];
		?>
        <tr class="emp_header">
        <td>September</td>
        <td><?php echo $row_si[0]; ?></td>
        <td><?php echo $row_se[0]; ?></td>
        <td><?php echo $s; ?></td>
        </tr>
         <?php
		$from_fi=date('Y-10-01');
		$to_fi=date('Y-10-31');
		$qry_oi="select SUM(p_amt) from partial_payment where p_date >='".$from_fi."' and p_date<='".$to_fi."'";
		$res_oi=mysql_query($qry_oi);
		$row_oi=mysql_fetch_array($res_oi);
		
		$qry_oe="select SUM(e_amt) from expense where e_date >='".$from_fi."' and e_date<='".$to_fi."'";
		$res_oe=mysql_query($qry_oe);
		$row_oe=mysql_fetch_array($res_oe);
		$o=$row_oi[0]-$row_oe[0];
		?>
        <tr class="emp_header">
        <td>Octomber</td>
        <td><?php echo $row_oi[0]; ?></td>
        <td><?php echo $row_oe[0]; ?></td>
        <td><?php echo $o; ?></td>
        </tr>
         <?php
		$from_fi=date('Y-11-01');
		$to_fi=date('Y-11-31');
		$qry_ni="select SUM(p_amt) from partial_payment where p_date >='".$from_fi."' and p_date<='".$to_fi."'";
		$res_ni=mysql_query($qry_ni);
		$row_ni=mysql_fetch_array($res_ni);
		
		$qry_ne="select SUM(e_amt) from expense where e_date >='".$from_fi."' and e_date<='".$to_fi."'";
		$res_ne=mysql_query($qry_ne);
		$row_ne=mysql_fetch_array($res_ne);
		$n=$row_ni[0]-$row_ne[0];
		?>
        <tr class="emp_header">
        <td>November</td>
       <td><?php echo $row_ni[0]; ?></td>
        <td><?php echo $row_ne[0]; ?></td>
        <td><?php echo $n; ?></td>
        </tr>
         <?php
		$from_fi=date('Y-12-01');
		$to_fi=date('Y-12-31');
		$qry_di="select SUM(p_amt) from partial_payment where p_date >='".$from_fi."' and p_date<='".$to_fi."'";
		$res_di=mysql_query($qry_di);
		$row_di=mysql_fetch_array($res_di);
		
		$qry_de="select SUM(e_amt) from expense where e_date >='".$from_fi."' and e_date<='".$to_fi."'";
		$res_de=mysql_query($qry_de);
		$row_de=mysql_fetch_array($res_de);
		$d=$row_di[0]-$row_de[0];
		?>
         <tr class="emp_header">
        <td>December</td>
        <td><?php echo $row_di[0]; ?></td>
        <td><?php echo $row_de[0]; ?></td>
        <td><?php echo $d; ?></td>
        </tr>
        </table>
        <?php
		$from_fi=date('Y-01-01');
		$to_fi=date('Y-12-31');
		
		$qry_yi="select SUM(p_amt) from partial_payment where p_date >='".$from_fi."' and p_date<='".$to_fi."'";
		$res_yi=mysql_query($qry_yi);
		$row_yi=mysql_fetch_array($res_yi);
		
		$qry_ye="select SUM(e_amt) from expense where e_date >='".$from_fi."' and e_date<='".$to_fi."'";
		$res_ye=mysql_query($qry_ye);
		$row_ye=mysql_fetch_array($res_ye);
		
		$bal=$row_yi[0]-$row_ye[0];
		?>
        <div class="to">Total Income&nbsp;&nbsp;:&nbsp;<?php echo $row_yi[0].'&nbsp;'.'Rs'.'/-'; ?></div>
        <div class="to">Total Expense&nbsp;:&nbsp;<?php echo $row_ye[0].'&nbsp;'.'Rs'.'/-'; ?></div>
        <div class="to">Total Balance&nbsp;&nbsp;:&nbsp;<?php echo $bal.'&nbsp;'.'Rs'.'/-'; ?></div>
        <div class="quotation"><center></center></div>
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
