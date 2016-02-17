<?php $this->load->helper('form'); ?>

<head>
		<script type="text/javascript" src="<?php echo base_url('resources/js/print.js'); ?>"></script>
</head>

<div class="dash-cont">
	<div class="dash-title"><h3>REPORTS</h3></div>
		<div class="dash-subtitle">
			<!-- Start Accordion -->
						<div class="panel-group" id="accordion">
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="text-decoration:none;font-weight:600;">
						        <span class="hvr-icon-forward"> Jobfile Transaction </span></a>
						      </h4>
						    </div>
						    <div id="collapse1" class="panel-collapse collapse in" style="padding:5px">
						         <ul class="nav nav-pills nav-data nav-freights">
									  <li id="search_manila" value="1" class="active" style="display:block;width:100%;"><a href="#tab_a" data-toggle="pill">Sea Freight Manila</a></li>
									  <li  value="2" style="display:block;width:100%;"><a href="#tab_b" data-toggle="pill">Sea Freight Outport</a></li>
									  <li  value="3" style="display:block;width:100%;"><a href="#tab_c" data-toggle="pill">Air Freight</a></li>
								 	 <!--  <li  value="8" style="display:block;width:100%;"><a href="#tab_a" data-toggle="pill">Accreditation<span class="hvr-icon-forward"></span></a></li> -->
								</ul>
						    </div>
						  </div>
						  <?php if($role->RoleId == "1"){ ?>
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" style="text-decoration:none;font-weight:600;">
						       <span class="hvr-icon-forward"> Audit Trail</span></a>
						      </h4>
						    </div>
						    <div id="collapse2" class="panel-collapse collapse" style="padding:5px">
						       	 <ul class="nav nav-pills nav-data-2">
									  <li id="audit-manila"  style="display:block;width:100%;"><a href="#tab_audit_manila" data-toggle="pill">Sea Freight Manila</a></li>
									  <li id="audit-outport"style="display:block;width:100%;"><a href="#tab_audit_outport" data-toggle="pill">Sea Freight Outport</a></li>
									  <li id="audit-air" style="display:block;width:100%;"><a href="#tab_audit_air" data-toggle="pill">Air Freight</a></li>
								</ul>
						    </div>
						  </div>
						  <?php }else{} ?>
						</div>
			<!-- End Accordion -->
		</div>
		
</div>

		<div class="dash-side" >

		<!-- Audit trail -->

			<div class="hidden audit-trail tab-content">

					<?php $this->load->view('reports/audit_trail_manila'); ?>

					<?php $this->load->view('reports/audit_trail_outport'); ?>

					<?php $this->load->view('reports/audit_trail_air'); ?>
			</div>
					

		<!-- Search Consignee -->
			<div class="tab-content search-consignee">
			        <div class="repcon-table tab-pane active" id="tab_a">		        
			        	<div class="col-md-12 ">
				        	<div class="row">
				        			<div class="tools-bar">
									    <div class="input-group col-lg-8">
									      <input type="text" class="form-control light-table-filter" data-table="order-table" id="txt-search-consignee" placeholder='Search for "Consignee"'>
									      <span class="input-group-btn">
									        <button class="btn btn-danger" id="btn-search-consignee" type="button"><span class="fa fa-search fa-fw"></span></button>
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
					        	
					        		<tr class="tableRow">

					        		</tr>
								</table>
							</div>
						</div>	
					</div>
			</div>
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
				       	 
	<table style="font-family:Century Gothic;font-size:18px;table-layout:fixed;width:100%" id="table-pre-details" class="tablesorter">
	</table> 
		<hr>		        

		<div class="container-tab" id="tabs">

				  <ul class="nav nav-pills nav-data nav-ins-menu">

				    <li class="active"><a data-toggle="tab" href="#conts">Containers</a></li>

				    <li><a data-toggle="tab" href="#commodities">Commodities</a></li>

				    <li><a data-toggle="tab" href="#status-reports">Status Reports</a></li>

				     <li><a data-toggle="tab" href="#running-charges">Running Charges</a></li>

				     <li><a data-toggle="tab" href="#other-documents">Other Documents</a></li>

				  </ul>
		  
		  	<div class="tab-content">
		  		<!-- Containers -->
				    <div id="conts" class="col-lg-12 col-md-12 col-sm-12 table-content tab-pane fade in active tab-containers tab-clear">
		 				<div style="height: 300px; overflow-y: auto;">
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
				    </div>

				<!-- Commodity -->
				    <div id="commodities" class="col-lg-12 col-md-12 col-sm-12 table-content tab-pane fade tab-commodity tab-clear">
					  	<div style="height: 300px; overflow-y: auto;">
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
				    </div>

				    <div id="running-charges" class="col-lg-12 col-md-12 col-sm-12 table-content tab-pane fade tab-charges tab-clear">
					  	<div style="height: 300px; overflow-y: auto;">
					  		<br>
					  		<h4 style="padding-left: 25px;">Running Charges</h4>
					  		<br>
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
					  	<div style="height: 300px; overflow-y: auto;">
					  		<br>
					  		<h4 style="padding-left: 25px;">Status Report</h4>
					  		<h6> <i> *Double Click the Status Report to View the Full Report.</i></h6>
					  		<br>
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
		 				<div style="height: 300px; overflow-y: auto;">
		 					<br>
					  		<h4 style="padding-left: 25px;">Other Documents</h4>
					  		<br>
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
		</div>
				       <div class="modal-footer">
				       	 <button type="button" class="btn btn-success" id="btn-modal-mail">E-Mail</button>
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
				          	 <u><h4> Date Added  <b class="stat-no"> </b> </h4></u>
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
				          <button type="button" class="btn btn-danger" data-dismiss="modal" id = "btn-close-report-desc">Close</button>
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

 var statusData;
 var txt;
 var mon_Type = 1;


 var content_commodities;
 var content_containers;
 var content_reports;
 var content_charges;
 var content_details;
 var content_status_data;

 //var myCloneview_report;
	$('#btn-search-consignee').on('click',function(){
		txt = $('#txt-search-consignee').val();
			 $.ajax({
				  		method: "POST",
						url: "<?php echo base_url('Job/get_consignee_status_report');?>",
						beforeSend: function(){
							$('.loading-consignee').html('<a class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</a>');
							$('.reports-table').html('<table style="background-color:#fff; border:1px solid #000; border-collapse: collapse;cursor:pointer; " class="table table-bordered order-table reports-table"><tr><a class="loading-consignee" style="font-size:24px;"></a><i class="result-count" style="font-size:24px;"> </i></tr><tr class="tableRow"></tr></table>');
							$('.result-count').html('<i class="result-count" style="font-size:24px;"> </i>');
						},
				  		data: { 
				  			consignee_name:txt,
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

	$('.reports-table').css('cursor','pointer');
    });
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
			$('#jfNo').html($(this).closest('tr').children('td:eq(0)').text());
			$('#print_jfNo').html($(this).closest('tr').children('td:eq(0)').text());
			$('#btn_print').html("<a href='<?php echo base_url('Print_file/');?>?jbNo=" + jbNo + "&mon_Type=" + mon_Type + "' target='blank' id='btn_print'> <button class='btn btn-default' >Print</button> </a>");
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
				  			jfNo 				: jbNo
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
			   	  	 $('#btn-search-consignee').click();
			  	 }
			});

			$(document).on('click','.nav-freights li',function(){
					mon_Type = $('.nav-data .active').val();
				    $('#btn-search-consignee').click();
					$('.loading-consignee').html('<a class="loading-consignee"></a>');
					$('.reports-table').html('<table style="background-color:#fff; border:1px solid #000; border-collapse: collapse;cursor:pointer; " class="table table-bordered order-table reports-table"><tr><a class="loading-consignee" style="font-size:24px;"></a><i class="result-count" style="font-size:24px;"> </i></tr><tr class="tableRow"></tr></table>');
					$('.result-count').html('<i class="result-count" style="font-size:24px;"> </i>');
					changePlaceHolder(mon_Type);
			});

		$(document).ready(function(){
			changePlaceHolder(mon_Type);
			$('#btn-search-consignee').click();
		});

    	$(document).on('click','.btn_docs',function(){
			$('.ttle').html('<span class="ttle">' + $(this).attr('id') + '</span> ');
		});

		$(document).on('click','#btn-modal-mail',function(){
			$.confirm({
				 				icon: 'fa fa-mail-forward',
								closeIcon: false,
				        		title: 'Send E-Mail',
				        		backgroundDismiss: false,
				        		content: 'Sending this Report File to Consignee : <b> ' + consigneeName + '</b>',
				        		confirm: function(){
								     $.ajax({
								  		method: "POST",
										url: "<?php echo base_url('Print_file/send_mail');?>",
										beforeSend : function(){
											  dia =	$.dialog({
									 	  	    icon: 'fa fa-spinner fa-spin',
									 	  	    closeIcon: false,
								        		title: 'Please wait!',
								        		backgroundDismiss: false,
								        		content: 'Sending Email',
								   			});
										},
										data: {
											jbNo 	 : jbNo,
											mon_Type : mon_Type
										}
									})
							  		.done(function(send_status) {
							  			 $.alert({
								        		title: 'E-Mail',
								        		icon: 'fa fa-envelope-o',
								        		backgroundDismiss: false,
								        		content: send_status,/*'Status Report Successfully Sent'*/
								        		confirm: function(){
													dia.close();
								        	    }
								   			   });
								 	});
				        	}
			})
				
		});


		function changePlaceHolder(monType){

			if(monType == 3){
				$('#txt-search-consignee').attr('placeholder','Please Enter JobFile Number / Shipper Name / Consignee Name ');
			}else if(monType == 2){
				$('#txt-search-consignee').attr('placeholder','Please Enter JobFile Number / Shipper Name / Consignee Name ');
			}else if(monType == 1){
				$('#txt-search-consignee').attr('placeholder','Please Enter JobFile Number / Shipper Name / Consignee Name ');
			}else{
				$('#txt-search-consignee').attr('placeholder','Please Enter Consignee Name ');
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


<script src="<?php echo base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js');?>"></script>
<script src="<?php echo base_url('resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js');?>"></script>
<script src="<?php echo base_url('resources/table_sort/tablesortFilport.js');?>"></script>