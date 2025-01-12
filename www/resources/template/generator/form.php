
<?php include __DIR__ . '/../inc/header.php'; ?>

<section class="section">
  <h1 class="title"><?php echo $typeName; ?> Generator</h1>
  <div class="columns">
    <div class="column is-half">
      <form id="generateForm" method="POST" action="<?php echo $router->getAbsolutePath([\App\Controller\Generator::class, 'generate'], ['type' => $type]); ?>">
        <div class="field">
          <div class="control">
            <input id="namespace" name="namespace" placeholder="Optional a namespace" value="<?php echo htmlspecialchars($namespace ?? ''); ?>" class="input">
          </div>
        </div>
        <div class="field">
          <div class="control">
            <textarea id="schema" name="schema" rows="24" class="textarea"><?php echo htmlspecialchars($schema); ?></textarea>
          </div>
        </div>
        <div class="control">
          <button class="g-recaptcha button is-primary" data-sitekey="<?php echo $recaptcha_key; ?>" data-callback="onGenerate" data-action="submit">Generate</button>
        </div>
      </form>
    </div>
    <div class="column is-half">
        <?php if(isset($output)): ?>
          <form id="downloadForm" method="POST" action="<?php echo $router->getAbsolutePath([\App\Controller\Generator::class, 'download'], ['type' => $type]); ?>" class="mb-3">
            <input type="hidden" name="namespace" value="<?php echo htmlspecialchars($namespace ?? ''); ?>">
            <input type="hidden" name="schema" value="<?php echo htmlspecialchars($schema); ?>">
            <button class="g-recaptcha button is-primary" data-sitekey="<?php echo $recaptcha_key; ?>" data-callback="onDownload" data-action="submit">Download</button>
            <a href="https://github.com/apioo/typeapi/discussions/new?category=<?php echo $type; ?>" class="button">Report Issue</a>
          </form>
            <?php if ($output instanceof stdClass): ?>
                <?php foreach ($output as $fileName => $chunk): ?>
              <div class="card">
                <header class="card-header">
                  <p class="card-header-title"><?php echo $fileName; ?></p>
                </header>
                <div class="card-content">
                  <pre><code class="<?php echo $type; ?>"><?php echo htmlspecialchars($chunk); ?></code></pre>
                </div>
              </div>
                <?php endforeach; ?>
            <?php else: ?>
            <div class="card">
              <header class="card-header">
                <p class="card-header-title">Output</p>
              </header>
              <div class="card-content">
                <pre><code class="<?php echo $type; ?>"><?php echo htmlspecialchars($output); ?></code></pre>
              </div>
            </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
  </div>
</section>

<script>window.addEventListener('load', function() { hljs.highlightAll() });</script>
<script>function onGenerate(token) { document.getElementById("generateForm").submit(); }</script>
<script>function onDownload(token) { document.getElementById("downloadForm").submit(); }</script>

<?php include __DIR__ . '/../inc/footer.php'; ?>
