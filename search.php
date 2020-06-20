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
		<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">

		<script>
			$(document).ready(function(){
			    $("#BCBS").mouseover(function(){
			        $(".text-sm-BCBS").css("visibility", "visible");
			    });

			    $("#Cigna").mouseover(function(){
			        $(".text-sm-Cigna").css("visibility", "visible");
			    });
			    
			    $("#United").mouseover(function(){
			        $(".text-sm-United").css("visibility", "visible");
			    });

			    $("#Aetna").mouseover(function(){
			        $(".text-sm-Aetna").css("visibility", "visible");
			    });

			    $("#Cigna").mouseover(function(){
			    	$(".text-sm-Cigna-Orig").css("visibility", "visible");
			    });
			    
			    $("#Tricare").mouseover(function(){
			    	$(".text-sm-Tricare").css("visibility", "visible");
			    });
			    
			    $("#Tricare").mouseover(function(){
			    	$(".text-sm-Tricare-Orig").css("visibility", "visible");
			    });

			    $("#BCBS").mouseout(function(){
			        $(".text-sm-BCBS").css("visibility", "hidden");
			    });
			    
			    $("#United").mouseout(function(){
			        $(".text-sm-United").css("visibility", "hidden");
			    });
			    
			    $("#Aetna").mouseout(function(){
			        $(".text-sm-Aetna").css("visibility", "hidden");
			    });

			    $("#Cigna").mouseout(function(){
			        $(".text-sm-Cigna").css("visibility", "hidden");
			    });

			    $("#Cigna").mouseout(function(){
			        $(".text-sm-Cigna-Orig").css("visibility", "hidden");
			    });
			    
			    $("#Tricare").mouseout(function(){
			    	$(".text-sm-Tricare").css("visibility", "hidden");
			    });

			    $("#Tricare").mouseout(function(){
			    	$(".text-sm-Tricare-Orig").css("visibility", "hidden");
			    });
			});
		</script>
	</head>

	<body>
		<div class="container">
			<div class="row row-padding">
		            
				<?php
				$searchBy = 'code';
		    	try {
		    		if(isset($_GET["search"])){
		            	include ("includes/db.php");
		            		if(isset($_GET["zip_code"])){ //Start of Zip Code
		            			$searchBy = 'zipcode';
		                		$Value = $_GET["zip_code"];
		                		$sql = "SELECT * FROM zipcode WHERE rural_zipcode='" . $Value . "'";
								$sth = $pdo->query($sql);
									if($result = $sth->fetch()){ ?>	

										<div class='col-md-12 text-center'>    
											<div class='col-md-2 back-text'>
												<a href='index.php?search=zipcode'>
													<i class='fa fa-angle-double-left'>&nbsp;</i>Back
												</a>
											</div>
											<div class='col-md-10'></div>
													
											<p class='text-lg'>Medicaid Rural Coverage</p>
											<p class='text-grey'><?php echo $Value ?></p>
										</div>
					
										<div class='col-md-3 col-md-offset-1 text-center search-box' id='Medicare'>
								        	<img src='images/green-tablet.png'> 
								            <p class='text-md'>Medicare</p>
								            <p class='text-sm'>Covered</p>
										</div>
								
								<?php }else{
					                		echo '<script>window.location ="zipcode_error.php?code_value=' . $Value . '"</script>';
					            		} 
								}//End of Zip Code	         

					            else if(isset($_GET["cpt_code"])){ //Start of CPT_Code
					                $Value = $_GET["cpt_code"];
					                $sql = "SELECT * FROM codes 
					                INNER JOIN coverage ON codes.code = coverage.code 
					                INNER JOIN providers ON providers.p_id = coverage.p_id 
					                WHERE codes.code='".$Value."'";   

									$sth2 = $pdo->query($sql);
					            	$result2 = $sth2 -> fetch(); ?>
			
									<div class='col-md-12 text-center'>
										<div class='col-md-2 back-text1'><a href='index.php?search=cpt_code'><i class='fa fa-angle-double-left'>&nbsp;</i>Back</a></div><div class='col-md-10'></div>
										<p class='text-grey'><?php echo $Value; ?></p>
								    	<p class='text-lg'><?php echo $result2['description']; ?></p>
									</div>
									
									<?php
										$sth = $pdo->query($sql);
							            	if($result = $sth->fetchAll()){
									            foreach ($result as $row) {           
									            	$Coverage = $row['coverage'];
									             
										            if($Coverage == 1){
										            	$tablet="green-tablet"; 
										            	$Title="Covered";
										            }
										            else if($Coverage == 2){
										            	$tablet="yellow-tablet";
										            	$Title="Rural-Covered";
										            }
										            else if($Coverage == 0){
										            	$tablet="red-tablet";
										            	$Title="Not Covered";
										            } 
							    	?>
													<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 text-center" id="<?php echo $row['provider_title'] ?>">
														<div class="search-box">
												        	<img src="images/<?php echo $tablet; ?>.png"> 
												            <p class="text-md"><?php echo $row['provider_title']; ?></p>
												            <p class="text-sm"> <?php echo $Title; ?></p>
											            </div>
													</div>

													<?php } //End of Foreach Loop ?>

													<div class="row" id="search-hover">
												        <div class="col-md-12">
													 		<?php 
																foreach ($result as $row) {
													 		    	$Provider = $row['provider_title'];
													 		    
													 		    	if($Provider == "BCBS"){
													 		    		echo "<p class='text-sm-BCBS'>" . $row['note'] . "</p>";
													 		    	}else if($Provider == "United"){
													 		    		echo "<p class='text-sm-United'>" . $row['note'] . "</p>";
													 		    	}else if($Provider == "Cigna"){
													 		    		echo "<p class='text-sm-Cigna'>" . $row['note'] . "</p>";
													 		    	}else if($Provider == "Aetna"){
													 		    		echo "<p class='text-sm-Aetna'>" . $row['note'] . "</p>";
													 		    	}
											 					} // End of Foreach Loop 
											 				?>
									 					</div>
									 				</div>
									 				
									 		<?php    
									        } // End of If Statement 
									        else{
									                echo '<script>window.location ="error.php?code_value=' . $Value . '"</script>';
									            }
    									} //End of CPT_Code
       
        							} //End of If Statement = if(isset($_GET["search"]))

						            if(isset($_POST["originating"])){ // Start of Originating Site
						        		include ("includes/db.php");
						                $Value = $_POST["originating"]; 
						              
							            $sql = 'SELECT * FROM originating 
							                INNER JOIN site_provider ON originating.org_id=site_provider.org_id 
							                INNER JOIN originating_provider ON originating_provider.p_id = site_provider.p_id 
							                WHERE site_provider.org_id="'.$Value.'"';  
										
							            $sth2 = $pdo->query($sql);
							            $result2 = $sth2 -> fetch(); ?>

										<div class='col-md-12 text-center'>
											<div class='col-md-2 back-text1'>
												<a href='index.php'>
													<i class='fa fa-angle-double-left'>&nbsp;</i>Back
												</a>
											</div>
											<div class='col-md-10'></div>
										    	<p class='text-lg'>
										    		<?php echo $result2['originating_site']; ?>
										    	</p>
										</div>

										<?php	
											$sth = $pdo->query($sql);
									            if($result = $sth -> fetchAll()){
										            foreach ($result as $row) {           
										            	$Coverage = $row['coverage'];
										             
											            if($Coverage == 'covered'){
											            	$tablet="green-tablet"; 
											            	$Title="Covered";
											            	$not_covered_hidden="";
											            }
											            else{
											            	$tablet="yellow-tablet";
											            	$Title="Covered";
											            	$not_covered_hidden="org-hidden";
											            }
								    	?>

										<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 text-center" id="<?php echo $row['provider_title'] ?>">
								        	<div class="search-box" >
									        	<img src="images/<?php echo $tablet; ?>.png"> 
									            <p class="text-md"><?php echo $row['provider_title']; ?></p>
									            <p class="text-sm <?php echo $not_covered_hidden; ?>"> <?php echo $Title; ?></p>
								            </div>
										</div>

										<?php 
											} //End of Foreach Loop of Originating Site
										?>

										<div class="row" id="search-hover">
									        <div class="col-md-12">
								 		
										 		<?php 
													foreach ($result as $row) {
										 		    	$Provider = $row['provider_title'];
										 		    
										 		    	if($Provider == "Cigna"){
										 		    		echo "<p class='text-sm-Cigna-Orig'>" . $row['note'] . "</p>";
										 		    	}else if($Provider == "Aetna"){
										 		    		echo "<p class='text-sm-Aetna'>" . $row['note'] . "</p>";
										 		    	}else if($Provider == "Tricare"){
										 		    		echo "<p class='text-sm-Tricare-Orig'>" . $row['note'] . "</p>";
										 		    	}
								 					} // End of Foreach Loop 
								 				?>
								 			</div>
								 		</div>

								 			<?php	     
        										} // End of IF Statement for Originating Site
            								} //End of Originating Site            

							            if(isset($_POST["provider"])){ //Start of Provider
							        		include ("includes/db.php");
							                $Value = $_POST["provider"];
								            $sql = 'SELECT * FROM distant 
								                INNER JOIN site_distant ON distant.dis_id=site_distant.dis_id 
								                INNER JOIN distant_provider ON distant_provider.p_id=site_distant.p_id 
								                WHERE site_distant.dis_id="'.$Value.'"';  
												$sth2 = $pdo->query($sql);
									            $result2 = $sth2 -> fetch();
									    ?> 

										<div class='col-md-12 text-center'>
											<div class='col-md-2 back-text1'>
												<a href='index.php'>
													<i class='fa fa-angle-double-left'>&nbsp;</i>Back
												</a>
											</div>
											<div class='col-md-10'></div>
										    	<p class='text-lg'>
										    		<?php echo $result2['distant_site']; ?>
										    	</p>
										</div>

										<?php	
											$sth = $pdo->query($sql);
									            if($result = $sth -> fetchAll()){

										            foreach ($result as $row) {           
										            	$Coverage = $row['coverage'];
										             
											            if($Coverage == 'covered'){
											            	$tablet="green-tablet"; 
											            	$Title="Covered";
											            	$not_covered_hidden="";
											            }			            
											            else if($Coverage == 'not-covered'){
											            	$tablet="red-tablet"; 
											            	$Title="Not Covered";
											            	$not_covered_hidden="";
											            }
											            else{
											            	$tablet="yellow-tablet";
											            	$Title="Covered";
											            	$not_covered_hidden="org-hidden";
											            }          
								    	?>
										<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 text-center" id="<?php echo $row['provider_title'] ?>">
											<div class="search-box">
									        	<img src="images/<?php echo $tablet; ?>.png"> 
									            <p class="text-md"><?php echo $row['provider_title']; ?></p>
									            <p class="text-sm <?php echo $not_covered_hidden; ?>"> <?php echo $Title; ?></p>
									        </div>    
										</div>
									<?php 
										} // End of Foreach Loop for Provider
									?>

									<div class="row" id="search-hover">
								        <div class="col-md-12">

									 		<?php 
												foreach ($result as $row) {
									 		    	$Provider = $row['provider_title'];
									 		    
									 		    	if($Provider == "Tricare"){
									 		    		echo "<p class='text-sm-Tricare'>" . $row['note'] . "</p>";
									 		    	}else if($Provider == "Cigna"){
									 		    		echo "<p class='text-sm-Cigna-Orig'>" . $row['note'] . "</p>";
									 		    	}else if($Provider == "Aetna"){
									 		    		echo "<p class='text-sm-Aetna'>" . $row['note'] . "</p>";
									 		    	}
							 					} // End of Foreach Loop for Provider
						 					?>
						 		  		</div>
						 			</div>
						 			
						 			<?php	  
							            	} //End of If Statement
							        	} //End of Provider
			    	$dbh = null;
			    } // End of Try Block
			    catch(PDOException $e){
			        echo $e->getMessage();
			        } // End of Catch Block
				?>

			    <div class="row row-padding-search">
			        <div class="col-md-12 text-center">
			            <button class="btn btn-secondary group-search-btn" onclick="window.location.href='index.php?search=<?php echo $searchBy; ?>'" style="width:180px">
			            <i class="fa fa-search" aria-hidden="true"></i>&emsp;Search Again
			            </button>
			        </div>
			    </div>
				<div class="push"></div>
	 		</div><!--End of Row Padding-->						
		</div><!--Container Close-->
		
		<div class="modal-footer search-footer">
	    	<img src="images/logo.png" width="94px" height="80px">
	    </div>
	</body>
</html>