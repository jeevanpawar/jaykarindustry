<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");

$p=$_REQUEST['id'];

$qry1="select * from sub_dc where d_id=".$p;
$res1=mysql_query($qry1);

$qry2="select * from dc where d_id=".$p;
$res2=mysql_query($qry2);
$row2=mysql_fetch_array($res2);

$qry3="select * from client where c_name='$row2[2]'";
$res3=mysql_query($qry3);
$row3=mysql_fetch_array($res3);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jaykar Industries</title>
<style type="text/css">
.tab2{
	width:642px;
	margin-left:250px;
	margin-top:143px;
	line-height:30px;
	position:absolute;
	height:100px;
	border-collapse:collapse;
}
.vat{
	position:absolute;
	margin-bottom:-500px;	
	left: 7px;
	top: 850px;
}
.ms{
	top: 160px;
}
.line{
}
.add2{
	width:335px;
	height:96px;
	border:1px solid #000;
	border-left:none;
	border-right:none;
	
}
.main{
	border-collapse:collapse;
	width:726px;

}
.d1{
	border:1px solid #000;
	height:700px;
}
.d2{
	border:1px solid #000;
	height:400px;
}
.d3{
	border:1px solid #000;
	padding:1px 1px 1px 1px;
	width:200px;
	text-align:center;
	margin-left:250px;
	margin-top:5px;
}
.d4 img{
	width:90px;
	height:90px;
	position:absolute;
	margin-left:20px;
	margin-top:30px;
}

</style>
<link rel="stylesheet" href="../print.css" type="text/css" />
</head>
<body><br>
<div class="d1">
	<div class="d4"><img src="images/jaykar.png" /></div>
	<div class="d3">DELIVERY CHALLAN</div>
	<div class="inv">JAYKAR INDUSTRIES</div>
	<div align="center">M.I.D.C.Area,Ambad,Nashik.Mob.:9823716866</div>
	<div align="center">Email ID : jaykar_indus@rediffmail.com<br><br></div>

<table class="add2">
<tr><td>
	<div class="ms">	
  <b>M/S :</b><?php echo"$row3[1]"; ?><br><b>Address:</b><?php echo"$row3[2]"; ?><br><b>Mobile No:</b><?php echo"$row3[3]"; ?></div>
  </td></tr>
</table>
<?php 
	$t1=date('d-m-Y', strtotime($row2[1]));
	$t2=date('d-m-Y', strtotime($row2[4]));
	$t3=date('d-m-Y', strtotime($row2[6]));
?>
<table class="tab2" border="1" >
 <tr>
   <td>Our Ch.No :<?php echo"$p"; ?></td>
    <td>Date : <?php echo"$t1"; ?></td>
 </tr>
<tr>
  <td>Document No :<?php echo"$row2[3]"; ?></td>
  <td>Date :<?php echo"$t2"; ?> </td>
 </tr>
<tr>
  <td>Your Ch. No :<?php echo"$row2[5]"; ?></td>
  <td>Date :<?php echo"$t3"; ?> </td>
</tr>
</table>

<div class="d2">
<table class="main">
<tr><td>
<table class="report" >
<tr>
<td width="50">Sr.No.</td>
<td width="200">Description of Works</td>
<td width="70">Quantity</td>

</tr>
</table></td></tr>
<tr><td>
<table class="r_details" border="1" >
<?php
$count=0;
while($row1=mysql_fetch_array($res1))
{	$count+=1;
	echo "<tr>";
	echo "<td width='50'>";
	echo $count;
	echo "</td>";
	echo "<td width='200'>";
	echo $row1[2];
	echo "</td >";
	echo "<td width='70'>";
	echo $row1[3];
	echo "</td>";
	echo "</tr>";
}
?>

</table>
</td></tr>
</table>
</div>

<table>
<tr>
 <td width="380"><b>Goods Received in good condition<b></td>
 <td><b>For, JAYKAR INDUSTRIES</b></td>
 <td></td>
</tr>
</table>

<br><br>
<table>
<tr>
<td width="400"><b> Receiver's sign.</b></td><td><b>Athorised Signatory</b></td><td></td>
</tr>
</table>
</div>
</body>
</html>

<?php
$htmlcontent=ob_get_clean();

include("dompdf/dompdf_config.inc.php");


  $htmlcontent = stripslashes($htmlcontent);
  $dompdf = new DOMPDF();
  $dompdf->load_html($htmlcontent);
  $dompdf->set_paper("folio", "portrait");
  $dompdf->render();
  $dompdf->stream($filename, array("Attachment" => false));	
  exit(0);
?>