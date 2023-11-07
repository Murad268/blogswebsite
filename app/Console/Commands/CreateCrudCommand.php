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
                $viewDirectory = resource_path("views/front/$entity");
                if (!file_exists($viewDirectory)) {
                    mkdir($viewDirectory, 0755, true);
                    $controllerName = ucfirst($entity) . 'Controller';
                    $this->call('make:controller', ['name' => 'front\\' . $controllerName]);
                    touch($viewDirectory . '/' . $str[0] . '.blade.php');
                    $this->info("Directory named '$entity' was created.");
                } else {
                    $this->info("A directory named '$entity' already exists");
                }
            } else {
                $this->info("command failed");
            }
        } else {
            $viewDirectory = resource_path("views/admin/$entity");

            if (!file_exists($viewDirectory)) {
                mkdir($viewDirectory, 0755, true);
                $controllerName = ucfirst($entity) . 'Controller';
                $this->call('make:controller', ['name' => 'admin\\' . $controllerName, '--resource' => true]);
                $this->info("Directory named '$entity' was created.");

                $indexContents = "@extends('layout.app')\n@section('title', '')\n@section('content')\n\n@endsection";
                file_put_contents($viewDirectory . '/index.blade.php', $indexContents);

                $editContents = "@extends('layout.app')\n@section('title', '')\n@section('content')\n\n@endsection";
                file_put_contents($viewDirectory . '/edit.blade.php', $editContents);

                $createContents = "@extends('layout.app')\n@section('title', '')\n@section('content')\n\n@endsection";
                file_put_contents($viewDirectory . '/create.blade.php', $createContents);
            } else {
                $this->info("A directory named '$entity' already exists");
            }
        }
    }
}
