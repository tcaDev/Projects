<div class="modal-content">
        <div class="modal-header" style="background-color:#eee">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update New Report(s)</h4>
        </div>
	        <div class="modal-body">
	        	 <!--Report WINDOW-->
  				<div id="table-UpdateReport-air" class="Report-air-update">


  					<div class="form-group ">
						<label>JobFile</label>
			        	<input type="text" class="jobfile-UpdateReport-air form-control input-sm"disabled>
					</div>

  					<div class="form-group">
					  <label for="report">Status Report:</label>
					  <textarea class="form-control report-air-update" rows="5" id="report"></textarea>
					  <i class="report-msg-UpdateReport-air" style="color:red;"></i>

					</div>

					<!-- <button type="button" class="btn-addReport-mnila btn btn-primary pull-right" style="margin-bottom:10px;"><span class=" fa fa-plus fa-fw"></span> Add Status Report</button> -->

						<div style="width: 100%; overflow-x: auto;">
						    <!-- <table class="table" style="width: 100%;" border="1">
							    <thead>
							    	 <tr>
							    	 	<th>Status Report</th>
								        <th></th>
							      	</tr>
							    </thead>
						    </table> -->
						</div>

  				</div>
	        </div>
        <div class="modal-footer" >
	       	 <button type="button " class="btn btn-danger air_update_reports">Save</button>
	         <button type="button" class="btn btn-default btn-close-vessels" data-dismiss="modal">Close</button>
        </div>
      </div>

 <script type="text/javascript">
  var hisid;
 $(document).on('click','.btn-update-report-air',function(){
  var jobfile_reports = $(this).closest('tr').children('td:eq(0)').text();
     hisid = $(this).closest('tr').children('td:eq(1)').text();
  var report_data = $(this).closest('tr').children('td:eq(5)').text();

  $('.report-air-update').val(report_data); 
  $('.jobfile-UpdateReport-air').val(jobfile_reports);
 });


 //update
  $(document).on('click','.air_update_reports',function(){
  	report = $('.report-air-update').val();
  	console.log(hisid);
    		 	$.ajax({
		           method: "POST",
	 		       url: "<?php echo base_url('Job_air_update/update_reports');?>",
	 		       beforeSend: function() {
					 	  rp =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-pulse',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Updating Report',
				   			});
 					  },
			  	   data: {
			  	   			   report       :report,
			  	   			   hisid        :hisid
			  	   		 }
	              })
					.done(function(data) {
	  							 $.alert({
				        		title: 'Success!',
				        		content: 'Report Updated!',
				        		confirm: function(){
									rp.close();
									$('#updateReport-air').modal('hide');
									$('#statrepo-air').modal('hide');
				        	    }
				   			   });
	    		    })
  });
 </script>



