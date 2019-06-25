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

      <?php
      //Link Delete
      include('delete.php');
      ?>
      
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>