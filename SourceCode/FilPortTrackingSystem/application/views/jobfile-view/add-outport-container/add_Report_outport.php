<div class="modal-content">
        <div class="modal-header" style="background-color:#eee">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Report(s)</h4>
        </div>
	        <div class="modal-body">
	        	 <!--Report WINDOW-->
  				<div id="table-AddReport-outport" class="Report-outport-add">


  					<div class="form-group ">
						<label>JobFile</label>
			        	<input type="text" class="jobfile-addReport-outport form-control input-sm"disabled>
					</div>

  					<div class="form-group">
					  <label for="report">Status Report:</label>
					  <textarea class="form-control report-outport" rows="5" id="report"></textarea>
					  <i class="report-msg-addReport-outport" style="color:red;"></i>

					</div>

					<button type="button" class="btn-addReport-outport btn btn-primary pull-right" style="margin-bottom:10px;"><span class=" fa fa-plus fa-fw"></span> Add Status Report</button>

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
	       	 <button type="button " class="btn btn-danger save_reports-outport">Save</button>
	         <button type="button" class="btn btn-default btn-close-vessels" data-dismiss="modal">Close</button>
        </div>
      </div>



<script>
	/*Delete Row*/
	  	$(document).on('click', '#table-AddReport-outport .deleteButton', function() {
	    	$(this).closest("tr").remove();
		});

/*Status Report Add*/
$(document).on('click','.btn-addReport-outport',function(){

		
			if($('#table-AddReport-outport .report-outport').val() == "")
			{
				$('.report-msg-addReport-outport').text("Need Status.");

			}else{
				$('#table-AddReport-outport table').append('<tr class="remove_tr"><td></td><td></td></tr>');
				$('#table-AddReport-outport table tr:last td:nth-child(1)').html($(".report-outport").val());
			    $('#table-AddReport-outport table tr:last td:nth-child(2)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
			

			$('.report-msg-addReport-outport').text("");
			$('.report-outport').val("");

			}
				

			});
</script>


<script>
$('.save_reports-outport').click(function(){
$('.save_reports-outport').attr('disabled','disabled');
 	if($("#table-AddReport-outport  table tbody tr td").length == 0){
 					$.confirm({
		 			 title: 'Add New Report',
		 			 closeIcon:false,
		 			 content:'You have not Added Any Report. Do you wish to Continue Exitting?',
		 			 backgroundDismiss: false,
		 			 confirmButton: 'Yes',
  					 cancelButton: 'No',
  					 confirm: function(){
  					 	$('.modal').modal('hide');
  					 	$('.save_reports-outport').removeAttr('disabled');
  					 },
  					 cancel: function(){
  					 	$('.save_reports-outport').removeAttr('disabled');
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
 			

	        var jbfl = $('.jobfile-addReport-outport').val();
            var table = $("#table-AddReport-outport table tbody");
            var t4    = $("#table-AddReport-outport table tbody tr").length;

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
				        			$('.save_reports-outport').removeAttr('disabled');

				        			$('.modal').modal('hide');
				        			/*location.reload();*/
				        	    }
				   			});
	  					   }
	    		    });		  
	        });	
}

});


</script>
