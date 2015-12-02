<!DOCTYPE html>
<html lang="en">
<head>	
	<?php $this->load->view('header/header'); ?>
</head>

<body>
	<div class="container container-case">

	<?php $this->load->view('header/views_header'); ?>

		<div class="con-ship"></div>
		<div class="con-shiptxt">
			 	<div class="input-group col-md-6 pull-right">
		            <input type="text" class="form-control" placeholder="Search" onkeyup="search(this.value)" />
		            <span class="input-group-btn">
		                <button class="btn" type="button">
		                    <span class=" glyphicon glyphicon-search"></span>
		                </button>
		            </span>
		        </div>

                <div class="con-shiptbl"></div>
                  <div id="mytable">
                	<table class="table table-striped" id="table">
					    <thead>
					      <tr>
					        <th>Consignee</th>
					        <th>Address</th>
					        <th>Status</th>
					        <th>Update</th>
					    
					      </tr>
					    </thead>
					    <tbody>
				
					      <?php 
					      		foreach ($clients as $row) {
					     	    $active= $row->IsActive;
					      		if($active==1){ 
					      		  $stat = 'activated';
					      		  $mystat = '1';
					      		}else{
					      		  $stat = 'deactivated';
					      		  $mystat= '0';
					      		}
					      		if($stat=='activated')
					      		{
					      			$stats = 'deactivated';
					      			$mystats = '0';	
					      		}else{
					      			$stats = 'activated';
					      			$mystats = '1';
					         	}
	
					   echo     '<tr>
					    		    <td   class="hidden">'. $row->ConsigneeId .'</td>
							        <td   contenteditable="true">'. $row->ConsigneeName .'</td>
							        <td   contenteditable="true">'. $row->Address .'</td>
							         <td><select class="status">
							        		<option value='.$mystat.'> '.$stat.' </option>
							        		<option value='.$mystats.'> '.$stats.' </option>
							       		</select>
							         </td>
							        <td><button class="btn update"><span class="glyphicon glyphicon-edit"></span></button></td>
							        
					     		 </tr>';
					      		}

					      ?>
					
					    </tbody>
					  </table>
				</div>
                
			</div>
			<div class="con-info">
				<span>CONSIGNEE INFORMATION</span>
			</div>

			<div class="con-infobox"></div>
			<div class="con-infotxt">
				<label>Client Name: Samsung</label>
				<label>Address: alabang, muntinlupa metro manila</label>
				<label>Office Number: 700-5321</label>
				<label>Date Created: 11/11/15</label>
			</div>

			<div class="con-info consig-pos">
			<span>ADD NEW CONSIGNEE</span>
			</div>
			<div class="consig-posbox"></div>
			<div class="consig-formbox">
				<form role="form">
				<div class="row">
		            <div class="form-group col-lg-12">
		            	<label>Client Name</label>
		                <input type="text" class="form-control" placeholder="" />
		            </div>
		        </div>
		        <div class="row">
		            <div class="form-group col-lg-12">
		            	<label>Address</label>
		                <input type="text" class="form-control"  />
		            </div>
		        </div>
		 
		        <div class="row">
		        	<div class="form-group col-lg-12">
		            	<button type="submit" class="pull-right btn btn-default">Submit</button>
		            </div>	
		        </div>
		    </form>
			</div>	
		</div>


		<script type="text/javascript">
		$(document).ready(function(){
			$('.update').click(function(){

/*				var MyRows = $('table').find('tbody').find('tr');
				for (var i = 0; i < MyRows.length; i++) {
				var id          = $(MyRows[i]).find('td:eq(0)').html();
				var Consignee   = $(MyRows[i]).find('td:eq(1)').html();
				var Address     = $(MyRows[i]).find('td:eq(2)').html();

				updateme(id,Consignee,Address);

}*/
			     var id 		= $(this).closest('tr').children('td:eq(0)').text();
			     var Consignee  = $(this).closest('tr').children('td:eq(1)').text();
			     var Address    = $(this).closest('tr').children('td:eq(2)').text();
			     /*var status    = $(this).closest('tr').children('td .status option:selected').text();	*/      
			     var status = $('select.status').val();
			
				    $('.status').on('change', function(){
				        var status = $(this).val();
				                 
				    });
			 		 updateme(id,Consignee,Address,status);			    

			});
		});


			function updateme(id,Consignee,Address,status){
					

						$.ajax({
  								 method: "POST",
 								 url: "<?php echo base_url('Update');?>",
 								 data: { 
	 								   ConsigneeId:id,
							 		   Cons:Consignee,
							 		   Addr:Address,
							 		   stat:status
 								 	 }
						})
								  .done(function( msg ) {
								  location.reload();
								 alert('success');
   								 $('#mytable').html(msg);

  						});
			}

		</script>
</body>
</html>


          