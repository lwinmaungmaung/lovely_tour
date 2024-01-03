<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreTourItinerariesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->user_level==='admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'begin' => 'required|date_format:H:i',
            'end' => 'nullable|date_format:H:i',
            'name' => 'required|string',
            'description' => 'required|string',
            'type' => "nullable",
        ];
    }
}
