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
        $user = Auth::user();
        
        $accessToken = $user->tokens();

        if ($accessToken) {
            $accessToken = $accessToken->delete();
        }


        if($accessToken){
            return [
                'status'  => 200,
                'message' => 'Logout has successfull',
            ];
        }
        else
        {
            return [
                'status'  => 401,
                'message' => 'Token expired',
            ];
        }
        
    }
}
