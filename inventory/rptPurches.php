<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$a=date('Y-m-d', strtotime($_POST['dt1']));
$b=date('Y-m-d', strtotime($_POST['dt2']));
$qry_c="select * from purches  where date between '$a' and '$b'";
$res_c=mysql_query($qry_c);
$tot1=0;
$tot2=0;
$tot3=0;

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jaykar Industries</title>
<style type="text/css">
.tab2
{
	width:630px;
	margin-left:250px;
	margin-top:-130px;
	line-height:40px;
}
.vat
{
	position:absolute;
	margin-bottom:-500px;	
	left: 7px;
	top: 850px;
}
.ms
{
	position:absolute;
	top: 200px;
	left: 7px;
}
.date1
{
	font-size:13px;
	margin-top:-20px;
	margin-left:628px;
}
.sale{
	text-align:center;
	font-size:14px;
	text-transform:uppercase;
	letter-spacing:2px;
	color:#000;
}
.d1{
	border:1px solid #000;
	width:750px;
	margin:0 auto;
}
.b1{
	background-color:#EEE;
}

</style>
<link rel="stylesheet" href="../print.css" type="text/css" />

</head>
<body>
<div class="d1">
<div class="inv"><center>Jaykar Industries</center></div>
<div class="sale"><center><u>PURCHES REPORT</u></center></div>
<div class="date1">Date : <?php echo date("d-m-Y")?></div>
<br><br>
<div>
<table class="report"  border="1">
<tr>
    <td width="70" class="b1"><b>Date</b></td>
    <td width="70" class="b1"><b>Supplier Name</b></td>
    <td width="70" class="b1"><b>Raw Material</b></td>
    <td width="70" class="b1"><b>Quantity</b></td>
    <td width="70" class="b1"><b>Amount</b></td>
   
</tr>
<?php

while($row_d=mysql_fetch_array($res_c))
{
	echo "<tr>";
	echo "<td width='70'>";
	echo date('d-m-Y', strtotime($row_d[6]));
	echo "</td>";
	echo "<td width='70'>";
	echo $row_d[5]; 
	echo "</td >";
	echo "<td width='70'>";
	echo $row_d[2]; 
	echo "</td>";
	echo "<td width='70'>";
	echo $row_d[3];
	$tot1=$tot1+$row_d[3]; 
	echo "</td>";
	echo "<td width='70'>";
	echo $row_d[4]; 	
	$tot2=$tot2+$row_d[4];
	echo "</td>";
}
	echo "<tr>";
	echo "<td colspan='3'>";
	echo "<b>Total : </b>";
	echo "</td>";
	echo "<td width='70'>";
	echo $tot1; 
	echo "</td>";
	echo "<td width='70'>";
	echo $tot2; 
	echo "</td>";
	
?>
</table>

</div>
<br><br>
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