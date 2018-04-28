<?php

declare(strict_types = 1);

namespace CodingMatters\EmployeeManagement\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

final class CreateNewEmployeeInformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return $this->isOwner();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'first_name'    => 'required|string|min:2',
            'middle_name'   => 'required|string|min:1',
            'last_name'     => 'required|string|min:2',
            'branch_id'     => 'required|integer',
        ];
    }

    private function isOwner() : bool
    {
        return (boolean) Auth::guard('office')->check();
    }
}
