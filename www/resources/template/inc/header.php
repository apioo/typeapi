<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="An OpenAPI alternative to describe REST APIs for type-safe code generation.">
  <meta name="keywords" content="OpenAPI, TypeAPI, REST, API, Code-Generation">
  <title><?php echo $title ?? 'TypeAPI'; ?></title>
  <link rel="preload" href="<?php echo $base; ?>/dist/app.min.css" as="style" />
  <link rel="preload" href="<?php echo $base; ?>/dist/app.min.js" as="script" />
  <link rel="stylesheet" href="<?php echo $base; ?>/dist/app.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;family=Hanken+Grotesk:wght@600;700&amp;family=JetBrains+Mono:wght@400;600&amp;display=swap" />
  <link rel="canonical" href="<?php echo $router->getUrl($method, isset($parameters) ? (array) $parameters : []); ?>">
  <script async src="<?php echo $base; ?>/dist/app.min.js"></script>
<?php if (isset($js) && is_array($js)): ?>
<?php foreach ($js as $link): ?><script src="<?php echo $link; ?>"></script>
<?php endforeach; ?>
<?php endif; ?>
  <script>
    var _paq = window._paq = window._paq || [];
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u="//matomo.apioo.de/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '4']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
  </script>
</head>
<body class="bg-surface-deep text-on-surface font-body-md selection:bg-primary/30 selection:text-primary overflow-x-hidden">

<header class="fixed top-0 w-full z-50 bg-surface-deep border-b border-border-subtle">
    <div class="flex justify-between items-center px-margin-mobile h-16 w-full max-w-container-max mx-auto">
        <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-primary font-headline-md text-headline-md" data-icon="terminal">terminal</span>
            <span class="font-headline-md text-headline-md font-bold text-primary"><a href="<?php echo $url; ?>">TypeAPI</a></span>
        </div>
        <nav class="hidden md:flex items-center gap-stack-lg">
            <a class="font-label-caps text-label-caps text-on-surface-variant hover:text-primary transition-colors" href="<?php echo $router->getAbsolutePath([\App\Controller\Specification::class, 'show']); ?>">Specification</a>
            <a class="font-label-caps text-label-caps text-on-surface-variant hover:text-primary transition-colors" href="<?php echo $router->getAbsolutePath([\App\Controller\Ecosystem::class, 'show']); ?>">Ecosystem</a>
            <a class="font-label-caps text-label-caps text-on-surface-variant hover:text-primary transition-colors" href="<?php echo $router->getAbsolutePath([\App\Controller\Integration::class, 'show']); ?>">Integration</a>
            <a class="flex items-center gap-2 px-4 py-2 bg-surface-elevated border border-border-subtle rounded-xl hover:bg-surface-container-high transition-all" href="https://github.com/apioo/typeapi" target="_blank">
                <span class="material-symbols-outlined text-sm" data-icon="star">star</span>
                <span class="font-label-caps text-label-caps">GitHub</span>
            </a>
        </nav>
        <button class="md:hidden p-2 text-on-surface-variant">
            <span class="material-symbols-outlined" data-icon="menu">menu</span>
        </button>
    </div>
</header>
