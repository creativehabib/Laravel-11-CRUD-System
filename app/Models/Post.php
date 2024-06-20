<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 2;
    public const STATUS_LIST = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive'
    ];

    final public function scopeActive(Builder $builder)
     {
        return $builder->where('status', self::STATUS_ACTIVE);
     }

    public function seo() : morphOne
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

    public function media()
    {
        return $this->morphOne( Image::class, 'imageable');
    }
    final public function created_by() :BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    final public function updated_by() :BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    public function image()
    {
        return $this->belongsTo(MediaManager::class, 'post_image');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    final public function get_post_list()
    {
        return self::query()->paginate(5);
    }

    public function storePost(Request $request){
        return self::query()->create($this->prepareData($request));
    }

    public function updatePost(Request $request, $post)
    {
        return $post->update($this->prepareData($request, $post));
    }

    public function prepareData(Request $request, Model|NULL $post = null) :array
    {
        $data = [
            'post_title'            => $request->input('post_title'),
            'post_slug'             => Str::slug($request->input('post_slug')),
            'post_description'      => $request->input('post_description'),
            'status'                => $request->input('status'),
            'post_image'            => $request->input('post_image'),
            'category_id'           => $request->input('category_id')
        ];

        return $data;
    }

}
