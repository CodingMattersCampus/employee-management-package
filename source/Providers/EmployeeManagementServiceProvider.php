<?php

declare(strict_types = 1);

namespace CodingMatters\EmployeeManagement;

use Illuminate\Support\ServiceProvider;

final class EmployeeManagementServiceProvider extends ServiceProvider
{
    public function register() : void
    {
    }

    public function boot() : void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/office.php');
    }
}
