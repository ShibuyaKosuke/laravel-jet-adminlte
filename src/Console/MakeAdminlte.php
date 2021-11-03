<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeAdminlte extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jet-adminlte:make {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup for AdminLTE';

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
        $this->parseName();
    }

    /**
     * @return void
     */
    protected function parseName(): void
    {
        $name = $this->argument('name');
        $this->controller_name = Str::studly($name);
        $this->view_name = Str::kebab($name);
    }
}
