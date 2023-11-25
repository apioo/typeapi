
<?php include __DIR__ . '/inc/header.php'; ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo $url; ?>">TypeAPI</a> / Specification</li>
  </ol>
</nav>

<div class="container">

  <h1 class="display-4">Specification</h1>

  <p class="lead">This document describes the <a href="https://app.typehub.cloud/d/typehub/typeapi">TypeAPI specification</a>.
  The TypeAPI specification defines a JSON format to describe REST APIs for type-safe code generation.</p>

  <hr>

  <ul>
    <li><a href="#Goals">Goals</a>
    <li><a href="#Non-Goals">Non-Goals</a>
    <li><a href="#Reasoning">Reasoning</a>
    <li><a href="#Schema">Schema</a>
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
  </ul>

  <hr>

  <a id="Goals"></a>
  <h2>Goals</h2>
  <ul>
    <li>Provide a format to generate clean and ready to use code</li>
    <li>Provide a simple and stable specification where you can easily build a code generator</li>
    <li>Optimized for static typed and object-oriented programming languages</li>
  </ul>

  <a id="Non-Goals"></a>
  <h2>Non-Goals</h2>
  <ul>
    <li>Describe every possible REST API structure and JSON payload</li>
    <li>Supporting many different Content-Types like XML or <code>x-www-form-urlencoded</code></li>
    <li>Providing complex JSON validation capabilities</li>
  </ul>

  <a id="Reasoning"></a>
  <h2>Reasoning</h2>
  <p>For a long time the OpenAPI community was divided into two communities, one building documentation tools and the
  other trying to build code generation tools. Building documentation tools has very different requirements than
  building code generation tools. For a documentation tool you can simply render and show all defined endpoints and
  constraints, a code generation tool on the other side needs to understand the structure and relations of your model.</p>
  <p>The OpenAPI specification has moved more and more to the documentation community by directly integrating JSON
  Schema into the specification. The problem with JSON Schema and code generation is, that JSON Schema is a constraint
  system, based on such constraints it is very difficult or impossible to build a clean code generator since the
  constraints only define what is not allowed. For a code generator you like to have a schema which explicit models your
  data structure.</p>
  <p>With TypeAPI we want build a new home for the code generation community. Conceptual the main difference is that with
  OpenAPI you describe routes and all aspects of a route, at TypeAPI we describe operations, an operation has arguments
  and those arguments are mapped to values from the HTTP request. Every operation returns a response and can throw
  exceptions which are also mapped to an HTTP response. An operation basically represents a method or function in a
  programming language. This approach makes it really easy to generate complete type safe code.</p>

  <hr>

  <a id="Schema"></a>
  <h2>Schema</h2>

  <p>Every TypeAPI has a <a href="https://app.typehub.cloud/d/typehub/typeapi#type-TypeAPI">Root</a> definition. The
  Root must contain at least the <code>operations</code> and <code>definitions</code> keyword i.e.:</p>
  <pre><code class="language-json">{
    "operations": {
        "getMessage": { ... },
    },
    "definitions": {
        "TypeA": { ... },
        "TypeB": { ... }
    }
}</code></pre>

  <hr>

  <a id="Operations"></a>
  <h3>Operations</h3>

  <p>The <code>operations</code> keyword contains a map containing <a href="https://app.typehub.cloud/d/typehub/typeapi#type-Operation">Operation</a>
  objects. The key represents the identifier of this operation, through the dot notation i.e. <code>user.getMessage</code> you can group your
  operations into logical units.</p>

  <pre><code class="language-json">{
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
}</code></pre>

  <hr>

  <a id="Return"></a>
  <h4>Return</h4>

  <p>Every operation can define a return type. In the above example the operation simply returns a <code>Hello_World</code>
  object.</p>

  <hr>

  <a id="Arguments"></a>
  <h4>Arguments</h4>

  <p>Through <code>arguments</code> keywords you can map values from the HTTP request to specific method arguments. In
  the following example we have an argument <code>status</code> which maps to a query parameter and an argument
  <code>payload</code> which contains the request payload.</p>

  <pre><code class="language-json">{
    "operations": {
        "insertMessage": {
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
  exceptional state is then mapped to a specific status code i.e. <code>404</code> or <code>500</code>. The generated
  client SDK will then throw a fitting exception containing the JSON payload in case the server returns such an error
  response code. The client will either return the success response or throw an exception. This greatly simplifies error
  handling at your client code.</p>

  <pre><code class="language-json">{
    "operations": {
        "getMessage": {
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

  <p>The <code>definitions</code> keyword maps to the <a href="https://app.typehub.cloud/d/typehub/typeschema">TypeSchema</a>
  specification and represents a map containing <a href="https://app.typehub.cloud/d/typehub/typeschema#type-StructType">Struct</a>,
  <a href="https://app.typehub.cloud/d/typehub/typeschema#type-MapType">Map</a> and <a href="https://app.typehub.cloud/d/typehub/typeschema#type-ReferenceType">Reference</a>
  types. Those types are then used to describe incoming and outgoing JSON payloads.</p>

  <hr>

  <div class="typeschema-edit">
    <a href="https://github.com/apioo/typeapi/blob/main/www/resources/template/<?php echo pathinfo(__FILE__, PATHINFO_BASENAME); ?>"><i class="bi bi-pencil"></i> Edit this page</a>
  </div>
</div>

<script>window.addEventListener('load', function() { hljs.highlightAll() });</script>

<script>
    const links = document.querySelectorAll('a.psx-type-link');
    links.forEach((link) => {
        link.setAttribute('href', '#' + link.dataset.name);
    });
</script>

<?php include __DIR__ . '/inc/footer.php'; ?>
