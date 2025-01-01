
<?php include __DIR__ . '/inc/header.php'; ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo $url; ?>">TypeAPI</a> / Ecosystem</li>
  </ol>
</nav>


<div class="container">
  <h1 class="display-4">Ecosystem</h1>
  <p class="lead">The following page lists libraries and other projects related to TypeSchema.</p>

  <h2>Model</h2>
  <p>We provide auto-generated models of the TypeAPI meta specification which describes itself.
    These models can be used to parse or generate a TypeAPI specification.</p>
  <table class="table table-striped">
    <colgroup>
      <col class="w-25">
      <col class="w-25">
      <col class="w-25">
    </colgroup>
    <thead>
    <tr>
      <th>Language</th>
      <th>GitHub</th>
      <th>Package</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>C#</td>
      <td><a href="https://github.com/apioo/typeapi-model-csharp">GitHub</a></td>
      <td><a href="https://www.nuget.org/packages/TypeAPI.Model/">Nuget</a></td>
    </tr>
    <tr>
      <td>Go</td>
      <td><a href="https://github.com/apioo/typeapi-model-go">GitHub</a></td>
      <td></td>
    </tr>
    <tr>
      <td>Java</td>
      <td><a href="https://github.com/apioo/typeapi-model-java">GitHub</a></td>
      <td><a href="https://central.sonatype.com/artifact/org.typeapi/model">Maven</a></td>
    </tr>
    <tr>
      <td>JavaScript</td>
      <td><a href="https://github.com/apioo/typeapi-model-javascript">GitHub</a></td>
      <td><a href="https://www.npmjs.com/package/typeapi-model">NPM</a></td>
    </tr>
    <tr>
      <td>PHP</td>
      <td><a href="https://github.com/apioo/typeapi-model-php">GitHub</a></td>
      <td><a href="https://packagist.org/packages/typeapi/model">Packagist</a></td>
    </tr>
    <tr>
      <td>Python</td>
      <td><a href="https://github.com/apioo/typeapi-model-python">GitHub</a></td>
      <td><a href="https://pypi.org/project/typeapi-model/">PyPI</a></td>
    </tr>
    </tbody>
  </table>

  <h2>Tools</h2>
  <p>Tools which help to work with a TypeAPI specification.</p>
  <table class="table table-striped">
    <colgroup>
      <col class="w-25">
      <col class="w-75">
    </colgroup>
    <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td><a href="https://github.com/apioo/typeschema-angular-editor">TypeAPI-Editor</a></td>
      <td>Angular component which allows you to build and view TypeAPI specifications. We provide a hosted version at
        our <a href="https://sandbox.typeapi.org/">Sandbox</a> page.</td>
    </tr>
    <tr>
      <td><a href="https://github.com/apioo/sdkgen-generator-action">SDKgen-Generator-Action</a></td>
      <td>GitHub action which allows you to generate code through a GitHub workflow action.</td>
    </tr>
    <tr>
      <td><a href="https://github.com/apioo/sdkgen-cli">SDKgen-Generator-CLI</a></td>
      <td>A simple binary written in go which allows you to generate code.</td>
    </tr>
    <tr>
      <td><a href="https://sdkgen.app/">SDKgen</a></td>
      <td>SDKgen is a service which provides a code generator as REST API, you can consume the API either manually or through
        a simple <a href="https://github.com/apioo/sdkgen-cli">CLI app</a> which helps to integrate it into different
        environments. Besides this it also provides additional languages like Java and Go.</td>
    </tr>
    <tr>
      <td><a href="https://typehub.cloud/">TypeHub</a></td>
      <td>TypeHub is a new platform to quickly build and share client SDKs and data models. It internally also uses the
        SDKgen API and covers the complete flow to manage and evolve your TypeAPI specification.</td>
    </tr>
    </tbody>
  </table>

  <div class="typeschema-edit">
    <a href="https://github.com/apioo/typeapi/blob/main/www/resources/template/<?php echo pathinfo(__FILE__, PATHINFO_BASENAME); ?>"><i class="bi bi-pencil"></i> Edit this page</a>
  </div>
</div>

<?php include __DIR__ . '/inc/footer.php'; ?>
