<?php

namespace App\Helper;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class TXT
{
    public static $directory = 'peoples/';
    public static $directory_image = 'peoples_img/';
    private static $ext = '.txt';

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
                return strpos($item, self::$ext);
            }
        );
        
        // remove directory prefix
        $files = preg_replace("/.+?\//", "", $files);

        // remove .txt suffix
        $files = preg_replace("/.txt(.*)/i", "", $files);

        return $files;
    }

    public static function getFile($filename)
    {
        if (Storage::exists(self::$directory . $filename . self::$ext)) {
            $data = Storage::get(self::$directory . $filename . self::$ext);
            return explode(',' , $data);
        }

        abort(404);
    }

    public static function getImage($image)
    {
        if (!$image OR !file_exists(self::$directory_image.$image)) {
            return img_holder('avatar');
        }

        return asset(self::$directory_image . $image);
    }

    public static function deleteImage($image)
    {   
        if ($image AND file_exists(self::$directory_image . $image)) {
            Storage::disk('public')->delete(self::$directory_image . $image);
        }
    }

    public static function save(array $data, $filename)
    {
        $obj = new self;
        $data = $obj->fillFields($data);
        $obj->saveToFile($data, $filename);
    }

    public function fillFields(array $data)
    {
        $filtered = Arr::where($data, function ($value, $key) {
            return $value != NULL;
        });

        $data = array_replace($this->fields, $filtered);

        return $data;
    }

    public function saveToFile($data, $filename)
    {
        $data = implode(',', $data);

        Storage::put(self::$directory . $filename . self::$ext, $data);
    }

    public static function deleteFile($filename)
    {
        if ($filename AND Storage::exists(self::$directory . $filename . self::$ext)) {
            $data = self::getFile($filename);

            if ($data[5] != 'null') {
                self::deleteImage($data[5]);
            }

            Storage::delete(self::$directory . $filename . self::$ext);

            return true;
        }

        return false;
    }
}