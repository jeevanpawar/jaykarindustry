<?php
error_reporting(0);
include("include/database.php");

$p=$_REQUEST['id'];
$i=$_REQUEST['id2'];

$qry="select * from reciept where d_id=".$p;
$res=mysql_query($qry);
$row=mysql_fetch_array($res);

$qry_detail="select * from sub_invoice where i_id=".$i;
$res_detail=mysql_query($qry_detail);

$qry_site="select * from site where i_id=".$i;
$res_site=mysql_query($qry_site);

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Anmol Water Tank</title>
<style type="text/css">
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
	width:720px;
	margin-top:15px;
}
.report td
{
		border:1px solid #000;
		text-align:center;
		height:25px;
}
.total
{
	width:720px;
}
.total td
{
	
}
.tow
{
	margin-top:-80px;
	padding-top:-37px;
}
.da
{

	margin-left:590px;
}
</style>
</head>

<body>
<br>
<br>

<div class="heading"><center>ANMOL WATER TANK CLEANERS</center></div>
<div class="sub_heading"><center>Shop No 4, Vaibhavlakshmi Appt, Behind Prakash Petrol Pump</center></div>
<div class="sub_heading"><center>Govind Nagar, Nashik-422009</center></div>
<div class="sub_heading"><center>Ph:&nbsp;9970301010 / 9175299779</center></div>
<br><br>
<div class="quotation"><center>RECIEPT</center></div>
<div class="to">

<div class="da">

Date&nbsp;:&nbsp;<label><?php echo $row[5]; ?></label>
<br>
Rec. No &nbsp;:&nbsp;<label><?php echo $row[0]; ?></label>
<br>
Invoice No : <label><?php echo $row[1]; ?></label>
</div>
<div class="tow">
To
<br>
<textarea><?php echo $row[3]; ?></textarea>
<br>

</div>
</div>

<div class="description">
<table class="report">
<tr>
<td>Description</td>
<td>Capacity</td>
<td>Quantity</td>
<td>Service In Year</td>
</tr>
<?php
while($row_d=mysql_fetch_array($res_detail))
{
	
	echo "<tr>";
	echo "<td>";
	echo $row_d[2];
	echo "</td>";
	echo "<td>";
	echo $row_d[3];
	echo "</td>";
	echo "<td>";
	echo $row_d[4];
	echo "</td>";
	echo "<td>";
	echo $row_d[6];
	echo "</td>";
	echo "</tr>";
}
?>
</table>
</div>
<br><br>
Work Done By:
<?php
$row_site=mysql_fetch_array($res_site);
echo "<br>";
echo $row_site[2];
echo "<br>";
echo $row_site[3];
echo "<br>";
echo $row_site[4];
echo "<br>";
echo $row_site[5];
echo "<br>";
echo $row_site[6];
?>
<br><br><br>


<div>
<br>
<br>
<br><br><br><br>
Authorised Person:____________________
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
For Anmol Water Tank Cleaners
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