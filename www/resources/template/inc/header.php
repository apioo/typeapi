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
      <a class="nav-link" href="<?php echo $router->getAbsolutePath([\App\Controller\Ecosystem::class, 'show']); ?>">Ecosystem</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo $router->getAbsolutePath([\App\Controller\Generator::class, 'show']); ?>">Generator</a>
    </li>
  </ul>
  <a href="https://github.com/apioo/typeapi"><img src="<?php echo $base; ?>/img/github-32.png" width="32" height="32" alt="GitHub logo"></a>
</nav>
