<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

final class UpdatePost
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
    }

    public function update($rootValue, array $args): Post
    {
        // 在这里执行你的自定义更新逻辑，例如验证和处理数据等
        // 你可以使用 Eloquent 模型的 find 方法来检索文章
        $postId = $args['id'];
        $post = Post::find($postId);

        if (!$post) {
            throw new \Exception("文章不存在");
        }

        // $userId = $args['userId'];
        // $users = User::find($userId);

        // if (!$users) {
        //     throw new \Exception("此使用者不存在");
        // }

        // 在这里应用自定义更新逻辑
        // 例如，你可以手动更新文章的属性
        $post->title = $args['title'] ?? $post->title;
        $post->content = $args['content'] ?? $post->content;
        $post->user_id = Auth::guard('web')->user()->id;

        // 保存更新后的文章
        $post->save();

        return $post;
    }
}
