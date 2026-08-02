
<?php include __DIR__ . '/inc/header.php'; ?>

<main class="pt-16 pb-24">
    <section class="max-w-container-max mx-auto px-margin-mobile md:px-stack-lg pt-stack-lg md:pt-16">
        <div class="flex flex-col gap-2">
            <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface">Integration</h1>
            <div class="h-1 w-24 bg-primary rounded-full mt-2"></div>
            <p class="font-body-lg text-body-lg text-text-muted">
                Explore how TypeAPI transforms your specifications into production-ready code. These examples demonstrate the clean, type-safe client SDKs and server stubs generated for every major ecosystem, giving you a first-hand look at the developer experience.
            </p>
        </div>
    </section>
    <!-- Language Selector -->
    <section class="max-w-container-max mx-auto px-margin-mobile md:px-stack-lg pt-stack-lg md:pt-16">
        <div class="flex items-center gap-stack-sm overflow-x-auto scroll-hide pb-2">
            <button class="lang-btn px-gutter py-2 rounded-xl border border-border-subtle bg-surface-container text-primary font-label-caps text-label-caps flex items-center gap-2 transition-all active:scale-95" id="btn-typescript" onclick="switchLang('typescript')">
                <span class="w-2 h-2 rounded-full bg-primary"></span> TYPESCRIPT
            </button>
            <button class="lang-btn px-gutter py-2 rounded-xl border border-border-subtle bg-surface-container-low text-text-muted font-label-caps text-label-caps flex items-center gap-2 transition-all active:scale-95" id="btn-php" onclick="switchLang('php')">
                <span class="w-2 h-2 rounded-full bg-transparent"></span> PHP
            </button>
            <button class="lang-btn px-gutter py-2 rounded-xl border border-border-subtle bg-surface-container-low text-text-muted font-label-caps text-label-caps flex items-center gap-2 transition-all active:scale-95" id="btn-python" onclick="switchLang('python')">
                <span class="w-2 h-2 rounded-full bg-transparent"></span> PYTHON
            </button>
            <button class="lang-btn px-gutter py-2 rounded-xl border border-border-subtle bg-surface-container-low text-text-muted font-label-caps text-label-caps flex items-center gap-2 transition-all active:scale-95" id="btn-csharp" onclick="switchLang('csharp')">
                <span class="w-2 h-2 rounded-full bg-transparent"></span> C#
            </button>
            <button class="lang-btn px-gutter py-2 rounded-xl border border-border-subtle bg-surface-container-low text-text-muted font-label-caps text-label-caps flex items-center gap-2 transition-all active:scale-95" id="btn-java" onclick="switchLang('java')">
                <span class="w-2 h-2 rounded-full bg-transparent"></span> JAVA
            </button>
            <button class="lang-btn px-gutter py-2 rounded-xl border border-border-subtle bg-surface-container-low text-text-muted font-label-caps text-label-caps flex items-center gap-2 transition-all active:scale-95" id="btn-go" onclick="switchLang('go')">
                <span class="w-2 h-2 rounded-full bg-transparent"></span> GO
            </button>
        </div>
    </section>
    <!-- Code Implementation Bento -->
    <section class="max-w-container-max mx-auto px-margin-mobile md:px-stack-lg pt-stack-lg md:pt-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-gutter">
            <!-- Client SDK -->
            <div class="flex flex-col gap-stack-sm">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">send</span>
                    <h2 class="font-headline-md text-headline-md text-on-background">Client SDK</h2>
                </div>
                <div class="glass-card rounded-xl overflow-hidden flex flex-col h-full">
                    <div class="code-block-header px-stack-md py-stack-sm flex justify-between items-center bg-surface-container-highest/30">
                        <span class="font-code-sm text-code-sm text-text-muted" id="client-filename">client.ts</span>
                        <div class="flex gap-1.5">
                            <div class="w-2.5 h-2.5 rounded-full bg-[#ff5f56]"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-[#ffbd2e]"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-[#27c93f]"></div>
                        </div>
                    </div>
                    <div class="p-stack-md bg-surface-container-lowest overflow-x-auto flex-grow" style="background-color: rgb(30, 30, 30);">
<pre><code class="language-typescript" id="client-code-block">const credentials = new Anonymous();
const client = new Client('http://127.0.0.1:1080', credentials);

message = client.test().getHello()

console.log('Message: ' + message.message);</code></pre>
                    </div>
                </div>
            </div>
            <!-- Server Stub -->
            <div class="flex flex-col gap-stack-sm" id="server-section">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">dns</span>
                    <h2 class="font-headline-md text-headline-md text-on-background">Server Stub</h2>
                </div>
                <div class="glass-card rounded-xl overflow-hidden flex flex-col h-full">
                    <div class="code-block-header px-stack-md py-stack-sm flex justify-between items-center bg-surface-container-highest/30">
                        <span class="font-code-sm text-code-sm text-text-muted" id="server-filename">controller.ts</span>
                        <button class="flex items-center gap-1 text-text-muted hover:text-primary transition-colors">
                            <span class="material-symbols-outlined text-[16px]">content_copy</span>
                            <span class="font-label-caps text-[10px]">COPY</span>
                        </button>
                    </div>
                    <div class="p-stack-md bg-surface-container-lowest overflow-x-auto flex-grow" style="background-color: rgb(30, 30, 30);">
<pre><code class="language-typescript" id="server-code-block">@Controller()
export class AppController {
  @Get('/hello/world')
  @HttpCode(200)
  getMessage(): HelloWorld {
    // @TODO implement method
    return {};
  }

}</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    const langData = {
        typescript: {
            clientFile: "client.ts",
            clientCode: `const credentials = new Anonymous();
const client = new Client('http://127.0.0.1:1080', credentials);

message = client.test().getHello()

console.log('Message: ' + message.message);`,
            serverFile: "controller.ts",
            serverCode: `@Controller()
export class AppController {
  @Get('/hello/world')
  @HttpCode(200)
  getMessage(): HelloWorld {
    // @TODO implement method
    return {};
  }

}`
        },
        php: {
            clientFile: "client.php",
            clientCode: `&lt;?php

$credentials = new \\Sdkgen\\Client\\Credentials\\Anonymous();
$client = new Client('http://127.0.0.1:1080', $credentials);

$message = $client->test()->getHello();

echo 'Message: ' . $message->getMessage();`,
            serverFile: "Controller.php",
            serverCode: `class App extends AbstractController
{
    #[Route('/hello/world', methods: ['GET'])]
    #[StatusCode(200)]
    public function getMessage(): Model\\HelloWorld
    {
        // @TODO implement method
    }

}`
        },
        python: {
            clientFile: "client.py",
            clientCode: `credentials = Anonymous()
client = Client('http://127.0.0.1:1080', credentials)

message = client.test().get_hello()

print('Message: ' + message.message);`,
            serverFile: "app.py",
            serverCode: `app = FastAPI()

@app.get("/hello/world", status_code=200)
async def getMessage():
    # @TODO implement method
    pass`
        },
        csharp: {
            clientFile: "Program.cs",
            clientCode: `Anonymous credentials = new Anonymous();
Client client = new Client("http://127.0.0.1:1080", credentials);

HelloWorld message = await client.Test().GetHello();

Console.WriteLine("Message: " + message.Message);`,
            serverFile: "AppController.cs",
            serverCode: `[ApiController]
public class App : ControllerBase
{
    [Route("hello/world")]
    [HttpGet]
    [ProducesResponseType(200)]
    public HelloWorld getMessage()
    {
        // @TODO implement method
    }

}`
        },
        java: {
            clientFile: "Main.java",
            clientCode: `Anonymous credentials = new Anonymous();
Client client = new Client("http://127.0.0.1:1080", credentials);

HelloWorld message = client.test().getHello();

System.out.println("Message: " + message.getMessage());`,
            serverFile: "AppController.java",
            serverCode: `@RestController
class App {
    @GetMapping("/hello/world")
    @ResponseStatus(200)
    HelloWorld getMessage() {
        // @TODO implement method
    }

}`
        },
        go: {
            clientFile: "main.go",
            clientCode: `credentials := sdkgen.Anonymous{}

client, err := NewClient("http://127.0.0.1:1080", credentials)
if err != nil {
  log.Fatal(err)
}

message, err := client.Test().GetHello()
if err != nil {
  log.Fatal(err)
}

fmt.Println("Message: " + message.Message);`,
            serverFile: "", // Go doesn't have a specific server stub document provided in the prompt
            serverCode: ""
        }
    };

    function switchLang(lang) {
        // Update buttons
        document.querySelectorAll('.lang-btn').forEach(btn => {
            btn.classList.remove('bg-surface-container', 'text-primary');
            btn.classList.add('bg-surface-container-low', 'text-text-muted');
            btn.querySelector('span').classList.remove('bg-primary');
            btn.querySelector('span').classList.add('bg-transparent');
        });
        const activeBtn = document.getElementById(`btn-${lang}`);
        activeBtn.classList.add('bg-surface-container', 'text-primary');
        activeBtn.classList.remove('bg-surface-container-low', 'text-text-muted');
        activeBtn.querySelector('span').classList.add('bg-primary');
        activeBtn.querySelector('span').classList.remove('bg-transparent');

        // Update code
        const data = langData[lang];
        document.getElementById('client-filename').textContent = data.clientFile;

        const clientCodeEl = document.getElementById('client-code-block');
        clientCodeEl.textContent = data.clientCode.replace('&lt;', '<');
        clientCodeEl.className = `language-${lang}`;

        const serverSection = document.getElementById('server-section');
        if (data.serverCode) {
            serverSection.style.display = 'flex';
            document.getElementById('server-filename').textContent = data.serverFile;
            const serverCodeEl = document.getElementById('server-code-block');
            serverCodeEl.textContent = data.serverCode;
            serverCodeEl.className = `language-${lang}`;
        } else {
            serverSection.style.display = 'none';
        }

        // Re-highlight
        hljs.highlightAll();
    }

    // Initialization
    window.addEventListener('load', function() {
        hljs.highlightAll();
    });
</script>

<?php include __DIR__ . '/inc/footer.php'; ?>
