<?php require_once('./model/search_model.php'); ?>
<?php require_once('./includes/helpers.php') ?>

<div class="template-render" style="min-height: 80vh;">
 <div class="container">
	<div class="col-md-12 col-xs-12">
		<form action="index.php" method="get" class="form-inline block">
            <input type="text" name="q" class="form-control" placeholder="Search..." style="width: 60%; display: inline-block;">
            <input type="submit" class="btn btn-default" value="Search" style="display: inline-block;">
         </form>
        <?php if(mysqli_num_rows($result)>1): ?>
		<h3 class="text-center alert alert-success animated zoomIn">Found <?= mysqli_num_rows($result) ?> results</h3>
		<?php elseif(mysqli_num_rows($result)==1): ?>
		<h3 class="text-center alert alert-success animated zoomIn">Found <?= mysqli_num_rows($result) ?> result</h3>
		<?php elseif(mysqli_num_rows($result)==0): ?>
		<h3 class="text-center alert alert-danger animated zoomIn">Sorry, we didn't find any result</h3>
		<h5 class="text-center alert alert-warning animated zoomIn">Search again or 
			<form method="get" action="index.php">
		        <input name="shop" value="Go to Shop" class="btn btn-lg btn-default" id="proceed" type="submit">
		    </form>
		 </h5>
		<?php endif ?>
         <hr>
    </div>
    <?php if(@$_GET['add'] == 'success'): ?>
		<h2 class="text-center alert alert-success">Icon successfully added to your shopping list!</h2>
	<?php endif ?>
	<?php while ($icons = $result->fetch_array(MYSQLI_ASSOC)):?>
			
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
								<a href="index.php?id=<?= $icons['id'] ?>&price_id=<?= $icons['price_id'] ?>&open=Show+Icon+Details" class="btn btn-lg btn-default" style="font-size:calc(9px + 0.7vw); overflow-y: hidden;">Show Icon Details</a>
							</div>
						</div>
					</div>
				</div>
			
	<?php endwhile ?>
	<div class="col-md-4 col-md-offset-5 col-xs-6 col-xs-offset-3">
	<br><br>
	 	<form method="get" action="index.php">
	 		<button type="submit" name="shop" value="Go to Shop" class="btn btn-danger"><span class="glyphicon-arrow-left glyphicon"></span>  Back to Shop</button><br><br>
		</form>
	</div>
</div>
</div>