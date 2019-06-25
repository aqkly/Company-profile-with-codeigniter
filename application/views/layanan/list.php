<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->


<div class="jarak"></div>
<hr>
<div class="container marketing">

	<div class="row judul">  
    <div class="col-md-12 text-center">
      <h1><?= $title ?></h1>
    </div>
  	</div>
    <!-- Three columns of text below the carousel -->
    <div class="row">

      <?php foreach ($layanan as $layanan) { ?>

      <div class="col-lg-4">
        <img class="rounded-circle" src="<?= base_url('assets/upload/image/thumbs/'.$layanan->gambar) ?>" alt="<?=$layanan->judul_layanan?>" width="140" height="140">
        <h2><?=$layanan->judul_layanan?></h2>
        <p><?=strip_tags(character_limiter($layanan->isi_layanan,250))?></p>
        <p><a class="btn btn-success" href="<?= base_url('layanan/read/'.$layanan->slug_layanan) ?>" role="button">
          <i class="fa fa-forward"></i> View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->

      <?php } ?>
     
    </div><!-- /.row -->

    <div class="row">
      <?php if(isset($paginasi) && $total > $limit) { ?>
          <div class="paginasi col-md-12 text-center">
       <?php echo $paginasi; ?>
          <div class="clearfix"></div>
          </div>
      <?php } ?>

    </div>

</div>
<div class="jarak"></div>
