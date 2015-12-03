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
		<div class="dash-title"><h3>JOBFILE NUMBER</h3></div>
			<div class="clientrep-cont">
				<div class="clientrep-subtitle ">
					<ul class="nav nav-pills nav-stacked col-md-2">
					  <li class="active"><a href="#tab_a" data-toggle="pill">SL-20555</a></li>
					  <li><a href="#tab_b" data-toggle="pill">SL-20556</a></li>
					  <li><a href="#tab_c" data-toggle="pill">SL-20557</a></li>
					  <li><a href="#tab_d" data-toggle="pill">SL-20558</a></li>
					</ul>
				</div>	
			</div>
		</div>

		<div class="dash-side">
			<div class="tab-content col-md-10">
			        <div class="tab-pane active" id="tab_a">
			        <?php 
						$element = "
							<div class='list-group gallery'>
					            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
					                <a class='thumbnail fancybox' rel='ligthbox' href='http://placehold.it/720x680.png'>
					                    <img class='img-responsive' alt='' src='http://placehold.it/720x680'/>
					                    <div class='text-right'>
					                        <small class='text-muted'>Document Name</small>
					                    </div> <!-- text-right / end -->
					                </a>
					            </div> <!-- col-6 / end -->
							</div>
						"; 

						$count = 20;
						for ($i = 0; $i < $count; $i++) {
						    echo $element;
						}
			        ?>
					</div>

			        <div class="tab-pane" id="tab_b">
			        	<?php 
						$element = "
							<div class='list-group gallery'>
					            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
					                <a class='thumbnail fancybox' rel='ligthbox' href='http://placehold.it/300x320.png'>
					                    <img class='img-responsive' alt='' src='http://placehold.it/320x320' />
					                    <div class='text-right'>
					                        <small class='text-muted'>Document Name</small>
					                    </div> <!-- text-right / end -->
					                </a>
					            </div> <!-- col-6 / end -->
							</div>
						"; 

						$count = 6;
						for ($i = 0; $i < $count; $i++) {
						    echo $element;
						}
			        	?>
			        </div>

			        <div class="tab-pane" id="tab_c">
						<?php 
						$element = "
							<div class='list-group gallery'>
					            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
					                <a class='thumbnail fancybox' rel='ligthbox' href='http://placehold.it/300x320.png'>
					                    <img class='img-responsive' alt='' src='http://placehold.it/320x320' />
					                    <div class='text-right'>
					                        <small class='text-muted'>Document Name</small>
					                    </div> <!-- text-right / end -->
					                </a>
					            </div> <!-- col-6 / end -->
							</div>
						"; 

						$count = 8;
						for ($i = 0; $i < $count; $i++) {
						    echo $element;
						}
			        	?>
			        </div>

			        <div class="tab-pane" id="tab_d">
			            <?php 
						$element = "
							<div class='list-group gallery'>
					            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
					                <a class='thumbnail fancybox' rel='ligthbox' href='http://placehold.it/300x320.png'>
					                    <img class='img-responsive' alt='' src='http://placehold.it/320x320' />
					                    <div class='text-right'>
					                        <small class='text-muted'>Document Name</small>
					                    </div> <!-- text-right / end -->
					                </a>
					            </div> <!-- col-6 / end -->
							</div>
						"; 

						$count = 4;
						for ($i = 0; $i < $count; $i++) {
						    echo $element;
						}
			        	?>
			        </div>
			</div><!-- tab content -->
		</div>
	</div>
</body>

</html>

