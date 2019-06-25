<?php 
//Menu Berita
$site_info = $this->konfigurasi_model->listing();
$menu_berita = $this->konfigurasi_model->menu_berita();
$menu_layanan = $this->konfigurasi_model->menu_layanan();
$menu_profil = $this->konfigurasi_model->menu_profil();
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" id="top">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url() ?>"><?= $site_info->namaweb ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">

        <!-- Home -->
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
        </li>

        <!-- Berita -->
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Berita</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">

          <?php foreach($menu_berita as $menu_berita) { ?>
          <a class="dropdown-item" href="<?= base_url('berita/kategori/'.$menu_berita->slug_kategori) ?>"><?= $menu_berita->nama_kategori ?></a>
          <?php } ?>

          <a class="dropdown-item" href="<?= base_url('berita') ?>">Index Berita</a>
        </div>
      </li>

      <!-- Services -->
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Layanan</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">

          <?php foreach($menu_layanan as $menu_layanan) { ?>
          <a class="dropdown-item" href="<?= base_url('layanan/read/'.$menu_layanan->slug_layanan) ?>"><?= $menu_layanan->judul_layanan ?></a>
          <?php } ?>

          <a class="dropdown-item" href="<?= base_url('layanan') ?>">Index Layanan</a>
        </div>
      </li>

        <!-- Profil -->
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">

          <?php foreach($menu_profil as $menu_profil) { ?>
          <a class="dropdown-item" href="<?= base_url('berita/read/'.$menu_profil->slug_berita) ?>"><?= $menu_profil->judul_berita ?></a>
          <?php } ?>

        </div>
      </li>

        <!-- Kontak -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('kontak') ?>">Kontak</a>
        </li>
      </ul>    
    </div>
  </div>
</nav>
