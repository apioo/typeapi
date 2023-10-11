
<?php include __DIR__ . '/inc/header.php'; ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo $url; ?>">TypeAPI</a> / Developer</li>
  </ol>
</nav>

<div class="container">

  <h1 class="display-4">Developer</h1>

  <p class="lead">TypeAPI is designed from the ground up for code generation, because of this it is very easy to build a
  code generator for a TypeAPI specification. On this page we try to show how you can simply build a code generator.</p>

  <p class="lead">A generator takes as input a TypeAPI specification and produces as output code files, this can be
  either a client SDK or also server side code. Writing a code generator in a specific target language i.e. Java
  provides several advantages when generating also Java code since the target programming language most times provides
  tools to safely generate an AST which is mostly not possible using a different programming language.</p>

  <hr>

  <a id="Generator"></a>
  <h3>Generator</h3>

  <p>The following script is a very naive generator implementation which should show how to read a TypeAPI specification
  and produce a different output. In this case we simply generate a documentation format but it should give a good
  starting point to generate a more sophisticated generator.</p>

  <pre><code class="typescript">const rawSchema = ''; // the raw TypeAPI specification
const data = JSON.parse(rawSchema);
const result: Record&lt;string, Array&lt;string&gt;&gt; = {};

if (data.operations) {
  // iterate through each operation
  for (const [key, value] of Object.entries(data.operations)) {
      result[key] = parseOperation(key, value);
  }
}

console.log(result);

function parseOperation(name: string, operation: any): Array&lt;string&gt; {
  const result = [];
  result.push('Operation-ID: ' + name);

  if (operation.description) {
    result.push('Description: ' + operation.description);
  }

  if (operation.method) {
    result.push('HTTP-Method: ' + operation.method);
  }

  if (operation.path) {
    result.push('HTTP-Path: ' + operation.path);
  }

  if (operation.arguments) {
    // iterate through each argument
    for (const [key, argument] of Object.entries(operation.arguments)) {
      result.push('Argument: ' + parseArgument(key, argument));
    }
  }

  if (operation.throws) {
    // iterate through each throw
    for (const [key, throw_] of Object.entries(data.throws)) {
      result.push('Throw: ' + parseThrow(throw_));
    }
  }

  if (operation.return) {
    result.push('Return: ' + parseReturn(operation.return);
  }

  return result;
}

function parseArgument(name: string, argument: any): string {
    return name + ' - ' + argument.in + ' - ' + readableSchema(argument.schema);
}

function parseThrow(throw_: any): string {
    return throw_.code + ' - ' + readableSchema(throw_.schema);
}

function parseReturn(return_: any): string {
    const httpCode = return_.code || 200;
    return httpCode + ' - ' + readableSchema(return_.schema));
}

function readableSchema(schema: any): string {
  let resolved = schema;
  if (schema.$ref) {
    // we can simply take a look at the definitions object to resolve a schema
    resolved = data.definitions[schema.$ref];
  }

  return resolved.type;
}
</code></pre>

  <div class="typeschema-edit">
    <a href="https://github.com/apioo/typeapi/blob/main/www/resources/template/<?php echo pathinfo(__FILE__, PATHINFO_BASENAME); ?>"><i class="bi bi-pencil"></i> Edit this page</a>
  </div>
</div>

<script>window.addEventListener('load', function() { hljs.highlightAll() });</script>

<?php include __DIR__ . '/inc/footer.php'; ?>
