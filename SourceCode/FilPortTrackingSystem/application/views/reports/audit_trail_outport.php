<div class="tab-pane active" id="tab_audit_outport">		        
    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar">
        								<div class="col-md-6">
				        			 	 <span style="padding-bottom: 10px;"> <h4> Jobfile Audit Trail : <b> Sea Freight Outport </b></h4></span>
				        				</div>
									    <div class="input-group col-md-6">
									           <input type="text" class="form-control light-table-filter" data-table="order-table-audit" id="txt-audit-trail" placeholder='Search...'>
									      <span class="input-group-btn">
									           <button class="btn btn-danger" id="btn-audit-trail" type="button"><span class="fa fa-search fa-fw"></span></button>
									      </span>
										</div>
				 	</div>
        		
        	</div>     		
    	</div>

    	<div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;">
    	 <div class="table-audit-outport"></div>
    	</div>

</div>	


<!-- audit Trail Modal-->



  <!-- Modal -->
  <div class="modal fade" id="audit-outportTrail" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width:180%;right:40%;padding: 10px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Audit Trail - Outport</h4>
        </div>
        <div class="modal-body">

        	<div class="form-group">
        		<span style="font-size: 16px; font-weight:900;">JobFile Number : </span>   <a class="auditTrail-outport"></a> 
        	</div>
        	<div class="form-group">
        		 <span style="font-size: 16px; font-weight:900;">Shipper : </span> <a class="auditTrail-outport-shipper"></a> 
        	</div>
        	<div class="form-group">
        		 <span style="font-size: 16px; font-weight:900;">Consignee : </span> <a class="auditTrail-outport-consignee"></a>
        	</div>
       		 

<!-- tabs -->

       		 <div class="container-tab" id="tabs">

				  <ul class="nav nav-pills nav-data">
				    <li id="jobfileAudit" class="active"><a data-toggle="tab" href="#jobfile-audit-outport">Jobfile</a></li>
				    <li id="vesselAudit"><a data-toggle="tab" href="#vessel-audit-outport">Vessel</a></li>
				    <li id="containerAudit"><a data-toggle="tab" href="#container-audit-outport">Containers</a></li>
				    <li id="commodityAudit"><a data-toggle="tab" href="#commodities-audit-outport">Commodities</a></li>
				    <li id="chargesAudit"><a data-toggle="tab" href="#running-charges-audit-outport">Running Charges</a></li>
				  </ul>


				  <div class="tab-content">

				  	<!-- Jobfile -->

				  	<div id="jobfile-audit-outport" class="tab-pane fade in active">
				  			<br>
					  		<h4 style="padding-left: 25px;font-weight:900;">Jobfile History</h4>
					  		<br>

					  		<div class="jobfile-audit-list-outport"></div>
				  	</div>

				  	<!-- Vessel -->

				  	<div id="vessel-audit-outport" class="tab-pane fade ">
				  			<br>
					  		<h4 style="padding-left: 25px;font-weight:900;">Vessel </h4>
					  		<h6 style="padding-left: 15px;font-weight:900;">* Double Click Table Row</h6>
					  		<br>

					  		<div class="vessel-audit-list-outport"></div>
				  	</div>

				  	<!-- Container -->

				  	<div id="container-audit-outport" class="tab-pane fade ">
				  			<br>
					  		<h4 style="padding-left: 25px;font-weight:900;">Container </h4>
					  		<h6 style="padding-left: 15px;font-weight:900;">* Double Click Table Row</h6>
					  		<br>

					  		<div class="container-audit-list-outport"></div>
				  	</div>

				  	<!-- Commodities -->

				  	<div id="commodities-audit-outport" class="tab-pane fade">
				  			<br>
					  		<h4 style="padding-left: 25px;font-weight:900;">Commidity </h4>
					  		<h6 style="padding-left: 15px;font-weight:900;">* Double Click Table Row</h6>
					  		<br>

					  		<div class="commodity-audit-list-outport"></div>
				  	</div>

				  	<!-- Running Charges -->

				  	<div id="running-charges-audit-outport" class="tab-pane fade">
				  			<br>
					  		<h4 style="padding-left: 25px;font-weight:900;">Running Charges History</h4>
					  		<br>

					  		<div class="charges-audit-list-outport"></div>
				  		
				  	</div>
				  	
				  </div>

			</div>
       		
       		
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



<!-- Vessel History -->
<!-- Modal -->
  <div class="modal fade" id="vessel_history_outport" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width:140%;right:20%;padding: 10px;top: 100px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Vessel History</h4>
        </div>
        <div class="modal-body">
          	<div class="vessel-auditTrail-outport"></div>

        </div>
        <div class="footer-modal">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<!-- Container History -->
<!-- Modal -->
  <div class="modal fade" id="container_history_outport" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width:140%;right:20%;padding: 10px;top: 100px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Container History</h4>
        </div>
        <div class="modal-body">
          	<div class="container-auditTrail-outport"></div>

        </div>
        <div class="footer-modal">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


  <!-- Commodity History -->
<!-- Modal -->
  <div class="modal fade" id="commodity_history_outport" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width:140%;right:20%;padding: 10px;top: 100px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Commodity History</h4>
        </div>
        <div class="modal-body">
          	<div class="commodity-auditTrail-outport"></div>

        </div>
        <div class="footer-modal">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<script>
/*$("table").css('cursor','pointer');


$(document).on('click','#collapse2',function(){
	$('.audit-trail').removeClass('hidden');
	$('.search-consignee').addClass('hidden');
});


$(document).on('click','#collapse1',function(){
	$('.audit-trail').addClass('hidden');
	$('.search-consignee').removeClass('hidden');
});*/



/*Get List Of Outport History*/

$(document).on('click','#collapse2 #audit-outport',function(){

	var montype = 2;

    $.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Job/get_manila_audit_view');?>",
			  beforeSend: function() {
		              $('.table-audit-outport').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
		            },  
	  		data: { montype:montype,
	  		}
		})
  		.done(function(data) {
  			
	  				$(".table-audit-outport").html(data); 
	  			
		});


});

 /*End*/



 $(document).on('dblclick','.table-audit-outport .rowTable',function(){
 	$('#audit-outportTrail').modal('show');

 	var jbNum2 = $(this).closest('tr').children('td:eq(0)').text(); 
 	 var jbNum = $(this).closest('tr').children('td:eq(18)').text(); 
 	 var shipper = $(this).closest('tr').children('td:eq(2)').text(); 
 	 var consignee = $(this).closest('tr').children('td:eq(3)').text(); 

 	$('.auditTrail-outport').text(jbNum2);
 	$('.auditTrail-outport-shipper').text(shipper);
 	$('.auditTrail-outport-consignee').text(consignee);


/*Jobfile*/
 	 $.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Job/get_audit_jobfile');?>",
			  beforeSend: function() {
							$('.jobfile-audit-list-outport').html('<a class="jobfile-audit-list-outport"><i class="fa fa-spinner fa-spin pull-left" style="font-size:18px;"></i>Loading JobFile...</a>');
 					  	},
	  		data: { jbNum:jbNum,
	  		}
		})
  		.done(function(data) {
	  				$('.jobfile-audit-list-outport').html(data);
		});

/*Vessel*/
 	 $.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Job/get_audit_vessel_view');?>",
			   beforeSend: function() {
							$('.vessel-audit-list-outport').html('<a class="vessel-audit-list-outport"><i class="fa fa-spinner fa-spin pull-left" style="font-size:18px;"></i>Loading Vessel...</a>');
 					  	},
	  		data: { jbNum:jbNum,
	  		}
		})
  		.done(function(data) {
	  				$('.vessel-audit-list-outport').html(data);
		});

/*Container*/
 	 $.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Job/get_audit_container_view_outport');?>",
			   beforeSend: function() {
							$('.container-audit-list-outport').html('<a class="container-audit-list-outport"><i class="fa fa-spinner fa-spin pull-left" style="font-size:18px;"></i>Loading Container...</a>');
 					  	},
	  		data: { jbNum:jbNum,
	  		}
		})
  		.done(function(data) {
	  				$('.container-audit-list-outport').html(data);
		});

/*Commodity*/
 	 $.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Job/get_audit_commodity_view');?>",
			   beforeSend: function() {
							$('.commodity-audit-list-outport').html('<a class="commdoity-audit-list-outport"><i class="fa fa-spinner fa-spin pull-left" style="font-size:18px;"></i>Loading Commodity...</a>');
 					  	},
	  		data: { jbNum:jbNum,
	  		}
		})
  		.done(function(data) {
	  				$('.commodity-audit-list-outport').html(data);
		});

/*Running Charges*/
 	 $.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Job/get_audit_charges');?>",
			   beforeSend: function() {
							$('.charges-audit-list-outport').html('<a class="charges-audit-list-outport"><i class="fa fa-spinner fa-spin pull-left" style="font-size:18px;"></i>Loading Running Charges...</a>');
 					  	},
	  		data: { jbNum:jbNum,
	  		}
		})
  		.done(function(data) {
	  				$('.charges-audit-list-outport').html(data);
		});

 
 });



 $(document).on('dblclick','.vessel-audit-list-outport .vesselRow',function(){

 	/*var jbNum = $('.auditTrail-mnila').text();*/
 	 var vesselID = $(this).closest('tr').children('td:eq(1)').text(); 

 	/*Vessel*/
 	 $.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Job/get_audit_vessel');?>",
			   beforeSend: function() {
							$('.vessel-auditTrail-outport').html('<a class="vessel-auditTrail-outport"><i class="fa fa-spinner fa-spin pull-left" style="font-size:18px;"></i>Loading Vessel...</a>');
 					  	},
	  		data: { vesselID:vesselID,
	  		}
		})
  		.done(function(data) {
	  				$('.vessel-auditTrail-outport').html(data);
		});


 	$('#vessel_history_outport').modal('show');

 });



  $(document).on('dblclick','.container-audit-list-outport .containerRow',function(){

 	/*var jbNum = $('.auditTrail-mnila').text();*/

 	 var containerID = $(this).closest('tr').children('td:eq(1)').text(); 

 	/*Container*/
 	 $.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Job/get_audit_container_outport');?>",
			   beforeSend: function() {
							$('.container-auditTrail-outport').html('<a class="container-auditTrail-outport"><i class="fa fa-spinner fa-spin pull-left" style="font-size:18px;"></i>Loading Container...</a>');
 					  	},
	  		data: { containerID:containerID,
	  		}
		})
  		.done(function(data) {
	  				$('.container-auditTrail-outport').html(data);
		});


 	$('#container_history_outport').modal('show');

 });


  $(document).on('dblclick','.commodity-audit-list-outport .commodityRow',function(){

	/*var jbNum = $('.auditTrail-mnila').text();*/

	var commodity = $(this).closest('tr').children('td:eq(1)').text(); 
 	/*Commodity*/
 	 $.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Job/get_audit_commodity');?>",
			   beforeSend: function() {
							$('.commodity-auditTrail-outport').html('<a class="commodity-auditTrail-outport"><i class="fa fa-spinner fa-spin pull-left" style="font-size:18px;"></i>Loading Commodity...</a>');
 					  	},
	  		data: { commodity:commodity,
	  		}
		})
  		.done(function(data) {
	  				$('.commodity-auditTrail-outport').html(data);
		});


 	$('#commodity_history_outport').modal('show');

});

</script>

