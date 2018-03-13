<?php require_once('./model/admin_model.php') ?>
<div class="container template-render">
	<div id="login" class="animated fadeInLeft">
	<hr>
	  <h1 class="jumbotron-hr"><?= $title ?></h1>
	  <form class="form-horizontal" method="post" action="index.php?web_master=WebMaster_Zone_login">
	    <div class="form-group">
	      <label class="col-sm-2 control-label">Email</label>
	      <div class="col-sm-10">
	        <input type="email" class="form-control" placeholder="Email" name="email" required>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="col-sm-2 control-label">Password</label>
	      <div class="col-sm-10">
	        <input type="password" class="form-control" placeholder="Password" name="password" required>
	      </div>
	    </div>
	    <div class="form-group">
	      <div class="col-sm-offset-2 col-sm-10">
	        <button type="submit" name="login" class="btn btn-primary btn-block">Log in</button>
	      </div>
	    </div>
	  </form>
</div>
<hr>

</div>