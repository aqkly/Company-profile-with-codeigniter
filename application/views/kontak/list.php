<!-- Album -->
<div class="jarak"></div>
<div class="album py-5 bg-light">
  <div class="container">

  <div class="row judul">  
    <div class="col-md-12 text-center">
      <h1><?= $title ?></h1>
    </div>
  </div>
  <p>
    
  </p>
  <div class="row artikel">

    <div class="col-md-5">
    <!-- Map dari Google Map -->
    <?= $konfigurasi->map ?>
    </div>

    <div class="col-md-7">
    <p>
      <strong><?= $konfigurasi->namaweb?></strong>
          <br><?= nl2br($konfigurasi->alamat)?>
          <br><i class="fa fa-phone"></i> <?= $konfigurasi->telepon?>
          <br><i class="fa fa-envelope"></i> <?= $konfigurasi->email?>
          <br><i class="fa fa-globe"></i> <?= $konfigurasi->website?> 
    </p>    
    <hr>
    <p>Anda dapat menghubungi kami melalui formulir di bawah ini</p> 
    
    <form action="#" method="post" class="alert alert-info">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Nama Anda</label>
          <input type="text" name="nama" class="form-control" placeholder="Nama" required>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label>Email Anda</label>
          <input type="email" name="email" class="form-control" placeholder="email" required>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <label>Pesan Anda</label>
          <textarea name="pesan" class="form-control" placeholder="Pesan Anda" required></textarea>
        </div>

        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-success btn-lg" value="Kirim Pesan">
        </div>
      </div>

    </div>
    </form>
    </div>
     <div class="clearfix"></div>

  </div>

    
  </div>
</div>

