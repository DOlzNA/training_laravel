<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;


/**
 * App\Models\News
 *
 * @property int $id
 * @property string $name
 * @property string $image_url
 * @property string $discription
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDiscription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @property string $ordering
 * @method static \Illuminate\Database\Eloquent\Builder|News whereOrdering($value)
 * @mixin \Eloquent
 */

class News extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasTrixRichText;

    protected $fillable = [
        'name',
        'image_url',
        'discription',
        'ordering',
    ];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->image_url;
    }

    /**
     * @param string $image_url
     */
    public function setImageUrl(string $image_url): void
    {
        $this->image_url = $image_url;
    }

    /**
     * @return string
     */
    public function getDiscription(): string
    {
        return $this->discription;
    }

    /**
     * @param string $discription
     */
    public function setDiscription(string $discription): void
    {
        $this->discription = $discription;
    }


    /**
     * @return string
     */
    public function getOrdering(): string
    {
        return $this->ordering;
    }

    /**
     * @param string $ordering
     */
    public function setOrdering(string $ordering): void
    {
        $this->ordering = $ordering;
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }


}
