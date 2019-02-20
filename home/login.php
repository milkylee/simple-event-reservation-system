<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(isset($_SESSION["username"])){

        header("location:index.php");
}
?>
<?php include 'header.php';?>
	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/login.jpg);">
		<h2 class="tit6 t-center">
			Login
		</h2>
	</section>



	<!-- Contact form -->
	<section class="section-contact bg1-pattern p-t-90 p-b-113">
		
		<div class="container">
			<h3 class="tit7 t-center p-b-62 p-t-105">
				Login
			</h3>

			<form class="wrap-form-reservation size22 m-l-r-auto" method="POST" action="../login/verify.php">
				<div class="row">
                    <div class="col-md-4">
                    </div>
					<div class="col-md-4">
						<!-- Name -->
						<span class="txt9">
							Username
						</span>

						<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="username" placeholder="Username">
						</div>
					</div>
				</div>
                <div class="row">
                <div class="col-md-4">
                </div>
					<div class="col-md-4">
						<!-- Name -->
						<span class="txt9">
							Password
						</span>

						<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="pwd" placeholder="Name">
						</div>
					</div>
                </div>
                
				<div class="wrap-btn-booking flex-c-m m-t-13">
					<!-- Button3 -->
					<button type="submit" class="btn3 flex-c-m size36 txt11 trans-0-4">
						Submit
					</button>
				</div>
			</form>
			</div>
		</div>
	</section>

<?php include 'footer.php';?>
