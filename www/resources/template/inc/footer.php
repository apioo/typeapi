
<footer class="bg-surface-deep border-t border-border-subtle py-16">
    <div class="max-w-container-max mx-auto px-margin-mobile">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-stack-lg mb-12">
            <div>
                <div class="flex items-center gap-2 mb-6">
                    <span class="material-symbols-outlined text-primary text-xl" data-icon="terminal">terminal</span>
                    <span class="font-bold text-lg text-primary">TypeAPI</span>
                </div>
                <p class="text-sm text-text-muted leading-relaxed">Revolutionizing API descriptions for the modern developer workflow.</p>
            </div>
            <div>
                <h4 class="font-label-caps text-label-caps text-on-surface mb-6 uppercase tracking-widest">Links</h4>
                <ul class="space-y-3 text-sm text-text-muted">
                    <li><a class="hover:text-primary transition-colors" href="https://typeapi.org/">TypeAPI</a></li>
                    <li><a class="hover:text-primary transition-colors" href="https://typeschema.org/">TypeSchema</a></li>
                    <li><a class="hover:text-primary transition-colors" href="https://typehub.cloud/">TypeHub</a></li>
                    <li><a class="hover:text-primary transition-colors" href="https://sdkgen.app/">SDKgen</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-label-caps text-label-caps text-on-surface mb-6 uppercase tracking-widest">Specification</h4>
                <ul class="space-y-3 text-sm text-text-muted">
                    <li><a class="hover:text-primary transition-colors" href="https://app.typehub.cloud/d/typehub/typeapi">TypeAPI</a></li>
                    <li><a class="hover:text-primary transition-colors" href="https://github.com/apioo/typeapi/blob/main/specification/typeapi.json">TypeAPI (GitHub)</a></li>
                    <li><a class="hover:text-primary transition-colors" href="https://app.typehub.cloud/d/typehub/typeschema">TypeSchema</a></li>
                    <li><a class="hover:text-primary transition-colors" href="https://github.com/apioo/typeschema/blob/master/specification/typeschema.json">TypeSchema (GitHub)</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-label-caps text-label-caps text-on-surface mb-6 uppercase tracking-widest">Contact</h4>
                <ul class="space-y-3 text-sm text-text-muted">
                    <li><a class="hover:text-primary transition-colors" href="https://discord.gg/eMrMgwsc6e">Discord</a></li>
                    <li><a class="hover:text-primary transition-colors" href="https://apioo.de/contact">Contact</a></li>
                    <li><a class="hover:text-primary transition-colors" href="https://apioo.de/imprint">Imprint</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<nav class="md:hidden fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-4 py-2 pb-safe bg-surface-deep border-t border-border-subtle">
    <a href="<?php echo $url; ?>">
        <div class="flex flex-col items-center justify-center text-on-surface-variant px-3 py-1">
            <span class="material-symbols-outlined" data-icon="home">home</span>
            <span class="font-label-caps text-[10px] mt-1">Home</span>
        </div>
    </a>
    <a href="<?php echo $router->getAbsolutePath([\App\Controller\Specification::class, 'show']); ?>">
        <div class="flex flex-col items-center justify-center text-on-surface-variant px-3 py-1">
            <span class="material-symbols-outlined" data-icon="menu_book">menu_book</span>
            <span class="font-label-caps text-[10px] mt-1">Spec</span>
        </div>
    </a>
    <a href="<?php echo $router->getAbsolutePath([\App\Controller\Ecosystem::class, 'show']); ?>">
        <div class="flex flex-col items-center justify-center text-on-surface-variant px-3 py-1">
            <span class="material-symbols-outlined" data-icon="extension">extension</span>
            <span class="font-label-caps text-[10px] mt-1">Docs</span>
        </div>
    </a>
    <a href="<?php echo $router->getAbsolutePath([\App\Controller\Integration::class, 'show']); ?>">
        <div class="flex flex-col items-center justify-center text-on-surface-variant px-3 py-1">
            <span class="material-symbols-outlined" data-icon="code">code</span>
            <span class="font-label-caps text-[10px] mt-1">Code</span>
        </div>
    </a>
</nav>
<script>
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('opacity-100', 'translate-y-0');
                entry.target.classList.remove('opacity-0', 'translate-y-10');
            }
        });
    }, observerOptions);

    document.querySelectorAll('section').forEach(section => {
        section.classList.add('transition-all', 'duration-1000', 'opacity-0', 'translate-y-10');
        observer.observe(section);
    });

    window.addEventListener('scroll', () => {
        const header = document.querySelector('header');
        if (window.scrollY > 20) {
            header.classList.add('bg-surface-deep/90', 'backdrop-blur-md');
        } else {
            header.classList.remove('bg-surface-deep/90', 'backdrop-blur-md');
        }
    });
</script>

<div class="apioo-brand">part of the <a href="https://apioo.de">Apioo-Project</a></div>

</body>
</html>
