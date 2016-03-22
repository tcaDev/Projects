<div class="modal-content" style="width:180%;right:40%;padding: 10px;">
      <div class="modal-header" style="background-color:#eee">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User Account</h4>
      </div>

      <div class="modal-body">
        <div class="container-fluid">

          <ul class="nav nav-pills">
           <?php if($roleuser[0] == '1') {?> <li class="active "><a class="add_User" data-toggle="pill" href="#addForm">Add User Account Form</a></li> 
            <li><a class="get_list" data-toggle="pill" href="#listUser">List of User Account</a></li> <?php }else{?> <li class="active"><a class="get_list" data-toggle="pill" href="#listUser">List of User Account</a></li><?php } ?>
            <li><a class="get_userAccess" data-toggle="pill" href="#userRole">User Access Role</a></li>
          </ul>


              <div class="tab-content">
                       <?php if($roleuser[0] == '1') {?> 
                       <!-- Add Form -->
                            <div id="addForm" class="tab-pane fade in active">
                              <div class="col-lg-12">
                              
                                    <h4>Type Of User :</h4>
                                    <!--  <label class="radio-inline"><input type="radio" value="5" name="optradio" class="filport-user" checked="checked" style="transform: scale(1.5);">Filport User</label>
                                     <label class="radio-inline"><input type="radio" value="2" name="optradio" class="client" style="transform: scale(1.5);">Client User</label>
                                    <label class="radio-inline"><input type="radio" value="1" name="optradio" class="filport-user" style="transform: scale(1.5);">Administrator User</label> -->

                                    <div class="col-md-6">
                                      <select class="form-control user_type">

                                      </select>
                                    </div>

                                <div class=" col-md-12">     
                                    <hr>
                                </div>
                            </div>

                              <!-- Information -->
                                    <div class="col-lg-6" style="border-right : 1px solid #ddd;">
                                          
                                          <div class="form-group">
                                              <input type="text" name='fname' placeholder="First Name" class="form-control" data-toggle="tooltip" data-placement="left" title="First Name" required >
                                          </div>

                                          <div class="form-group">
                                                <input type="text" name='mname' placeholder="Middle Name" class="form-control" data-toggle="tooltip" data-placement="left" title="Middle Name" required>
                                          </div>

                                          <div class="form-group ">
                                                <input type="text" name="lname"  placeholder="Last Name" class="form-control"  data-toggle="tooltip" data-placement="left" title="Last Name" required >
                                          </div>

                                          <div class="form-group">
                                            <input type="text" name="title" placeholder="Title" class="form-control" data-toggle="tooltip" data-placement="left" title="Title" required >
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="department" placeholder="Department" title="Department" class="form-control department" data-toggle="tooltip" data-placement="left"  required >
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="addr" placeholder="Address 1" class="form-control hidden addr" data-toggle="tooltip" data-placement="left" title="Address 1" required >
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="addr2" placeholder="Address 2" class="form-control hidden addr2" data-toggle="tooltip" data-placement="left" title="Address 2" required >
                                        </div>

                                          <div class="form-group">
                                             <input type="text" name="contact1"  placeholder="Contact Number 1" class="form-control" min="7" max="11" data-toggle="tooltip" data-placement="left" title="Contact Number 1" required >
                                          </div>

                                          <div class="form-group">
                                             <input type="text" name="contact2"  placeholder="Contact Number 2" class="form-control" min="7" max="11" data-toggle="tooltip" data-placement="left" title="Contact Number 2" >
                                          </div>
                                    </div>


                                    <!-- UserName and Password -->
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <select name="consignee" class="form-control hidden consignee_add_user" data-toggle="tooltip" data-placement="left" title="Consignee">
                                              <?php 
                                                echo "<option value='0' selected='selected'>Select your Consignee</option>";
                                                foreach($consignee as $row)
                                                 echo "<option value=".$row->ConsigneeId."> ".$row->ConsigneeName."</option>"; 
                                              ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <select name="consignee2" class="form-control hidden consignee_add_user2" data-toggle="tooltip" data-placement="left" title="Consignee 2">
                                              <?php 
                                                echo "<option value='0' selected='selected'>Select your Consignee</option>";
                                                foreach($consignee as $row)
                                                 echo "<option value=".$row->ConsigneeId."> ".$row->ConsigneeName."</option>"; 
                                              ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <select name="consignee3" class="form-control hidden consignee_add_user3" data-toggle="tooltip" data-placement="left" title="Consignee 3">
                                              <?php 
                                                echo "<option value='0' selected='selected'>Select your Consignee</option>";
                                                foreach($consignee as $row)
                                                 echo "<option value=".$row->ConsigneeId."> ".$row->ConsigneeName."</option>"; 
                                              ?>
                                            </select>
                                        </div>

                                        <div class="form-group"><span id="check_uname"></span>
                                            <input type="text" name='uname' placeholder="Username" class="form-control" data-toggle="tooltip" data-placement="left" title="Username" required onkeyup="uname_check(this.value)">
                                        </div>

                                         <div class="form-group "><span id="check_email"></span>
                                             <input type="email" name="email" placeholder="Email" class="form-control"  data-toggle="tooltip" data-placement="left" title="Email Address" required onkeyup="email_check(this.value)">
                                        </div>

                                        <div class="form-group ">
                                             <input type="password" name="password"  placeholder="Password" id="pass" class="form-control" data-toggle="tooltip" data-placement="left" title="Password" required>
                                        </div>

                                        <div class="form-group">
                                             <input type="password" name="passconf" placeholder="Confirm Password" id="conpass" class="form-control"  data-toggle="tooltip" data-placement="left" title="Re-type Password" required>
                                             <span id='message'></span>
                                             
                                        </div>

                                        <i id='message_user'></i><br>
                                        <i style="color:red" id='message_user_email'></i>

                                        <hr>
                                            <div class="col-md-6 pull-right">                                            
                                              <button type="button" class="btn btn-primary btn-Save-AddUser  btn-block"><span class="fa fa-plus fa-fw"></span> Add User</button>
                                            </div>
                                    </div>
                            </div>
                           

                            <!-- List of User Account -->

                            <div id="listUser" class="tab-pane fade">
                              <div class="col-md-12">
                                    <h4>Type Of User :</h4>
                                      <div class="col-md-6">
                                        <select class="form-control user_type view_List">
                                        </select>
                                      </div>

                                      <div class=" col-md-12">     
                                          <hr>
                                      </div>

                                        <div id="list-user" class="tab-pane fade in active">
                                          <div class="col-md-12">
                                            <div class="list_users"></div>
                                           <!--  <?php //$this->load->view('register/access/admin'); ?> -->
                                          </div>
                                        </div>

                                  </div>
                              </div>
                               <?php }else{ ?>   

                               <!-- List of User Account -->
                            <div id="listUser" class="tab-pane fade in active">
                              <div class="col-md-12">
                                    <h4>Type Of User :</h4>
                                      <div class="col-md-6">
                                        <select class="form-control user_type view_List">
                                        </select>
                                      </div>

                                      <div class=" col-md-12">     
                                          <hr>
                                      </div>

                                        <div id="list-user" class="tab-pane fade in active">
                                          <div class="col-md-12">
                                            <div class="list_users"></div>
                                           <!--  <?php //$this->load->view('register/access/admin'); ?> -->
                                          </div>
                                        </div>
                                  </div>
                              </div> <?php } ?>

                              <!-- User Access Role -->
                                <div id="userRole" class="tab-pane fade"> 
                                  <div class="col-md-12">

                                    <h4>Type Of User :</h4>
                                      <div class="col-md-6">
                                        <select class="form-control user_type view_Roles">
                                        </select>
                                      </div>
                                      <div class="col-md-6 ">
                                          <div class="row ">
                                              <a type="button" class="btn btn-primary pull-right create_roles"><span class="fa fa-plus fa-fw"></span> Create Role</a>
                                          </div>
                                      </div>
                                      <div class=" col-md-12">     
                                          <hr>
                                      </div>

                                        <div id="admin" class="tab-pane fade in active">
                                          <div class="col-md-12">
                                            <div class="access_roles"></div>
                                           <!--  <?php //$this->load->view('register/access/admin'); ?> -->
                                          </div>
                                        </div>

                                  </div>
                                </div>



                            <!-- End List Form -->          
              </div>

     
        </div>
      </div>

      <div class="footer-modal">
        <hr>
      
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

<script type="text/javascript" src="<?php echo base_url('resources/js/register_User.js'); ?>"></script> <!-- For Register User And Other Call Functions -->
<script type="text/javascript" src="<?php echo base_url('resources/js/roles_functions.js'); ?>"></script> <!-- For Functions Access Role -->
<script type="text/javascript" src="<?php echo base_url('resources/js/role.js'); ?>"></script> <!-- For Creating New Role -->
