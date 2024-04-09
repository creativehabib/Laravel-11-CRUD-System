<?php

use App\Models\Category;

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

function is_url(string $url)
    {
        return filter_var($url, FILTER_VALIDATE_URL) != false;
    }