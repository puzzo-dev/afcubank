<?php
namespace App\Traits;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

trait ImageUpload
{
    public function UserImageUpload($query) // Taking input image as parameter
    {
    $image_name = Str::random(10);
    $ext = strtolower($query->getClientOriginalExtension()); // You can use also getClientOriginalName()
    $image_full_name = $image_name.'.'.$ext;
    $upload_path = 'images/'.Auth::user()->id.'/'; //Creating Sub directory in Public folder to put image
    $image_url = $upload_path.$image_full_name;
    $query->move($upload_path,$image_full_name);
    return $image_url; // Just return image
    }
}
