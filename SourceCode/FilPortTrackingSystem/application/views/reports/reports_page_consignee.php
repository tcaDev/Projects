<head>
		<script type="text/javascript" src="<?php echo base_url('resources/js/print.js'); ?>"></script>
</head>
<style>
 .dash-subtitle .panel-title{
 	font-size: 12px !important;
 }
</style>
<div class="dash-cont">
	<div class="dash-title"><h3>REPORTS</h3></div>
		<div class="dash-subtitle">
			<!-- Start Accordion -->
						<div class="panel-group" id="accordion">
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h6 class="panel-title">
						        <a data-toggle="collapse" data-parent="#accordion" id="JobFile" href="#collapse1" style="text-decoration:none;font-weight:600;">
						        <span class="hvr-icon-forward"> Jobfile Transaction </span></a>
						      </h6>
						    </div>
						    <div id="collapse1" class="panel-collapse collapse in" style="padding:5px">
						         <ul class="nav nav-pills nav-data nav-freights nav-charges">
									  <li id="search_manila" value="1" class="active" style="display:block;width:100%;"><a href="#tab_a" data-toggle="pill">Sea Freight Manila</a></li>
									  <li value="2" style="display:block;width:100%;"><a href="#tab_b" data-toggle="pill">Sea Freight Outport</a></li>
									  <li value="3" style="display:block;width:100%;"><a href="#tab_c" data-toggle="pill">Air Freight</a></li>
								</ul>
						    </div>
						  </div>

						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" id="RunningCharges" data-parent="#accordion" href="#collapse5" style="text-decoration:none;font-weight:600;">
						       <span class="hvr-icon-forward"> Running Charges </span></a>
						      </h4>
						    </div>
						    <div id="collapse5" class="panel-collapse collapse" style="padding:5px">
						       	 <ul class="nav nav-pills nav-data-2 nav-data-runningcharges">
									  <li value="running-charges" class="runningcharges-jobfile-manila active" id="runningcharges-jobfile-manila"  style="display:block;width:100%;"><a href="#tab_runningcharges_manila" data-toggle="pill">Sea Freight Manila</a></li>
									  <li value="running-charges" class="runningcharges-jobfile-outport" 	   id="runningcharges-jobfile-outport" style="display:block;width:100%;"><a href="#tab_runningcharges_outport" data-toggle="pill">Sea Freight Outport</a></li>
									  <li value="running-charges" class="runningcharges-jobfile-air"           id="runningcharges-jobfile-air"     style="display:block;width:100%;"><a href="#tab_runningcharges_air" data-toggle="pill">Air Freight</a></li>
								</ul>
						    </div>
						  </div>

						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" data-parent="#accordion" id="Volume" href="#collapse6" style="text-decoration:none;font-weight:600;">
						        <span class="hvr-icon-forward"> Volume </span></a>
						      </h4>
						    </div>
						    <div id="collapse6" class="panel-collapse collapse" style="padding:5px">
						         <ul class="nav nav-pills nav-data nav-volume">
									  <li value="1" class="reports-volume-manila active" id="reports-volume-manila"  style="display:block;width:100%;"><a href="#tab_reports_volume-manila" data-toggle="pill">Sea Freight Manila</a></li>
									  <li value="2" class="reports-volume-outport" 		 id="reports-volume-outport" style="display:block;width:100%;"><a href="#tab_reports_volume-outport" data-toggle="pill">Sea Freight Outport</a></li>
									  <li value="3" class="reports-volume-air" 			 id="reports-volume-air"     style="display:block;width:100%;"><a href="#tab_reports_volume-air" data-toggle="pill">Air Freight</a></li>
								</ul>
						    </div>
						  </div>

						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" data-parent="#accordion" id="Truck" href="#collapse7" style="text-decoration:none;font-weight:600;">
						        <span class="hvr-icon-forward"> Truck Booking </span></a>
						      </h4>
						    </div>
						    <div id="collapse7" class="panel-collapse collapse" style="padding:5px">
						         <ul class="nav nav-pills nav-data nav-truck">
									  <li value="1" class="reports-truck-manila active"  id="reports-truck-manila"  style="display:block;width:100%;"><a href="#tab_reports_truck" data-toggle="pill">Sea Freight Manila</a></li>
									  <li value="2" class="reports-truck-outport" 		 id="reports-truck-outport" style="display:block;width:100%;"><a href="#tab_reports_truck" data-toggle="pill">Sea Freight Outport</a></li>
									  <li value="3" class="reports-truck-air" 			 id="reports-truck-air"     style="display:block;width:100%;"><a href="#tab_reports_truck" data-toggle="pill">Air Freight</a></li>
								</ul>
						    </div>
						  </div>


						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" data-parent="#accordion" id="Consolidated" href="#collapse8" style="text-decoration:none;font-weight:600;">
						        <span class="hvr-icon-forward"> Consolidated </span></a>
						      </h4>
						    </div>
						    <div id="collapse8" class="panel-collapse collapse" style="padding:5px">
						         <ul class="nav nav-pills nav-data nav-Consolidated">
									  <li value="1" class="reports-Consolidated-manila active"  id="reports-consolidate-manila"  style="display:block;width:100%;"><a href="#tab_reports_consolidate" data-toggle="pill">Sea Freight Manila</a></li>
									  <li value="2" class="reports-Consolidated-outport" 		 id="reports-consolidate-outport" style="display:block;width:100%;"><a href="#tab_reports_consolidate" data-toggle="pill">Sea Freight Outport</a></li>
									  <li value="3" class="reports-Consolidated-air" 			 id="reports-consolidate-air"     style="display:block;width:100%;"><a href="#tab_reports_consolidate" data-toggle="pill">Air Freight</a></li>
								</ul>
						    </div>
						  </div>


						</div>
			<!-- End Accordion -->
		</div>
		
</div>

		<div class="dash-side" >

			<div class="hidden runningcharges tab-content">
					<?php $this->load->view('reports/running_charges_jobfile_manila'); ?>
					<?php $this->load->view('reports/running_charges_jobfile_outport'); ?>
					<?php $this->load->view('reports/running_charges_jobfile_air'); ?>
			</div>

			<div class="hidden volume tab-content">
					<?php $this->load->view('reports/reports_volume_manila'); ?>
					<?php $this->load->view('reports/reports_volume_outport'); ?>
					<?php $this->load->view('reports/reports_volume_air'); ?>
			</div>

			<div class="hidden truck tab-content">
					<?php $this->load->view('reports/truck_reports/truck_mnila'); ?>
			</div>

			<div class="hidden consolidate_reports tab-content">
					<?php $this->load->view('reports/consolidate_reports/Consolidate_mnila'); ?>
			</div>

			<div class="tab-content reports-consignee">
			        <div class="repcon-table tab-pane active" id="tab_a">		        
			        	<div class="col-md-12 ">
				        	<div class="row">
				        			<div class="tools-bar">
									    <div class="input-group col-lg-8">

									      <input type="text" class="form-control light-table-filter input-sm" data-table="order-table" id="txt-search-consignee" placeholder='Search for "Consignee"'>
									      <span class="input-group-btn">
									        <button class="btn btn-danger btn-sm" id="btn-search-consignee" type="button"><span class="fa fa-search fa-fw"></span></button>
									      </span>
									    </div>
								 	</div>
				        		
				        	</div>     		
			        	</div>
			        	
			        		<table>
			        			<tr>
				        			<a class="loading-consignee" style="font-size:24px;"></a>
				        			<i class="result-count" style="font-size:24px;"> </i>
				        		</tr>
			        		</table>

			        	<div class="report_header" style="width:100%;overflow-y:auto;position:relative;height:440px;">	
				        	<table style="background-color:#fff; border:1px solid #000; border-collapse: collapse; " class="table table-bordered order-table reports-table" style="cursor:pointer;">
				        		
				        		<thead>
	                              <th><center> JobfileNumber </center> </th>
	                              <th><center> Shipper </center></th>
	                              <th><center> Consignee </center></th>
	                              <th id="HBL"><center> House Airway Bill# </center></th>
	                        	</thead>
	         		 		</table>
	         		 	</div>
						</div>	
					</div>
			</div>
			<hidden class="conName" id="<?php echo stripslashes($jobfiles); ?>"></hidden>
		</div>

	<!-- Manila and Outport Details -->
	 <div class="container">
		<!-- Modal -->
				   <div class="modal fade" id="view-report" role="dialog" data-keyboard="false" data-backdrop="static">
				    <div class="modal-dialog"  style="font-family:Century Gothic;">
				      <!-- Modal content-->
				      <div class="modal-content" style="width:150%;right:25%;">
				        <div class="modal-header">
				        	<div class="header" style="font-family:Century Gothic;">
				        	<div style="font-size:22px;">
									<span class="pull left"><b>  Jobfile Number </b></span> 
				        			<a id="jfNo"> </a> 
				        	</div>
				        	</div>
				        </div>
	  <div class="modal-body">
				        <div style="overflow-x:auto;">
				        <span class="loadPre-Details pull-left" style="font-size:18px;"></span>
				       	 
				        	<table style="font-family:Century Gothic;font-size:18px;table-layout:fixed;width:100%" id="table-pre-details">
				        	</table> 
		<hr>		        

		<div class="container-tab" id="tabs">

				   <ul class="nav nav-pills nav-data nav-ins-menu">

				    <li class="active"><a data-toggle="tab" href="#containers">Containers</a></li>

				    <li><a data-toggle="tab" href="#commodities">Commodities</a></li>

				    <li><a data-toggle="tab" href="#status-reports">Status Reports</a></li>

				    <li><a data-toggle="tab" href="#running-charges">Running Charges</a></li>

				    <li><a data-toggle="tab" href="#other-documents">Other Documents</a></li>

				  </ul>
		  
		  	<div class="tab-content">
		  		<!-- Containers -->
				    <div id="conts" class="col-lg-12 col-md-12 col-sm-12 table-content tab-pane fade in active tab-containers tab-clear">
		 					<br>
					  		<h4 style="padding-left: 25px;" class="cnt">Containers</h4>
					  		<br>
		 					<div style="height: 300px; overflow-y: auto;">
										<table id="tbl-first-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;">
						             		<tr>
						             			<td>
						             				<span class="loadContainers pull-left" style="font-size:18px;"></span>
						             			</td>
						             		</tr>
						                </table>
						     </div>
				    </div>

				<!-- Commodity -->
				  <div id="commodities" class="col-lg-12 col-md-12 col-sm-12 table-content tab-pane fade tab-commodity tab-clear">
					  		<br>
					  		<h4 style="padding-left: 25px;">Commodity</h4>
					  		<br>
						        <div style="height: 300px; overflow-y: auto;">
										<table id="tbl-second-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;">
						             		<tr>
						             			<td>
						             				<span class="loadCommodity pull-left" style="font-size:18px;"></span>
						             			</td>
						             		</tr>
						                </table>
						        </div>
				    </div>

				   <div id="running-charges" class="col-lg-12 col-md-12 col-sm-12 table-content tab-pane fade tab-charges tab-clear">
					  		<br>
					  		<h4 style="padding-left: 25px;">Running Charges</h4>
					  		<br>
					  		<div style="height: 300px; overflow-y: auto;">
						       <table id="tbl-third-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;width:100%;text-align:left;">
						       		<tr>
						             	<td>
						             		<span class="loadCharges pull-left" style="font-size:18px;"></span>
						             	</td>
						            </tr>
						       </table>
						     </div>
				    </div>

					<div id="status-reports" class="col-lg-12 col-md-12 col-sm-12 table-content tab-pane fade tab-status tab-clear">
					  		<br>
					  		<h4 style="padding-left: 25px;">Status Report</h4>
					  		<h6> <i> *Double Click the Status Report to View the Full Report.</i></h6>
					  		<br>
					  		<div style="height: 300px; overflow-y: auto;">
						      <table id="tbl-fourth-report-data" class="table table-striped tableOverFlow" style="cursor:pointer;">
						             	<tr>
						             		<td class="loadReports tdOverFlow" style="width:100%;" id="loadReports">
						             			Status reports
						             		</td>
						             	</tr>
						      </table>
						    </div>
					</div>

					<div id="other-documents" class="col-lg-12 col-md-12 col-sm-12 table-content tab-pane fade in active tab-otherdocs tab-clear">
		 					<br>
					  		<h4 style="padding-left: 25px;">Other Documents</h4>
					  		<br>
		 					<div style="height: 300px; overflow-y: auto;">
						        <?php 
								$element = "
									<div class='list-group gallery'>
							            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
							                <a class='thumbnail fancybox' rel='ligthbox' href='http://placehold.it/300x320.png'>
							                    <img class='img-responsive' alt='' src='http://placehold.it/320x320' />
							                    <div class='text-right'>
							                        <small class='text-muted'>Report Title</small>
							                    </div> <!-- text-right / end -->
							                </a>
							            </div> <!-- col-6 / end -->
									</div>	"; 

								$count = 20;
								for ($i = 0; $i < $count; $i++) {
								    echo $element;
								}
						    	?>
						 </div>
				</div>
			 </div>
			</div>
		</div>
				       <div class="modal-footer">
				       	  <a href='#' id='btn_print'> <button class="btn btn-default" >Print</button> </a>
				          <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn-modal-close">Close</button>
				       </div>
				      </div>
			</div> 
		  </div>
	    </div>

		<!-- End Modal for Details -->
		<div class="modal fade" id="view-status-report-profile" role="dialog" data-keyboard="false" data-backdrop="static" style="top:20%;">
				    <div class="modal-dialog">
				      <!-- Modal content-->
				      <div class="modal-content">
				  
				        <div class="modal-header">
				          <div id="title" style="font-size:24px;font-family:Century Gothic;">
				          	 <u><h4> Date Added :  <b class="stat-no"> </b> </h4></u>
				          </div>
				        </div>
				        <div class="modal-body">
				        	<div id="body" style="font-size:13px;font-family:Century Gothic;">
							<div style="overflow-x:auto;">
								<table style="tableOverFlow;table-layout:fixed;back-ground-color:#d1d1e0;">
									<tr>
										<td style="text-align:left;">
										  <p class="txt-desc"></p>
										</td>
									</tr>
								</table>
							</div>
							</div>
						</div>
				       <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				       </div>

				 	  </div>
				    </div>
		</div>
	</div> 
	<!-- End of Manila and Outport Details -->
	</div> 
		
		<div class="modal fade" id="jobfiles" role="dialog">
		    <div class="modal-dialog">		      
				<?php $this->load->view('jobfile-view/views_jobfiledata_reports'); ?>
		    </div>
 		</div>
</body>
<script>
 var jbNo;
 var consigneeName;
 var shipperName;
 var rcvdOfOtherDocs;
 var HBL;
 var POno;

 var statusData;
 var txt;
 var mon_Type = 1;


 var content_commodities;
 var content_containers;
 var content_reports;
 var content_charges;
 var content_details;
 var content_status_data;

 var con_name = $('.conName').attr('id');
/*	$('#btn-search-consignee').on('click',function(){

    });
*/
	function search(){
		if(con_name == "" || con_name == null){
				$.alert({
					title: "Search",
					content: "This Account doesn't have any records"
				})
			}else{
					 $.ajax({
				  		method: "POST",
						url: "<?php echo base_url('Job_reports/get_consignee_status_report');?>",
						beforeSend: function(){
							$('.loading-consignee').html('<a class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</a>');
							$('.reports-table').html('<table style="background-color:#fff; border:1px solid #000; border-collapse: collapse;cursor:pointer; " class="table table-bordered order-table reports-table"><tr><a class="loading-consignee" style="font-size:24px;"></a><i class="result-count" style="font-size:24px;"> </i></tr><tr class="tableRow"></tr></table>');
							$('.result-count').html('<i class="result-count" style="font-size:24px;"> </i>');
						},
				  		data: { 
				  			consignee_name:con_name,
				  			monType : mon_Type
				  		}
					})
			  		.done(function(consignee_data) {
			  			var result = JSON.parse(consignee_data);
			  			if(result[0].result_count == 0 && mon_Type != 3){
			  				$.alert({
			  					title: "Reports",
			  					content: "You have No Data from Sea Freight Transactions <br><center> Please Check Air Freight </center>"
			  				});
			  				$('.reports-table').html(result[0].disp);
			  				$('.loading-consignee').html('<a class="loading-consignee" style="font-size:24px;"> </a>');
			  			}else if(result[0].result_count == 0 && mon_Type == 3){
			  				$.alert({
			  					title: "Reports",
			  					content: "You have No Data from Air Freight Transactions <br> <center> Please Check Sea Freight </center>"
			  				});
			  				$('.reports-table').html(result[0].disp);
			  				$('.loading-consignee').html('<a class="loading-consignee" style="font-size:24px;"> </a>');
			  			}
			  			else{
			  				$('.reports-table').html(result[0].disp);
				  			$('.result-count').html('<i class="result-count" style="font-size:24px;">Found (' + result[0].result_count + ') Data Match(es)</i>');
				  			$('.loading-consignee').html('<a class="loading-consignee" style="font-size:24px;"> </a>');
			  			}
					});
			}
	}

		$(document).on('dblclick','.tableRow',function(){
			$('.tab-clear').removeClass('active');
			$('.tab-containers').attr('class','col-lg-12 col-md-12 col-sm-12 table-content tab-pane fade in active tab-containers tab-clear');
			$('#table-pre-details').html('<table style="font-family:Century Gothic;font-size:18px;table-layout:fixed;width:100%" id="table-pre-details"></table>');
			$('#tbl-first-report-data').html('<table id="tbl-first-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;"><tr><td><span class="loadContainers pull-left" style="font-size:18px;"></span></td></tr></table>');
			$('#tbl-second-report-data').html('<table id="tbl-second-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;"><tr><td><span class="loadCommodity pull-left" style="font-size:18px;"></span></td></tr></table>');
			$('#tbl-third-report-data').html('<table id="tbl-third-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;"><tr><td><span class="loadCharges pull-left" style="font-size:18px;"></span></td></tr></table>');
			$('#tbl-fourth-report-data').html('<table id="tbl-fourth-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;"><tr><td><span class="loadReports pull-left" style="font-size:18px;"></span></td></tr></table>');
			/*Reload Data on View*/

			if(mon_Type == 3){ /*SET VIEW FORMAT*/
				$('.nav-ins-menu').html('<ul class="nav nav-pills nav-ins-menu"><li class="active"><a data-toggle="tab" href="#conts">Aircraft</a></li><li class="commodities"><a data-toggle="tab" href="#commodities">Commodities</a></li><li class="reports"><a data-toggle="tab" href="#status-reports">Status Reports</a></li><li class="charges"><a data-toggle="tab" href="#running-charges">Running Charges</a></li><li><a data-toggle="tab" href="#other-documents">Other Documents</a></li></ul>');
				$('.cnt').html('<h4 class="cnt">Aircraft</h4>');
			}else{
				$('.nav-ins-menu').html('<ul class="nav nav-pills nav-ins-menu"><li class="active"><a data-toggle="tab" href="#conts">Containers</a></li><li class="commodities"><a data-toggle="tab" href="#commodities">Commodities</a></li><li class="reports"><a data-toggle="tab" href="#status-reports">Status Reports</a></li><li class="charges"><a data-toggle="tab" href="#running-charges">Running Charges</a></li><li><a data-toggle="tab" href="#other-documents">Other Documents</a></li></ul>');
				$('.cnt').html('<h4 class="cnt">Containers</h4>');
			}
			
			jbNo	    	= $(this).closest('tr').children('td:eq(0)').text();
			shipperName 	= $(this).closest('tr').children('td:eq(1)').text();
			consigneeName 	= $(this).closest('tr').children('td:eq(2)').text();
			rcvdOfOtherDocs = $(this).closest('tr').children('td:eq(4)').text();
			HBL 			= $(this).closest('tr').children('td:eq(3)').text();
			POno 			= $(this).closest('tr').children('td:eq(5)').text();
			$('#btn_print').html("<a href='<?php echo base_url('Print_file/');?>?jbNo=" + jbNo + "&mon_Type=" + mon_Type + "' target='blank' id='btn_print'> <button class='btn btn-default' >Print</button> </a>");
			$('#jfNo').html($(this).closest('tr').children('td:eq(0)').text());
			$('#print_jfNo').html($(this).closest('tr').children('td:eq(0)').text());
			
					 $.ajax({
				  		method: "POST",
						url: "<?php echo base_url('Job/get_details_report');?>",
						beforeSend: function(){
							$('.loadPre-Details').html('<a class="loadPre-Details"><i class="fa fa-spinner fa-spin pull-left" style="font-size:18px;"></i>Loading Details</a>');
						},
				  		data: { 
				  			consignee_name		: txt,
				  			monType 			: mon_Type,
				  			shipperName 		: shipperName,
				  			consigneeName 		: consigneeName,
				  			dateRcvdOther_Docs  : rcvdOfOtherDocs,
				  			HBL_ 				: HBL,
				  			jfNo 				: jbNo,
				  			POno 				: POno
				  		}
					})
			  		.done(function(report_container_data){
			  			content_details = report_container_data;
			  			$('#table-pre-details').html(content_details);
			  			$('.loadPre-Details').html('<a class="loadPre-Details"></a>');
				});
			 var loadText;
			 if(mon_Type == 3){
			 	loadText = "Loading Aircrafts ...";
			 }else{
			 	loadText = "Loading Containers ...";
			 }

			 $.ajax({
				  		method: "POST",
						url: "<?php echo base_url('Job/get_containers_report');?>",
						beforeSend: function(){
							$('.loadContainers').html('<a class="loadContainers"><i class="fa fa-spinner fa-spin pull-left" style="font-size:18px;"></i>' + loadText +'</a>');
						},
				  		data: { 
				  			id		:jbNo,
				  			monType : mon_Type
				  		}
					})
			  		.done(function(report_container_data){
			  			content_containers = report_container_data;
			  			$('#tbl-first-report-data').html(content_containers);
				});
			  $.ajax({
				  		method: "POST",
						url: "<?php echo base_url('Job/report_get_products');?>",
						beforeSend: function(){
							$('.loadCommodity').html('<a class="loadCommodity"><i class="fa fa-spinner fa-spin pull-left" style="font-size:18px;"></i>Loading Containers...</a>');
						},
				  		data: { 
				  			id:jbNo,
				  			monType : mon_Type
				  		}
					})
			  		.done(function(report_commodities_data){
			  			content_commodities = report_commodities_data;
			  			$('#tbl-second-report-data').html(content_commodities);
				});
			   $.ajax({
				  		method: "POST",
						url: "<?php echo base_url('Job/report_get_running_charges');?>",
						beforeSend: function(){
							$('.loadCharges').html('<a class="loadContainers"><i class="fa fa-spinner fa-spin pull-left" style="font-size:18px;"></i>Loading Charges...</a>');
						},
				  		data: { 
				  			id:jbNo,
				  			monType : mon_Type
				  		}
					})
			  		.done(function(report_charges_data){
			  		    content_charges = JSON.parse(report_charges_data);
			  			$('#tbl-third-report-data').html(content_charges[0].disp);
				});
			  	 $.ajax({
				  		method: "POST",
						url: "<?php echo base_url('Job/reports_get_status_report');?>",
						beforeSend: function() {
							$('.loadReports').html('<a class="loadContainers"><i class="fa fa-spinner fa-spin pull-left" style="font-size:18px;"></i>Loading Reports...</a>');
 					  	},
				  		data: { 
				  			id:jbNo,
				  			monType : mon_Type
				  		}
					})
			  		.done(function(report_status_data) {
			  			content_reports = report_status_data;
			  			$('#tbl-fourth-report-data').html(content_reports);
			  			content_status_data = content_reports.replace(/\\n/g,'<br>');
				 });
			  	$('#view-report').modal('show');
		   });

			$(document).on('dblclick','#loadReports',function(){
				var pre_txt = $(this).closest('tr').children('td:eq(1)').text();
				var dispTxt = pre_txt.replace(/\\n/g,'<br>');
				$('.txt-desc').html(dispTxt);
				$('.stat-no').html($(this).closest('tr').children('td:eq(0)').text());
				$('#view-report').modal('hide');

				$('#view-status-report-profile').modal('show');
			});


			$(document).on('hidden.bs.modal','#view-status-report-profile',function(){
				$('#view-report').modal('show');
			});

			$(document).on('keydown','#txt-search-consignee',function(e){
				 if (e.keyCode == 13){
				 	if($('#txt-search-consignee').val().trim().length > 0){
				 	}else{
				   		search();
				 	}
			 	}
			     $('.result-count').html('<i class="result-count" style="font-size:24px;"> </i>');
			});

			$(document).on('click','.nav-freights li',function(){
				mon_Type = $('.nav-data .active').val();
			 	search();
				changePlaceHolder(mon_Type);
			});

		/*	$(document).on('click','#btn-modal-close',function(){
				myBackUpViewReport.data('null');
			});*/

		$(document).ready(function(){
			changePlaceHolder(mon_Type);
			search();
		});

		$(document).on('click','#JobFile',function(){
			$('.nav-charges').click();
		});

		$(document).on('click','#RunningCharges',function(){
			var active_accreditation = $('.nav-data-runningcharges .active').attr('id');
			if(active_accreditation == 'runningcharges-jobfile-manila'){
				$('#txt-table-runningcharges-manila').val('');
				
			}else if(active_accreditation == 'runningcharges-jobfile-outport'){
				$('#txt-table-runningcharges-outport').val('');
				
			}else if(active_accreditation == 'runningcharges-jobfile-air'){
				$('#txt-table-runningcharges-air').val('');
				
			}
			$('#collapse5').click();
		});
/*button Running Charges*/
$(document).on('click','#runningcharges-jobfile-manila',function(){
			
			$('.table-runningcharges-manila').empty();
			$('#txt-table-runningcharges-manila').val('');
		});

$(document).on('click','#runningcharges-jobfile-outport',function(){
			
			$('.table-runningcharges-outport').empty();
			$('#txt-table-runningcharges-outport').val('');
		});

$(document).on('click','#runningcharges-jobfile-air',function(){
			
			$('.table-runningcharges-air').empty();
			$('#txt-table-runningcharges-air').val('');
		});

$(document).on('click','#reports-volume-manila',function(){
				$('.reports_consignee_volume_manila').html('');
				loadConisngeeNamesVolume_Manila();
				$('.cbo-commodities-manila').html('');
				$('#dtpATAFrom-manila').val('');
				$('#dtpATATo-manila').val('');
})

$(document).on('click','#reports-volume-outport',function(){
				$('.reports_consignee_volume_outport').html('');
				loadConisngeeNamesVolume_outport();
				$('.cbo-commodities-outport').html('');
				$('#dtpATAFrom-outport').val('');
				$('#dtpATATo-outport').val('');
})


$(document).on('click','#reports-volume-air',function(){
				$('.reports_consignee_volume_air').html('');
				loadConisngeeNamesVolume_air();
				$('.cbo-commodities-air').html('');
				$('#dtpATAFrom-air').val('');
				$('#dtpATATo-air').val('');
})

$(document).on('click','#Truck',function(){
	if(get_truck == 1){
		 $('#reports-truck-manila').click();

	}
	if(get_truck == 2){
		 $('#reports-truck-outport').click();
	}
	if(get_truck ==3 ){
		$('#reports-truck-air').click();
	}
})

$(document).on('click','#Consolidated',function(){
	if(get_consolidate == 1){
		 $('#reports-consolidate-manila').click();
	}
	if(get_consolidate == 2){
		 $('#reports-consolidate-outport').click();
	}
	if(get_consolidate ==3 ){
		$('#reports-consolidate-air').click();
	}
})


		$(document).on('click','#Volume',function(){
			var active_accreditation = $('.nav-volume .active').attr('id');
			if(active_accreditation == 'reports-volume-manila'){
				loadConisngeeNamesVolume_Manila();
				$('.cbo-commodities-manila').html('');
				$('#dtpATAFrom-manila').val('');
				$('#dtpATATo-manila').val('');
				
			}else if(active_accreditation == 'reports-volume-outport'){
				$('#dtpATAFrom-outport').val('');
				$('#dtpATATo-outport').val('');
				
			}else if(active_accreditation == 'reports-volume-air'){
				$('#dtpATAFrom-air').val('');
				$('#dtpATATo-air').val('');
				
			}
			$('#collapse6').click();
		});
/*Button Volume*/
		$(document).on('click','#reports-volume-manila',function(){
			
			$('.table-volume-manila').empty();
			$('#dtpATAFrom-manila').val('');
			$('#dtpATATo-manila').val('');
		});

		$(document).on('click','#reports-volume-outport',function(){
			
			$('.table-volume-outport').empty();
			$('#dtpATAFrom-outport').val('');
			$('#dtpATATo-outport').val('');
		});

		$(document).on('click','#reports-volume-air',function(){
		
			$('.table-volume-air').empty();
			$('#dtpATAFrom-air').val('');
			$('#dtpATATo-air').val('');
		});

		

		$(document).on('click','.btn_docs',function(){
			$('.ttle').html('<span class="ttle">' + $(this).attr('id') + '</span> ');
		});

		function changePlaceHolder(monType){
			if(monType == 3){
					$('#HBL').html('<th id="HBL"><center> House Airway Bill# </center></th>');
				}else{
					$('#HBL').html('<th id="HBL"><center> HBL# </center></th>');
			}
			if(monType == 3){
				$('#txt-search-consignee').attr('placeholder','Search JobFile Number/Shipper Name/Consignee Name/PO Number ');
			}else if(monType == 2){
				$('#txt-search-consignee').attr('placeholder','Search JobFile Number/Shipper Name/Consignee Name/PO Number ');
			}else if(monType == 1){
				$('#txt-search-consignee').attr('placeholder','Search JobFile Number/Shipper Name/Consignee Name/PO Number ');
			}
		}
</script>
<style>
	 .tableOverFlow{
	 	width: 100%;
	 }
	 .tdOverFlow{
	 	 max-width: 0;
   		 overflow: hidden;
    	 text-overflow: ellipsis;
    	 white-space: nowrap;
    	 text-align: left !important; 
	 }
	</style>
</html>

<script>
$("table").css('cursor','pointer');
</script>

