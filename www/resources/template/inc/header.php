<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="An OpenAPI alternative to describe REST APIs for type-safe code generation.">
  <meta name="keywords" content="OpenAPI, TypeAPI, REST, API, Code-Generation">
  <title><?php echo $title ?? 'TypeAPI'; ?></title>
  <link rel="preload" href="<?php echo $base; ?>/css/app.min.css" as="style" />
  <link rel="preload" href="<?php echo $base; ?>/js/app.min.js" as="script" />
  <link rel="stylesheet" href="<?php echo $base; ?>/css/app.min.css">
  <link rel="canonical" href="<?php echo $router->getUrl($method, isset($parameters) ? (array) $parameters : []); ?>">
  <script async src="<?php echo $base; ?>/js/app.min.js"></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-8CL7811MFT"></script>
<?php if (isset($js) && is_array($js)): ?>
<?php foreach ($js as $link): ?><script src="<?php echo $link; ?>"></script>
<?php endforeach; ?>
<?php endif; ?>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-8CL7811MFT', { 'anonymize_ip': true });
  </script>
</head>
<body>

<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="<?php echo $url; ?>"><b>TypeAPI</b></a>
    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="<?php echo $router->getAbsolutePath([\App\Controller\Specification::class, 'show']); ?>">Specification</a>
      <a class="navbar-item" href="<?php echo $router->getAbsolutePath([\App\Controller\Ecosystem::class, 'show']); ?>">Ecosystem</a>
      <a class="navbar-item" href="<?php echo $router->getAbsolutePath([\App\Controller\Integration::class, 'show']); ?>">Integration</a>
      <a class="navbar-item" href="<?php echo $router->getAbsolutePath([\App\Controller\Generator::class, 'show']); ?>">Generator</a>
    </div>
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a href="https://github.com/apioo/typeapi">
            <img src="<?php echo $base; ?>/img/github-32.png" width="32" height="32" alt="GitHub logo">
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>

<section class="section typeapi-header">
  <div class="container">
    <h1 class="title has-text-light">TypeAPI</h1>
    <p class="subtitle has-text-light">An OpenAPI alternative to describe REST APIs for type-safe code generation.</p>
    <a href="<?php echo $router->getAbsolutePath([\App\Controller\Specification::class, 'show']); ?>" class="button is-primary">Specification</a>
    <a href="https://sandbox.typeapi.org" class="button">Editor</a>
    <a href="<?php echo $router->getAbsolutePath([\App\Controller\Generator::class, 'show']); ?>" class="button">Generator</a>
  </div>
</section>
