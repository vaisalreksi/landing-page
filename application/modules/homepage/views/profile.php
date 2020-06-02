<div id="app">
	<div class="breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<ol>
					  <li class="breadcrumb-item active text-italic" style="color:black;">PROFILE</li>
					</ol>
				</div>
				<div class="col-md-6">
					<ol class="float-right">
					  <li class="breadcrumb-item active text-italic">HOME / PROFILE</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- slider -->
	<section class="slider-area section-gap" id="slider">
		<div class="container mt-20">
			<div class="row justify-content-center d-flex">
				<div class="mt-40 col-lg-8 text-center">
					<div class="item">
						<img src="<?php echo base_url() ?>assets/image/LOGO-PARAMATA.png" width="500">
						<div class="text-center mt-20">
							<p>Paramata adalah industri kreatif yang bergerak di bidang pengerjaan/pengadaan buku tahunan siswa (year book) yang meliputi  jenis pekerjaan | photography ,designing,cetak,dan packaging akan senantiasa memberikan pelayanan yang terbaik sebagai nilai ukur  akan kepuasan konsumen kami .</p>
							<p>Mengusung pelayanan di bidang jasa,dengan tenaga muda yang profesional,terlatih,berpengalaman,dan kompeten dibidangnya.  Paramata akan senantiasa berusaha menjadi yang terbaik bagi kepuasan konsumen dalam hal kualitas dan pelayanan,serta selalu  memberikan ide-ide segar khususnya untuk aplikasi buku tahunan (year book).</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- slider -->
	<!-- team -->
	<section class="team-area section-gap-bottom" id="work">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-60 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">OUR TEAM</h1>
						<div class="line"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 " v-for="value in team">
					<div class="mb-30">
						<div class="pb-20 text-center">
							<img :src="value.picture" alt="" width="260" height="345">
						</div>
						<div class="text-center">
							<p class="text-italic name-team">{{value.name}}</p>
							<p>{{value.jabatan}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- team -->
</div>
