<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Office\Employee;

use App\Models\User\Employee;
use App\Models\User\Role;
use App\Models\Office\Branch;
use App\Http\Requests\Office\Employee\CreateEmployeeRequest;
use App\Http\Controllers\Controller;

final class ListingController extends Controller
{
    public function index() : object
    {
        $branches = Branch::all();
        $roles = Role::all();

        return \view('office.employee.listing', \compact(['branches', 'roles']));
    }

    public function create(CreateEmployeeRequest $request, Employee $employee) : object
    {
        $roles = Role::all();
        $data = $request->post();

        $employee->first_name       = $data['first_name'];
        $employee->middle_name      = $data['middle_name'];
        $employee->last_name        = $data['last_name'];
        $employee->branch_id        = $data['branch_id'];
        $employee->role_id          = $data['role_id'];
        $employee->api_token        = \str_random(100);
        $employee->remember_token   = \str_random(100);
        $employee->username         = \str_random(10);
        $employee->password         = \str_random(30);
        $employee->save();

        $branches = Branch::all();

        return \view('office.employee.listing', \compact(['branches', 'roles']));
    }
}
