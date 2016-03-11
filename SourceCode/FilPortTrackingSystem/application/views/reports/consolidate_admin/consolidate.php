<div class="tab-pane " id="tab_admin_consolidate">		        
    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar" style="margin-top:20%;">
                    <div class="col-md-12">
                      <span style="padding-bottom: 10px;"> <h4> Consolidated Reports : <b class='active-tab-consolidate-admin'> Air Freight </b></h4></span>
                     </div>

                     <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                             <input type="text" class="form-control input-sm" placeholder="PI/PO Number" id="txtPONumber-admin" />
                        </div>
                       <div class="col-md-6">
                              <select class="form-control input-sm consolidate_consignee">
                              <option disabled selected value="0">Select Consignee</optio>
                                  <?php  foreach($consignee as $row){  ?> 
                                    <option value="<?php echo $row->ConsigneeId ?>">
                                    <?php echo stripslashes($row->ConsigneeName) ?>
                                    </option> 
                                  <?php }?>
                                </select>   <!-- Todo Ajax Call Query to display Data -->
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
                          <input placeholder="From :" class="textbox-n form-control" id="dtpTDDFrom_consolidate-admin" type="text" onfocus="(this.type='date')" onchange="(this.type='text')"> 
                        </div>
                        
                      </div>

                      <div class="col-md-5">
                        <div class="">
                          <input placeholder="To :" class="textbox-n form-control" id="dtpTDDTo_consolidate-admin" type="text" onfocus="(this.type='date')" onchange="(this.type='text')"> 
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="row">
                            <span class="input-group-btn">
                              <button class="btn btn-danger col-md-12" type="button" id="btn-consolidate-admin"><span class="fa fa-search fa-fw"></span></button>
                            </span>
                        </div>
                      </div>
                    </div>
                </div>
				   	</div>

        	</div>     		
    	</div>

    	<div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;">
    		<div class="table-consolidate-reports-admin" ></div>
    	</div>
    		
</div>


<script>

var get_consolidate = 0;

    $('#admin_consolidate-manila').click(function(){
      $('.active-tab-consolidate-admin').html('<b>Sea Freight Manila</b>');
      get_consolidate = 1;
  });

  $('#admin_consolidate-outport').click(function(){
      $('.active-tab-consolidate-admin').html('<b>Sea Freight Outport</b>');
      get_consolidate = 2;
  });

  $('#admin_consolidate-air').click(function(){
      $('.active-tab-consolidate-admin').html('<b>Air Freight</b>');
       get_consolidate = 3;
  });


   $(document).on('click','#btn-consolidate-admin',function(){
      var con_id   = $('.consolidate_consignee').val();
      var c_name = $('.reports_consignee_consolidate option:selected').text();
      var frm    = $('#dtpTDDFrom_consolidate-admin').val();
      var to     = $('#dtpTDDTo_consolidate-admin').val();
      var po_num = $('#txtPONumber-admin').val();
      if(frm == '' && to == ''){
        $(".table-consolidate-reports-admin").html('<div class="table-consolidate-reports" ></div>');
      }else{
          $.ajax({
            method: "POST",
            url: "<?php echo base_url('Reports_Running_Charges/get_consolidate');?>",
            beforeSend: function() {
                      $('.table-consolidate-reports-admin').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
                    },  
            data: { 
              montype   : get_consolidate,
              con_id    : con_id,
              frm       : frm,
              to        : to,
              poNum     : po_num
            }
        })
          .done(function(data) {
              $(".table-consolidate-reports-admin").html(data);
              $(".tools-bar").animate({marginTop:'0%'});
        }); 
      }
  });
</script>