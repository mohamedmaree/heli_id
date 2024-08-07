<!DOCTYPE html>
<html lang="<?php echo e(lang()); ?>" style="scroll-behavior: smooth">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo e(asset('intro_site/vendor/animate.css/animate.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('intro_site/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('intro_site/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('intro_site/vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('intro_site/vendor/glightbox/css/glightbox.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('intro_site/vendor/remixicon/remixicon.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('intro_site/vendor/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Template Main CSS File -->
  
  
  
  <link href="<?php echo e(asset('intro_site/css/style.css')); ?>" rel="stylesheet">
  
  

    <meta name="description"          content="<?php echo e($settings['intro_meta_description']); ?>" />
    <meta name="keywords"             content="<?php echo e($settings['intro_meta_keywords']); ?>" />

    <meta property="fb:app_id"        content="140586622674265" />
    <meta property="og:type"          content="website" />
    <meta property="og:url"           content="<?php echo e(Request::url()); ?>" />

    <meta property="og:title"         content="<?php echo e($settings['intro_name_'.lang()]); ?>" />
    <meta property="og:description"   content="<?php echo e($settings['intro_meta_description']); ?>" />
    <meta property="og:image"         content="<?php echo e($settings['intro_logo']); ?>"/>
    <meta property="og:width"         content="200"/>
    <meta property="og:height"        content="200"/>

    <title><?php echo e($settings['intro_name_'.lang()]); ?></title>
    <!-- title logo -->
    <link rel="icon"  href="<?php echo e($settings['fav_icon']); ?>" type="image/x-icon" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  </head>

<body><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/intro_site/layouts/header.blade.php ENDPATH**/ ?>