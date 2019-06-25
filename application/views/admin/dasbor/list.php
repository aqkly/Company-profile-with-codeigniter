 <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-newspaper-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Berita </span>
              <span class="info-box-number"><?= count($berita) ?><small> Berita</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-image"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Galeri</span>
              <span class="info-box-number"><?= count($galeri) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">User</span>
              <span class="info-box-number"><?= count($user) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Layanan</span>
              <span class="info-box-number"><?= count($layanan) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

<?php
//Notifikasi
if($this->session->flashdata('sukses')){
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>

<p>
  <a href="<?= base_url('admin/berita/tambah') ?>" title="Tambah Data Berita" class="btn btn-success">
    <i class="fa fa-plus"></i> Tambah Baru
  </a>
</p>

 <table id="example1" class="table table-bordered table-striped table-responsive">
  <thead>
    <tr>
      <th width="5%">No</th>
      <th>Gambar</th>
      <th>Judul</th>
      <th>Kategori</th>
      <th>Jenis - Status</th>
      <th>Penulis</th>
      <th>Tanggal</th>
      <th width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
    foreach ($berita as $berita) {
    ?>
    <tr>
      <td><?= $i++ ?></td>
      <td><img src="<?= base_url('assets/upload/image/thumbs/'.$berita->gambar) ?>" width="60" class="img img-thumbnail"></td>
      <td><?= $berita->judul_berita ?></td>
      <td><?= $berita->nama_kategori ?></td>
      <td><?= $berita->jenis_berita ?> - <?= $berita->status_berita ?></td>
      <td><?= $berita->nama ?></td>
      <td><?= $berita->tanggal_post ?></td>
      <td>
        
      <a href="<?= base_url('admin/berita/edit/'.$berita->id_berita) ?>" title="Edit Berita" class="btn btn-warning btn-xs">
        <i class="fa fa-edit"></i> Edit
      </a>
      
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
