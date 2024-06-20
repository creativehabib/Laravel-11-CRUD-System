<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MediaManager extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * @param Request $request
     * @return Builder|Model
     */
    final public function storeImage(Request $request): Model|Builder
    {
        return self::query()->create($this->prepareData($request));
    }

    /**
     * @param Request $request
     * @return array|void
     */
    final public function prepareData(Request $request)
    {

        if($request->hasFile('media_file')){
            $OriginalFileName = basename($request->file('media_file')->getClientOriginalName(), ".".$request->file('media_file')->getClientOriginalExtension());
            $data = [
                'user_id'           => 1,
                'media_title'       => $OriginalFileName,
                'media_alt'         => $OriginalFileName,
                'media_file'        => $request->file('media_file')->store('uploads/media'),
                'media_size'        => $request->file('media_file')->getSize(),
                'media_name'        => $request->file('media_file')->getClientOriginalName(),
                'media_extension'   => $request->file('media_file')->getClientOriginalExtension()
            ];
            if (getFileType(Str::lower($request->file('media_file')->getClientOriginalExtension())) != null) {
                $data['media_type'] = getFileType(Str::lower($request->file('media_file')->getClientOriginalExtension()));
            } else {
                $data['media_type'] = "unknown";
            }
            return $data;
        }
    }

    final public function delete_media(Model $model): void
    {
        if(!empty($model->media_file)){
            $imagePath = public_path('uploads/media/'.$model->media_file);
            if(File::exists($imagePath)){
                File::delete($imagePath);
            }
        }
        $model->delete();
    }

}
