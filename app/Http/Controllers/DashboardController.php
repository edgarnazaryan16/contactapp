<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke() {
        $companies = Company::all();
        $contacts = Contact::all();
        return view('dashboard', compact('contacts', 'companies'));
    }
}
