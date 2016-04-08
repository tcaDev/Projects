<div class="tab-pane active" id="tab_reports_truck">		        
    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar col-md-12">
                 <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-6">
                        <span style="padding-bottom: 10px;"> <h4> Reports-Truck Booking : <b class='active-tab-truck'> Air Freight </b></h4></span>
                      </div>
                    </div>
                  </div>
				   	</div>
        	</div>  
          <div class="col-md-12" style="margin-top: 15px;">
            <div class="row">
                <div class="panel panel-default">
                  <div class="panel-heading"><span class="shipments-client">FCL Shipments :</span></div>
                  <div class="panel-body">
                     <div class="col-md-6 col-md-offset-3">
                        <div class="col-md-12">
                          <div class="form-group">
                              <div class="col-md-6">
                                <h5>Consignee : </h5>
                              </div>
                              <div class="col-md-6">
                                <span class="pull-right"><h6 class="loadConsignee-truck"></h6></span>
                              </div>
                            <select class="form-control input-sm reports_consignee_truck">
                              
                            </select>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <h5>Target Delivery Date : </h5>
                          <div class="form-group">
                            <input type="text" class="form-control input-sm" onfocus="(this.type='date')" placeholder="From :" id="dtpTDDFrom"/> 
                          </div>

                          <div class="form-group">
                            <input type="text" class="form-control input-sm" onfocus="(this.type='date')" placeholder="To :" id="dtpTDDTo"/> 
                          </div>
                        </div>

                        <div class="col-md-12">
                          <button type="button" class="btn btn-primary btn-sm col-md-12 pull-right " id="btn-truck"><span class="fa fa-search fa-fw"></span> Search</button>
                        </div>

                          <div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;height:110px;">
                            <div class="table-truck-reports" ></div>
                          </div>
                     </div>
                  </div>
                </div>  
            </div>
          </div>

    	</div>

    
    		
</div>
<div class="modal fade" id="truck-options" role="dialog" style="top:30%;">
            <div class="modal-dialog" >
               <div class="modal-content" style="height:150px;">
               <div class="modal-header">
                  <button type="button" data-dismiss="modal" class="close" style="padding-bottom: 5px;"><span>x</span></button>  
                  <br>
               </div>
               
                <div class="modal-body">
                   <div class="col-md-12">
                    <div class="col-md-4"> 
                      <h3>Save As</h3>
                    </div>
                    <div class="col-md-4" style="padding-top:15px;"> 
                      <a href='#' id="truck_csv"><input type="button" class="btn btn-success btn-save-as-truck form-control" value="CSV File"/></a>
                    </div>
                    <div class="col-md-4" style="padding-top:15px;">
                      <a href='#' id="truck_pdf"><input type="button" class="btn btn-danger btn-save-as-truck form-control" value="PDF File"/></a>
                     </div>
                   </div>
                </div>
               </div>
            </div>
</div>



<script>
  var get_truck = 1;

  $('#reports-truck-manila').click(function(){
      $('.active-tab-truck').html('<b>Sea Freight Manila</b>');
      $('.reports_consignee_truck').html('');
      $(".table-truck-reports").html('');
      loadConsigneeNames();
      $('#dtpTDDFrom').val('');
      $('#dtpTDDTo').val('');
      get_truck = 1;
      $('.shipments-client').html('<span>FCL Shipments :</span>');
  });

  $('#reports-truck-outport').click(function(){
      $('.active-tab-truck').html('<b>Sea Freight Outport</b>');
      $('.reports_consignee_truck').html('');
      $(".table-truck-reports").html('');
      loadConsigneeNames();
      $('#dtpTDDFrom').val('');
      $('#dtpTDDTo').val('');
      get_truck = 2;
      $('.shipments-client').html('<span>FCL Shipments :</span>');
  });

  $('#reports-truck-air').click(function(){
      $('.active-tab-truck').html('<b>Air Freight</b>');
      $('.reports_consignee_truck').html('');
      $(".table-truck-reports").html('');
      loadConsigneeNames();
      $('#dtpTDDFrom').val('');
      $('#dtpTDDTo').val('');
       get_truck = 3;
       $('.shipments-client').html('<span>LCL Shipments :</span>');
  });


$(document).ready(function(){
   loadConsigneeNames();
});


function loadConsigneeNames(){
   $.ajax({
    url  : "<?php echo base_url('Reports_Running_Charges/getConsigneeNames');?>",
    type : "POST",
    beforeSend : function(){
      $('.loadConsignee-truck').html('<span class="fa fa-spinner fa-pulse"></span>Loading Commodities...');
    },
    data : {
      userID : con_name
    },
    success : function(suc){
      $('.reports_consignee_truck').html(suc);
      $('.loadConsignee-truck').html('');
    }
  });
}


  $(document).on('click','#btn-truck',function(){
      var con_id   = $('.reports_consignee_truck option:selected').attr('id');
      var con_name = $('.reports_consignee_truck option:selected').text();
      var frm    = $('#dtpTDDFrom').val();
      var to     = $('#dtpTDDTo').val();
      if(con_id == '' || con_id == null){
      }
      else{
            if(frm == '' || frm == null && to == '' || to == null){
              $(".table-truck-reports").html('<div class="table-truck-reports" ></div>');
            }else{
              $.ajax({
                method: "POST",
                url: "<?php echo base_url('Reports_Running_Charges/loadTruckDetails');?>",
                beforeSend: function() {
                    dia =  $.dialog({
                                      icon: 'fa fa-spinner fa-spin',
                                      closeIcon: false,
                                      title: 'Please wait!',
                                      backgroundDismiss: false,
                                      content: 'Currently Searching Your Files',
                                  });
                 },  
                data: { 
                  montype   : get_truck,
                  con_id    : con_id,
                  frm       : frm,
                  to        : to
                }
            }).done(function(data) {
                   dia.close();
                    if(data == 0){
                      dia_2 = $.alert({
                      icon: 'fa fa-exclamation-triangle-o',
                      closeIcon: false,
                          title: 'No Data Match',
                          backgroundDismiss: false,
                          content: 'Sorry ! Data not Found ',
                          confirm : function(){
                            dia_2.close();
                           }
                      });
                      }else{
                        $('#truck-options').modal('show');
                        $('#truck_csv').html('<a href="<?php echo base_url('Print_Report_excel/truck_booking/')?>" target="blank" id="truck_csv"><input type="button" class="btn btn-save-as-truck btn-success form-control" value="CSV File"/></a>');
                        $('#truck_pdf').html('<a href=' + data +' target="blank" id="truck_pdf"><input type="button" class="btn btn-save-as-truck btn-danger form-control" value="PDF File"/></a>');
                      }
            }); 
          }
      }
  });


</script>


