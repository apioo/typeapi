
<?php include __DIR__ . '/inc/header.php'; ?>

<section class="section">
  <div class="container">
    <h1 class="title">Integration</h1>
    <p class="subtitle">The following page explains and shows examples how you can use the generated code.</p>
    <div class="columns mt-3">
      <div class="column is-half">
        <div class="menu">
          <p class="menu-label">Client</p>
          <ul class="menu-list">
              <?php foreach ($clientTypes as $type => $typeTitle): ?>
                <li><a href="<?php echo $router->getAbsolutePath([\App\Controller\Integration::class, 'showType'], ['type' => $type]); ?>"><?php echo $typeTitle; ?></a></li>
              <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <div class="column is-half">
        <div class="menu">
          <p class="menu-label">Server</p>
          <ul class="menu-list">
              <?php foreach ($serverTypes as $type => $typeTitle): ?>
                <li><a href="<?php echo $router->getAbsolutePath([\App\Controller\Integration::class, 'showType'], ['type' => $type]); ?>"><?php echo $typeTitle; ?></a></li>
              <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="typeschema-edit">
      <a href="https://github.com/apioo/typeapi/blob/main/www/resources/template/<?php echo pathinfo(__FILE__, PATHINFO_BASENAME); ?>"><i class="bi bi-pencil"></i> Edit this page</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/inc/footer.php'; ?>
