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
    </head>

    <body>
        <div class="container">
        	
        	<div class="row row-padding">
            	<div class="col-md-12 text-center">
                    <p class="text-grey"><?php echo @$_GET['code_value']; ?></p>
                    <p class="text-red">It does not appear that this CPT code supports reimbursement for telemedicine service.</p>
                </div>
        		<div class="col-md-12 text-center">
                	<img src="images/error.png" class="error-image">
        		</div>
        	</div>
            
            <div class="row row-error-padding">
                <div class="col-md-12 text-center">
                    <form method="post" action="index.php">
                        <button class="btn btn-secondary group-search-btn" type="submit" style="width:180px">
                            <i class="fa fa-search" aria-hidden="true"></i>&emsp;Search Again
                        </button>
                    </form>
                </div>
            </div>

            <div class="push"></div>
        </div>

    	<div class="modal-footer error-footer">
        	<img src="images/logo.png" width="94px" height="80px">
        </div>
    </body>
</html>