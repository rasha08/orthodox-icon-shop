<?php require_once('./model/shop_model.php') ?>
<?php require_once('./includes/helpers.php') ?>

<div class="container animated fadeIn" style="min-height: 80vh;">
	<div class="col-md-12">
	<?php if(@$_GET['icon_sold'] == 'SOLD'): ?>
    	<br><br>
		<h2 class="text-center alert alert-info animated zoomIn" style="font-size:calc(20px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;">Thank you for being our valued customer. We are grateful for the pleasure of serving you and meeting your needs.</h2>
	<?php endif ?>
		<div class="col-md-8 col-xs-12 pull-left"  style="padding-top: 5px; padding-bottom: 5px;">
		<form action="index.php" method="get" class="form-inline block">
            <input type="text" name="q" class="form-control col-md-5 col-sm-5 col-xs-6" placeholder="Search..." style="width: 60%; display: inline-block; margin-right: 5px;">
            <input type="submit" class="btn btn-default col-md-3 col-sm-3 col-xs-4" value="Search" style="display: inline-block;">
         </form>
    	</div>
    	<div class="col-md-4 col-xs-12 pull-right" style="padding-top: 5px; padding-bottom: 5px;">
    	<div class="col-md-1 col-sm-2 col-xs-2">
    		<form action="index.php" method="get" class="form-inline block">
	            <input type="hidden" name="order_by" value="name">
	            <button type="submit" name="shop" value="Go to Shop" class="btn btn-default" style="font-size:calc(12px + 0.4vw); overflow-y: hidden;"><span class="glyphicon glyphicon-sort-by-alphabet"></span></button>
        </form>
    	</div>
    	<div class="col-xs-offset-1 col-md-1 col-sm-2 col-xs-2">
       		<form action="index.php" method="get" class="form-inline block">
            	<input type="hidden" name="order_by" value="name_desc">
            	<button type="submit" name="shop" value="Go to Shop" class="btn btn-default" style="font-size:calc(9px + 0.7vw); overflow-y: hidden;"><span class="glyphicon glyphicon-sort-by-alphabet-alt"></span></button>
        	</form>
        </div>
        <div class="col-xs-offset-1 col-md-1 col-sm-2 col-xs-2">
       		<form action="index.php" method="get" class="form-inline block">
            	<input type="hidden" name="order_by" value="id">
            	<button type="submit" name="shop" value="Go to Shop" class="btn btn-default" style="font-size:calc(9px + 0.7vw); overflow-y: hidden;"><span class="glyphicon glyphicon-sort-by-attributes"></span></button>
        	</form>
        </div>
        <div class="col-xs-offset-1 col-md-1 col-sm-2 col-xs-2">
       		<form action="index.php" method="get" class="form-inline block">
            	<input type="hidden" name="order_by" value="id_desc">
            	<button type="submit" name="shop" value="Go to Shop" class="btn btn-default" style="font-size:calc(9px + 0.7vw); overflow-y: hidden;"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span></button>
        	</form>
        </div>
      	</div>
    <?php if(@$_GET['add'] == 'success'): ?>
    	<br><br>
		<h2 class="text-center alert alert-success animated zoomIn col-md-12 col-xs-12" style="font-size:calc(20px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;">Icon successfully added to your shopping list!</h2>
	<?php endif ?>
	<?php while ($icons = mysqli_fetch_assoc($result)):?>
	
				<div class="col-md-12">
					<div class="list-group-item table-bordered" style="color: #000; min-height: calc(500px - 50vw); margin-top: calc(2px + 1vw); overflow-y: hidden;" >
						<div class="col-md-7 col-xs-12">
							<h2 class="list-group-item-heading" style="font-size:calc(16px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;"><?= $icons['name'] ?><small class="text-muted"> (id: <?= $icons['id'] ?>)</small></h2>
							<p class="list-group-item-text" style="max-height: 110px; overflow-y: hidden; padding-bottom: 2vh;"><strong><?= $icons['description'] ?></strong></p>
						</div>
						<div class="pull-left col-md-2 col-xs-5 text-center">
							<img src="images/thumb/<?= $icons['tumb_img'] ?>.jpg" alt="<?= formatSeoDescription($icons['name']) ?>" class="img-responsive img-thumbnail" style="max-height: 130px; margin-top: calc(6px + 0.3vw)"><br>
						</div>
						<div class="col-md-3 col-xs-6 text-center pull-left">
							<div class="table-striped" style="padding-top: calc(20px + 2vw); padding-bottom:calc(5px + 3vw); ">
								<a href="index.php?buy-icon=<?= createTitleUrlSlug($icons['name']) ?>&id=<?= $icons['id'] ?>&price_id=<?= $icons['price_id'] ?>&open=Show+Icon+Details" class="btn btn-lg btn-default" style="font-size:calc(9px + 0.7vw); overflow-y: hidden;">Show Icon Details</a>
							</div>
						</div>
					</div>
				</div>

	<?php endwhile ?>
</div>