
<?php include __DIR__ . '/inc/header.php'; ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo $url; ?>">TypeAPI</a> / Specification</li>
  </ol>
</nav>

<div class="container">

  <h1 class="display-4">Specification</h1>

  <h2>Table of Contents</h2>
  <ul>
    <li><a href="#Introduction">Introduction</a>
      <ul>
        <li><a href="#Goals">Goals</a></li>
        <li><a href="#Non-Goals">Non-Goals</a></li>
        <li><a href="#Reasoning">Reasoning</a></li>
      </ul>
    </li>
    <li><a href="#Operations">Operations</a>
      <ul>
        <li><a href="#Return">Return</a></li>
        <li><a href="#Arguments">Arguments</a></li>
        <li><a href="#Throws">Throws</a></li>
      </ul>
    </li>
    <li><a href="#Definitions">Definitions</a></li>
    <li><a href="#Security">Security</a></li>
  </ul>

  <hr>

  <a id="Introduction"></a>
  <h2>Introduction</h2>
  <p>This document describes the <a href="https://app.typehub.cloud/d/typehub/typeapi">TypeAPI specification</a>.
    The TypeAPI specification defines a JSON format to describe REST APIs for type-safe code generation.</p>


  <a id="Goals"></a>
  <h3>Goals</h3>
  <ul>
    <li>Provide a format to generate clean and ready to use code</li>
    <li>Provide a simple and stable specification where you can easily build a code generator</li>
    <li>Optimized for static typed and object-oriented programming languages</li>
  </ul>

  <a id="Non-Goals"></a>
  <h3>Non-Goals</h3>
  <ul>
    <li>Describe every possible REST API structure and JSON payload</li>
    <li>Providing complex JSON validation capabilities</li>
  </ul>

  <a id="Reasoning"></a>
  <h3>Reasoning</h3>
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

  <a id="Operations"></a>
  <h2>Operations</h2>

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
                    "type": "reference",
                    "target": "Hello_World"
                }
            }
        }
    },
    "definitions": {
        "Hello_World": {
            "type": "struct",
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
  <h3>Return</h3>

  <p>Every operation can define a return type. In the above example the operation simply returns a <code>Hello_World</code>
  object.</p>

  <hr>

  <a id="Arguments"></a>
  <h3>Arguments</h3>

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
                        "type": "reference",
                        "target": "Hello_World"
                    }
                }
            },
            "return": {
                "schema": {
                    "type": "reference",
                    "target": "Hello_World"
                }
            }
        }
    },
    "definitions": {
        "Hello_World": {
            "type": "struct",
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
  <h3>Throws</h3>

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
                    "type": "reference",
                    "target": "Hello_World"
                }
            },
            "throws": [{
                "code": 404,
                "schema": {
                    "type": "reference",
                    "target": "Error"
                }
            }, {
                "code": 500,
                "schema": {
                    "type": "reference",
                    "target": "Error"
                }
            }]
        }
    },
    "definitions": {
        "Hello_World": {
            "type": "struct",
            "properties": {
                "message": {
                    "type": "string"
                }
            }
        },
        "Error": {
            "type": "struct",
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
  <h2>Definitions</h2>

  <p>The <code>definitions</code> keyword maps to the <a href="https://app.typehub.cloud/d/typehub/typeschema">TypeSchema</a>
  specification and represents a map containing <a href="https://app.typehub.cloud/d/typehub/typeschema#type-StructType">Struct</a>,
  <a href="https://app.typehub.cloud/d/typehub/typeschema#type-MapType">Map</a> or <a href="https://app.typehub.cloud/d/typehub/typeschema#type-ReferenceType">Reference</a>
  types. Those types are then used to describe incoming and outgoing JSON payloads.</p>

  <hr>

  <a id="Security"></a>
  <h2>Security</h2>

  <p>The <code>security</code> keyword describes the authorization mechanism of the API, the following types are supported:</p>
  <ul>
    <li><code>apiKey</code></li>
    <li><code>httpBasic</code></li>
    <li><code>httpBearer</code></li>
    <li><code>oauth2</code></li>
  </ul>

  <p><a href="https://app.typehub.cloud/d/typehub/typeapi"></a></p>

  <pre><code class="language-json">{
    "security": {
        "type": "httpBearer",
    },
    "operations": {
        "getMessage": { ... }
    },
    "definitions": {
        "Hello_World": { ... }
    }
}</code></pre>

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
