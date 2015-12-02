<!DOCTYPE html>
<html lang="en">
<head>	
	<?php $this->load->view('header/header'); ?>
</head>

<body>
	<div class="container container-case">
	<!-- header -->
	<?php $this->load->view('header/views_header'); ?>	

		<div class="gl-bar"></div>
		<div class="gl-bartxt">
			<div class="input-group col-md-12">
	            <input type="text" class="  search-query form-control" placeholder="Search" />
	            <span class="input-group-btn">
	                <button class="btn" type="button">
	                    <span class=" glyphicon glyphicon-search"></span>
	                </button>
	            </span>
	        </div>
		</div>

		<div class="gl-container">
		</div>
	</div>
</body>
</html>


