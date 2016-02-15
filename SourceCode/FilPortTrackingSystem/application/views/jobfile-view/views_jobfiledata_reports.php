  <div class="modal-content" style="width:75%;top:100px;">

    <div class="modal-header" style="background-color: deepskyblue;">

      <button type="button" class="close" data-dismiss="modal">&times;</button>

      <h4 class="modal-title text-uppercase "> <span class='ttle'> </span> Document</h4>

    </div>

    <div class="modal-body">
    <center>
        <?php 
		$element = "
	            <div>
	                <a rel='ligthbox' href='http://placehold.it/300x320.png'>
	                <div style='border:1px solid gray;padding-top:5px;padding-right:5px;'> 
	                    <img alt='' src='http://placehold.it/320x320'/>
	                    <div class='text-right'>
	                        <small class='text-muted'>Report Title</small>
	                    </div> 
	                </div>
	                </a>
	            </div> 
			"; 
		$count = 1;
		for ($i = 0; $i < $count; $i++) {
		    echo $element;
		}
    	?>
    </center>
    </div>
        <div class="modal-footer">
			 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>

  </div>








