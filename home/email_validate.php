<?php
    include('../database/config.php');
    if(isset($_POST['validate'])){
	$service_id = $_GET['id'];
	$update="UPDATE orders set validated=1 where service_id='$service_id'";
	if ($mysqli->query($update) === TRUE) {
		echo "<script type='text/javascript'>
		alert('Transaction has been validated.');
		window.open('index.php','_self');
		</script>";
	} else {
		echo "Error updating record: " . $mysqli->error;
	}
    }
    
?>	

<?php include 'header.php'; ?>

	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/pic2.jpg);">
		<h2 class="tit6 t-center">
			Email Validation
		</h2>
	</section>


	<!-- Reservation -->
	<section class="section-reservation bg1-pattern p-t-100 p-b-113">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 p-b-30">
					<div class="t-center">
						<span class="tit2 t-center">
							Validate 
						</span>
                        <h3 class="tit3 t-center m-b-35 m-t-2">
                            Email
						</h3>
					</div>

						<div class="row">
							<div class="col-md-4">	
							</div>
							<div class="col-md-4">
								<div class="wrap-btn-booking flex-c-m m-t-6">
								<!-- Button3 -->
								<form method="POST" action="">
								<button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4" name="validate">
									Validate Now
								</button>
								</form>
								</div>
							</div>
                            <div class="col-md-4">	
							</div>
						</div>
				</div>
			</div>

			<div class="info-reservation flex-w p-t-80">
				<div class="size23 w-full-md p-t-40 p-r-30 p-r-0-md">
					<h4 class="txt5 m-b-18">
						Reserve by Phone
					</h4>

					<p class="size25">
						Call us in our mobile number
						<span class="txt24">(540)754-0081</span>
					</p>
				</div>

				<div class="size24 w-full-md p-t-40">
					<h4 class="txt5 m-b-18">
						For Event Booking
					</h4>

					<p class="size26">
						You may also email us at <span class="txt24">Face2Facebeauty@makeupstudio.net</span>
					</p>
				</div>

			</div>
		</div>
	</section>
<?php include 'footer.php';?>