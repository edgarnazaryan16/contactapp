<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function __invoke()
    {
        $user_id = auth()->user()->id;
        $companies = Company::where('user_id', $user_id)->get();
        $contacts = Contact::where('user_id', $user_id)->get();
        return view('dashboard', compact('contacts', 'companies'));
    }
}
