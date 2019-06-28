
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb px-xs-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= site_url('/')?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Dashboard</a></li>
                <!-- <li class="breadcrumb-item " aria-current="page">View All</li> -->
            </ol>
        </nav>

        <!-- Page Content Begins From Here -->
        <div class="row pl-3 pl-sm-2  pl-md-" style="">

		<div class="container">

		<div class="dash-row py-lg-2 px-lg-0 mb-lg-4">

			<div class="card mr-lg-2" style="width: 18rem; background-color: #2196F3; color: #FFFFFFFF;">
			<h5 class="card-title ml-3 mt-3 mr-3">Pending Orders</h5>
				<div class="card-body">
					<h2 class=""><?= $nPendingOrders?></h2>
					<a href="" class="btn btn-primary"> View Orders</a>
				</div>
			</div>

			<div class="card mx-lg-2" style="width: 18rem; background-color: #F44336; color: #FFFFFFFF;">
			<h5 class="card-title m-3">New Messages</h5>
				<div class="card-body">
				<h2 class=""><?= $nNewMessages?></h2>
				<a href="" class="btn btn-primary"> View Messages</a>
				</div>
			</div>

			<div class="card mx-lg-2" style="width: 18rem; background-color: #4CAF50; color: #FFFFFFFF;">
			<h5 class="card-title m-3">Wholesalers</h5>
				<div class="card-body">
				<h2 class=""><?= $nWholesalers?></h2>
				<a href="" class="btn btn-primary"> View Details</a>
				</div>
			</div>

			<div class="card ml-lg-2" style="width: 18rem; background-color: #3F51B5; color: #FFFFFFFF;">
			<h5 class="card-title m-3">Sales Today</h5>
				<div class="card-body">
				<h2 class=""><?= $nSales?></h2>
				<a href="" class="btn btn-primary"> View Sales</a>
				</div>
			</div>
		</div>
		
		<div class="card">
			<div class="card-body">
			<h5 class="card-title">No of Sales Against the Month</h5>
    		<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
			<div><span></span></div>
			<div id="graph1"></div>
			</div>
		</div>


		<div class="dash-row">
			<div class="card mt-lg-4 col-lg-6 p-lg-3">
				<div class="card-body">
				<h5 class="card-title">Product Wheel</h5>
				<h6 class="card-subtitle mb-2 text-muted">Demand</h6>
				<div><span></span></div>
				<div id="graph2"></div>
				</div>
			</div>

			<div class="card mt-lg-4 col-lg-6 p-lg-3">
				<div class="card-body">
				<h5 class="card-title">Income</h5>
				<h6 class="card-subtitle mb-2 text-muted">Total Income</h6>
				<div><span></span></div>
				<div id="graph3"></div>
				</div>
			</div>
		</div>
		</div>

		

		
           
            
        
        </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer Part -->



</div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

	<!-- Footer -->
<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url()?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url()?>js/chart/raphael-min.js"></script>
  <script src="<?= base_url()?>js/chart/morris.min.js"></script>

  <!-- Charts -->

  <script>

  function data(){
	var test = JSON.parse('<?= $graph_product_sales?>');

	for(let i = 0; i < test.length; i++){
		test[i].value = parseFloat(test[i].value) % 100;
		
		// console.log("Test  " + JSON.stringify(test[i]));
	}

	return test;
  }
  
  console.log(data());
	Morris.Bar({
	element: 'graph1',
	data: <?= $graph_sales?>,
	xkey: 'month',
	ykeys: ['no_of_sales'],
	labels: ['No of Sales'],
	axes: false
	
	}).on('click', function(i, row){
		console.log(i, row);
		});
	

	Morris.Donut({
	element: 'graph2',
	data: data(),
	formatter: function (x) { return x + "%"}
		}).on('click', function(i, row){
		console.log(i, row);
	
	});

	Morris.Donut({
	element: 'graph3',
	data: data(),
	formatter: function (x) { return x + "%"}
		}).on('click', function(i, row){
		console.log(i, row);
	
	});
</script>


  <!-- Chart Ends -->
  

  <script src="<?= base_url()?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url()?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url()?>js/sb-admin-2.min.js"></script>

	<!-- My Custom JavaScript -->
  <script src="<?= base_url()?>js/myScripts.js"></script>

</body>

</html>


      