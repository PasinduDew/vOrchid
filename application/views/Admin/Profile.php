
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= site_url('admin')?>">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>

        <!-- Page Content Begins From Here -->
        <div class="row pl-3 pl-sm-2 pr-3 ml-lg-1 mx-auto" style="">

			<div class="col-12 col-sm-12 col-md-12 col-lg-4 mx-auto" style="">

				<div class="form-row">
					<div class="form-group col-md-6">
					<label for="fname">First Name</label>
					<input type="text" class="form-control" id="fname" name="fname" placeholder="John" value="<?= $admin['firstname'];?>" readonly>
					</div>
					<div class="form-group col-md-6">
					<label for="lname">Last Name</label>
					<input type="text" class="form-control" id="lname" name="lname" placeholder="Doe" value="<?= $admin['lastname'];?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label for="dob">Date of Birth</label>
					<input type="date" class="form-control" id="dob" name="dob" value="<?= $admin['dob'];?>" readonly>
				</div>
				<div class="form-group">
					<label for="nic">NIC Number</label>
					<input type="text" class="form-control" id="nic" name="nic" value="<?= $admin['nic'];?>" readonly>
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" class="form-control" id="address" name="address" placeholder="# , Street, Road, City" value="<?= $admin['address'];?>" readonly>
				</div>
				
				<div class="form-group">
					<label for="mob">Mobile</label>
					<input type="tel" class="form-control" id="mob" name="mob" placeholder="+94 (77) 123 4567" value="<?= $admin['mobile'];?>" readonly>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Johndoe@gmail.com" value="<?= $admin['email'];?>" readonly>
				</div>	
		</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-4 mx-lg-4" style="">
			<div class="form-group">
				<label for="joined">Date Joined</label>
				<input type="date" class="form-control" id="joined" name="joined" value="<?= $admin['joined'];?>" readonly>
			</div>

				<div class="form-row">
				<div class="form-group">
					<label for="joined">Designation</label>
					<input type="text" class="form-control" id="joined" name="joined" value="<?= $admin['designation'];?>" readonly>
				</div>
					
				</div>
				<div class="form-group">
					<label for="remarks">Remarks/Notes</label>
					<textarea class="form-control" id="remarks" name="remarks" rows="8" value="<?php echo set_value('remarks'); ?>" readonly><?= $admin['remarks'];?></textarea>
				</div>		
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-3 " style="">
				<div class="mx-auto " style="border: 1px solid black; border-radius: 5px; width: 155px; height: 180px; display: block;">
								
					<img id="userimg" src="<?= base_url() . $admin['imageurl']; ?>" alt="Profile Pic" class="rounded-circle mx-auto d-block my-3 p-2" style="width: 150px; height: 150px;">
					<div>
						
						<a href="<?= site_url('Admin/editProfile/'.$admin['id']); ?>" style="text-decoration: none;"><button class="btn btn-primary btn-lg btn-block my-5">Edit</button></a>
					</div>
				</div>
						
			</div>
				
		
      
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      