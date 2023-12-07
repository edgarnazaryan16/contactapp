<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ContactController extends Controller {
    private $paginate = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        $user_id = auth()->user()->id;
        $company_id = $request->input('company_id');
        $searching = $request->searching;
        // dd($request->searching, $company_id);
        $companies = Company::where('user_id', $user_id)->pluck('name', 'id');
        // $contacts = Contact::paginate(5);
        if (!$searching && !$company_id) {
            $contacts = Contact::where('user_id', $user_id)->orderBy('id', 'desc')->paginate($this->paginate);
        } else if ($searching && $company_id) {
            $contacts = Contact::where('user_id', $user_id)->where('company_id', $company_id)->where(function ($query) use ($searching) {
                return $query->orwhere('firstname', 'like', "%" . $searching . "%")->orwhere('lastname', 'like', "%" . $searching . "%")->orwhere('email', 'like', "%" . $searching . "%");
            })->orderBy('id', 'desc')->paginate($this->paginate)->withQueryString();
        } else if ($searching) {
            $contacts = Contact::where('user_id', $user_id)->where('firstname', 'like', "%" . $searching . "%")->orwhere('lastname', 'like', "%" . $searching . "%")->orwhere('email', 'like', "%" . $searching . "%")->orderBy('id', 'desc')->paginate(5)->withQueryString();
        } else {
            $contacts = Contact::where('user_id', $user_id)->where('company_id', $company_id)->orderBy('id', 'desc')->paginate($this->paginate)->withQueryString();
        }
        return view("contacts.index", compact('contacts', 'companies'));
    }
    /**
     * Show the form for creating a new resource.
     *select('contacts.*', 'companies.name')->join('companies', 'company_id', '=', 'companies.id')->get
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $user_id = auth()->user()->id;
        $companies = Company::where('user_id', $user_id)->pluck('name', 'id');
        return view('contacts.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContactRequest $request): RedirectResponse
    {
        $user_id = auth()->user()->id;
        Contact::create([...$request->all(), 'user_id' => $user_id]);
        return redirect('contacts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id): View
    {
        $contact = Contact::with('company')->find($id);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id): View
    {
        $user_id = auth()->user()->id;
        $contact = Contact::find($id);
        $companies = Company::where('user_id', $user_id)->pluck('name', 'id');
        return view('contacts.edit', compact('contact', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ContactRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $user_id = auth()->user()->id;
        $contact = Contact::find($id);
        $contact->update([...$request->all(), 'user_id' => $user_id]);
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
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('contacts');
    }
}
