
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= site_url('')?>">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= site_url('admin')?>">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>

        <!-- Page Content Begins From Here -->
        <div class="row pl-3 pl-sm-2 pr-3 ml-lg-1 mx-auto" style="">

			<div class="col-12 col-sm-12 col-md-12 col-lg-4 mx-auto" style="">
			<?php echo form_open_multipart('admin/editAdmin/' . $admin['id']);?>
                    <form>
				
				<div class="form-group">
					<label for="empId">Employee ID</label>
					<input type="text" class="form-control" id="empId" name="empId" value="<?= $admin['id'];?>" readonly>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
					<label for="fname">First Name</label>
					<input type="text" class="form-control" id="fname" name="fname" placeholder="John" value="<?= $admin['firstname'];?>" required>
					</div>
					<div class="form-group col-md-6">
					<label for="lname">Last Name</label>
					<input type="text" class="form-control" id="lname" name="lname" placeholder="Doe" value="<?= $admin['lastname'];?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="dob">Date of Birth</label>
					<input type="date" class="form-control" id="dob" name="dob" value="<?= $admin['dob']?>" required>
				</div>
				<div class="form-group">
					<label for="nic">NIC Number</label>
					<input type="text" class="form-control" id="nic" name="nic" value="<?= $admin['nic'];?>" required>
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" class="form-control" id="address" name="address" placeholder="# , Street, Road, City" value="<?= $admin['address'];?>" required>
				</div>
				
				<div class="form-group">
					<label for="mob">Mobile</label>
					<input type="tel" class="form-control" id="mob" name="mob" placeholder="+94 (77) 123 4567" value="<?= $admin['mobile'];?>" required>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Johndoe@gmail.com" value="<?= $admin['email'];?>" required>
				</div>	
		</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-4 mx-lg-4" style="">
			<div class="choose-img form-group">
				<label for="userimage">Select Profile Picture</label>
				<input class="form-control" onchange="readURL(this);" type="file" name="userimage" size="20 " value="<?php echo set_value('userimg'); ?>" >
			</div>
			<div class="form-group">
				<label for="joined">Date Joined</label>
				<input type="date" class="form-control" id="joined" name="joined" value="<?= $admin['joined'];?>" required>
			</div>

				<div class="form-row">
				<div class="form-group">
					<label for="designation">Designation</label>
					<select id="designation" name="designation" class="form-control">
                                    <?php
                                        if($admin['designation'] == "Owner"){
                                            echo "
                                            
                                                <option selected>Owener</option>
                                                <option>Manager</option>
                                                <option>System Admin</option>
                                                <option>Co-Owner</option>
                                                <option>Assistant Manager</option>
                                            
                                            ";
                                        }
                                        else if($admin['designation'] == "Manager"){
                                            echo "
                                            
                                                <option>Owner</option>
                                                <option selected>Manager</option>
                                                <option>System Admin</option>
                                                <option>Co-Owner</option>
                                                <option>Assistant Manager</option>
                                            
                                            ";


                                        }
                                        else if($admin['designation'] == "System Admin"){
                                            echo "
                                            
                                                <option>Owner</option>
                                                <option>Manager</option>
                                                <option selected>System Admin</option>
                                                <option>Co-Owner</option>
                                                <option>Assistant Manager</option>
                                            
                                            ";


                                        }
                                        else if($admin['designation'] == "Assistant Manager"){
                                            echo "
                                            
                                                <option>Owner</option>
                                                <option>Manager</option>
                                                <option>System Admin</option>
                                                <option>Co-Owner</option>
                                                <option selected>Assistant Manager</option>
                                            
                                            ";


                                        }
                                        else if($admin['designation'] == "Co-Owner"){
                                            echo "
                                            
                                                <option>Owner</option>
                                                <option>Manager</option>
                                                <option>System Admin</option>
                                                <option selected>Co-Owner</option>
                                                <option>Assistant Manager</option>
                                            
                                            ";


                                        }
                                        else {
                                            echo "
                                                <option selected>Select a Option</option>
                                                <option>Owner</option>
                                                <option>Manager</option>
                                                <option>System Admin</option>
                                                <option>Co-Owner</option>
                                                <option>Assistant Manager</option>
                                            
                                            ";


                                        } 
                                    
                                    ?>
									</select>
				</div>
					
				</div>
				<div class="form-group">
					<label for="remarks">Remarks/Notes</label>
					<textarea class="form-control" id="remarks" name="remarks" rows="8" value="<?php echo set_value('remarks'); ?>" ><?= $admin['remarks'];?></textarea>
				</div>		
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-3 " style="">
				<div class="mx-auto " style="border: 1px solid black; border-radius: 5px; width: 155px; height: 180px; display: block;">
								
					<img id="userimg" src="<?= base_url() . $admin['imageurl']; ?>" alt="Profile Pic" class="rounded-circle mx-auto d-block my-3 p-2" style="width: 150px; height: 150px;">
					<div>
					<input class="btn btn-primary btn-lg btn-block my-5" type="submit" value="Save Changes">
						<!-- <a href="<?= site_url('Admin/editProfile/'.$admin['id']); ?>" style="text-decoration: none;"><button class="btn btn-primary btn-lg btn-block my-5">Edit</button></a> -->
					</div>
				</div>
			</form>			
			</div>
				
		
      
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      