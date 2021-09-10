<?php 

include_once "autoload.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>SignUp</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>


		<?php 
		
		if (isset($_POST['add'])) {
			$name= $_POST['name'];
			$email= $_POST['email'];
			$cell= $_POST['cell'];
			$uname= $_POST['uname'];
			$age= $_POST['age'];
			$agree="";
			if (isset($_POST['agree'])) {
				$agree=$_POST['agree'];
			}
			$gender="";
			if (isset($_POST['gender'])) {
				$gender=$_POST['gender'];
			}

			 $location= $_POST['location'];
			

			

			$status = true;

			if (empty($name) || empty($email) || empty($cell) || empty($uname) || empty($age) ||empty($gender) || empty($location)) {
				$mgs[]= validate('All fields are require!', 'danger');
				$status=false;
			}
			if (emailCheck($email)==false) {
				$mgs[]= validate('Invalid Email', 'warning');
				$status=false;
			}
			if (fixedemail($email, ['jnu.ac.bd', 'nsu.ac.bd', 'ist.ed.bd'])==false) {
				$mgs[]= validate('This email is not our email', 'warning');
				$status=false;
			}
			 if ($age<20) {
				$mgs[] = validate('You are not in right age', 'warning');
				$status=false;
			}
			if ( $location!='Rampura' && $location!='Badda' && $location!='Uttara' && $location!='Malibagh' && $location!='Mirpur') {
				$mgs[]=validate('select a location', 'warning');
				$status= false;
			}
			if ($gender!='Male' && $gender!='Female') {
				$mgs[]=validate('select a gender', 'warning');
				$status= false;
			}
			if ($agree!='agree') {
				$mgs[]= validate('you should agree first', 'warning');
				$status=false;
			}
			if($status==true) {
				$mgs[]= validate('Data stable!' , 'success');
				cleardata();
			}
		}


		
		
		
		
		
		
		
		?>
			
			
			
			
			

			<!--form area-->

			<div class="wrap shadow">
				<div class="card">
					<div class="card-body">
						<h2>SignUp</h2>

					<?php

					if (isset($mgs)) {
						foreach ($mgs as $mmm) {
							echo $mmm;
						}
					}

					?>
						

						<form action="" method="POST"  autocomplete="on" >
							<div class="form-group">
								<label for="">Name</label>
								<input name="name" class="form-control" value="<?php old('name') ?>" type="text">
							</div>

							<div class="form-group">
								<label for="">Email</label>
								<input name="email" class="form-control" value="<?php old('email') ?>" type="text">
							</div>

							<div class="form-group">
								<label for="">Cell</label>
								<input name="cell" class="form-control"  value="<?php old('cell') ?>"  type="text">
							</div>

							<div class="form-group">
								<label for="">User Name</label>
								<input name="uname" class="form-control"  value="<?php old('uname') ?>"  type="text">
							</div>

							<div class="form-group">
								<label for="">Age</label>
								<input name="age" class="form-control"  value="<?php old('age') ?>"  type="text">
							</div>
							<div class="form-group">
							<label for="">Gender</label> <br>
								<input name="gender"  type="radio" id="Male" value="Male">   <label for="Male"> Male </label>
								<input name="gender" type="radio" id="Female" value="Female">   <label for="Female"> Female</label>
							</div>

							<div class="form-group">
								<label for="">Location</label>
								<select class="form-control" name="location" id="">
									<option >--select--</option>
									<option value="Mirpur">Mirpur</option>
									<option value="Malibagh">Malibagh</option>
									<option value="Uttara">Uttara</option>
									<option value="Badda">Badda</option>
									<option value="Rampura">Rampura</option>

								</select>
								
							</div>

							<div class="form-group">
								<input name="agree" type="checkbox" value="agree" id="agree"> <label for="agree"> I agree to register</label>
							</div>



							<div class="form-group">
								
								<input name="add" class="btn btn-primary" type="submit" value="SignUp">

							</div>

						</form>
					</div>
				</div>
			</div>

			<br>
			<br>
			<br>








	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>

</html>