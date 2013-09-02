<?php
include("../session/session.php");

include("../include/database.php");
$per_page = 19;

$sql = "select * from purches";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);

?>
<html>
<head>
<title>Jaykar Industries</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<link rel="shortcut icon" href="images/favicon.ico">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="js/addrow.js"></script>
<script type="text/javascript" src="custom.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/slider.js"></script>
<script type="text/javascript" src="../js/superfish.js"></script>
<script type="text/javascript" src="../js/toword.js"></script>
<link rel="stylesheet" href="jquery-ui.css" />
<script src="jquery-1.8.2.js"></script>
<script src="jquery-ui.js"></script>
<script type="text/javascript">
$(function(){
	$('.datepicker').live('click', function() {
    $(this).datepicker('destroy').datepicker({changeMonth: true,changeYear: true,dateFormat: "yy-mm-dd",yearRange: "1900:+10",showOn:'focus'}).focus();
    });
});
</script>
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
         if(obj[i].name == "value[]")
		 {
          		if(qty > 0 && rate > 0)
				{
					obj[i].value = qty*rate;
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
function getQuant()
{
	$q1="select * from sub_sale where product=";
}
function chk()
	{
		if(document.getElementById("d1").value!='' && document.getElementById("d2").value!='')
		{
			return(true);
		}
		else
		{
		  alert("Select date");
			return(false);
		}
	}
</script>
	<script type="text/javascript">
	
	$(document).ready(function(){
		
	//Display Loading Image
	function Display_Load()
	{
	    $("#loading").fadeIn(900,0);
	
	}
	//Hide Loading Image
	function Hide_Load()
	{
		$("#loading").fadeOut('slow');
	};
	

    //Default Starting Page Results
   
	$("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
	
	Display_Load();
	
	$("#content").load("purchespagination.php?page=1", Hide_Load());



	//Pagination Click
	$("#pagination li").click(function(){
			
		Display_Load();
		
		//CSS Styles
		$("#pagination li")
		.css({'color' : '#0063DC'});
		
		$(this)
		.css({'color' : '#FF0084'})
		.css({'border' : 'none'});

		//Loading Data
		var pageNum = this.id;
		
		$("#content").load("purchespagination.php?page=" + pageNum, Hide_Load());
	});
	
	
});
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
        <td class="info"><span class="newbook"><a href="#" rel="popuprel" class="popup new">Purches Report</a> </span>  
        </td>
        </tr>
        </table>
        <div class="popupbox7" id="popuprel">
		<div id="intabdiv">
        	<h2>Sales Details</h2>
            <form name="form5" action="rptPurches.php" method="post" onSubmit="return chk()">
              Select Date1 : <input type="text" name="dt1" class="datepicker" id="d1">
           	  <br/><br/>
              Select Date2 : <input type="text" name="dt2" class="datepicker" id="d2">
              <br/><br/>
              <div class="i_button29">                 
              <input type="submit" name="go" value="Show">
              </div> 
            </form>
        </div>
		</div>
       		<div id="loading" ></div>
			<div id="content" ></div>
            
        	<table width="800px">
			<tr><Td>
			<ul id="pagination">
				<?php
				//Show page links
				for($i=1; $i<=$pages; $i++)
				{
					echo '<li id="'.$i.'">'.$i.'</li>';
				}
				?>
	</ul>	
	</Td></tr></table>

     </div>
     </div>
                    
 <div id="fade"></div>
 <div class="clear"></div>
 <div id="footer">
     <div class="clear"></div> 
 </div>
</body>
</html>
