<?php include 'header.php'; ?>
<?php
include '../database/config.php';

if (isset($_POST['reserve'])) {
	$service_id = $_POST['id'];
	$total = $_POST['total'];
    $date = $_POST['date'];
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
    $phone = $_POST['phone'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$password = $_POST['password'];
$query = "INSERT INTO orders(service_id, total, date, start_time, end_time, fname, lname, phone, address, email, password, validated) 
			VALUES('$service_id', '$total', '$date', '$start_time', '$end_time', '$fname', '$lname', '$phone', '$address', '$email', '$password', 0)";

//$reserve_user = mysqli_query($mysqli, $query);

if ($mysqli->query($query) === TRUE) {
   
//send email
require_once "../vendor/autoload.php";
require("../vendor/phpmailer/phpmailer/src/PHPMailer.php");
require("../vendor/phpmailer/phpmailer/src/SMTP.php");

    $mail = new PHPMailer\PHPMailer\PHPMailer();

//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "facebeautyshop2018@gmail.com";          //input email       
$mail->Password = "facebeauty@2018";  //input password            
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   

$mail->From = "facebeautyshop2018@gmail.com";          //input email
$mail->FromName = "Face Beauty Shop";

$mail->addAddress($email, "Recepient Name");

$mail->isHTML(true);

$mail->Subject = "Confirm Reservation";
$mail->Body = "<html>
				<head>
				</head>
				<body style='font-family:Arial;font-size:12px'>
				Hi $fname,<br><br>
				transactions
This will serve as your formal quotation.<br><br>
You requested a service dated on <strong>$date</strong> at <strong>$hour</strong> amounting <strong>Php $total</strong>.
To confirm this transaction, please verify this e-mail address by clicking on the link:<br><br>

<a href='http://localhost/face/home/email_validate.php?id=$service_id'>Click Here!</a><br><br>
Thank you!<br><br>

Regards,<br><br>

Face Beauty Shop
				</body>
				</html>";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}
echo '<script type="text/javascript">window.location = "confirm.php?id='.$service_id.'&total='.$total.'&date='.$date.'&hour='.$hour.'&fname='.$fname.'&lname='.$lname.'";</script>';
}
}
?>
	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/pic2.jpg);">
		<h2 class="tit6 t-center">
			Reservation
		</h2>
	</section>


	<!-- Reservation -->
	<section class="section-reservation bg1-pattern p-t-100 p-b-113">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 p-b-30">
				<form class="wrap-form-reservation size22 m-l-r-auto" method="POST" action="">
					<div class="t-center">
						<span class="tit2 t-center">
							Reservation
						</span>
						<?php
						$service_id = $_GET['id'];
                    
						$result = $mysqli->query("SELECT * FROM services WHERE id = '$service_id'");
						if($result === FALSE){
							die(mysql_error());
						}

						if($result){

                        while($obj = $result->fetch_object()) {
              			 ?>
						<h3 class="tit3 t-center m-b-35 m-t-2">
							<?php echo $obj->service_name; ?>
						</h3>
						<h2><?php echo number_format($obj->price,2); ?></h2>
						<input type="hidden" name="id" value="<?php echo $obj->id;?>"></input>
						<input type="hidden" name="total" value="<?php echo $obj->price;?>"></input>
						<?php
								}
							}
						?>	
					</div>

						<div class="row">
							<div class="col-md-4">
								<!-- Date -->
								<span class="txt9">
									Date
								</span>

								<div class="wrap-inputdate pos-relative txt10 size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="my-calendar bo-rad-10 sizefull txt10 p-l-20" type="text" name="date"> 
									<i class="btn-calendar fa fa-calendar ab-r-m hov-pointer m-r-18" aria-hidden="true"></i>
								</div>
							</div>

							<div class="col-md-4">
								<!-- Time -->
								<span class="txt9">
									Start Time
								</span>

								<div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<!-- Select2 -->
									<select class="selection-1" name="start_time">
										<option>9:00</option>
										<option>9:30</option>
										<option>10:00</option>
										<option>10:30</option>
										<option>11:00</option>
										<option>11:30</option>
										<option>12:00</option>
										<option>12:30</option>
										<option>13:00</option>
										<option>13:30</option>
										<option>14:00</option>
										<option>14:30</option>
										<option>15:00</option>
										<option>15:30</option>
										<option>16:00</option>
										<option>16:30</option>
										<option>17:00</option>
										<option>17:30</option>
										<option>18:00</option>
									</select>
								</div>
							</div>
				
						<div class="col-md-4">
								<!-- Time -->
								<span class="txt9">
									End Time
								</span>

								<div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<!-- Select2 -->
									<select class="selection-1" name="end_time">
										<option>9:00</option>
										<option>9:30</option>
										<option>10:00</option>
										<option>10:30</option>
										<option>11:00</option>
										<option>11:30</option>
										<option>12:00</option>
										<option>12:30</option>
										<option>13:00</option>
										<option>13:30</option>
										<option>14:00</option>
										<option>14:30</option>
										<option>15:00</option>
										<option>15:30</option>
										<option>16:00</option>
										<option>16:30</option>
										<option>17:00</option>
										<option>17:30</option>
										<option>18:00</option>
									</select>
								</div>
							</div>
						</div>

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
								<!-- Phone -->
								<span class="txt9">
									Last Name
								</span>

								<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="lname" placeholder="Last Name">
								</div>
							</div>

							<div class="col-md-4">
								<!-- Email -->
								<span class="txt9">
									Contact Number
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="phone" placeholder="Phone">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<!-- Name -->
								<span class="txt9">
									Address
								</span>

								<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="address" placeholder="Address">
								</div>
							</div>

							<div class="col-md-4">
								<!-- Phone -->
								<span class="txt9">
									Email
								</span>

								<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email" placeholder="Email">
								</div>
							</div>

							<div class="col-md-4">
								<!-- Email -->
								<span class="txt9">
									Password
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="password" placeholder="********">
								</div>
							</div>
						</div>
							
						<div class="row">
								<span class="txt9">
									<i>*Please be noted that credentials you are submitting is also used to register your user account.</i>
								</span>
						</div>

						<div class="wrap-btn-booking flex-c-m m-t-6">
							<!-- Button3 -->
							<button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4" name="reserve">
								Book Now
							</button>
						</div>
					</form>
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
