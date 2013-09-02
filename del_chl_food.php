<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$qry_c="select * from company where comp_id='$c'";
$res_c=mysql_query($qry_c);
$row_c=mysql_fetch_array($res_c);
	
$p=$_REQUEST['id'];

$d=$_REQUEST['id2'];

$qry="select * from invoice where i_no=".$p;
$res=mysql_query($qry);
$row=mysql_fetch_array($res);

$qry_detail="select * from sub_invoice where i_id=".$d;
$res_detail=mysql_query($qry_detail);

$qry_t="select SUM(amt) from sub_invoice where i_id=".$d;
$res_t=mysql_query($qry_t);
$row_t=mysql_fetch_array($res_t);

$balance=$row_t[0]-$row[6];
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jaykar Industries</title>
<style type="text/css">
.tab2
{
	width:670px;
	margin-left:200px;
	margin-top:-130px;
	line-height:30px;
	
}
.vat
{
	position:absolute;
	margin-bottom:-500px;	
	left: 7px;
	top: 880px;
}
.ms
{
	position:absolute;
	top: 200px;
	left: 7px;
}

</style>
<link rel="stylesheet" href="../print.css" type="text/css" />
</head>
<body>
<p align="center">TAX INVOICE</p>
<div class="inv">JAYKAR INDUSTRIES</div>
<div align="center">M.I.D.C.Area,Ambad,Nashik.Mob.:9823716866<br>
 Email ID : jaykar_indus@rediffmail.com</div>
<br><br><br>
<div class="ms">M/S :</div>
<table class="add address">
  
</table>
<table class="tab2" >
 <tr>
   <td>Invoice No :-</td>
    <td>Date :- </td>
 </tr>
<tr>
  <td>P.O. No :-</td>
  <td>Date :- </td>
 </tr>
<tr>
  <td>Document No :-</td>
  <td>Date :- </td>
</tr>

</table>

</div>
<div class="detail">
</div>
<table class="tab">

</table>
</div>
</div>
<div class="description">
<table class="report">
<tr>
<td width="50">Sr.No.</td>
<td>Paticulars</td>
<td width="70">Qty.</td>
<td width="70">Rate Per Ps.</td>
<td width="70">Amount</td>
</tr>
</table>
<table class="r_details">
<?php
while($row_d=mysql_fetch_array($res_detail))
{
	
	echo "<tr>";
	echo "<td width='50'>";
	echo $row_d[3];
	echo "</td>";
	echo "<td>";
	echo $row_d[4];
	echo "</td >";
	echo "<td width='70'>";
	echo $row_d[5];
	echo "</td>";
	echo "<td width='70'>";
	echo $row_d[6];
	echo "</td>";
	echo "</tr>";
}
?>

</table>
<?php 

	$total=($row[7] / 100) * $row_t[0];
	$to=$total+$row_t[0];
	 

?>
</div>
<br><br><br><br>
<table class="advance">
 <tr>
    <td width="70">TOTAL</td><td></td>
 </tr>
 <tr>
	<td width="70">Vat @ 12.5%</td><td></td>
 </tr>
<tr>
<td width="70">Grand Total</td><td></td>
</tr><br><br>
 <tr>Rupees in Words:</tr>
</table>
<div class="vat">
VAT TIN 27400723542V w.e.f. 26/8/2009<BR>
CST TIN 27400723542C w.e.f. 26/8/2009
</div>



<br><br><br><br>
<table>
<tr>
 <td width="380"><b>Received By</b></td>
 <td><b>For JAYKAR INDUSTRIES</b></td>
 <td></td>
</tr>
</table>
<br><br><br><br>

<table>
<tr>
<td width="400"><b></b></td><td><b>Athorised Signatory</b></td><td></td>
</tr>
</table>


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