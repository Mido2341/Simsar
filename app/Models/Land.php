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

class Land extends Model implements HasMedia
{
use HasFactory, InteractsWithMedia,Commentable;
protected $fillable=['land_num','meter_price','land_area','land_address','land_city','land_description','user_id'];

// 'land_photo',

public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}
public function lives(): BelongsToMany
{
    return $this->belongsToMany(User::class,'lives');
}
public function lived(User $user)
{
    return $this->lives()->where('user_id' , $user->id )->exists();
}
public function registerMediaConversions(Media $media = null): void
{
        $this->addMediaCollection('landimages');
}
}
