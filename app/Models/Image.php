<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Image extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * @param Request $request
     * @param Model $model
     * @return mixed
     */
    final public function store_image(Request $request, Model $model): mixed
    {
        return $model->media()->create($this->prepareData($request));
    }



    final public function prepareData(Request $request, Model|null $model = null)
    {
        if($request->hasFile('media_file')){
            $data = [
                'user_id'           => 1,
                'image_file'        => $request->file('media_file')->store('uploads/media'),
                'image_size'        => $request->file('media_file')->getSize(),
                'image_name'        => $request->file('media_file')->getClientOriginalName(),
                'image_extension'   => $request->file('media_file')->getClientOriginalExtension()
            ];
            if (getFileType(Str::lower($request->file('media_file')->getClientOriginalExtension())) != null) {
                $data['image_type'] = getFileType(Str::lower($request->file('media_file')->getClientOriginalExtension()));
            } else {
                $data['image_type'] = "unknown";
            }
            return $data;
        }
    }

    /**
     * @return MorphTo
     */
    final public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

}
