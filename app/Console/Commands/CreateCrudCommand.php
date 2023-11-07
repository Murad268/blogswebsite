<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateCrudCommand extends Command
{
    protected $signature = 'create:crud {entity}';
    protected $description = 'Create a CRUD for the specified entity';

    public function handle()
    {
        $entity = $this->argument('entity');
        $str = explode("_", $entity);
        if (count($str) > 1) {
            if ($str[1] == "front") {
                $viewDirectory = resource_path("views/front/{$str[0]}");
                if (!file_exists($viewDirectory)) {
                    $controllerName = ucfirst($str[0]) . 'Controller';
                    $this->call('make:controller', ['name' => "front\\$controllerName"]);
                    file_put_contents("resources/views/front/{$str[0]}.blade.php", "");
                    $this->info("Front directory and file named '$str[0]' were created.");
                    $controllerContents = "<?php\n\nnamespace App\Http\Controllers\\front;\n\nuse Illuminate\Http\Request;\nuse App\Http\Controllers\Controller;\n\nclass $controllerName extends Controller\n{\n    public function index()\n    {\n        return view('front.{$str[0]}');\n    }\n}";
                    file_put_contents(app_path("Http/Controllers/front/{$controllerName}.php"), $controllerContents);
                    $frontContents = "@extends('front.layout.app')\n@section('title', '')\n@section('content')\n\n@endsection";
                    file_put_contents("resources/views/front/{$str[0]}.blade.php", $frontContents);
                } else {
                    $this->info("Front directory named '$str[0]' already exists");
                }
            } else {
                $this->info("Command failed");
            }
        } else {
            $viewDirectory = resource_path("views/admin/$entity");

            if (!file_exists($viewDirectory)) {
                mkdir($viewDirectory, 0755, true);
                $controllerName = ucfirst($entity) . 'Controller';
                $this->call('make:controller', ['name' => 'admin\\' . $controllerName, '--resource' => true]);
                $this->info("Directory named '$entity' was created.");

                $indexContents = "@extends('admin.layout.app')\n@section('title', '')\n@section('content')\n\n@endsection";
                file_put_contents($viewDirectory . '/index.blade.php', $indexContents);

                $editContents = "@extends('admin.layout.app')\n@section('title', '')\n@section('content')\n\n@endsection";
                file_put_contents($viewDirectory . '/edit.blade.php', $editContents);

                $createContents = "@extends('admin.layout.app')\n@section('title', '')\n@section('content')\n\n@endsection";
                file_put_contents($viewDirectory . '/create.blade.php', $createContents);
            } else {
                $this->info("A directory named '$entity' already exists");
            }
        }
    }
}
