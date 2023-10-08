<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')
        ->select(['users.id as userId','users.*']);
    }

    public function getSubjectAttribute()
    {
        // 自訂義欄位
        $user = $this->user;
        $subject = $user->name . '修改了 標題->' . $this->title;
        return $subject; // 返回自訂義的屬性值
    }

}
