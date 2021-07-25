<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;
class Post extends Model
{
    use HasFactory;
    use Sluggable;
    use Commentable;

    protected $fillable = [
        'title' , 'slug' , 'description' , 'image_path' , 'user_id'
    ];



    public function user(){
        return $this->belongsTo(User::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
