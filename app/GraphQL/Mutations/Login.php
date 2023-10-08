<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

final class Login
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        /**
         * Filter only accept email & password
         */
        $credentials = array(
            'email'    => $args['email'],
            'password' => $args['password'],
        );

        /**
         * IF request data is valid to next proccess
         */
        if (Auth::guard('web')->attempt($credentials)) {

            /**
             * Check exiting email to next
             */
            $user = User::where('email', $args['email'])->first();

            $token = $user->createToken($args['device'])->plainTextToken;

            return [
                'status'  => 200,
                'message' => 'Your authentication was successful.',
                'token'   => $token,
            ];
        }

        return [
            'status'  => 401,
            'message' => 'Please, type valid email and password.',
            'token'   => '',
        ];
    }
}
