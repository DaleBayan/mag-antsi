<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContentRequest extends FormRequest
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
            'type' => ['required'],
            'title_eng' => ['required', 'max:255'],
            'title_fil' => ['required', 'max:255'],
            'body_eng' => ['required'],
            'body_fil' => ['required'],
            'mag_antsi' => ['required', 'max:20480'],
            'media_type' => ['required', 'max:255'],
        ];
    }
}
