<div class="tab-pane active" id="tab_site_settings">		        
    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar">
              <div class="col-md-6">
                         <span style="padding-bottom: 10px;"> <h4> Site Setting Audit Trail : <b class='active-tab'> Air Freight </b></h4></span>
                        </div>
                      <div class="input-group col-md-6">
                             <input type="text" class="form-control light-table-filter" data-table="order-table-site-settings" id="txt-audit-trail" placeholder='Search...'>
                        <span class="input-group-btn">
                           <button class="btn btn-danger" id="btn-site-setings" type="button"><span class="fa fa-search fa-fw"></span></button>
                        </span>
              </div>
				 	</div>
        		
        	</div>     		
    	</div>

    	<div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;">
    		<div class="table-site-settings" ></div>
    	</div>
    		
</div>


<!-- Modal -->
  <div class="modal fade" id="audit-settings" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width:180%;right:40%;padding: 10px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Audit Trail - Site Settings</h4>
        </div>
        <div class="modal-body">
                <div class="data-table-settings"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="audit-contact" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width:140%;right:20%;padding: 10px;top: 100px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Audit Trail - Contacts</h4>
        </div>
        <div class="modal-body">
                    <div class="data-table-contact"></div>    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<!-- Get Data from Consignee -->

<script>



var get_settings = 0;
     $('#audit-consignee').click(function(){
        $('.active-tab').html('<b> Consignee</b>');
        get_settings = 1;
        site_settings_get_data(get_settings);

     });

     $('#audit-broker').click(function(){
        $('.active-tab').html('<b> Broker</b>');
        get_settings = 2;
        site_settings_get_data(get_settings);
     });

     $('#audit-shipper').click(function(){
        $('.active-tab').html('<b> Shipper</b>');
        get_settings = 3;
        site_settings_get_data(get_settings);
     });

     $('#audit-shipping').click(function(){
        $('.active-tab').html('<b> Shipping Line / Carrier</b>');
        get_settings = 4;
        site_settings_get_data(get_settings);
     });

     $('#audit-hauler').click(function(){
        $('.active-tab').html('<b> Hauler / Trucker</b>');
        get_settings = 5;
        site_settings_get_data(get_settings);
     });

     $('#audit-commodity').click(function(){
        $('.active-tab').html('<b> Commodity</b>');
        get_settings = 6;
        site_settings_get_data(get_settings);
     });

     $('#audit-legend').click(function(){
        $('.active-tab').html('<b> Legend</b>');
        get_settings = 7;
        site_settings_get_data(get_settings);
     });



function site_settings_get_data(get_settings){
      $.ajax({
            method: "POST",
              url: "<?php echo base_url('Audit/get_settings_data');?>",
              beforeSend: function() {
                      $('.table-site-settings').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
                    },  
            data: { get_settings:get_settings,
            }
        })
        .done(function(data) {
                $(".table-site-settings").html(data);
        });
}


function site_settings_get_data_history(get_settings,ids){
      $.ajax({
            method: "POST",
              url: "<?php echo base_url('Audit_History/get_settings_data_history');?>",
              beforeSend: function() {
                      $('.data-table-settings').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
                    },  
            data: { get_settings:get_settings,
                    ids: ids,
            }
        })
        .done(function(data) {
                $(".data-table-settings").html(data);
        });
}

function site_settings_contacts(ids,get_settings){
      $.ajax({
            method: "POST",
              url: "<?php echo base_url('Audit_Contacts/get_settings_contacts');?>",
              beforeSend: function() {
                      $('.data-table-contact').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
                    },  
            data: { ids: ids,
                    get_settings:get_settings,
            }
        })
        .done(function(data) {
                $(".data-table-contact").html(data);
        });
}

var ids;

$(document).on('dblclick','.rowTable-settings',function(){

     ids = $(this).closest('tr').children('td:eq(1)').text(); 

     site_settings_get_data_history(get_settings,ids);

    $('#audit-settings').modal('show');

});

$(document).on('dblclick','.row_contacts',function(){

     ids = $(this).closest('tr').children('td:eq(1)').text(); 

     site_settings_contacts(ids,get_settings);

    $('#audit-contact').modal('show');
});

</script>