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
                          <select class="form-control">
                            <option disabled selected>Select Consignee</option>
                            <option class="reports_consignee_truck_manila"></option><!-- Todo Ajax Call Query to display Data -->
                          </select>  
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
                          <input placeholder="From :" class="textbox-n form-control" id="dtpTDDFrom-manila" type="text" onfocus="(this.type='date')" onchange="(this.type='text')"> 
                        </div>
                        
                      </div>

                      <div class="col-md-5">
                        <div class="">
                          <input placeholder="To :" class="textbox-n form-control" id="dtpTDDTo-manila" type="text" onfocus="(this.type='date')" onchange="(this.type='text')"> 
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="row">
                            <span class="input-group-btn">
                              <button class="btn btn-danger col-md-12" type="button" id="btn-truck-manila"><span class="fa fa-search fa-fw"></span></button>
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
        get_truck = 1;
  });

  $('#reports-truck-outport').click(function(){
      $('.active-tab-truck').html('<b>Sea Freight Outport</b>');
        get_truck = 2;
  });

  $('#reports-truck-air').click(function(){
      $('.active-tab-truck').html('<b>Air Freight</b>');
        get_truck = 3;
  });
</script>