<?php

namespace App\Http\Controllers;

use App\Models\MediaManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\File;
use Throwable;

class MediaManagerController extends Controller
{
    /**
     * @param Request $request
     * @return array
     */
    public function index(Request $request): array
    {
        $searchKey  = null;
        $type       = null;

        $mediaFiles = MediaManager::query()->latest();
        // if (Auth::user()->user_type != 'admin') {
            $mediaFiles = $mediaFiles->where('created_by_id', Auth::id());
        // }

        if ($request->type != 'all') {
            $mediaFiles = $mediaFiles->where('media_type', $type);
        }

        $recentFiles = $mediaFiles->take(3)->get();
        $recentFileIds = $recentFiles->pluck('id');

        if ($request->searchKey != null) {

            $searchKey = $request->searchKey;
            $mediaFiles = $mediaFiles->where('media_name', 'like', '%' . $request->searchKey . '%');
        }
        $mediaFiles  = $mediaFiles->whereNotIn('id', $recentFileIds)->paginate(paginationNumber(20))->appends(request()->query());

        return [
            'status' => true,
            'recentFiles' => view('inc.media-manager.recent', compact('recentFiles'))->render(),
            'mediaFiles' => view('inc.media-manager.previous', compact('mediaFiles'))->render(),
            'mediaQuery' => $mediaFiles
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function selectedFiles(Request $request): array
    {
        $mediaFiles = MediaManager::whereIn('id', $request->mediaIds)->get();
        return [
            'status' => true,
            'mediaFiles' => view('inc.media-manager.image', compact('mediaFiles'))->render()
        ];
    }

    /**
     * @param Request $request
     * @return void
     * @throws Throwable
     */
    public function store(Request $request): void
    {
        try {
            (new MediaManager())->storeImage($request);
            flash()->success(__('Media uploaded successfully'));
        } catch (Throwable $throwable) {
            throw $throwable;
        }

    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getMediaById(Request $request): JsonResponse
    {
        $data = MediaManager::where('id', $request->id)->first();
        return response()->json($data);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function mediaUpdate(Request $request): JsonResponse
    {
        $res = array();

        $id         = $request->input('RecordId');
        $title      = $request->input('title');
        $alt_title  = $request->input('alternative_text');

        $data = [
            'media_title'   => $title,
            'media_alt'     => $alt_title,
        ];
        if ($request->hasFile('media_file')){
            $data = MediaManager::where('id', $id)->first();
            $destination = public_path($data->media_file);
            if(File::exists($destination))
                {
                    File::delete($destination);
                }

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

            }
        $response = MediaManager::where('id', $id)->update($data);
        if($response){
            $res['msgType'] = 'success';
            $res['msg'] = __('Data Updated Successfully');
        }else{
            $res['msgType'] = 'error';
            $res['msg'] = __('Data update failed');
        }

        return response()->json($res);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        $mediaFile = MediaManager::findOrFail($id);
        if (!is_null($mediaFile)) {
            $imagePath = public_path($mediaFile->media_file);
            if(File::exists($imagePath)){
                File::delete($imagePath);
            }
        }
        $mediaFile->delete();

        flash()->success(__('File has been deleted successfully'));
        return back();
    }

    // public function delete(MediaManager $mediaManager){
    //     (new MediaManager())->delete_media($mediaManager);
    //     flash()->success(__('File has been deleted successfully'));
    //     return redirect()->route('mediaManager.index');
    // }
}
