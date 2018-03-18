<?php require('./includes/contact.php'); ?>
<div class="template-render animated fadeIn contact">
	<div class="contact container">
		<div class="jumbotron-fluid">
			<h2><?= $title ?></h2>
			<p class="lead"><?= $lead ?></p>
		</div>
		<div class="col-md-12">
			<form method="post" action="index.php">

			<div class="form-group col-md-6">
				<label for="name" class="form-control">Your Full Name</label>
				<input type="text" class="form-control" name="name" placeholder="Enter Your Full Name" required>
			</div>
			<div class="form-group col-md-6">
				<label for="phone" class="form-control">Your Phone Number</label>
				<input type="text" class="form-control" name="phone" placeholder="Enter Your Phone Number">
			</div>
			<div class="form-group col-md-6">
				<label for="email" class="form-control">Your Email</label>
				<input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
			</div>
			<div class="form-group col-md-6">
				<label for="phone" class="form-control">Your Street Address</label>
				<input type="text" class="form-control" name="address" placeholder="Enter Your Street Address">
			</div>
			<div class="form-group col-md-12">
				<label for="phone" class="form-control">Subject of your message</label>
				<input type="text" class="form-control" name="subject" placeholder="Subject of your message" required>
			</div>
			<div class="col-md-12">
				<textarea name="message" placeholder="Place for you message..." class="form-control" name="message"></textarea>
				<hr>
			</div>

			<button type="submit" name="send_message" value="Send Message" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-envelope"></span> <b>Send Message</b></button>
			</form>
		</div>
	</div>
</div>
