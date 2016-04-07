   <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_Report_excel extends CI_Controller {


     public function __construct()
       {
            parent::__construct();
             $this->load->model('RunningCharges_Reports');	
       }

   function excel_fomater(){
/*		   	// The function header by sending raw excel
		header("Content-type: application/vnd-ms-excel");
		 
		// Defines the name of the export file "Filport.xls"
		header("Content-Disposition: attachment; filename=Filport.xlsx");*/
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');

		$this->export_data();
   }



		 function export_data(){
		  $goods =  $this->Excel_data->goods();

		  echo '<table border=1>
		    	 <th>JobFile No</th>
		  	     <th>Product Name</th>';

		   foreach ($goods as $row) {
		   	  echo '<tr>';
		   	  echo '<td>'.$row->JobFileNo.' </td>';
		   	  echo '<td>'.$row->ProductName.' </td>';
		   	  echo '</tr>';
		   }

		   echo '</table>';

		 }

			function csv()
			{
			        $this->load->dbutil();
			        $this->load->helper('file');
			        $this->load->helper('download');
			        $query =  $this->Excel_data->goods();
			        $delimiter = ",";
			        $newline = "\r\n";
			        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
			        force_download('CSV_Report.csv', $data);
			}



			function csv_running_charges(){
		          $PO_Number            =  $this->input->get('po_num');  
		          $monType       =  $this->input->get('montype');
		          $userID               =  $this->input->get('userId');
		       echo   $jbNo            =  $this->input->get('jobfile');   

			    		if($monType == 1 || $monType == 2){
							$query = $this->db->query("SELECT LodgementFee,ContainerDeposit,THCCharges,Arrastre,Wharfage,Weighing,DEL,DispatchFee,Storage,Demorage,Detention,EIC,BAIApplication,BAIInspection,SRAApplication,SRAInspection,BadCargo,BPIInspection,PlugInForReefer,OtherFees,
								
								sum(LodgementFee + ContainerDeposit + THCCharges + Arrastre + Wharfage + Weighing + 
								    DEL + DispatchFee+Storage+Demorage+Detention+EIC+BAIApplication+BAIInspection+SRAApplication+SRAInspection+BadCargo+BPIInspection+PlugInForReefer+OtherFees ) as total,

							    ParticularCharges as ' ',ContainerNo,ProductName AS Commodity

								FROM vw_RunningCharges  INNER JOIN vw_Products 
								  ON vw_RunningCharges.JobFileNo=vw_Products.JobFileNo
								WHERE vw_RunningCharges.JobFileNo = '$jbNo'");
						}else{
							$query = $this->db->query("SELECT a.LodgementFee, a.BreakBulkFee, a.StorageFee, a.BadCargoOrderFee, a.VCRC, a.CNI, a.CNIU, a.OtherFees  FROM RunningCharges_Air as a, vw_JobFileAir as b WHERE a.JobFile_AirId = b.JobFile_AirId AND b.JobFileNo = '$jbNo'");
						}
	         
		            $this->load->dbutil();
			        $this->load->helper('file');
			        $this->load->helper('download');
			       // $query = $this->db->query("select * from vw_JobFile limit 1");
			        $delimiter = ",";
			        $newline = "\r\n";
			        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
			        force_download('CSV_Report.csv', $data);
			}

}


?>