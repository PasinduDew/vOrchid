<!-- Begin Page Content -->
<div class="container-fluid">

<nav aria-label="breadcrumb px-xs-5">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= site_url('/')?>">Home</a></li>
		<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Messages</li>
	</ol>
</nav>

<!-- Page Content Begins From Here -->
<div class="container" style="">
	<div class="alert <?= $alert ?> clo-lg-12" role="alert">
		Message Status : <?= $alert_text ?>
	</div>
	
	<div class="col-lg-12 row">
	
		
		<div class="form-group col-lg-6">
			<label for="exampleFormControlInput1">Sender Name</label>
			<input type="text" class="form-control" id="" placeholder="" value="<?= $message['sender_name']?>" readonly>
		</div>
		<div class="form-group col-lg-6">
			<label for="exampleFormControlInput1">Email address</label>
			<input type="email" class="form-control" id="" placeholder="" value="<?= $message['sender_email']?>" readonly>
		</div>
		<div class="form-group col-lg-6">
			<label for="exampleFormControlInput1">Mobile</label>
			<input type="email" class="form-control" id="" placeholder="" value="<?= $message['mobile']?>" readonly>
		</div>
		<div class="form-group col-lg-6">
			<label for="exampleFormControlInput1">Date Received</label>
			<input type="email" class="form-control" id="" placeholder="" value="<?= $message['date']?>" readonly>
		</div>

		

		<div class="form-group col-lg-12">
			<label for="exampleFormControlTextarea1">Message</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" rows="5" readonly> <?= $message['message']?></textarea>
		</div>
		<div class="form-group col-lg-12">
			
			<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Reply</button>
			<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
		</div>
	</div>


<!-- Message Reply Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reply Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('Contact_Us/sendReply/' . $message['id'])?>" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" name="receiver_email" value="<?= $message['sender_email']?>">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" name="message_text" ></textarea>
          </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary" value="submit">
					</div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

	<!-- <div class="col-lg-6 row">

	<div class="form-group col-lg-6">
		<label for="exampleFormControlTextarea1">Example textarea</label>
		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
	</div>
	</div> -->
	
	
	

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

