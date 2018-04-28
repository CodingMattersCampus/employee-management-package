<?php

declare(strict_types = 1);

namespace CodingMatters\EmployeeManagement\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

final class Employee extends Authenticatable
{
    private $guard = 'office';
    protected $guarded = [];

    public function getFullNameAttribute(string $value = null) : string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getAuthGuard() : string
    {
        return $this->guard;
    }
}
