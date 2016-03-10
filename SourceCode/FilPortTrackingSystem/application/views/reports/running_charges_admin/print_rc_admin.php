 <div class="panel panel-default">
    <div class="panel-heading col-md-12">
			<div class="col-md-6" style="border-right: 1px solid #ddd;">
    			<h5 style="text-align: center;"><span> JobFile No. : <b><?php echo $PONum->JobFileNo; ?></b></span></h5>
    		</div>

    		<div class="col-md-6">
    			<h5 style="text-align: center;"><span>Volume. : <b><?php echo $vol; ?></b></span></h5>
    		</div>
    </div>
    <div class="panel-body col-md-12">
    	<div class="col-md-6" style="border-right: 1px solid #ddd;">
    		<span><b>Receipted Charges Only :</b></span>

    		<?php 
    			if($montype == 1 || $montype == 2){
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
    		?>

    		<table class="table table-condensed table-bordered">
    			<tbody>
    				<tr>
    					<td>Lodgement Fee :</td>
    					<td><?php echo $charges->LodgementFee ?></td>
    				</tr>
    				<tr>
    					<td>THC Charges :</td>
    					<td><?php echo $charges->THCCharges ?></td>
    				</tr>
    				<tr>
    					<td>Arrestre :</td>
    					<td><?php echo $charges->Arrastre ?></td>
    				</tr>
    				<tr>
    					<td>Wharfage :</td>
    					<td><?php echo $charges->Wharfage ?></td>
    				</tr>
    				<tr>
    					<td>Weighing :</td>
    					<td><?php echo $charges->Weighing ?></td>
    				</tr>
    				<tr>
    					<td>Dispatch Fee :</td>
    					<td><?php echo $charges->DispatchFee ?></td>
    				</tr>
    				<tr>
    					<td>DEL :</td>
    					<td><?php echo $charges->DEL ?></td>
    				</tr>
    				<tr>
    					<td>Storage Fee :</td>
    					<td><?php echo $charges->Storage ?></td>
    				</tr>
    				<tr>
    					<td>Demurrage Fee :</td>
    					<td><?php echo $charges->Demorage ?></td>
    				</tr>
    				<tr>
    					<td>Detention Fee:</td>
    					<td><?php echo $charges->Detention ?></td>    				
    				</tr>
    				<tr>
    					<td>SRA Application :</td>
    					<td><?php echo $charges->SRAApplication ?></td> 
    				</tr>
    				<tr>
    					<td>SRA Processing Fee :</td>
    					<td><?php echo $charges->SRAInspection ?></td> 
    				</tr>
    				<tr>
    					<td>BAI Application :</td>
    					<td><?php echo $charges->BAIApplication ?></td> 
    				</tr>
    				<tr>
    					<td>BAI Inspection Fee :</td>
    					<td><?php echo $charges->BAIInspection ?></td> 
    				</tr>
    				<tr>
    					<td>BAI Inspection Fee :</td>
    					<td><?php echo $charges->BAIInspection ?></td> 
    				</tr>
    				<tr>
    					<td><b>Total :</b></td>
    					<td><b><?php echo $total ?></b></td> 
    				</tr>

    			</tbody>	
    		</table>
    		<?php }else{ 
    			 $total = 0;
		     	 $total += $charges->LodgementFee;
		     	 $total += $charges->BreakBulkFee;
		     	 $total += $charges->StorageFee;
		     	 $total += $charges->BadCargoOrderFee;
		     	 $total += $charges->VCRC;
		     	 $total += $charges->CNI;
		     	 $total += $charges->CNIU;
		     	 $total += $charges->OtherFees;
    			?>

    			<table class="table table-condensed table-bordered">
    			<tbody>
    				<tr>
    					<td>Lodgement Fee :</td>
    					<td><?php echo $charges->LodgementFee ?></td>
    				</tr>
    				<tr>
    					<td>Break Bulk Fee :</td>
    					<td><?php echo $charges->BreakBulkFee ?></td>
    				</tr>
    				<tr>
    					<td>Storage Fee :</td>
    					<td><?php echo $charges->StorageFee ?></td>
    				</tr>

    				<tr>
    					<td>Bad Cargo Fee :</td>
    					<td><?php echo $charges->BadCargoOrderFee ?></td>
    				</tr>
    				<tr>
    					<td>VCRC :</td>
    					<td><?php echo $charges->VCRC ?></td>    				
    				</tr>
    				<tr>
    					<td>CNI :</td>
    					<td><?php echo $charges->CNI ?></td> 
    				</tr>
    				<tr>
    					<td>CNIU :</td>
    					<td><?php echo $charges->CNIU ?></td> 
    				</tr>
    				<tr>
    					<td>Other Fees :</td>
    					<td><?php echo $charges->OtherFees ?></td> 
    				</tr>
    				<tr>
    					<td><b>TOTAL :</b></td>
    					<td><?php echo $total ?></td> 
    				</tr>

    			</tbody>	
    		</table>

    		<?php } ?>

    	</div>

		<div class="col-md-6">
			<?php if($montype == 1 || $montype == 2){ ?>

				<span><b>Containers :</b></span>

			<?php } ?>


			<table class="table table-condensed table-bordered">
				<tbody>
					<tr>
						<?php if($montype == 1 || $montype == 2){?>

						<td> <b>Container No. </b> </td>

						<?php } ?>
						<td><b>Commodity</b></td>
					</tr>
					<?php foreach ($goods as $row) {
							if($row->ProductName == ''){ ?>
							</tbody>
							</table>
							<span style="color:red;">No Record of Goods</span>
						<?php break; }?>
						<tr>
						<?php if($montype == 1 || $montype == 2){ ?>
							<td><?php echo stripslashes($row->ContainerNo); ?></td>
						<?php } ?>
							<td><?php echo stripslashes($row->ProductName);
						} ?></td>
						</tr>
					
				</tbody>
			</table>
		</div>

    </div>
  </div>
