<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CompanyRequest extends FormRequest
{
    public function rules()
    {
        return [
            'companyName' => 'required',
            'companyRegistrationNumber' => 'required',
            'companyFoundationDate' => 'required|date',
            'country' => 'required',
            'zipCode' => 'required',
            'city' => 'required',
            'streetAddress' => 'required',
            'latitude' => 'required|between:-90,90',
            'longitude' => 'required|between:-180,180',
            'companyOwner' => 'required',
            'employees' => 'required|integer',
            'activity' => 'required',
            'active' => 'required|boolean',
            'email' => 'required|email|max:50',
            'password' => 'required|min:6',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }
    public function messages()
    {
        return [
            'companyFoundationDate.date' => 'Foundation Date need Date format (YYYY-MM-DD)',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'active' => $this->toBoolean($this->active),
        ]);
    }

    private function toBoolean($booleable)
    {
        return filter_var($booleable, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }
}
