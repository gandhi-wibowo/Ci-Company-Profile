<div class="content-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              Form Ubah Kegiatan
            </div>
            <div class="panel-body">
              <?php
              $hidden = array('id'=>$kegiatan->kegiatan_id);
              echo form_open('admin/Kegiatan/Ubah','',$hidden); ?>
              <div class="form-group">
                <label for="judul">Judul Kegiatan :</label>
                <input type="text" class="form-control" name="judul" value="<?php echo $kegiatan->kegiatan_judul; ?>">
              </div>
              <div class="form-group">
                <label for="text">Rincian Kegiatan :</label>
                <textarea name="text" class="form-control"><?php echo $kegiatan->kegiatan_text; ?></textarea>
              </div>
                <button type="submit" name="ubah" class="btn btn-info">Simpan</button>
                <?php echo anchor('admin/Kegiatan','Kembali','class="btn btn-default"') ?>
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              Form Gambar
            </div>
            <div class="panel-body">
              <?php
              $images = $this->Model_profil->Gambar($kegiatan->kegiatan_id);
              if($images != 'no_image.jpg'){
                foreach ($images->result() as $foto) {
                  ?>
                  <div class="col-md-6">
                    <div class="thumbnail text-center">
                      <?php echo $foto->image_name; ?>
                      <img src="<?php echo base_url()."img/".$foto->image_name; ?>" />
                      <p>
                        <?php echo form_open_multipart('admin/Kegiatan/UbahPic/'.$kegiatan->kegiatan_id."/".$foto->image_id."/".$foto->image_name) ?>
                          <input type="file" name="images" class="form-control">
                          <br>
                          <button type="submit" name="ubah" class="btn btn-sm btn-warning"> Ubah gambar</button>
                          <a href="<?php echo base_url()."admin/Kegiatan/HapusPic/".$foto->image_id."/".$kegiatan->kegiatan_id."/".$foto->image_name; ?>" class="btn btn-danger btn-sm"> Hapus</a>
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
                      $hidden = array('content_id' =>$kegiatan->kegiatan_id );
                       echo form_open_multipart('admin/Kegiatan/AddPic/','',$hidden); ?>
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
        </div>
      </div>
    </div>
  </div>
</div>
