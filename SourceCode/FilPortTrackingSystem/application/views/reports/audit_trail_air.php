<div class="tab-pane active" id="tab_audit_air">		        
    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar">
					    <div class="input-group col-lg-8">
					      <input type="text" class="form-control light-table-filter" data-table="order-table-audit-air" id="txt-audit-trail" placeholder='Search...'>
					      <span class="input-group-btn">
					        <button class="btn btn-danger" id="btn-audit-trail" type="button"><span class="fa fa-search fa-fw"></span></button>
					      </span>
					    </div>
				 	</div>
        		
        	</div>     		
    	</div>

    	<div class="table-audit-air"></div>

</div>	




<!-- audit Trail Modal-->


  <!-- Modal -->
  <div class="modal fade" id="audit-airTrail" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width:180%;right:40%;padding: 10px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Audit Trail - Air</h4>
        </div>
        <div class="modal-body">

        	<div class="form-group">
        		<span style="font-size: 16px; font-weight:900;">JobFile Number : </span>   <a class="auditTrail-air"></a> 
        	</div>
        	<div class="form-group">
        		 <span style="font-size: 16px; font-weight:900;">Shipper : </span> <a class="auditTrail-air-shipper"></a> 
        	</div>
        	<div class="form-group">
        		 <span style="font-size: 16px; font-weight:900;">Consignee : </span> <a class="auditTrail-air-consignee"></a>
        	</div>
       		 

<!-- tabs -->

       		 <div class="container-tab" id="tabs">

				  <ul class="nav nav-pills nav-data nav-ins-menu">
				    <li id="jobfileAudit" class="active"><a data-toggle="tab" href="#jobfile-audit-air">Jobfile</a></li>
				    <li id="commodityAudit"><a data-toggle="tab" href="#commodities-audit-air">Commodities</a></li>
				    <li id="chargesAudit"><a data-toggle="tab" href="#running-charges-audit-air">Running Charges</a></li>
				  </ul>


				  <div class="tab-content">

				  	<!-- Jobfile -->

				  	<div id="jobfile-audit-air" class="tab-pane fade in active">
				  			<br>
					  		<h4 style="padding-left: 25px;">Jobfile</h4>
					  		<br>

					  		<div class="jobfile-audit-list-air"></div>
				  	</div>

				  	<!-- Commodities -->

				  	<div id="commodities-audit-air" class="tab-pane fade">
				  			<br>
					  		<h4 style="padding-left: 25px;">Commidity</h4>
					  		<br>

					  		<div class="commodity-audit-list-air"></div>
				  	</div>

				  	<!-- Running Charges -->

				  	<div id="running-charges-audit-air" class="tab-pane fade">
				  			<br>
					  		<h4 style="padding-left: 25px;">Running Charges</h4>
					  		<br>

					  		<div class="charges-audit-list-air"></div>
				  		
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
	
/*Get List Of Air History*/

$(document).on('click','#collapse2 #audit-air',function(){



    $.ajax({
	  		method: "GET",
			  url: "<?php echo base_url('Job/get_air_audit');?>",
			  beforeSend: function() {
		              $('.table-audit-air').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
		            },  
	  		success: function(response){                    
            $(".table-audit-air").html(response); 
            
       		 }
        });

});

 /*End*/



</script>