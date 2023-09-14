<?php

namespace App\Http\Requests;

use App\Enums\MessageEnum;
use App\Http\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    use FailedValidation;
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|max:256',
            'password' => 'required|string|min:8|max:8',
            'token_device' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => MessageEnum::MSG_01,
            'min' => MessageEnum::MSG_025,
            'max' => MessageEnum::MSG_031
        ];
    }
}
