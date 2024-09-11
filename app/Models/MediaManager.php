<?php

namespace App\Models;

use App\Models\Trait\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MediaManager extends Model
{
    use HasFactory, CreatedUpdatedBy;
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

    final public function created_by() :BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    final public function updated_by() :BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    final public function delete_media(Model $model): void
    {
        if (!is_null($model->media_file)) {
             $imagePath = public_path($model->media_file);
             if(File::exists($imagePath)){
                 File::delete($imagePath);
             }
         }
         $model->delete();
    }

}
