
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
        <strong><h3> Hubungi Kami </h3></strong>
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
          <div class="row">
            <div class="col-sm-1">
              <span class="glyphicon glyphicon-earphone"> </span>
            </div>
            <div class="col-sm-11">
              <strong><?php echo $kontak->kontak_hp; ?></strong>
            </div>
          </div>
				</div>
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-1">
              <span class="glyphicon glyphicon-envelope"> </span>
            </div>
            <div class="col-sm-11">
              <strong><?php echo $kontak->kontak_email; ?></strong>
            </div>
          </div>
				</div>  
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-1">
              <span class="glyphicon glyphicon-home"></span>
            </div>
            <div class="col-sm-11">
              <?php echo nl2br($kontak->kontak_alamat); ?>
            </div>
          </div>
				</div>
        <div class="col-sm-12">
          <br>
        </div>
      </div>
			<div class="col-sm-2">
			</div>
    </div>
  </div>
</div>
<br>
<br>
