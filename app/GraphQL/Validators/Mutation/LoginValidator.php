<?php declare(strict_types=1);

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class LoginValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            'email'    => [
                'required',
                'email',
            ],
            'password' => [
                'required',
                'string',
                'max:30',
                // Password::min(6)
                //     ->letters()
                //     ->mixedCase()
                //     ->numbers()
                //     ->uncompromised(),
            ],
            'device' => [
                'required',
                'string'
            ]
        ];
    }
}
