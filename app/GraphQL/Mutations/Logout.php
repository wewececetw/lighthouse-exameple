<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;

final class Logout
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        /**
         * Revoke user access token
         */
        $userCheck = Auth::guard('web')->check();

        if (!$userCheck) {
            return [
                'status'  => 401,
                'message' => 'Token expired',
            ];
        }

        Auth::guard('web')->logout();

        
        return [
            'status'  => 200,
            'message' => 'Logout has successfull',
        ];
        
        
        
    }
}
