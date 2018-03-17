<?php require_once('./model/open_model.php') ?>
<?php require_once('./includes/helpers.php') ?>
<div class="container template-render animated fadeIn" style="min-height: 80vh;">
<?php if(@$_SESSION['auth'] == "off"): ?>
<h4 class="text-center alert alert-danger animated zoomIn">In order to purchase any icon you have to register. Thank you!</h4>
<?php endif ?>
<?php if(@$_GET['add'] == "fail"): ?>
<h4 class="text-center alert alert-warning">Something went wrong, please try again.</h4>
<?php elseif(@$_GET['add'] == "fieldfail"): ?>
	<h4 class="text-center alert alert-warning">You must select price field!</h4>
<?php endif ?>
 <div class="col-md-12 text-center table-bordered">
 	<div class="row">
 		<div>
 			<div class="col-md-12">
 				<h1 class="animated fadeInDown" style="font-size:calc(18px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;"><?= $open_icon['name'] ?> <small class="text-muted">(id: <?= $open_icon['id'] ?>)</small></h1>
 				<input type="hidden" name="icon_id" value="<?= $open_icon['id'] ?>">
 				<hr>
 			</div>
 			<div></div>
 			<div class="col-md-6">
 				<img src="images/<?= $open_icon['min_img'] ?>.jpg" class="img-responsive large-image" alt="<?= formatSeoDescription($open_icon['name']) ?>">
 				<br>
 				<form action="index.php" method="get">
 					<input type="hidden" name="id" value="<?= $open_icon['id'] ?>">
 					<button type="submit" name="see_large" value="See Icon in full size" class="btn btn-default"><span class="glyphicon-picture glyphicon"></span>  See Icon in full size</button><br><br>
 				</form>
 			</div>
			<form action="./includes/add_to_shopping_list.php" method="get">
 			<div class="col-md-6">
 				<p class="lead animated fadeInDown"><?= $open_icon['description'] ?></p>
 				<hr>
 				<div class="col-md-12">
 					<table class="table table-condensed text-center animated fadeInUp">
 					 	<thead class="text-center">
 					 	<tr>
 					 		<th class="text-lg-center">Select</th><th>Size (inches)</th><th>Weight (grams)</th><th>price (US $)</th>
 					 	</tr>
 					 	</thead>
 					 	<tbody>
	 					<?php while($price = mysqli_fetch_assoc($result_prices)): ?>
	 						<tr>
	 							<td>
	 								<div class="radio">
	 									<label><input type="radio" name="price" value="<?= $price['price'] ?>" required></label>
	 								</div>
	 							</td>
	 							<td><p class="lead"><?= $price['size'] ?></p></td>
	 							<td><p class="lead"><?= $price['weight'] ?></p></td>
	 							<td><p class="lead"><?= $price['price'] ?></p></td>
	 						</tr>
	 					<?php endwhile ?>
	 					</tbody>
	 				</table>
 				<hr>
 			</div>
 			<div class="col-md-12">
 			<?php if(@$_SESSION['auth'] == "off"): ?>
 				<span class="btn btn-danger btn-lg btn-block disabled"><span class=" glyphicon glyphicon-exclamation-sign"></span><span style="font-size:calc(11px + 0.5vw); font-weight: bold;"> Please register or log in!</span></span><br><br>
 			<?php elseif(@$_SESSION['auth'] == "on"): ?>
 					<input type="hidden" name="icon_id" value="<?= $open_icon['id'] ?>">
 					<input type="hidden" name="icon_name" value="<?= $open_icon['name'] ?>">
 					<input type="hidden" name="icon_img" value="<?= $open_icon['tumb_img'] ?>">
 					<input type="hidden" name="price_id" value="<?= $open_icon['price_id'] ?>">
 					<button type="submit" value="Add to Shopping List!" class="btn btn-success btn-lg"><span class="glyphicon-shopping-cart glyphicon"></span>  Add to Shopping List!</button><br><br>
 			<?php endif ?>
 			</div>
 		</div>
 		</form>
 		<div class="col-md-4 col-md-offset-4">
	 		<form method="get" action="index.php">
	 			<button type="submit" name="shop" value="Go to Shop" class="btn btn-danger"><span class="glyphicon-arrow-left glyphicon"></span>  Back to Shop</button><br><br>
			</form>
		</div>
 		</div>
 	</div>
 </div>
 </div>