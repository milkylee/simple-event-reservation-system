<?php

include '../database/config.php';

if(isset($_POST['register'])){
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$address = $_POST["address"];
	$email = $_POST["email"];
	$pwd = $_POST["pwd"];
$query = "INSERT INTO users (fname, lname, address, email, password, status) VALUES('$fname', '$lname', '$address', '$email', '$pwd', 0)";
$register = mysqli_query($mysqli, $query);
    
if(!$register) {
	die("Query Failed" . mysqli_error($mysqli));
}

	echo "<script>window.location.href = 'confirm_registration.php'</script>"; 

}

?>
<?php include 'header.php';?>
	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/login.jpg);">
		<h2 class="tit6 t-center">
			Register
		</h2>
	</section>



	<!-- Contact form -->
	<section class="section-contact bg1-pattern p-t-90 p-b-113">
		
		<div class="container">
			<h3 class="tit7 t-center p-b-62 p-t-105">
				Register
			</h3>

			<form class="wrap-form-reservation size22 m-l-r-auto" method="POST" action="">
				<div class="row">
                    <div class="col-md-4">
					<!-- Name -->
					<span class="txt9">
							First Name
						</span>

						<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="fname" placeholder="First Name">
						</div>
                    </div>
					<div class="col-md-4">
						<!-- Name -->
						<span class="txt9">
							Last name
						</span>

						<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="lname" placeholder="Last name">
						</div>
					</div>
					<div class="col-md-4">
						<!-- Name -->
						<span class="txt9">
							Address
						</span>

						<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="address" placeholder="Address">
						</div>
					</div>
				</div>
                <div class="row">
                <div class="col-md-4">
						<!-- Name -->
						<span class="txt9">
							Email
						</span>

						<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email" placeholder="E-mail">
						</div>
					</div>
					<div class="col-md-4">
						<!-- Name -->
						<span class="txt9">
							Password
						</span>

						<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="pwd">
						</div>
					</div>
                </div>
                
				<div class="wrap-btn-booking flex-c-m m-t-13">
					<!-- Button3 -->
					<button type="submit" name="register" class="btn3 flex-c-m size36 txt11 trans-0-4">
						Submit
					</button>
				</div>
			</form>
			</div>
		</div>
	</section>

<?php include 'footer.php';?>
