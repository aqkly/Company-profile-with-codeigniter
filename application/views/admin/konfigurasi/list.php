<?php
//Notifikasi
if($this->session->flashdata('sukses')){
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}

//Error Warning
echo validation_errors('<div class="alert alert-warning">','</div>');

//Error Upload
if(isset($error_upload)){
	echo '<div class="alert alert-warning">'.$error_upload.'</div>';
}

//Atribut
$attribut = 'class="alert alert-info"';
//form open
echo form_open(base_url('admin/konfigurasi'),$attribut);
?>

<input type="hidden" name="id_konfigurasi" value="<?= $konfigurasi->id_konfigurasi ?>">
<input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user'); ?>">

<div class="col-md-6">

	<div class="form-group">
		<label>Nama Perusahaan / Organisasi</label>
		<input type="text" name="namaweb" class="form-control" placeholder="Nama Web" value="<?= $konfigurasi->namaweb ?>">
	</div>

	<div class="form-group">
		<label>Tagline Perusahaan / Organisasi</label>
		<input type="text" name="tagline" class="form-control" placeholder="TAgline" value="<?= $konfigurasi->tagline ?>">
	</div>

	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="Email Perusahaan" value="<?= $konfigurasi->email ?>">
	</div>

	<div class="form-group">
		<label>Telepon</label>
		<input type="number" name="telepon" class="form-control" placeholder="Telepon Perusahaan" value="<?= $konfigurasi->telepon ?>">
	</div>

	<div class="form-group">
		<label>Website</label>
		<input type="url" name="website" class="form-control" placeholder="<?= base_url() ?>" value="<?= $konfigurasi->website ?>">
	</div>

	<div class="form-group">
		<label>Facebook URL</label>
		<input type="url" name="facebook" class="form-control" placeholder="Facebook URL" value="<?= $konfigurasi->facebook ?>">
	</div>

	<div class="form-group">
		<label>Instagram URL</label>
		<input type="url" name="instagram" class="form-control" placeholder="Instagram URL" value="<?= $konfigurasi->instagram ?>">
	</div>

</div>

<div class="col-md-6">

	<div class="form-group">
		<label>Deskripsi Perusahaan / Organisasi / Website</label>
		<textarea name="deskripsi" class="form-control" placeholder="Deskripsi"><?= $konfigurasi->deskripsi ?></textarea>
	</div>

	<div class="form-group">
		<label>Keywords SEO Google</label>
		<textarea name="keywords" class="form-control" placeholder="Keywords"><?= $konfigurasi->keywords ?></textarea>
	</div>

	<div class="form-group">
		<label>Alamat Perusahaan / Organisasi / Website</label>
		<textarea name="alamat" class="form-control" placeholder="Alamat Perusahaan"><?= $konfigurasi->alamat ?></textarea>
	</div>

	<div class="form-group">
		<label>Deskripsi Perusahaan / Organisasi / Website</label>
		<textarea name="deskripsi" class="form-control" placeholder="Deskripsi"><?= $konfigurasi->deskripsi ?></textarea>
	</div>

	<div class="form-group">
		<label>Meta Text (dari Google Analistics)</label>
		<textarea name="metatext" class="form-control" placeholder="Metatext"><?= $konfigurasi->metatext ?></textarea>
	</div>

	<div class="form-group">
		<label>Google Map</label>
		<textarea name="map" class="form-control" placeholder="Google Map"><?= $konfigurasi->map ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Konfigurasi">
	</div>

</div>

<div class="clearfix"></div>

<?php
//form close
echo form_close();
?>