<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ImageUploadController extends Controller
{
	public function imageUpload(Request $request)
	{
		$mainImage = $request->file('file');
		$filename = time(). '.' . $mainImage->extension();
		Image::make($mainImage)->save(public_path('tinymce_images/' . $filename));

		// $mainImage->move(public_path('tinymce_images/' . $filename));


		return json_encode(['location' => asset('tinymce_images/' .$filename)]);

	}

	// public function upload(Request $request)
	// {
	// 	$fileName = $request->file('file')->getClientOriginalName();
	// 	$path = $request->file('file')->storeAs('uploads', $fileName, 'public');
	// 	return response()->json(['location' => "/storage/$path"]);


	// 	// $imagepath = request()->file('file')->store('uploads', 'public');
	// 	// return response()->json(['location' => '/storage/$imagepath']);
	// }
}
