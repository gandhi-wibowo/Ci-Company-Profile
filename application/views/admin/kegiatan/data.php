<div class="content-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <?php echo anchor(base_url('admin/Kegiatan/Tambah'),"Tambah","class='btn btn-primary'"); ?>
        <br>
        <br>
          <div class="panel panel-primary">
            <div class="panel-heading">
              Data Kegiatan
            </div>
            <div class="panel-body">
              <table class="table table-responsive">
                <thead>
                  <tr>
                    <th>Judul</th><th>Isi</th><th>Tanggal</th><th>Opsi</th>
                  </tr>
                </thead>
                <?php foreach ($kegiatan as $keg) { ?>
                  <tbody>
                    <tr>
                      <td>
                        <?php echo $keg->kegiatan_judul; ?>
                      </td>
                      <td>
                        <?php echo substr($keg->kegiatan_text,0,50); ?>
                      </td>
                      <td>
                        <?php
                        $time = strtotime($keg->kegiatan_tanggal);
                        echo date("d-M-Y",$time)." ";
                        echo date("H:i",$time);
                        ?>
                      </td>
                      <td>
                        <?php
                          if($keg->kegiatan_publish == 1){
                            echo anchor(base_url('admin/Kegiatan/Unpublish')."/".$keg->kegiatan_id," Sembunyikan ","class='btn btn-sm btn-warning'")." ";
                          }
                          else{
                            echo anchor(base_url('admin/Kegiatan/Publish')."/".$keg->kegiatan_id," Tampilkan ","class='btn btn-sm btn-success'")." ";
                          }
                          echo anchor(base_url('admin/Kegiatan/Ubah')."/".$keg->kegiatan_id," Edit ","class='btn btn-sm btn-info'")." ";
                          echo anchor(base_url('admin/Kegiatan/Hapus')."/".$keg->kegiatan_id," Hapus ","class='btn btn-sm btn-danger'")." ";
                         ?>
                      </td>
                    </tr>
                  </tbody>
                <?php } ?>
              </table>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>
