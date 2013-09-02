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
<link rel="stylesheet" href="../print.css" type="text/css" />
</head>
<body>
<div class="inv">TAX INVOICE</div>
<br><br><br><br>
<table class="add address">
<tr>
<td width="370"><b><?php echo $row_c[1]; ?></b></td><td>Invoice No :</td><td> <label><?php echo $row[1]; ?></label></td>

</tr>
<tr >
<td>Shop No.4, Tirupati Tower-2,<br> Ananad Nagar, Next to Akashwani Tower,</td><td>Date:</td><td><?php echo $row[8]; ?></td>
</tr>
<tr>
<td>Ganagpur Road, Nashik-13. <br>Ph: 0253-2579795.</td>
</tr>
</table>
<br><br><br>
<br><br>
</div>
<div class="detail">
<table>
<tr>
<td>All India Holiday Packages</td>
<td>One Day/Group Picnics</td>
<td>Passport Assistance</td>
<td>Car Rentals</td>
</tr>
</table>

</div>
<table class="tab">
<tr>
<td width="100">M/s: </td><td><label><?php echo $row[3]; ?></label></td>
</tr>
<tr>
<td>Address:</td><td> <label><?php echo $row[4]; ?></label></td>
</tr>
</table>
</div>
</div>
<div class="description">
<table class="report">
<tr>
<td width="50">Sr.No.</td>
<td>Paticulars</td>
<td width="70">Rate</td>
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
<br>
<table class="advance">
<tr>
<td width="40">Advance</td><td><?php echo $row[6]; ?></td>
<td width="70">S.Tax</td><td><?php echo $row[7]; ?></td>
</tr>
<tr>
<td width="40">Balance</td><td><?php echo $balance; ?></td>
<td width="70">Total</td><td><?php echo $to; ?></td>
</tr>
</table>

<div style="page-break-after:always"></div>
<table >
<tr>
<td>Terms and Conditions</td>
</tr>
<?php
$q_term="select * from terms";
$r_term=mysql_query($q_term);
while($row_term=mysql_fetch_array($r_term))
{
	echo "<tr>";
	echo "<td>";
	echo "<b>".$row_term[1]."</b>"."<br>";
	echo "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td class='conditions'>";
	echo $row_term[2]."<br><br>";
	echo "</td>";
	echo "</tr>";
}
?>
<tr>
<td><b><?php echo $row_c[1]; ?></b></td>
</tr>
<tr>
<td>Shop No.4, Tirupati Tower-2,<br> Ananad Nagar, Next to Akashwani Tower,</td>
</tr>
<tr>
<td>Ganagpur Road, Nashik-13. <br><br></td>
</tr>
<tr>
<td><b>Desk Phone:0253-6693585,586</b></td>
</tr>
<tr>
<td><b>Hand Phone:9890496622</b></td>
</tr>
</table>
<br><br><br><br>
<table>
<tr>
<td width="380"><b>Date:</b></td><td><b>Agreed and Copy Received</b></td><td></td>
</tr>
<tr>
</table>
<br><br><br><br>

<table>
<tr>
<td width="400"><b></b></td><td><b>Customers Signature</b></td><td></td>
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