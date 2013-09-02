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

$qry_sd="select * from sub_dc where d_id=".$id;
$res_sd=mysql_query($qry_sd);

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
		
		$m_id=mysql_insert_id();
		$qry_d="delete from sub_dc where d_id=".$id;
		$res_d=mysql_query($qry_d);
		
		$dd=$_POST['pr'];
		$ed = count($dd);
		for($i=0; $i<$ed; $i++)
		{	
		  	$p1=$_POST['pr'][$i];
		  	$p2=$_POST['qnt'][$i];
			
		  	$qry_p="insert into sub_dc(d_id,d_des,d_qty) values('".$m_id."','".$p1."','".$p2."')";
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
<style>
.sale
{
	margin-top: 10px;
	width: 800px;
	font-size: 14px;
	margin-left: 288px;
}
.des
{
	width:800px;
	margin-left:288px;
}
.adddel
{
	margin-left:288px;
	position:absolute;
}
.i_button
{
	margin-left:830px;
	position:absolute;
	margin-top:30px;
}
.hr1
{
	margin-left:250px;
	margin-top:100px;
	width:55%;
	text-align:center;
	padding:5px 2px 5px 2px;	
	background-color:#F97B27;
}
.q_in
{
	width:175px;
	height:30px;
	border:1px solid #999;
	background-color:#FFF;
	font-size:14px;
	color:#000;
}
.des_cap
{
	width:72%;
	background-color:#FFF;
	font-size:14px;
	color:#000;
	border:1px solid #999;
}
</style>	
<script>
var cnt=1;
function add()
{
	var tot=cnt++;
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);
	var colCount = table.rows[0].cells.length;
	for(var i=0; i<colCount; i++) 
			{
				document.getElementById("cnt[]").value=tot;	
			}
}
function addRow(tableID) {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
            var colCount = table.rows[0].cells.length;
            for(var i=0; i<colCount; i++) 
			{
                var newcell = row.insertCell(i);
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
				switch(newcell.childNodes[0].type)
				 {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;                    
                }			
            }		
        }
		
function deleteRow(tableID)
{
            try{
                var table = document.getElementById(tableID);
                var rowCount = table.rows.length;
                    for(var i=0; i<rowCount; i++)
                        {
                        var row = table.rows[i];
                        var chkbox = row.cells[0].childNodes[0];
                        if (null != chkbox && true == chkbox.checked)
                            {
                            if (rowCount <= 1)
                                {
                                alert("Cannot delete all the rows.");
                                break;
                                }
                            table.deleteRow(i);
                            rowCount--;
                            i--;
                            }
                        }
                    } catch(e)
                        {
                        alert(e);
                        }
   getValues();
}
 </script> 
 </head>
 <body>
        <div class="hr1">Add New Delivery Challan</div>
        <div>       
                <form action="" method="post" name="po">
                <table class="sale">
               <tr>
               <td>Client Name:</td>
 				<td>
            	<select name="t2" id="c_name" class="q_in">
                <option value="0"><?php echo $row_dc[2]; ?></option>
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
                <td><input type="date" name="t1" class="q_in" value="<?php echo $row_dc[1]; ?>"></td>
                </tr>
                <tr>
                <td>Document No:</td>
                <td><input type="text" name="t3" class="q_in" value="<?php echo $row_dc[3]; ?>"></td>
                 
                <td>Date:</td>
                <td><input type="date" name="t4" class="q_in" value="<?php echo $row_dc[4]; ?>"></td>
                </tr>
                <tr>
                <td>Your Ch. No:</td>
                <td><input type="text" name="t5" class="q_in" value="<?php echo $row_dc[5]; ?>"></td>
            
                <td>Date:</td>
                <td><input type="date" name="t6" class="q_in" value="<?php echo $row_dc[6]; ?>"></td>
                </tr>
                </table>
                <br><br>
                <table class="des">
                <tr class="menu_header">
                <td width="2%">S</td>
                <td width="10%">Finish Good </td>
                <td width="10%">Quantity(Kg.)</td>
                </tr>
               
                </table>
                <table class="des" id="dataTable">
                <tr>
                <td width="2%"><input class="ch" type="checkbox" name="chk[]"/></td>
                
                
                <td width="10%">
                <select name="pr[]" id="product" class="des_cap">
                <?php
				while($row_rs=mysql_fetch_array($rsd))
				{
					echo "<option>";
					echo $row_rs[1];
					echo "</option>";
				}
				?>
                </select><br>
                </td>
                <td width="15%">
                 <input class="des_cap" type="text" name="qnt[]" id="" value=""  onkeyup="getValues()">
                </td>
                </tr>
                </table>
                 <div class="adddel">
       			<input type="button" value="+" class="add" onClick="addRow('dataTable');add();" >&nbsp;
		 		<input type="button" value="-" class="add" onClick="deleteRow('dataTable')" >
         		</div>
 				<div class="i_button">
       			 <input type="submit" value="Update" name="submit">
        		<input type="submit" value="Cancel" name="cancel">
       
      			</div>
				</form>
               </div>
    </body>   