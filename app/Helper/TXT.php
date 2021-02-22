<?php

namespace App\Helper;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TXT
{
    // private static $directory;
    // // private static $files;

    // function __construct($directory)
    // {
    //     $this->directory = $directory;
    // }

    public static function getFiles($directory) 
    {
        $files = array_filter(Storage::files($directory),
            //only txt's
            function ($item) {
                return strpos($item, '.txt');
            }
        );
        
        $files = preg_replace("/.+?\//", "", $files);
        return $files;
    }

    public static function getFile($filename)
    {
        return Storage::get($filename);
    }
}