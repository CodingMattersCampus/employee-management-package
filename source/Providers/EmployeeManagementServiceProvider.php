<?php

declare(strict_types = 1);

namespace CodingMatters\EmployeeManagement\Providers;

use Illuminate\Support\ServiceProvider;

final class EmployeeManagementServiceProvider extends ServiceProvider
{
    public function register() : void
    {
    }

    public function boot() : void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/office.php');
        
        $configPath = $this->packagePath('config/domain.php');
        $this->publishes([
            $configPath => config_path('app-domain.php'),
        ], 'config');
        $this->mergeConfigFrom($configPath, 'app');
    }
}
