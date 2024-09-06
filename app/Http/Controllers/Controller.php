<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public static function media($request, $folder = "")
    {
        $extension = $request->file('picture',)->getClientOriginalExtension();
        return $request->file('picture',)->storeAs(
            $folder,
            Str::random(20) . '.' . $extension,
            env('UPLOADS_DISK')
        );
    }

    public static function uploadLogo($request, $folder = "")
    {
        $extension = $request->file('logo',)->getClientOriginalExtension();
        return $request->file('logo',)->storeAs(
            $folder,
            Str::random(20) . '.' . $extension,
            env('UPLOADS_DISK')
        );
    }
}
