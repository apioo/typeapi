
<?php include __DIR__ . '/inc/header.php'; ?>

<main class="pt-16 pb-24 md:pb-0">
    <!-- Hero Section -->
    <section class="relative overflow-hidden pt-20 pb-32 border-b border-border-subtle transition-all duration-1000 opacity-100 translate-y-0">
        <div class="max-w-container-max mx-auto px-margin-mobile relative z-10">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-primary/10 border border-primary/20 rounded-full mb-stack-lg">
                    <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                    <span class="font-label-caps text-label-caps text-primary">v0.1</span>
                </div>
                <h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg mb-stack-md text-on-background leading-tight">
                    TypeAPI - An OpenAPI alternative for <span class="text-primary">type-safe</span> code generation.
                </h1>
                <p class="font-body-lg text-body-lg text-text-muted mb-stack-lg leading-relaxed">
                    An OpenAPI alternative to describe REST APIs for type-safe code generation. Clean syntax, human-readable, and developer-first.
                </p>
                <div class="flex flex-col sm:flex-row gap-stack-md">
                    <a href="<?php echo $router->getAbsolutePath([\App\Controller\Specification::class, 'show']); ?>" class="px-8 py-3 bg-primary text-on-primary font-label-caps text-label-caps rounded-xl hover:bg-primary-fixed-dim transition-all active:scale-95 flex items-center justify-center gap-2">
                        <span class="">View Specification</span>
                        <span class="material-symbols-outlined" data-icon="arrow_forward">arrow_forward</span>
                    </a>
                    <a href="https://sandbox.sdkgen.app" class="px-8 py-3 bg-surface-elevated border border-border-subtle text-on-surface font-label-caps text-label-caps rounded-xl hover:bg-surface-container-high transition-all active:scale-95 flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined" data-icon="terminal">terminal</span>
                        <span class="">Try Generator</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Section: Simple API Bento Grid -->
    <!-- Use Cases / Argument Sections -->
    <section class="py-24 bg-surface-deep border-b border-border-subtle transition-all duration-1000 opacity-100 translate-y-0">
        <div class="max-w-container-max mx-auto px-margin-mobile">
            <div class="text-center mb-16">
                <h2 class="font-headline-md text-headline-md text-on-background mb-base">How TypeAPI Works</h2>
                <p class="text-text-muted">Explore how TypeAPI handles everything from simple endpoints to complex technical scenarios with type-safe code generation.</p>
            </div>
            <div class="space-y-24"><div class="grid grid-cols-1 lg:grid-cols-2 gap-stack-md"><div class="bg-surface-deep border border-border-subtle rounded-xl overflow-hidden code-glow flex flex-col"><div class="bg-surface-elevated px-stack-md py-3 border-b border-border-subtle flex items-center justify-between"><div class="flex items-center gap-2"><span class="font-label-caps text-label-caps">typeapi.json</span></div><span class="font-label-caps text-[10px] text-text-muted">SIMPLE API</span></div><div class="p-stack-md font-code-sm text-code-sm overflow-y-auto bg-surface-container-lowest h-[320px]"><pre class="text-on-surface-variant">{
  <span class="text-code-blue">"operations"</span>: {
    <span class="text-code-blue">"getMessage"</span>: {
      <span class="text-text-muted">"method"</span>: <span class="text-code-cyan">"GET"</span>,
      <span class="text-text-muted">"path"</span>: <span class="text-code-cyan">"/hello/world"</span>,
      <span class="text-text-muted">"return"</span>: {
        <span class="text-text-muted">"schema"</span>: {
          <span class="text-text-muted">"type"</span>: <span class="text-code-cyan">"reference"</span>,
          <span class="text-text-muted">"target"</span>: <span class="text-code-cyan">"Hello_World"</span>
        }
      }
    }
  },
  <span class="text-code-blue">"definitions"</span>: {
    <span class="text-code-blue">"Hello_World"</span>: {
      <span class="text-text-muted">"type"</span>: <span class="text-code-cyan">"object"</span>,
      <span class="text-text-muted">"properties"</span>: {
        <span class="text-code-blue">"message"</span>: {
          <span class="text-text-muted">"type"</span>: <span class="text-code-cyan">"string"</span>
        }
      }
    }
  }
}</pre></div></div><div class="bg-surface-deep border border-border-subtle rounded-xl overflow-hidden code-glow flex flex-col"><div class="bg-surface-elevated px-stack-md py-3 border-b border-border-subtle flex items-center justify-between"><span class="font-label-caps text-label-caps text-on-surface">Client SDK</span><div class="px-2 py-0.5 bg-blue-500/10 border border-blue-500/20 text-blue-400 rounded text-[10px] font-bold uppercase">TypeScript</div></div><div class="p-stack-md font-code-sm text-code-sm bg-surface-container-lowest h-[320px] flex flex-col"><div class="flex-grow"><pre class="text-on-surface-variant"><span class="text-code-blue">const</span> client = <span class="text-code-cyan">new</span> <span class="text-primary">Client</span>()
<span class="text-code-blue">const</span> response = <span class="text-code-cyan">await</span> client.<span class="text-code-blue">getMessage</span>()

<span class="text-code-blue">interface</span> <span class="text-primary">HelloWorld</span> <span class="text-code-cyan">{</span>
    message<span class="text-code-cyan">?</span>: <span class="text-code-blue">string</span>
<span class="text-code-cyan">}</span></pre></div><div class="mt-4 pt-4 border-t border-border-subtle"><h4 class="text-on-surface font-semibold text-sm mb-1">Simple API</h4><p class="text-text-muted text-[12px]">A simple GET endpoint which returns a hello world message.</p></div></div></div></div>
                <!-- Argument Query -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-stack-md"><div class="bg-surface-deep border border-border-subtle rounded-xl overflow-hidden code-glow flex flex-col"><div class="bg-surface-elevated px-stack-md py-3 border-b border-border-subtle flex items-center justify-between"><div class="flex items-center gap-2"><span class="font-label-caps text-label-caps">typeapi.json</span></div><span class="font-label-caps text-[10px] text-text-muted">ARGUMENT QUERY</span></div><div class="p-stack-md font-code-sm text-code-sm overflow-y-auto bg-surface-container-lowest h-[320px]"><pre class="text-on-surface-variant">{
  <span class="text-code-blue">"operations"</span>: {
    <span class="text-code-blue">"getAll"</span>: {
      <span class="text-text-muted">"method"</span>: <span class="text-code-cyan">"GET"</span>,
      <span class="text-text-muted">"path"</span>: <span class="text-code-cyan">"/todo"</span>,
      <span class="text-code-blue">"arguments"</span>: {
        <span class="text-code-blue">"startIndex"</span>: {
          <span class="text-text-muted">"in"</span>: <span class="text-code-cyan">"query"</span>,
          <span class="text-text-muted">"schema"</span>: { <span class="text-text-muted">"type"</span>: <span class="text-code-cyan">"integer"</span> }
        },
        <span class="text-code-blue">"count"</span>: {
          <span class="text-text-muted">"in"</span>: <span class="text-code-cyan">"query"</span>,
          <span class="text-text-muted">"schema"</span>: { <span class="text-text-muted">"type"</span>: <span class="text-code-cyan">"integer"</span> }
        }
      },
      <span class="text-text-muted">"return"</span>: {
        <span class="text-text-muted">"schema"</span>: { <span class="text-text-muted">"type"</span>: <span class="text-code-cyan">"reference"</span>, <span class="text-text-muted">"target"</span>: <span class="text-code-cyan">"Todos"</span> }
      }
    }
  }
}</pre></div></div><div class="bg-surface-deep border border-border-subtle rounded-xl overflow-hidden code-glow flex flex-col"><div class="bg-surface-elevated px-stack-md py-3 border-b border-border-subtle flex items-center justify-between"><span class="font-label-caps text-label-caps text-on-surface">Client SDK</span><div class="px-2 py-0.5 bg-blue-500/10 border border-blue-500/20 text-blue-400 rounded text-[10px] font-bold uppercase">TypeScript</div></div><div class="p-stack-md font-code-sm text-code-sm bg-surface-container-lowest h-[320px] flex flex-col"><div class="flex-grow"><pre class="text-on-surface-variant"><span class="text-code-blue">const</span> client = <span class="text-code-cyan">new</span> <span class="text-primary">Client</span>()
<span class="text-code-blue">const</span> response = <span class="text-code-cyan">await</span> client.<span class="text-code-blue">getAll</span>(0, 10)

<span class="text-code-blue">interface</span> <span class="text-primary">Todos</span> <span class="text-code-cyan">{</span>
    entries<span class="text-code-cyan">?</span>: <span class="text-primary">Todo</span>[]
<span class="text-code-cyan">}</span></pre></div><div class="mt-4 pt-4 border-t border-border-subtle"><h4 class="text-on-surface font-semibold text-sm mb-1">Argument Query</h4><p class="text-text-muted text-[12px]">Map values from the HTTP request to arguments, in this example we map query parameters to startIndex and count.</p></div></div></div></div>
                <!-- Argument Body -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-stack-md"><div class="bg-surface-deep border border-border-subtle rounded-xl overflow-hidden code-glow flex flex-col"><div class="bg-surface-elevated px-stack-md py-3 border-b border-border-subtle flex items-center justify-between"><div class="flex items-center gap-2"><span class="font-label-caps text-label-caps">typeapi.json</span></div><span class="font-label-caps text-[10px] text-text-muted">ARGUMENT BODY</span></div><div class="p-stack-md font-code-sm text-code-sm overflow-y-auto bg-surface-container-lowest h-[320px]"><pre class="text-on-surface-variant">{
  <span class="text-code-blue">"operations"</span>: {
    <span class="text-code-blue">"create"</span>: {
      <span class="text-text-muted">"method"</span>: <span class="text-code-cyan">"POST"</span>,
      <span class="text-text-muted">"path"</span>: <span class="text-code-cyan">"/todo"</span>,
      <span class="text-code-blue">"arguments"</span>: {
        <span class="text-code-blue">"payload"</span>: {
          <span class="text-text-muted">"in"</span>: <span class="text-code-cyan">"body"</span>,
          <span class="text-text-muted">"schema"</span>: { <span class="text-text-muted">"type"</span>: <span class="text-code-cyan">"reference"</span>, <span class="text-text-muted">"target"</span>: <span class="text-code-cyan">"Todo"</span> }
        }
      },
      <span class="text-text-muted">"return"</span>: {
        <span class="text-text-muted">"schema"</span>: { <span class="text-text-muted">"type"</span>: <span class="text-code-cyan">"reference"</span>, <span class="text-text-muted">"target"</span>: <span class="text-code-cyan">"Message"</span> }
      }
    }
  }
}</pre></div></div><div class="bg-surface-deep border border-border-subtle rounded-xl overflow-hidden code-glow flex flex-col"><div class="bg-surface-elevated px-stack-md py-3 border-b border-border-subtle flex items-center justify-between"><span class="font-label-caps text-label-caps text-on-surface">Client SDK</span><div class="px-2 py-0.5 bg-blue-500/10 border border-blue-500/20 text-blue-400 rounded text-[10px] font-bold uppercase">TypeScript</div></div><div class="p-stack-md font-code-sm text-code-sm bg-surface-container-lowest h-[320px] flex flex-col"><div class="flex-grow"><pre class="text-on-surface-variant"><span class="text-code-blue">const</span> client = <span class="text-code-cyan">new</span> <span class="text-primary">Client</span>()
<span class="text-code-blue">const</span> response = <span class="text-code-cyan">await</span> client.<span class="text-code-blue">create</span>({
    title: <span class="text-code-cyan">"hello world"</span>
})

<span class="text-code-blue">interface</span> <span class="text-primary">Message</span> <span class="text-code-cyan">{</span>
    success<span class="text-code-cyan">?</span>: <span class="text-code-blue">boolean</span>
    message<span class="text-code-cyan">?</span>: <span class="text-code-blue">string</span>
<span class="text-code-cyan">}</span></pre></div><div class="mt-4 pt-4 border-t border-border-subtle"><h4 class="text-on-surface font-semibold text-sm mb-1">Argument Body</h4><p class="text-text-muted text-[12px]">In this example we map the HTTP request body to the payload argument.</p></div></div></div></div>
                <!-- Throws -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-stack-md"><div class="bg-surface-deep border border-border-subtle rounded-xl overflow-hidden code-glow flex flex-col"><div class="bg-surface-elevated px-stack-md py-3 border-b border-border-subtle flex items-center justify-between"><div class="flex items-center gap-2"><span class="font-label-caps text-label-caps">typeapi.json</span></div><span class="font-label-caps text-[10px] text-text-muted">THROWS</span></div><div class="p-stack-md font-code-sm text-code-sm overflow-y-auto bg-surface-container-lowest h-[320px]"><pre class="text-on-surface-variant">{
  <span class="text-code-blue">"operations"</span>: {
    <span class="text-code-blue">"getMessage"</span>: {
      <span class="text-text-muted">"method"</span>: <span class="text-code-cyan">"GET"</span>,
      <span class="text-text-muted">"path"</span>: <span class="text-code-cyan">"/hello/world"</span>,
      <span class="text-code-blue">"throws"</span>: [{
        <span class="text-code-blue">"code"</span>: 500,
        <span class="text-code-blue">"schema"</span>: {
          <span class="text-text-muted">"type"</span>: <span class="text-code-cyan">"reference"</span>,
          <span class="text-text-muted">"target"</span>: <span class="text-code-cyan">"Error"</span>
        }
      }]
    }
  }
}</pre></div></div><div class="bg-surface-deep border border-border-subtle rounded-xl overflow-hidden code-glow flex flex-col"><div class="bg-surface-elevated px-stack-md py-3 border-b border-border-subtle flex items-center justify-between"><span class="font-label-caps text-label-caps text-on-surface">Client SDK</span><div class="px-2 py-0.5 bg-blue-500/10 border border-blue-500/20 text-blue-400 rounded text-[10px] font-bold uppercase">TypeScript</div></div><div class="p-stack-md font-code-sm text-code-sm bg-surface-container-lowest h-[320px] flex flex-col"><div class="flex-grow"><pre class="text-on-surface-variant"><span class="text-code-blue">try</span> <span class="text-code-cyan">{</span>
    <span class="text-code-blue">const</span> response = <span class="text-code-cyan">await</span> client.<span class="text-code-blue">getMessage</span>()
<span class="text-code-cyan">}</span> <span class="text-code-blue">catch</span> (e) <span class="text-code-cyan">{</span>
    <span class="text-code-blue">if</span> (e <span class="text-code-blue">instanceof</span> <span class="text-primary">ErrorException</span>) <span class="text-code-cyan">{</span>
        <span class="text-code-blue">const</span> error = e.<span class="text-code-blue">getPayload</span>()
    <span class="text-code-cyan">}</span>
<span class="text-code-cyan">}</span></pre></div><div class="mt-4 pt-4 border-t border-border-subtle"><h4 class="text-on-surface font-semibold text-sm mb-1">Throws</h4><p class="text-text-muted text-[12px]">Define specific error payloads, the generated client will then also throw an exception in case of error codes.</p></div></div></div></div>
                <!-- Operation Group -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-stack-md"><div class="bg-surface-deep border border-border-subtle rounded-xl overflow-hidden code-glow flex flex-col"><div class="bg-surface-elevated px-stack-md py-3 border-b border-border-subtle flex items-center justify-between"><div class="flex items-center gap-2"><span class="font-label-caps text-label-caps">typeapi.json</span></div><span class="font-label-caps text-[10px] text-text-muted">OPERATION GROUP</span></div><div class="p-stack-md font-code-sm text-code-sm overflow-y-auto bg-surface-container-lowest h-[320px]"><pre class="text-on-surface-variant">{
  <span class="text-code-blue">"operations"</span>: {
    <span class="text-code-blue">"todo.create"</span>: {
      <span class="text-text-muted">"method"</span>: <span class="text-code-cyan">"POST"</span>,
      <span class="text-text-muted">"path"</span>: <span class="text-code-cyan">"/todo"</span>
    },
    <span class="text-code-blue">"product.create"</span>: {
      <span class="text-text-muted">"method"</span>: <span class="text-code-cyan">"POST"</span>,
      <span class="text-text-muted">"path"</span>: <span class="text-code-cyan">"/product"</span>
    }
  }
}</pre></div></div><div class="bg-surface-deep border border-border-subtle rounded-xl overflow-hidden code-glow flex flex-col"><div class="bg-surface-elevated px-stack-md py-3 border-b border-border-subtle flex items-center justify-between"><span class="font-label-caps text-label-caps text-on-surface">Client SDK</span><div class="px-2 py-0.5 bg-blue-500/10 border border-blue-500/20 text-blue-400 rounded text-[10px] font-bold uppercase">TypeScript</div></div><div class="p-stack-md font-code-sm text-code-sm bg-surface-container-lowest h-[320px] flex flex-col"><div class="flex-grow"><pre class="text-on-surface-variant"><span class="text-code-blue">const</span> client = <span class="text-code-cyan">new</span> <span class="text-primary">Client</span>()

<span class="text-code-cyan">await</span> client.<span class="text-code-blue">todo</span>().<span class="text-code-blue">create</span>(payload)
<span class="text-code-cyan">await</span> client.<span class="text-code-blue">product</span>().<span class="text-code-blue">create</span>(payload)</pre></div><div class="mt-4 pt-4 border-t border-border-subtle"><h4 class="text-on-surface font-semibold text-sm mb-1">Operation Group</h4><p class="text-text-muted text-[12px]">Through the dot notation at the operation key you can group your operations into logical units.</p></div></div></div></div>
            </div>
        </div>
    </section>
    <!-- Ecosystem Section -->
    <section class="py-24 bg-surface-base border-y border-border-subtle overflow-hidden transition-all duration-1000 opacity-100 translate-y-0">
        <div class="max-w-container-max mx-auto px-margin-mobile">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="lg:w-1/2">
                    <h2 class="font-headline-md text-headline-md text-on-background mb-stack-md">Built for Modern Teams</h2>
                    <p class="text-text-muted mb-stack-lg leading-relaxed">
                        Our code generator uses proven technology to generate fully type-safe client/server pairs across the most popular ecosystems. From C# to TypeScript, we've got you covered.
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-4 bg-surface-deep border border-border-subtle rounded-lg flex items-center gap-3">
                            <span class="material-symbols-outlined text-code-cyan" data-icon="integration_instructions">integration_instructions</span>
                            <span class="font-label-caps text-label-caps">SDK Generation</span>
                        </div>
                        <div class="p-4 bg-surface-deep border border-border-subtle rounded-lg flex items-center gap-3">
                            <span class="material-symbols-outlined text-code-cyan" data-icon="hub">hub</span>
                            <span class="font-label-caps text-label-caps">API Discovery</span>
                        </div>
                        <div class="p-4 bg-surface-deep border border-border-subtle rounded-lg flex items-center gap-3">
                            <span class="material-symbols-outlined text-code-cyan" data-icon="security">security</span>
                            <span class="font-label-caps text-label-caps">Type Safety</span>
                        </div>
                        <div class="p-4 bg-surface-deep border border-border-subtle rounded-lg flex items-center gap-3">
                            <span class="material-symbols-outlined text-code-cyan" data-icon="speed">speed</span>
                            <span class="font-label-caps text-label-caps">Performance</span>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 w-full">
                    <div class="relative group">
                        <div class="absolute -inset-1 bg-gradient-to-r from-primary to-code-blue rounded-xl blur opacity-25 group-hover:opacity-40 transition duration-1000"></div>
                        <div class="relative bg-surface-deep border border-border-subtle rounded-xl overflow-hidden">
                            <table class="w-full text-left font-label-caps text-label-caps">
                                <thead class="bg-surface-elevated text-on-surface-variant border-b border-border-subtle">
                                <tr>
                                    <th class="p-4">Language</th>
                                    <th class="p-4">Client</th>
                                    <th class="p-4">Server</th>
                                </tr>
                                </thead>
                                <tbody class="text-on-surface">
                                <tr class="border-b border-border-subtle hover:bg-surface-container transition-colors">
                                    <td class="p-4">C#</td>
                                    <td class="p-4 text-primary"><a href="https://learn.microsoft.com/de-de/dotnet/api/system.net.http.httpclient">HttpClient</a></td>
                                    <td class="p-4 text-code-blue"><a href="https://asp.net/web-api">ASP Web-API</a></td>
                                </tr>
                                <tr class="border-b border-border-subtle hover:bg-surface-container transition-colors">
                                    <td class="p-4">Java</td>
                                    <td class="p-4 text-primary"><a href="https://hc.apache.org/index.html">Apache</a></td>
                                    <td class="p-4 text-code-blue"><a href="https://spring.io/">Spring</a></td>
                                </tr>
                                <tr class="border-b border-border-subtle hover:bg-surface-container transition-colors">
                                    <td class="p-4">TypeScript</td>
                                    <td class="p-4 text-primary"><a href="https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API">Fetch</a></td>
                                    <td class="p-4 text-code-blue"><a href="https://nestjs.com/">NestJS</a></td>
                                </tr>
                                <tr class="border-b border-border-subtle hover:bg-surface-container transition-colors">
                                    <td class="p-4">PHP</td>
                                    <td class="p-4 text-primary"><a href="https://docs.guzzlephp.org/en/stable/">Guzzle</a></td>
                                    <td class="p-4 text-code-blue"><a href="https://symfony.com/">Symfony</a></td>
                                </tr>
                                <tr class="hover:bg-surface-container transition-colors">
                                    <td class="p-4">Python</td>
                                    <td class="p-4 text-primary"><a href="https://requests.readthedocs.io/en/latest/">Requests</a></td>
                                    <td class="p-4 text-code-blue"><a href="https://fastapi.tiangolo.com/">FastAPI</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA Section -->
    <section class="py-32 relative overflow-hidden transition-all duration-1000 opacity-100 translate-y-0">
        <div class="max-w-container-max mx-auto px-margin-mobile relative z-10 text-center">
            <h2 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg mb-stack-md">Ready to build better APIs?</h2>
            <p class="text-text-muted mb-stack-lg max-w-2xl mx-auto">Join the ecosystem of tools designed for the next generation of type-safe backend development.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="<?php echo $router->getAbsolutePath([\App\Controller\Specification::class, 'show']); ?>" class="px-8 py-3 bg-primary text-on-primary font-label-caps text-label-caps rounded-xl hover:bg-primary-fixed-dim transition-all active:scale-95">Get Started Now</a>
                <a href="https://discord.gg/eMrMgwsc6e" class="px-8 py-3 bg-surface-elevated border border-border-subtle text-on-surface font-label-caps text-label-caps rounded-xl hover:bg-surface-container-high transition-all active:scale-95">Discord Community</a>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/inc/footer.php'; ?>
