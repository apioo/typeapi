
<?php include __DIR__ . '/inc/header.php'; ?>

<div class="jumbotron" style="background:url('<?php echo $base; ?>/img/header_bg.png');background-size:cover;background-repeat:no-repeat;background-position:top center;background-color:#222;border-radius:0">
  <div class="container" style="text-align: center">
    <h1 class="display-4 text-white">TypeAPI</h1>
    <p class="lead text-white">An OpenAPI alternative to describe REST APIs for type-safe code generation.</p>
    <p>
      <a class="btn btn-primary" href="<?php echo $router->getAbsolutePath([\App\Controller\Specification::class, 'show']); ?>" role="button">Specification</a>
      <a class="btn btn-secondary" href="https://sandbox.typeapi.org" role="button">Editor</a>
      <a class="btn btn-secondary" href="<?php echo $router->getAbsolutePath([\App\Controller\Generator::class, 'show']); ?>" role="button">Generator</a>
    </p>
  </div>
</div>

<?php foreach($examples as $key => $example): ?>
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <h2 class="display-5"><?php echo $example->title; ?></h2>
        <p class="lead"><?php echo $example->description; ?></p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="psx-object">
        <h1>TypeAPI</h1>
        <div class="example-box"><pre><code class="json"><?php echo $example->schema; ?></code></pre></div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="psx-object">
        <h1>Client SDK</h1>
        <div class="example-box"><pre><code class="javascript"><?php echo htmlspecialchars($example->code); ?></code></pre></div>
      </div>
    </div>
  </div>
</div>
<hr>
<?php endforeach; ?>


<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <h2 class="display-5">Code-Generator</h2>
        <p class="lead">Through TypeAPI it is possible to generate fully type-safe client/server pairs using proven technology.</p>
      </div>
      <table class="table">
        <thead>
        <tr>
          <th>Language</th>
          <th>Client</th>
          <th>Server</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>C#</td>
          <td><a href="https://learn.microsoft.com/de-de/dotnet/api/system.net.http.httpclient">HttpClient</a></td>
          <td><a href="https://asp.net/web-api">ASP Web-API</a></td>
        </tr>
        <tr>
          <td>Java</td>
          <td><a href="https://hc.apache.org/index.html">Apache HttpClient</a></td>
          <td><a href="https://spring.io/">Spring</a></td>
        </tr>
        <tr>
          <td>JavaScript</td>
          <td><a href="https://axios-http.com/">Axios</a></td>
          <td><a href="https://nestjs.com/">NestJS</a></td>
        </tr>
        <tr>
          <td>PHP</td>
          <td><a href="https://docs.guzzlephp.org/en/stable/">Guzzle</a></td>
          <td><a href="https://symfony.com/">Symfony</a></td>
        </tr>
        <tr>
          <td>Python</td>
          <td><a href="https://requests.readthedocs.io/en/latest/">Requests</a></td>
          <td><a href="https://fastapi.tiangolo.com/">FastAPI</a></td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<hr>

<div class="container">
  <div class="typeschema-edit">
    <a href="https://github.com/apioo/typeapi/blob/main/www/resources/template/<?php echo pathinfo(__FILE__, PATHINFO_BASENAME); ?>"><i class="bi bi-pencil"></i> Edit this page</a>
  </div>
</div>

<script>window.addEventListener('load', function() { hljs.highlightAll() });</script>

<?php include __DIR__ . '/inc/footer.php'; ?>
