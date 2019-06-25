<?php
//Notifikasi
if($this->session->flashdata('sukses')){
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}

//validasi
echo validation_errors('<div class="alert alert-warning">','</div>');

//include ambah
include('tambah.php');
?>

<br>
<hr>

 <table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th width="5%">No</th>
      <th>Nama kategori</th>
      <th>Slug Kategori</th>
      <th>Nomor Urut</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
    foreach ($kategori as $kategori) {
    ?>
    <tr>
      <td><?= $i++ ?></td>
      <td><?= $kategori->nama_kategori ?></td>
      <td><?= $kategori->slug_kategori ?></td>
      <td><?= $kategori->urutan ?></td>
      <td>
        
      <a href="<?= base_url('admin/kategori/edit/'.$kategori->id_kategori) ?>" title="Edit Kategori" class="btn btn-warning btn-xs">
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