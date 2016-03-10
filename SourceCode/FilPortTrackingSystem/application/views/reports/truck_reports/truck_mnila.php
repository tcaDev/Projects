<div class="tab-pane active" id="tab_reports_truck">		        
    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar" style="margin-top:20%;">
                    <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-6">
                            <span style="padding-bottom: 10px;"> <h4> Truck Reports : <b class='active-tab-truck'> Air Freight </b></h4></span>
                          </div>
                          
                          <div class="col-md-6">
                               <select class="form-control reports_consignee_truck">
                              
                              </select>  <!-- Todo Ajax Call Query to display Data -->
                        </div>
                        </div>
                        
                      </div>

                    <div class="input-group col-md-12">
                      <div class="col-md-12">
                          <span><b>Target Delivery Date : </b></span>
                        </div>
                        <div class="">

                      <div class="col-md-5">
                        <div class="">
                          <input placeholder="From :" class="textbox-n form-control" id="dtpTDDFrom" type="text" onfocus="(this.type='date')" onchange="(this.type='text')"> 
                        </div>
                        
                      </div>

                      <div class="col-md-5">
                        <div class="">
                          <input placeholder="To :" class="textbox-n form-control" id="dtpTDDTo" type="text" onfocus="(this.type='date')" onchange="(this.type='text')"> 
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="row">
                            <span class="input-group-btn">
                              <button class="btn btn-danger col-md-12" type="button" id="btn-truck"><span class="fa fa-search fa-fw"></span></button>
                            </span>
                        </div>
                      </div>
                    </div>
                </div>
				   	</div>

        	</div>     		
    	</div>

    	<div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;">
    		<div class="table-truck-reports" ></div>
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
              $(".tools-bar").animate({marginTop:'0%'});
        }); 
      }
  });
</script>