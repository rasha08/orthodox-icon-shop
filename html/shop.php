<?php require_once('./includes/helpers.php') ?>
<?php require_once('./model/shop_model.php') ?>

<div class="container animated fadeIn template-render shop">
	<div class="col-md-12">
	<?php if(@$_GET['icon_sold'] == 'SOLD'): ?>
    	<br><br>
		<h2 class="text-center alert alert-info animated zoomIn">Thank you for being our valued customer. We are grateful for the pleasure of serving you and meeting your needs.</h2>
	<?php endif ?>
		<div class="col-md-8 col-xs-12 pull-left options">
		<form action="index.php" method="get" class="form-inline block">
            <input type="text" name="q" class="form-control col-md-5 col-sm-5 col-xs-6" placeholder="Search...">
            <input type="submit" class="btn btn-default col-md-3 col-sm-3 col-xs-4" value="Search">
         </form>
    	</div>
    	<div class="col-md-4 col-xs-12 pull-right">
    	<div class="col-md-1 col-sm-2 col-xs-2">
    		<form action="index.php" method="get" class="form-inline block">
	            <input type="hidden" name="order_by" value="name">
	            <button type="submit" name="shop" value="online-orthodox-store" class="btn btn-default"><span class="glyphicon glyphicon-sort-by-alphabet"></span></button>
        </form>
    	</div>
    	<div class="col-xs-offset-1 col-md-1 col-sm-2 col-xs-2">
       		<form action="index.php" method="get" class="form-inline block">
            	<input type="hidden" name="order_by" value="name_desc">
            	<button type="submit" name="shop" value="online-orthodox-store" class="btn btn-default"><span class="glyphicon glyphicon-sort-by-alphabet-alt"></span></button>
        	</form>
        </div>
        <div class="col-xs-offset-1 col-md-1 col-sm-2 col-xs-2">
       		<form action="index.php" method="get" class="form-inline block">
            	<input type="hidden" name="order_by" value="id">
            	<button type="submit" name="shop" value="online-orthodox-store" class="btn btn-default"><span class="glyphicon glyphicon-sort-by-attributes"></span></button>
        	</form>
        </div>
        <div class="col-xs-offset-1 col-md-1 col-sm-2 col-xs-2">
       		<form action="index.php" method="get" class="form-inline block">
            	<input type="hidden" name="order_by" value="id_desc">
            	<button type="submit" name="shop" value="online-orthodox-store" class="btn btn-default"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span></button>
        	</form>
        </div>
      	</div>
    <?php if(@$_GET['add'] == 'success'): ?>
    	<br><br>
		<h2 class="text-center alert alert-success animated zoomIn col-md-12 col-xs-12">Icon successfully added to your shopping list!</h2>
	<?php endif ?>
	<?php while ($icons = mysqli_fetch_assoc($result)):?>
	
				<div class="col-md-12">
					<div class="list-group-item table-bordered">
						<div class="col-md-7 col-xs-12">
							<h2 class="list-group-item-heading"><?= $icons['name'] ?><small class="text-muted"> (id: <?= $icons['id'] ?>)</small></h2>
							<p class="list-group-item-text"><strong><?= $icons['description'] ?></strong></p>
						</div>
						<div class="pull-left col-md-2 col-xs-5 text-center">
							<img src="images/thumb/<?= $icons['tumb_img'] ?>.jpg" alt="<?= formatSeoDescription($icons['name']) ?>" class="img-responsive img-thumbnail"><br>
						</div>
						<div class="col-md-3 col-xs-6 text-center pull-left">
							<div class="table-striped">
								<a href="index.php?open=show-orthodox-icon-details&buy-icon=<?= createTitleUrlSlug($icons['name']) ?>&id=<?= $icons['id'] ?>&price_id=<?= $icons['price_id'] ?>" class="btn btn-lg btn-default">Show Icon Details</a>
							</div>
						</div>
					</div>
				</div>

	<?php endwhile ?>
</div>