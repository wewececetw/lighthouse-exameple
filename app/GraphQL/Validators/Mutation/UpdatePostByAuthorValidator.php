<?php declare(strict_types=1);

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class UpdatePostByAuthorValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            // TODO Add your validation rules
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'content' => [
                'required',
                'string',
            ],
        ];
    }
}
