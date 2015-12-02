		<!--for autoclick of shipper tab -->

		<script>
		$(document).ready(function(){
       if(location.hash=="#shipper"){
      		  $('#form_shipper').trigger('click');

       }
       if(location.hash=="#broker"){
      		  $('#form_broker').trigger('click');

       }
         if(location.hash=="#vessel"){
      		  $('#form_vessel').trigger('click');

       }
       

         });


		</script>