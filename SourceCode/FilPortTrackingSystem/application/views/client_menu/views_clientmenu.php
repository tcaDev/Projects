<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header/header'); ?>
	
</head>

<body >
	<div class="container-case">

	<!-- Header -->
		<?php $this->load->view('header/views_header'); ?>
	<!-- End HEader -->
		<div class="container-fluid">
			<div class="clientmenu-container">
					<!-- Job File -->
					<a style="display:block" href="<?php echo base_url('Login_user/clientjobfile')?>">	
					<div class="menu-tiles effect__hover">
						<div class="col-lg-4 col-md-4 col-sm-4 btn btn-jobfile card__front" style="box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);">
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<span class="fa fa-files-o img-jobfile"></span>
								</div>

								<div class="col-lg-8 col-md-8 col-sm-8">
									<span class="job-file">Job File</span>
								</div>
								
							</div>							
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 btn btn-jobfile card__back" style="box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);">
							<div class="row">
								<div class="col-lg-8 col-md-8 col-sm-8 pull-right">
									<span class="job-file">Job File Description</span>
								</div>
							</div>							
						</div>
					</div>
					</a>
					<!-- Tracking-->
					<a style="display:block" href="<?php echo base_url('Login_user/tracking')?>">
					<div class="menu-tiles effect__hover">
						<div class="col-lg-4 col-md-4 col-sm-4  btn btn-clnt-mngt card__front" style="box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);">
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<span class="fa fa-truck  img-jobfile"></span>
								</div>

								<div class="col-lg-8 col-md-8 col-sm-8">
									<span class="job-file">Tracking</span>
								</div>
								
							</div>							
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 btn btn-clnt-mngt card__back " style="box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);">
							<div class="row">

								<div class="col-lg-8 col-md-8 col-sm-8 pull-right">
									<span class="job-file">Tracking Description</span>
								</div>
								
							</div>							
						</div>
					</div>
					</a>

					<!-- Report -->
					<a style="display:block" href="<?php echo base_url('Login_user/clientreports')?>">
					<div class="menu-tiles effect__hover">
						<div class="col-lg-4 col-md-4 col-sm-4  btn btn-report card__front" style="box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);">
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<span class="fa fa-line-chart img-jobfile"></span>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<span class="report">Documents</span>
								</div>
							</div>							
						</div> 

						<div class="col-lg-4 col-md-4 col-sm-4 btn btn-report card__back" style="box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);">
							<div class="row">

								<div class="col-lg-8 col-md-8 col-sm-8 pull-right">
									<span class="job-file">Documents Description</span>
								</div>
								
							</div>							
						</div>
					</div>
					</a>

				<!-- Help -->
				<a style="display:block" href="<?php echo base_url('Login_user/help')?>">
				<div class="menu-tiles effect__hover">
					<div class="col-lg-4 col-md-4 col-sm-4 btn btn-help card__front" style="box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">
								<span class="fa fa-question img-jobfile"></span>
							</div>

							<div class="col-lg-8 col-md-8 col-sm-8">
								<span class="help">Help</span>
							</div>
							
						</div>							
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 btn btn-help card__back" style="box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);">
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-8 pull-right">
								<span class="job-file">Help Description</span>
							</div>
						</div>							
					</div>
				</div>
				</a>
			</div>
			<br>
			<br>
		</div>	
	<!-- Footer -->
		<div class="col-lg-12 col-md-12 col-sm-12 footer hidden">
			<?php $this->load->view('footer/date-time'); ?>
		</div>
	<!-- End Footer -->
	</div>
</body>
</html>


