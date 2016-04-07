<?php

Class Excel_data extends CI_Model

{

	function goods(){
/*		 $this  ->  db ->select('*');
   		 $this  -> db -> from('vw_Products');
   		 $this->db->limit(10); 
    	return $query =$this->db->get();

*/	
/*    	$query = $this->db->select('select * from vw_products as prod  
   				 left join vw_jobfile as jbfl 
                 on `prod`.`JobFileNo`=`jbfl`.`JobFileNo`  limit 1');
        $this->db->get('vw_products');
        $this->db->get('vw_jobfile');*/
			$this->db->select('ProductName');
/*			$this->db->select("NULL as ' '",false);*/
/*		    $this->db->select('Forwarder AS `dasdasdasd`',false);
		    $this->db->select('Warehouse AS `dasdasdasd`',false);*/
		   // $this->db->select("NULL as ' '",false);
		  /*  $this->db->select("Forwarder as 'e'",false);
		    $this->db->select("Warehouse as 'es'",false);*/
		  //  $this->db->select('ProductName AS ` `', FALSE);\
	        $this->db->select('Forwarder as `  `',false);
	        $this->db->select('Warehouse as `   ` ',false);
		    $this->db->select('ConsigneeName');
			$this->db->from('vw_products');
			$this->db->join('vw_jobfile', 'vw_products.JobFileNo = vw_jobfile.JobFileNo', 'left');

			return $query = $this->db->get();
    }



}

?>