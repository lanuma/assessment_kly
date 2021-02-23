<?php

if (!function_exists('is_active_route')) {
    function is_active_route($route_name) {
        if ($route_name == Route::currentRouteName() OR Str::startsWith(URL::current(), route($route_name))) {
            return 'active';
        }
        return;
    }
}

if (!function_exists('months')) {
    function months($key = null) {
        $month = [
            1 => 'January',
            2 => 'February',
            3 =>'March',
            4 =>'April',
            5 =>'May',
            6 =>'June',
            7 =>'July',
            8 =>'August',
            9 =>'September',
            10 =>'October',
            11 =>'November',
            12 =>'December'
        ];

        if ($key) {
            return $month[$key];
        }
        
        return $month;
    }
}

if (!function_exists('generate_unique_string')) {
    function generate_unique_string($length = null, $start_string = null, $finish_string = null)
    {
        $string = '';
        if ($start_string) {
            $string .= $start_string;
        }
        if ($length) {
            $string .= str_shuffle(strtoupper(Str::random($length).rand(1, 100)));
        } else {
            $string .= str_shuffle(strtoupper(Str::random().rand(1, 100)));
        }
        if ($finish_string) {
            $string .= $finish_string;
        }

        return $string;
    }
}


if (!function_exists('random_filename')) {
    function random_filename($file)
    {
        return generate_unique_string().'.'.$file->getClientOriginalExtension();
    }
}

if (!function_exists('img_holder')) {
    function img_holder($type = null)
    {
        switch ($type) {
          case 'avatar':
            return asset('img/placeholder/avatar.png');
          break;
          default:
            return asset('img/placeholder/default.png');
          break;
        }
    }
}
