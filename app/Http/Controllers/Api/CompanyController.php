<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function index()
    {
        return response(['companies' => Company::all(), 'status' => 'Success'], 200);
    }

    public function store(CompanyRequest $request)
    {
        $company = Company::create($request->validated());

        return response(['company' => $company, 'message' => 'Created successfully'], 201);
    }

    public function show(Company $company)
    {
        return response(['company' => $company, 'message' => 'Retrieved successfully'], 200);
    }

    public function update(CompanyRequest $request, Company $company)
    {
        $company->update($request->all());

        return response(['company' => $company, 'message' => 'Update successfully'], 200);
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return response(['message' => 'Deleted']);
    }
}