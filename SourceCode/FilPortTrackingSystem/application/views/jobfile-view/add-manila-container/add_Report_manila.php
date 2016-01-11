<div class="modal-content">
        <div class="modal-header" style="background-color:#eee">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Report(s)</h4>
        </div>
	        <div class="modal-body">
	        	 <!--Report WINDOW-->
  				<div id="table-AddReport-mnla" class="Report-mnla-add">


  					<div class="form-group ">
						<label>JobFile</label>
			        	<input type="text" class="jobfile-addReport-mnla form-control input-sm"disabled>
					</div>

  					<div class="form-group">
					  <label for="report">Status Report:</label>
					  <textarea class="form-control report-mnila" rows="5" id="report"></textarea>
					  <i class="report-msg-addReport-mnila" style="color:red;"></i>

					</div>

					<button type="button" class="btn-addReport-mnila btn btn-primary pull-right" style="margin-bottom:10px;"><span class=" fa fa-plus fa-fw"></span> Add Status Report</button>

						<div style="width: 100%; overflow-x: auto;">
						    <table class="table" style="width: 100%;" border="1">
							    <thead>
							    	 <tr>
							    	 	<th>Status Report</th>
								        <th></th>
							      	</tr>
							    </thead>
						    </table>
						</div>

  				</div>
	        </div>
        <div class="modal-footer" >
	       	 <button type="button " class="btn btn-danger save_reports">Save</button>
	         <button type="button" class="btn btn-default btn-close-vessels" data-dismiss="modal">Close</button>
        </div>
      </div>



<script>
	/*Delete Row*/
	  	$(document).on('click', '#table-AddReport-mnla .deleteButton', function() {
	    	$(this).closest("tr").remove();
		});

/*Status Report Add*/
$(document).on('click','.btn-addReport-mnila',function(){

		
			if($('#table-AddReport-mnla .report-mnila').val() == "")
			{
				$('.report-msg-addReport-mnila').text("Need Status.");

			}else{
				$('#table-AddReport-mnla table').append('<tr class="remove_tr"><td></td><td></td></tr>');
				$('#table-AddReport-mnla table tr:last td:nth-child(1)').html($(".report-mnila").val());
			    $('#table-AddReport-mnla table tr:last td:nth-child(2)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
			

			$('.report-msg-addReport-mnila').text("");
			$('.report-mnila').val("");

			}
				

			});
</script>


<script>
$(document).on('click','.save_reports',function(){
	$('.save_reports').attr('disabled','disabled');
 	if($("#table-AddReport-mnla  table tbody tr td").length == 0){
 					$.confirm({
		 			 title: 'Add New Report',
		 			 content:'You have not Added Any Report. Do you wish to Continue Exitting?',
		 			 backgroundDismiss: false,
		 			 confirmButton: 'Yes',
  					 cancelButton: 'No',
  					 confirm: function(){
  					 	$('.modal').modal('hide');
  					 },
  					 cancel: function(){
  					 	$('.save_reports').removeAttr('disabled');
  					 }
		 		});
				}
				else{
						  dia =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-spin',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Adding Report',
				   			});
 			

	        var jbfl = $('.jobfile-addReport-mnla').val();
            var table = $("#table-AddReport-mnla table tbody");
            var t4    = $("#table-AddReport-mnla table tbody tr").length;

		    table.find('tr').each(function (count1) {
	          var c4   = count1+1;
			  var $tds = $(this).find('td'),
			  save_report   = $tds.eq(0).text();

		           $.ajax({
			  		    method: "POST",
			  		    url: "<?php echo base_url('Job/add_report');?>",
			  	        data: {
			  			    jbfl           :jbfl,
			  			    save_report    :save_report,
			  	    	}
			    	})
			        .done(function(data) {
			    	       if(t4==c4){
	  						$.alert({
	  							backgroundDismiss: false, 	 	
				        		title: 'Success!',
				        		content: 'New Report Added!',
				        		confirm: function(){
				        			$(".remove_tr" ).remove();
				        			dia.close();
				        			$('.save_reports').removeAttr('disabled');
				        			$('.modal').modal('hide');
				        	    }
				   			});
	  					   }
	    		    });		  
	        });	

				}

					 
});


</script>
