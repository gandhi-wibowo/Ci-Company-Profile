<div class="content-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              Form Ubah Kontak
            </div>
            <div class="panel-body">
              <?php
              $hidden = array('kontak_id' =>$kontak->kontak_id );
               echo form_open('admin/Kontak','',$hidden); ?>
                <div class="form-group">
                  <label for="text">Hp :</label>
                  <input type="text" class='form-control' name="hp" value="<?php echo $kontak->kontak_hp; ?>">
                </div>
                <div class="form-group">
                  <label for="text">Email :</label>
                  <input type="text" class='form-control' name="email" value="<?php echo $kontak->kontak_email; ?>">
                </div>
                <div class="form-group">
                  <label for="text">Alamat :</label>
                  <textarea name="alamat" class="form-control"><?php echo $kontak->kontak_alamat; ?></textarea>
                </div>                
                <button type="submit" name="ubahKontak" class="btn btn-info">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
