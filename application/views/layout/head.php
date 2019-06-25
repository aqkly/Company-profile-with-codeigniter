<?php
$site_info = $this->konfigurasi_model->listing();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title ?></title>
	<!-- Icon -->
	<link rel="shortcut icon" href="<?= base_url('assets/upload/image/'.$site_info->icon) ?>">
	<!-- Deskription -->
	<meta name="description" content="<?= $site_info->deskripsi ?>">
	<!-- Keywords -->
	<meta name="keywords" content="<?= $title.', '.$site_info->keywords ?>">
	<!-- Author -->
	<meta name="author" content="<?= $title ?>">
	<!-- CSS Bootstrap -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/template/css/bootstrap.min.css">
	<!-- CSS Buatan Sendiri -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/template/css/style.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/template/font-awesome/css/font-awesome.min.css">
</head>
<body>
