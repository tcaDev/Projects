 <!-- 	<meta charset="utf-8">

	<title>FilPort</title>
	<link rel="stylesheet" href="<?php //echo base_url('resources/my/bootstrap.min.css');?>" >
	<?php //echo link_tag('resources/css/style.css') ?>
	<script src="<?php //echo base_url('resources//my/jquery.js');?>"></script>
    <script src="<?php //echo base_url('resources/my/bootstrap.min.js');?>"></script>
 -->
 

<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">
	<title>Filport</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/jquery_confirm/css/jquery-confirm.css');?>" />
	<?php echo link_tag('resources/css/style.css') ?>
	<?php echo link_tag('resources/css/dropdowns-enhancement.css') ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url('resources/jquery_confirm/js/jquery-confirm.js'); ?>"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 
	<script type="text/javascript" src="<?php echo base_url('resources/js/dropdowns-enhancement.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('resources/js/bootpag.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('resources/js/print.js'); ?>"></script>
	
</head>
	<div class="container container-case">

	<!-- Header -->
		<!-- Home Button-->
		<div class="col-lg-2 col-md-2 col-sm-2 pull-right home-btn">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 btn btn-info">
						<span><i class="fa fa-home fa-lg"></i> Home</span>
					</div>
				</div>
		</div>
		<!-- End Home Button -->

		<!-- Header -->
			<div class="col-lg-12 col-md-12 col-sm-12" style="top:-34px;">
				<div class="row">
				<!-- Logo -->
					<div class="col-lg-1 col-md-1 col-sm-1 user-img">
						<?php echo img('resources/img/logo.png'); ?> 
					</div>
				<!-- end Logo -->

				<!-- Title -->

					<div class="col-lg-6 col-md-6 col-sm-6" style="padding-top: 20px; color : #FFF; text-shadow:3px 3px 0 #000,-1px -1px 0 #000,  1px -1px 0 #000,-1px  1px 0 #000,1px  1px 0 #000;">

						<h3 class="text-uppercase filport" style="font-weight: 600;font-size: 20px;cursor:pointer;">Fil-Port Express brokerage , inc.</h3>

						<h5 class="text-uppercase" style="font-weight: 600;"><?php echo $tab ?></h5>
						
					</div>
				<!-- end Title -->
				<!-- User -->
					<div class="col-lg-4 col-md-4 col-sm-4 pull-right" style="padding-top: 30px;">
						<div class="row">
							<div class=" img-user pull-right">
								<img class="img-responsive" src="<?php echo base_url('upload/user/'.$img)?>" />	
							</div> 

							<div class="pull-right" style="padding: 10px; color : #FFF;">
								 <div class="btn-group" >
									<!-- Username -->
									  <a class="btn btn-primary" href="<?= base_url('Login_user/account') ?>" style="background-color: rgba(0,0,0,0.0); border-color :rgba(0,0,0,0.0); text-align:right;">
									  	<i class="fa fa-user fa-fw"></i><?php echo " ".$fname." ".$lname."";?><br>
									  	<span class="pull-right" style = "font-family:Century Gothic;font-size:14px;">		
									  <b>	  
									  	      <?php foreach($roleName as $row){
									  			/*echo $row->ConsigneeName_1 . '<br>';
									  			echo $row->ConsigneeName_2 . '<br>';
									  			echo $row->ConsigneeName_3 . '<br>';*/
									  			echo $row->MyRole . '<br>';
									  		  }?>
									  </b>
								</span>
									  </a>
									<!-- End Username -->
									  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#" style="background-color: rgba(0,0,0,0.0); border-color :rgba(0,0,0,0.0); ">
									    <span class="fa fa-caret-down"></span></a>
									  <ul class="dropdown-menu bullet pull-right">
									  	<?php if($role->RoleId == "1"){?>
									    <li><a data-toggle="modal" href="#myModal_addUser"><i class="fa fa-user fa-fw"></i> Create User</a></li>
									    <?php }else{}?>
									    <li><a href="<?= base_url('Login_user/account') ?>"><i class="fa fa-cogs fa-fw"></i> Account Setting</a></li>
									    <li class="divider"></li>
									    <li><a href="<?= base_url('Login_user/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
									  </ul>
								</div>
							</div>
						</div>
					</div>
				<!-- end USer -->
				</div>
			</div>
	<!-- End Header -->



<!-- Modal -->
<div id="myModal_addUser" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    
    <?php $this->load->view('register/register_user'); ?>
    
  </div>
</div>

<!-- Modal -->
<div id="myModal_updateUser" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    
    <?php $this->load->view('register/update_user'); ?>
    
  </div>
</div>


<!-- Modal -->
<div id="myModal_resetPass" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    
    <?php $this->load->view('register/reset_pass'); ?>
    
  </div>
</div>
	<script>

	 $(document).ready(function(){
	 	$('.home-btn').click(function(){
	 		window.location.href="<?php echo base_url('Login_user/menu/');?>";
	 	});
	
	 	$('.img-user').click(function(){
	 		window.location.href="<?php echo base_url('Login_user/account/');?>";
	 	});

	 	$('.user-img').click(function(){
	 		window.location.href="<?php echo base_url('Login_user/menu/');?>";
	 	});

	 	$('.filport').click(function(){
	 		window.location.href="<?php echo base_url('Login_user/menu/');?>";
	 	});
	 	// var searchString = $('#txtGlobalSearch').val();
	 	// if(searchString == "" || searchString == null){
	 	// 	disable_filter();
	 	// }else{
	 	// 	enable_filter();
	 	// }
	 });
	</script>


  <script>
     /* var link = 'http://localhost/FilPortTrackingSystem';*/
    var link = "<?php echo base_url();?>";
      
  </script>


  <script>
      // Opera 8.0+
var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
    // Firefox 1.0+
var isFirefox = typeof InstallTrigger !== 'undefined';
    // At least Safari 3+: "[object HTMLElementConstructor]"
var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
    // Internet Explorer 6-11
var isIE = /*@cc_on!@*/false || !!document.documentMode;
    // Edge 20+
var isEdge = !isIE && !!window.StyleMedia;
    // Chrome 1+
var isChrome = !!window.chrome && !!window.chrome.webstore;
    // Blink engine detection
var isBlink = (isChrome || isOpera) && !!window.CSS;

var output = 'Detecting browsers by ducktyping:<hr>';
output += 'isFirefox: ' + isFirefox + '<br>';
output += 'isChrome: ' + isChrome + '<br>';
output += 'isSafari: ' + isSafari + '<br>';
output += 'isOpera: ' + isOpera + '<br>';
output += 'isIE: ' + isIE + '<br>';
output += 'isEdge: ' + isEdge + '<br>';
output += 'isBlink: ' + isBlink + '<br>';

if(!isChrome){

	  						$.alert({
	  							backgroundDismiss: false, 	
				        		title: 'Warning!',
				        		content: 'We Recommend you to use Google Chrome for system compatibility',
				        		confirm: function(){
				        	    }
				   			 });
}
  </script>



