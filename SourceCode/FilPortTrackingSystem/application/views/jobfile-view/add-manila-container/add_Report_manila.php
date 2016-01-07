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
	       	 <button type="button " class="btn btn-danger save_report">Save</button>
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
				$('#table-AddReport-mnla table').append('<tr><td></td><td></td></tr>');
				$('#table-AddReport-mnla table tr:last td:nth-child(1)').html($(".report-mnila").val());
			    $('#table-AddReport-mnla table tr:last td:nth-child(2)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
			

			$('.report-msg-addReport-mnila').text("");
			$('.report-mnila').val("");

			}
				

			});
</script>