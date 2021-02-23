<?php

namespace App\Helper;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class TXT
{
    public static $directory = 'peoples/';
    public static $directory_image = 'peoples_img/';

    public $fields = [
        'name' => 'null',
        'email' => 'null',
        'dob' => 'null',
        'phone' => 'null',
        'gender' => 'null',
        'image' => 'null',
    ];
    
    public static function getFiles() 
    {
        $files = array_filter(Storage::files(self::$directory),
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
        if (Storage::exists(self::$directory . $filename)) {
            return Storage::get(self::$directory . $filename);
        }

        abort(404);
    }

    public static function getImage($image)
    {
        if (!$image OR !file_exists(self::$directory_image.$image)) {
            return img_holder('avatar');
        }

        return asset(self::$directory_image.$image);
    }

    public function fillFields(array $data)
    {
        $filtered = Arr::where($data, function ($value, $key) {
            return $value != NULL;
        });

        $data = array_replace($this->fields, $filtered);

        return $data;
    }

    public function saveToFile(string $data, $filename)
    {
        Storage::put(self::$directory . $filename, $data);
    }
}