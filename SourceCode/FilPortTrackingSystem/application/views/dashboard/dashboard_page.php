
<script type="text/javascript" src="<?php echo base_url('resources/google_chart/loader.js')?>"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

 		<div class="dash-cont">
			<div class="dash-title"><h3>CHARTS</h3></div>
			<div class="dash-subtitle">
				<ul class="nav nav-pills nav-stacked ">
				  <li class="active"><a href="#tab_a" data-toggle="pill">Statistics On Color Stages</a></li>
				  <li><a href="#tab_b" data-toggle="pill" class="jbfl_chart_btn">Statistics On JobFile Transaction</a></li>
				  <li><a href="#tab_c" data-toggle="pill">Chart C</a></li>
				  <li><a href="#tab_d" data-toggle="pill">Chart D</a></li>
				</ul>
			</div>
		</div>

		<div class="dash-side" style="padding: 15px 3px;">
			<div class="tab-content col-lg-12">
			
					 <div class="tab-pane active" id="tab_a">
					 	<div class="row">
					 		<div class="col-lg-12">
					 	   		<ul class="nav nav-tabs">
								    <li class="active"><a data-toggle="tab" href="#home" class="sea_chart_btn">Sea Freight Manila</a></li>
								    <li><a data-toggle="tab" href="#home2" class="sea_chart_btn_outport">Sea Freight Outport</a></li>
								    <li><a data-toggle="tab" href="#menu1" class="air_chart_btn">Air Freight</a></li>
								 </ul>

			             	 	<div class="tab-content" style="overflow-y:auto;height: 470px;">
			             	 		<div class="tab-pane fade in active" id="home">
			             	 			<div class="sea-freight"></div> 
			             	 		</div>

			             	 		<div class="tab-pane fade" id="home2">
			             	 			<div class="sea-freight-outport"></div> 
			             	 		</div>

			             	 		<div class="tab-pane fade" id="menu1">
			             	 			<div class="air-freight"></div> 
			             	 		</div>
			             	 	</div>
			             	 	   
			        		</div>
					 	</div>
					 	   
			        </div>
			        <div class="tab-pane" id="tab_b">
			        	<div class="col-lg-12"  style="overflow-y:auto;height: 490px;">
			        		<div class="jobfile-stat"></div> 
			        	</div>
			        	
			        </div>
			        <div class="tab-pane" id="tab_c">
			        	<div class="col-lg-12"  style="overflow-y:auto;height: 490px;">
						  <img src="<?php echo base_url('resources/img/chart/sample2.png'); ?>">
						</div>
			        </div>
			        <div class="tab-pane" id="tab_d">
			        	<div class="col-lg-12"  style="overflow-y:auto;height: 490px;">
			            	 <img src="<?php echo base_url('resources/img/chart/sample3.png'); ?>">
			            </div>
			        </div>
			
			       
			</div><!-- tab content -->
		</div>
	</div>
</body>
</html>


<script>
$(document).ready(function(){
	$('.sea_chart_btn').click();
});


$(document).on('click','.sea_chart_btn',function(){
	/*Sea Frieght Legend*/
	  $.ajax({
	  		method: "GET",
			  url: "<?php echo base_url('Job_availability/dashboard_legend_sea');?>",
			  beforeSend: function() {
		              $('.sea-freight').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
		            },  
	  		success: function(response){              
            $(".sea-freight").html(response);

       		 }
        });
});

$(document).on('click','.sea_chart_btn_outport',function(){
	/*Sea Frieght Legend*/
	  $.ajax({
	  		method: "GET",
			  url: "<?php echo base_url('Job_availability/dashboard_legend_sea_outport');?>",
			  beforeSend: function() {
		              $('.sea-freight-outport').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
		            },  
	  		success: function(response){              
            $(".sea-freight-outport").html(response);

       		 }
        });
});
	

$(document).on('click','.air_chart_btn',function(){
	/*Air Frieght Legend*/
	  $.ajax({
	  		method: "GET",
			  url: "<?php echo base_url('Job_availability/dashboard_legend_air');?>",
			  beforeSend: function() {
		              $('.air-freight').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
		            },  
	  		success: function(response){              
            $(".air-freight").html(response);

       		 }
        });
});
	  
$(document).on('click','.jbfl_chart_btn',function(){
	/*jobFile Statistics*/
	  $.ajax({
	  		method: "GET",
			  url: "<?php echo base_url('Job_availability/dashboard_jobfile');?>",
			  beforeSend: function() {
		              $('.jobfile-stat').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
		            },  
	  		success: function(response){              
            $(".jobfile-stat").html(response);

       		 }
        });
});
	  
</script>