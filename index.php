<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Telemedicine Reimbursement</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script>
	$(document).ready(function(){
		var search = window.location.search; 
		if(search.split('=')[1] == "zipcode"){
			$("#form-originating").hide();
			$("#form-provider").hide();
			$(".seg-Code").hide();
			$("#show").hide();
			$("#image").hide();
			$("#form-zipcode").show();
		}
		else{
	        $("#image").show();
	        $("#home-page").show();
	        $("#categories").hide();
	        $("#show").show();
	        $("#form-originating").hide();
	        $("#form-provider").hide();
	        $("#form-zipcode").hide();
		}

	    $("#show").click(function(){
	        $("#image").hide();
	        $("#categories").show();
	        $("#home-page").show();
	        $("#form-originating").hide();
	        $("#form-provider").hide();
	        $("#form-zipcode").hide();
	        $("#show").hide();
    });

		$('input[type=radio]').click(function(x) {
			var id = x.currentTarget.id;

				if(id == "seg-Code"){
					 $("#form-originating").hide();
					 $("#form-provider").hide();
					 $(".seg-Code").show();
					 $("#form-zipcode").hide();
				}
				else if(id == "seg-Originating"){
					$("#form-originating").show();
					$("#form-provider").hide();
					$(".seg-Code").hide();
					$("#form-zipcode").hide();
				}
				else if(id == "seg-Provider"){
					$("#form-originating").hide();
					$("#form-provider").show();
					$(".seg-Code").hide();
					$("#form-zipcode").hide();
				}
				else if(id == "seg-Location"){
					$("#form-originating").hide();
					$("#form-provider").hide();
					$(".seg-Code").hide();
					$("#form-zipcode").show();
				}		
			});
		});
</script>

		<script>

			function CPT_code(){

				var Cod=document.getElementById('code').value;
				
				if(Cod == ""){
					document.getElementById('CO').innerHTML="Please Enter CPT Code";
				}else if(Cod != ""){
					document.getElementById('CO').innerHTML="";
					return true;
				}
				return false;
			}
			
			function ZipCode(){

				var ZipCod = document.getElementById('zipcode').value;
				
				if(ZipCod == ""){
					document.getElementById('ZC').innerHTML="Please Enter Zip Code";
				} else if(ZipCod != ""){
					document.getElementById('ZC').innerHTML="";
					return true;
				}
				return false;
			}
		</script>
</head>

<body>

	<div class="container">
		<div class="row row-padding">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 text-right vector-img">
				<img src="images/vector-image.png" class="img-responsive" id="image">
				<div class="btn-group-vertical-index" id="categories">
					<input type="radio" name="options1" id="seg-Code" autocomplete="off" checked>
					<label for="seg-Code"><img src='images/code.png' width="43px" height="43px" />&emsp;&emsp;Browse By Code</label>

					<input type="radio" name="options1" id="seg-Provider" autocomplete="off">
					<label for="seg-Provider"><img src='images/provider.png' width="43px" height="43px" />&emsp;&emsp;Browse by Distant Provider Type</label>

					<input type="radio" name="options1" id="seg-Originating" autocomplete="off">
					<label for="seg-Originating"><img src='images/originating.png' width="43px" height="43px" />&emsp;&emsp;Browse by Originating Site</label>

					<input type="radio" name="options1" id="seg-Location" autocomplete="off">
					<label for="seg-Location"><img src='images/location.png' width="43px" height="43px" />&emsp;&emsp;Browse by Location</label>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 text-left">

				<div class="text-padding" id="home-page">
					<p class="main-text">What Services Are Covered</p>
					<p class="second-text">For Telemedicine?</p>

					<form method="get" action="search.php" class="seg-Code" onsubmit="return CPT_code()">
						<input type="text" class="form-control text-box pull-left" name="cpt_code" placeholder="Enter CPT Code" id="code">
							<span class="grp-btn">
								<button type="submit" name="search" value="cpt_code" class="btn btn-secondary group-btn">GO</button>
							</span>
						<div id="CO"></div>	
					</form>
				</div>

					<p class="third-text" id="show"><strong>Browse Covered Services</strong></p>
				<div id="form-originating"> 
					<form method="post" action="search.php">
						<button type="submit" class="btn btn-secondary group-btn-form-originating" name="originating" value="1">Office of Physician or Practitioner</button>

						<button type="submit" class="btn btn-secondary group-btn-form-originating" name="originating" value="2">Hospital (inpatient or outpatient department)</button>

						<button type="submit" class="btn btn-secondary group-btn-form-originating" name="originating" value="3">Critical Access Hospital</button>

						<button type="submit" class="btn btn-secondary group-btn-form-originating" name="originating" value="4">Rural Health Clinic</button>

						<button type="submit" class="btn btn-secondary group-btn-form-originating" name="originating" value="5">Federally Qualified Health Centers</button>	

						<button type="submit" class="btn btn-secondary group-btn-form-originating" name="originating" value="6">Hospital-based or critical access hospital-based renal dialysis center</button>	
						<button type="submit" class="btn btn-secondary group-btn-form-originating" name="originating" value="7">Skilled Nursing Facility (SNF)</button>

						<button type="submit" class="btn btn-secondary group-btn-form-originating" name="originating" value="8">Community Mental Health Center (CMHC)</button>

						<button type="submit" class="btn btn-secondary group-btn-form-originating" name="originating" value="9">Home</button>

						<button type="submit" class="btn btn-secondary group-btn-form-originating" name="originating" value="10">Public School</button>
					</form>	
				</div>

				<div class="btn-form-provider" id='form-provider'>
					<form method="post" action="search.php">
						<button type="submit" name="provider" class="btn btn-secondary group-btn-form-originating" value="1" autocomplete="off">Physician</button>

						<button type="submit" name="provider" class="btn btn-secondary group-btn-form-originating" value="2" autocomplete="off">Nurse Practitioner</button>

						<button type="submit" name="provider" class="btn btn-secondary group-btn-form-originating" value="3" autocomplete="off">Physician Assistant</button>

						<button type="submit" name="provider" class="btn btn-secondary group-btn-form-originating" value="4" autocomplete="off">Nurse-midwife</button>

						<button type="submit" name="provider" class="btn btn-secondary group-btn-form-originating" value="5" autocomplete="off">Clinical Nurse Specialist</button>	

						<button type="submit" name="provider" class="btn btn-secondary group-btn-form-originating" value="6" autocomplete="off">Certified Registered Nurse Anesthetist</button>	

						<button type="submit" name="provider" class="btn btn-secondary group-btn-form-originating" value="7" autocomplete="off">Clinical Psychologist</button>	

						<button type="submit" name="provider" class="btn btn-secondary group-btn-form-originating" value="8" autocomplete="off">Clinical Social Worker</button>	

						<button type="submit" name="provider" class="btn btn-secondary group-btn-form-originating" value="9" autocomplete="off">Registered Dietitian</button>	
					</form>
				</div>

				<div id='form-zipcode' class="text-padding1">
					<form method="get" action="search.php" class="zip-Code" onsubmit="return ZipCode()">
						<input type="text" name="zip_code" class="form-control text-box pull-left" placeholder="Enter ZIP Code" id="zipcode">
							<span class="grp-btn">
								<button type="submit" name="search" value="zip_code" class="btn btn-secondary group-btn">GO</button>
							</span>
						<div id="ZC"></div>	
					</form>
				</div>
			</div>
		</div>	
	 	<div class="push"></div>
	</div>	
	
	<div class="modal-footer footer">
		<img src="images/logo.png" width="94px" height="80px">
		<p class="bottom-menu"><strong><a href="disclaimer.html">Disclaimer</a> | <a href="#">Contact</a></strong></p>
	</div>	

</body>
</html>