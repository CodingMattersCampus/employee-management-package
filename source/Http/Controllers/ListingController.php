<?php

declare(strict_types = 1);

namespace CodingMatters\EmployeeManagement\Http\Controllers;

use CodingMatters\EmployeeManagement\Models\Employee;
use CodingMatters\EmployeeManagement\Models\Branch;
use CodingMatters\EmployeeManagement\Models\Role;
use CodingMatters\EmployeeManagement\Http\Requests\CreateNewEmployeeInformationRequest;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

final class ListingController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index() : object
    {
        $branches = Branch::all();
        $roles = Role::all();

        return \view('office.employee.listing', \compact(['branches', 'roles']));
    }

    public function create(CreateNewEmployeeInformationRequest $request, Employee $employee) : object
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
