<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    # get media files
    public function index(Request $request)
    {
        $searchKey  = null;
        $type       = null;

        $mediaFiles = Image::query()->latest();

//        if (Auth::user()->user_type != 'admin') {
//            $mediaFiles = $mediaFiles->where('user_id', Auth::user()->id);
//        }
        $mediaFiles = $mediaFiles->where('user_id', 1);

        if ($request->type != 'all') {
            $mediaFiles = $mediaFiles->where('media_type', $type);
        }

        $recentFiles = $mediaFiles->take(3)->get();
        $recentFileIds = $recentFiles->pluck('id');

        if ($request->searchKey != null) {

            $searchKey = $request->searchKey;
            $mediaFiles = $mediaFiles->where('media_name', 'like', '%' . $request->searchKey . '%');
        }
        $mediaFiles  = $mediaFiles->whereNotIn('id', $recentFileIds)->paginate(paginationNumber(30))->appends(request()->query());

        return [
            'status' => true,
            'recentFiles' => view('inc.media-manager.recent', compact('recentFiles'))->render(),
            'mediaFiles' => view('inc.media-manager.previous', compact('mediaFiles'))->render(),
            'mediaQuery' => $mediaFiles
        ];
    }

    # get selected media files
    public function selectedFiles(Request $request)
    {
        $mediaFiles = Image::whereIn('id', $request->mediaIds)->get();
        return [
            'status' => true,
            'mediaFiles' => view('inc.media-manager.image', compact('mediaFiles'))->render()
        ];
    }

    # store media file to media manager
    public function store(Request $request)
    {
        try {
            $image = new Image();
            (new Image())->store_image($request, $image);
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    # delete media
    public function delete($id)
    {
        $mediaFile = Image::findOrFail($id);
        if (!is_null($mediaFile)) {
            fileDelete($mediaFile->media_file);
            # todo:: check auth user, media user --
            $mediaFile->delete();
        }

//        flash(localize('File has been deleted successfully'))->success();
        return redirect()->route('admin.mediaManager.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
