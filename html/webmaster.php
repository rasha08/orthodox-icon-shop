
<?php require_once('./model/admin_model.php') ?>
<div class="container template-render" style="min-height: 83.5vh;">
	<?php if (@$_SESSION['admin_auth'] == "on"): ?>
		<div class="col-md-12">
			<h1 class="text-center">Web Master Zone</h1>
			<hr>
			<div class="col-md-3">
				<form action="index.php?web_master=WebMaster+Zone" method="get">
					<button type="submit" name="icon_change" value="Add New Icon" class="btn btn-block btn-success"><span class="glyphicon glyphicon-plus"></span>  <b>Add New Icon</b></button>
				</form>
			</div>
			<div class="col-md-3">
				<form action="index.php?web_master=WebMaster+Zone" method="get">
					<button type="submit" name="icon_change" value="Edit Icon" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-edit"></span>  <b>Edit Icon</b></button>
				</form>
			</div>
			<div class="col-md-3">
				<form action="index.php?web_master=WebMaster+Zone" method="get">
					<button type="submit" name="icon_change" value="Delete Icon" class="btn btn-block btn-danger"><span class="glyphicon glyphicon-trash"></span>  <b>Delete Icon</b></button>
				</form>
			</div>	
			<div class="col-md-3">
				<form action="index.php?web_master=WebMaster+Zone" method="get">
					<button type="submit" name="icon_change" value="Add New Price Table" class="btn btn-block btn-info"><span class="glyphicon glyphicon-list"></span>  <b>Add New Price Table</b></button>
				</form>
			</div>	
		</div>

		<div class="col-md-12">
			<hr>
        </div>
        <div class="col-md-12">
		<?php if(@$_GET['icon_change']=="Add New Icon"): ?>
			<form method="get" action="index.php">
				<button type="submit" name="web_master" value="WebMaster Zone" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-folder-open"></span>  Show Full Statistics</button><br><br>
			</form>
			<h3>Add Icon</h3>
		    <form action="index.php" method="post" enctype="multipart/form-data">
		        <div class="row">
		            <div class="col-md-6 form-group">
		            <label for="name" class="form-control">Icon Name</label>
		            <input type="text" class="form-control" placeholder="Enter Icon Name..." required name="name">
		            </div>
		            <div class="col-md-6 form-group">
		                <label for="imagePath" class="form-control"> Image name (without '.jpg')</label>
		                <input type="text" class="form-control" placeholder="example: 063" required name="img">
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-md-9 form-group">
		                <label for="description" class="form-control"> Icon Description</label>
		                <textarea class="form-control" placeholder="Enter Description for Icon that you are adding to database" required name="description"></textarea> 
		            </div>
		            <div class="col-md-3 form-group">
		                <label for="price" class="form-control"> Price ID</label>
		                <input type="text" class="form-control" placeholder="example: 1" required name="price_id">
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-md-4 form-group">
		            <label for="name" class="form-control" style="height: calc(50px + 0.8vw);">Icon - Full sized image</label>
		            <input type="file" class="form-control"  name="full-size-img" required>
		            </div>
		            <div class="col-md-4 form-group">
		                <label for="imagePath" class="form-control" style="height: calc(50px + 0.8vw);">Icon - Minimized sized image <span class="text-muted">(max width of image 900px)</span></label>
		                <input type="file" class="form-control" name="min-size-img" required>
		            </div>
		            <div class="col-md-4 form-group">
		                <label for="imagePath" class="form-control" style="height: calc(50px + 0.8vw);">Icon - Minimized sized image <span class="text-muted">(max width of image 250px)</span></label>
		                <input type="file" class="form-control btn-block" name="thumb-size-img" required>
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-md-12 form-group">
		                <input type="submit" name="icon_change" class="btn btn-success btn-block" value="Add New Icon To Database">
		            </div>
		        </div>
		    </form>
		<?php elseif(@$_GET['icon_change']=="Edit Icon"): ?>
			<div class="col-md-12">
			<form method="get" action="index.php">
				<button type="submit" name="web_master" value="WebMaster Zone" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-folder-open"></span>  Show Full Statistics</button><br><br>
			</form>
			<h3>Select Icon you want to change.</h3>
			<form action="index.php" method="get" class="form-inline">
			<table class="table table-condensed text-center animated fadeInUp">
 				<thead class="text-center">
 					<tr>
 					 	<th class="text-lg-center">Select</th><th>Id</th><th>Name</th><th>price_id</th>
 					</tr>
 				</thead>
 				<tbody>
					<?php while ($icons = $result->fetch_array(MYSQLI_ASSOC)):?>	
						<tr>
	 						<td>
	 						<div class="radio">
	 						<label><input type="radio" name="icon_id" value="<?= $icons['id'] ?>" required></label>
	 						</div>
	 						</td>
	 						<td><p class="lead"><?= $icons['id'] ?></p></td>
	 						<td><p class="lead"><?= $icons['name'] ?></p></td>
	 						<td><p class="lead"><?= $icons['price_id'] ?></p></td>
	 					</tr>
					<?php endwhile ?>
				</tbody>
	 		</table>
	 		<input type="submit" name="icon_change" value="Change Icon Details" class="form-group btn btn-primary btn-block">
			</form>
		    </div>
		<?php elseif(@$_GET['icon_change'] == "Change Icon Details"): ?>
			<form method="get" action="index.php">
				<button type="submit" name="web_master" value="WebMaster Zone" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-folder-open"></span>  Show Full Statistics</button><br><br>
			</form>
			<h3>Change Icon Details</h3>
			<?php while ($icons = $result->fetch_array(MYSQLI_ASSOC)):?>
		    <form action="index.php" method="post">
		        <div class="row">
		            <div class="col-md-6 form-group">
		            <label for="name" class="form-control">Icon Name</label>
		            <input type="text" name="name" class="form-control" value="<?= $icons['name'] ?>" required name="name">
		            </div>
		            <div class="col-md-6 form-group">
		                <label for="imagePath" class="form-control"> Image name (without '.jpg')</label>
		                <input type="text" name="img" class="form-control" value="<?= $icons['large_img'] ?>" required name="img">
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-md-9 form-group">
		                <label for="desccription" class="form-control"> Icon Description</label>
		                <textarea class="form-control" name="description" required name="desccription"><?= $icons['description'] ?></textarea> 
		            </div>
		            <div class="col-md-3 form-group">
		                <label for="price" class="form-control"> Price ID</label>
		                <input type="text" class="form-control" name="price_id" value="<?= $icons['price_id'] ?>" required name="price_id">
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-md-12 form-group">
		            	<input type="hidden" name="id" value="<?= $icons['id'] ?>">
		                <input type="submit" name="icon_change" class="btn btn-primary btn-block" value="Make Changes">
		            </div>
		        </div>
		    </form>
		    <?php endwhile ?>
		<?php elseif(@$_GET['icon_change']=="Delete Icon"):	?>
			<div class="col-md-12">
			<form method="get" action="index.php">
				<button type="submit" name="web_master" value="WebMaster Zone" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-folder-open"></span>  Show Full Statistics</button><br><br>
			</form>
			<h3>Select Icon you want to delete.</h3>
			<form action="index.php" method="post" class="form-inline">
			<table class="table table-condensed text-center animated fadeInUp">
 				<thead class="text-center">
 					<tr>
 					 	<th class="text-lg-center">Select</th><th>Id</th><th>Name</th><th>price_id</th>
 					</tr>
 				</thead>
 				<tbody>
					<?php while ($icons = $result->fetch_array(MYSQLI_ASSOC)):?>	
						<tr>
	 						<td>
	 						<div class="radio">
	 						<label><input type="radio" name="icon_id" value="<?= $icons['id'] ?>" required></label>
	 						</div>
	 						</td>
	 						<td><p class="lead"><?= $icons['id'] ?></p></td>
	 						<td><p class="lead"><?= $icons['name'] ?></p></td>
	 						<td><p class="lead"><?= $icons['price_id'] ?></p></td>
	 					</tr>
					<?php endwhile ?>
				</tbody>
	 		</table>
	 		<input type="submit" name="icon_change" value="Delete Icon From Database" class="form-group btn btn-danger btn-block">
			</form>
		    </div>
		<?php elseif(@$_GET['icon_change']=="Add New Price Table"):	?>
			<div class="col-md-12">
			<form method="get" action="index.php">
				<button type="submit" name="web_master" value="WebMaster Zone" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-folder-open"></span>  Show Full Statistics</button><br><br>
			</form>
			<h3>Add New Price Table</h3>
			<form action="index.php" method="post">
		        <div class="row">
		            <div class="col-md-3 form-group">
		            <label for="name" class="form-control">price id:</label>
		            <input type="text" class="form-control" placeholder="price id" required name="id">
		            </div>
		            <div class="col-md-3 form-group">
		                <label for="imagePath" class="form-control"> Size: (only dimensions)</label>
		                <input type="text" class="form-control" placeholder="example: 10,23 x 14,17" required name="size">
		            </div>
		            <div class="col-md-3 form-group">
		                <label for="desccription" class="form-control"> Weight: (only number)</label>
		                <input type="text" class="form-control" placeholder="example: 2220" required name="weight">
		            </div>
		            <div class="col-md-3 form-group">
		                <label for="price" class="form-control">price: (only number)</label>
		                <input type="text" class="form-control" placeholder="example: 230" required name="price">
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-md-12 form-group">
		                <input type="submit" name="icon_change" class="btn btn-info btn-block" value="Add Price">
		            </div>
		        </div>
		    </form>
		    </div>
		<?php elseif(isset($_GET['web_master'])): ?>
			<div class="col-md-6">
				<div class="col-md-12">
				<h3>List of Registered Users</h3>
				<hr>
				<form action="index.php" method="post" class="form-inline">
				<table class="table table-condensed text-center animated fadeInUp">
	 				<thead class="text-center">
	 					<tr>
	 					 	<th class="text-lg-center">Select</th><th>Id</th><th>E-mail</th><th>First Name</th><th>Last Name</th><th>Registered On</th>
	 					</tr>
	 				</thead>
	 				<tbody>
						<?php while ($users = $result->fetch_array(MYSQLI_ASSOC)):?>	
							<tr>
		 						<td>
		 						<div class="radio">
		 						<label><input type="radio" name="email" value="<?= $users['email'] ?>" required></label>
		 						</div>
		 						</td>
		 						<td><p><?= $users['id'] ?></p></td>
		 						<td><p><?= $users['email'] ?></p></td>
		 						<td><p><?= $users['first_name'] ?></p></td>
		 						<td><p><?= $users['last_name'] ?></p></td>
		 						<td><p><?= $users['last_visit'] ?></p></td>
		 					</tr>
						<?php endwhile ?>
					</tbody>
		 		</table>
		 		<form action="index.php?web_master=WebMaster+Zone" method="get">
					<button type="submit" name="icon_change" value="Ban User From Web Page" class="form-group btn btn-danger col-md-offset-7"><span class="glyphicon glyphicon-remove-sign"></span>  <b>Ban User From Web Page</b></button>
				</form>
				<hr>
			    </div>
			</div>    
			<div class="col-md-6">
				<div class="col-md-12">
				<h3>List of Sold Icons</h3>
				<hr>
				<table class="table table-condensed text-center animated fadeInUp">
	 				<thead class="text-center">
	 					<tr>
	 					 	<th>Id</th><th>Name</th><th>Price</th><th>User Id</th>
	 					</tr>
	 				</thead>
	 				<tbody>
						<?php while ($sold_icons = $result_sold_icons->fetch_array(MYSQLI_ASSOC)):?>	
							<tr>
		 						<td><p><?= $sold_icons['icon_id'] ?></p></td>
		 						<td><p><?= $sold_icons['name'] ?></p></td>
		 						<td><p><?= $sold_icons['price'] ?></p></td>
		 						<td><p><?= $sold_icons['user_id'] ?></p></td>
		 					</tr>
						<?php endwhile ?>
					</tbody>
		 		</table>
		 		<hr>
			    </div>
			</div>
			<div class="col-md-12">
				<h3>Full Statistic of Sold Icons</h3>
				<hr>
				<table class="table table-condensed text-center animated fadeInUp">
	 				<thead class="text-center">
	 					<tr>
	 					 	<th>Icon Id</th><th> Icon Name</th><th>Icon Price</th><th>User Id</th><th>User First Name</th><th>User Last Name</th><th>User Email</th><th>User Registered on</th>
	 					</tr>
	 				</thead>
	 				<tbody>
						<?php while ($users = $result_full_stats_users->fetch_array(MYSQLI_ASSOC)):?>
							<?php 
								$sold_icons = $result_full_stats_sold_icons->fetch_array(MYSQLI_ASSOC);
								$icons = $result_full_stats_icons->fetch_array(MYSQLI_ASSOC);
							?>	
							<tr>
		 						<td><p><?= $icons['id'] ?></p></td>
		 						<td><p><?= $icons['name'] ?></p></td>
		 						<td><p><?= $sold_icons['price'] ?></p></td>
		 						<td><p><?= $users['id'] ?></p></td>
		 						<td><p><?= $users['first_name'] ?></p></td>
		 						<td><p><?= $users['last_name'] ?></p></td>
		 						<td><p><?= $users['email'] ?></p></td>
		 						<td><p><?= $users['last_visit'] ?></p></td>
		 					</tr>
						<?php endwhile ?>
					</tbody>
		 		</table>
			</div>
		<?php else: ?>
			<form method="get" action="index.php">
				<button type="submit" name="web_master" value="WebMaster Zone" class="btn btn-default"><span class="glyphicon glyphicon-folder-open"></span>  Show Full Statistics</button><br><br>
			</form>

		<?php endif ?>     
		</div>
		<div class="col-md-12">
		<hr>
		<form method="post" action="index.php">
		<button type="submit" name="logout" value="Log Out From Web Master Zone" class="btn btn-warning btn-lg col-md-offset-8"><span class="glyphicon glyphicon-log-out"></span>  Log Out From Web Master Zone</button>
        </form>
        </div>
	<?php endif ?>
</div>