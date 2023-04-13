
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
        <li><a href="#Operations">Operations</a>
        <ul>
            <li><a href="#Return">Return</a></li>
          <li><a href="#Arguments">Arguments</a></li>
          <li><a href="#Throws">Throws</a></li>
        </ul>
        </li>
        <li><a href="#Definitions">Definitions</a></li>
      </ul>
    </li>
    <li><a href="#Appendix">Appendix</a></li>
  </ul>

  <hr>

  <a id="Introduction"></a>
  <h2>Introduction</h2>

  <p>This document describes the TypeAPI specification. TypeAPI is a JSON format to describe REST APIs. The goal of this
  specification is to describe APIs in a way so that it is possible to generate complete type safe client and server code.</p>
  <p>What is the difference to OpenAPI? The main use case of OpenAPI and JsonSchema is to describe every aspect of an REST API,
  this means the focus is on documenting every possible parameter and payload. This is great for documentation but is a
  problem for code generation, since this flexibility makes code generation harder. TypeAPI on the other side is fully
  targeted on code generation.</p>
  <p>Conceptual the main difference is that with OpenAPI you describe routes and all aspects of a route, at TypeAPI
  we describe operations, an operation has arguments and those arguments are mapped to values from the HTTP request.
  Every operation returns a response and can throw exceptions which are also mapped to a HTTP response. An operation
  basically represents a method or function in a programming language. This approaches makes it really easy to generate
  complete type safe and easy to use client and server code.</p>

  <hr>

  <a id="Root"></a>
  <h2>Root</h2>

  <p>Every TypeAPI has a <a href="#TypeAPI">Root</a> definition. The Root must contain at least the
  <code>operations</code> and <code>definitions</code> keyword i.e.:</p>
  <pre><code class="language-json">{
    "operations": {
        "com.acme.api.hello.getMessage": { ... },
    },
    "definitions": {
        "TypeA": { ... },
        "TypeB": { ... }
    }
}</code></pre>

  <hr>

  <a id="Operations"></a>
  <h3>Operations</h3>

  <p>The <code>operations</code> keyword contains a map containing <a href="#Operation">Operation</a> objects. The key
  represents the global identifier of this operation. In general we recommend to use as prefix for every operation key
  the reverse name of your domain (i.e. <code>com.acme.api.myOperation</code>) which makes it globally unique. The
  generated client code always uses the last part of your operation key as method name.</p>

  <pre><code class="language-json">{
    "operations": {
        "com.acme.api.hello.getMessage": {
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
}</code></pre>

  <hr>

  <a id="Return"></a>
  <h4>Return</h4>

  <p>Every operation ca define a return type. In the above example the operation simply returns a <code>Hello_World</code>
  object.</p>

  <hr>

  <a id="Arguments"></a>
  <h4>Arguments</h4>

  <p>Through arguments you can map values from the HTTP request to specific arguments. In this example we have an
  argument <code>status</code> which maps to a query parameter and an argument <code>payload</code> which contains the
  the request payload.</p>

  <pre><code class="language-json">{
    "operations": {
        "com.acme.api.hello.insertMessage": {
            "description": "Inserts and returns a hello world message",
            "method": "POST",
            "path": "/hello/world",
            "arguments": {
                "status": {
                    "in": "query",
                    "schema": {
                        "type": "integer"
                    }
                },
                "payload": {
                    "in": "body",
                    "schema": {
                        "$ref": "Hello_World"
                    }
                }
            },
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
}</code></pre>

  <p>This would map to the following HTTP request.</p>

  <pre><code class="language-http">POST https://api.acme.com/hello/world?status=2
Content-Type: application/json

{
  "message": "Hello"
}
</code></pre>

  <hr>

  <a id="Throws"></a>
  <h4>Throws</h4>

  <p>Besides the return type an operation can return multiple exceptional states in case an error occurred. Every
  exceptional state is then mapped to a specific status code i.e. 404 or 500. The generated client SDK will then throw
  a fitting exception containing the JSON payload in case the server returns such an error response code. The client
  will either return the success response or throw an exception. This greatly simplifies the error handling at your
  client code.</p>

  <pre><code class="language-json">{
    "operations": {
        "com.acme.api.hello.getMessage": {
            "description": "Returns a hello world message",
            "method": "POST",
            "path": "/hello/world",
            "return": {
                "schema": {
                    "$ref": "Hello_World"
                }
            },
            "throws": [{
                "code": 404,
                "schema": {
                    "$ref": "Error"
                }
            }, {
                "code": 500,
                "schema": {
                    "$ref": "Error"
                }
            }]
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
        },
        "Error": {
            "type": "object",
            "properties": {
                "message": {
                    "type": "string"
                }
            }
        }
    }
}</code></pre>

  <hr>

  <a id="Definitions"></a>
  <h3>Definitions</h3>

  <p>The <code>definitions</code> keyword maps to the <a href="https://typeschema.org/specification#Root">TypeSchema</a>
  specification and represents a map containing <a href="https://typeschema.org/specification#StructType">Struct</a>,
  <a href="https://typeschema.org/specification#MapType">Map</a> and <a href="https://typeschema.org/specification#ReferenceType">Reference</a>
  types. Those types are then used to describe incoming and outgoing JSON payloads.</p>

  <hr>

  <a id="Appendix"></a>
  <h2>Appendix</h2>

  <p>The single source of truth of TypeAPI is the TypeSchema meta schema which describes itself. You can find the
  current TypeSchema at our <a href="https://github.com/apioo/typeapi/blob/main/schema/schema.json">repository</a>.
  The following section contains a HTML representation which we automatically generate from this meta schema.</p>

  <?php echo $spec; ?>

  <div class="typeschema-edit">
    <a href="https://github.com/apioo/typeapi/blob/main/www/resources/template/<?php echo pathinfo(__FILE__, PATHINFO_BASENAME); ?>"><i class="bi bi-pencil"></i> Edit this page</a>
  </div>
</div>

<script>hljs.initHighlightingOnLoad();</script>

<?php include __DIR__ . '/inc/footer.php'; ?>
