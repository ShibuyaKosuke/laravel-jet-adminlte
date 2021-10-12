<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jet-adminlte:install {--composer=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Jetstream components and resources for AdminLTE';

    /**
     * @var string
     */
    protected string $controller_name;

    /**
     * @var string
     */
    protected string $view_name;

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->requireComposerPackages('livewire/livewire:^2.6');

        self::updateNodePackages(function ($packages) {
            return [
                    'alpinejs' => '^3.0.6',
                    "axios" => "^0.21",
                    "laravel-mix" => "^6.0.6",
                    "lodash" => "^4.17.19",
                    "postcss" => "^8.1.14",
                    'postcss-import' => '^14.0.1',
                    "resolve-url-loader" => "^4.0.0",
                    "sass" => "^1.42.1",
                    "sass-loader" => "^12.1.0"
                ] + $packages;
        }, true);

        self::updateNodePackages(function ($packages) {
            return [
                    "@fortawesome/fontawesome-free" => "^5.15.4",
                    "admin-lte" => "^3.1",
                    "ajv-keywords" => "^3.2.0",
                    "bootstrap" => "^4.6.0",
                    "bootstrap-colorpicker" => "^3.4.0",
                    "bootstrap-slider" => "^11.0.2",
                    "bootstrap-switch" => "^3.4.0",
                    "bs-custom-file-input" => "^1.3.4",
                    "bs-stepper" => "^1.7.0",
                    "chart.js" => "^3.5.1",
                    "cross-env" => "^5.1",
                    "daterangepicker" => "^3.1.0",
                    "dropzone" => "^5.9.3",
                    "flot" => "^4.2.2",
                    "icheck-bootstrap" => "^3.0.1",
                    "inputmask" => "^5.0.6",
                    "ion-rangeslider" => "^2.3.1",
                    "ionicons" => "^5.5.3",
                    "jqgrid" => "^4.6.4",
                    "jquery" => "^3.6",
                    "jquery-knob" => "^1.2.11",
                    "livewire" => "^0.6.1",
                    "select2" => "^4.1.0-rc.0",
                    "sparklines" => "^1.3.0",
                    "sweetalert2" => "^11.1.7",
                    "toastr" => "^2.1.4"
                ] + $packages;
        });
    }

    /**
     * Install the Livewire stack into the application.
     *
     * @return void
     */
    protected function installLivewireStack(): void
    {
    }

    /**
     * Install the service provider in the application configuration file.
     *
     * @param string $after
     * @param string $name
     * @return void
     */
    protected function installServiceProviderAfter(string $after, string $name): void
    {
        $appConfig = file_get_contents(config_path('app.php'));
        if (!Str::contains($appConfig, 'App\\Providers\\' . $name . '::class')) {
            file_put_contents(config_path('app.php'), str_replace(
                'App\\Providers\\' . $after . '::class,',
                'App\\Providers\\' . $after . '::class,' . PHP_EOL . '        App\\Providers\\' . $name . '::class,',
                $appConfig
            ));
        }
    }

    /**
     * Install the middleware to a group in the application Http Kernel.
     *
     * @param string $after
     * @param string $name
     * @param string $group
     * @return void
     */
    protected function installMiddlewareAfter(string $after, string $name, string $group = 'web'): void
    {
        $httpKernel = file_get_contents(app_path('Http/Kernel.php'));

        $middlewareGroups = Str::before(Str::after($httpKernel, '$middlewareGroups = ['), '];');
        $middlewareGroup = Str::before(Str::after($middlewareGroups, "'$group' => ["), '],');

        if (!Str::contains($middlewareGroup, $name)) {
            $modifiedMiddlewareGroup = str_replace(
                $after . ',',
                $after . ',' . PHP_EOL . '            ' . $name . ',',
                $middlewareGroup,
            );

            file_put_contents(app_path('Http/Kernel.php'), str_replace(
                $middlewareGroups,
                str_replace($middlewareGroup, $modifiedMiddlewareGroup, $middlewareGroups),
                $httpKernel
            ));
        }
    }

    /**
     * Installs the given Composer Packages into the application.
     *
     * @param mixed $packages
     * @return void
     */
    protected function requireComposerPackages(mixed $packages): void
    {
        $composer = $this->option('composer');

        if ($composer !== 'global') {
            $command = ['php', $composer, 'require'];
        }

        $command = array_merge(
            $command ?? ['composer', 'require'],
            is_array($packages) ? $packages : func_get_args()
        );

        (new Process($command, base_path(), ['COMPOSER_MEMORY_LIMIT' => '-1']))
            ->setTimeout(null)
            ->run(function ($type, $output) {
                $this->output->write($output);
            });
    }

    /**
     * Update the "package.json" file.
     *
     * @param callable $callback
     * @param boolean $dev
     * @return void
     */
    protected static function updateNodePackages(callable $callback, bool $dev = true): void
    {
        if (!file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = $callback(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );
    }

    /**
     * Delete the "node_modules" directory and remove the associated lock files.
     *
     * @return void
     */
    protected static function flushNodeModules(): void
    {
        tap(new Filesystem(), static function ($files) {
            $files->deleteDirectory(base_path('node_modules'));

            $files->delete(base_path('yarn.lock'));
            $files->delete(base_path('package-lock.json'));
        });
    }

    /**
     * Replace a given string within a given file.
     *
     * @param string $search
     * @param string $replace
     * @param string $path
     * @return void
     */
    protected function replaceInFile(string $search, string $replace, string $path): void
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }
}
