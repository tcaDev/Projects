<!DOCTYPE html>
<html lang="en">
<head>	
	<?php $this->load->view('header/header'); ?>
</head>

<body>
	<div class="container container-case">

<!-- heaer -->
	<?php $this->load->view('header/views_header'); ?>

 		<div class="dash-cont">
			<div class="dash-title"><h3>CHARTS</h3></div>
			<div class="dash-subtitle">
				<ul class="nav nav-pills nav-stacked col-md-2">
				  <li class="active"><a href="#tab_a" data-toggle="pill">Chart A</a></li>
				  <li><a href="#tab_b" data-toggle="pill">Chart B</a></li>
				  <li><a href="#tab_c" data-toggle="pill">Chart C</a></li>
				  <li><a href="#tab_d" data-toggle="pill">Chart D</a></li>
				</ul>
			</div>
		</div>

		<div class="dash-side">
			<div class="tab-content col-md-10">
			        <div class="tab-pane active" id="tab_a">
			                <img src="<?php echo base_url('resources/img/chart/chart1.gif'); ?>">      
			        </div>
			        <div class="tab-pane" id="tab_b">
			        	<img src="<?php echo base_url('resources/img/chart/chart2.gif'); ?>">
			        </div>
			        <div class="tab-pane" id="tab_c">
						<img src="<?php echo base_url('resources/img/chart/chart1.gif'); ?>">
			        </div>
			        <div class="tab-pane" id="tab_d">
			             <img src="<?php echo base_url('resources/img/chart/chart2.gif'); ?>">
			        </div>
			</div><!-- tab content -->
		</div>
	</div>
</body>
</html>


