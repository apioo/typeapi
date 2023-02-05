
<?php include __DIR__ . '/inc/header.php'; ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo $url; ?>">TypeAPI</a> / Specification</li>
  </ol>
</nav>

<div class="container">

  <h1 class="display-4">Specification</h1>

  <hr>

  <h2>Table of Contents</h2>
  <ul>
    <li><a href="#Introduction">Introduction</a></li>
    <li><a href="#Root">Root</a>
      <ul>
        <li><a href="#Import">Import</a></li>
      </ul>
    </li>
    <li><a href="#Types">Types</a>
      <ul>
        <li><a href="#Struct">Struct</a></li>
        <li><a href="#Map">Map</a></li>
        <li><a href="#Array">Array</a></li>
        <li><a href="#Boolean">Boolean</a></li>
        <li><a href="#Number">Number</a></li>
        <li><a href="#String">String</a></li>
        <li><a href="#Intersection">Intersection</a></li>
        <li><a href="#Union">Union</a></li>
        <li><a href="#Reference">Reference</a></li>
        <li><a href="#Generic">Generic</a></li>
      </ul>
    </li>
    <li><a href="#Structure">Structure</a></li>
    <li><a href="#Generator">Generator</a></li>
    <li><a href="#Appendix">Appendix</a></li>
  </ul>

  <hr>

  <a id="Introduction"></a>
  <h2>Introduction</h2>

  <p>This document describes the TypeAPI specification. TypeAPI is a JSON format to describe REST APIs. The goal of this
  specification is to describe APIs in a way so that it is possible to generate complete type safe client and server code.</p>
  <p>What is the difference to OpenAPI? The main use case of OpenAPI is to describe every aspect of a REST API, this
  means the focus is on documenting every possible parameter and payload. This is great for documentation but is a problem
  for code generation, since this flexibility makes code generation harder. TypeAPI on the other side is fully targeted
  on code generation, this means you probably can not use TypeAPI for every exotic REST API, but it covers the 80% case.</p>
  <p>Conceptual the main difference is that with OpenAPI you describe routes and all aspects of a route, at TypeAPI
  we describe operations, an operation has arguments and those arguments are mapped to values from the HTTP request.
  Every operation produces a response or throws an exception which are also mapped to an HTTP response. An operation
  basically represents a method or function in a programming language. This approaches makes it really easy to generate
  complete type safe and easy to use client and server code.</p>

  <hr>

  <a id="Root"></a>
  <h2>Root</h2>

  <p>Every TypeAPI has a <a href="#TypeAPI">Root</a> definition. The Root must contain at least the
  <code>operations</code> and <code>definitions</code> keyword i.e.:</p>
  <pre class="json hljs">{
    "operations": {
        "hello.world.getMessage": { ... },
    },
    "definitions": {
        "TypeA": { ... },
        "TypeB": { ... }
    }
}</pre>

  <p>The <code>operations</code> keyword contains a map containing <a href="#Operation">Operation</a> objects. The key
  represents the name of the operation. If you use a dot in the name you can group your operations i.e. the operation
  name <code>hello.world.getMessage</code> would generate the TypeScript client code <code>client.hello.world.getMessage();</code>.
  Through this you can easily control the design of your client SDK.</p>

  <p>The <code>definitions</code> keyword maps to the <a href="https://typeschema.org/specification#Root">TypeSchema</a>
  specification and represents a map containing <a href="https://typeschema.org/specification#StructType">Struct</a>,
  <a href="https://typeschema.org/specification#MapType">Map</a> and <a href="https://typeschema.org/specification#ReferenceType">Reference</a>
  types. Those types are then used to describe incoming and outgoing JSON payloads.</p>

  <hr>

  <a id="Struct"></a>
  <h3>Operation</h3>

  <p>Represents a struct type. A struct type contains a fix set of defined properties. A struct type must have a
  <code>type</code> and <code>properties</code> keyword. The type must be <code>object</code>.</p>

  <pre><code class="json">{
    "description": "object",
    "method": "object",
    "path": "object",
    "arguments": {
      "": {
        "in"
      }
    },
    "return": {

    },
}</code></pre>

  <p>All allowed properties are described at the <a href="#Operation">Appendix</a>.</p>

  <hr>

  <a id="Map"></a>
  <h3>Map</h3>

  <p>Represents a map type. A map type contains variable key value entries of a specific type. A map type must have a
  <code>type</code> and <code>additionalProperties</code> keyword. The type must be <code>object</code>.</p>

  <pre><code class="json">{
    "type": "object",
    "additionalProperties": { ... }
}</code></pre>

  <p>All allowed properties are described at the <a href="#MapType">Appendix</a>.</p>

  <hr>

  <a id="Array"></a>
  <h3>Array</h3>

  <p>Represents an array type. An array type contains an ordered list of a specific type. An array type must have a
  <code>type</code> and <code>items</code> keyword. The type must be <code>array</code>.</p>

  <pre><code class="json">{
    "type": "array",
    "items": { ... }
}</code></pre>

  <p>All allowed properties are described at the <a href="#ArrayType">Appendix</a>.</p>

  <hr>

  <a id="Boolean"></a>
  <h3>Boolean</h3>

  <p>Represents a boolean type. A boolean type must have a <code>type</code> keyword and the type must be
  <code>boolean</code>.</p>

  <pre><code class="json">{
    "type": "boolean"
}</code></pre>

  <p>All allowed properties are described at the <a href="#BooleanType">Appendix</a>.</p>

  <hr>

  <a id="Number"></a>
  <h3>Number</h3>

  <p>Represents a number type (contains also integer). A number type must have a <code>type</code> keyword and the type
  must be <code>number</code> or <code>integer</code>.</p>

  <pre><code class="json">{
    "type": "number"
}</code></pre>

  <p>All allowed properties are described at the <a href="#NumberType">Appendix</a>.</p>

  <hr>

  <a id="String"></a>
  <h3>String</h3>

  <p>Represents a string type. A string type must have a <code>type</code> keyword and the type must
  be <code>number</code> or <code>integer</code>.</p>

  <pre><code class="json">{
    "type": "string"
}</code></pre>

  <p>All allowed properties are described at the <a href="#StringType">Appendix</a>.</p>

  <hr>

  <a id="Intersection"></a>
  <h3>Intersection</h3>

  <p>Represents an intersection type. An intersection type must have an <code>allOf</code> keyword.</p>

  <pre><code class="json">{
    "allOf": [{ ... }, { ... }]
}</code></pre>

  <p>All allowed properties are described at the <a href="#IntersectionType">Appendix</a>.</p>

  <hr>

  <a id="Union"></a>
  <h3>Union</h3>

  <p>Represents a union type. A union type must have an <code>oneOf</code> keyword.</p>

  <pre><code class="json">{
    "oneOf": [{ ... }, { ... }]
}</code></pre>

  <p>All allowed properties are described at the <a href="#UnionType">Appendix</a>.</p>

  <hr>

  <a id="Reference"></a>
  <h3>Reference</h3>

  <p>Represents a reference type. A reference type points to a specific type at the definitions map. A reference type
  must have a <code>$ref</code> keyword.</p>

  <pre><code class="json">{
    "$ref": "MyType"
}</code></pre>

  <p>All allowed properties are described at the <a href="#ReferenceType">Appendix</a>.</p>

  <hr>

  <a id="Generic"></a>
  <h3>Generic</h3>

  <p>Represents a generic type. A generic type represents a type which can be replaced if you reference a specific type.
  A generic type must have a <code>$generic</code> keyword.</p>

  <pre><code class="json">{
    "$generic": "T"
}</code></pre>

  <p>All allowed properties are described at the <a href="#GenericType">Appendix</a>.</p>

  <p>I.e. if we reference a specific type and this type contains a generic type then we can define which type should
  be inserted at the generic type.</p>

  <pre><code class="json">{
    "$ref": "MyType",
    "$template": {
        "T": "AnotherType"
    }
}</code></pre>

  <hr>

  <a id="Structure"></a>
  <h3>Structure</h3>

  <p>The following image shows how the types can be nested.</p>

  <a href="<?php echo $base; ?>/img/typeschema_structure.png"><img src="<?php echo $base; ?>/img/typeschema_structure.png" class="img-fluid" alt="TypeSchema structure"></a>

  <hr>

  <a id="Appendix"></a>
  <h2>Appendix</h2>

  <p>The single source of truth of TypeAPI is the TypeSchema meta schema which describes itself. You can find the
  current TypeSchema at our <a href="https://github.com/apioo/typeapi/blob/main/schema/schema.json">repository</a>.
  The following section contains a HTML representation which we automatically generate from this meta schema.</p>

  <?php echo $spec; ?>

  <div class="typeschema-edit">
    <a href="https://github.com/apioo/typeapi/blob/main/www/src/Website/resource/<?php echo pathinfo(__FILE__, PATHINFO_BASENAME); ?>"><i class="bi bi-pencil"></i> Edit this page</a>
  </div>
</div>

<script>hljs.initHighlightingOnLoad();</script>

<?php include __DIR__ . '/inc/footer.php'; ?>
