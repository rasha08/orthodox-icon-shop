<?php require_once('./includes/helpers.php') ?>
<?php require_once('./model/shopping_list_model.php') ?>

<div class="container template-render animated fadeIn" style="min-height: 86vh;">
	<?php $total_cost = 0; ?>
	<div class="col-md-4 col-md-offset-5">
	 		<form method="get" action="index.php">
	 			<button type="submit" name="shop" value="Go to Shop" class="btn btn-danger"><span class="glyphicon-arrow-left glyphicon"></span>  Back to Shop</button><br><br>
			</form>
		</div>
	<?php if (isset($_SESSION['shopping_list']) && count($_SESSION['shopping_list'])>0): ?>
		<h1 class="jumbotron-hr col-md-12">Your Shoppping List</h1>
		<?php for ($i=0; $i<count($_SESSION['shopping_list']); $i++):?>
			<?php foreach ($_SESSION['shopping_list'] as $i => $icons) : ?>
				<div class="row col-md-12 table-responsive table-bordered">
					<div class="col-md-10">
						<div class="list-group-item-text clearfix" style="max-height: 130px;">

						<div class="col-md-1" style="padding-top: 1.5vw">
							<h3 style="font-size:calc(20px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;">#<?= $i+1 ?></h3>
						</div>

						<div class="col-md-7" style="padding-top: 2.9vh">
							<h2 class="list-group-item-heading" style="font-size:calc(20px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;"><?= $icons['name'] ?>
								<small class="text-muted"> (id: <?= $icons['id'] ?>)</small>
							</h2>
						</div>

						<div class="pull-left col-md-2 text-center icon-thumb">
							<img src="images/thumb/<?= $icons['img'] ?>.jpg" alt="<?= formatSeoDescription($icons['name']) ?>" class="img-responsive img-thumbnail" style="max-height: 130px;"><br>
						</div>
						<div class="pull-right col-md-2 text-center">
							<div class="table-striped" style="padding-top: 25%; padding-bottom: 3vh;">
								<h3><?= $icons['price']." $" ?></h3>
								<?php $total_cost = $total_cost +  $icons['price'] ?>
							</div>
						</div>
					</div>
					</div>
					<div class="col-md-2" style="padding-top: 5vh">
						<form action="./model/shopping_list_model.php" method="get">
							<input type="hidden" name="remove_id" value="<?= $i ?>">
							<button type="submit" name="remove" value="remove" class="btn btn-danger btn-block"><span class="glyphicon-remove-circle glyphicon"></span> <b>remove</b></button><br><br>
						</form>
					</div>
				</div>
			<?php endforeach ?>
		<?php endfor ?>
			<div class="row col-md-12 table-responsive table-bordered" style="margin-top: 5%; padding-top: 3vh; padding-bottom: 3vh;margin-bottom: 5%">
			<div class="col-md-3 media-heading">
				<h4>Total cost of chart:</h4>
			</div>
			<div class="col-md-3 media-heading">
				<h4><?= $total_cost.' $' ?></h4>
			</div>
			<form action="index.php" method="get">
				<div class="col-md-3 media-heading">
					<input type="hidden" name="total_cost" value="<?= $total_cost ?>">
					<button type="submit" name="check_out" value="Check Out" class="btn btn-block btn-success"><span class="glyphicon glyphicon-credit-card"></span> <b>Check Out</b></button>
				</div>
			</form>
			<div class="col-md-3 media-heading">
				<form action="./model/shopping_list_model.php" method="get">
					<button type="submit" name="clear" value="Clear Shopping List" class="btn btn-block btn-warning"><span class="glyphicon glyphicon-trash"></span> <b>Clear Shopping List</b></button>
				</form>
			</div>
			</div>
	<?php else: ?>
		<div class="col-md-12 col-xs-12">
		<h4 class="text-center alert alert-success">Your shopping list is empty!</h4>
		</div>
	<?php endif ?>
</div>