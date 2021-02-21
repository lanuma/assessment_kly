<?php

if (!function_exists('is_active_route')) {
    function is_active_route($route_name) {
        if ($route_name == Route::currentRouteName() OR Str::startsWith(URL::current(), route($route_name))) {
            return 'active';
        }
        return;
    }
}