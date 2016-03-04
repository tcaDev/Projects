<div class="panel panel-primary">
      <div class="panel-heading"><span><?php echo $name; ?> : </span></div>
      <div class="panel-body">

          <div class="col-md-12">
            <ul class="nav nav-tabs">
              <li class="jbfile"><a data-toggle="tab" href="#jobfile-admin" id='jbfl'>Jobfile</a></li>
              <li class="sitesettings"><a data-toggle="tab" href="#sitesettings-admin">Site Settings</a></li>
              <li class="global"><a data-toggle="tab" href="#globalsearch-admin">Global Search</a></li>
              <li class="reports"><a data-toggle="tab" href="#reports-admin">Reports</a></li>
              <li class="audit"><a data-toggle="tab" href="#audit-admin">Audit Trail</a></li>
              <li class="dashboard-access"><a data-toggle="tab" href="#dashboard-admin">Dashboard</a></li>
              <li class="user"><a data-toggle="tab" href="#user-admin">User</a></li>
            </ul>

            <div class="tab-content">
            <!-- JobFile -->
              <div class="tab-pane fade access_admin" id="jobfile-admin">
               	<div class="jobfile-admin"></div>
              </div>
            </div>
          </div>
      </div>
    </div>

<script>
$(document).ready(function(){
	$('#jbfl').trigger('click');

	 $(document).on('click','.access_checkall',function (e) {
	    $(this).closest('table').find('tbody tr td input:checkbox').prop('checked', this.checked);
	});
});
</script>