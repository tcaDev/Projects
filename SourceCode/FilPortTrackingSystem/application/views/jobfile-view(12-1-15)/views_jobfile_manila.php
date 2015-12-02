<div class="row">
		<div class="container-fluid"> 
		  		 <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 10px; margin-bottom: -15px;">

			 	<div class="form-group col-lg-4 col-md-4 col-sm-4" >

			 		<div class="row">

			 			<label for="search_manila">Search:</label>

						<input type="text" class="form-control input-sm" id="search_manila" >

			 		</div>	

				</div>



				<div class="col-lg-6 col-md-6 col-sm-6 pull-right" style="padding: 20px;">

					<div class="row">

					<!-- Update -->

					<!-- Trigger the modal with a button -->

					  



					  <!-- Modal -->

					  <div class="modal fade" id="myModal-1-1" role="dialog">

					    <div class="modal-dialog">

					    

					      <!-- Modal content-->

					      <?php $this->load->view('jobfile-view/views_jobfile_manila_updateData'); ?>

					      

					    </div>

					  </div>



					  <!-- Add -->

					<!-- Trigger the modal with a button -->

					  <button type="button" class="col-lg-4 col-md-4 col-sm-4 pull-right btn btn-primary btn-md" data-toggle="modal" data-target="#myModal-1-2" style="margin-right: 10px;">Add Data</button>



					  <!-- Modal -->

					  <div class="modal fade" id="myModal-1-2" role="dialog">

					    <div class="modal-dialog">

					    

					      <!-- Modal content-->

					    	<?php $this->load->view('jobfile-view/views_jobfile_manila_addData'); ?>


					    </div>

					  </div>

					</div>

				</div>

			 </div>

				


			 
			  <div class="job-manila col-lg-12 col-md-12 col-sm-12" style= "overflow-y:auto; height :450px;">

				    <table class="table table-striped table-hover table-bordered" style="width: 7000px;">

				      <thead>

				        <tr style="cursor:w-resize">
				          <th rowspan="2" > No. </th>
				          <th rowspan="2" > Update </th>

				          <th rowspan="2" >Jobfile Number</th>

				          <th rowspan="2" >Shipper</th>

				          <th rowspan="2" >Consignee</th>
				          <th rowspan="2">Number of Cartons</th>

				          <th rowspan="2">Container Size</th>

				          <th rowspan="2">Description of Goods</th>

				          <th rowspan="2">PI / PO No.</th>

				          <th rowspan="2">House Bill of Lading No.</th>

				          <th rowspan="2">Master Bill of Landing No.</th>

				          <th rowspan="2">Container No.</th>

				          <th rowspan="2">Origin</th>

				          <th rowspan="2">Estimated Time of Departure</th>

				          <th rowspan="2">Estimated Time of Arrival</th>

				          <th rowspan="2">Actual Time of Arrival</th>

				          <th rowspan="2">Letter of Credit No. from Bank</th>

				          <th rowspan="2">Start of Demorage</th>

				          <th rowspan="2">Start Storage</th>

				          <th rowspan="2">Registry</th>

				          <th rowspan="2">Vessel / Voyage no.</th>

				          <th rowspan="2">Carrier</th>

				          <th rowspan="2">Date Recieved Arrival Notice from Client/s</th>

				          <th rowspan="2">Date Pick-up / Recieved O-BL</th>

				          <th rowspan="2">Date Pick-up / Recieved other Documents</th>

				          <th rowspan="2">Broker</th>

				          <th rowspan="2">>Date Required Budget to GL</th>

				          <th rowspan="2">Reference Due Date</th>

				          <th rowspan="2">Date sent Pre-Assess</th>

				          <th rowspan="2">Date File Entry to BOC</th>

				          <th rowspan="2">Date Sent Final Assess</th>

				          <th rowspan="2">Reference Entry No.</th>

				          <th rowspan="2">Color Selectivity</th>

				          <th rowspan="2">Date Paid (Date&Time)</th>

				          <th rowspan="2">Date Cleared BOC</th>

				          <th rowspan="2">Target Delivery Date</th>

				          <th rowspan="2">Plate No. / Truckers Name</th>

				          <th rowspan="2">Gate In at Port</th>

				          <th rowspan="2">Gate Out at Port</th>

				          <th rowspan="2"  style="text-align:center !important">Actual Delivery WHSE</th>

				          <th colspan="2" style="text-align:center !important">Status Reports</th>

				          </tr>
				          <tr>
				          <th style="text-align:center !important">status1</th>
					     <th style="text-align:center !important">status2</th>
					    </tr>

				      <!--   </tr> -->

				      </thead>

				      <tbody>

				        <tr>
				         <td   class="hidden">1</td>
				          <td>1</td>
				          <td><button type="button" class="btn update_jobfile" data-toggle="modal" data-target="#myModal-1-1"><span class="glyphicon glyphicon-edit"></span></button></td>

				          <td>
							<a data-toggle="modal" data-target="#jobfiles" href="#">SOC-15-10-009
				          	<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
				          	</a>

				          </td>

				          <td>MOTOROLA</td>

				          <td>Open Comm</td>
				          <td>11 PKGS</td>

				          <td>1x20</td>

				          <td>Tablet Computer</td>

				          <td>61406573556</td>

				          <td>HKG158121912</td>

				          <td>N/A</td>

				          <td>FCIU5273883</td>

				          <td>HONGKONG</td>

				          <td>9/15/2015 11:00AM</td>

				          <td>9/27/2015 11:00AM</td>

				          <td>9/27/2015 11:00AM</td>

				          <td>10/27/2015 11:00AM</td>

				          <td>TT</td>

				          <td>11/3/2015</td>

				          <td>10/31/2015</td>

				          <td>TSL0065-15</td>

				          <td>ISTRIAN EXPRESS V.15015S</td>

				          <td>CEVA/BENLINE</td>

				          <td>10/27/2015</td>

				          <td>10/27/2015</td>

				          <td>10/27/2015</td>

				          <td>MONA</td>

				          <td>10/27/2015</td>

				          <td>0.37037037037037</td>

				          <td>11/6/2015</td>

				          <td>10/27/2015</td>

				          <td>C254093</td>

				          <td><select class="form-control" id="select">
				          	 <option value="" disabled selected>Select your option</option>
							<option value="B" style="background-color: red;">Red</option>
							<option value="C" style="background-color: yellow;">Yellow</option>
							<option value="D" style="background-color: green;">Green</option>
							<option value="E" style="background-color: pink;">pink</option>
				          </select></td>

				          <td>11/9/2015  1300H </td>

				          <td>11/9/2015</td>

				          <td>11/10/2015</td>

				          <td>Mardean Jaems/ ALA7300</td>

				          <td>11/10 5:30am</td>

				          <td>11/10 6:20am</td>

				          <td>11/10 1230h abd</td>

				          <td>10/27- receive original docs   11/3- start processing of lifting,  11/6 - lifting of abandonement</td>
				          <td>10011</td>
				        </tr>

				      </tbody>

				    </table>

				

			  </div>

		  	 </div>
		  	</div>








<script>

$(document).ready(function(){

	 $('.update_jobfile').click(function(){

			     var jobfile_id   = $(this).closest('tr').children('td:eq(0)').text();
			     var jobfile_num  = $(this).closest('tr').children('td:eq(3)').text();
			     var jobfile_shipper  = $(this).closest('tr').children('td:eq(4)').text();



			      $('#jobfile_id').val(jobfile_id);
			      $('#jbfl').val(jobfile_num);
			      $('#shipper').val(jobfile_shipper);
			 }); 
});



	

	$(function() {

    var pressed = false;

    var start = undefined;

    var startX, startWidth;

    

    $("table th").mousedown(function(e) {

        start = $(this);

        pressed = true;

        startX = e.pageX;

        startWidth = $(this).width();

        $(start).addClass("resizing");

    });

    

    $(document).mousemove(function(e) {

        if(pressed) {

            $(start).width(startWidth+(e.pageX-startX));

        }

    });

    

    $(document).mouseup(function() {

        if(pressed) {

            $(start).removeClass("resizing");

            pressed = false;

        }

    });

});


$('#select').change(function(){
  if($(this).val() == 'A'){ 
    $("select").css('background-color', 'white');
  }
    if($(this).val() == 'B'){
    $("select").css('background-color', 'red');
  }
    if($(this).val() == 'C'){
    $("select").css('background-color', 'yellow');
  }
    if($(this).val() == 'D'){
    $("select").css('background-color', 'green');
  }

  if($(this).val() == 'E'){
    $("select").css('background-color', 'pink');
  }
});

</script>


<!---JOBFILE MODALSSS-->

<div class="modal fade" id="jobfiles" role="dialog">
    <div class="modal-dialog">		      
		<?php $this->load->view('jobfile-view/views_jobfiledata_manila'); ?>
    </div>
  </div>
