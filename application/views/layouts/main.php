<!DOCTYPE html>
<html>

	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- CSS styles -->
	    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->
		<link rel="stylesheet" href="<?php echo base_url('assets/bs/css/bootstrap.min.css') ?>">
	    <!-- JS Libs -->
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js" type="text/javascript"></script>
    	<script src="<?php echo base_url('assets/bs/js/bootstrap.min.js') ?>" type="text/javascript"></script>
	</head>

	<body>

	
<style>
    .form-select,
    .form-control {
        border: none;
        border-bottom: 1px solid #ccc;
        border-radius: 0;
    }

    .form-select:focus,
    .form-control:focus {
        box-shadow: inset 0 -1px 0 #2196f3;
        border-bottom-color: #2196f3;
    }

  
</style>
		 <div style="padding:5rem">
			<?php	if(isset($_view) && $_view)
			$this->load->view($_view);
			?>
		</div>
	</body>
</html>
