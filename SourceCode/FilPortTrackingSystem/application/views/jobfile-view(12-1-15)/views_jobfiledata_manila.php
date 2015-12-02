
  <div class="modal-content" style="width:180%;right:40%;">

    <div class="modal-header" style="background-color: deepskyblue;">

      <button type="button" class="close" data-dismiss="modal">&times;</button>

      <h4 class="modal-title text-uppercase ">Documents</h4>

    </div>

    <div class="modal-body modal-jobfile">

        <?php 
		$element = "
			<div class='list-group gallery'>
	            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
	                <a class='thumbnail fancybox' rel='ligthbox' href='http://placehold.it/300x320.png'>
	                    <img class='img-responsive' alt='' src='http://placehold.it/320x320' />
	                    <div class='text-right'>
	                        <small class='text-muted'>Report Title</small>
	                    </div> <!-- text-right / end -->
	                </a>
	            </div> <!-- col-6 / end -->
			</div>	"; 

		$count = 20;
		for ($i = 0; $i < $count; $i++) {
		    echo $element;
		}
    	?>

    </div>

  </div>








