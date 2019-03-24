<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="shortcut icon" href="public/front/favicon.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Bootstrap time Picker -->
	<link rel="stylesheet" href="<?= base_url() ?>public/plugins/timepicker/bootstrap-timepicker.min.css">
    <title>Beauty</title>
	
    <!-- Custom styles for this template -->
    <link href="public/front/css/style.css" rel="stylesheet">
	
  </head>
<body id="Home">
	
	<!-- Header -->
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					      <span class="navbar-brand" href="public/front/#"><img src="public/front/images/logo.png" alt=""></span>
					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-navbar-collapse-1">				        

					      <ul class="nav navbar-nav navbar-right">
					        <li class="active"><a href="#Home">Home</a></li>
					        <li><a href="#Services">Services</a></li>
					        <li><a href="#Prices">Prices</a></li>
					        <li><a href="#Team">Team</a></li>
					        <li><a href="#Appoinment">Appoinment</a></li>
					      </ul>
					    </div><!-- /.navbar-collapse -->
					</nav>
				</div>
			</div>
		</div>
	</header>

	<!-- Slider -->
	<section class="slider-section">
		<div class="slider single-item">
			<div class="slide" style="background-image: url('public/front/images/slide-1.jpg');">
				<div class="slide-text">
					<h2>Great Beauty Services</h2>
					<p>We are providing our deals since 1980</p>
					<a href="#" class="white-btn btn">Try out theme</a>
					<a href="#" class="orange-btn btn">Visit us now</a>
				</div>
			</div>
			<div class="slide" style="background-image: url('public/front/images/slide-1.jpg');">
				<div class="slide-text">
					<h2>Great Beauty Services</h2>
					<p>We are providing our deals since 1980</p>
					<a href="#" class="white-btn btn">Try out theme</a>
					<a href="#" class="orange-btn btn">Visit us now</a>
				</div>
			</div>
			<div class="slide" style="background-image: url('public/front/images/slide-1.jpg');">
				<div class="slide-text">
					<h2>Great Beauty Services</h2>
					<p>We are providing our deals since 1980</p>
					<a href="#" class="white-btn btn">Try out theme</a>
					<a href="#" class="orange-btn btn">Visit us now</a>
				</div>
			</div>
		</div>
	</section>
	
	<!-- What we provide section -->
	<section class="services-section" id="Services">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2>What We Provide</h2>
						<p>More than 50 new services</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="service-box">
						<img src="public/front/images/icons/hair_dryer-50.png" alt="">
						<h3>Beautiful Hair Styles</h3>
						<p class="subtitle">Lorem ipsum dolor sit ametn consectetur adipiscing elite.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="service-box">
						<img src="public/front/images/icons/comb-50.png" alt="">
						<h3>FAST & PERFECT</h3>
						<p>Lorem ipsum dolor sit ametn consectetur adipiscing elite.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="service-box">
						<img src="public/front/images/icons/barbers_chair-50.png" alt="">
						<h3>Awesome Barbers</h3>
						<p>Lorem ipsum dolor sit ametn consectetur adipiscing elite.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="service-box">
						<img src="public/front/images/icons/barbers_scissors-50.png" alt="">
						<h3>NEW MODELS</h3>
						<p>Lorem ipsum dolor sit ametn consectetur adipiscing elite.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="service-box">
						<img src="public/front/images/icons/hair_brush-50.png" alt="">
						<h3>Pro staff</h3>
						<p>Lorem ipsum dolor sit ametn consectetur adipiscing elite.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="service-box">
						<img src="public/front/images/icons/hair_clip-50.png" alt="">
						<h3>Daily support</h3>
						<p>Lorem ipsum dolor sit ametn consectetur adipiscing elite.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Pricing section -->
	<section class="pricing-section" id="Prices">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2>Check The Prices</h2>
						<p>Great prices for all outr clients</p>
					</div>
				</div>
			</div>
			<div class="row">
				<?php foreach($all_products as $row): ?>
					<div class="col-md-4 col-sm-6">
						<div class="pricing-box p-icon p1">
							<h3><?= $row['product_name']; ?></h3>
							<p><?= $row['product_description']; ?></p>
							<h2>Rs:<?= $row['product_price']; ?></h2>
						</div>
					</div>
				<?php endforeach; ?>
				<!-- <div class="col-md-4 col-sm-6">
					<div class="pricing-box p-icon p2">
						<h3>Beauty Vip</h3>
						<p>Starting from</p>
						<h2>25$</h2>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="pricing-box p-icon p3">
						<h3>Health Service</h3>
						<p>Starting from</p>
						<h2>30$</h2>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="pricing-box p-icon p4">
						<h3>Massages</h3>
						<p>Starting from</p>
						<h2>45$</h2>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="pricing-box p-icon p5">
						<h3>Hairt Dressing</h3>
						<p>Starting from</p>
						<h2>18$</h2>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="pricing-box p-icon p6">
						<h3>Cosmetics</h3>
						<p>Starting from</p>
						<h2>60$</h2>
					</div>
				</div> -->
			</div>
		</div>
	</section>

	<!-- Team section -->
	<section class="team-section" id="Team">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2>Beauty Small Team</h2>
						<p>Know more about us</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="member">
						<img src="public/front/images/sara.png" alt="">
						<h4>Sara Andrson</h4>
						<p>Custom digital services like logo design, WordPress installation, video production and more.</p>
						<a href="#" class="contact">Contact This Staff</a>
						<div class="social">
							<a href="#" class="fb"></a>
							<a href="#" class="tw"></a>
							<a href="#" class="in"></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="member">
						<img src="public/front/images/maya.png" alt="">
						<h4>Maya Smith</h4>
						<p>Custom digital services like logo design, WordPress installation, video production and more.</p>
						<a href="#" class="contact">Contact This Staff</a>
						<div class="social">
							<a href="#" class="fb"></a>
							<a href="#" class="tw"></a>
							<a href="#" class="in"></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="member">
						<img src="public/front/images/sara-2.png" alt="">
						<h4>Sara Andrson</h4>
						<p>Custom digital services like logo design, WordPress installation, video production and more.</p>
						<a href="#" class="contact">Contact This Staff</a>
						<div class="social">
							<a href="#" class="fb"></a>
							<a href="#" class="tw"></a>
							<a href="#" class="in"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Appoinment section -->
	<section class="contact-section" id="Appoinment">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-4">
					<div class="title">
						<h2>Appoinment Request</h2>
						<p>Send us a message</p>
					</div>
					<p class="contact-info">
						<span><strong>Address:</strong> 15 Wallstreet, NYC</span>
						<span><strong>Telephone:</strong> +852 645 983</span>
						<span><strong>Email:</strong> Mail@Beauty.com</span>
					</p>
				</div>
				<div class="col-md-9 col-sm-8">
					<div class="box-body my-form-body">
						<?php if(isset($msg) || validation_errors() !== ''): ?>
							<div class="alert alert-warning alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4><i class="icon fa fa-warning"></i> Alert!</h4>
								<?= validation_errors();?>
								<?= isset($msg)? $msg: ''; ?>
							</div>
						<?php endif; ?>
						<?php echo form_open(base_url('/'));  ?> 
							<div class="row">
								<div class="col-md-12">
									<h2>Contact information</h2>
								</div>
								<div class="col-md-6">
									<input class="form-control" name="firstname" type="text" placeholder="FIRST NAME">
								</div>
								<div class="col-md-6">
									<input class="form-control" name="lastname" type="text" placeholder="LAST NAME">
								</div>
								<div class="col-md-6">
									<input class="form-control" name="mobile_no" type="text" placeholder="PHONE NO">
								</div>
								<div class="col-md-6">
									<input class="form-control" name="email" type="email" placeholder="EMAIL">
								</div>

								<div class="col-md-12">
									<h2>Appointment details</h2>
								</div>
								<div class="col-md-6">
									<label for="appoinment_date" class="control-label">Appointment Date</label>
									<input type="date" name="appoinment_date" class="form-control" id="appoinment_date" placeholder="">
								</div>
								<div class="col-md-6">
									<label for="appoinment_time" class="control-label">Appointment Time</label>
									<div class="bootstrap-timepicker">
										<input type="text" name="appoinment_time" class="form-control timepicker" id="appoinment_time" placeholder="">
									</div>
								</div>
								<div class="col-md-6">
									<label for="product_id" class="control-label">I'm making an appointment for</label>
									<select name="product_id" id="product_id" class="form-control">
										<option>---Select---</option>
										<?php foreach($all_products as $row) { ?>
											<option value="<?php echo $row['id'];?>"><?php echo $row['product_name'];?> (Rs:<?php echo $row['product_price'];?>)</option>
										<?php } ?>
									</select>
								</div>
								
								<div class="col-md-12">
									<textarea name="comments" class="form-control" placeholder="WRITE YOUR MESSAGE HERE..."></textarea>
									<input href="#" type="submit" value="SEND" name="submit" class="btn orange-btn-line pull-right">
								</div>
							</div>
						<?php echo form_close( ); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Map section -->
	<div class="map-section">
		<div id="map"></div>
	</div>

	<!-- Footer -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2>Stay Connected With Us</h2>
						<p>Follow us on social media</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<p>Lorem ipsum dolor sit amen consectetur adipiscing<br />quis extra commodo consequat.</p>
					<div class="social">
						<a href="#" class="fb"></a>
						<a href="#" class="tw"></a>
						<a href="#" class="in"></a>
					</div>
					<p class="copy">&copy; 2019 Salon</p>
				</div>
			</div>
		</div>
	</footer>
	
	<div class="trs"></div>
	
	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="public/front/js/jquery-1.12.0.min.js"></script>
	<script src="public/front/js/bootstrap.min.js"></script>
	<script src="public/front/js/slick.min.js"></script>
	
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQyJ4GSmRMzqRO1AblbvqJ5K_q2xfg0So"></script>
	<script src="public/front/js/map.js"></script>

	<script src="public/front/js/custom.js"></script>

	<!-- bootstrap time picker -->
	<script src="<?= base_url() ?>public/plugins/timepicker/bootstrap-timepicker.min.js"></script>

	<!-- page script -->
	<script type="text/javascript">
	  $(".flash-msg").fadeTo(2000, 500).slideUp(500, function(){
	    $(".flash-msg").slideUp(500);
	});
	</script>

	<script>
		$(function () {
			//Timepicker
			$(".timepicker").timepicker({
			showInputs: false,
			});
		});
	</script>   
</body>

</html>