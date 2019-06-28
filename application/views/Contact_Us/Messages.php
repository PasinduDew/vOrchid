
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
		<div class="container row" style="">
		
		<?php $count = 0;?>

		<table class="table table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th>Sender</th>
					<th>Message</th>
					<th >Date</th>
					<th>Status</th>
					<th>Actions</th>
					<th></th>
					
				</tr>
				</thead>
		
		<?php foreach ($messages as $message): ?>
		
		<?php $count += 1;?>

		
			
				<tbody>
				
					<tr data-toggle="collapse" data-target="<?= "#" . "accordian" . $count?>" id="sfsdfsd" onclick="toggle(this)" class="clickable">
					
						<td ><?= $count?></td>
						<td><?=$message['sender_name']?></td>
						<td><?=$message['message']?></td>
						<td><?=$message['date']?></td>

						<?php if($message['read'] == 0): ?>

							<td>New</td>
						<?php else: ?>

							<td>Read</td>
						<?php endif ?>
						
						<td><a href="<?=site_url('Contact_Us/viewMessage/' . $message['id'])?>"><button class="btn btn-success"><i class="fa fa-eye"></i></button></a> <a href="<?=site_url('Contact_Us/replyMessage/' . $message['id'])?>"><button class="btn btn-primary"><i class="fa fa-reply"></i> </button></a></td>
						<td><a href="<?=site_url('Contact_Us/deleteMessage/' . $message['id'])?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td>
					</tr>
					<div>
						
						<td colspan="12" id="<?= "accordian" . $count . "td"?>" style="border: none; display: none;">
						
							<div id="<?= "accordian" . $count?>" class="collapse" style="text-align: left; "><?=$message['message']?></div>
						</td>
					</div>
					<script>
						function toggle(element) {
							var eid = element.getAttribute("data-target").substring(1);
							var myElement = document.getElementById(eid + "td");
							// alert(myElement.style.display);
							if(myElement.style.display == "none"){
								myElement.style.display = "";
							}
							else{
								myElement.style.display = "none"
							}

						}
					
					</script>
				
				
				</tbody>
			
			

        <?php endforeach; ?>   
		</table>
	
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      