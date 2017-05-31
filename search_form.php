<?PHP 
//include("../connect.php"); 
include("connect.php");

if(isset($_SESSION['login_usertype']) && $_SESSION['login_usertype']=="brand_user" && isset($_SESSION['brand_id_group']) && $_SESSION['brand_id_group']!="0" && $_SESSION['brand_id_group']!="") { 
	$region_query="Select CONCAT('2:',brand_id) AS brand_id,name from brand where active='1' and brand_id in (".$_SESSION['brand_id_group'].") order by name";
	mysql_query($region_query) or die('Error fetching result1');
	$region_result1=mysql_query($region_query);
	
	$region_result = array();
} else {
	$region_query="Select CONCAT('2:',brand_id) AS brand_id,name from brand where active='1' order by name";
	mysql_query($region_query) or die('Error fetching result1');
	$region_result1=mysql_query($region_query);
	
	include("../connect.php"); 
	$region_query="Select CONCAT('1:',brand_id) AS brand_id,name from brand where active='1' order by name";
	mysql_query($region_query) or die('Error fetching result1');
	$region_result=mysql_query($region_query);
}

if(isset($_SESSION['brandname']) && $_SESSION['brandname']!="" ) {
	$pieces = explode(":", $_SESSION['brandname']);
	$brand = $pieces[1];
	$category = $pieces[0];
}

if(isset($category) && $category==2) {
	include("connect.php");
}

include("../config.php"); 
include("../auth.php"); 

//$brand=$_REQUEST['region'];
$status=$_REQUEST['status'];
$fdate=$_REQUEST['date_from'];
$tdate=$_REQUEST['date_to'];

$datefrom = $_REQUEST['date_from'];
$dateto = $_REQUEST['date_to'];
//$brand = $_REQUEST['brand'];
$status=$_REQUEST['status'];
$region=$_REQUEST['region'];
$pages=$_REQUEST['page'];
$submit=$_POST['submit'];

if($region=="")
{ 
echo "";
}
else{
$regionname_query="Select region_name from brand_regions where region_id='$region'";
$regionname_result=mysql_query($regionname_query);
$region_names=mysql_fetch_assoc($regionname_result);
$regionname = $region_names['region_name'];
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" />
<title>Internet leads</title>
<script src="../js/sorttable.js" type="text/javascript"></script>
<script src="../js/jquery-1.6.2.js" type="text/javascript"></script>
<script src="../js/jquery.ui.widget.js" type="text/javascript"></script>
<script src="../js/jquery.ui.datepicker.js" type="text/javascript"></script>
<script src="../js/jquery.ui.core.js" type="text/javascript"></script> 
<script src="../js/jquery.jtruncate.js" type="text/javascript"></script>

 <script type="text/javascript">
 $().ready(function(){
   $(".sortable tr:even").addClass("zeb");
   $(".sortable tr:odd").addClass("zebr");
   $(".stripeMe tr td:first-child").addClass("bor_left");
 });
 </script>
 	<script>
	$(function() {
		$( "#datepickerfr" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#datepickerto" ).datepicker({dateFormat: 'yy-mm-dd'});
	});
	</script>
   
<script>
$(document).ready(function () {
$('.rmv-dft-val').click(
function() { 
if (this.value == this.defaultValue) 
{this.value = '';}});
$('.rmv-dft-val').blur(
function() {
if (this.value == '') {
this.value = this.defaultValue;
}
}
);
});
</script>

<script>
function compareDate()
{

valid =true;

var start = document.dashboard.date_from.value;
var end = document.dashboard.date_to.value;
var brand = document.dashboard.brand.value;

var fromd = Date.parse("start");
var tod = Date.parse("end");

if(start == '- Select date -')
{
  alert("Please enter from date");
  valid = false;
}
if(end == '- Select date -')
{
  alert("Please enter to date");
  valid = false;
} 
if(brand == '')
{
  alert("Please select a brand");
  valid = false;
} 
return valid;
}
</script>
<script>
$().ready(function() {  
   $('.example1').jTruncate({  
       length: 100,  
       minTrail: 0,  
       moreText: "more",  
       lessText: "close",  
       ellipsisText: "",  
       moreAni: "",  
       lessAni: ""  
   });  
})
</script>


<script type="text/javascript">
/*$(document).ready(function() 
{*/
	function loadLeads() {
		var attempt = document.getElementById("attempt").value;

		if(attempt=='1') {
		var brand = $("#brand").val();
		//var region = $('#region').val();
		//var status = $('#status').val();
		var date_from = $("#datepickerfr").val();
		var date_to = $("#datepickerto").val();  
		var info = '$pages=&brand='+brand+"&date_from="+date_from+"&date_to="+date_to+'&attempt='+attempt;
		
		var url= "search_form.php?"+info;
		$(location).attr('href',url);
		} else {
			document.getElementById("attempt").value='1';
		}
	}
//});
</script>



<!-- download excell -->

<script type="text/javascript">
$(function() {
$(".download").click(function(){

var brand = $('#brand').val();
var frdate = $('#datepickerfr').val();
var todate = $('#datepickerto').val();
var region = $('#region').val();
var status = $('#status').val();

if (brand == '')
{
 alert ("Please select a brand.");
}
else
{
 var url = 'download_excel.php?export=1'+'&brand='+brand+'&from='+frdate+'&to='+todate+'&region='+region+'&status='+status
 $(location).attr('href',url);
}
});
});

</script>

<!-- Fetch Region of brand -->
<script type="text/javascript">

$(function() 
{

$("#brand").change(function()
{
  var brandid = $(this).val(); 
  var info = 'brandid='+brandid;

  $.ajax
({
type: "POST",
url: "storeBrandSession.php",
data: info,
cache: false,
success: function()
{}
});

if (brandid == '')
{
 alert ("Please select a brand.");
}else
{
$.ajax
({
type: "POST",
url: "region.php",
//data: info,
cache: false,
success: function(html)
{
$("#region").html(html);
}
});
}
});
});
</script>
<!-- CODE END -->

<!-- Fetch Status of brand -->
<script type="text/javascript">
$(document).ready(function() 
{
$("#brand").change(function()
{
  var brandid = $(this).val(); 
  var info = 'brandid='+brandid;

$.ajax
({
type: "POST",
url: "status.php",
//data: info,
cache: false,
success: function(html)
{
$("#status").html(html);

var date_from = $("#datepickerfr").val();
var date_to = $("#datepickerto").val();


var url= "search_form.php?pages=&brand="+brandid+"&date_from="+date_from+"&date_to="+date_to;
$(location).attr('href',url);

}
});

});
});
</script>
<!-- CODE END -->

<!-- Fetch Region of brand -->
<script type="text/javascript">
$(document).ready(function() 
{
$("#region").change(function()
{
  var brand = $("#brand").val();
  var region = $(this).val();  
  var status = $("#status").val();
  var date_from = $("#datepickerfr").val();
  var date_to = $("#datepickerto").val();  
  var info = '$pages=&brand='+brand+"&region="+region+"&status="+status+"&date_from="+date_from+"&date_to="+date_to;
  
//alert (info);
var url= "search_form.php?"+info;
$(location).attr('href',url);
});
});
</script>

<!-- Fetch status of brand -->
<script type="text/javascript">
$(document).ready(function() 
{
$("#status").change(function()
{
  var brand = $("#brand").val();
  var region = $("#region").val();  
  var status = $(this).val();
  var date_from = $("#datepickerfr").val();
  var date_to = $("#datepickerto").val();  
  var info = '$pages=&brand='+brand+"&region="+region+"&status="+status+"&date_from="+date_from+"&date_to="+date_to;
  
//alert (info);
var url= "search_form.php?"+info;
$(location).attr('href',url);
});
});
</script>

<script type="text/javascript">
$(document).ready(function() 
{
$(".leadbut").click(function()
{
  var brand = $("#brand").val();
  var region = $("#region").val();  
  var status = $("#status").val();
  var date_from = $("#datepickerfr").val();
  var date_to = $("#datepickerto").val();  
  var info = 'pages=&brand='+brand+"&region="+region+"&status="+status+"&date_from="+date_from+"&date_to="+date_to;

if(brand=="")  
{
alert ("Please select brand");
}
else{  
//alert (info);
var url= "search_form.php?"+info;
$(location).attr('href',url);
}
});
});
</script>




</head>
<body onload="<?php if(isset($_SESSION['brandname']) && !isset($_REQUEST['region']) && !isset($_REQUEST['status']) && !isset($_REQUEST['pages'])) { ?> loadLeads(); <?php } ?>">
<?PHP 
$lastmonth1 =mktime(0, 0, 0, date("m")-7, date("d")+1,   date("Y")-1);
$lastmonth = '2011-01-01';
$gettodaysdate1 =mktime(0, 0, 0, date("m"), date("d"),   date("Y"));
$todaysdate = date('Y-m-d', $gettodaysdate1);

/*
<div id="headerinner"><div class="banner"><!--<img src="images/online.jpg" alt="" title="" border="0" />--><img src="../images/interskale_logo.png"  /><div class="login">Welcome <span class="username"><?PHP echo $firstname. " " . $lastname; ?></span><span class="signout"><a href="../index.php">Sign out</a></span></div></div>
<!-- menu section -->

<div id="menu">
<ul class='topmenu'>
<li class="firstli"><a href="search_form.php">Leads</a></li>
<li class='secondli'><span>Reports</span>
    <ul class="sub-menu">
      <li><a href="summary_reports.php">Summary Report</a></li>
       <li><a href='users_reports.php'>Login Report</a></li>
    </ul>
</li>
</ul>
<span class="lms_manage"><a href="../dashboard/index.php" target="_blank">Manage LMS clients</a></span>
</div>


<!-- menu section end -->
</div>
*/
?>

<div id="headerinner"><div class="banner">
<div style="width:567px; float:left;">
<img src="../images/interskale_logo.png"  />

<?php
echo "<div class='login' style='float:right'>";
if(isset($brand)) {
	$invalid_query = "Select status_code from lead_status where brand_id = $brand AND status_title='Invalid lead'";
	
	$invalid_result = mysql_query($invalid_query);
	$value_invalid=mysql_fetch_assoc($invalid_result);
	$invalidcode=$value_invalid['status_code'];
}

// Query end

echo "<p><!--<label class='hilight'>Brand</label>-->";
/*if(isset($_SESSION['login_usertype']) && $_SESSION['login_usertype']=="brand_user") {
	echo "<input type='hidden' name='brand' id='brand' value='".$_SESSION['brandname']."' />";
} else {*/
	echo "<select name='brand' id='brand' onChange='brand(this.value)'>";
	echo "<option value=''"; if(!isset($brand) || $brand==''){ echo 'selected'; }echo ">"; echo "- Select Brand -" ; echo "</option>";
	echo "<option disabled value=''>"; echo "------------ LMS 1.2 ------------" ; echo "</option>";
	while($row_region = mysql_fetch_array($region_result))
	{
		$brand_id = explode(":",$row_region['brand_id']);
		echo "<option value='" .$row_region['brand_id']. "'";  if(isset($brand) && isset($category) && $brand==$brand_id[1] && $category==$brand_id[0]){ echo 'selected'; } echo ">" . $row_region['name'] . "</option>";
	}
	echo "<option disabled value=''>"; echo "------------ LMS 2.0 ------------" ; echo "</option>";
	while($row_region = mysql_fetch_array($region_result1))
	{
		$brand_id = explode(":",$row_region['brand_id']);
		echo "<option value='" .$row_region['brand_id']. "'";  if(isset($brand) && isset($category) && $brand==$brand_id[1] && $category==$brand_id[0]){ echo 'selected'; } echo ">" . $row_region['name'] . "</option>";
	}
	echo "</select>";
//}
//echo "</p>";
echo "</div>";
?>
</div>
<div class="login">Welcome <span class="username"><?PHP echo $firstname. " " . $lastname; ?></span><span class="signout"><a href="../index.php">Sign out</a></span></div></div>
<!-- menu section -->

<div id="menu">
<ul class='topmenu'>
<li class="firstli"><a href="search_form.php">Leads</a></li>
<li class='secondli'><span>Reports</span>
    <ul class="sub-menu">
      <li><a href="summary_reports.php">Summary Report</a></li>
       <li><a href='users_reports.php'>Login Report</a></li>
	   <li><a href='display_advertising_report.php'>View Advertising report</a></li>
	   <li><a href='utm_report.php'>Detailed Lead Report</a></li>
	   <li><a href='lead_status_quality_setting.php'>Leads status setting</a></li>
	   <!--li><a href='lead_quality_report.php'>Leads Quality</a></li-->
	   <li><a href='utm_filter_report.php'>Leads Quality Report</a></li>
	   <li><a href='piplinereport.php'>Pipeline report</a></li>	
	   <li><a href="new_pipline.php" >Lead Pipeline Report</a></li>
    </ul>
</li>
<li class='secondli'><span>Update advertising report</span>
    <ul class="sub-menu"> 
      <li><a href="preview_advertising_report.php">Add / Update Advertising</a></li>
      <li><a href='creative_report.php'>Add / Update Creative</a></li>
    </ul>
</li>
</ul>

</div>
<!--<span class="lms_manage"><a href="../dashboard/index.php" target="_blank">Manage LMS clients</a></span>-->

<!-- menu section end -->
</div>

<div class="excel_dw">
<span class='download download_excel'>Download</span>
</div>
<div id="bottom">



<div id="content"><h1 class="reprot_title_home">Leads</h1><div class="form_search"><!--<h1>Internet enquiries</h1>-->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="searchf" method="post" name="dashboard" onSubmit="return compareDate ( );">
<input type="hidden" id="attempt" name="attempt" value="<?php if(isset($_REQUEST['attempt']) && $_REQUEST['attempt']=='1') { echo '2'; } else { echo '1'; } ?>" />
<?PHP 
echo "<div class=dd_panel>";

// Region Drop down

if ($brand == "")
{
echo "<!--<label>Region</label>-->";
echo "<select name='region' id='region'>";
echo "<option selected='selected'>- Select Region -</option>";
echo "</select>";
//echo "</p>";
}else
{

$query_region = "Select region_name,region_id from brand_regions where brand_id = $brand";

$region_drop=mysql_query($query_region) or die('Error fetching result');
echo "<!--<label>Region</label>-->";
echo "<select name='region' id='region'>";
echo "<option value=''>All Regions</option>";
while($region_row=mysql_fetch_array($region_drop))
{
$region_id = $region_row['region_id'];
$region_name = $region_row['region_name'];

echo "<option value='" .$region_id. "'";  if($region==$region_id){ echo 'selected'; } echo ">" . $region_name . "</option>";

}
echo "</select>";
//echo "</p>";
}
?>


<!-- status Display -->

<?PHP
if ($brand == "")
{
echo "<!--<label>Status</label>-->";
echo "<select name='status' id='status'>";
echo "<option selected='selected'>- Select Status -</option>";
echo "</select>";
//echo "</p>";
}else
{
$query = "Select status_code,status_title from lead_status where brand_id = $brand ORDER BY sequence ASC";
$region_result=mysql_query($query) or die('Error fetching result');
echo "<!--<label>Status</label>-->";
echo "<select name='status' id='status'>";
echo "<option value=''>All Status</option>";
while($row=mysql_fetch_array($region_result))
{
$status_code = $row['status_code'];
$status_title = $row['status_title'];
echo "<option value='" .$status_code. "'";  if($status==$status_code){ echo 'selected'; } echo ">" . $status_title . "</option>";
}
echo "</select>";
//echo "</p>";
}
echo "</div>";


$client_table_query="Select table_name from clients_lead_table_name where brand_id=$brand";
$client_table_result=mysql_query($client_table_query);
$client_table_value = mysql_fetch_assoc($client_table_result);
$tablename = $client_table_value['table_name'];

// get first date of enquiry

 $start_lead_date="Select submitted FROM $tablename order by submitted limit 0, 1";

$start_lead_date_query=mysql_query($start_lead_date);
$start_lead_date_query_result=mysql_fetch_assoc($start_lead_date_query);
$value_date=$start_lead_date_query_result["submitted"];
$first_lead_date = date('Y-m-d', strtotime($value_date));

// code end

?>
<div class="search_form">
<p class="dates_p">Date range</p>
<?php /*?><input type="text" class="date" id="from" name="date_from" value="<?PHP if($fdate=="") {echo "";} else {echo $fdate;} ?>" /><?php */?><input type="text" class="date" name="date_from" value="<?PHP if($fdate=="") {echo $lastmonth;} else {echo $fdate;} ?>" id="datepickerfr" /> - <input type="text" class="date" value="<?PHP if($tdate=="") echo $todaysdate; else echo $tdate; ?>" id="datepickerto" name="date_to"/>
<div class="buttons">
<input type="button" value="Go" name="submit" class="leadbut" />
</div>
<?PHP 
//echo "<input type='button' value='Download leads' name='download' class='download' />";

?>
</div></form></div>

<?PHP

$datefrom = $_REQUEST['date_from'];
$dateto = $_REQUEST['date_to'];
//$brand = $_REQUEST['brand'];


// Query to fine column names for select query 

if ($submit != "" || $brand == "")
{
  echo "";
}else
{

$tableExists= mysql_query("select 1 from $tablename");

if($tableExists) {

//$columns_query= "Select column_name from columns_list_to_display where brand_id=$brand AND column_name!='NULL' ORDER BY display_sequences";
if($category==1) {
$columns_query= "Select column_name from columns_list_to_display where brand_id=$brand AND column_name!='NULL' ORDER BY display_sequences";
} else {
$columns_query= "Select column_name from columns_list_to_display where brand_id=$brand AND column_name!='NULL' AND column_name not in ('comments','link_text','keyword','source') ORDER BY display_sequences";
}


$result1=mysql_query($columns_query);

$col_no = mysql_num_rows($result);

// Query end

// To get Column names seprated by ',' 

while ($orow = mysql_fetch_array($result1))
$implode[] = $orow['column_name'];

$comma_columns_array = implode(",", $implode);
if($category==1) {
$query  = "SELECT $comma_columns_array,source,keyword FROM $tablename 
          LEFT JOIN notes ON $tablename.enquiry_id = notes.leads_id 
   	      LEFT JOIN lead_status ON $tablename.status = lead_status.status_code 
		  WHERE ((Date(submitted)>='$datefrom' AND Date(submitted)<='$dateto')) ";
} else {
	 $query  = "SELECT $comma_columns_array,source,keyword,medium,term,content,campaign FROM $tablename LEFT JOIN lead_status ON $tablename.status = lead_status.status_code WHERE ((Date(submitted)>='$datefrom' AND Date(submitted)<='$dateto')) ";
}

/*$query  = "SELECT $comma_columns_array,source,keyword FROM $tablename 
          LEFT JOIN notes ON $tablename.enquiry_id = notes.leads_id 
   	      LEFT JOIN lead_status ON $tablename.status = lead_status.status_code 
		  WHERE ((Date(submitted)>='$datefrom' AND Date(submitted)<='$dateto')) ";*/
if(empty($status) && empty($region))
{		  
	$query .="AND status!='$invalidcode' ORDER BY submitted DESC";
}
else if(empty($region) && isset($status)){
$query .="AND status='$status' ORDER BY submitted DESC";		  
}
else if(isset($region) && empty($status)){
$query .="AND region_id='$region' ORDER BY submitted DESC";		  
}
else if(isset($region) && isset($status)){
$query .="AND region_id='$region' AND status='$status' ORDER BY submitted DESC";		  
}

// Pagination code start here

$pagniationresult=mysql_query($query);
$num=mysql_num_rows($pagniationresult);

$pagelimit = "100";

$totalpages = ceil($num / $pagelimit);

//echo $totalpages ;die();

# get the current page or set a default
 if (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] <= $totalpages)
 {
    $currentpage = (int)$_GET['page'];
 } else
 {
    # default page number is 1
    $currentpage = 1;
 }
 # if current page is less than first page
 if ($currentpage < 1)
 {
    # set current page to the last page
    $currentpage = $totalpages;
 }
 # the offset is based on current page
 $offset = ($currentpage - 1) * $pagelimit;


//echo $num;
$query  .= " LIMIT $offset, $pagelimit";
echo "<div class=dd_pagination>";
echo "<div class='pagination_panel'>";

echo "<input name='offset' value='$offset' id='offset' type='hidden'>";
echo "<input name='page' value='$pages' id='page' type='hidden'>";
//echo $query;die();
mysql_query($query) or die('Error fetching result');
$mainresult=mysql_query($query);

 while ($row = mysql_fetch_array($result))
 {
    echo $row['title'] . "";
 };

$prevpage = $currentpage - 1;
$nextpage = $currentpage + 1;

if($pages==0 || $pages=="" || $pages=="1")
{
echo " <div class=page_link1_inactive><img src='../images/inactive_lt.jpg' alt='' title=''></div> ";
}else
{
echo " <div class=page_link1><a href='?page=$prevpage&brand=$brand&&status=$status&region=$region&date_from=$datefrom&date_to=$dateto";
if($region=="" && $region=="All Regions"){echo "";} else {echo "&region=$region";} 
if($status=="" && $status=="All Status"){echo "";} else {echo "&status=$status";} 
echo "'><img src='../images/active_lt.jpg' alt='Newer leads' title='Newer leads'></a></div> ";
}


if($pages == $totalpages || $totalpages==1)
{
echo " <div class=page_link_inactive><img src='../images/inactive_rt.jpg'></div> ";
}else
{
echo "<div class=page_link><a href='?page=$nextpage&brand=$brand&&status=$status&region=$region&date_from=$datefrom&date_to=$dateto";
if($region=="" && $region=="All Regions"){echo "";} else {echo "&region=$region";} 
if($status=="" && $status=="All Status"){echo "";} else {echo "&status=$status";}
echo "'><img src='../images/active_rt.jpg' alt='Older leads' title='Older leads'></a></div> ";
}
$range = 50; #range of number you want to display left and right
 for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++)
 {
    if (($x > 0) && ($x <= $totalpages))
    {
       if ($x == $currentpage)
       {
          # this will hilight the current page and remove the link
          //echo " [<b>$x</b>] ";
       } else
       {
          //echo " <a href='?page=$x&date_from=$datefrom&date_to=$dateto
		  //&date_from=$datefrom&date_to=$dateto";
          //  if($region=="" && $region=="All Regions"){echo "";} else {echo "&region=$region";} 
		  //echo "'>$x</a> ";
       }
    }
 }

// Pagination code end here

echo "</div>";
echo "<div class='num_result'>";
if ($offset=='0'){ if($num==0){ echo "$num-";}else{echo "1-";} if($pagelimit>=$num){ echo $num;}else{echo $pagelimit;}}
else{
echo $offset+1 . "-"; 
$result_no=$offset+$pagelimit; 
if($result_no>=$num){echo $num;}else{echo $result_no;}} echo " of " . $num;
echo "</div></div>";



//echo $query;
		  
mysql_query($query) or die('Error fetching result2');
$mainresult=mysql_query($query);

//$formain = mysql_fetch_assoc($mainresult);

//echo "<pre>";
//print_r ($formain);
//echo "</pre>";

$num=mysql_num_rows($mainresult);

if ($num == 0)
{ 
/*
echo "<div class=result_strip><strong>" . $num . "</strong> "; if ($num<=1){echo "enquiry";} else {echo "enquiries"; }
echo " received from <strong>".  date('M d, Y',strtotime($datefrom)) . "</strong> to <strong>". date('M d, Y',strtotime($dateto)) ."</strong> for <strong>" ;  if ($regionname=='') {echo "All Regions";}else{ echo $regionname; } echo "</strong>.</div>";
*/
}
else
{
/*
echo "<div class=result_strip><strong>" . $num . "</strong> "; if ($num<=1){echo "enquiry";} else {echo "enquiries"; }
echo " received from <strong>".  date('M d, Y',strtotime($datefrom)) . "</strong> to <strong>". date('M d, Y',strtotime($dateto)) ."</strong> for <strong>" ;  if ($regionname=='') {echo "All Regions";}else{ echo $regionname; } echo "</strong>.</div>";
*/
echo "<div class=result><table border=0 cellspacing=0 cellpadding=0 width=1250px class='sortable'>";
echo "<thead><tr>";

// Query to fetch and display the column tiltes

if($category==1) {
$columns_title_query= "Select field_title from columns_list_to_display where brand_id=$brand AND field_title != 'NULL' order by display_sequences";
} else {
$columns_title_query= "Select field_title from columns_list_to_display where brand_id=$brand AND field_title != 'NULL' AND field_title not in ('Contact History','Source','Keyword') order by display_sequences";
}
//$columns_title_query= "Select field_title from columns_list_to_display where brand_id=$brand AND field_title != 'NULL' order by display_sequences";
mysql_query($columns_title_query) or die('Error fetching result3');
$columns_title_result = mysql_query($columns_title_query);
$num_col=mysql_num_rows($columns_title_result);

// retreive display_sequences and column_associated

while($col = mysql_fetch_array($columns_title_result))
{
  echo "<th class='sorttable_nosort'>" . $col['field_title'] . "</th>";
}
echo "<th class='sorttable_nosort' style='width:110px;'><div>" . Source . "</div></th>";
echo "<th class='sorttable_nosort'><div class=''>" . Keyword . "</div></th>";
echo "<th class='sorttable_nosort'><div class=''>" . Medium . "</div></th>";
echo "<th class='sorttable_nosort'><div class=''>" . Term . "</div></th>";
echo "<th class='sorttable_nosort'><div class=''>" . Content . "</div></th>";
echo "<th class='sorttable_nosort'><div class=''>" . Campaign . "</div></th>";
echo "</tr></thead><tbody>";
echo "<tr>";


while($row = mysql_fetch_assoc($mainresult))
{
foreach ($row as $key => $value)
{
    if ($key=='submitted')
	{ 
	    echo "<td>" . date('M d, Y g:i:s a',strtotime($value)). "</td>";
	}
	else if ($key=='website')
	{ 
	    echo "<td style='empty-cells:show'><div class='org_web'>". $value."</div></td>";
	}	
	else if ($key=='yourname')
	{ 
	    echo "<td><div class='info'><p class='info1'>" . $row['yourname'] . "</p><p>".  $row['email'] . "</p><p>". $row['phone'] . "</p></div></td>";
	}
	else if ($key=='parent_name')
	{ 
	    echo "<td><div class='info'><p class='info1'>" . $row['parent_name'] . "</p><p>".  $row['parent_phone'] . "</p><p>".  $row['parent_email'] . "</p><p>". $row['parent_city'] . "</p></div></td>";
	}
	else if ($key=='parent_email'){ }
	else if ($key=='parent_phone'){ }
	else if ($key=='parent_city'){ }
	else if ($key=='yourfirstname')
	{ 
	    echo "<td><div class='info'><p class='info1'>" . $row['yourfirstname'] . " " . $row['yourlastname'] . "</p><p>".  $row['email'] . "</p><p>". $row['phone'] . "</p></div></td>";
	}
	else if ($key=='need')
	{ 
	    echo "<td style='empty-cells:show'><div class=example1 style='width:150px'>". $value."</div></td>";
	}
	else if ($key=='comments')
	{ 
        echo "<td style='empty-cells:show;width:150px;'>". $value."</td>";
	}
    else if ($key=='status_code')
	{ 
	    echo "<td class='tdstatus'>"; 
		$query_set_status_class= "Select * from lead_status where brand_id=$brand LIMIT 0, 1";
     	$result_query_set_status_class = mysql_query($query_set_status_class);
		  while($row_result = mysql_fetch_array($result_query_set_status_class))
		  {
		    $match_title = $row_result['status_code'];
		  }
        if ($row['status_code']==$match_title)
		{
		echo "<div id='Valid"; 
		echo $row['id']; echo "'>";
		echo "<div class='statusvalid'>" . $row['status_title'] . "</div>";
		echo "</div></td>";
		} 
		else 
		{
		echo "<div id='Invalid"; 
		echo $row['id']; echo "'>";
		echo "<div class='statusinvalid'>" . $row['status_title'] . "</div>";
		echo "</div></td>";
		}
	}
	else if ($key=='status_title'){ }
	else if ($key=='link_text'){ }
	else if ($key=='id'){ }	
	else if ($key=='email'){ }
	else if ($key=='phone'){ }	
	else if ($key=='yourlastname'){ }	
	else 
	{ 
	    echo "<td><div style='width:100px; word-wrap:break-word;'>". $value . "</div></td>";
	}
}

echo "</tr>";
}
echo "</tbody></table></div>";
}
} else {
	echo 'table not exist.';
}
mysql_close($connection);
}
?>
</div>
</div><div id="footer"><div class="footer_content">Lead Management System version 2.4<BR />Copyright © 2016, Interskale Digital Marketing and Consulting Pvt. Ltd., 635 Laxmi Plaza, Laxmi Industrial Estate, New link Road, Andheri (West), Mumbai 400 053, INDIA.</div></div>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27697927-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
