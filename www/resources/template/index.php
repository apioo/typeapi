
<?php include __DIR__ . '/inc/header.php'; ?>

<?php foreach($examples as $key => $example): ?>
<section class="section">
  <div class="container">
    <h1 class="title"><?php echo $example->title; ?></h1>
    <p class="subtitle"><?php echo $example->description; ?></p>
    <div class="columns">
      <div class="column is-half">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">TypeAPI</p>
          </header>
          <div class="card-content">
            <pre class="typeapi-example"><code class="json"><?php echo $example->schema; ?></code></pre>
          </div>
        </div>
      </div>
      <div class="column is-half">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">Client SDK</p>
          </header>
          <div class="card-content">
            <pre class="typeapi-example"><code class="javascript"><?php echo htmlspecialchars($example->code); ?></code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endforeach; ?>

<section class="section">
  <div class="container">
    <h1 class="title">Code-Generator</h1>
    <p class="subtitle">Through TypeAPI it is possible to generate fully type-safe client/server pairs using proven technology.</p>
    <table class="table is-striped is-bordered is-fullwidth">
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
</section>

<div class="container">
  <div class="typeschema-edit">
    <a href="https://github.com/apioo/typeapi/blob/main/www/resources/template/<?php echo pathinfo(__FILE__, PATHINFO_BASENAME); ?>"><i class="bi bi-pencil"></i> Edit this page</a>
  </div>
</div>

<script>window.addEventListener('load', function() { hljs.highlightAll() });</script>

<?php include __DIR__ . '/inc/footer.php'; ?>
