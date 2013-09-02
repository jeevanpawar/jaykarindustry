<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$per_page = 19;

$sql = "select * from sale";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);

?>
<?php
$qry_s="select * from stock";
$res_s=mysql_query($qry_s);

$qry_c="select * from client";
$res_c=mysql_query($qry_c);	
	if(isset($_REQUEST['can']))
	{
		header("location:stock.php");
	}
?>
<html>
<head>
 <script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="js/addrow.js"></script>
<script type="text/javascript" src="custom.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/slider.js"></script>
<script type="text/javascript" src="../js/superfish.js"></script>
<script type="text/javascript" src="../js/toword.js"></script>
<script>
var total = 0;
function getValues() {
var qty = 0;
var rate = 0;
var obj = document.getElementsByTagName("input");
      for(var i=0; i<obj.length; i++){
         if(obj[i].name == "qnt[]")
		 {
			 var qty = obj[i].value;
			
		}
         if(obj[i].name == "r[]")
		 {
			 var rate = obj[i].value;
		 }
		 if(obj[i].name == "rate[]")
		 {
			 var urate = obj[i].value;
		 }
         if(obj[i].name == "value[]")
		 {
          		if(qty > 0 && rate > 0)
				{
					obj[i].value = qty*rate*urate;
					total+=(obj[i].value*1);
				}
				else
				{
					obj[i].value = 0;
				    total+=(obj[i].value*1);
				}
          }
		        
		 }
		 var tax =document.getElementById("stax").value;
		 var vat =document.getElementById("vat").value;
		 var add=total*1;
		 add+=(tax*1);
		  add+=(vat*1);		 
        document.getElementById("total").value = add;
		var words = toWords(add);
		document.getElementById("word").innerHTML=words;
        total=0;
}

</script>
</head>
<body>    
                <form name="form5" action="" method="post" enctype="multipart/form-data">
                <h2 style="font-size:14px"> Add New FInish Good</h2>
                <table class="sale_fg">
                <tr>
                <td>Date:</td>
                <td><input type="text" name="t11" class="q_in" value="<?php echo date('d-m-Y'); ?>"></td>
                <td>Product Name:</td>
                <td><input type="text" name="t12" class="q_in" value=""></td>
                </tr>
                </table>
                <br><br>
                <table class="des_fg">
                <tr class="menu_header">
                <td width="2%">S</td>
                <td width="10%">Stock Name</td>
                <td width="10%">Box/Bag</td>
                </tr>
                <div class="adddel1">
       			<input type="button" value="+" class="add" onClick="addRow('dataTable');add();" >&nbsp;
		 		<input type="button" value="-" class="add" onClick="deleteRow('dataTable')" >
         		</div>
                </table>
                <table class="des_fg" id="dataTable">
                <tr>
                <td width="2%"><input class="ch" type="checkbox" name="chk[]"/></td>
                <td width="23%">
                
                <select name="pr[]" class="des_cap">
                <?php
				while($row_sd=mysql_fetch_array($res_s))
				{
					echo "<option>";
					echo $row_sd[1];
					echo "</option>";
				}
				?>
                </select>
                </td>
                <td width="15%">
                 <input class="des_cap" type="text" name="qnt[]" id="" value="" ><br>
                </td>
               
                </tr>
                </table>
 				<div class="i_button">
       			 <input type="submit" value="Submit" name="submit">
        		<input type="submit" value="Cancel" name="cancel">
       
      			</div>
		
        	</form>
        	

</body>
</html>
