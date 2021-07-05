<!--Banner-->
<div class="banner">
	<div id="example1" class="core-slider core-slider__carousel">
		<div class="core-slider_viewport">
			<div class="core-slider_list">
				<div class="core-slider_item">
					<img src="../assets/img/p1.jpg" alt="">
				</div>
				<div class="core-slider_item">
					<img src="../assets/img/p2.jpg" alt="">
				</div>
				<div class="core-slider_item">
					<img src="../assets/img/p5.jpg" alt="">
				</div>
				<div class="core-slider_item">
					<img src="../assets/img/p6.jpg" alt="">
				</div>
			</div>
		</div>
		<div class="core-slider_nav">
			<div class="core-slider_arrow core-slider_arrow__right"></div>
			<div class="core-slider_arrow core-slider_arrow__left"></div>
		</div>
		<div class="core-slider_control-nav"></div>
	</div>
</div>
<div class="clearfix"></div>

<!-- Services -->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="text-center text1">Layanan Kami</h2>
		</div>
		<div class="col-lg-4 col-sm-6 text-center">
			<div class="circle">
				<i class="fa fa-users"></i>
			</div>
			<h4 class="text2"><b>Gathering</b></h4>
			<p></p>
		</div>
			
		<div class="col-lg-4 col-sm-6 text-center">
			<div class="circle">
				<i class="fa fa-music"></i>
			</div>
			<h4 class="text2"><b>Concert</b></h4>
			<p></p>
		</div>
			
		<div class="col-lg-4 col-sm-6 text-center">
			<div class="circle">
				<i class="fa fa-building"></i>
			</div>
			<h4 class="text2"><b>Exhibition and Hardsell</b></h4>
			<p></p>
		</div>

		<div class="col-lg-4 col-sm-6 text-center">
			<div class="circle">
				<i class="fa fa-door open"></i>
			</div>
			<h4 class="text2"><b>Grand Opening</b></h4>
			<p></p>
		</div>

		<div class="col-lg-4 col-sm-6 text-center">
			<div class="circle">
				<i class="fa fa-users"></i>
			</div>
			<h4 class="text2"><b>Video Profile</b></h4>
			<p></p>
		</div>

		<div class="col-lg-4 col-sm-6 text-center">
			<div class="circle">
				<i class="fa fa-users"></i>
			</div>
			<h4 class="text2"><b>MICE</b></h4>
			<p></p>
		</div>
	</div>
</div>
<div class="clearfix"></div>

<!-- All Client -->
<div class="container-fluid brands"><!-- <div class="container-fluid hidden-xs"> -->
	<div class="row">
		<div class="col-md-12 text-center"><h2 class="text-center text1">Client Kami</h2></div>
		<div class="col-md-10 col-md-offset-1">
			<div class="carousel carousel-show slide" id="myCarousel">
				<div class="carousel-inner">
				<?php
				$query = mysqli_query($conn, "SELECT * FROM brands");
				$i = 1;
				$active = 1;
				while($row = mysqli_fetch_array($query)){
					if($i == 1) {
						if($active == 1) {
							echo '<div class="item active">';
						}else{
							echo '<div class="item">';
						}
						echo '<div class="col-md-2 col-sm-6 col-xs-12"><span><img src="../admin/logo/'.$row['logo'].'" class="img-responsive"></span></div>';
					}
					$i = 0;
					echo '</div>';
					$i++;
					$active++;
				}
				?>	
				</div>
				<a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>