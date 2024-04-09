<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public const IMAGE_UPLOAD_PATH = 'images/uploads/category/';

    /**
     * @param Request $request
     * @return Builder|Model
     * @throws Exception
     */

    final public function storeCategory(Request $request) : Model|Builder
    {
        return self::query()->create($this->prepareData($request));    
    }

    final public function updateCategory(Request $request, Model $category) :bool
    {
        return $category->update($this->prepareData($request, $category));
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
            'description'   => $request->input('description')
        ];
        if ($request->hasFile('image')){
            if($category){
                if(File::exists(self::IMAGE_UPLOAD_PATH . $category->image)){
                    File::delete(self::IMAGE_UPLOAD_PATH . $category->image);
                }
                $imageName = time().'.'.$request->image->extension();    
                $request->image->move(public_path(self::IMAGE_UPLOAD_PATH), $imageName);
                $data['image'] = $imageName;
            }else{
                $imageName = time().'.'.$request->image->extension();            
                $request->image->move(public_path(self::IMAGE_UPLOAD_PATH), $imageName);
                $data['image'] = $imageName;
            }
                       
        }
        return $data;
    }

    
}
