<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="jarak"></div>
<hr />
<div class="container marketing">

	<div class="row judul">  
    <div class="col-md-12 text-center">
      <h1><?= $title ?></h1>
    </div>
  	</div>
    <!-- Three columns of text below the carousel -->
    <div class="row">

      <div class="col-lg-4">

        <img class="img img-responsive img-thumbnail" src="<?= base_url('assets/upload/image/'.$layanan->gambar) ?>" alt="<?=$layanan->judul_layanan?>">
        
      
      </div><!-- /.col-lg-4 -->

      <div class="col-lg-8">

        <p><strong>Harga mulai dari: Rp. <?= number_format($layanan->harga,'0',',','.')?></strong></p>

        <hr/>

        <p><?= $layanan->isi_layanan ?></p>
      </div><!-- /.col-lg-8 -->
     
    </div><!-- /.row -->
</div>
<div class="jarak"></div>

