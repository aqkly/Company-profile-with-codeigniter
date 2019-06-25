<!-- Album -->
<div class="jarak"></div>
<div class="album py-5 bg-light">
  <div class="container">

  <div class="row judul">  
    <div class="col-md-12 text-center">
      <h1><?= $title ?></h1>
    </div>
  </div>

  <div class="row artikel">

    <div class="col-md-8">
      <p><img src="<?=base_url('assets/upload/image/'.$berita->gambar) ?>" alt="<?= $berita->judul_berita ?>" class="img img-thumbnail img-responsive"></p>

      <?= $berita->isi_berita ?>

    </div>

    <div class="col-md-4">
      <aside>
        <h3>Berita Lainya:</h3>
        <ul>
          <?php foreach($listing as $listing) { ?>

           <li><a href="<?= base_url('berita/read/'.$listing->slug_berita) ?>"><?= $listing->judul_berita ?></a></li>

          <?php } ?>
        </ul>
      </aside>
    </div>
    <div class="clearfix"></div>

  </div>

    
  </div>
</div>
