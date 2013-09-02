<?php
include("../session/session.php");
	error_reporting(0);
	include("../include/database.php");
	$c_qry_f="select * from booking_form where c_id='$c' order by b_id desc";
	$c_res_f=mysql_query($c_qry_f);
	$row=mysql_num_rows($c_res_f);
	
	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chaturang Tours Pvt. Ltd.</title>
<link rel="stylesheet" href="../print.css" type="text/css" />
<style type="text/css">

</style>
</head>
<body>
<div class="inv">Outstanding Report</div>
        <table class="tabpdf">
        <tr>
        <td width="70">Bkg No</td>
        <td width="70">Bkg Date</td>
        <td>SE</td>
        <td>Client Name</td>
        <td width="50">Paid Amt</td>
        <td width="70">Package Amt</td>
        </tr>
        <?php
		while($c_row=mysql_fetch_array($c_res_f))
		{
		
		$qry_paid="select SUM(p_amt) from partial_payment where b_id='$c_row[0]' and c_id='$c'";
		$res_paid=mysql_query($qry_paid);
		$row_paid=mysql_fetch_array($res_paid);
		if($c_row[8]!=$row_paid[0])
		{
        echo "<tr class='pagi'>";
        echo "<td>";
		echo $c_row[0];
		echo "</td>";
		echo "<td>";
		echo date('d-m-Y', strtotime($c_row[2]));
		echo "</td>";
		echo "<td>";
		echo $c_row[3];
		echo "</td>";
		echo "<td>";
		echo $c_row[4];
		echo "</td>";
		echo "<td>";
		echo $row_paid[0];
		echo "</td>";
		echo "<td>";
		echo $c_row[8];
		echo "</td>";
		}
		}
		?>
      
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