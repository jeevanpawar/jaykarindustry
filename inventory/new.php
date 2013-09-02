<?php
error_reporting(0);
include("session.php");

include("include/database.php");
include('converter.php');
$p=$_REQUEST['id'];
$qry="select * from invoice where i_id='$p'";
$res=mysql_query($qry);
$row=mysql_fetch_array($res);

$qry_detail="select * from sub_invoice where i_id='$p'";
$res_detail=mysql_query($qry_detail);

$qry_t="select SUM(total) from sub_invoice where i_id='$p'";
$res_t=mysql_query($qry_t);
$row_t=mysql_fetch_array($res_t);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rajesh Electric Works</title>
<style type="text/css">
.light
{	
	border:2px solid #000;
	width:750px;
	height:auto;

}
.heading
{
	font-size:36px;
	font-family:"MS Serif", "New York", serif;
	text-decoration:underline;
}
.sub_heading
{
	font-size:20px;
	font-family:"MS Serif", "New York", serif;
}
.quotation
{
	font-size:24px;
	font-weight:bold;
	text-decoration:underline;
}
.date
{	
	margin-left:80%;
}
.description ul
{
	border:1px solid #000; 
}
.description ul li
{	
	list-style:none;
	display:inline;
	padding:20px;
}
.report
{
	vertical-align:middle;
	width:720px;
	margin-top:15px;
}
td 
{
		border:1px solid #000;
		height:30px;
}
th
{
	
	border:1px solid #000;
}
.total
{
	width:720px;
}
.tow
{
	margin-top:-80px;
	padding-top:-37px;
}
.tab2
{
	width:670px;
	margin-left:200px;
	margin-top:-130px;
}
.tab1
{
	width:250px;

}
</style>
</head>

<body>
<br>
<br>
<font face="Calibri" size="12px;">
<table class="light">
<tr class="dat">

 <tr>
 <td colspan="3">
 <table class="tab1">
 <tr>
 <td align="center">TAX INVOICE</td>
 </tr>
 <tr>
  <td height="100px"><b>M/s. </b><?php echo $row[5].'<br>'.$row[4].'<br>'.$row[6];?></td>
</tr>
</table>

 <table class="tab2" >
 <tr>
 <td><b>PO NO :-</b> <?php echo $row[8]; ?></td>
  <td>Date :- <?php echo date('d-m-Y',strtotime($row[13])); ?></td>
</tr>
<tr>
 <td>Your RGP No :- <?php echo $row[9]; ?></td>
  <td>Date :- <?php echo date('d-m-Y',strtotime($row[13])); ?></td>
</tr>
<tr>
 <td>Our DC No :- <?php echo $row[10]; ?></td>
  <td>Date :- <?php echo date('d-m-Y',strtotime($row[14])); ?></td>
</tr>
<tr>
 <td colspan="2">Vendor Code No :- <?php echo $row[11]; ?></td>

</tr>
<tr>
 <td colspan="2">Consignee Vat / Tin No :- <?php echo $row[12]; ?></td>
</tr>
</table>

</td>
</tr>

 <tr>
 <td colspan="3">
<div class="description">
<table class="report">    		<!-- New des table added here -->
<tr>
<th width="50px">Item</th>
<th>DESCRIPTION</th>
<th width="100px">QTY</th>
<th width="100px">RATE/EACH</th>
<th width="100px">AMOUNT</th>
</tr>
<?php
$item=0;
while($row_d=mysql_fetch_array($res_detail))
{
	$item+=1;
	
	echo "<tr>";
	echo "<td >";
	echo $item;
	echo "</td>";
	echo "<td >";
	echo $row_d[2];
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
	
	echo "</tr>";
}
?>
<tr>

<td colspan="4">SUB TOTAL:</td>
<td><?php echo $row_t[0].' /-'; ?></td>
</tr>
<tr>
<td colspan="2">
<?php
 $plus=$row_t[0];
$per70=round (($plus* 0.7)/2);
$serv_tax=$per70 *.12;
$e_cess=$serv_tax *0.02;
$she_cess=$serv_tax * 0.01;
$vat=$plus * .05;
$g_total=$row_t[0]+$serv_tax+$e_cess+$she_cess+$vat;
?>
<font size="-1">
<b><u>SERVICE TAX @ 12% ON LABOUR CHARGES ONLY<br> (A)</u>Value of the <u>LABOUR</u> is <u>70%</u> of <u>SUB TOTAL</u> i.e. <u>Rs. <?php echo round ($plus* 0.7,00).'.00';?></u> / <u>50% </u>=<u><?php echo $per70.'.00';?></u><br>
<font size="-2"><u>{PAYABLE 50% BY SERVICE PROVIDER & 50% BY SERVICE UNDER REVERSE CHARGE MECHANISE}</u></font></b><BR>
<u>(B) VAT </u>@<u> 5%</u> of the <u>SUB TOTAL</u> i.e. <u>Rs. <?php echo $plus; ?></u></font>
</td>
<td colspan="2" style="text-align:right;">Services Tax 12% on <?php echo $per70.'/-';?></td>
<td><?php echo $serv_tax; ?></td>
</tr>
<tr>
<td colspan="2"rowspan="3" style="vertical-align:text-top">In Words:- <?php echo convert_number_to_words(round($g_total)).'Rupees Only'; ?></td>
<td colspan="2" style="text-align:right;">E.Cess @2%</td>
<td><?php echo $e_cess;?></td>
</tr>
<tr>

<td colspan="2" style="text-align:right;">She.Cess @1%</td>
<td><?php echo $she_cess;?></td>
</tr>
<tr>

<td colspan="2" style="text-align:right;">VAT 05% on <?php $plus.'./-'; ?> </td>
<td><?php echo $vat;?></td>
</tr>
<tr>
<td colspan="2"><font size="-2">VAT TIN NO.27900789615 V w.e.f. 27/08/2010 & CST TIN NO. 27900789615 C w.e.f. 27/08/2010</font></td>
<td colspan="2" style="text-align:right;">Transportation Charges</td>
<td><?php echo '00.00' ?></td>
</tr>
<tr>
<td colspan="2"><font size="-2">Service Tax NO. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PAN NO. :-AMEPM1485H </font></td>
<td colspan="2" style="text-align:right; font-weight:800; "> GRAND TOTAL:-</td>
<td><?php echo round($g_total,2) ;?></td>
</tr>
</table>
</div>
</td>
</tr>
<tr>
<td colspan="3">
<table border="0">
<tr>
<td width="375px">we hereby certify that my</td>
<td width="120px"><br><br><br>Receiver Sign & Stamp</td>
<td align="right"><b>For Rajesh Electric Works<br><br> <br>Authorised Signatory</b> </td>
</tr>
</table>
</td>
</tr>
</table>
</font>
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
   $canvas = $dompdf->get_canvas();
  $font = Font_Metrics::get_font("", "bold");
  $canvas->page_text(50,850, "RAJESH ELECTRIC WORKS", $font, 6, array(0,0,0));
  $canvas->page_text(500,850, "PAGE: {PAGE_NUM} OF {PAGE_COUNT}", $font, 8, array(0,0,0));

  $dompdf->stream($filename, array("Attachment" => false));	
  exit(0);
?>