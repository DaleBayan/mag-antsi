<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGlossaryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'term_eng' => ['required', 'max:255'],
            'term_fil' => ['required', 'max:255'],
            'description_eng' => ['required', 'string'],
            'description_fil' => ['required', 'string'],
        ];
    }
}
