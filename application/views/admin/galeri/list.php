<?php
//Notifikasi
if($this->session->flashdata('sukses')){
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>

<p>
  <a href="<?= base_url('admin/galeri/tambah') ?>" title="Tambah Data Galeri" class="btn btn-success">
    <i class="fa fa-plus"></i> Tambah Baru
  </a>
</p>

 <table id="example1" class="table table-bordered table-striped table-responsive">
  <thead>
    <tr>
      <th width="5%">No</th>
      <th>Gambar</th>
      <th>Judul galeri</th>
      <th>Posisi</th>
      <th>Website</th>
      <th>Penulis</th>
      <th>Tanggal</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
    foreach ($galeri as $galeri) {
    ?>
    <tr>
      <td><?= $i++ ?></td>
      <td><img src="<?= base_url('assets/upload/image/thumbs/'.$galeri->gambar) ?>" width="60" class="img img-thumbnail"></td>
      <td><?= $galeri->judul_galeri ?></td>
      <td><?= $galeri->posisi_galeri ?></td>
      <td><?= $galeri->website ?></td>
      <td><?= $galeri->nama ?></td>
      <td><?= $galeri->tanggal_post ?></td>
      <td>
        
      <a href="<?= base_url('admin/galeri/edit/'.$galeri->id_galeri) ?>" title="Edit Galeri" class="btn btn-warning btn-xs">
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