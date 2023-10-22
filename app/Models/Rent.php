<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Rent extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia ,Commentable;
    protected $fillable=['rent_num','rent_price','rent_address','rent_city','rent_description','user_id'];

    // 'rent_photo',

public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}
public function loves(): BelongsToMany
{
    return $this->belongsToMany(User::class,'loves');
}

public function loved(User $user)
{
    return $this->loves()->where('user_id' , $user->id )->exists();
}

// public function comments()
// {
//     return $this->hasMany(RentComent::class);
// }

public function registerMediaConversions(Media $media = null): void
{
    $this->addMediaCollection('rentimages');
}



}
