<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="<?php echo $base; ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $base; ?>/css/highlight.min.css">
  <link rel="stylesheet" href="<?php echo $base; ?>/css/app.css">
  <link rel="canonical" href="<?php echo $router->getUrl($method); ?>">
  <script src="<?php echo $base; ?>/js/highlight.min.js"></script>
  <script src="<?php echo $base; ?>/js/jquery.min.js"></script>
  <script src="<?php echo $base; ?>/js/popper.min.js"></script>
  <script src="<?php echo $base; ?>/js/bootstrap.min.js"></script>
  <title>TypeAPI</title>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-BB1NL30RKL"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-BB1NL30RKL', { 'anonymize_ip': true });
  </script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo $url; ?>">TypeAPI</a>
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo $router->getAbsolutePath([\App\Controller\Index::class, 'show']); ?>">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo $router->getAbsolutePath([\App\Controller\Specification::class, 'show']); ?>">Specification</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo $router->getAbsolutePath([\App\Controller\Generator::class, 'show']); ?>">Generator</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo $router->getAbsolutePath([\App\Controller\Faq::class, 'show']); ?>">FAQ</a>
    </li>
  </ul>
  <a href="https://github.com/apioo/typeapi"><img src="<?php echo $base; ?>/img/github-32.png"></a>
</nav>
