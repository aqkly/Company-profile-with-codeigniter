<?php
//Notifikasi
if($this->session->flashdata('sukses')){
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}

// Error Warning
echo validation_errors('<div class="alert alert-warning">', '</div>');

//attribut
$attribut = '';
//form open
echo form_open(base_url('admin/profile'),$attribut);
?>

<div class="row">
<div class="col-md-6">

	<div class="form-group">
		<label>Nama User</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $user->nama ?>" required>
	</div>

	<div class="form-group">
		<label>Email User</label>
		<input type="text" name="email" class="form-control" placeholder="Email" value="<?= $user->email ?>" required>
	</div>

	<div class="form-group">
		<label>Hak Akses Level User</label>
		<input type="text" name="akses_level" class="form-control" value="<?= $user->akses_level ?>" readonly>
	</div>

</div>

<div class="col-md-6">

	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?= $user->username ?>" readonly>
	</div>

	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" placeholder="Password" value="<?= set_value('password') ?>">
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan">
		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
	</div>

</div>
</div>

<?php
//Form close
echo form_close();
?>