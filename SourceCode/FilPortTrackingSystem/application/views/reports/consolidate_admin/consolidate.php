<div class="tab-pane " id="tab_admin_consolidate">		        
    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar col-md-12">
                <div class="col-md-12">
                  <span style="padding-bottom: 10px;"> <h4> Reports-Consolidated : <b class='active-tab-consolidate-admin'> Air Freight </b></h4></span>
                 </div>
				   	  </div>
        	</div>     		

          <div class="col-md-12" style="margin-top: 15px;">
            <div class="row">
                <div class="panel panel-default">
                  <div class="panel-heading">Search :</div>
                  <div class="panel-body">
                   

                     <div class="col-md-6 col-md-offset-3">
                        <div class="col-md-12">
                          <div class="form-group">
                            <h5>Purchase Order No.: </h5>
                              <input type="text" class="form-control input-sm" placeholder="PI/PO Number" id="txtPONumber-admin" />
                          </div>
                        </div>

                        <div class="col-md-12">
                          <h5>Actual Delivery Date : </h5>
                          <div class="form-group">
                            <input type="text" class="form-control input-sm" onfocus="(this.type='date')" placeholder="From :" id="dtpTDDFrom_consolidate-admin"/> 
                          </div>

                          <div class="form-group">
                            <input type="text" class="form-control input-sm" onfocus="(this.type='date')" placeholder="To :" id="dtpTDDTo_consolidate-admin"/> 
                          </div>
                        </div>

                        <div class="col-md-12">
                          <button type="button" class="btn btn-primary btn-sm col-md-12 pull-right" id="btn-consolidate-admin"><span class="fa fa-search fa-fw"></span> Search</button>
                        </div>

                          <div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;height:110px;">
                            <div class="table-consolidate-reports-admin" ></div>
                          </div>
                     </div>
                  </div>
                </div>  
            </div>
          </div>    
    	</div>

</div>


<script>

var get_consolidate = 0;

    $('#admin_consolidate-manila').click(function(){
      $('.active-tab-consolidate-admin').html('<b>Sea Freight Manila</b>');
      get_consolidate = 1;
      $('#txtPONumber-admin').val('');
      $('#dtpTDDFrom_consolidate-admin').val('');
      $('#dtpTDDTo_consolidate-admin').val('');
  });

  $('#admin_consolidate-outport').click(function(){
      $('.active-tab-consolidate-admin').html('<b>Sea Freight Outport</b>');
      get_consolidate = 2;
      $('#txtPONumber-admin').val('');
      $('#dtpTDDFrom_consolidate-admin').val('');
      $('#dtpTDDTo_consolidate-admin').val('');
  });

  $('#admin_consolidate-air').click(function(){
      $('.active-tab-consolidate-admin').html('<b>Air Freight</b>');
       get_consolidate = 3;
       $('#txtPONumber-admin').val('');
      $('#dtpTDDFrom_consolidate-admin').val('');
      $('#dtpTDDTo_consolidate-admin').val('');
  });


   $(document).on('click','#btn-consolidate-admin',function(){
      var frm    = $('#dtpTDDFrom_consolidate-admin').val();
      var to     = $('#dtpTDDTo_consolidate-admin').val();
      var po_num = $('#txtPONumber-admin').val();
      if(frm == '' && to == ''){
       
      }else{
          $.ajax({
            method: "POST",
            url: "<?php echo base_url('Reports_Running_Charges/get_consolidate');?>",
           beforeSend: function() {
              dia = $.dialog({
                    icon: 'fa fa-spinner fa-spin',
                    closeIcon: false,
                    title: 'Please wait!',
                    backgroundDismiss: false,
                    content: 'Currently Searching Your Files',
                });
          },    
            data: { 
              montype   : get_consolidate,
              frm       : frm,
              to        : to,
              poNum     : po_num
            }
        })
          .done(function(data) {
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
              window.open(data);
            }
        }); 
      }
  });
</script>