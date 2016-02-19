<div class="tab-pane active" id="tab_accreditaion_manila">	

    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar">
				        				<div class="col-md-6">
				        			 	 <span style="padding-bottom: 10px;"> <h4> Accreditations : <b> Sea Freight Manila </b></h4></span>
				        				</div>
									    <div class="input-group col-md-6">
									       <input type="text" class="form-control light-table-filter" data-table="order-table-accreditations" id="txt-accreditations" placeholder='Search Consignee Accreditation'>
									      <span class="input-group-btn">
									       <button class="btn btn-danger" id="btn-accreditations" type="button"><span class="fa fa-search fa-fw"></span></button>
									      </span>
									    </div>
				 	</div>
        	</div>     		
    	</div>
    	<div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;">
    		<div class="table-accreditations-manila" ></div>
    	</div>
</div>	

	<div class="modal fade" id="view-accreditations-manila-commodity" role="dialog" data-keyboard="false" data-backdrop="static" style="top:20%;">
				    <div class="modal-dialog">
				   		 <div class="modal-content">
				   			<div class="modal-header">
				   				<h3>Commodity</h3>
				   			</div>
				   			<div class="modal-body">
				   				 <div class="list_products"> </div>
				   			</div>
				   			<div class="modal-footer">
				   				 <button type="button" class="btn btn-danger" data-dismiss="modal" id = "btn-close-report-desc">Close</button>
				   			</div>
				   		 </div>
				    </div>
	</div>

	<div class="modal fade" id="view-accreditations-manila-contact-person" role="dialog" data-keyboard="false" data-backdrop="static" style="top:20%;">
				    <div class="modal-dialog">
				   		 <div class="modal-content">
				   			<div class="modal-header">
				   				<h3>Contact Person</h3>
				   			</div>
				   			<div class="modal-body">
				   				 <div class="list_contact_person"> </div>
				   			</div>
				   			<div class="modal-footer">
				   				 <button type="button" class="btn btn-danger" data-dismiss="modal" id = "btn-close-report-desc">Close</button>
				   			</div>
				   		 </div>
				    </div>
		</div>


		<div class="modal fade" id="view-accreditations-manila-status-reports" role="dialog" data-keyboard="false" data-backdrop="static" style="top:20%;">
				    <div class="modal-dialog">
				   		 <div class="modal-content">
				   			<div class="modal-header">
				   				<h3>Status Reports</h3>
				   			</div>
				   			<div class="modal-body">
								  		<br>
								  		<h6> <i> *Double Click the Status Report to View the Full Report.</i></h6>
								  		<br>
									    <table id="tbl-accreditaions-reports-manila" class="table table-striped tbl-accreditaions-reports-manila tableOverFlow" style="cursor:pointer;">
									             	<tr>
									             		<td class="loadaccreditation-reports tdOverFlow" style="width:100%;" id="loadaccreditation-reports">
									             			Status reports
									             		</td>
									             	</tr>
									    </table>
				   			</div>
				   			<div class="modal-footer">
				   				 <button type="button" class="btn btn-danger" data-dismiss="modal" id = "btn-close-report-desc">Close</button>
				   			</div>
				   		 </div>
				    </div>
		</div>

		<div class="modal fade" id="view-status-report-profile-manila" role="dialog" data-keyboard="false" data-backdrop="static" style="top:20%;">
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

		
<script>
		$("th").css("vertical-align","middle");
		$("tbody td").css("white-space","nowrap");
		$("tbody td").css("min-width","60px");
		$("thead th").css("white-space","nowrap");
var montype = 1;

$(document).on('click','#collapse3',function(){
	$('.accreditations').removeClass('hidden');
	$('.search-consignee').addClass('hidden');
	$('.audit-trail').addClass('hidden');
});


$(document).on('click','#collapse2',function(){
	$('.audit-trail').removeClass('hidden');
	$('.search-consignee').addClass('hidden');
	$('.accreditations').addClass('hidden');
});


$(document).on('click','#collapse1',function(){
	$('.search-consignee').removeClass('hidden');
	$('.accreditations').addClass('hidden');
	$('.audit-trail').addClass('hidden');
});

		
/*Get List Of Manila History*/

$(document).on('click','#collapse3 #accreditation-manila',function(){
    $.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Job_availability/loadAccreditations');?>",
			  beforeSend: function() {
		              $('.table-accreditations-manila').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
		            },  
	  		data: { 
	  			montype:montype,
	  		}
		})
  		.done(function(data) {
  				var resultData = JSON.parse(data);
  				$(".table-accreditations-manila").html(resultData[0].disp);
		});
});

$(document).on('click','.table-accreditations-manila .btn-show-commodity',function(){
	var jbNo = $(this).closest('tr').children('td:eq(1)').text();
	  $.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Job_availability/accreditaions_get_commodity');?>",
			  beforeSend: function() {
		              dia =  $.dialog({
							   icon: 'fa fa-spinner fa-spin',
							   closeIcon: false,
							   title: 'Please wait!',
							   backgroundDismiss: false,
							   content: 'Getting Product Information',
							});
		            },  
	  		data: { 
	  			montype:montype,
	  			jbNo : jbNo
	  		}
		})
  		.done(function(data) {
  				dia.close();
  				$(".list_products").html(data);
  				$('#view-accreditations-manila-commodity').modal('show');
		});
});

$(document).on('click','.table-accreditations-manila .btn-show-contact-person',function(){
	var conName = $(this).closest('tr').children('td:eq(2)').text();
	  $.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Job_availability/accreditations_get_contacts');?>",
			  beforeSend: function() {
		              dia =  $.dialog({
							   icon: 'fa fa-spinner fa-spin',
							   closeIcon: false,
							   title: 'Please wait!',
							   backgroundDismiss: false,
							   content: 'Getting Consignee Contact Information',
							});
		            },  
	  		data: { 
	  			conName : conName
	  		}
		})
  		.done(function(data) {
  				dia.close();
  				$(".list_contact_person").html(data);
  				$('#view-accreditations-manila-contact-person').modal('show');
		});
});

$(document).on('click','.table-accreditations-manila .btn-status-report',function(){
		var jbNo = $(this).closest('tr').children('td:eq(1)').text();
				$.ajax({
				  		method: "POST",
						url: "<?php echo base_url('Job_availability/accreditations_get_status_report');?>",
						beforeSend: function() {
							 dia =  $.dialog({
							   icon: 'fa fa-spinner fa-spin',
							   closeIcon: false,
							   title: 'Please wait!',
							   backgroundDismiss: false,
							   content: 'Getting Status Reports Information',
							});
 					  	},
				  		data: { 
				  			id      :jbNo,
				  			monType : montype
				  		}
					})
			  		.done(function(report_status_data) {
			  			dia.close();
			  			$('#tbl-accreditaions-reports-manila').html(report_status_data);
			  			$('#view-accreditations-manila-status-reports').modal('show');
				 });
});

			$(document).on('dblclick','#tbl-accreditaions-reports-manila #loadaccreditation-reports',function(){
				var pre_txt = $(this).closest('tr').children('td:eq(1)').text();
				var dispTxt = pre_txt.replace(/\\n/g,'<br>');
				$('.txt-desc').html(dispTxt);
				$('.stat-no').html($(this).closest('tr').children('td:eq(0)').text());
				$('#view-accreditations-manila-status-reports').modal('hide');
				$('#view-status-report-profile-manila').modal('show');
			});

			$(document).on('hidden.bs.modal','#view-status-report-profile-manila',function(){
				$('#view-accreditations-manila-status-reports').modal('show');
			});

 /*End*/

</script>

