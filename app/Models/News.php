<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Te7aHoudini\LaravelTrix\Models\TrixAttachment;
use Te7aHoudini\LaravelTrix\Models\TrixRichText;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;


/**
 * App\Models\News
 *
 * @property int $id
 * @property string $name
 * @property string $image_url
 * @property string $description
 * @property string $ordering
 * @property bool $is_published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, TrixAttachment> $trixAttachments
 * @property-read int|null $trix_attachments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, TrixRichText> $trixRichText
 * @property-read int|null $trix_rich_text_count
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereOrdering($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class News extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasTrixRichText;

    protected $fillable = [
        'name',
        'image_url',
        'description',
        'ordering',
        'is_published',
    ];
    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->is_published;
    }

    /**
     * @param bool $is_published
     */
    public function setIsPublished(bool $is_published): void
    {
        $this->is_published = $is_published;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

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
