
<?php include __DIR__ . '/inc/header.php'; ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo $url; ?>">TypeAPI</a> / Integration</li>
  </ol>
</nav>

<div class="container">

  <h1 class="display-4">Ecosystem</h1>

  <p class="lead">The following page shows different services and tools working with the TypeAPI specification.</p>

  <hr>

  <h2>Services</h2>

  <a id="SDKgen"></a>
  <h3><a href="https://sdkgen.app/">SDKgen</a></h3>
  <p>SDKgen is a service which provides a code generator as REST API, you can consume the API either manually or through
  a simple <a href="https://github.com/apioo/sdkgen-cli">CLI app</a> which helps to integrate it into different
  environments. Besides this it also provides additional languages like Java and Go.</p>

  <a id="TypeHub"></a>
  <h3><a href="https://typehub.cloud/">TypeHub</a></h3>
  <p>TypeHub is a new platform to quickly build and share client SDKs and data models. It internally also uses the
  SDKgen API and covers the complete flow to manage and evolve your TypeAPI specification.</p>

  <a id="Fusio"></a>
  <h3><a href="https://www.fusio-project.org/">Fusio</a></h3>
  <p>Fusio is an open source API management platform which helps to create innovative API solutions. It is tightly
  integrated with TypeAPI and it can automatically generate a TypeAPI specification.</p>

  <hr>

  <h2>Tools</h2>

  <a id="TypeAPI-Editor"></a>
  <h3><a href="https://github.com/apioo/typeschema-angular-editor">TypeAPI-Editor</a></h3>
  <p>Angular component which allows you to build and view TypeAPI specifications. We provide a current version at
  our <a href="https://sandbox.typeapi.org/">Sandbox</a> page.</p>

  <a id="SDKgen-Generator-Action"></a>
  <h3><a href="https://github.com/apioo/sdkgen-generator-action">SDKgen-Generator-Action</a></h3>
  <p>GitHub action which allows you to generate code through a GitHub workflow action.</p>

  <a id="SDKgen-Generator-CLI"></a>
  <h3><a href="https://github.com/apioo/sdkgen-cli">SDKgen-Generator-CLI</a></h3>
  <p>A simple binary written in go which allows you to generate code.</p>

  <div class="typeschema-edit">
    <a href="https://github.com/apioo/typeapi/blob/main/www/resources/template/<?php echo pathinfo(__FILE__, PATHINFO_BASENAME); ?>"><i class="bi bi-pencil"></i> Edit this page</a>
  </div>
</div>

<?php include __DIR__ . '/inc/footer.php'; ?>
