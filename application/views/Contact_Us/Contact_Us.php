<div class="container contact-form">
            
            <form action="<?= site_url('Contact_Us/setMessage')?>" method="post">
                <h3>Drop Us a Message</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="msgName" class="form-control" placeholder="Your Name *" value="<?= $user['firstname']?>" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="msgEmail" class="form-control" placeholder="Your Email *" value="<?= $user['email']?>" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="msgMob" class="form-control" placeholder="Your Phone Number *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="msgTxt" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                </div>
            </form>
</div>
