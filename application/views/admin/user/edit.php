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
              $hidden = array('user_id' =>$user->user_id );
               echo form_open('admin/User','',$hidden); ?>
                <div class="form-group">
                  <label for="text">Nama User :</label>
                  <input type="text" class='form-control' name="user_name" value="<?php echo $user->user_name; ?>">
                </div>
                <div class="form-group">
                  <label for="text">Nama Login :</label>
                  <input type="text" class='form-control' name="user_login" value="<?php echo $user->user_login; ?>">
                </div>
                <button type="submit" name="ubahUser" class="btn btn-info">Simpan</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                Form Ubah Password
              </div>
              <div class="panel-body">
                <?php
                $hidden = array('user_id' =>$user->user_id );
                 echo form_open('admin/User/UbahPwd','',$hidden); ?>

                  <div class="form-group">
                    <label for="text">password Sebelumnya:</label>
                    <input type="password" class='form-control' name="user_password_old">
                  </div>
                  <div class="form-group">
                    <label for="text">password Baru:</label>
                    <input type="password" class='form-control' name="user_password_new">
                  </div>
                  <button type="submit" name="ubahPwd" class="btn btn-info">Simpan</button>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
