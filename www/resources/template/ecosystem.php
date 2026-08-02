
<?php include __DIR__ . '/inc/header.php'; ?>

<main class="pt-16 pb-24">
    <section class="max-w-container-max mx-auto px-margin-mobile md:px-stack-lg pt-stack-lg md:pt-16">
        <div class="flex flex-col gap-2">
            <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface">Ecosystem</h1>
            <div class="h-1 w-24 bg-primary rounded-full mt-2"></div>
        </div>
    </section>
    <!-- Core Pillars (Bento Grid) -->
    <section class="max-w-container-max mx-auto px-margin-mobile md:px-stack-lg py-stack-lg">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter"><!-- TypeSchema -->
            <div class="md:col-span-4 group relative overflow-hidden bg-surface-base border border-border-subtle p-stack-md hover:border-primary transition-all duration-300 flex flex-col">
                <div class="flex items-center gap-stack-sm mb-4">
                    <span class="material-symbols-outlined text-primary" data-icon="schema">schema</span>
                    <span class="font-label-caps text-primary tracking-widest text-[10px]">BACKBONE</span>
                </div>
                <h3 class="font-headline-md text-body-lg font-bold mb-3">TypeSchema</h3>
                <p class="text-text-muted text-sm mb-6 leading-relaxed">
                    The definitive language-neutral data modeling format designed for generating clean, type-safe data models.
                </p>
                <div class="mt-auto">
                    <a class="text-primary font-label-caps text-xs hover:underline" href="https://typeschema.org/">DOCS →</a>
                </div>
            </div>
            <!-- SDKgen -->
            <div class="md:col-span-4 group relative overflow-hidden bg-surface-base border border-border-subtle p-stack-md hover:border-primary transition-all duration-300 flex flex-col">
                <div class="flex items-center gap-stack-sm mb-4 text-code-cyan">
                    <span class="material-symbols-outlined" data-icon="terminal">terminal</span>
                    <span class="font-label-caps tracking-widest text-[10px]">ENGINE</span>
                </div>
                <h3 class="font-headline-md text-body-lg font-bold mb-3">SDKgen</h3>
                <p class="text-text-muted text-sm mb-6 leading-relaxed">
                    Transform API definitions into production-ready SDKs across 10+ languages. Automatic and consistent.
                </p>
                <div class="mt-auto">
                    <a class="text-primary font-label-caps text-xs hover:underline" href="https://sdkgen.app/">GENERATE →</a>
                </div>
            </div>
            <!-- TypeHub -->
            <div class="md:col-span-4 group relative overflow-hidden bg-surface-base border border-border-subtle p-stack-md hover:border-primary transition-all duration-300 flex flex-col">
                <div class="flex items-center gap-stack-sm mb-4 text-tertiary">
                    <span class="material-symbols-outlined" data-icon="hub">hub</span>
                    <span class="font-label-caps tracking-widest text-[10px]">COLLABORATION</span>
                </div>
                <h3 class="font-headline-md text-body-lg font-bold mb-3">TypeHub</h3>
                <p class="text-text-muted text-sm mb-6 leading-relaxed">
                    A centralized hub for designing, discovering, and versioning your API specifications with team governance.
                </p>
                <div class="mt-auto">
                    <a class="text-primary font-label-caps text-xs hover:underline" href="https://typehub.cloud/">ENTER HUB →</a>
                </div>
            </div></div>
    </section>
    <!-- Tools -->
    <section class="max-w-container-max mx-auto px-margin-mobile md:px-stack-lg py-stack-lg mt-stack-lg">
        <div class="mb-stack-lg">
            <h2 class="font-headline-md text-headline-md text-primary mb-2">Tools</h2>
            <p class="text-text-muted max-w-2xl">Enhance your workflow with official TypeAPI utilities designed for the terminal and the browser.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
            <!-- Sandbox -->
            <div class="p-stack-md bg-surface-base border border-border-subtle rounded-xl hover:border-primary transition-all flex flex-col">
                <div class="w-12 h-12 bg-surface-deep rounded-lg border border-border-subtle flex items-center justify-center mb-stack-md">
                    <span class="material-symbols-outlined text-primary" data-icon="edit_note">edit_note</span>
                </div>
                <h4 class="font-headline-md text-body-lg font-bold mb-2">Sandbox</h4>
                <p class="text-text-muted text-sm mb-stack-md leading-relaxed">Online UI editor to design a TypeAPI specification</p>
                <div class="mt-auto">
                    <a class="text-primary text-xs font-label-caps flex items-center gap-1 hover:gap-2 transition-all" href="https://sandbox.sdkgen.app/">TRY ONLINE <span class="material-symbols-outlined text-xs" data-icon="open_in_new">open_in_new</span></a>
                </div>
            </div>
            <!-- Electron -->
            <div class="p-stack-md bg-surface-base border border-border-subtle rounded-xl hover:border-primary transition-all flex flex-col">
                <div class="w-12 h-12 bg-surface-deep rounded-lg border border-border-subtle flex items-center justify-center mb-stack-md">
                    <span class="material-symbols-outlined text-secondary" data-icon="desktop_windows">desktop_windows</span>
                </div>
                <h4 class="font-headline-md text-body-lg font-bold mb-2">Electron</h4>
                <p class="text-text-muted text-sm mb-stack-md leading-relaxed">Electron version of the online UI editor</p>
                <div class="mt-auto">
                    <a class="text-primary text-xs font-label-caps flex items-center gap-1 hover:gap-2 transition-all" href="https://github.com/apioo/sdkgen-electron">VIEW ON GITHUB <span class="material-symbols-outlined text-xs" data-icon="open_in_new">open_in_new</span></a>
                </div>
            </div>
            <!-- CLI -->
            <div class="p-stack-md bg-surface-base border border-border-subtle rounded-xl hover:border-primary transition-all flex flex-col">
                <div class="w-12 h-12 bg-surface-deep rounded-lg border border-border-subtle flex items-center justify-center mb-stack-md">
                    <span class="material-symbols-outlined text-code-blue" data-icon="terminal">terminal</span>
                </div>
                <h4 class="font-headline-md text-body-lg font-bold mb-2">CLI</h4>
                <p class="text-text-muted text-sm mb-stack-md leading-relaxed">The powerful command-line interface for local code generation.</p>
                <code class="block bg-surface-deep p-2 rounded text-[11px] text-on-surface-variant font-code-sm mb-4 border border-border-subtle">$ sdkgen install</code>
                <div class="mt-auto">
                    <a class="text-primary text-xs font-label-caps flex items-center gap-1 hover:gap-2 transition-all" href="https://github.com/apioo/sdkgen-cli">CLI DOCS <span class="material-symbols-outlined text-xs" data-icon="keyboard_arrow_right">keyboard_arrow_right</span></a>
                </div>
            </div>
            <!-- Docker -->
            <div class="p-stack-md bg-surface-base border border-border-subtle rounded-xl hover:border-primary transition-all flex flex-col">
                <div class="w-12 h-12 bg-surface-deep rounded-lg border border-border-subtle flex items-center justify-center mb-stack-md">
                    <span class="material-symbols-outlined text-code-cyan" data-icon="terminal">terminal</span>
                </div>
                <h4 class="font-headline-md text-body-lg font-bold mb-2">Docker</h4>
                <p class="text-text-muted text-sm mb-stack-md leading-relaxed">Containerized generator for easy deployment.</p>
                <code class="block bg-surface-deep p-2 rounded text-[11px] text-on-surface-variant font-code-sm mb-4 border border-border-subtle">$ docker compose up</code>
                <div class="mt-auto">
                    <a class="text-primary text-xs font-label-caps flex items-center gap-1 hover:gap-2 transition-all" href="https://hub.docker.com/r/apiootech/sdkgen">DOCKER HUB <span class="material-symbols-outlined text-xs" data-icon="open_in_new">open_in_new</span></a>
                </div>
            </div>
            <!-- GitHub Action -->
            <div class="p-stack-md bg-surface-base border border-border-subtle rounded-xl hover:border-primary transition-all flex flex-col">
                <div class="w-12 h-12 bg-surface-deep rounded-lg border border-border-subtle flex items-center justify-center mb-stack-md">
                    <span class="material-symbols-outlined text-tertiary" data-icon="sync">sync</span>
                </div>
                <h4 class="font-headline-md text-body-lg font-bold mb-2">GitHub Action</h4>
                <p class="text-text-muted text-sm mb-stack-md leading-relaxed">GitHub action to automatically generate code based on a TypeAPI specification</p>
                <div class="mt-auto">
                    <a class="text-primary text-xs font-label-caps flex items-center gap-1 hover:gap-2 transition-all" href="https://github.com/marketplace/actions/sdkgen-code-generator">MARKETPLACE <span class="material-symbols-outlined text-xs" data-icon="open_in_new">open_in_new</span></a>
                </div>
            </div>
            <!-- REST API -->
            <div class="p-stack-md bg-surface-base border border-border-subtle rounded-xl hover:border-primary transition-all flex flex-col">
                <div class="w-12 h-12 bg-surface-deep rounded-lg border border-border-subtle flex items-center justify-center mb-stack-md">
                    <span class="material-symbols-outlined text-primary-fixed" data-icon="api">api</span>
                </div>
                <h4 class="font-headline-md text-body-lg font-bold mb-2">REST API</h4>
                <p class="text-text-muted text-sm mb-stack-md leading-relaxed">REST API to integrate the code generator</p>
                <div class="mt-auto">
                    <a class="text-primary text-xs font-label-caps flex items-center gap-1 hover:gap-2 transition-all" href="https://api.sdkgen.app/apps/redoc/">API DOCS <span class="material-symbols-outlined text-xs" data-icon="open_in_new">open_in_new</span></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Language Models Table -->
    <section class="max-w-container-max mx-auto px-margin-mobile md:px-stack-lg py-stack-lg mt-stack-lg">
        <div class="mb-stack-lg text-center">
            <h2 class="font-headline-md text-headline-md mb-2">Supported Language Ecosystems</h2>
            <p class="text-text-muted">Auto-generated DTO models used to parse or generate TypeAPI specifications. Since the TypeAPI specification is itself described via TypeSchema, these models are automatically kept in sync with the latest standard, providing a reliable foundation for building custom generators.</p>
        </div>
        <div class="overflow-x-auto border border-border-subtle rounded-xl bg-surface-base">
            <table class="w-full text-left border-collapse">
                <thead>
                <tr class="bg-surface-container-high border-b border-border-subtle">
                    <th class="p-4 font-label-caps text-on-surface-variant text-[11px] tracking-widest">LANGUAGE</th>

                    <th class="p-4 font-label-caps text-on-surface-variant text-[11px] tracking-widest">PACKAGE MANAGER</th>
                    <th class="p-4 font-label-caps text-on-surface-variant text-[11px] tracking-widest">GITHUB</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-border-subtle">
                <tr class="hover:bg-surface-elevated transition-colors"><td class="p-4 flex items-center gap-3"><span class="w-8 h-8 flex items-center justify-center bg-surface-deep rounded border border-border-subtle font-bold text-xs">C#</span><span class="font-medium">.NET / C#</span></td><td class="p-4 font-code-sm text-code-sm text-text-muted"><a href="https://www.nuget.org/packages/TypeAPI.Model/" class="text-primary hover:underline">NuGet</a></td><td class="p-4"><a class="text-primary hover:underline font-label-caps text-xs" href="https://github.com/apioo/typeapi-model-csharp">VIEW ON GITHUB</a></td></tr>
                <tr class="hover:bg-surface-elevated transition-colors"><td class="p-4 flex items-center gap-3"><span class="w-8 h-8 flex items-center justify-center bg-surface-deep rounded border border-border-subtle font-bold text-xs">GO</span><span class="font-medium">Go Lang</span></td><td class="p-4 font-code-sm text-code-sm text-text-muted">-</td><td class="p-4"><a class="text-primary hover:underline font-label-caps text-xs" href="https://github.com/apioo/typeapi-model-go">VIEW ON GITHUB</a></td></tr>
                <tr class="hover:bg-surface-elevated transition-colors"><td class="p-4 flex items-center gap-3"><span class="w-8 h-8 flex items-center justify-center bg-surface-deep rounded border border-border-subtle font-bold text-xs text-secondary">JAVA</span><span class="font-medium">Java</span></td><td class="p-4 font-code-sm text-code-sm text-text-muted"><a href="https://central.sonatype.com/artifact/org.typeapi/model" class="text-primary hover:underline">Maven</a></td><td class="p-4"><a class="text-primary hover:underline font-label-caps text-xs" href="https://github.com/apioo/typeapi-model-java">VIEW ON GITHUB</a></td></tr>
                <tr class="hover:bg-surface-elevated transition-colors"><td class="p-4 flex items-center gap-3"><span class="w-8 h-8 flex items-center justify-center bg-surface-deep rounded border border-border-subtle font-bold text-xs text-code-cyan">JS</span><span class="font-medium">TypeScript / JS</span></td><td class="p-4 font-code-sm text-code-sm text-text-muted"><a href="https://www.npmjs.com/package/typeapi-model" class="text-primary hover:underline">NPM</a></td><td class="p-4"><a class="text-primary hover:underline font-label-caps text-xs" href="https://github.com/apioo/typeapi-model-javascript">VIEW ON GITHUB</a></td></tr>
                <tr class="hover:bg-surface-elevated transition-colors"><td class="p-4 flex items-center gap-3"><span class="w-8 h-8 flex items-center justify-center bg-surface-deep rounded border border-border-subtle font-bold text-xs text-primary-fixed">PHP</span><span class="font-medium">PHP</span></td><td class="p-4 font-code-sm text-code-sm text-text-muted"><a href="https://packagist.org/packages/typeapi/model" class="text-primary hover:underline">Packagist</a></td><td class="p-4"><a class="text-primary hover:underline font-label-caps text-xs" href="https://github.com/apioo/typeapi-model-php">VIEW ON GITHUB</a></td></tr>
                <tr class="hover:bg-surface-elevated transition-colors"><td class="p-4 flex items-center gap-3"><span class="w-8 h-8 flex items-center justify-center bg-surface-deep rounded border border-border-subtle font-bold text-xs text-tertiary">PY</span><span class="font-medium">Python</span></td><td class="p-4 font-code-sm text-code-sm text-text-muted"><a href="https://pypi.org/project/typeapi-model/" class="text-primary hover:underline">PyPI</a></td><td class="p-4"><a class="text-primary hover:underline font-label-caps text-xs" href="https://github.com/apioo/typeapi-model-python">VIEW ON GITHUB</a></td></tr>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?php include __DIR__ . '/inc/footer.php'; ?>
