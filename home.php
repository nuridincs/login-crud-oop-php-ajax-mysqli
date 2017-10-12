<?php require "config/database.php";//session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
	<script src="assets/css/bootstrap/bootstrap.min.css"></script>
	<script src="assets/js/bootstrap/bootstrap.min.js"></script>
	<script src="assets/main.js"></script>
	<link rel="stylesheet" href="assets/bower_components/bootstrap-sweetalert/dist/sweetalert.css">
	<script src="assets/bower_components/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1>Learning Ajax,PHP</h1>      
			<!-- <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile-first projects on the web.</p> -->
		</div>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Learning</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">Page 1</a></li>
					<li><a href="#">Page 2</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>
		  <!-- <p>This is some text.</p>      
		  <p>This is another text.</p>  -->
		<h1>Data Users <?php //echo $_SESSION['name']; ?></h1><br>
		<div class="panel">
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAddUser">Add Users</button>
			<table class="table">
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Password</th>
					<th>Action</th>
				</tr>
				<?php 
					$query = "SELECT * FROM app_users";
					$result = $mysqli->query($query);
					$no = 0;
					while ($data = $result->fetch_assoc()) {
						$no++;
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $data['nama']; ?></td>
					<td><?php echo $data['email']; ?></td>
					<td><?php echo $data['password']; ?></td>
					<td>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditUser" onclick="showUsers(<?php echo $data['id']; ?>)">Edit</button>
						<button type="button" class="btn btn-danger" onclick="deleteUsers(<?php echo $data['id']; ?>)">Delete</button>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>

	<div id="modalAddUser" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Add Users</h4>
	      </div>
	      <div class="modal-body">
	        	<div class="form-group">
					<label for="exampleInputEmail1">Nama</label>
					<input type="text" class="form-control" id="addNama" aria-describedby="emailHelp" placeholder="Enter Nama">
					<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>
	        	<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="addEmail" aria-describedby="emailHelp" placeholder="Enter email">
					<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" id="addPassword" placeholder="Password">
			  </div>
	      </div>
	      <div class="modal-footer">
	      	<button type="button" class="btn btn-primary" onclick="addUsers()">Save</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>

	<div id="modalEditUser" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Edit Data Users</h4>
	      </div>
	      <div class="modal-body">
	      		<input type="hidden" id="idUsers">
	        	<div class="form-group">
					<label for="exampleInputEmail1">Nama</label>
					<input type="text" class="form-control" id="editNama" aria-describedby="emailHelp" placeholder="Enter Nama">
					<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>
	        	<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="editEmail" aria-describedby="emailHelp" placeholder="Enter email">
					<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" id="editPassword" placeholder="Password">
			  </div>
	      </div>
	      <div class="modal-footer">
	      	<button type="button" class="btn btn-primary" onclick="editUsers()">Update</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
</body>
</html>