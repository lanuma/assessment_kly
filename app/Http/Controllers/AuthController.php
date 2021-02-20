<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth');
    }

    public function login(Request $request)
    {
        $response['notification'] = [
            'alert' => 'toast',
            'type' => 'success',
            // 'title' => 'Success',
            'content' => 'Redirecting...',
        ];

        $response['redirect_to'] = route('admin.index');

        return $this->response(200, $response);
    }
}
