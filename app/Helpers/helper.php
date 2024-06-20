<?php

use App\Models\Category;
use App\Models\MediaManager;
use Illuminate\Support\Facades\File;

function image_url(string|null $name)
{
    if (!empty($name) && is_url($name)){
        return $name;
    }
    if ($name == 'default-image.jpg'){
        return asset('assets/image/default-image.jpg');
    }
    return asset(Category::IMAGE_UPLOAD_PATH.$name);
}


if (!function_exists('staticAsset')) {
    # return path for static assets
    function staticAsset($path, $secure = null)
    {
        if (strpos(url('/'), '.test') !== false || strpos(url('/'), 'http://127.0.0.1:') !== false) {
            return app('url')->asset('' . $path, $secure) . '?v=' . env('APP_VERSION');
        }
        return app('url')->asset('/' . $path, $secure) . '?v=' . env('APP_VERSION');
    }
}

if (!function_exists('paginationNumber')) {
    # return number of data per page
    function paginationNumber($value = null)
    {
        return $value != null ? $value : env('DEFAULT_PAGINATION');
    }
}

if (!function_exists('fileDelete')) {
    # file delete
    function fileDelete($file)
    {
        if (File::exists('public/' . $file)) {
            File::delete('public/' . $file);
        }
    }
}

if (!function_exists('uploadedAsset')) {
    #  Generate an asset path for the uploaded files.
    function uploadedAsset($fileId)
    {
        if (!$fileId) return null;
        $mediaFile = MediaManager::find($fileId);
        if (!is_null($mediaFile)) {
            if (strpos(url('/'), '.test') !== false || strpos(url('/'), 'http://127.0.0.1:') !== false) {
                return app('url')->asset('' . $mediaFile->media_file);
            }
            return app('url')->asset('/' . $mediaFile->media_file);
        }
        return '';
    }
}

if (!function_exists('getFileType')) {
    #  Get file Type
    function getFileType($type)
    {
        $fileTypeArray = [
            // audio
            "mp3"       =>  "audio",
            "wma"       =>  "audio",
            "aac"       =>  "audio",
            "wav"       =>  "audio",

            // video
            "mp4"       =>  "video",
            "mpg"       =>  "video",
            "mpeg"      =>  "video",
            "webm"      =>  "video",
            "ogg"       =>  "video",
            "avi"       =>  "video",
            "mov"       =>  "video",
            "flv"       =>  "video",
            "swf"       =>  "video",
            "mkv"       =>  "video",
            "wmv"       =>  "video",

            // image
            "png"       =>  "image",
            "svg"       =>  "image",
            "gif"       =>  "image",
            "jpg"       =>  "image",
            "jpeg"      =>  "image",
            "webp"      =>  "image",

            // document
            "doc"       =>  "document",
            "txt"       =>  "document",
            "docx"      =>  "document",
            "pdf"       =>  "document",
            "csv"       =>  "document",
            "xml"       =>  "document",
            "ods"       =>  "document",
            "xlr"       =>  "document",
            "xls"       =>  "document",
            "xlsx"      =>  "document",

            // archive
            "zip"       =>  "archive",
            "rar"       =>  "archive",
            "7z"        =>  "archive"
        ];
        return isset($fileTypeArray[$type]) ? $fileTypeArray[$type] : null;
    }
}

function is_url(string $url)
    {
        return filter_var($url, FILTER_VALIDATE_URL) != false;
    }