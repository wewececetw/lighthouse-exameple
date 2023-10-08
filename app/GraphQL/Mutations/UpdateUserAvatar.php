<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;

final class UpdateUserAvatar
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $file = $args['image'];
        $path = $file->storePublicly('public/uploads');
        $user = User::find($args['id']);
        $user->avatar = $path;
        $user->save();
        // return $user;

        return [
            'status'  => true,
            'data'      => $user,
            'message' => 'success',
        ];
        
    }
}
