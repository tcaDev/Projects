 <div class="modal-content" style="width:180%;right:40%;padding: 10px;">
        <div class="modal-header" style="background-color:#eee">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Commodity(s)</h4>
        </div>
	        <div class="modal-body">
	        	<!-- Products PLATE WINDOW-->
				  	<div id="table-AddProduct-mnla" class="product-mnla-add">

				  		<div class="col-lg-6">

				  			<div class="form-group ">
								<label>JobFile</label>
					        	<input type="text" class="jobfile-addProduct-mnla form-control input-sm" id="jbfl" disabled>
							</div>

				  			<div class="form-group">
								<label>Product Name</label><i style="color:red;">*</i>
								<div class="get_my_products"> </div>
								 <select class="prodname-addProduct-mnila form-control input-sm">
								  <?php foreach ($products as $row) {?>

								 	  <?php echo "<option> ".stripslashes($row->ProductName)."</option>"; ?>
	
								 <?php }?>
								 </select>

								<i class="prodname-msg-addProduct-mnila" style="color:red;"></i>
							</div>

				  		</div>

				  		<div class="col-lg-6">

				  			<div class="form-group container-addProduct-manila-get">	
		
							</div>

		                		<button type="button" class="btn-addProduct-mnila btn btn-primary pull-right" style="margin-bottom:10px;"><span class=" fa fa-plus fa-fw"></span> Add Product</button>
				  				<i class="tableGoods-msg-addProduct-mnila" style="color:red;"></i>
				  		</div>

				  		<div style="width: 100%; overflow-x: auto;">
						    <table class="table" style="width: 950px;" border="1">
							    <thead>
							    	 <tr>
							    	 	<th class="hidden">Product Value</th>
								        <th>Product Name</th>
								        <th>Container</th>
								        <th></th>
							      	</tr>
							    </thead>
						    </table>
						</div>
					</div>
	        </div>

        <div class="modal-footer" >
	       	 <button type="button" class="btn btn-danger submit_vessel">Save</button>
	         <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
        </div>
      </div>


 <script>

/*Click Button Container*/

function click_vessel(){
	var jobfile_mnla =  $(".jobfile-addProduct-mnla").val();

		$(".jobfile-addContainer-mnla").val(jobfile_mnla) ;

					$.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job/get_vessel_container');?>",
				  		data: { jobfile:jobfile_mnla,
				  		}
					})
			  		.done(function(data) {
				  				$('.vessel-addContainer-manila-get').html(data);
					});
}

 /*Delete Row*/
	  	$(document).on('click', '#table-AddProduct-mnla .deleteButton', function() {
	    	$(this).closest("tr").remove();
		});

 			var check_product=false;
				function isExist_productinCont(prod,cont){

				var table_Product_mnila = $("#table-AddProduct-mnla table tbody");

				    check_product=false;
				 	  table_Product_mnila.find('tr').each(function(){
				 	  	if($('td:nth(2)',$(this)).html()===cont) 
					    if($('td:nth(0)',$(this)).html()===prod) {
					       check_product=true;            
					        }   
					     })
				    return check_product;
				}

		$(document).on('click' ,'.btn-addProduct-mnila',function(){

			var cont = $('#table-AddProduct-mnla .containers-prod-addProduct-mnila option:selected').val();
			var prod = $('#table-AddProduct-mnla .prodname-addProduct-mnila option:selected').val();

			if(isExist_productinCont(prod,cont))
			{	
				$('.cont-size-msg-addProduct-mnila').text("The Product is already in this Container");
			}
			else if($('#table-AddProduct-mnla .prodname-addProduct-mnila').val() == "")
			{
				$('.prodname-msg-addProduct-mnila').text("Need Product Name.");

			}
			else if($('#table-AddProduct-mnla .containers-prod-addProduct-mnila').val() == "")
			{
				$('.cont-size-msg-addProduct-mnila').text("Need Container.");

			}
			else{
				$('#table-AddProduct-mnla table').append('<tr class="remove_tr"><td></td><td></td><td></td><td></td></tr>');
				$('#table-AddProduct-mnla table tr:last td:nth-child(1)').html($(".prodname-addProduct-mnila").val()).hide();
			 	$('#table-AddProduct-mnla table tr:last td:nth-child(2)').html($(".prodname-addProduct-mnila option:selected").text());
			    $('#table-AddProduct-mnla table tr:last td:nth-child(3)').html($(".containers-prod-addProduct-mnila").val());
	
			    $('#table-AddProduct-mnla table tr:last td:nth-child(4)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
			
			$('.cont-size-msg-addProduct-mnila').text('');
			$('.prodname-msg-addProduct-mnila').text('');
			$('.tableGoods-msg-addProduct-mnila').text("");

			}
				

			});
 </script>


 <script>





 $(document).on('click','.submit_vessel',function(){


					    	   var table = $("#table-AddProduct-mnla table tbody");
					    	   var ct2   = $("#table-AddProduct-mnla table tbody tr").length;

		 table.find('tr').each(function (count1) {		 			  
		  var c2 = count1+1;
		 

		   if(c2<=ct2){
						          var $tds		   = $(this).find('td'),
								     product_name  = $tds.eq(0).text(),
								     prod_orderno  = $tds.eq(1).text();  //origin_id
								     con_id        = $tds.eq(2).text(), //change to  container 

			        	$.ajax({
					  		method: "POST",
							url: "<?php echo base_url('Job/comodity');?>",
				            beforeSend: function() {
					 	       dia =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-spin',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Adding product',
				   			   });
 					       },
					  		data: {
					  				//from comodity tab
					  			    product_name   :product_name,
					  			    prod_orderno   :prod_orderno, 
					  			    con_id	   	   :con_id

				
					  		}
						})
					    .done(function(data) {

					    	             if(c2==ct2){
					  						  $.alert({
					  						  	backgroundDismiss: false, 	
								        		title: 'Success!',
								        		content: 'New Commodity is added!',
								        		confirm: function(){
								        		/*$('.vessel-msg-addVessel-mnilas').empty();*/
						        		    	$(".remove_tr" ).remove();
						        		    	dia.close();
								        	    }
								   			  });
								   	   }
			    		    });
		 }	    
		});
 });
 </script>






