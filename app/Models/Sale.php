<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Sale extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia , Commentable;
    protected $fillable=['sale_num','sale_price','sale_address','sale_city','sale_description','user_id'];
    // 'sale_photo',


/**
 * Get the user that owns the Sale
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}
/**
 * The roles that belong to the Sale
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
public function likes(): BelongsToMany
{
    return $this->belongsToMany(User::class,'likes');
}
public function liked(User $user)
{
    return $this->likes()->where('user_id' , $user->id )->exists();
}

// public function coments()
// {
//     return $this->hasMany(Coment::class);
// }

public function registerMediaConversions(Media $media = null): void
{
    $this->addMediaCollection('images');
}


}
