<style>
img {
    width: 100%;
    height: auto;
}
</style>
<div class="content-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
          <div class="panel panel-primary">
            <div class="panel-heading">
              Form Ubah Profil
            </div>
            <div class="panel-body">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Form Gambar
                </div>
                <div class="panel-body">
                  <?php
                  $images = $this->Model_profil->Gambar($profil->profil_id);
                  if($images != 'no_image.jpg'){
                    foreach ($images->result() as $foto) {
                      ?>
                      <div class="col-md-6">
                        <div class="thumbnail text-center">
                          <?php echo $foto->image_name; ?>
                          <img src="<?php echo base_url()."img/".$foto->image_name; ?>" />
                          <p>
                            <?php echo form_open_multipart('admin/Profil/Ubah/'.$profil->profil_id."/".$foto->image_id."/".$foto->image_name) ?>
                              <input type="file" name="images" class="form-control">
                              <br>
                              <button type="submit" name="ubah" class="btn btn-sm btn-warning"> Ubah gambar</button>
                              <a href="<?php echo base_url()."admin/Profil/HapusPic/".$foto->image_id."/".$profil->profil_id."/".$foto->image_name; ?>" class="btn btn-danger btn-sm"> Hapus</a>
                            </form>
                          </p>
                        </div>
                      </div>
                      <?php
                    }
                  }
                  else{
                    ?>
                    <div class="col-md-6">
                      <div class="thumbnail text-center">
                        <img src="<?php echo base_url()."img/no_image.jpg"; ?>" />
                        <p>
                          <?php
                          $hidden = array('content_id' =>$profil->profil_id );
                           echo form_open_multipart('admin/Profil/AddPic/','',$hidden); ?>
                            <input type="file" name="images[]" class="form-control" multiple>
                            <br>
                            <button type="submit" name="AddPic" class="btn btn-sm btn-warning"> Ubah gambar</button>
                          </form>
                        </p>
                      </div>
                    </div>
                    <?php
                  } ?>
                </div>
              </div>
              <?php
              $hidden = array('content_id' =>$profil->profil_id );
               echo form_open('admin/Profil/UbahKet','',$hidden); ?>
                <div class="form-group">
                  <label for="text">Keterangan :</label>
                  <textarea name="keterangan" class="form-control"><?php echo $profil->profil_keterangan; ?></textarea>
                </div>
                <button type="submit" name="ubahKet" class="btn btn-info">Simpan</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              Tambah Gambar
            </div>
            <div class="panel-body">
              <div class="col-md-12">
                <div class="thumbnail text-center">
                    <?php
                    $hidden = array('content_id' =>$profil->profil_id );
                     echo form_open_multipart('admin/Profil/AddPic/','',$hidden); ?>
                      <input type="file" name="images[]" class="form-control" multiple>
                      <br>
                      <button type="submit" name="AddPic" class="btn btn-sm btn-warning"> Tambah gambar</button>
                    </form>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
