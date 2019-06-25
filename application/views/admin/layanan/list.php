<?php
//Notifikasi
if($this->session->flashdata('sukses')){
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>

<p>
  <a href="<?= base_url('admin/layanan/tambah') ?>" title="Tambah Data Layanan" class="btn btn-success">
    <i class="fa fa-plus"></i> Tambah Baru
  </a>
</p>

 <table id="example1" class="table table-bordered table-striped table-responsive">
  <thead>
    <tr>
      <th width="5%">No</th>
      <th>Gambar</th>
      <th>Nama layanan</th>
      <th>Status</th>
      <th>Harga</th>
      <th>Penulis</th>
      <th>Tanggal</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
    foreach ($layanan as $layanan) {
    ?>
    <tr>
      <td><?= $i++ ?></td>
      <td><img src="<?= base_url('assets/upload/image/thumbs/'.$layanan->gambar) ?>" width="60" class="img img-thumbnail"></td>
      <td><?= $layanan->judul_layanan ?></td>
      <td><?= $layanan->status_layanan ?></td>
      <td>Rp. <?= number_format($layanan->harga,'0',',','.') ?></td>
      <td><?= $layanan->nama ?></td>
      <td><?= $layanan->tanggal_post ?></td>
      <td>
        
      <a href="<?= base_url('admin/layanan/edit/'.$layanan->id_layanan) ?>" title="Edit Layanan" class="btn btn-warning btn-xs">
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