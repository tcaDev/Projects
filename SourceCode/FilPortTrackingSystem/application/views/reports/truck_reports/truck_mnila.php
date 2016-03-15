<div class="tab-pane in active" id="tab_reports_truck">		        
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
                  <div class="panel-heading">LCL Shipments :</div>
                  <div class="panel-body">
                   <h5>Search : </h5>

                     <div class="col-md-6 col-md-offset-3">
                        <div class="col-md-12">
                          <div class="form-group">
                            <h5>Consignee: </h5>
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



<script>
  var get_truck = 0;

  $('#reports-truck-manila').click(function(){
      $('.active-tab-truck').html('<b>Sea Freight Manila</b>');
      loadConsigneeNames();
      get_truck = 1;
  });

  $('#reports-truck-outport').click(function(){
      $('.active-tab-truck').html('<b>Sea Freight Outport</b>');
      loadConsigneeNames();
      get_truck = 2;
  });

  $('#reports-truck-air').click(function(){
      $('.active-tab-truck').html('<b>Air Freight</b>');
      loadConsigneeNames();
       get_truck = 3;
  });


$(document).ready(function(){
  loadConsigneeNames();
});


function loadConsigneeNames(){
   $.ajax({
    url  : "<?php echo base_url('Reports_Running_Charges/getConsigneeNames');?>",
    type : "POST",
    data : {
      userID : con_name
    },
    success : function(suc){
      $('.reports_consignee_truck').html(suc);
    }
  });
}


  $(document).on('click','#btn-truck',function(){
      var con_id   = $('.reports_consignee_truck option:selected').attr('id');
      var con_name = $('.reports_consignee_truck option:selected').text();
      var frm    = $('#dtpTDDFrom').val();
      var to     = $('#dtpTDDTo').val();
      if(frm == '' && to == ''){
        $(".table-truck-reports").html('<div class="table-truck-reports" ></div>');
      }else{
          $.ajax({
            method: "POST",
            url: "<?php echo base_url('Reports_Running_Charges/loadTruckDetails');?>",
            beforeSend: function() {
                      $('.table-truck-reports').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
                    },  
            data: { 
              montype   : get_truck,
              con_id    : con_id,
              frm       : frm,
              to        : to
            }
        })
          .done(function(data) {
              $(".table-truck-reports").html(data);
        }); 
      }
  });
</script>