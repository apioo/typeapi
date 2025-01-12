
<?php include __DIR__ . '/inc/header.php'; ?>

<section class="section">
  <div class="container">
    <h1 class="title">SDK Generator</h1>
    <p class="subtitle">This list gives you access to the reference code generator implementation.
      To prevent misuse the code generator is protected by recaptcha, if you want to invoke the code generator
      programmatically please take a look at the <a href="https://sdkgen.app/">SDKgen project</a>
      which offers various integration options like an CLI, GitHub action or REST API.</p>
    <div class="columns mt-3">
      <div class="column is-half">
        <div class="menu">
          <p class="menu-label">Client</p>
          <ul class="menu-list">
              <?php foreach ($clientTypes as $type => $typeTitle): ?>
                <li><a href="<?php echo $router->getAbsolutePath([\App\Controller\Generator::class, 'showType'], ['type' => $type]); ?>"><?php echo $typeTitle; ?></a></li>
              <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <div class="column is-half">
        <div class="menu">
          <p class="menu-label">Server</p>
          <ul class="menu-list">
              <?php foreach ($serverTypes as $type => $typeTitle): ?>
                <li><a href="<?php echo $router->getAbsolutePath([\App\Controller\Generator::class, 'showType'], ['type' => $type]); ?>"><?php echo $typeTitle; ?></a></li>
              <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/inc/footer.php'; ?>
