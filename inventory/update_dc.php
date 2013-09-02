<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$per_page = 19;
$id=$_REQUEST['c_id2'];

$sql = "select * from sale";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);

$qry_c="select * from client";
$res_c=mysql_query($qry_c);

$qry_dc="select * from dc where d_id=".$id;
$res_dc=mysql_query($qry_dc);
$row_dc=mysql_fetch_array($res_dc);
?>
<?php
	if(isset($_REQUEST['submit']))
	{
		$t1=date('Y-m-d', strtotime($_POST['t1']));
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$t6=$_POST['t6'];
		
		$qry_b="UPDATE `dc` SET `d_date`='".$t1."',`d_cname`='".$t2."',`doc_no`='".$t3."',`doc_date`='".$t4."',`ch_no`='".$t5."',`ch_date`='".$t6."' WHERE `d_id`=".$id;
		$res_b=mysql_query($qry_b);
		
		$qry_d="delete from sub_dc where d_id=".$id;
		$res_d=mysql_query($qry_d);
		
		$dd=$_POST['pr'];
		$ed = count($dd);
		for($i=0; $i<$ed; $i++)
		{	
		  	$p1=$_POST['pr'][$i];
		  	$p2=$_POST['qnt'][$i];
			
		  	$qry_p="insert into sub_dc(d_id,d_des,d_qty) values('".$id."','".$p1."','".$p2."')";
			$res_p=mysql_query($qry_p);
			
			$qry_sale="select * from sale where sl_pname='$p1'";
			$res_sale=mysql_query($qry_sale);
			$row_sale=mysql_fetch_array($res_sale);
			
			$qry_up="update sale SET sl_pqty=$row_sale[2] - '".$p2."' where sl_pname='$p1'";
			$res_up=mysql_query($qry_up);
		}
		if($res_b)
		{
			header("location:del.php");
		}
		else
		{
			echo "error";
		}
	}
	if(isset($_REQUEST['cancel']))
	{
		header("location:del.php");
	}
?>
<html>
<head>
<title>Jaykar Industries</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="js/addrow.js"></script>
<script type="text/javascript" src="custom.js"></script>
	
<script language="javascript">
function getValues(val){

var numVal1=parseInt(document.getElementById("one").value);
var numVal2=parseInt(document.getElementById("two").value);

var totalValue = numVal1 + numVal2;
document.getElementById("main").value = totalValue;
}
</script>
</head>
<body>
<div id="container">
<div id="sub-header">
		<?php
		   include("include/p_header.php");
		?>
       	<table class="emp_tab">
        <tr class="search_res">
        <td class="info" align="center">Update Invoice</td></tr>
        </table>
               <form action="" method="post" name="po">
               <div class="main">
               <table class="invoice_u">
               <tr><td>Client Name:</td>
 				<td> <option value="0"><?php echo $row_dc[2]; ?></option>
            	<select name="t2" id="c_name" class="q_in">
                <?php
				while($row_c=mysql_fetch_array($res_c))
				{
					echo "<option>";
					echo $row_c[1];
					echo "</option>";
				}
				?>
                </select><br>
                </td>
                <td>Date:</td>
                <td><input type="text" name="t1" class="q_in" value="<?php echo $row_dc[1]; ?>"></td>
                </tr>
                
                <tr><td>Document No:</td>
                <td><input type="text" name="t3" class="q_in" value="<?php echo $row_dc[3]; ?>"></td>
                 
                <td>Date:</td>
                <td><input type="date" name="t4" class="q_in" value="<?php echo $row_dc[4]; ?>"></td>
                </tr>
                
                <tr><td>Your Ch. No:</td>
                <td><input type="text" name="t5" class="q_in" value="<?php echo $row_dc[5]; ?>"</td>
            
                <td>Date:</td>
                <td><input type="date" name="t6" class="q_in" value="<?php echo $row_dc[6]; ?>"></td>
                </tr>
                </table>
                <br><br>
                <table class="des_u">
                <tr class="menu_header">
                <td width="2%">S</td>
                <td width="10%">Finish Good </td>
                <td width="10%">Quantity(Kg.)</td>
                </tr>
               
                </table>
                <table class="des_u" id="dataTable">
                <?php
				$qry_sd="select * from sub_dc where d_id=".$id;
				$res_sd=mysql_query($qry_sd);
					
				while($row_sd=mysql_fetch_array($res_sd))
				{
					echo "<tr>";
					echo "<td width='2%'>";
					echo "<input class='ch' type='checkbox' name='chk[]'/>";
					echo "</td>";
					echo "<td width='15%'>";
					echo "<select id='product' class='des_cap' name='pr[]'>";
								
					echo "<option>";
					echo $row_sd[2];
					echo "</option>";
					$qry_a="select * from sale";
					$res_a=mysql_query($qry_a);
					while($row_a=mysql_fetch_array($res_a))
					{
						echo "<option>";
						echo $row_a[1];
						echo "</option>";
					}
					echo "<select>";
					echo "</td>";
					echo "<td width='15%'>";
					echo "<input class='des_cap' type='text' name='qnt[]' id='' value='$row_sd[3]'>";
					echo "</td>";
					echo "</tr>";
				}
			?>
                </table>
                 <div class="adddel_u">
       			<input type="button" value="+" class="add" onClick="addRow('dataTable');add();" >&nbsp;
		 		<input type="button" value="-" class="add" onClick="deleteRow('dataTable')" >
         		</div>
 				<div class="q_button_u">
       			 <input type="submit" value="Submit" name="submit">
        		<input type="submit" value="Cancel" name="cancel">
                <br><br>
       
      			</div>
                </div>
				</form>
        </div>
		</div>
</body>
</html>
