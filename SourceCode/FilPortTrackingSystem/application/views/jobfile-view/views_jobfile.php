

	<!-- Tabs -->
	<div class="jobfile-cont">
		<div class="container-fluid">
			<div class="row">
				<div  class="container-tab" id="tabs">
			  <ul class="nav nav-tabs ">

			 <?php if($rolemanila[2] == '4') ?>   <li class="active"><a data-toggle="tab" href="#manila" class="sea_manila_tab" >SEA FREIGHT MANILA <span class="fa fa-ship fa-lg"></span></a> </li> <?php } else{} ?>

			    <li><a data-toggle="tab" href="#outport" class="sea_outport_tab">SEA FREIGHT OUTPORT <span class="fa fa-ship fa-lg"></span></a> </li>

			    <li><a data-toggle="tab" href="#air" class="air_freight_tab">AIR FREIGHT <span class="fa fa-plane fa-lg"></span></a> </li>

			  </ul>

			</div>		

		  	<!-- Manila -->

		  	<div class="tab-content" style="margin-bottom: 10px;">
		  	
		  		<div id="manila" class="col-lg-12 col-md-12 col-sm-12 table-content tab-pane fade in active">

				  	<?php $this->load->view('jobfile-view/views_jobfile_manila'); ?>

			  </div>

			  	<!-- Outport -->

			  <div id="outport" class="col-lg-12 col-md-12 col-sm-12 table-content tab-pane fade">

			  	<?php $this->load->view('jobfile-view/views_jobfile_outport'); ?>

			  </div>

			  	<!-- Air -->

			  <div id="air" class="col-lg-12 col-md-12 col-sm-12 table-content tab-pane fade">

			  	<?php $this->load->view('jobfile-view/views_jobfile_air'); ?>

			  </div>
		  	</div>
			</div>
			
		
 		</div>

		<hr>

		<!-- Legend -->

			<div class="legends">

				<?php $this->load->view('footer/legend'); ?>

			</div>

			<!-- End Legend -->

		<hr>
		
</div>


</body>

</html>

<style type="text/css">
	 th{

	 	text-align:center !important;
	 	padding-top:2px;
	 }
	</style>

<script>
		         if(location.hash=="#outport"){
		      		  $('.sea_outport_tab').trigger('click');
		      		   location.hash='';
		       	}else if(location.hash=="#air"){
		       		 $('.air_freight_tab').trigger('click');
		       		 location.hash='';
		       	}

</script>


<script>
$('.new_manila_jobfile').click(function(){
	$('.new_manila_jobfile').empty();
});

/*$(document).ready(function(){
	 $('.sea_manila_tab').trigger('click');
});
*/



</script>