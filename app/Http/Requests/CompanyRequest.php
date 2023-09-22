<?php

namespace App\Http\Requests;

use Doctrine\Inflector\Rules\Ruleset;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rules\Password;

class CompanyRequest extends FormRequest
{
    public function rules()
    {
        if (request()->isMethod('post')) {
            $passwordRule = 'required';
        } elseif (request()->isMethod('put')) {
            $passwordRule = 'sometimes';
        }

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
            'password' => [$passwordRule],
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

        if($this->password == null) {
            $this->request->remove('password');
        }
    }

    private function toBoolean($booleable)
    {
        return filter_var($booleable, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }
}