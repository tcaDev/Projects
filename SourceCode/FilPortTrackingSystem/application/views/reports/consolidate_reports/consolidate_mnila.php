<div class="tab-pane active" id="tab_reports_consolidate">		        
    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar" style="margin-top:20%;">
                    <div class="col-md-12">
                      <span style="padding-bottom: 10px;"> <h4> Consolidated Reports : <b class='active-tab-consolidate'> Air Freight </b></h4></span>
                     </div>

                     <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                             <input type="text" class="form-control input-sm" placeholder="PI/PO Number" id="txtPONumber" />
                        </div>
                       <div class="col-md-6">
                               <select class="form-control reports_consignee_consolidate">
                              
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
                          <input placeholder="From :" class="textbox-n form-control" id="dtpTDDFrom_consolidate" type="text" onfocus="(this.type='date')" onchange="(this.type='text')"> 
                        </div>
                        
                      </div>

                      <div class="col-md-5">
                        <div class="">
                          <input placeholder="To :" class="textbox-n form-control" id="dtpTDDTo_consolidate" type="text" onfocus="(this.type='date')" onchange="(this.type='text')"> 
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="row">
                            <span class="input-group-btn">
                              <button class="btn btn-danger col-md-12" type="button" id="btn-consolidate"><span class="fa fa-search fa-fw"></span></button>
                            </span>
                        </div>
                      </div>
                    </div>
                </div>
				   	</div>

        	</div>     		
    	</div>

    	<div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;">
    		<div class="table-consolidate-reports" ></div>
    	</div>
    		
</div>

<script>
   var get_consolidate = 0;

  $('#reports-consolidate-manila').click(function(){
      $('.active-tab-consolidate').html('<b>Sea Freight Manila</b>');
      loadConsigneeNames_consolidate();
      get_consolidate = 1;
  });

  $('#reports-consolidate-outport').click(function(){
      $('.active-tab-consolidate').html('<b>Sea Freight Outport</b>');
      loadConsigneeNames_consolidate();
      get_consolidate = 2;
  });

  $('#reports-consolidate-air').click(function(){
      $('.active-tab-consolidate').html('<b>Air Freight</b>');
      loadConsigneeNames_consolidate();
       get_consolidate = 3;
  });

  function loadConsigneeNames_consolidate(){
      $.ajax({
        url  : "<?php echo base_url('Reports_Running_Charges/getConsigneeNames');?>",
        type : "POST",
        data : {
          userID : con_name
        },
        success : function(suc){
          $('.reports_consignee_consolidate').html(suc);
        }
      });
  }

   $(document).on('click','#btn-consolidate',function(){
      var con_id   = $('.reports_consignee_consolidate option:selected').attr('id');
      var c_name = $('.reports_consignee_consolidate option:selected').text();
      var frm    = $('#dtpTDDFrom_consolidate').val();
      var to     = $('#dtpTDDTo_consolidate').val();
      var po_num = $('#txtPONumber').val();
      if(frm == '' && to == ''){
        $(".table-consolidate-reports").html('<div class="table-consolidate-reports" ></div>');
      }else{
          $.ajax({
            method: "POST",
            url: "<?php echo base_url('Reports_Running_Charges/loadConsolidated');?>",
            beforeSend: function() {
                      $('.table-consolidate-reports').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
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
              $(".table-consolidate-reports").html(data);
              $(".tools-bar").animate({marginTop:'0%'});
        }); 
      }
  });

</script>