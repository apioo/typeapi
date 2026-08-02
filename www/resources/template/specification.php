
<?php include __DIR__ . '/inc/header.php'; ?>

<div class="flex max-w-container-max mx-auto pt-16">
    <!-- Sidebar -->
    <aside class="hidden md:block fixed h-[calc(100vh-64px)] w-72 border-r border-border-subtle bg-surface-deep pt-8 overflow-y-auto px-6">
        <div class="mb-8">
            <h2 class="font-label-caps text-label-caps text-text-muted uppercase tracking-widest mb-4">Contents</h2>
            <nav class="space-y-3 font-body-md text-body-md text-on-surface-variant">
                <a class="block hover:text-primary transition-colors" href="#intro"><span class="text-primary/50 mr-2">1.</span> Introduction</a>
                <div class="pl-4 space-y-2 text-sm opacity-80">
                    <a class="block hover:text-primary transition-colors" href="#goals">1.1 Goals</a>
                    <a class="block hover:text-primary transition-colors" href="#non-goals">1.2 Non-Goals</a>
                    <a class="block hover:text-primary transition-colors" href="#reasoning">1.3 Reasoning</a>
                    <a class="block hover:text-primary transition-colors" href="#vision">1.4 Vision</a>
                </div>
                <a class="block hover:text-primary transition-colors" href="#operations"><span class="text-primary/50 mr-2">2.</span> Operations</a>
                <div class="pl-4 space-y-2 text-sm opacity-80">
                    <a class="block hover:text-primary transition-colors" href="#return">2.1 Return</a>
                    <a class="block hover:text-primary transition-colors" href="#arguments">2.2 Arguments</a>
                    <a class="block hover:text-primary transition-colors" href="#throws">2.3 Throws</a>
                </div>
                <a class="block hover:text-primary transition-colors" href="#definitions"><span class="text-primary/50 mr-2">3.</span> Definitions</a>
                <a class="block hover:text-primary transition-colors" href="#security"><span class="text-primary/50 mr-2">4.</span> Security</a>
            </nav>
        </div>
    </aside>

    <main class="flex-1 md:ml-72 px-margin-mobile md:px-16 py-12 pb-32">
        <div class="max-w-3xl mx-auto">
            <div class="mb-16 border-b border-border-subtle pb-8">
                <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface mb-6">Specification</h1>
                <div class="h-1 w-24 bg-primary rounded-full mt-2"></div>
                <p class="mt-5 font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                    An OpenAPI alternative to describe REST APIs for type-safe code generation.
                </p>
            </div>
            <!-- Section 1: Introduction -->
            <section class="spec-section scroll-mt-24" id="intro">
                <h2 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-baseline">
                    <span class="spec-number">1.</span> Introduction
                </h2>
                <p class="font-body-md text-body-md text-on-surface-variant mb-8 leading-relaxed">
                    This document describes the TypeAPI specification. The TypeAPI specification defines a JSON format to describe REST APIs for type-safe code generation.
                </p>
                <div class="mb-12" id="goals">
                    <h3 class="font-bold text-lg mb-4 flex items-baseline">
                        <span class="spec-number text-sm">1.1</span> Goals
                    </h3>
                    <ul class="list-disc pl-6 space-y-3 font-body-md text-on-surface-variant">
                        <li>Enable the generation of clean, production-ready code.</li>
                        <li>Maintain a minimalist and stable core specification.</li>
                        <li>Optimize for strictly-typed and object-oriented programming paradigms.</li>
                        <li>Facilitate the straightforward implementation of custom code generation engines.</li>
                    </ul>
                </div>
                <div class="mb-12" id="non-goals">
                    <h3 class="font-bold text-lg mb-4 flex items-baseline">
                        <span class="spec-number text-sm">1.2</span> Non-Goals
                    </h3>
                    <ul class="list-disc pl-6 space-y-3 font-body-md text-on-surface-variant">
                        <li>Describe non JSON payloads i.e. XML or form-encoded.</li>
                        <li>Describe every possible API structure and JSON payload.</li>
                        <li>Providing complex JSON validation capabilities.</li>
                    </ul>
                </div>
                <div class="mb-12" id="reasoning">
                    <h3 class="font-bold text-lg mb-4 flex items-baseline">
                        <span class="spec-number text-sm">1.3</span> Reasoning & Motivation
                    </h3>
                    <p class="font-bold text-on-surface mb-2">The Code Generation Imperative</p>
                    <p class="font-body-md text-on-surface-variant leading-relaxed mb-6">
                        Modern software architecture relies heavily on cross-language API integration, automated SDK generation, and end-to-end type safety. To achieve reliable code generation across strongly typed languages (e.g., TypeScript, Java, C#, Go, Rust), an API description format must provide unambiguous, deterministic mapping to object-oriented and functional type systems.
                    </p>
                    <p class="font-bold text-on-surface mb-2">Limitations of Existing Standards</p>
                    <p class="font-body-md text-on-surface-variant leading-relaxed mb-6">
                        Industry-standard specifications such as OpenAPI and JSON Schema were primarily architected for validation and documentation of dynamic JSON payloads rather than strong static type modeling. Consequently, they introduce critical structural challenges for code generators:
                    </p>
                    <ul class="list-disc pl-6 space-y-3 font-body-md text-on-surface-variant mb-6">
                        <li><b>Over-Flexibility & Ambiguity</b>: Constructs like complex dynamic validation keywords, loose pattern properties, and unrestricted anyOf/oneOf/allOf polymorphism often lack direct, idiomatic equivalents in statically typed target languages.</li>
                        <li><b>Non-Deterministic AST Mapping</b>: Generous schema flexibility forces code generators to rely on heuristic assumptions, language-specific vendor extensions (x-*), or fragile custom parser configurations.</li>
                        <li><b>Implementation Fragmentation</b>: Because generators must handle edge cases non-uniformly, generated client SDKs and server stubs across different languages frequently drift in behavior, structural representation, and type guarantees.</li>
                    </ul>
                    <p class="font-bold text-on-surface mb-2">The TypeAPI Approach</p>
                    <p class="font-body-md text-on-surface-variant leading-relaxed mb-6">
                        TypeAPI resolves this friction by establishing a strict, schema-first model explicitly optimized for code generation and cross-language interoperability.
                    </p>
                    <ul class="list-disc pl-6 space-y-3 font-body-md text-on-surface-variant mb-6">
                        <li><b>Type-System Alignment</b>: TypeAPI eliminates schema constructs that cannot be cleanly mapped into native structural or nominal type models, guaranteeing deterministic code synthesis across target runtimes.</li>
                        <li><b>Zero Custom Extensions Required</b>: By standardizing object structures, primitive mappings, and endpoint operational layouts, TypeAPI removes the need for non-standard vendor annotations to achieve type safety.</li>
                        <li><b>Ecosystem Compatibility</b>: TypeAPI maintains structural bridgeability with OpenAPI and JSON Schema, allowing seamless import/export workflows while serving as an uncompromising foundation for automated toolchains.</li>
                    </ul>
                    <p class="font-body-md text-on-surface-variant leading-relaxed mb-6">
                        By framing API definitions through the lens of program language semantics rather than dynamic validation constraints, TypeAPI ensures that client SDKs, server interfaces, and data models remain robust, predictable, and maintainable across their entire life cycle.
                    </p>
                </div>
                <div class="mb-8" id="vision">
                    <h3 class="font-bold text-lg mb-4 flex items-baseline">
                        <span class="spec-number text-sm">1.4</span> Vision
                    </h3>
                    <p class="font-body-md text-on-surface-variant leading-relaxed mb-6">
                        TypeAPI aims to standardize API integration by shifting the industry towards automated, specification-driven workflows. By providing a rigorous machine-readable definition, TypeAPI eliminates the requirement for manual client SDK development and ensures architectural consistency across disparate systems.
                    </p>
                    <p class="font-bold text-on-surface mb-2">Client-Side Automation</p>
                    <p class="font-body-md text-on-surface-variant leading-relaxed mb-6">
                        The specification facilitates the automatic generation of stable, type-safe client libraries. This enables seamless integration of external services without the overhead of manual implementation, allowing developers to interact with any TypeAPI-compliant service through a standardized interface.
                    </p>
                    <p class="font-bold text-on-surface mb-2">Server-Side Abstraction</p>
                    <p class="font-body-md text-on-surface-variant leading-relaxed mb-6">
                        TypeAPI decouples business logic from underlying server technology. The specification enables the generation of server stubs, controllers, and data models for diverse frameworks (e.g., Spring, Symfony), allowing for infrastructure migration or technology swaps with minimal impact on core implementation logic.
                    </p>
                    <p class="font-bold text-on-surface mb-2">Code-First Integrity</p>
                    <p class="font-body-md text-on-surface-variant leading-relaxed">
                        TypeAPI prioritizes a code-first approach to prevent specification drift. By deriving the API definition directly from implementation metadata, TypeAPI ensures that documentation remains a live, accurate reflection of the service. This methodology addresses the inherent limitations of design-first approaches by maintaining absolute synchronization between the specification and the deployed API at scale.
                    </p>
                </div>
                <div class="mb-12" id="specification">
                    <h3 class="font-bold text-lg mb-4 flex items-baseline">
                        <span class="spec-number text-sm">1.5</span> Specification
                    </h3>
                    <p class="font-body-md text-on-surface-variant leading-relaxed mb-6">
                        The complete details of the TypeAPI specification are hosted on TypeHub. You can explore the full interactive documentation and schema definitions at the <a href="https://app.typehub.cloud/d/typehub/typeapi" class="text-primary hover:underline">TypeHub Official Specification</a>.
                    </p>
                    <p class="font-body-md text-on-surface-variant leading-relaxed">
                        The source of the specification is developed and maintained on GitHub. You can view the raw JSON definition and contribute to its development at the <a href="https://github.com/apioo/typeapi/blob/main/specification/typeapi.json" class="text-primary hover:underline">TypeAPI GitHub Repository</a>.
                    </p>
                </div>
            </section>
            <!-- Section 2: Operations -->
            <section class="spec-section scroll-mt-24" id="operations">
                <h2 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-baseline">
                    <span class="spec-number">2.</span> Operations
                </h2>
                <p class="font-body-md text-on-surface-variant mb-6">
                    Every TypeAPI has a Root definition. The Root must contain at least the <code>operations</code> and <code>definitions</code> keyword i.e.:
                </p>
                <div class="definition-block">
<pre class="p-4 overflow-x-auto code-scrollbar font-code-sm text-code-cyan text-sm">{
    "operations": {
        "getMessage": { ... },
    },
    "definitions": {
        "TypeA": { ... },
        "TypeB": { ... }
    }
}</pre>
                </div>
                <hr class="my-12 border-border-subtle"/>
                <p class="font-body-md text-on-surface-variant mb-6">
                    The <code>operations</code> keyword contains a map containing Operation objects. The key represents the identifier of this operation, through the dot notation i.e. <code>user.getMessage</code> you can group your operations into logical units.
                </p>
                <div class="definition-block">
<pre class="p-4 overflow-x-auto code-scrollbar font-code-sm text-code-cyan text-sm">{
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
}</pre>
                </div>
                <div class="mt-12" id="return">
                    <h3 class="font-bold text-lg mb-4 flex items-baseline">
                        <span class="spec-number text-sm">2.1</span> Return
                    </h3>
                    <p class="font-body-md text-on-surface-variant mb-6 leading-relaxed">
                        Every operation can define a return type. In the above example the operation simply returns a <code>Hello_World</code> object.
                    </p>
                </div>
                <div class="mt-12" id="arguments">
                    <h3 class="font-bold text-lg mb-4 flex items-baseline">
                        <span class="spec-number text-sm">2.2</span> Arguments
                    </h3>
                    <p class="font-body-md text-on-surface-variant mb-6 leading-relaxed">
                        Through the <code>arguments</code> keywords you can map values from the HTTP request to specific method arguments. In the following example we have an argument <code>status</code> which maps to a query parameter and an argument <code>payload</code> which contains the request payload.
                    </p>
                    <div class="definition-block">
<pre class="p-4 overflow-x-auto code-scrollbar font-code-sm text-code-cyan text-sm">{
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
}</pre>
                    </div>
                    <p class="font-body-md text-on-surface-variant my-6">This would map to the following HTTP request.</p>
                    <div class="definition-block">
<pre class="p-4 overflow-x-auto code-scrollbar font-code-sm text-on-surface-variant text-sm">POST https://api.acme.com/hello/world?status=2
Content-Type: application/json

{
  "message": "Hello"
}</pre>
                    </div>
                </div>
                <div class="mt-12" id="throws">
                    <h3 class="font-bold text-lg mb-4 flex items-baseline">
                        <span class="spec-number text-sm">2.3</span> Throws
                    </h3>
                    <p class="font-body-md text-on-surface-variant mb-6 leading-relaxed">
                        Besides the return type an operation can return multiple exceptional states in case an error occurred. Every exceptional state is then mapped to a specific status code i.e. <code>404</code> or <code>500</code>. The generated client SDK will throw a fitting exception containing the JSON payload in case the server returns such an error response code. The client will either return the success response or throw an exception. This greatly simplifies error handling at your client code.
                    </p>
                    <div class="definition-block">
<pre class="p-4 overflow-x-auto code-scrollbar font-code-sm text-code-cyan text-sm">{
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
}</pre>
                    </div>
                </div>
            </section>
            <!-- Section 3: Definitions -->
            <section class="spec-section scroll-mt-24" id="definitions">
                <h2 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-baseline">
                    <span class="spec-number">3.</span> Definitions
                </h2>
                <p class="font-body-md text-on-surface-variant mb-8 leading-relaxed">
                    The <code>definitions</code> keyword maps to the <a href="https://app.typehub.cloud/d/typehub/typeschema" class="text-primary hover:underline">TypeSchema</a> specification and represents a map containing Struct types. Those types are then used to describe incoming and outgoing JSON payloads.
                </p>
            </section>
            <!-- Section 4: Security -->
            <section class="spec-section scroll-mt-24" id="security">
                <h2 class="font-headline-md text-headline-md text-on-surface mb-6 flex items-baseline">
                    <span class="spec-number">4.</span> Security
                </h2>
                <p class="font-body-md text-on-surface-variant mb-8 leading-relaxed">
                    The <code>security</code> keyword describes the authorization mechanism of the API, the following types are supported:
                </p>
                <div class="space-y-8">
                    <div>
                        <h4 class="font-code-sm text-primary mb-2">apiKey</h4>
                        <p class="text-on-surface-variant text-sm leading-relaxed">Describes an arbitrary HTTP header containing an access token i.e. <code>X-Api-Key</code> which can be specified with the <code>in</code> and <code>name</code> keyword.</p>
                    </div>
                    <div>
                        <h4 class="font-code-sm text-primary mb-2">httpBasic</h4>
                        <p class="text-on-surface-variant text-sm leading-relaxed">Describes an <code>Authorization</code> header using the Basic type. See <a href="https://datatracker.ietf.org/doc/html/rfc7617" class="text-secondary hover:underline">RFC7617</a>, base64-encoded credentials.</p>
                    </div>
                    <div>
                        <h4 class="font-code-sm text-primary mb-2">httpBearer</h4>
                        <p class="text-on-surface-variant text-sm leading-relaxed">Describes an <code>Authorization</code> header using the Bearer type. See <a href="https://datatracker.ietf.org/doc/html/rfc6750" class="text-secondary hover:underline">RFC6750</a>, bearer tokens to access OAuth 2.0-protected resources.</p>
                    </div>
                    <div>
                        <h4 class="font-code-sm text-primary mb-2">oauth2</h4>
                        <p class="text-on-surface-variant text-sm leading-relaxed">Describes an OAuth2 endpoint. The client will automatically request an access token using the <code>client_credentials</code> authorization grant on usage. The following keywords can be used: <code>tokenUrl</code>, <code>authorizationUrl</code> and optionally <code>scopes</code>.</p>
                    </div>
                </div>
                <div class="definition-block mt-8">
<pre class="p-4 overflow-x-auto code-scrollbar font-code-sm text-code-cyan text-sm">{
    "security": {
        "type": "httpBearer",
    },
    "operations": {
        "getMessage": { ... }
    },
    "definitions": {
        "Hello_World": { ... }
    }
}</pre>
                </div>
            </section>
        </div>
    </main>
</div>

<?php include __DIR__ . '/inc/footer.php'; ?>
