
  
  <div class="panel panel-primary">
      <div class="panel-heading"><span><?php echo $name; ?> : </span></div>
      <div class="panel-body">
           <div class="row">
           <div class="col-lg-12" style="overflow-y:auto;position:relative;">
              <div class="row">
            <table class="tablesorter table-bordered table-condensed " style="width:2000px;">
                <thead>
                  <tr>
                      <th>No.</th>
                      <th>Status</th>
            <?php if($roleuser[1] == '2') {?>  <th data-sorter="false">Update</th>
                      <th data-sorter="false">Reset Password</th> <?php }else{} ?>
                      <th>Username</th>
                      <th>FirstName</th>
                      <th>MiddleName</th>
                      <th>LastName</th>
                      <th>EmailAddress</th>
                      <th>Title</th>
                      <th>Department</th>
                      <th>Contact No 1</th>
                      <th>Contact No 2</th>
                  </tr>
                </thead>      
                <tbody>
     <?php   $i=0;
        foreach ($User_list as $row) {
          $i++;
          $uid = $row->UserId;
          $uname = $row->UserName;
          $fname = $row->FirstName;
          $mname = $row->MiddleName;
          $lname = $row->LastName;
          $email = $row->EmailAddress;
          $contact1 = $row->ContactNo1;
          $contact2 = $row->ContactNo2;
          $title = $row->Title;
          $department = $row->Department;

          $active= $row->IsActive;
            if($active==1){ 
              $stat = 'activated';
              $mystat = '1';
            }else{
              $stat = 'deactivated';
              $mystat= '0';
            }?>

            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $stat ?></td>
              <?php if($roleuser[1] == '2') {?>  <td><button type="button" class="btn btn-default btn-xs btn-update-user" data-toggle="modal" href="#myModal_updateUser"><span class="fa fa-pencil fa-fw"></span></button></td>
              <td><button type="button" class="btn btn-default btn-xs btn-reset-pass" data-toggle="modal" href="#myModal_resetPass"><span class="fa fa-refresh fa-fw"></span></button></td><?php }else{} ?>
              <td><?php echo $uname ?></td>
              <td><?php echo $fname ?></td>
              <td><?php echo $mname ?></td>
              <td><?php echo $lname ?></td>
              <td><?php echo $email ?></td>
              <td><?php echo $title ?></td>
              <td><?php echo $department ?></td>
              <td><?php echo $contact1 ?></td>
              <td><?php echo $contact2 ?></td>
              <td hidden></td>
              <td hidden></td>
              <td hidden></td>
              <td hidden></td>
              <td hidden></td>
              <td hidden><?php echo $uid ?></td>
              <td hidden><?php echo $mystat ?></td>
            </tr>

        <?php } ?>

               </tbody>         
             </table>            
            </div>
          </div>
         </div>
      </div>
    </div>
       

<script src="<?php echo base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js');?>"></script>
<script src="<?php echo base_url('resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js');?>"></script>
<script src="<?php echo base_url('resources/table_sort/dist/js/widgets/widget-scroller.min.js');?>"></script>
<script src="<?php echo base_url('resources/table_sort/tableSort_.js');?>"></script>

