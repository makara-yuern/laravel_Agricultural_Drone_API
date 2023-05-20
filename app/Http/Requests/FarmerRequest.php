<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FarmerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:5',
                'max:10',
                Rule::unique('farmers')->ignore($this->id),
            ],
            'age' => 'required',
            'email' => [
                'required',
                Rule::unique('farmers')->ignore($this->id),
            ],
            'password' => [
                'required',
                Rule::unique('farmers')->ignore($this->id),
            ],
        ];
    }
}
