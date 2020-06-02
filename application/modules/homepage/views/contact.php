<div id="app">
	<div class="breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<ol>
					  <li class="breadcrumb-item active text-italic" style="color:black;">CONTACT</li>
					</ol>
				</div>
				<div class="col-md-6">
					<ol class="float-right">
					  <li class="breadcrumb-item active text-italic">HOME / CONTACT</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- contact -->
	<section class="contact-area section-gap" id="contact">
		<div class="container mt-20">
			<div class="row justify-content-center d-flex">
				<transition enter-active-class="animated fadeInLeft"
				leave-active-class="animated fadeOutRight">
				<div class="notification is-success text-center px-5 top-middle" v-if="successMSG" @click="successMSG = false">{{successMSG}}</div>
				</transition>
				<div class="mt-40 col-lg-7 text-center">
					<div class="item">
						<form class="form-area" id="myForm" method="post" class="contact-form text-right">
						<div class="row">
							<div class="col-lg-12 form-group">
								<input id="name" name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="no-border common-input mb-20 form-control" required type="text" v-model="newMessage.name">

								<input id="email" name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="no-border common-input mb-20 form-control" required type="email" v-model="newMessage.email">

								<input id="subject" name="subject" placeholder="Enter your subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="no-border common-input mb-20 form-control" required type="text" v-model="newMessage.subject">

								<textarea id="message" class="no-border common-textarea mt-10 form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required v-model="newMessage.message"></textarea>
								<button class="primary-btn mt-20 float-left" @click="sendMessage">Send Message<span class="lnr lnr-arrow-right"></span></button>
							</div>
						</div>
					</div>
				</form>
				</div>
				<div class="mt-53 col-lg-5 text-left">
					<div class="item">
						<h4 class="mb-10">Contact Information</h4>
						<div class="line"></div>
						<div class="mt-20">
							<form class="form-area" class="contact-form text-right">
								<div class="row">
									<div class="col-lg-12 form-group">
										<h5>Address</h5>
										<label class="mt-10">Jl. H.E Sukma Desa Ciherang Pondok Rt2/1 No.6  Kec. Caringin Kab. Bogor 16730 Jawa Barat</label>
										<div class="line-label"></div>
										<h5 class="mt-20">Email</h5>
										<label class="mt-10">halo.paramatastd@gmail.com</label>
										<div class="line-label"></div>
										<h5 class="mt-20">Phone</h5>
										<label class="mt-10">+62 878 7458 193</label>
										<div class="line-label"></div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- contact -->
	<!-- maps -->
	<section class="maps-area section-gap-bottom" id="work">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-60 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">Maps</h1>
						<div class="line"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 ">
					<div class="mb-30 row d-flex justify-content-center">
						<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:440px;width:100%;'><div id='gmap_canvas' style='height:440px;width:100%;'></div><div><small><a href="https://embedgooglemaps.com/fr/">https://embedgooglemaps.com/fr/</a></small></div><div><small><a href="http://eurodisneyaanbiedingen.nl/">euro disney offers | best deals - book now!</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:15,center:new google.maps.LatLng(-6.6935235,106.83827989999997),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-6.6935235,106.83827989999997)});infowindow = new google.maps.InfoWindow({content:'<strong>Paramata</strong><br>Jl. H.E Sukma Desa Ciherang Pondok Rt2/1 No.6  Kec. Caringin Kab. Bogor 16730 Jawa Barat<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
						</script>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- maps -->

</div>
