<?php require_once('./model/open_model.php') ?>
	<div class="container col-md-12 text-center animated zoomIn">
	<h1 class="jumbotron-hr" style="font-size:calc(20px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;"><?= $open_icon['name'] ?></h1>
	<img  class="img img-responsive center-block" src="images/<?= $open_icon['large_img'] ?>.jpg" alt="large icon">
	<div class="col-md-3 col-md-offset-3">
	<hr>
		<form method="get" action="index.php">
		 <input type="hidden" name="id" value="<?= $open_icon['id']?>">
		 <input type="hidden" name="price_id" value="<?= $open_icon['price_id']?>">
		 <button type="submit" name="open" value="Back To Icon Details" class="btn btn-block btn-danger"><span class="glyphicon-arrow-left glyphicon"></span>  Back To Icon Details</button><br><br>
		 
		</form>
	</div>
</div>