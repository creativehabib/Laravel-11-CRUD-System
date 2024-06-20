<?php

namespace App\Models;

use App\Models\Trait\CreatedUpdatedBy;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 2;

    public const STATUS_LIST = [
        self::STATUS_ACTIVE => "Active",
        self::STATUS_INACTIVE => "Inactive"
    ];

    public const IMAGE_UPLOAD_PATH = 'images/uploads/category/';

    /**
     * @param Request $request
     * @return Builder|Model
     * @throws Exception
     */

     final public function scopeActive(Builder $builder)
     {
        return $builder->where('status', self::STATUS_ACTIVE);
     }

    final public function storeCategory(Request $request) : Model|Builder
    {
        return self::query()->create($this->prepareData($request));
    }

    final public function updateCategory(Request $request, Model $category) :bool
    {
        return $category->update($this->prepareData($request, $category));
    }

    final public function get_category_list()
    {
        return self::query()->with('parent')->paginate(5);
    }

    final public function get_category_assoc()
    {
        return self::query()->active()->pluck('name', 'id');
    }

    /**
     * @param Request $request
     * @return array
     * @throws Exception
     */
    final public function prepareData(Request $request, Model|null $category = null) :array
    {
        $data = [
            'name'          => $request->input('name'),
            'slug'          => Str::slug($request->input('slug')),
            'description'   => $request->input('description'),
            'status'        => $request->input('status'),
            'parent_id'     => $request->input('parent_id'),
            'cat_image'     => $request->input('cat_image')
        ];
        // if ($request->hasFile('image')){
        //     if($category){
        //         if(File::exists(self::IMAGE_UPLOAD_PATH . $category->image)){
        //             File::delete(self::IMAGE_UPLOAD_PATH . $category->image);
        //         }
        //         $imageName = time().'.'.$request->image->extension();
        //         $request->image->move(public_path(self::IMAGE_UPLOAD_PATH), $imageName);
        //         $data['image'] = $imageName;
        //     }else{
        //         $imageName = time().'.'.$request->image->extension();
        //         $request->image->move(public_path(self::IMAGE_UPLOAD_PATH), $imageName);
        //         $data['image'] = $imageName;
        //     }

        // }
        return $data;
    }

    /**
     * @return BelongsTo
     */
    final public function parent(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }

    public function seo() :MorphOne
    {
        return $this->morphOne(Seo::class, 'seoable');
    }
    public function media()
    {
        return $this->morphOne( Image::class, 'imageable');
    }
    public function image()
    {
        return $this->belongsTo(MediaManager::class, 'cat_image');
    }


}
