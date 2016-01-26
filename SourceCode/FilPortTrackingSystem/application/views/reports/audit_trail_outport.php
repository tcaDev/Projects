<div class="tab-pane active" id="tab_audit_outport">		        
    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar">
					    <div class="input-group col-lg-8">
					      <input type="text" class="form-control light-table-filter" data-table="order-table-audit" id="txt-audit-trail" placeholder='Search...'>
					      <span class="input-group-btn">
					        <button class="btn btn-danger" id="btn-audit-trail" type="button"><span class="fa fa-search fa-fw"></span></button>
					      </span>
					    </div>
				 	</div>
        		
        	</div>     		
    	</div>

    	<div class="table-audit-outport"></div>

</div>	


<!-- audit Trail Modal-->



  <!-- Modal -->
  <div class="modal fade" id="audit-outportTrail" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width:180%;right:40%;padding: 10px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Audit Trail - outports</h4>
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

				  <ul class="nav nav-pills nav-data nav-ins-menu">
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
					  		<h4 style="padding-left: 25px;">Jobfile</h4>
					  		<br>

					  		<div class="jobfile-audit-list-outport"></div>
				  	</div>

				  	<!-- Vessel -->

				  	<div id="vessel-audit-outport" class="tab-pane fade ">
				  			<br>
					  		<h4 style="padding-left: 25px;">Vessel</h4>
					  		<br>

					  		<div class="vessel-audit-list-outport"></div>
				  	</div>

				  	<!-- Container -->

				  	<div id="container-audit-outport" class="tab-pane fade ">
				  			<br>
					  		<h4 style="padding-left: 25px;">Container</h4>
					  		<br>

					  		<div class="container-audit-list-outport"></div>
				  	</div>

				  	<!-- Commodities -->

				  	<div id="commodities-audit-outport" class="tab-pane fade">
				  			<br>
					  		<h4 style="padding-left: 25px;">Commidity</h4>
					  		<br>

					  		<div class="commodity-audit-list-outport"></div>
				  	</div>

				  	<!-- Running Charges -->

				  	<div id="running-charges-audit-outport" class="tab-pane fade">
				  			<br>
					  		<h4 style="padding-left: 25px;">Running Charges</h4>
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
			  url: "<?php echo base_url('Job/get_manila_audit');?>",
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



 $(document).on('dblclick','.rowTable',function(){
 	$('#audit-outportTrail').modal('show');

 	 var jbNum = $(this).closest('tr').children('td:eq(1)').text(); 
 	 var shipper = $(this).closest('tr').children('td:eq(3)').text(); 
 	 var consignee = $(this).closest('tr').children('td:eq(4)').text(); 

 	$('.auditTrail-outport').text(jbNum);
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
			  url: "<?php echo base_url('Job/get_audit_vessel');?>",
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
			  url: "<?php echo base_url('Job/get_audit_container');?>",
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
			  url: "<?php echo base_url('Job/get_audit_commodity');?>",
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

</script>