
<?php include __DIR__ . '/inc/header.php'; ?>

<div class="jumbotron">
  <div class="container" style="text-align: center">
    <h1 class="display-4">TypeAPI</h1>
    <p class="lead">A specification to describe REST APIs for automatic client SDK generation.</p>
    <p>
      <a class="btn btn-primary" href="<?php echo $router->getAbsolutePath([\App\Controller\Specification::class, 'show']); ?>" role="button">Specification</a>
      <a class="btn btn-secondary" href="<?php echo $router->getAbsolutePath([\App\Controller\Generator::class, 'show']); ?>" role="button">Generator</a>
    </p>
  </div>
</div>

<div class="container">
  <?php foreach($examples as $key => $example): ?>
  <div class="row">
    <div class="col-12">
      <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <h2 class="display-5"><?php echo $example->title; ?></h2>
      <p class="lead"><?php echo $example->description; ?></p>
      </div>
    </div>
    <div class="col-6">
      <div class="psx-object">
        <h1>TypeAPI</h1>
        <div class="example-box"><pre><code class="json"><?php echo $example->schema; ?></code></pre></div>
      </div>
    </div>
    <div class="col-6">
      <div class="psx-object">
        <h1>Client SDK</h1>
        <div class="example-box"><pre><code class="javascript"><?php echo htmlspecialchars($example->code); ?></code></pre></div>
      </div>
    </div>
  </div>
  <hr>
  <?php endforeach; ?>

  <div class="typeschema-edit">
    <a href="https://github.com/apioo/typeapi/blob/main/www/resources/template/<?php echo pathinfo(__FILE__, PATHINFO_BASENAME); ?>"><i class="bi bi-pencil"></i> Edit this page</a>
  </div>
</div>

<script>hljs.initHighlightingOnLoad();</script>

<?php include __DIR__ . '/inc/footer.php'; ?>
