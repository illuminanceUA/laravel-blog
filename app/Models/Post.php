<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'title', 'text', 'user_id', 'image_path', 'published_at',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany('App\Models\Comment');

    }

    /**
     * Class Post
     * @package App
     * @property int $id
     * @property string $text
     * @property int $user_id
     * @property Carbon $created_at
     * @property Carbon $updated_at
     * */

    public function users()
    {
        return $this->belongsTo(User::class);

    }


}
