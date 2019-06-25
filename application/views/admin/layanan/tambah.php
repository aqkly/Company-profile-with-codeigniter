<?php
// Error Warning
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Error Upload
if(isset($error_upload)) {
	echo '<div class="alert alert-warning">'.$error_upload.'</div>';
}

//attribut
$attribut = 'class="alert alert-info"';
//form open
echo form_open_multipart(base_url('admin/layanan/tambah'),$attribut);
?>

<div class="col-md-8">
	<div class="form-group form-group-lg">
		<label>Judul Layanan</label>
		<input type="text" name="judul_layanan" class="form-control" placeholder="Judul Layanan" value="<?= set_value('judul_layanan') ?>" required>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group form-group-lg">
		<label>Status Layanan</label>
		<select name="status_layanan" class="form-control">
			<option value="Publish">Publish</option>
			<option value="Draft">Draft</option>
		</select>
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Harga Layanan</label>
		<input type="number" name="harga" class="form-control" placeholder="Harga" value="<?= set_value('harga') ?>">
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Upload Gambar</label>
		<input type="file" name="gambar" class="form-control" required>
	</div>
</div>

<div class="col-md-12">
	<div class="form-group">
		<label>Isi Layanan</label>
		<textarea name="isi_layanan" class="form-control tinymce" placeholder="Isi Layanan"><?= set_value('isi_layanan') ?></textarea>
	</div>

	<div class="form-group">
		<label>Keywords Layanan (Untuk SEO Layanan)</label>
		<textarea name="keywords" class="form-control" placeholder="Keywords Layanan"><?= set_value('keywords') ?></textarea>
	</div>

	<div class="form-group text-right">
		<button type="submit" name="submit" class=" btn btn-success btn-lg">
			<i class="fa fa-save"></i> Simpan Layanan			
		</button>
		<button type="reset" name="reset" class=" btn btn-default btn-lg">
			<i class="fa fa-times"></i> Reset			
		</button>
	</div>
</div>

<div class="clearfix"></div>
<?php
//form close
echo form_close();
?>