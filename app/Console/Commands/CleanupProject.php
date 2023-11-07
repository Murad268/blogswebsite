<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanupProject extends Command
{
    protected $signature = 'project:cleanup';

    protected $description = 'Mevcut projeyi temizler';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Proje temizleniyor...');

        $this->call('cache:clear');
        $this->call('view:clear');
        $this->call('clear-compiled');
        $this->call('event:clear');
        $this->call('migrate:reset');
        $this->call('db:seed');

        $this->info('Proje temizlendi!');
    }
}
