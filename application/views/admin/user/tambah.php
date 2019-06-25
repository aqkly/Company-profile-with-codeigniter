<?php
// Error Warning
echo validation_errors('<div class="alert alert-warning">', '</div>');

//attribut
$attribut = '';
//form open
echo form_open(base_url('admin/user/tambah'),$attribut);
?>

<div class="row">
<div class="col-md-6">

	<div class="form-group">
		<label>Nama User</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>" required>
	</div>

	<div class="form-group">
		<label>Email User</label>
		<input type="text" name="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>" required>
	</div>

	<div class="form-group">
		<label>Hak Akses Level User</label>
		<select name="akses_level" class="form-control">
			<option value="Admin">Admin</option>
			<option value="User">User</option>
		</select>
	</div>

</div>

<div class="col-md-6">

	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?= set_value('username') ?>" required>
	</div>

	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" placeholder="Password" value="<?= set_value('password') ?>" required>
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