
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= site_url('')?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= site_url('/')?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= site_url('admin')?>">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add New Admin</li>
            </ol>
        </nav>

        <!-- Page Content Begins From Here -->
        <div class="row pl-3 pl-sm-2 pr-3 pr-lg-1" style="">

		<?php echo $error;?>
                    
			<?php echo form_open_multipart('admin/addAdminData');?>

			<div class="row">
			<form action="" method="">
				<!-- Block A -->
				<div class="col-12 col-sm-12 col-md-12 col-lg-4 px-2 px-sm-3 px-md-3 px-md-0 mr-lg-3 ">
				
					<div class="form-row">
						<div class="form-group col-md-6">
						<label for="fname">First Name</label>
						<input type="text" class="form-control" id="fname" name="fname" placeholder="John" value="<?php echo set_value('fname'); ?>" required>
						</div>
						<div class="form-group col-md-6">
						<label for="lname">Last Name</label>
						<input type="text" class="form-control" id="lname" name="lname" placeholder="Doe" value="<?php echo set_value('laname'); ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label for="dob">Date of Birth</label>
						<input type="date" class="form-control" id="dob" name="dob" value="<?php echo set_value('dob'); ?>" required>
					</div>
					<div class="form-group">
						<label for="nic">NIC Number</label>
						<input type="text" class="form-control" id="nic" name="nic" value="<?php echo set_value('nic'); ?>" required>
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" class="form-control" id="address" name="address" placeholder="# , Street, Road, City" value="<?php echo set_value('address'); ?>" required>
					</div>
					
					<div class="form-group">
						<label for="mob">Mobile</label>
						<input type="tel" class="form-control" id="mob" name="mob" placeholder="+94 (77) 123 4567" value="<?php echo set_value('mob'); ?>" required>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Johndoe@gmail.com" value="<?php echo set_value('email'); ?>" required>
					</div>
					<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" required>
						</div>
				
				
				</div>

					<!-- Block B -->
					<div class="col-12 col-sm-12 col-md-12 col-lg-4 px-2 px-sm-3 px-md-3 px-md-2 ml-lg-5 mr-lg-5">
						<div class="choose-img form-group">
							<label for="userimage">Select Profile Picture</label>
							<input class="form-control" onchange="readURL(this);" type="file" name="userimage" size="20 " value="<?php echo set_value('userimg'); ?>" required>
						</div>
					

					
						<div class="form-group">
							<label for="joined">Date Joined</label>
							<input type="date" class="form-control" id="joined" name="joined" value="<?php echo set_value('joined'); ?>" required>
						</div>

						<div class="form-row">
							<div class="form-group">
							<label for="designation">Designation</label>
							<select id="designation" name="designation" class="form-control" value="<?php echo set_value('designation'); ?>" required>
								<option selected>Select a Option</option>
								<option>Owener</option>
								<option>Manger</option>
								<option>System Admin</option>
								<option>Co-Owner</option>
								<option>Assistant Manager</option>
							</select>
							</div>
						</div>
						<div class="form-group">
							<label for="remarks">Remarks/Notes</label>
							<textarea class="form-control" id="remarks" name="remarks" rows="8" value="<?php echo set_value('remarks'); ?>"></textarea>
						</div>

						
						<div class="form-group">
							<label for="passwordconf">Confirm Password</label>
							<input type="password" class="form-control" id="passwordconf" name="passwordconf" required>
						</div>
						
						
					
					</div>

					<div class="col-12 col-sm-12 col-md-12 col-lg-2 px- px-sm- px-md- px-md- ml-lg-2" style="">
						<div class="ml-lg-5 mx-auto " style="border: 1px solid black; border-radius: 5px; width: 155px; height: 180px; display: block;">
						
							<img id="userimg" src="<?php echo base_url(); ?>Images_Icons/user.png" alt="Profile Pic" class="rounded-circle mx-auto d-block my-3 p-2" style="width: 150px; height: 150px;">
							<div class="">
								<input class="btn btn-primary btn-lg btn-block my-5" type="submit" value="Save">
						
							</div>
						</div>
						
					
					</div>

				</form>
			
			</div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      