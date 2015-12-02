<!DOCTYPE html>
<html lang="en">
<head>	
	<?php $this->load->view('header/header'); ?>
</head>

<body>
	<div class="container container-case">\

	<?php $this->load->view('header/views_header'); ?>

		<div class="con-ship"></div>
		<div class="con-shiptxt">
			 	<div class="pull-right input-group stylish-input-group">
                    <input type="text" class=" form-control"  placeholder="Search" >
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class=" glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </div>

                <div class="con-shiptbl"></div>
                	<table class="table table-striped">
					    <thead>
					      <tr>
					        <th>Consignee</th>
					        <th>Address</th>
					        <th>Update</th>
					        <th>Delete</th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr>
					        <td>John</td>
					        <td>alabang, muntinlupa metro manila</td>
					        <td><button class="btn"><span class="glyphicon glyphicon-edit"></span></button></td>
					        <td><button class="btn"><span class="glyphicon glyphicon-trash"></span></button></td>
					      </tr>
					      <tr>
					        <td>Mary</td>
					        <td>alabang, muntinlupa metro manila</td>
					        <td><button class="btn"><span class="glyphicon glyphicon-edit"></span></button></td>
					        <td><button class="btn"><span class="glyphicon glyphicon-trash"></span></button></td>
					      </tr>
					      <tr>
					        <td>July</td>
					        <td>alabang, muntinlupa metro manila</td>
					        <td><button class="btn"><span class="glyphicon glyphicon-edit"></span></button></td>
					        <td><button class="btn"><span class="glyphicon glyphicon-trash"></span></button></td>
					      </tr>
					      <tr>
					        <td>July</td>
					        <td>alabang, muntinlupa metro manila</td>
					        <td><button class="btn"><span class="glyphicon glyphicon-edit"></span></button></td>
					        <td><button class="btn"><span class="glyphicon glyphicon-trash"></span></button></td>
					      </tr>
					      <tr>
					        <td>July</td>
					        <td>alabang, muntinlupa metro manila</td>
					        <td><button class="btn"><span class="glyphicon glyphicon-edit"></span></button></td>
					        <td><button class="btn"><span class="glyphicon glyphicon-trash"></span></button></td>
					      </tr>      <tr>
					        <td>July</td>
					        <td>alabang, muntinlupa metro manila</td>
					        <td><button class="btn"><span class="glyphicon glyphicon-edit"></span></button></td>
					        <td><button class="btn"><span class="glyphicon glyphicon-trash"></span></button></td>
					      </tr>
					      <tr>
					        <td>July</td>
					        <td>alabang, muntinlupa metro manila</td>
					        <td><button class="btn"><span class="glyphicon glyphicon-edit"></span></button></td>
					        <td><button class="btn"><span class="glyphicon glyphicon-trash"></span></button></td>
					      </tr>
					    </tbody>
					  </table>
                
			</div>
			<div class="con-info">
				<span>CONSIGNEE INFORMATION</span>
			</div>

			<div class="con-infobox"></div>
			<div class="con-infotxt">
				<label>Client Name: Samsung</label>
				<label>Address: alabang, muntinlupa metro manila</label>
				<label>Office Number: 700-5321</label>
				<label>Date Created: 11/11/15</label>
			</div>

			<div class="con-info consig-pos">
			<span>ADD NEW CONSIGNEE</span>
			</div>
			<div class="consig-posbox"></div>
			<div class="consig-formbox">
				<form role="form">
				<div class="row">
		            <div class="form-group col-lg-12">
		            	<label>Client Name</label>
		                <input type="text" class="form-control" placeholder="" />
		            </div>
		        </div>
		        <div class="row">
		            <div class="form-group col-lg-12">
		            	<label>Address</label>
		                <input type="text" class="form-control"  />
		            </div>
		        </div>
		        <div class="row">
		            <div class="form-group col-lg-12">
		            	<label>Office Number</label>
		                <input type="number" class="form-control input-normal"/>
		            </div>
		        </div>
		        <div class="row">
		        	<div class="form-group col-lg-12">
		            	<button type="submit" class="pull-right btn btn-default">Submit</button>
		            </div>	
		        </div>
		    </form>
			</div>	
		</div>
</body>
</html>


