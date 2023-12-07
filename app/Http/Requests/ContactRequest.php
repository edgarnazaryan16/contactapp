<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
            'lastname' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
            'email' => 'required|email|max:255|unique:contacts,email',
            'address' => 'required',
            'phone' => 'required',
            'company_id' => 'required',
        ];
    }
}
