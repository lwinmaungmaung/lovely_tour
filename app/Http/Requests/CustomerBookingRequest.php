<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerBookingRequest extends FormRequest
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
            'title' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'mobile' => 'required|string',
            'tour_id' => 'required|integer|exists:tours,id',
            'adult' => 'required|min:1',
            'children' => 'required|min:0',
            'special_instruction'=> 'nullable',

        ];
    }
}
