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
echo form_open_multipart(base_url('admin/konfigurasi/logo'),$attribut);
?>

<input type="hidden" name="id_konfigurasi" value="<?= $konfigurasi->id_konfigurasi ?>">
<input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user'); ?>">

<div class="col-md-6">

	<div class="form-group">
		<label>Logo Perusahaan / Organisasi</label>
		<input type="file" name="logo" class="form-control" required="required">
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Konfigurasi">
	</div>

</div>

<div class="col-md-6">
	
	<?php if($konfigurasi->logo != "") { ?>
	<img src="<?= base_url('assets/upload/image/'.$konfigurasi->logo) ?>" alt="<?= $konfigurasi->namaweb ?>" class="img img-responsive img-thumbnail">
	<?php }else{ ?>

	<p class="alert alert-success text-center">Belum ada Logo</p>

	<?php } ?>

</div>

<div class="clearfix"></div>

<?php
//form close
echo form_close();
?>