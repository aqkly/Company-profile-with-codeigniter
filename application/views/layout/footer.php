<?php
$site_info = $this->konfigurasi_model->listing();
?>

<div class="clearfix"></div>
<!-- Footer -->
<footer class="footer">
  <div class="container">
    <p class="float-right"><a href="#top">Back to top</a></p>
    <p>&copy; <?= date('Y') ?> <?= $site_info->namaweb ?> - <?= $site_info->tagline ?> &middot; 
    	<a href="<?= base_url('berita') ?>">Berita</a> |
    	<a href="<?= base_url('layanan') ?>">Layanan</a> |
    	<a href="<?= base_url('profil') ?>">Profil Kami</a> |
    	<a href="<?= base_url('kontak') ?>">Kontak</a>
    </p>
  </div>
</footer>


</body>
<!-- Load Javascript jquery -->
<script src="<?= base_url() ?>assets/template/jquery-ui/external/jquery/jquery.js" type="text/javascript"></script>
<!-- Load Javascript bootstrap -->
<script src="<?= base_url() ?>assets/template/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Holder JS -->
<script src="<?= base_url() ?>assets/template/bootstrap/site/docs/4.1/assets/js/vendor/holder.min.js"></script>

</html>