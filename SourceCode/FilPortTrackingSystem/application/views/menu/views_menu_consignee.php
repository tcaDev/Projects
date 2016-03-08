
	

<div class="container-fluid">
  <div class="row">
  	<div class="menu-container">
		<!-- Job File -->
  		<a href="<?php echo base_url('Login_user/search')?>" class="col-md-6 col-sm-12 col-xs-12" style="padding-bottom: 10px;">
			 <div class=" col-sm-12 col-xs-12">
				<div class="menu-tiles effect__hover">
					<div class="col-sm-12 col-xs-12 btn btn-gbl card__front" style="box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<span class="fa fa-globe img-jobfile"></span>
							</div>
							<div class="col-sm-6 col-xs-6">
								<span class="job-file">Global<br>Search</span>
							</div>
						</div>							
					</div>

					<div class="col-sm-12 col-xs-12 btn btn-gbl card__back" style="box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<span class="fa fa-search img-jobfile"></span>
							</div>
							<div class="col-sm-6 col-xs-6">
								<span class="job-file pull-right">Quick Jobfile<br>View</span>
							</div>
						</div>		

					</div>
				</div>
			</div>
		</a>

		<!-- Job File -->
  		<a href="<?php echo base_url('Login_user/reports')?>" class="col-md-6 col-sm-12 col-xs-12" style="padding-bottom: 10px;">
			 <div class=" col-sm-12 col-xs-12">
				<div class="menu-tiles effect__hover">
					<div class="col-sm-12 col-xs-12 btn btn-report card__front" style="box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<span class="fa fa-line-chart img-jobfile"></span>
							</div>
							<div class="col-sm-6 col-xs-6">
								<span class="job-file">Reports</span>
							</div>
						</div>							
					</div>

					<div class="col-sm-12 col-xs-12 btn btn-report card__back" style="box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<span class="fa fa-pencil-square-o img-jobfile"></span>
							</div>
							<div class="col-sm-6 col-xs-6">
								<span class="job-file pull-right">Consignee<br>Transaction</span>
							</div>
						</div>		

					</div>
				</div>
			</div>
		</a>

		<!-- Job File -->
  		<a href="<?php echo base_url('Login_user/dashboard')?>" class="col-md-6 col-sm-12 col-xs-12" style="padding-bottom: 10px;">
			 <div class=" col-sm-12 col-xs-12">
				<div class="menu-tiles effect__hover">
					<div class="col-sm-12 col-xs-12 btn btn-dashboard card__front" style="box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<span class="fa fa-pie-chart img-jobfile"></span>
							</div>
							<div class="col-sm-6 col-xs-6">
								<span class="job-file">Dashboard</span>
							</div>
						</div>							
					</div>

					<div class="col-sm-12 col-xs-12 btn btn-dashboard card__back" style="box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<span class="fa fa-dashboard img-jobfile"></span>
							</div>
							<div class="col-sm-6 col-xs-6">
								<span class="job-file pull-right">Management<br>Metrics</span>
							</div>
						</div>		

					</div>
				</div>
			</div>
		</a>

		<!-- Job File -->
  		<a href="<?php echo base_url('Login_user/help')?>" class="col-md-6 col-sm-12 col-xs-12" style="padding-bottom: 10px;">
			 <div class=" col-sm-12 col-xs-12">
				<div class="menu-tiles effect__hover">
					<div class="col-sm-12 col-xs-12 btn btn-help card__front" style="box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<span class="fa fa-question img-jobfile"></span>
							</div>
							<div class="col-sm-6 col-xs-6">
								<span class="job-file">Help</span>
							</div>
						</div>							
					</div>

					<div class="col-sm-12 col-xs-12 btn btn-help card__back" style="box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<span class="fa fa-book img-jobfile"></span>
							</div>
							<div class="col-sm-6 col-xs-6">
								<span class="job-file pull-right">Online User<br>Manual</span>
							</div>
						</div>		

					</div>
				</div>
			</div>
		</a>


		<div class="col-sm-12 col-xs-12">
		<br>
			<hr class="line">
		</div>
  	</div>
		
  </div>
</div>



	<!-- Footer -->
		<div class="col-lg-12 col-md-12 col-sm-12 footer hidden">
			<?php $this->load->view('footer/date-time'); ?>
		</div>
	<!-- End Footer -->
	</div>
</body>
<script type="text/javascript">
	$(".imgDisabled").on("click",function(){
	alert('Sorry for the Inconvenience!. This Page is currently under Construction');
});
</script>
</html>


