<?php

declare(strict_types = 1);

namespace App\Models\User;

use Illuminate\Foundation\Auth\User as Authenticatable;

final class Employee extends Authenticatable
{
    protected $guarded = [];

    public function getFullNameAttribute(string $value = null) : string
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
