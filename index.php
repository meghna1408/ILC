
<?PHP
error_reporting ('off');
$keyword = $_GET['keyword'];
$source = $_GET['source'];
if(isset($_GET['utm_source'])) {
 if(isset($_GET['source'])) {
  $source .= " / ";
 }
 $source .= $_GET['utm_source'];
}
$utm_medium = $_GET['utm_medium'];
$utm_term = $_GET['utm_term'];
$utm_content = $_GET['utm_content'];
$utm_campaign = $_GET['utm_campaign'];
$client_source = $_GET['utm_cs'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Injury Law Chambers Limited</title>
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/validate.js" ></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#form-main").validate({
		rules:{
			name:{
				required:true
			},
			email: {
				required: true,
				email: true
			},
			
			tel:{
				required:true,
				digits:true,
				minlength:11
			},
		
			accident_types:"required"
			
		},
messages:{
			
			accident_types:"Please select accident types",
			name:"Please enter your full name",
			//new_batch:"Please Select any Date",
			email: {
				required: "Please enter your email id",
				email: "Please enter valid email id"
			},
		
			tel:{ 
				required:"Please enter your contact number",
				digits:"Please enter digits only",
				minlength:"Please enter minimum 11 digits"
			}
		}
		
	});;
	$("#form-main-mobile").validate({
		rules:{
			name:{
				required:true
			},
			email: {
				required: true,
				email: true
			},
			
			tel:{
				required:true,
				digits:true,
				minlength:11
			},
		
			accident_types:"required"
			
		},
messages:{
			
			accident_types:"Please select accident types",
			name:"Please enter your full name",
			//new_batch:"Please Select any Date",
			email: {
				required: "Please enter your email id",
				email: "Please enter valid email id"
			},
		
			tel:{ 
				required:"Please enter your contact number",
				digits:"Please enter digits only",
				minlength:"Please enter minimum 11 digits"
			}
		}
		
	});;

});
</script>

<script type="text/javascript">
	$(document).ready(function(){
	$("#callback-form").validate({
		rules: {
			name: "required",
			tel: "required"
			 
		},
		messages: {
			name: "Please enter your Name",
		   tel: "Please enter your Phone No."
		}
	});
		
	$("#callback-form-mob").validate({
		rules: {
			name: "required",
			tel: "required"
			 
		},
		messages: {
			name: "Please enter your Name",
		   tel: "Please enter your Phone No."
		}
	});	
});	
</script>
<!--<script type="text/javascript">
	$(document).ready(function () {

    $('#callback').modal('show');

});
	</script>-->
</head>

<body>
<div class="modal fade hidden-xs" id="callback" tabindex="-1" role="dialog" >
      <div class="modal-dialog ">
        <div class="modal-content col-md-8 col-xs-offset-2">        
          <div class="">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                   <div class="feedback-section">
	<h3 class="frm-head">Start your claim enquiry</h3>
	<form  method="post" action="contact.php" name="callback-form" id="callback-form">
  <label class="col-md-12 col-xs-12"><input type="text"  placeholder="Name" name="name" class="input-box form-control"></label>
  <label class="col-md-12 col-xs-12"><input type="tel" placeholder="Phone No." name="tel" class="input-box form-control" ></label>
  <div class="col-sm-12 col-xs-12" align="center">
	  <label>  <input type="submit"  class="fdb-btn" value="Request a Call back"  onClick="ga('send', 'event', 'claim-enquiry', 'click', 'callback');"></label>
	</div>

	</form>	
</div>
        </div>
        <!-- /.modal-content --> 
      </div>
      <!-- /.modal-dialog --> 
    </div>
	</div>
<div class="wrapper">


<div class="container top-header">

<div class="col-lg-4 col-md-4 col-sm-5 col-xs-5 pull-left logo">
<img src="images/final_logo.png"  class="img-responsive">
</div>

<div class="col-lg-4 col-md-3 col-xs-7 col-sm-4 strap-line">
<span class="h4 expert"><strong>Expert Personal Injury Solicitors </strong></span>
</div>
<div class="pull-right col-lg-4 col-md-5 col-sm-7 col-xs-12 cal-rht text-center hidden-xs">
<a data-toggle="modal" data-target="#callback">Request a Call back</a> 	

</div>
</div>
<div class="header">
<div class="header-opacity clear">
<div class="container">

</div>
</div>

<div class="container clear">
<div class="row">
<div class=" col-md-8">
<div class="banner-section">
<h2 class="text-center"><strong>Suffered an Injury? Not your fault?</strong></h2> 
<div class="banner-pull">
<p>See if we can help you now.</p>
<ul class="checklist">
	<li>Free, no obligation consultation</li>
	<li>No Win, No Fee</li>
<li>Fast Response - call back within 5 minutes</li>		
</ul>
</div>
</div>
</div>
<div class="col-md-4 pull-right hidden-xs">
<div class="col-md-11 pdl form-section clearfix pull-right">

  <div class="col-md-12">
    <h3 class="frm-head">Start your claim enquiry</h3>
  <form  method="post" action="check.php" name="form-main" id="form-main" >
  <label class="col-md-12 col-xs-12"><input type="text"  placeholder="Name" name="name" class="input-box form-control"></label>
  <label class="col-md-12 col-xs-12"><input type="email" placeholder="Email Address" name="email" class="input-box form-control" ></label>
  <label class="col-md-12 col-xs-12">
  
  <input type="tel"   placeholder="Phone No." name="tel" class="input-box form-control"  maxlength="11" onBlur="m_valid(this,'notnumbers')" onKeyUp="m_valid(this,'notnumbers')" ></label>
  <label class="col-md-12 col-xs-12">
   
    <select name="accident_types" class="form-control"  >
                <option selected="selected" value="">Select type of accident</option>
                <option value="Road accidents">Road accidents</option>
                <option value="Workplace injury">Workplace injury</option>
                <option value="Slip & fall injuries in public places">Slip & fall injuries in public places</option>
                <option value="Medical negligence">Medical negligence</option>
                <option value="Others">Others</option>            
                </select>
     
   
  </label>
  
    <div class="form-group">
            <div class="col-sm-12 col-xs-12" align="center">
            <label>  <input type="submit"  class="smt-btn" value="Enquire Now" id="submit_btn" onClick="ga('send', 'event', 'claim-enquiry', 'click', 'enquiry');"></label>
            <p>Get a response within 5 minutes.</p>
<input type="hidden" name="keyword" value="<?PHP echo $keyword ?>" />
<input type="hidden" name="source" value="<?PHP echo $source ?>" />
<input type="hidden" name="utm_medium" value="<?PHP echo $utm_medium ?>" />
<input type="hidden" name="utm_term" value="<?PHP echo $utm_term ?>" />
<input type="hidden" name="utm_content" value="<?PHP echo $utm_content ?>" />
<input type="hidden" name="utm_campaign" value="<?PHP echo $utm_campaign ?>" />
<input type="hidden" name="utm_cs" value="<?PHP echo $client_source ?>" />
<input name="lead_location" type="text" size="100" value="" style="display:none;" id="lead_location" />
            </div>
          </div>
    
          
  </form>
  </div>
  </div>
  </div>

</div>
</div>
<div class="container">
<div class="feedback-section visible-xs-block">
	<h3 class="frm-head">Start your claim enquiry</h3>
	<form  method="post" action="contact.php" name="callback-form" id="callback-form-mob">
  <label class="col-md-12 col-xs-12"><input type="text"  placeholder="Name" name="name" class="input-box form-control"></label>
  <label class="col-md-12 col-xs-12"><input type="tel" placeholder="Phone No." name="tel" class="input-box form-control" ></label>
  <div class="col-sm-12 col-xs-12" align="center">
           <label>  <input type="submit"  class="fdb-btn" value="Request a Call back"  onClick="ga('send', 'event', 'claim-enquiry', 'click', 'callback-mob');"></label>
	</div>

				</div>

	</form>	
</div>
		</div>
	</div>

	</div>
	

<div class="container type-accd clear">
	<h2>Types of Accidents</h2>
	<div class="text-center">
	<div class="col-md-3"><img src="images/accd-img1.jpg"><h5>Road accidents</h5></div>
	<div class="col-md-3"><img src="images/accd-img2.jpg"><h5>Workplace injury</h5></div>
	<div class="col-md-3"><img src="images/accd-img3.jpg"><h5>Slip & fall & other injuries
in public places</h5></div>
	<div class="col-md-3"><img src="images/accd-img4.jpg"><h5>Medical negligence</h5></div>
	</div>
</div>




<div class="claim-section">

<div class="container">
<h2>Types of  Injury Claims we handle</h2>

<div class="row mdl-sec">
<div class="col-md-4">
<div class="claim-clm">
<img src="images/accident-img.jpg" class="img-responsive">
<h3>Road traffic accidents</h3>
<ul class="accd-point">
	<li><span>Car accident</span></li>
<li><span>Motorbike accident</span></li>
<li><span>Bicycle accident</span></li>
<li><span>Bus accident</span></li>
<li><span>Truck accident</span></li>
<li><span>Pedestrian accident</span></li>
<li><span>Vehicle accidents</span></li>
<li><span>Others</span></li>
</ul>
</div>
</div>
<div class="col-md-4">
<div class="claim-clm">
<img src="images/accident-img2.jpg" class="img-responsive">
<h3>Workplace accidents</h3>
<ul class="accd-point">
<li><span>Accidents caused by defective or
dangerous equipment</span></li>
<li><span>Slips and trips at work</span></li>
<li><span>Falls from ladders and scaffolding</span></li>
<li><span>Accidents due to insufficient or <br>
improper training</span></li>
<li><span>Burns and scalds</span></li>
<li><span>Workplace assaults</span></li>
<li><span>Injuries resulting from heavy lifting and <br/> other manual duties</span></li>
<li><span>Exposure to dangerous and harmful substances</span></li>
<li><span>Building site accidents </span></li>
<li><span>Construction site accidents </span></li>
</ul>
</div>
</div>
<div class="col-md-4">
<div class="claim-clm">
<img src="images/accident-img3.jpg" class="img-responsive">
<h3>Slips, trips and falls in public places</h3>
<ul class="accd-point">
<li><span>Accidents caused by defective pavements 
and uneven paving stones</span></li>
<li><span>Accidents on staircases that haven’t been 
correctly maintained</span></li>
<li><span>Injuries due to icy or wet surfaces that 
haven’t been gritted or clearly sign-posted</span></li>
<li><span>Playground accidents</span></li>
<li><span>Slips in supermarkets</span></li>
<li><span>Accidents in public buildings such as 
libraries and schools</span></li>
<li><span>Tripping over carelessly left litter, wires or boxes</span></li>
<li><span>Falling from faulty ladders</span></li>
<li><span>Gym accidents</span></li>
<li><span>Slips at leisure centres</span></li>
<li><span>Shopping centre falls</span></li>
<li><span>Pub accidents</span></li>

</ul>
</div>
</div>

</div>
</div>

</div>
<div class="col-md-4 visible-xs-inline-block">
<div class="col-md-11 pdl form-section clearfix pull-right">

  <div class="col-md-12">
    <h3 class="frm-head">Start your claim enquiry</h3>
  <form  method="post" action="check.php" name="form-main" id="form-main-mobile" >
  <label class="col-md-12 col-xs-12"><input type="text"  placeholder="Name" name="name" class="input-box form-control"></label>
  <label class="col-md-12 col-xs-12"><input type="email" placeholder="Email Address" name="email" class="input-box form-control" ></label>
  <label class="col-md-12 col-xs-12">
  
  <input type="tel"   placeholder="Phone No." name="tel" class="input-box form-control"  maxlength="11" onBlur="m_valid(this,'notnumbers')" onKeyUp="m_valid(this,'notnumbers')" ></label>
  <label class="col-md-12 col-xs-12">
   
    <select name="accident_types" class="form-control"  >
                <option selected="selected" value="">Select type of accident</option>
                <option value="Road accidents">Road accidents</option>
                <option value="Workplace injury">Workplace injury</option>
                <option value="Slip & fall injuries in public places">Slip & fall injuries in public places</option>
                <option value="Medical negligence">Medical negligence</option>
                <option value="Others">Others</option>            
                </select>
   
  </label>
  
    <div class="form-group">
            <div class="col-sm-12 col-xs-12" align="center">
            <label>  <input type="submit"  class="smt-btn" value="Enquire Now" id="submit_btn"  onClick="ga('send', 'event', 'claim-enquiry', 'click', 'enquiry-mob');"></label>
            <p>Get a response within 5 minutes.</p>
<input type="hidden" name="keyword" value="<?PHP echo $keyword ?>" />
<input type="hidden" name="source" value="<?PHP echo $source ?>" />
<input type="hidden" name="utm_medium" value="<?PHP echo $utm_medium ?>" />
<input type="hidden" name="utm_term" value="<?PHP echo $utm_term ?>" />
<input type="hidden" name="utm_content" value="<?PHP echo $utm_content ?>" />
<input type="hidden" name="utm_campaign" value="<?PHP echo $utm_campaign ?>" />
<input type="hidden" name="utm_cs" value="<?PHP echo $client_source ?>" />
<input name="lead_location" type="text" size="100" value="" style="display:none;" id="lead_location" />
            </div>
          </div>
    
          
  </form>
  </div>
  </div>
  </div>
<!--bottom-section-->
<div class="btm-section">
<div class="container">

<div class="col-md-12">
<h2>How we help</h2>
<div class="col-md-4 col-xs-12 pd25 text-center">
<ul class="top-point">
<li><span>Free, no obligation consultation</span></li>
</ul>
<p>
We offer, free no obligation advice over phone with our expert team of personal injury solicitors to enable you understand whether you are indeed entitled to an injury claim.</p>
</div>
<div class="col-md-4 col-xs-12  pd25 text-center">
<ul class="top-point">
<li><span>No Win, No Fee</span></li>
</ul>
<p>There is no financial risk to you. If you lose your case you will not have to 
pay for Solicitors fees. This risk we take on your behalf. No Win, No Fee.</p>
</div>
<div class="col-md-4 col-xs-12  pd25 text-center">
<ul class="top-point">
<li><span>Fast Response</span></li>
</ul>
<p>We will respond to your claim enquiry at the earliest - within 5 minutes. And thereafter, you will find our advisors most caring and responsive.</p>
</div>
</div>
</div>
</div>
<div class="copyright">
<div class="container">
<p> © 2017 Injury Law Chambers Limited, a company registered in England & Wales. Company registration number: 08119209.<br>
Company registered address: 32a Netherland Road Doncaster DN1 2PW.
 </p>
 <p>Authorized and regulated by the Solicitors Regulation Authority (SRA). SRA number: 573558.
101826</p>

</div>
</div>
</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-97667244-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 854799900;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/854799900/?guid=ON&amp;script=0"/>
</div>
</noscript>


<script type="text/javascript">
	/*******************************
* ACCORDION WITH TOGGLE ICONS
*******************************/
	function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
	</script>

<script type="text/javascript">
	 $('#callback-form').on('shown.bs.modal', function () {
        var width = $(window).width();  
        if(width < 768){
            $('#callback-form').modal('hide') 
        }
    });
	</script>
<div style="display:none;">07860558500</div>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/591ad95764f23d19a89b24fc/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
