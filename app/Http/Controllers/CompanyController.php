<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use App\Notifications\CompanyRegisterNotification;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.index', [
            'companies' => Company::orderBy('id')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }


    public function store(CompanyStoreRequest $companyStoreRequest)
    {
        $attributes = $companyStoreRequest->all();

        if ($companyStoreRequest->logo) {
            $attributes['logo'] = $companyStoreRequest->logo->store('companiesLogo');
        }

        $company = Company::create($attributes);

        $company->notify(new CompanyRegisterNotification());

        return view('company.index', [
            'companies' => Company::orderBy('id')->paginate(5)
        ]);
    }


    public function show(Company $company)
    {
        return view('company.show', ['company' => $company]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Company $company
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Company $company
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $companyUpdateRequest, Company $company)
    {
        $attributes = $companyUpdateRequest->all();

        if ($companyUpdateRequest->logo) {
            $attributes['logo'] = $companyUpdateRequest->logo->store('companiesLogo');
        }

        $company->update($attributes);

        return view('company.index', [
            'companies' => Company::orderBy('id')->paginate(5)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Company $company
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return view('company.index', [
            'companies' => Company::orderBy('id')->paginate(5)
        ]);
    }
}
