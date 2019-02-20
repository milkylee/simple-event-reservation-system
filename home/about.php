<?php include 'header.php'; ?>

	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/pic1.jpg);">
		<h2 class="tit6 t-center">
			About Us
		</h2>
	</section>


	<!-- Our Story -->
	<section class="bg2-pattern p-t-116 p-b-110 t-center p-l-15 p-r-15">
		
		<h3 class="tit3 t-center m-b-35 m-t-5">
            HI THERE!
		</h3>

		<p class="t-center size32 m-l-r-auto">
        We love everything about natural beauty:skincare, glowing makeup (especially for brides-to-be!) and neat home. We love doing make up for weddings and campaigns that champion women in their strongest elements. We also curate ordinary closet for extra ordinary people with busy lives and create product that suit to you.	</p>
	</section>


	<!-- Delicious & Romantic-->
	<section class="bg1-pattern p-t-120 p-b-105">
		<div class="container">
			<!-- Delicious -->
			<div class="row">
				<div class="col-md-6 p-t-45 p-b-30">
					<div class="wrap-text-delicious t-center">
						<span class="tit2 t-center">
                        Quality
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-5">
                         OVER QUALITY
						</h3>

						<p class="t-center m-b-22 size3 m-l-r-auto">
                        Hair and makeup is an expensive craft, so be practical.
                        Others have maybe 10 shades of foundation in their kit. We can work with just two. You don’t need 10 shades if you know how to mix the lightest and darkest shades available to achieve all the others in between.
                        </p>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<div class="wrap-pic-delicious size2 bo-rad-10 hov-img-zoom m-l-r-auto">
						<img src="images/banner-1.jpg" alt="IMG-OUR">
					</div>
				</div>
			</div>


			<!-- Romantic -->
			<div class="row p-t-170">
				<div class="col-md-6 p-b-30">
					<div class="wrap-pic-romantic size2 bo-rad-10 hov-img-zoom m-l-r-auto">
						<img src="images/banner-2.jpg" alt="IMG-OUR">
					</div>
				</div>

				<div class="col-md-6 p-t-45 p-b-30">
					<div class="wrap-text-romantic t-center">
						<span class="tit2 t-center">
							Beauty
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-5">
                            at its finest
						</h3>

						<p class="t-center m-b-22 size3 m-l-r-auto">
                        
                        Beauty is a characteristic of an animal, idea, object, person or place that provides a perceptual experience of pleasure or satisfaction. Beauty is studied as part of aesthetics, culture, social psychology, philosophy and sociology. An "ideal beauty" is an entity which is admired, or possesses features widely attributed to beauty in a particular culture, for perfection. Ugliness is considered to be the opposite of beauty. The experience of "beauty" often involves an interpretation of some entity as being in balance and harmony with nature, which may lead to feelings of attraction and emotional well-being. Because this can be a subjective experience, it is often said that "beauty is in the eye of the beholder."    
                        </p>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Banner -->
	<div class="parallax0 parallax100" style="background-image: url(images/pic2.jpg);">
		<div class="overlay0-parallax t-center size33"></div>
	</div>


	<!-- Chef -->
	<section class="section-chef bgwhite p-t-115 p-b-95">
		<div class="container t-center">
			<span class="tit2 t-center">
				Meet Our
			</span>

			<h3 class="tit5 t-center m-b-50 m-t-5">
				Beauty Specialists
			</h3>
			<?php
                                            include '../database/config.php';
                                            $i=0;
                                            $packages = array();

                                            $result = $mysqli->query('SELECT * FROM employees');
                                            if($result === FALSE){
                                                die(mysql_error());
                                            }

                                            if($result){

                                                while($obj = $result->fetch_object()) {
                                        ?>
                                      
			<div class="row">
				<div class="col-md-8 col-lg-4 m-l-r-auto p-b-30">
					<!-- -Block5 -->
					<div class="blo5 pos-relative p-t-60">
						<div class="pic-blo5 size14 bo4 wrap-cir-pic hov-img-zoom ab-c-t">
							<a href="#"><img src="images/<?php echo $obj->image;?>" alt="IGM-AVATAR"></a>
						</div>

						<div class="text-blo5 size34 t-center bo-rad-10 bo7 p-t-90 p-l-35 p-r-35 p-b-30">
							<a href="#" class="txt34 dis-block p-b-6">
							<?php echo $obj->employee_fname.' '.$obj->employee_lname;?>
							</a>

							<span class="dis-block t-center txt35 p-b-25">
							<?php echo $obj->designation;?>
							</span>

							<p class="t-center">
							<?php Email: echo $obj->employee_email;?>
							<?php Phone: echo $obj->phone;?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<?php
												}
											}

			?>
			
		</div>
	</section>


	<!-- Sign up -->
	<div class="section-signup bg1-pattern p-t-85 p-b-85">
		<form class="flex-c-m flex-w flex-col-c-m-lg p-l-5 p-r-5">
			<span class="txt5 m-10">
				Specials Sign up
			</span>

			<div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
				<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email-address" placeholder="Email Adrress">
				<i class="fa fa-envelope ab-r-m m-r-18" aria-hidden="true"></i>
			</div>

			<!-- Button3 -->
			<button type="submit" class="btn3 flex-c-m size18 txt11 trans-0-4 m-10">
				Sign-up
			</button>
		</form>
	</div>

<?php include 'footer.php'; ?>