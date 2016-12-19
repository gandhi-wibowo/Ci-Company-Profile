<div class="container">
	<div class="col-sm-12">
		<img src="img/header.jpg" class="img-responsive img-thumbnail" />
	</div>
</div>
<br>
<div class="content-wrapper">
	<div class="container">
		<div class="col-sm-12">
			<?php
			$no = 1;
			foreach ($kegiatan->result() as $keg) {
				$time = strtotime($keg->kegiatan_tanggal);
				$gambar = $this->Model_home->Gambar($keg->kegiatan_id);
				?>
				<div class="col-sm-6" style="background-color:white;">
					<br>
					<!-- Gambar  -->
					<?php if($gambar != 'no_image.jpg'){ ?>
						<div class="col-sm-5">
							<div id="myCarousel_<?php echo $no; ?>" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">
									<?php $sl = 0; foreach ($gambar->result() as $slide) { ?>
										<li data-target="#myCarousel_<?php echo $no; ?>" data-slide-to="<?php echo $sl; ?>" class="<?php if($sl==0){echo "active";} ?>"></li>
									<?php $sl++; } ?>
								</ol>

								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">
									<?php $wr = 0; foreach ($gambar->result() as $wrap) { ?>
										<div class="item <?php if($wr==0){ echo "active"; } ?>">
											<img src="<?php echo "img/".$wrap->image_name; ?>" class='img-responsive' />
										</div>
									<?php $wr++; } ?>
								</div>
							</div>
						</div>
						<?php }else{ ?>
							<div class="col-sm-5">
								<div class="item">
										<img src="img/no_image.jpg" class="img-responsive" />
								</div>
							</div>
							<?php } ?>


						<!-- Judul dan tanggal -->
						<div class="col-sm-6" >
							<div class="row">
								<div class="col-sm-12">
									<strong><h4>
										<?php echo anchor(base_url('Home/Detail/'.$keg->kegiatan_id),$keg->kegiatan_judul); ?>
									</h4></strong>
								</div>
							</div>
						</div>
						<!-- Tanggal -->
						<div class="col-sm-1" style="background-color:#cccccc;">
							<div class="row">
								<div class="col-sm-12">
									<strong> <?php echo date("d",$time); ?></strong>
								</div>
								<div class="col-sm-12">
									<small><?php echo date("M y",$time); ?></small>
								</div>
							</div>
						</div>
						<div class="col-sm-7" >
							<div class="row">
								<div class="col-sm-12" >
									<?php
									$text = $keg->kegiatan_text;
									$limit = substr($text,0,100);
									echo $limit." . . .  ";
									echo anchor(base_url('Home/Detail/'.$keg->kegiatan_id),"Selengkapnya");
									echo "<br><br>";
									?>
								</div>
							</div>
						</div>
				</div>
			<?php
			if(($no%2)==0){
				echo "<div class='col-sm-12'>
				<br>
				</div>";
			}
			$no++;
		 } ?>
		</div>
	</div>
</div>
