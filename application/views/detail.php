<?php
$images = $this->Model_home->Gambar($detail->kegiatan_id);
$time = strtotime($detail->kegiatan_tanggal);
?>
<style>
.center-block {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
<div class="content-wrapper">
	<div class="container">
    <div class="col-sm-12 ">
      <div class="col-sm-2">
      </div>
      <div class="col-sm-8 gradient " style='border-radius: 5px;' >
        <strong><h3> Detail Kegiatan </h3></strong>
      </div>
      <div class="col-sm-2">
      </div>
    </div>
    <div class="col-sm-12">
      <br>
    </div>
		<div class="col-sm-12">
      <div class="col-sm-2">
      </div>
      <div class="col-sm-8" style="background-color:white; border-radius: 10px; ">
				<br>
				<div class="col-sm-12">
					<!-- Carousell -->
					<?php if($images != 'no_image.jpg'){ ?>
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
					  <!-- Indicators -->
					  <ol class="carousel-indicators">
							<?php $sl=0; foreach ($images->result() as $slide): ?>
								<li data-target="#myCarousel" data-slide-to="<?php echo $sl; ?>" class="<?php if($sl==0){ echo "active"; } ?>"></li>
							<?php $sl++; endforeach; ?>
					  </ol>

					  <!-- Wrapper for slides -->
					  <div class="carousel-inner" role="listbox">
							<?php $img=0; foreach ($images->result() as $image): ?>
								<div class="item <?php if($img==0){ echo "active"; } ?>">
						      <img src="<?php echo base_url()."img/".$image->image_name; ?>" class='img-responsive ' />
						    </div>
							<?php $img++; endforeach; ?>
					  </div>

					  <!-- Left and right controls -->
					  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
					<?php } else { ?>
						<div class="item">
								<img src="<?php echo base_url('img/no_image.jpg'); ?>" class="img-responsive img-thumbnail" />
						</div>
					<?php } ?>
				</div>
				<div class="col-sm-12">
					<br>
				</div>
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-10">
							<strong><h1><?php echo $detail->kegiatan_judul; ?></h1></strong>
						</div>
						<div class="col-sm-2" style="background-color:#cccccc;">
							<div class="row center-block">
								<div class="col-sm-12 ">
									<strong> <h1><?php echo date("d",$time); ?></h1></strong>
								</div>
								<div class="col-sm-12">
									<strong><?php echo date("M y",$time); ?></strong>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<br>
						<?php echo nl2br($detail->kegiatan_text); ?>
						<br>
						<br>
					</div>
					<!-- detail -->
				</div>

      </div>
			<div class="col-sm-2">
			</div>
    </div>
  </div>
</div>
<br>
<br>
