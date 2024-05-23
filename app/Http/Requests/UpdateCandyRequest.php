<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCandyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:candies,name,'.$this->candy->id.'|max:50',
            'type' => 'required|string|unique:candies,type,'.$this->candy->id,
            'ingredients' => 'required|string|max:25',
            'price' => 'required|decimal|min:0',
            'stock' => 'required|integer|min:0',
            'rating' => 'required|decimal|min:0|max:5',
        ];
    }
}
