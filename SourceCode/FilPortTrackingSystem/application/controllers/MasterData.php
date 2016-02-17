<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterData extends CI_Controller {

   public function __construct()
       {
            parent::__construct();
            $this->load->model('User'); 
       }


		//checker in settings if data is already exists

		function index(){
          $con = $this->input->post('con');
          $con_subme = $con;
       	  $update  = $this->input->post('update');
		  if(!isset($update)){
		  	$update=0;
		  }
		    $con = trim($con);

   		  $query = $this->db->query("SELECT * FROM Consignee  where  ConsigneeName like '$con%'");
		   $consignee_like =  $query->num_rows();

		   $query2 = $this->db->query("SELECT * FROM Consignee  where  ConsigneeName = '$con'");
		   $consignee =  $query2->num_rows();

          $search        = $con;
          $search_Type   = 'ConsigneeName';
          $search_from   = 'Consignee';

	      if($consignee> 0){
	      	if($con!=''){
	      		echo "<i style='color:red;'>Consignee name with  '".$con."' not Available</i>";  
	      	}
	      }else{
	      	 	$con = trim($con);
	        		echo "<i style='color:green;'>Consignee Available.</i>"; 

	        	if($con!=''){
			        	      if($consignee_like>0){
			        	      	  $con_substr = substr($con_subme,-1);
					              if($con_substr==' '){
									  		$list_exists = $this->User->search_global($search,$search_Type,$search_from);
									  	echo "<i style='color:red;'> There is ".$consignee_like." data  with '".$con."'.</i>";
									  	echo  '<span id="flip1'.$update.'" style="cursor:pointer">View</span>
												<div id="panel1'.$update.'">

												  <table class="table-bordered" style="width:100%">
											               <th>No.</th>
											         	   <th>Consignee Name</th>';?>
											         <?php
											         $i=0;
											      	   foreach($list_exists as $row){
											      	   	$i++;
											      	   	   $consignee_exists = $row->ConsigneeName ;
											      	   	 echo '<tr>
											      	   	 		<td>'.$i.'</td>
											      	   	 		<td>'.$consignee_exists.'</td>
											      	   	 	  </tr>';
											      	   }
											      	   ?><?php
										echo   '</table> 
												</div> 
									        <script> 
												$(document).ready(function(){
													   	$("#panel1'.$update.'").hide();
												    $("#flip1'.$update.'").click(function(){
												        $("#panel1'.$update.'").slideToggle("slow");
												    });
												});
											</script>
												';
							        }	    
							   }
			    } 
	      }
 

		}

	function hauler(){
          $hauler = $this->input->post('hauler');
          $hauler_subme = $hauler;
       	  $update  = $this->input->post('update');
		  if(!isset($update)){
		  	$update=0;
		  }
		   $hauler = trim($hauler);
   		  $query = $this->db->query("SELECT * FROM HaulerOrTruck  where  HaulerOrTruck='$hauler'");
		   $haulers =  $query->num_rows();

		    $query2 = $this->db->query("SELECT * FROM HaulerOrTruck  where  HaulerOrTruck like '$hauler%'");
		   $haulers_like =  $query2->num_rows();

          $search        = $hauler;
          $search_Type   = 'HaulerOrTruck';
          $search_from   = 'HaulerOrTruck';

	      if($haulers > 0){
	      	if($hauler!=''){
	      		echo "<i style='color:red;'>Hauler/Truck already exists</i>"; 
	/*      	 $data['search'] = $search;
	      	 $data['list_exists'] = $this->User->search_global($search,$search_Type,$search_from);
	      	    $this->load->view('jobfile-view/available_datas',$data);*/
	      	}
	      }else{
	      		  $haulers_like = trim($haulers_like);
	        		echo "<i style='color:green;'>Hauler/Truck Available</i>"; 

	        	if($hauler!=''){
	        	      if($haulers_like>0){
	        	      	    $haul_substr = substr($hauler_subme,-1);
					      if($haul_substr==' '){
								  		$list_exists = $this->User->search_global($search,$search_Type,$search_from);
								  	echo "<i style='color:red;'> There is ".$haulers_like." data  with '".$hauler."'.</i>";
								  	echo  '<span id="flip2'.$update.'" style="cursor:pointer">View</span>
											<div id="panel2'.$update.'">

											  <table class="table-bordered" style="width:100%">
										               <th>No.</th>
										         	   <th>Hauler Or Truck</th>';?>
										         <?php
										         $i=0;
										      	   foreach($list_exists as $row){
										      	   	$i++;
										      	   	   $hauler_exists = $row->HaulerOrTruck ;
										      	   	 echo '<tr>
										      	   	 		<td>'.$i.'</td>
										      	   	 		<td>'.$hauler_exists.'</td>
										      	   	 	  </tr>';
										      	   }
										      	   ?><?php
									echo   '</table> 
											</div> 
								        <script> 
											$(document).ready(function(){
												   	$("#panel2'.$update.'").hide();
											    $("#flip2'.$update.'").click(function(){
											        $("#panel2'.$update.'").slideToggle("slow");
											    });
											});
										</script>
											';
						    }
					    }	
			    } 
	      }

		}

   	function commodity(){
          $commodity = $this->input->post('commodity');
       	  $commodity_subme = $commodity;
          $update  = $this->input->post('update');
		  if(!isset($update)){
		  	$update=0;
		  }
		   $commodity = trim($commodity);

   		  $query = $this->db->query("SELECT * FROM Products  where  ProductName='$commodity'");
		   $commoditys =  $query->num_rows();

		   $query2 = $this->db->query("SELECT * FROM Products  where  ProductName like '$commodity%'");
		   $commodity_like =  $query2->num_rows();


          $search        = $commodity;
          $search_Type   = 'ProductName';
          $search_from   = 'Products';

	      if($commoditys > 0){
	      	if($commodity!=''){
	      		echo "<i style='color:red;'>Product Name already exists</i>"; 
	      	}
	      }else{
	        		echo "<i style='color:green;'>Product Name Available</i>"; 
	        		  if($commodity_like>0){
	        		  	  $com_substr = substr($commodity_subme,-1);
					    if($com_substr==' '){
							  		$list_exists = $this->User->search_global($search,$search_Type,$search_from);
							  	echo "<i style='color:red;'> There is ".$commodity_like." data  with '".$commodity."'.</i>";
							  	echo  '<span id="flip3'.$update.'" style="cursor:pointer">View</span>
										<div id="panel3'.$update.'">

										  <table class="table-bordered" style="width:100%">
									               <th>No.</th>
									         	   <th>Commodity</th>';?>
									         <?php
									         $i=0;
									      	   foreach($list_exists as $row){
									      	   	$i++;
									      	   	   $product_exists = $row->ProductName ;
									      	   	 echo '<tr>
									      	   	 		<td>'.$i.'</td>
									      	   	 		<td>'.$product_exists.'</td>
									      	   	 	  </tr>';
									      	   }
									      	   ?><?php
								echo   '</table> 
										</div> 
							        <script> 
										$(document).ready(function(){
											   	$("#panel3'.$update.'").hide();
										    $("#flip3'.$update.'").click(function(){
										        $("#panel3'.$update.'").slideToggle("slow");
										    });
										});
									</script>
										';
						 }
					   }	
	      }

		}

	function carrier(){
		  $carrier = $this->input->post('carrier');
		  $carrier_subme = $carrier;
		  $update  = $this->input->post('update');
		  if(!isset($update)){
		  	$update=0;
		  }
		  $carrier = trim($carrier);
   		  $query = $this->db->query("SELECT * FROM Carrier  where  CarrierName='$carrier'");
		   $carriers =  $query->num_rows();

		   $query2 = $this->db->query("SELECT * FROM Carrier  where  CarrierName like '$carrier%'");
		   $carrier_like =  $query2->num_rows();


          $search        = $carrier;
          $search_Type   = 'CarrierName';
          $search_from   = 'Carrier';

	      if($carriers > 0){
	      	if($carrier!=''){
	      		echo "<i style='color:red;'>Carrier Name already exists</i>"; 
	/*      	 $data['search'] = $search;
	      	 $data['list_exists'] = $this->User->search_global($search,$search_Type,$search_from);
	      	    $this->load->view('jobfile-view/available_datas',$data);*/
	      	}
	      }else{
	        		echo "<i style='color:green;'>Carrier Name Available</i>"; 
	        		 if($carrier_like>0){

	        		 	     $carrier_substr = substr($carrier_subme,-1);
					    if($carrier_substr==' '){
								  		$list_exists = $this->User->search_global($search,$search_Type,$search_from);
								  	echo "<i style='color:red;'> There is ".$carrier_like." data  with '".$carrier."'.</i>";
								  	echo  '<span id="flip4'.$update.'" style="cursor:pointer">View</span>
											<div id="panel4'.$update.'">

											  <table class="table-bordered" style="width:100%">
										               <th>No.</th>
										         	   <th>Commodity</th>';?>
										         <?php
										         $i=0;
										      	   foreach($list_exists as $row){
										      	   	$i++;
										      	   	   $carrier_exists = $row->CarrierName ;
										      	   	 echo '<tr>
										      	   	 		<td>'.$i.'</td>
										      	   	 		<td>'.$carrier_exists.'</td>
										      	   	 	  </tr>';
										      	   }
										      	   ?><?php
									echo   '</table> 
											</div> 
								        <script> 
											$(document).ready(function(){
												   	$("#panel4'.$update.'").hide();
											    $("#flip4'.$update.'").on("click",function(){
											        $("#panel4'.$update.'").slideToggle("slow");
											    });
											});
										</script>
											';
					    }
				     }
	      }


	}
		function shipper(){
		  $shipper = $this->input->post('shipper');
		  $shipper_subme = $shipper;
		  $update  = $this->input->post('update');
		  if(!isset($update)){
		  	$update=0;
		  }

		  $shipper = trim($shipper);

   		  $query = $this->db->query("SELECT * FROM Shipper  where  ShipperName='$shipper'");
		   $shippers =  $query->num_rows();

		    $query2 = $this->db->query("SELECT * FROM Shipper  where  ShipperName like '$shipper%'");
		   $shipper_like =  $query2->num_rows();

          $search        = $shipper;
          $search_Type   = 'ShipperName';
          $search_from   = 'Shipper';

	      if($shippers > 0){
	      	if($shipper!=''){
	      		echo "<i style='color:red;'>Shipper name with ".$shipper."  not Available</i>"; 
	      	}
	      }else{
	        		echo "<i style='color:green;'>Shipper Name Available</i>"; 
	        		 if($shipper_like>0){
	        		    $ship_substr = substr($shipper_subme,-1);
					    if($ship_substr==' '){
		  				
								  		$list_exists = $this->User->search_global($search,$search_Type,$search_from);
								  	echo "<i style='color:red;'> There is ".$shipper_like." data  with '".$shipper."'.</i>";
								  	echo  '<span id="flip5'.$update.'" style="cursor:pointer">View</span>
											<div id="panel5'.$update.'">

											  <table class="table-bordered" style="width:100%">
										               <th>No.</th>
										         	   <th>Shipper</th>';?>
										         <?php
										         $i=0;
										      	   foreach($list_exists as $row){
										      	   	$i++;
										      	   	   $shipper_exists = $row->ShipperName ;
										      	   	 echo '<tr>
										      	   	 		<td>'.$i.'</td>
										      	   	 		<td>'.$shipper_exists.'</td>
										      	   	 	  </tr>';
										      	   }
										      	   ?><?php
									echo   '</table> 
											</div> 
								        <script> 
											$(document).ready(function(){
												   	$("#panel5'.$update.'").hide();
											    $("#flip5'.$update.'").click(function(){
											        $("#panel5'.$update.'").slideToggle("slow");
											    });
											});
										</script>
											';
					    }
				     }
	      }


	}

}

?>