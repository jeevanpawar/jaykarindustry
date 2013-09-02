<?php
session_start(0);
if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header("location:../index.php");
	}
	include("../include/database.php");
	error_reporting(0);
	$a=$_REQUEST['id'];
	$c_qry_f="select * from reminder where i_id='$a'";
	$c_res_f=mysql_query($c_qry_f);

	if(isset($_REQUEST['can']))
	{
		header("location:amcreport.php");
	}
?>

<html>
<head>

<title>Chaturang Pvt Ltd</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />

</head>

<body>
<div id="container">
	    <div id="sub-header">
		<?php
			include("include/p_header.php");
		?>
    
    	<br>
		
    	<div class="quotation"><center>Reciept Details</center></div>
        <div>
        <form action="" method="post">
        <table class="emp_tab">
        <tr class="menu_header">
        <td width="885">Description</td>
        <td width="120">Date</td>
        <td width="25">*</td>
        <td width="90">Reciept</td>
        <td width="70">Print</td>
        </tr>
        
      	
		<?php
		
		while($row=mysql_fetch_array($c_res_f))
		{
			echo "<tr class='emp_header3' align='center'>";
			echo "<td>";
			echo $row[3];
			echo "</td>";
			echo "<td>";
			$date=$row[4];
			echo date('d-m-Y', strtotime("$date"));
			echo "</td>";
			echo "<td>";
			echo $row[5];
			echo "</td>";
			echo "<td class='print'>";
			echo "<a href='addreciept.php?id=$row[0]&&id2=$a'>Reciept</a>";
			echo "</td>";
			echo "<td class='print'>";
			echo "<a href='recieptpdf.php?id=$row[0]&&id2=$a'>Print</a>";
			echo "</td>";
			echo "</tr>";
			
		}
		?> 
        </table>
        <br>
        </form>
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
