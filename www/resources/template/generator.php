
<?php include __DIR__ . '/inc/header.php'; ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo $url; ?>">TypeAPI</a> / Generator</li>
  </ol>
</nav>

<div class="container">
  <h1 class="display-4">Generator</h1>
  <?php if(isset($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
  <?php else: ?>
    <div class="alert alert-info">This generator gives you access to our reference code generator implementation, you
    can enter a TypeAPI specification and select a target output format to generate a fitting client. Please take a look
    at the <a href="<?php echo $router->getAbsolutePath([\App\Controller\Ecosystem::class, 'show']); ?>">environment</a>
    page to see available code generator services.</div>
  <?php endif; ?>
  <div class="row">
    <div class="col-12">
      <form method="POST">
        <div class="mb-3">
          <label for="type" class="form-label">Format</label>
          <select name="type" id="type" class="form-control">
            <?php foreach($types as $type): ?>
              <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="schema" class="form-label">Schema</label>
          <textarea class="form-control" name="schema" id="schema" rows="16">{
  "operations": {
    "getMessage": {
      "description": "Returns a hello world message",
      "method": "GET",
      "path": "/hello/world",
      "return": {
        "schema": {
          "$ref": "Hello_World"
        }
      }
    }
  },
  "definitions": {
    "Hello_World": {
      "type": "object",
      "properties": {
        "message": {
          "type": "string"
        }
      }
    }
  }
}</textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Generate">
      </form>
    </div>
  </div>

  <div class="typeschema-edit">
    <a href="https://github.com/apioo/typeapi/blob/main/www/resources/template/<?php echo pathinfo(__FILE__, PATHINFO_BASENAME); ?>"><i class="bi bi-pencil"></i> Edit this page</a>
  </div>
</div>

<?php include __DIR__ . '/inc/footer.php'; ?>
