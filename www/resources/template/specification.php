
<?php include __DIR__ . '/inc/header.php'; ?>

<section class="section">
  <div class="container">
    <div class="content">
      <h1>Specification</h1>
      <h2>Table of Contents</h2>
      <ul>
        <li><a href="#Introduction">Introduction</a>
          <ul>
            <li><a href="#Goals">Goals</a></li>
            <li><a href="#Non-Goals">Non-Goals</a></li>
            <li><a href="#Reasoning">Reasoning</a></li>
            <li><a href="#Vision">Vision</a></li>
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
        <li>Provide a simple and stable specification</li>
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
      <p></p>
      <p>We believe that the API world needs a specification which can be used to automatically generate solid type-safe
        client and server code. The OpenAPI <a href="https://swagger.io/tools/swagger-codegen/">swagger-codegen</a> project
        exists for a long time to implement such a code generator for the OpenAPI specification, but it has turned out,
        that the OpenAPI specification and JSON Schema makes it difficult for code generators to generate solid type-safe code.
        The <a href="https://chriskapp.medium.com/the-benefits-of-code-generation-and-the-problems-of-the-openapi-spec-ec8d75669e04">problems</a>
        are at the specification level, this means a code generator which
        is based on OpenAPI needs to somehow solve these inherited problems, by either restricting the specification or by providing a custom format.</p>
      <p>With TypeAPI we want to provide an alternativ specification to solve these problems. TypeAPI is basically a stricter
        version of OpenAPI/JSON Schema and it is easy possible to generate an OpenAPI specification based on a TypeAPI specification but not vice versa.
        We also see already many commercial projects like <a href="https://buildwithfern.com/">Fern</a>, <a href="https://liblab.com/">Liblab</a> or
        <a href="https://www.stainless.com/">Stainless</a> to solve these problems, but we believe that it would be much better to
        solve this at the specification level.</p>

      <a id="Vision"></a>
      <h3>Vision</h3>
      <p>We see that the world is connected through APIs but integrating external APIs is still a complex problem.
        We want to move the API ecosystem into a direction where it is no longer needed to implement a client SDK for your API,
        you only need to describe the API through a TypeAPI specification and everything else can be generated automatically.
        In the future we also want to extend the TypeAPI specification and code generator to describe GraphQL or RPC APIs so that
        we have a single client which can talk to various protocols. This means the generated client is always stable, but it is
        possible to change the underlying technology i.e. if you want to switch from REST to RPC.</p>
      <p>On the server-side we also want to generate great server-stubs so that it is easy possible to switch the underlying
        server technology. The code generator automatically generates all controller and model classes
        for the target server technology i.e. Spring or Symfony and then you only need to implement the actual business logic.</p>
      <p>At TypeAPI we heavily support the code-first approach, we think it should be possible to generate an API specification
        directly from your code without the need to add many additional annotations. In the future we want to provide tools to
        automatically generate a TypeAPI specification directly from various frameworks without the need to manually build the specification.
        We see many APIs which are not in sync with the specification and we believe that code-first is the correct approach to prevent
        this, so that the specification is always in sync with the actual implementation. While theoretical the design-first approach would
        be great we have seen in the past that there is basically no way to prevent API drift at scale and keep the API in sync with the
        actual implementation.</p>

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

      <p>Through the <code>arguments</code> keywords you can map values from the HTTP request to specific method arguments. In
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
        client SDK will throw a fitting exception containing the JSON payload in case the server returns such an error
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

      <p>The <code>definitions</code> keyword maps to the <a href="https://typeschema.org/">TypeSchema</a>
        specification and represents a map containing <a href="https://app.typehub.cloud/d/typehub/typeschema#type-StructType">Struct</a>,
        <a href="https://app.typehub.cloud/d/typehub/typeschema#type-MapType">Map</a> or <a href="https://app.typehub.cloud/d/typehub/typeschema#type-ReferenceType">Reference</a>
        types. Those types are then used to describe incoming and outgoing JSON payloads.</p>

      <hr>

      <a id="Security"></a>
      <h2>Security</h2>

      <p>The <code>security</code> keyword describes the authorization mechanism of the API, the following types are supported:</p>
      <ul>
        <li>
          <p><code>apiKey</code></p>
          <p>Describes an arbitrary HTTP header containing an access token i.e. <code>X-Api-Key</code> which can be specified with the <code>in</code> and <code>name</code> keyword.</p>
        </li>
        <li>
          <p><code>httpBasic</code></p>
          <p>Describes an <code>Authorization</code> header using the Basic type. See <a href="https://datatracker.ietf.org/doc/html/rfc7617">RFC7617</a>, base64-encoded credentials.</p>
        </li>
        <li>
          <p><code>httpBearer</code></p>
          <p>Describes an <code>Authorization</code> header using the Bearer type. See <a href="https://datatracker.ietf.org/doc/html/rfc6750">RFC6750</a>, bearer tokens to access OAuth 2.0-protected resources.</p>
        </li>
        <li>
          <p><code>oauth2</code></p>
          <p>Describes an OAuth2 endpoint. The client will automatically request an access token using the <code>client_credentials</code> authorization grant on usage. The following keywords can be used: <code>tokenUrl</code>, <code>authorizationUrl</code> and optionally <code>scopes</code></p>
        </li>
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

    </div>
    <div class="typeschema-edit">
      <a href="https://github.com/apioo/typeapi/blob/main/www/resources/template/<?php echo pathinfo(__FILE__, PATHINFO_BASENAME); ?>"><i class="bi bi-pencil"></i> Edit this page</a>
    </div>
  </div>
</section>

<script>window.addEventListener('load', function() { hljs.highlightAll() });</script>

<script>
    const links = document.querySelectorAll('a.psx-type-link');
    links.forEach((link) => {
        link.setAttribute('href', '#' + link.dataset.name);
    });
</script>

<?php include __DIR__ . '/inc/footer.php'; ?>
