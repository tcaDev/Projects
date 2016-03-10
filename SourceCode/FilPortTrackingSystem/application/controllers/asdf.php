<?php

class Reports_Running_Charges extends CI_Controller {


     public function __construct()
       {
            parent::__construct();
            date_default_timezone_set('Asia/Manila');
            $this->load->model('RunningCharges_Reports','Charges');
            $this->load->model('Jobdata');
       }

      function loadPO(){
          $PO_Number            =  $this->input->post('po_number');  
          $monitoringType       =  $this->input->post('montype');
          $userID       		=  $this->input->post('userID');
          
          $pre_details 			=  $this->Charges->getPre_Details_RunningCharges($monitoringType,$PO_Number,$userID);
          $dispOutput = '';
          $ct = count($pre_details);
          if($ct > 0){
          $get_containerDetails =  $this->Charges->getContainerDetails($monitoringType,$pre_details->JobFileNo);
          $charge 		        =  $this->getCharges($pre_details->JobFileNo,$monitoringType);
          $commodity 			=  $this->getGoods($pre_details->JobFileNo,$monitoringType);
          $volume 				=  $this->Charges->getVolume($monitoringType,$pre_details->JobFileNo);
      
          	$dispOutput .= '<div class="col-md-12">
          					<br>
          						<div class="col-md-12" style="font-size:14px;">
          							<div class="col-md-6">
          								<span class="pull-left" style="font-size:16px;"><b>Jobfile Number : </b> &nbsp;&nbsp;</span>
          								<u>'
		          								. $pre_details->JobFileNo .
		          						'</u>
          							</div>
          							<div class="col-md-6">';
          								if($monitoringType == 1 || $monitoringType ==2 ){
		          									$dispOutput .= '
							          								<span class="pull-left" style="font-size:16px;"><b>Volume : </b> </span>
							          								<u>'
							          								. $volume .
							          								'</u>
							          								';
		          								}else{
		          									$dispOutput .= '
							          								<span class="pull-left" style="font-size:16px;"><b>Gross Weight(kg) : </b> </span>
							          								<u>'
							          								. $volume .
							          								' kg </u>
							          								';
		          								}
		          					$dispOutput .=	'</div>
	          				</div>		
	          				<hr>
	          					<div class="col-md-12">
	          						<div class="col-md-6">
	          							<span class="pull-left"><u style="font-size:16px;">Receipted Charges Only</u>
	          								<br>
	          								<br>
	          								' . $charge . '
	          							</span>
	          						</div>
	          						<div class="col-md-6">'; 
	          						if($monitoringType == 1 || $monitoringType == 2){
	          							$dispOutput .= '<span class="pull-left"><u style="font-size:16px;">Containers</u>';
	          						}
	          						$dispOutput .= 	'<br>
	          								' . $commodity . '
	          							</span>
	          						</div>
          						</div>
          						<div class="col-md-12">
	          						<div style="font-size:14px;margin-top:5px;">
	          							<u><i>Note: Brokerage Fees, Delivery Charges and other Customs related fees are not included</u></i>
	          						</div>
	          						<div class="col-md-6">
	          							
	          						</div>
	          						<div class="col-md-6">
	          							<span class="pull-right" style="margin-bottom:5px;">
	          								<a href="' .  base_url("Print_Report/") . '?po_num=' . $PO_Number . '&montype=' . $monitoringType .'&userId='. $userID .'" target="blank" "><input type="button" value="Print" class="btn btn-primary"/></a>
		          							</span>
		          					</div>
	          					</div>
          					</div>';
          }else{
          	$dispOutput = "<center style='font-color:RED;'> No PO Number From your Accounts Matches Your Search </center>";
          }
               $output = array(
                          array(
                              "disp" => $dispOutput,
                            )
                      );
                      echo json_encode($output);
          
      }


     function loadVolumeDetails(){
     	  $ataFrom              =  $this->input->post('frm');  
     	  $ataTo	            =  $this->input->post('to');  
          $monitoringType       =  $this->input->post('montype');
          $userID       		=  $this->input->post('userID');
          $dispOutput = '';
          $reportsVolume = $this->Charges->getReportsVolume($monitoringType,$userID,$ataFrom,$ataTo);
          $dispOutput .= '<div class="table-volume-manila">';
          
          if(count($reportsVolume) > 0){
          	if($monitoringType == 1 || $monitoringType == 2){
          		 	$dispOutput .='<table class ="table-condensed table-bordered" style="width:200%;">
          					<thead>
          					<tr>
          						<th>Jobfile No</th>
          						<th>Actual Arrival Time</th>
          						<th>List of Containers Per Jobfile</th>
          						<th>Commodity</th>
          						<th>Lodgement Fee</th>
          						<th>THC Charges</th>
          						<th>Arrastre</th>
          						<th>Wharfage</th>
          						<th>Weighing</th>
          						<th>Dispatch Fee</th>
          						<th>DEL</th>
          						<th>SRA Application</th>
          						<th>SRA Inspection</th>
          						<th>BAI Application</th>
          						<th>BAI Inspection Fee</th>
          						<th>BPI Inspection Fee</th>
          					</tr>
          					</thead>
          					<tbody>';

			          	foreach ($reportsVolume as $row) {
			          		$dispOutput .= "<tr>";
			          		$dispOutput .= "<td>" . $row->JobFileNo . "</td>";
			          		$dispOutput .= "<td>" . $row->ActualArrivalTime . "</td>";
			          		$dispOutput .= "<td>" . $row->ContainerNo . "</td>";
			          		$dispOutput .= "<td>" . $row->ProductName . "</td>";
			          		$dispOutput .= "<td>" . $row->LodgementFee . "</td>";
			          		$dispOutput .= "<td>" . $row->THCCharges . "</td>";
			          		$dispOutput .= "<td>" . $row->Arrastre . "</td>";
			          		$dispOutput .= "<td>" . $row->Wharfage . "</td>";
			          		$dispOutput .= "<td>" . $row->Weighing . "</td>";
			          		$dispOutput .= "<td>" . $row->DispatchFee . "</td>";
			          		$dispOutput .= "<td>" . $row->SRAApplication . "</td>";
			          		$dispOutput .= "<td>" . $row->SRAInspection . "</td>";
			          		$dispOutput .= "<td>" . $row->BAIApplication . "</td>";
			          		$dispOutput .= "<td>" . $row->BAIInspection . "</td>";
			          		$dispOutput .= "<td>" . $row->BPIInspection . "</td>";
			          		$dispOutput .= "</tr>";
			          	}
          	}else{
          		 	$dispOutput .='<table class ="table-condensed table-bordered" style="width:200%;">
          					<thead>
          					<tr>
          						<th>Jobfile No</th>
          						<th>Actual Arrival Time</th>
          						<th>Aircraft</th>
          						<th>Commodity</th>
          						<th>Lodgement Fee</th>
          						<th>Break Bulk Fee</th>
          						<th>Storage Fee</th>
          						<th>Bad Cargo Order Fee</th>
          						<th>VCRC</th>
          						<th>CNI</th>
          						<th>CNIU</th>
          						<th>Other Fees</th>
          					</tr>
          					</thead>
          					<tbody>';

          	foreach ($reportsVolume as $row) {
          		$dispOutput .= "<tr>";
          		$dispOutput .= "<td>" . $row->JobFileNo . "</td>";
          		$dispOutput .= "<td>" . $row->ATA . "</td>";
          		$dispOutput .= "<td>" . $row->Aircraft . "</td>";
          		$dispOutput .= "<td>" . $row->ProductName . "</td>";
          		$dispOutput .= "<td>" . $row->LodgementFee . "</td>";
          		$dispOutput .= "<td>" . $row->BreakBulkFee . "</td>";
          		$dispOutput .= "<td>" . $row->StorageFee . "</td>";
          		$dispOutput .= "<td>" . $row->BadCargoOrderFee . "</td>";
          		$dispOutput .= "<td>" . $row->VCRC . "</td>";
          		$dispOutput .= "<td>" . $row->CNI . "</td>";
          		$dispOutput .= "<td>" . $row->CNIU . "</td>";
          		$dispOutput .= "<td>" . $row->OtherFees . "</td>";
          		$dispOutput .= "</tr>";
          	}
          	}
         

		     $dispOutput .= '
		    			</tbody>
		     		</table>
		     	</div>';

			 $dispOutput .= '<script src="' .  base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js') . '"></script>
                      <script src="' .  base_url("resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js"). '"></script>
                      <script src="' .  base_url("resources/table_sort/dist/js/widgets/widget-scroller.min.js"). '"></script>
                      <script src="' .  base_url("resources/table_sort/tableSortVolume.js") . '"></script>
		                      ';

          }else{
          	$dispOutput .= '
		    			<center> <h2 style="font-color:red"> No Data Matches Your Search </h2> </center> 
		     	</div>';
          }

       

		echo $dispOutput;                      
     } 

    function getCharges($jbNo, $monitoringType){
        $charges = $this->Charges->getRunningCharges($monitoringType, $jbNo);
      
      		 	if($monitoringType == 1 || $monitoringType == 2){
		      	 $total = 0;
		     	 $total += $charges->LodgementFee;
		     	 $total += $charges->THCCharges;
		     	 $total += $charges->Arrastre;
		     	 $total += $charges->Weighing;
		     	 $total += $charges->Wharfage;
		     	 $total += $charges->DispatchFee;
		     	 $total += $charges->DEL;
		     	 $total += $charges->Storage;
		     	 $total += $charges->Demorage;
		     	 $total += $charges->Detention;
		     	 $total += $charges->SRAApplication;
		     	 $total += $charges->SRAInspection;
		     	 $total += $charges->BAIApplication;
		     	 $total += $charges->BAIInspection;
		     	 $total += $charges->BPIInspection;

				$chargesOutput = '<div style="width:100%;">
									<table style="margin-left:35px; width:100%; font-size:14px;">';     
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										Lodgement Fee <span class="pull-right"> : </span>
									</td>
									<td margin-left:10px;> 
										<span class="pull-right">' . $charges->LodgementFee 

										. '</span>
									</td>
								  </tr>';
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										THC Charges <span class="pull-right"> : </span>
									</td>
									<td> 
										<span class="pull-right">' . $charges->THCCharges . '</span>
									</td>
								  </tr>';
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										Local Charges <span class="pull-right"> : </span>
									</td>
								  </tr>';
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										Arrastre <span class="pull-right"> : </span>
									</td>
									<td>
										<span class="pull-right">' . $charges->Arrastre . ' </span>
									</td>
								  </tr>';				  
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										Wharfage <span class="pull-right"> : </span>
									</td>
									<td>
										<span class="pull-right">' . $charges->Wharfage . ' </span>
									</td>
								  </tr>';

				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										Weighing <span class="pull-right"> : </span>
									</td>
									<td>
										<span class="pull-right">' . $charges->Weighing . ' </span>
									</td>
								  </tr>';
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										Dispatch Fee <span class="pull-right"> : </span>
									</td>
									<td> 
										<span class="pull-right">' . $charges->DispatchFee . '</span>
									</td>
								  </tr>';
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										DEL <span class="pull-right"> : </span>
									</td>
									<td>
										<span class="pull-right">' . $charges->DEL . ' </span>
									</td>
								  </tr>';				  
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										Storage Fee <span class="pull-right"> : </span>
									</td>
									<td>
										<span class="pull-right">' . $charges->Storage . ' </span>
									</td>
								  </tr>';	

				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										Demurrage Fee <span class="pull-right"> : </span>
									</td>
									<td>
										<span class="pull-right">' . $charges->Demorage . ' </span>
									</td>
								  </tr>';
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										Detention Fee <span class="pull-right"> : </span>
									</td>
									<td> 
										<span class="pull-right">' . $charges->Detention . '</span>
									</td>
								  </tr>';
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										SRA Application <span class="pull-right"> : </span>
									</td>
									<td> 
										<span class="pull-right">' . $charges->SRAApplication . '</span>
									</td>
								  </tr>';				  
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										SRA Processing Fee <span class="pull-right"> : </span>
									</td>
									<td> 
										<span class="pull-right">' . $charges->SRAInspection . '</span>
									</td>
								  </tr>';	
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										BAI Application <span class="pull-right"> : </span>
									</td>
									<td> 
										<span class="pull-right">' . $charges->BAIApplication . '</span>
									</td>
								  </tr>';
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										BAI Inspection Fee <span class="pull-right"> : </span>
									</td>
									<td> 
										<span class="pull-right">' . $charges->BAIInspection . '</span>
									</td>
								  </tr>';
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										BPI Inspection Fee <span class="pull-right"> : </span>
									</td>
									<td>
										<span class="pull-right">'. $charges->BPIInspection . ' </span>
									</td>
								  </tr>';			

				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										<hidden>
									</td>
								  </tr>';	

				$chargesOutput .= '<tr>
									<td style="text-align:left;">
									  <b> Total </b> <span class="pull-right"> : </span>
									</td>
									<td> 
										<span class="pull-right">' . $total . '</span>
									</td>
								  </tr>
								  </table>
								 </div>';			
		      	}else{
		      	 $total = 0;
		     	 $total += $charges->LodgementFee;
		     	 $total += $charges->BreakBulkFee;
		     	 $total += $charges->StorageFee;
		     	 $total += $charges->BadCargoOrderFee;
		     	 $total += $charges->VCRC;
		     	 $total += $charges->CNI;
		     	 $total += $charges->CNIU;
		     	 $total += $charges->OtherFees;

				$chargesOutput = '<div style="width:100%;">
									<table style="margin-left:35px; width:100%; font-size:14px;">';     
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										Lodgement Fee <span class="pull-right"> : </span>
									</td>
									<td margin-left:10px;> 
										<span class="pull-right">' . $charges->LodgementFee 

										. '</span>
									</td>
								  </tr>';
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										Break Bulk Fee <span class="pull-right"> : </span>
									</td>
									<td> 
										<span class="pull-right">' . $charges->BreakBulkFee . '</span>
									</td>
								  </tr>';
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										Storage Fee <span class="pull-right"> : </span>
									</td>
									<td>
										<span class="pull-right">' . $charges->StorageFee . ' </span>
									</td>
								  </tr>';				  
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										Bad Cargo Fee <span class="pull-right"> : </span>
									</td>
									<td>
										<span class="pull-right">' . $charges->BadCargoOrderFee . ' </span>
									</td>
								  </tr>';

				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										VRC <span class="pull-right"> : </span>
									</td>
									<td>
										<span class="pull-right">' . $charges->VCRC . ' </span>
									</td>
								  </tr>';
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										CNI <span class="pull-right"> : </span>
									</td>
									<td> 
										<span class="pull-right">' . $charges->CNI . '</span>
									</td>
								  </tr>';
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										CNIU <span class="pull-right"> : </span>
									</td>
									<td>
										<span class="pull-right">' . $charges->CNIU . ' </span>
									</td>
								  </tr>';				  
				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										Other Fees <span class="pull-right"> : </span>
									</td>
									<td>
										<span class="pull-right">' . $charges->OtherFees . ' </span>
									</td>
								  </tr>';	

				$chargesOutput .= '<tr>
									<td style="text-align:left;">
										<hidden>
									</td>
								  </tr>';	

				$chargesOutput .= '<tr>
									<td style="text-align:left;">
									  <b> Total </b> <span class="pull-right"> : </span>
									</td>
									<td> 
										<span class="pull-right">' . $total . '</span>
									</td>
								  </tr>
								  </table>
								 </div>';
		      	}

		if($total == 0){
			$chargesOutput = '<center><span style="color:red">No Record of Charges </span></center>';
		}      	

		return $chargesOutput;				  				  				  			  

      }

      function getGoods($jbNo, $monitoringType){
      	$goods = $this->Charges->getCommodities($monitoringType,$jbNo);
      	$commoditiesOutput = '';
      	  if(count($goods) > 0 ){
      		 $commoditiesOutput .=  "<div style='width:100%;'>
			      		 	<table id='tbl-charges-commodities' style='width:100%;margin-left:35px;font-size:14px;'>
					              <tr>";
					                  if($monitoringType == 1 || $monitoringType == 2){
					                  	 $commoditiesOutput .= "<td><span class='pull-left'><b>Container No. </b></span></td>";
					                  }
					                   $commoditiesOutput .= "<td><span class='pull-left'><b>Commodity </b></span></td></tr>";
	         foreach($goods as $row){
	        	
	             if($row->ProductName==''){
	                 $commoditiesOutput .=  "</table>";
	                 $commoditiesOutput .=     '<center><span style="color:red">No Record of Goods  </span></center>';
	                break;
	              }
	              $commoditiesOutput .=  "<tr>";
	              if($monitoringType == 1 || $monitoringType == 2){
	              $commoditiesOutput .=   "<td><span class='pull-left'>".stripslashes($row->ContainerNo) ."</span></td>";
				  }
	              $commoditiesOutput .=  "<td><span class='pull-left'>".stripslashes($row->ProductName)."</span></td>";
	              $commoditiesOutput .=  "</tr>";
	         }
	          $commoditiesOutput .=  "</table>
	          </div>";

	      	}else{
	      		 $commoditiesOutput =  '<br><center><span style="color:red">No Goods Yet </span></center>';
	      	}

		return $commoditiesOutput;		
      	
      }



}



 ?>