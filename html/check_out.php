<?php require_once('./model/check_out_model.php'); ?>
<div class="container  template-render">
<div>
	<div class="col-md-12">
	<div class="col-md-4 col-md-offset-5">
	 		<form method="get" action="index.php">
	 			<button type="submit" name="shopping_list" value="Shopping List" class="btn btn-danger"><span class="glyphicon-arrow-left glyphicon"></span>  Back to Shopping list</button><br><br>
			</form>
		</div>
	<hr class="col-md-12">
		<h1 class="jumbotron-hr" style="font-size:calc(20px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;">Order Details</h1>
	</div>
	<div class="col-md-12">
		<table class="table table-bordered table-responsive text-center">
			<thead>
		      <tr>
		        <th>#</th>
		        <th>Icon Name</th>
		        <th>Icon Size (inch)</th>
		        <th>Icon Weight (gram)</th>
		        <th>Icon Price (US $)</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php for ($i=0; $i<count($_SESSION['shopping_list']); $i++):?>
				<?php foreach ($_SESSION['shopping_list'] as $i => $icons) : ?>
				<tr>	
					<td>

						<h4># <?= $i+1 ?></h4>
					</td>
					<td>
						<h3 style="font-size:calc(16px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;"><?= $icons['name'] ?> <span class="text-muted">(id: <?= $icons['id'] ?>)</span></h3>
					</td>
					<td>
						<h4><?= @$icons[0]['size'] ?></h4>
					</td>
					<td>
						<h4><?= @$icons[0]['weight'] ?></h4>
					</td>
					<td>
						<h4><?= $icons['price'] ?></h4>
					</td>
				</tr>
				<?php endforeach ?>
			<?php endfor ?>
		    </tbody>
		</table>
		<table class="table table-bordered table-responsive">
		<thead>
			<th>
				<h3>Total Cost</h3>
			</th>
			<th><h3><?= $_GET['total_cost'] ?> $ <span class="text-muted"> + shipping costs</span></h3></th>
		</thead>
		</table>
	</div>
</div>
<div class="table">
	<div class="col-md-12">
	<hr>
		<h1 class="jumbotron-hr" style="font-size:calc(20px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;">Customer Information</h1>
	</div>
	<div class="col-md-12 table-bordered">
		<form class="form-check-inline" method="post" action="index.php">
		<div class="col-md-12"><hr></div>
		<?php while ($user = $result_user_id->fetch_array(MYSQLI_ASSOC)):?>
		<div class="form-group">
	      <label for="firstName" class="col-md-4 control-label"><h4>First Name:</h4></label>
	      <div class="col-md-6">
	        <input type="text" class="form-control" id="FirstName" name="customer_first_name" placeholder="Enter Your First Name" value="<?= $user['first_name']?>" required>
	      </div>
	    </div>
	    <div class="col-md-12"><hr></div>
	    <div class="form-group">
	      <label for="lastName" class="col-md-4 control-label"><h4>Last Name:</h4></label>
	      <div class="col-md-6">
	        <input type="text" class="form-control" id="lastName" name="customer_last_name" placeholder="Enater your Last Name" value="<?= $user['last_name']?>" required>
	      </div>
	    </div>
	   <div class="col-md-12"><hr></div>
	    <div class="form-group">
	      <label for="Email" class="col-md-4 control-label"><h4>Email:</h4></label>
	      <div class="col-md-6">
	        <input type="email" class="form-control" name="customer_email" id="Email" placeholder="Enter your email address..." value="<?= $user['email']?>" required>
	      </div>
	    </div>
	<?php endwhile ?>
	    <div class="col-md-12"><hr></div>
	    <div class="form-group">
	      <label for="phone" class="col-md-4 control-label"><h4>Phone:</h4></label>
	      <div class="col-md-6">
	        <input type="text" class="form-control" name="cutomer_phone" id="phone" placeholder="Enter your phone number..." required>
	      </div>
	    </div>
	    <div class="col-md-12"><hr></div>
	    <div class="form-group">
	      <label for="street" class="col-md-4 control-label"><h4>Your Street Address:</h4></label>
	      <div class="col-md-6">
	        <input type="text" class="form-control" id="street" name="customer_street" placeholder="Enter your street address..." required>
	      </div>
	    </div>
	    <div class="col-md-12"><hr></div>
	    <div class="form-group">
	      <label for="city" class="col-md-4 control-label"><h4>City:</h4></label>
	      <div class="col-md-6">
	        <input type="text" class="form-control" id="city" name="customer_city" placeholder="Enter the name of your city..." required>
	      </div>
	    </div>
	    <div class="col-md-12"><hr></div>
	    <div class="form-group">
	      <label for="state" class="col-md-4 control-label"><h4>State:</h4></label>
	      <div class="col-md-6">
	        <input type="text" class="form-control" id="state" name="customer_state" placeholder="Enter the name of your state..." required>
	      </div>
	    </div>
	    <div class="col-md-12"><hr></div>
	    <div class="form-group">
	      <label for="counry" class="col-md-4 control-label"><h4>Country:</h4></label>
	      <div class="col-md-6">
	        <input type="text" class="form-control" id="country" name="customer_country" placeholder="Enter the name of ypur county..." required>
	      </div>
	    </div>
	    <div class="col-md-12"><hr></div>
	    <div class="form-group">
	      <div class="col-md-offset-4 col-md-4">
	        <button type="submit" name="check_out" class="btn btn-success btn-block btn-lg"><span class="glyphicon glyphicon-send"></span> <b>Finsh your order</b></button>
	        <br>
	      </div>
	    </div>
  </form>
	</div>
</div>
</div>