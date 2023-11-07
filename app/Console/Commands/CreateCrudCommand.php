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
