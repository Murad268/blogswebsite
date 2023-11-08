<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateService extends Command
{
    protected $signature = 'app:create-service {serviceName}';
    protected $description = 'Create a new service class';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $serviceName = $this->argument('serviceName');

        if (!preg_match('/^[a-zA-Z]+$/', $serviceName)) {
            $this->error('Service name should contain only alphabetic characters.');
            return;
        }

        $serviceContent = "<?php\n\nnamespace App\Services;\n\nclass {$serviceName}Service\n{\n    public function __construct()\n    {\n    }\n}";

        $servicePath = app_path("Services/{$serviceName}Service.php");

        if (File::exists($servicePath)) {
            $this->error("Service class '{$serviceName}Service' already exists.");
            return;
        }

        // Check if the Services directory exists, and create it if not
        $servicesDirectory = app_path('Services');
        if (!File::isDirectory($servicesDirectory)) {
            File::makeDirectory($servicesDirectory, 0755, true, true);
        }

        File::put($servicePath, $serviceContent);

        $this->info("Service class '{$serviceName}Service' created successfully.");
    }
}
