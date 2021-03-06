<!DOCTYPE html>

<html lang="en">

<head>	

	<?php $this->load->view('header/header'); ?>

	<style type="text/css">
	 th{

	 	text-align:center !important;
	 	padding-top:2px;
	 }

	
#scroller {
    width: 400px;
    overflow-x: scroll;
}
#scroller table {
    /* just a quick hack to make the table overflow the containing div
       your method may differ */
    width: 600px;
}

#scroller .table.fixedCol {
    width: 300px;
    position: absolute;
    /* below styles are specific for borderd Bootstrap tables
       to remove rounded corners on cloned table */
    -webkit-border-top-right-radius: 0px;
    -webkit-border-bottom-right-radius: 0px;
       -moz-border-radius-topright: 0px;
       -moz-border-radius-bottomright: 0px;
            border-top-right-radius: 0px;
            border-bottom-right-radius: 0px;
}
.table.fixedCol th,
.table.fixedCol td {
    /* background is set to white to hide underlaying column
       of original table */
    background: #fff;
}

	</style>

</head>



<body>

	<div class="container-case">

	<!-- Header -->

		<?php $this->load->view('header/views_header'); ?>

	<!-- End HEader -->



	<!-- Tabs -->

		<div class="container-tab" id="tabs">

		  <ul class="nav nav-tabs">

		    <li id="manila" class="active"><a role="button">MANILA</a></li>

		    <li id="outport"><a role="button">OUTPORT</a></li>

		    <li id="air"><a role="button">AIR</a></li>

		  </ul>



		  	<!-- Manila -->

		  <div class="table-mnla table-content">

		  	<?php $this->load->view('jobfile-view/views_jobfile_manila'); ?>

		  </div>

		

		  	<!-- Outport -->

		  <div class="hidden table-outport col-lg-12 col-md-12 col-sm-12 table-content">

		  	<?php $this->load->view('jobfile-view/views_jobfile_outport'); ?>

		  </div>



		  	<!-- Air -->

		  <div class="hidden table-air col-lg-12 col-md-12 col-sm-12 table-content">

		  	<?php $this->load->view('jobfile-view/views_jobfile_air'); ?>

		  </div>



			<!-- Legend -->

			<div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom:10px; ">

				<?php $this->load->view('footer/legend'); ?>

			</div>

			<!-- End Legend -->

		</div>









	<script>

	$(document).ready(function(){

		$("#manila").on('click',function(){

			$(".table-outport").addClass('hidden');

			$(".table-air").addClass('hidden');

			$(".table-mnla").removeClass('hidden');

			$("#manila").addClass('active');

			$("#outport").removeClass('active');

			$("#air").removeClass('active');



		});



		$("#outport").on('click',function(){



			$(".table-outport").removeClass('hidden');

			$(".table-air").addClass('hidden');

			$(".table-mnla").addClass('hidden');

			$("#manila").removeClass('active');

			$("#outport").addClass('active');

			$("#air").removeClass('active');

		});



		$("#air").on('click',function(){

			$(".table-outport").addClass('hidden');

			$(".table-air").removeClass('hidden');

			$(".table-mnla").addClass('hidden');

			$("#manila").removeClass('active');

			$("#outport").removeClass('active');

			$("#air").addClass('active');

		});

	});



	</script>

</body>

</html>