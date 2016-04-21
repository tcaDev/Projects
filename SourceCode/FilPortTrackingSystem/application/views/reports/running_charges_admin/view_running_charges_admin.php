 <div class="panel panel-default">
    <div class="panel-heading col-md-12">
			<div class="col-md-6" style="border-right: 1px solid #ddd;">
    			<h5 style="text-align: center;"><span> JobFile No. : <b><?php echo $PONum->JobFileNo; ?></b></span></h5>
    		</div>

    		<div class="col-md-6">
    			<?php if($montype == 1 || $montype ==2 ){ ?>
    			<h5 style="text-align: center;"><span>Volume : <b><?php echo $vol; ?></b></span></h5>
    			<?php }else{ ?>
    			<h5 style="text-align: center;"><span>Weight (kg) : <b><?php echo $vol;?>kg</b></span></h5>
    			<?php } ?>
				
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
                     $total += $charges->OtherFees;

                     $total += $charges->PlugInForReefer;
                     $total += $charges->BadCargo;
                     $total += $charges->ContainerDeposit;
                     $total += $charges->EIC;

    		?>

    		<table class="table table-condensed table-bordered">
    			<tbody>
    				<tr>
    					<td>Lodgement Fee :</td>
    					<td><?php echo number_format($charges->LodgementFee ,2,'.',',');?></td>
    				</tr>
                    <tr>
                        <td>Container Deposit :</td>
                        <td><?php echo number_format($charges->ContainerDeposit ,2,'.',',');?></td>
                    </tr>
                    <tr>
    					<td>THC Charges :</td>
    					<td><?php echo number_format($charges->THCCharges ,2,'.',',');?></td>
    				</tr>
    				<tr>
    					<td>Arrestre :</td>
    					<td><?php echo number_format( $charges->Arrastre ,2,'.',',');?></td>
    				</tr>
    				<tr>
    					<td>Wharfage :</td>
    					<td><?php echo number_format($charges->Wharfage ,2,'.',',');?></td>
    				</tr>
    				<tr>
    					<td>Weighing :</td>
    					<td><?php echo number_format($charges->Weighing ,2,'.',',');?></td>
    				</tr>
    				<tr>
    					<td>Dispatch Fee :</td>
    					<td><?php echo number_format($charges->DispatchFee ,2,'.',',');?></td>
    				</tr>
    				<tr>
    					<td>DEL :</td>
    					<td><?php echo number_format($charges->DEL ,2,'.',',');?></td>
    				</tr>
    				<tr>
    					<td>Storage Fee :</td>
    					<td><?php echo number_format($charges->Storage ,2,'.',',');?></td>
    				</tr>
    				<tr>
    					<td>Demurrage Fee :</td>
    					<td><?php echo number_format($charges->Demorage ,2,'.',',');?></td>
    				</tr>
                    <tr>
                        <td>EIC :</td>
                        <td><?php echo number_format($charges->EIC ,2,'.',',');?></td>
                    </tr>
                     <tr>
                        <td>Bad Cargo :</td>
                        <td><?php echo number_format($charges->BadCargo ,2,'.',',');?></td>
                    </tr>
    				<tr>
    					<td>Detention Fee:</td>
    					<td><?php echo number_format($charges->Detention ,2,'.',',');?></td>    				
    				</tr>
    				<tr>
    					<td>SRA Application :</td>
    					<td><?php echo number_format($charges->SRAApplication ,2,'.',',');?></td> 
    				</tr>
    				<tr>
    					<td>SRA Processing Fee :</td>
    					<td><?php echo number_format($charges->SRAInspection ,2,'.',',');?></td> 
    				</tr>
                    <tr>
                        <td>Plug In For Reefer:</td>
                        <td><?php echo number_format($charges->PlugInForReefer ,2,'.',',');?></td> 
                    </tr>
    				<tr>
    					<td>BAI Application :</td>
    					<td><?php echo number_format($charges->BAIApplication ,2,'.',',');?></td> 
    				</tr>
    				<tr>
    					<td>BAI Inspection Fee :</td>
    					<td><?php echo number_format($charges->BAIInspection ,2,'.',',');?></td> 
    				</tr>
    				<tr>
    					<td>BPI Inspection Fee :</td>
    					<td><?php echo number_format($charges->BPIInspection ,2,'.',',');?></td> 
    				</tr>
                    <tr>
                        <td>Other Fees :</td>
                        <td><?php echo number_format($charges->OtherFees ,2,'.',',');?></td> 
                    </tr>
    				<tr>
    					<td><b>Total :</b></td>
    					<td><b><?php echo number_format($total ,2,'.',','); ?></b></td> 
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
    					<td><?php echo number_format($charges->LodgementFee ,2,'.',',');?></td>
    				</tr>
    				<tr>
    					<td>Break Bulk Fee :</td>
    					<td><?php echo number_format($charges->BreakBulkFee ,2,'.',',');?></td>
    				</tr>
    				<tr>
    					<td>Storage Fee :</td>
    					<td><?php echo number_format($charges->StorageFee ,2,'.',',');?></td>
    				</tr>

    				<tr>
    					<td>Bad Cargo Fee :</td>
    					<td><?php echo number_format($charges->BadCargoOrderFee ,2,'.',',');?></td>
    				</tr>
    				<tr>
    					<td>VCRC :</td>
    					<td><?php echo number_format($charges->VCRC ,2,'.',',');?></td>    				
    				</tr>
    				<tr>
    					<td>CNI :</td>
    					<td><?php echo  number_format($charges->CNI ,2,'.',',');?></td> 
    				</tr>
    				<tr>
    					<td>CNIU :</td>
    					<td><?php echo  number_format($charges->CNIU ,2,'.',',');?></td> 
    				</tr>
    				<tr>
    					<td>Other Fees :</td>
    					<td><?php echo  number_format($charges->OtherFees ,2,'.',',');?></td> 
    				</tr>
    				<tr>
    					<td><b>TOTAL :</b></td>
    					<td><?php echo number_format($total ,2,'.',','); ?></td> 
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
					<?php foreach ($goods as $row) {?>
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
        <div class="col-md-12">
            <div class="col-md-8">
                <div style="font-size:13px;margin-top:5px;">
                    <i><b>Note:</b> Brokerage Fees, Delivery Charges and other Customs related fees are not included</i>
                </div>
            </div>
            <div class="col-md-4">
                <a type="button" class="btn btn-primary pull-right" href="<?php echo base_url('Print_Report_excel/csv_running_charges_admin/').'?po_num='.$PONum->PurchaseOrderNo.'&montype='.$montype.'&consigneeId='.$PONum->ConsigneeId; ?>" target='_blank'><span class="fa fa-print fa-fw"></span>View as CSV</a>
            </div>
            <div class="col-md-4">
                <a type="button" class="btn btn-primary pull-right" href="<?php echo base_url('Print_RunningCharges_Admin/').'?po_num='.$PONum->PurchaseOrderNo.'&montype='.$montype.'&consigneeId='.$PONum->ConsigneeId; ?>" target='_blank'><span class="fa fa-print fa-fw"></span> Print</a>
            </div>
        </div>
        
  </div>
