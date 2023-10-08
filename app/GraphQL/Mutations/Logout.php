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
        
        $accessToken = $user->currentAccessToken();

        if ($accessToken) {
            $accessToken = $accessToken->delete();
        }

        return [
            'status'  => 200,
            'id'      => $accessToken,
            'message' => 'Logout has successfull',
        ];
    }
}
