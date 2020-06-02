<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/homepages/animate.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/homepages/owl.carousel.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/homepages/linearicons.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/homepages/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/homepages/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/homepages/magnific-popup.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/homepages/main.css">
<div id="app">
	<div class="breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<ol>
					  <li class="breadcrumb-item active text-italic" style="color:black;">HOME</li>
					</ol>
				</div>
				<div class="col-md-6">
					<ol class="float-right">
					  <li class="breadcrumb-item active text-italic">HOME / HOME</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- slider -->
	<section class="slider-area section-gap" id="slider">
		<div class="container mt-20">
			<div class="row justify-content-center d-flex">
				<div class="active-works-carousel mt-40 col-lg-8">
					<div class="item" v-for="value in banner">
						<img :src="value.picture">
						<div class="caption text-center">
							<h6 class="text-uppercase text-italic">{{value.description}}</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- slider -->
	<!-- our work -->
	<section class="work-area section-gap" id="work">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-60 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">Our Works</h1>
						<div class="line"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6 ">
					<div class="mb-30">
						<div class="pb-20 text-center">
							<img src="<?php echo base_url() ?>assets/image/design-grafis.png" alt="" width="120" height="100">
						</div>
						<div class="text-center">
							<h2 class="text-italic">Design Grafis</h2>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 ">
					<div class="mb-30">
						<div class="pb-20 text-center">
							<img src="<?php echo base_url() ?>assets/image/book-year.png" alt="" width="120" height="100">
						</div>
						<div class="text-center">
							<h2 class="text-italic">Book Year</h2>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 ">
					<div class="mb-30">
						<div class="pb-20 text-center">
							<img src="<?php echo base_url() ?>assets/image/photoshoot.png" alt="" width="120" height="100">
						</div>
						<div class="text-center">
							<h2 class="text-italic">Photoshoot</h2>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 ">
					<div class="mb-30">
						<div class="pb-20 text-center">
							<img src="<?php echo base_url() ?>assets/image/video.png" alt="" width="120" height="100">
						</div>
						<div class="text-center">
							<h2 class="text-italic">Video</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- our work -->
</div>

<script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
<script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/js/app.js"></script>

<script src="<?php echo base_url()?>assets/js/homepages/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="<?php echo base_url()?>assets/js/homepages/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/homepages/jquery.ajaxchimp.min.js"></script>
<script src="<?php echo base_url()?>assets/js/homepages/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url()?>assets/js/homepages/owl.carousel.min.js"></script>
<script src="<?php echo base_url()?>assets/js/homepages/jquery.sticky.js"></script>
<script src="<?php echo base_url()?>assets/js/homepages/slick.js"></script>
<script src="<?php echo base_url()?>assets/js/homepages/jquery.counterup.min.js"></script>
<script src="<?php echo base_url()?>assets/js/homepages/waypoints.min.js"></script>
