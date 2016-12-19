<div class="content-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              Form Tambah Kegiatan
            </div>
            <div class="panel-body">
              <?php echo form_open_multipart('admin/Kegiatan/Tambah'); ?>
              <div class="form-group">
                <label for="judul">Judul Kegiatan :</label>
                <input type="text" class="form-control" name="judul" >
              </div>
              <div class="form-group">
                <label for="text">Rincian Kegiatan :</label>
                <textarea name="text" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label for="text">Gambar Kegiatan :</label>
                <input type="file" name="images[]" class="form-control" multiple>
              </div>

              <button type="submit" name="tambah" class="btn btn-info">Simpan</button>
              <?php echo anchor('admin/Kegiatan','Kembali','class="btn btn-default"') ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
