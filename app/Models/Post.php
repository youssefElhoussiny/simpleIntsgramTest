<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
   protected $fillable = ['description' , 'image' ];

// Relations

   public function owner(): BelongsTo
   {
       return $this->belongsTo(User::class, 'user_id');
   }
   
   public function comments(): HasMany
   {
       return $this->hasMany(Comment::class);
   }

   public function likes()
   {
       return $this->belongsToMany(User::class , 'likes');
   }

//End Relations
   public function liked()
   {
    return $this->likes()->where('user_id',auth()->id())->exists();
   }
}
