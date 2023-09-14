<?php

namespace App\Http\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

trait FailedValidation
{
    public function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        $message = array_values($errors)[0][0];
        $key = array_keys($errors)[0];

        throw new HttpResponseException(response()->json(
            [
                'status' => 422,
                'message' => $message,
                'errors' => [
                    'fieldName' => str_replace('information.', '', $key)
                ],
            ],
            JsonResponse::HTTP_UNPROCESSABLE_ENTITY
        ));
    }
}
