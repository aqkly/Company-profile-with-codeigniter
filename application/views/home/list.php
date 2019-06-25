<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">

    <?php $i=1;foreach ($slider as $slider) { ?>

    <div class="carousel-item <?php if($i==1){ echo 'active'; } ?>">
      <img class="first-slide" src="<?= base_url('assets/upload/image/'.$slider->gambar) ?>" alt="<?= $slider->judul_galeri ?>">
      <div class="container">
        <div class="carousel-caption col-md-6 text-left">
          <h1><?= $slider->judul_galeri ?></h1>
          <p><?= character_limiter(strip_tags($slider->isi_galeri),200) ?></p>

          <p><a class="btn btn-lg btn-primary" href="<?= $slider->website ?>" target="_blank" role="button">Sign up today</a></p>
        </div>
      </div>
    </div>

    <?php $i++; } ?>

  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">

      <?php foreach($layanan as $layanan) { ?>

      <div class="col-lg-4">
        <img class="rounded-circle" src="<?= base_url('assets/upload/image/thumbs/'.$layanan->gambar) ?>" alt="<?= $layanan->judul_layanan ?>" width="140" height="140">
        <h2><?= $layanan->judul_layanan ?></h2>
        <p><?= character_limiter($layanan->isi_layanan,300) ?></p>
        <p><a class="btn btn-success" href="<?= base_url('layanan/read/'.$layanan->slug_layanan) ?>" role="button">
          <i class="fa fa-forward"></i> View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->

      <?php } ?>
      
    </div><!-- /.row -->
</div>

<!-- Album -->

<div class="album py-5 bg-light">
  <div class="container">

  <div class="row judul">  
    <div class="col-md-12 text-center">
      <h1>Selamat Datang Di Website Kami</h1>
    </div>
  </div>

    <div class="row">

      <?php foreach ($berita as $berita) { ?>

      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <img class="card-img-top" src="<?= base_url('assets/upload/image/thumbs/'.$berita->gambar) ?>" alt="<?= $berita->judul_berita ?>">
          <div class="card-body">
            <h2><a href="<?= base_url('berita/read/'.$berita->slug_berita) ?>"><?= $berita->judul_berita ?></a></h2>
            <p class="card-text"><?= character_limiter(strip_tags($berita->isi_berita),200) ?></p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="<?= base_url('berita/read/'.$berita->slug_berita) ?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i> Detail</a>   
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php } ?>
     
    </div>
  
  </div>
</div>
