<div class="jarak"></div>
<div class="album py-5 bg-light">
  <div class="container">

  <div class="row judul">  
    <div class="col-md-12 text-center">
      <h1><?= $title ?></h1>
    </div>
  </div>

  <div class="row">

    <?php foreach ($berita as $berita) { ?>

      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <img class="card-img-top" src="<?=base_url('assets/upload/image/thumbs/'.$berita->gambar)?>" alt="<?= $berita->judul_berita ?>">
          <div class="card-body">
            <h2><a href="<?= base_url('berita/read/'.$berita->slug_berita) ?>"><?= $berita->judul_berita ?></a></h2>
            <p class="card-text"><?= character_limiter(strip_tags($berita->isi_berita),200) ?></p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="<?= base_url('berita/read/'.$berita->slug_berita) ?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i> View</a>   
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php } ?>

  </div>

  <div class="row">
      <?php if(isset($paginasi) && $total > $limit) { ?>
          <div class="paginasi col-md-12 text-center">
       <?php echo $paginasi; ?>
          <div class="clearfix"></div>
          </div>
      <?php } ?>

  </div>

</div>
</div>