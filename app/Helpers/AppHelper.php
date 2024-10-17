<?php

namespace App\Helpers;


class AppHelper
{
    public static function imageUpload($imagePath, String $subFolder): String {
        $imageName = time() . '.' . $imagePath->getClientOriginalExtension();
        $path = $imagePath->storeAs($subFolder, $imageName, 'public');

        return $path;
    }

    public static function serializeDate(Object $date): string
    {
        return $date->format('Y.m.d. H:i:s');
    }
}
