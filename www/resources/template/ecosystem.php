
<?php include __DIR__ . '/inc/header.php'; ?>

<section class="section">
  <div class="container">
    <h1 class="title">Ecosystem</h1>
    <p class="subtitle">The following page lists libraries and other projects related to TypeAPI.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <h2 class="title">Model</h2>
    <p class="subtitle">We provide auto-generated models of the TypeAPI meta specification which describes itself.
      These models can be used to parse or generate a TypeAPI specification.</p>
    <table class="table is-striped is-bordered is-fullwidth">
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
  </div>
</section>


<section class="section">
  <div class="container">
    <h2 class="title">Tools</h2>
    <p class="subtitle">Tools which help to work with a TypeAPI specification.</p>
    <table class="table is-striped is-bordered is-fullwidth">
      <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td><a href="https://sandbox.sdkgen.app/">Sandbox</a></td>
        <td>Angular app which allows you to design a TypeAPI specification and generate client SDKs, server stubs or DTOs.</td>
      </tr>
      <tr>
          <td><a href="https://github.com/apioo/sdkgen-cli">CLI</a></td>
          <td>A simple binary written in go which allows you to generate code.</td>
      </tr>
      <tr>
        <td><a href="https://github.com/apioo/sdkgen-generator-action">GitHub-Action</a></td>
        <td>GitHub action which allows you to generate code through a GitHub workflow action.</td>
      </tr>
      <tr>
        <td><a href="https://sdkgen.app/">SDKgen</a></td>
        <td>SDKgen is a service which provides a code generator as REST API, it is used by the Sandbox, CLI and GitHub-Action.
        For more information take a look at the available <a href="https://sdkgen.app/integration">integration options</a>.</td>
      </tr>
      <tr>
        <td><a href="https://typehub.cloud/">TypeHub</a></td>
        <td>TypeHub is a new platform to quickly build and share client SDKs and data models. It internally also uses the
          SDKgen API and covers the complete flow to manage and evolve your TypeAPI specification.</td>
      </tr>
      </tbody>
    </table>
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
