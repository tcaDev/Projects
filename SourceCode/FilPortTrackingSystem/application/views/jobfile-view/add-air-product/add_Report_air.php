<div class="modal-content">
        <div class="modal-header" style="background-color:#eee">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Report(s)</h4>
        </div>
	        <div class="modal-body">
	        	 <!--Report WINDOW-->
  				<div id="table-AddReport-air" class="Report-mnla-add">


  					<div class="form-group ">
						<label>JobFile</label>
			        	<input type="text" class="jobfile-addReport-mnla form-control input-sm"disabled>
					</div>

  					<div class="form-group">
					  <label for="report">Status Report:</label>
					  <textarea class="form-control report-air" rows="5" id="report"></textarea>
					  <i class="report-msg-addReport-air" style="color:red;"></i>

					</div>

					<button type="button" class="btn-addReport-air btn btn-primary pull-right" style="margin-bottom:10px;"><span class=" fa fa-plus fa-fw"></span> Add Status Report</button>

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
	  	$(document).on('click', '#table-AddReport-air .deleteButton', function() {
	    	$(this).closest("tr").remove();
		});

/*Status Report Add*/
$(document).on('click','.btn-addReport-air',function(){

		
			if($('#table-AddReport-air .report-air').val() == "")
			{
				$('.report-msg-addReport-air').text("Need Status.");

			}else{
				$('#table-AddReport-air table').append('<tr class="remove_tr"><td></td><td></td></tr>');
				$('#table-AddReport-air table tr:last td:nth-child(1)').html($(".report-air").val());
			    $('#table-AddReport-air table tr:last td:nth-child(2)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
			

			$('.report-msg-addReport-air').text("");
			$('.report-air').val("");

			}
				

			});
</script>


