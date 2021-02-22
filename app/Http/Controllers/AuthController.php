<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $admin = Admin::where('username', $request->username)->first();

        $credentials = [
            'username' => $request->username, 
            'password' => $request->password
        ];

        if ($validator->fails() OR !$admin OR Auth::guard('admin')->attempt($credentials) == false) {
            $response['notification'] = [
                'alert' => 'toast',
                'type' => 'error',
                // 'title' => 'Error',
                'content' => 'Login Failed',
            ];

            return $this->response(400, $response);
        } else if ($validator->passes() AND Auth::guard('admin')->attempt($credentials) == true) {
            $request->session()->regenerate();

            $response['notification'] = [
                'alert' => 'toast',
                'type' => 'success',
                // 'title' => 'Success',
                'content' => 'Redirecting...',
            ];

            $response['redirect_to'] = route('admin.dashboard');

            return $this->response(200, $response);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->flush();

        return redirect()->route('auth.index');
    }
}
