<?php

namespace App\Models;

use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'video_id',
        'comment'
    ];


    public function user(){
        return $this->BelongsTo(User::class);
    }

    public function video(){
        return $this->BelongsTo(Video::class);
    }


}
