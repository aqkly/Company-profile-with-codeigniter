<?php
//Notifikasi
if($this->session->flashdata('sukses')){
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>

<p>
  <a href="<?= base_url('admin/user/tambah') ?>" title="Tambah Data User" class="btn btn-success">
    <i class="fa fa-plus"></i> Tambah Baru
  </a>
</p>

 <table id="example1" class="table table-bordered table-striped table-responsive">
  <thead>
    <tr>
      <th width="5%">No</th>
      <th>Nama</th>
      <th>email</th>
      <th>Username - Level</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
    foreach ($user as $user) {
    ?>
    <tr>
      <td><?= $i++ ?></td>
      <td><?= $user->nama ?></td>
      <td><?= $user->email ?></td>
      <td><?= $user->username ?> - <?= $user->akses_level ?></td>
      <td>
        
      <a href="<?= base_url('admin/user/edit/'.$user->id_user) ?>" title="Edit User" class="btn btn-warning btn-xs">
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