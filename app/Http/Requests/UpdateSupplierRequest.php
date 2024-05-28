<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateSupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('is-admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:suppliers,name,'.$this->supplier->id.'|max:50',
            'contact_name' => 'required|max:50',
            'phone_number' => 'required|max:20',
            'email' => 'required|email|max:40',
            'address' => 'required',
            'notes' => 'nullable',
        ];
    }
}
