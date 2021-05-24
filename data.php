<?php include_once "vendor/autoload.php"; ?>
<?php 

	use App\Controller\Student;
	$student = new Student;

	/**
	 * Data delete
	 */
	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$mass = $student -> deleteStudent($id);
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>All students</title>
	<!-- Bootstrap Css Link -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Favicon Css Link -->
	<link rel="shortcut icon" href="assets/images/fav.ico" type="image/x-icon">
	<!-- Custom Css Link -->
	<link rel="stylesheet" href="style.css">
</head>
<body>

	


	<div class="container">
		<div class="card">
			<div class="card-header">
				<h3>All student information</h3>
					<?php 

						if(isset($mass)){
							echo $mass;
						}

					 ?>
				<a href='index.php' class="btn btn-primary">Add Student Data</a>
			</div>
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<th>Sl</th>
						    <th>Name</th>
						    <th>Username</th>
						    <th>Email</th>
						    <th>Cell</th>
						    <th>Location</th>
						    <th>Photo</th>
						    <th>Status</th>
						</tr>
					</thead>
					<tbody>

						<?php 

							$data = $student -> allStudent();
							$i = 1;
							while($sin_data = $data -> fetch_assoc()):

						 ?>

						<tr>
							<th><?php echo $i; $i++; ?></th>
						    <td><?php echo $sin_data['name']; ?></td>
						    <td><?php echo $sin_data['uname']; ?></td>
						    <td><?php echo $sin_data['email']; ?></td>
						    <td><?php echo $sin_data['cell']; ?></td>
						    <td><?php echo $sin_data['location']; ?></td>
						    <td><img style="width:50px;height:40px" src="media/img/students/<?php echo $sin_data['photo']; ?>" alt=""></td>
						    <td>
							    <a href="view.php?id=<?php  ?>" class="btn btn-info" >View</a>
							    <a href="#" class="btn btn-danger" >Edit</a>
							    <a href="?delete=<?php echo $sin_data['id']; ?>" class="btn btn-warning" >Delete</a>
							    <a href="#" class="btn btn-success" >Active</a>
						    </td>
						</tr>

					<?php endwhile ; ?>
						

					</tbody>
				</table>
			</div>
			<div class="card-footer"></div>
		</div>
	</div>





	<!-- Javascript File Link -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/custom.js"></script>
	
</body>
</html>