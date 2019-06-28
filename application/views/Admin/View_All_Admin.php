
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb px-xs-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= site_url('/')?>">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">View All</li>
            </ol>
        </nav>

        <!-- Page Content Begins From Here -->
        <div class="row pl-3 pl-sm-2 pl-lg-5 pl-md-" style="">

        <?php foreach ($admins as $admin_profile): ?>

           <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4" style="width: 18rem;display:inline-block; height: 300px;">
                <div class="card" style="width: 18rem; height: 300px;">
                    <img src="<?= base_url() . $admin_profile['imageurl']?>" class="card-img-top rounded-circle mx-auto d-block my-3" alt="Admin Profile Picture" style="width: 100px; height: 100px;">
                    
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $admin_profile['designation'] ;?></h5>
                        <p class="card-text text-center"><?= $admin_profile['firstname'] . " " .$admin_profile['lastname'] ;?></p>
                        <hr class="sidebar-divider">
						<a href="<?php echo site_url('Admin/viewProfile/'.$admin_profile['id']); ?>" class="btn btn-primary mr-0">Visit Profile</a>
						<!-- <div class="" style="display: inline-block; width: 20px; background-color: blue;"></div> -->
						<div class="" style="display: inline-block; width: 54%;">
							<a href="<?php echo site_url('Admin/deleteAdmin/'.$admin_profile['id']); ?>" onclick="return confirm('Are Your Sure?')" class="justify-content-end" style="margin-left: 105px;"><span class="my-auto py-auto ml-0" style="font-size: 20px; color: red;"><i class="fas fa-trash-alt fa-lg fa-fw mr-2"></i></span></a>

						</div>

                    </div>
                </div>
           </div>

        <?php endforeach; ?>   
            
        
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      