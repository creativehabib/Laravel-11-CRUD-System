<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;

class Seo extends Model
{
    use HasFactory;
    protected $guarded = [];
    public const IMAGE_UPLOAD_PATH = 'image/uploads/seo/';
    public const IMAGE_WIDTH = 1200;
    public const IMAGE_HEIGHT = 630;

    /**
     * @param Request $request
     * @param Model $model
     * @return mixed
     * @throws Exception
     */
    final public function store_seo(Request $request, Model $model): mixed
    {
        return $model->seo()->create($this->prepareData($request));
    }

    /**
     * @param Request $request
     * @param Model $model
     * @return mixed
     * @throws Exception
     */
    final public function update_seo(Request $request, Model $model): mixed
    {
        return $model->seo()->updateOrCreate(['id'=> $model?->seo?->id],$this->prepareData($request, $model));
    }

    /**
     * @param Model $model
     * @return void
     */
    public function delete_seo(Model $model): void
    {
        // if(!empty($model->seo->og_image)){
        //     (new ImageManager())->remove_photo($model->seo->og_image, self::IMAGE_UPLOAD_PATH);
        // }
        // $model->seo()->delete();
    }

    /**
     * @param Request $request
     * @param Model|null $model
     * @return array
     * @throws Exception
     */
    final public function prepareData(Request $request, Model|null $model = null): array
    {
        $data = [
            'meta_title'        => $request->input('meta_title'),
            'meta_description'  => $request->input('meta_description'),
            'meta_keywords'     => $request->input('meta_keywords'),
            'meta_image'        => $request->input('meta_image')
        ];
        return $data;
    }

    /**
     * @return BelongsTo
     */

    // final public function created_by(): BelongsTo
    // {
    //     return $this->belongsTo(User::class,'created_by_id');
    // }

    // /**
    //  * @return BelongsTo
    //  */
    // final public function updated_by(): BelongsTo
    // {
    //     return $this->belongsTo(User::class,'updated_by_id');
    // }

    /**
     * @return MorphTo
     */
    final public function seoable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return BelongsTo
     */
    final public function image(): BelongsTo
    {
        return $this->belongsTo(MediaManager::class, 'meta_image');
    }
}
