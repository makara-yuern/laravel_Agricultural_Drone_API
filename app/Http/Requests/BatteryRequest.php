<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BatteryRequest extends FormRequest
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
            'currentBatteries' => [
                'required',
                'min:3',
                'max:8',
                Rule::unique('batteries')->ignore($this->id),
            ],
            'capacity' => 'required',
            'drone_id' => 'required',  
        ];
    }
}
