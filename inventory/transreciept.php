<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$id=$_REQUEST['id'];

$qry_c="select * from company where comp_id='$c'";
$res_c=mysql_query($qry_c);
$row_c=mysql_fetch_array($res_c);

$qry_d="select * from partial_payment where p_id=".$id;
$res_d=mysql_query($qry_d);
$row_d=mysql_fetch_array($res_d);


	if(isset($_REQUEST['e_can']))
	{
		header("location:payment.php");
	}
	
	$d=date('d-m-Y');
?>
<html>
<head>
<title>Chaturang Tours Pvt Ltd</title>
<style type="text/css">
.container
{
	border:1px solid #000;
}
.cash
{
	
	width:100%;
	height:400px;
	border-top:1px solid #CCC;
}
.cash tr td
{
	padding-left:50px;
	letter-spacing:1px;
	font-size:18px;
	height:50px;
}
.reciept
{
	
	letter-spacing:1px;
	font-size:25px;
	margin-left:-25px;
	text-decoration:underline;
	
}
.name
{
	margin-left:100px;
}
.rs
{
	text-decoration:underline;
	font-size:20px;
	font-weight:bold;
}

.address ul li
{
	width:400px;
	margin-left:390px;
	font-size:12px;
}
.cname
{
	text-transform:uppercase;
}
</style>
</head>
<body>
		
        <?php
		$p=$row_c[2].'_'.$id;

		$qry_r="select * from trans_pay where t_id='$id' and c_id='$c'";
		$res_r=mysql_query($qry_r);
		$row_r=mysql_fetch_array($res_r);
		
		$qry="select * from reciept where p_id='$p'";
		$res=mysql_query($qry);
		$row=mysql_fetch_array($res);
		
		$qry_name="select * from booking_form where b_id='$row_r[3]' and c_id='$c'";
		$res_name=mysql_query($qry_name);
		$row_name=mysql_fetch_array($res_name);

		?>
        <div class="container">
        <div>
        <span><?php echo "logo"; ?></span>
        <span class="address">
        <ul>
        <li>Head Office : 2, Tirumal Apt., Near Bapu Banglow,<br> Modakeshwar Road., Indira Nagar, Nashik-09<br> Ph.: 98902496622/9225116106</li>
        <li>Branch Office : Shop No.4, Tirupati Town 2, <br>Next to Akashwani Tower, Gangapur Road., Nashik-13.<br> Ph.: 9970528244<br> E-mail:chaturang.international@gmail.com</li>
        </ul>
        </span>
        </div>
        
        <?php
		if($row_r[6]=='Cash')
		{
			echo "<table class='cash'>";
			echo "<tr>";
			echo "<td align='center' colspan='2' class='reciept'>";
			echo "<b><span class='reciept'>PAYMENT RECIEPT</span></b>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "<b>Reciept No:$row[0]</b>";
			echo "</td>";
			echo "<td>";
			echo "<b>Date:".date('d-m-Y')."</b>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td colspan='2'>";
			echo "Recieved with thanks from Mr/Mrs/Ms "."<span class='cname'>".'<u>'.$row_r[4].'</u>'."</span>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td colspan='2'>";
			echo "Sum of Rs.[By Cash] <u>$row[8] RUPPES ONLY</u>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td colspan='2'>";
			echo "for the chaturang tours in part/final payment towards <br><br>Booking Ref. No. <u>$row[3]</u><br><br><br>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td colspan='2'>";
			echo "<span class='rs'>Rs. $row[7] /-</span><br>Cheque Subject to Realisation<br>(Subject to Nashik Jurisdiction)<span class='name'>For <b>$row_c[1]</b></span><br><br>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
		}
		?>
		
		<?php
        if($row_r[6]=='Cheque')
		{
			echo "<table class='cash'>";
			echo "<tr>";
			echo "<td align='center' colspan='2'>";
			echo "<b><span class='reciept'>PAYMENT RECIEPT</span></b>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "<b>Reciept No:$row[0]</b>";
			echo "</td>";
			echo "<td>";
			echo "<span class='date'><b>Date:".date('d-m-Y')."</b></span>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td colspan='2'>";
			echo "Recieved with thanks from Mr/Mrs/Ms "."<span class='cname'>".'<u>'.$row_r[4].'</u>'."</span>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td colspan='2'>";
			echo "Sum of Rs <u>$row[8] RUPPES ONLY</u>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "By Cheque No:<u>$row[6]</u>";
			echo "</td>";
			echo "<td>";
			echo "Dated:".date('d-m-Y', strtotime ($row[4]));
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "on Bank";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td colspan='2'>";
			echo "for the chaturang tours in part/final payment towards<br><br> Booking Ref. No. <u>$row[3]</u>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td colspan='2'>";
			echo "<span class='rs'>Rs. $row[7] /-</span><br>Cheque Subject to Realisation<br>(Subject to Nashik Jurisdiction)<span class='name'>For <b>$row_c[1]</b></span><br><br>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
		}
		if($row_r[6]=='Online Transfer')
		{
			echo "<table class='cash'>";
			echo "<tr>";
			echo "<td align='center' colspan='2'>";
			echo "<b><span class='reciept'>PAYMENT RECIEPT</span></b>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "<b>Reciept No:$row[0]</b>";
			echo "</td>";
			echo "<td>";
			echo "<b>Date:".date('d-m-Y')."</b>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "Recieved with thanks from Mr/Mrs/Ms "."<span class='cname'>".'<u>'.$row_r[4].'</u>'."</span>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "Sum of Rs <u>$row[8] RUPPES ONLY</u>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "through online transfer effected in bank name";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "on Bank";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "for the chaturang tours in part/final payment towards Booking Ref. No. <u>$row[3]</u>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td colspan='2'>";
			echo "<span class='rs'>Rs. $row[7] /-</span><br>Cheque Subject to Realisation<br>(Subject to Nashik Jurisdiction)<span class='name'>For <b>$row_c[1]</b></span><br><br>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
		}
        ?> 
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