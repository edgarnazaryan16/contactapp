<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyController extends Controller {
    private $paginate = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $user_id = auth()->user()->id;
        $companies = Company::where('user_id', $user_id)->orderBy('id', 'desc')->paginate($this->paginate);
        return view("companies.index", compact("companies"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view("companies.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CompanyRequest $request): RedirectResponse
    {
        $user_id = auth()->user()->id;
        Company::create([...$request->all(), 'user_id' => $user_id]);
        return redirect('companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id): View
    {
        $company = Company::find($id);
        return view("companies.show", compact("company"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id): View
    {
        $company = Company::find($id);
        return view("companies.edit", compact("company"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CompanyRequest $request, $id): RedirectResponse
    {
        $user_id = auth()->user()->id;
        $company = Company::find($id);
        $company->update([...$request->all(), 'user_id' => $user_id]);
        return redirect('contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $company = Company::find($id);
        $company->delete();
        return redirect('companies');
    }
}
