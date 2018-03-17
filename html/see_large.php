<?php require_once('./includes/helpers.php') ?>
<?php require_once('./model/open_model.php') ?>

	<div class="container col-md-12 text-center animated zoomIn">
	<h1 class="jumbotron-hr" style="font-size:calc(20px + 0.7vw); padding-left: calc(2px + 0.5vw); font-weight: bold;"><?= $open_icon['name'] ?></h1>
	<img  class="img img-responsive center-block" src="images/<?= $open_icon['large_img'] ?>.jpg" alt="<?= formatSeoDescription($open_icon['name']) ?>">
	<div class="col-md-3 col-md-offset-3">
	<hr>
        <a href="index.php?open=show-orthodox-icon-details&buy-icon=<?= createTitleUrlSlug($open_icon['name']) ?>&id=<?= $open_icon['id'] ?>&price_id=<?= $open_icon['price_id'] ?>"
           class="btn btn-block btn-danger">
            <span class="glyphicon-arrow-left glyphicon"></span>
              Back To Icon Details
        </a>

    </div>
</div>