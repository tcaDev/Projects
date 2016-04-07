
  <div class="panel panel-primary">
      <div class="panel-heading"><span><?php echo $name; ?> : </span></div>
      <div class="panel-body">
           <div class="row">
           <div class="col-lg-12" style="overflow-y:auto;position:relative;">
              <div class="row">
            <table class="tablesorter table-bordered table-condensed " style="width:2400px;">
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
                      <th>Company</th>
                      <th>ContactNo1</th>
                      <th>ContactNo2</th>
                      <th>Address 1</th>
                      <th>Address 2</th>
                      <th>Consignee</th>
                      <th>Consignee 2</th>
                      <th>Consignee 3</th>

                  </tr>
                </thead>      
                <tbody>

       <?php  $i=0;
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
          $addr = $row->Address1;
          $addr2 = $row->Address2;
          $CId = $row->CId;
          $C2Id = $row->C2Id;
          $C3Id = $row->C3Id;
         
          $active= $row->IsActive;
            if($active==1){ 
              $stat = 'activated';
              $mystat = '1';
            }else{
              $stat = 'deactivated';
              $mystat= '0';
            }
          ?>

            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $stat ?></td>
          <?php if($roleuser[1] == '2') {?> 
              <td><button type="button" class="btn btn-default btn-xs btn-update-user-client" data-toggle="modal" href="#myModal_updateUser"><span class="fa fa-pencil fa-fw"></span></button></td>
              <td><button type="button" class="btn btn-default btn-xs btn-reset-pass" data-toggle="modal" href="#myModal_resetPass"><span class="fa fa-refresh fa-fw"></span></button></td> 
          <?php }else{} ?>
              <td><?php echo $uname ?></td>
              <td><?php echo $fname ?></td>
              <td><?php echo $mname ?></td>
              <td><?php echo $lname ?> </td>
              <td><?php echo $email ?></td>
              <td><?php echo $row->Title ?></td>
              <td><?php echo $row->Department ?></td>
              <td><?php echo $contact1 ?></td>
              <td><?php echo $contact2 ?></td>
              <td><?php echo $addr ?></td>
              <td><?php echo $addr2 ?></td>  
              <td><?php echo $row->CName ?></td>
              <td><?php echo $row->C2Name ?></td>
              <td><?php echo $row->C3Name ?></td>
              <td class="hidden"><?php echo $uid; ?></td>
              <td class="hidden"><?php echo $mystat; ?></td> 
              <td class="hidden"><?php echo $CId; ?></td>
              <td class="hidden"><?php echo $C2Id; ?></td>
              <td class="hidden"><?php echo $C3Id; ?></td>
                              
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