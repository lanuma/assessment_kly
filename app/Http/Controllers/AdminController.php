<?php

namespace App\Http\Controllers;

use App\DataTables\AdminTable;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class AdminController extends Controller
{
    public function json(Request $request, AdminTable $datatable) {
        return $datatable->build();
    }

    public function index()
    {
        return view('admin_data.index');
    }

    public function create()
    {
        return view('admin_data.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|unique:admins,username',
            'password' => 'required|required_with:current_password|min:8|max:16|confirmed',
            'name' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            $response['notification'] = [
                'alert' => 'block',
                'type' => 'red',
                'title' => 'Error',
                'content' => $validator->errors()->all(),
            ];

            return $this->response(400, $response);
        }

        if ($validator->passes()) {
            $admin = new Admin;

            $admin->username = $request->username;
            $admin->password = Hash::make($request->password);
            $admin->name = $request->name;

            if ($admin->save()) {
                $response['notification'] = [
                    'alert' => 'toast',
                    'type' => 'success',
                    'title' => 'Success',
                    'content' => 'Redirecting...',
                ];

                $response['redirect_to'] = route('admin.data.show', $admin->id);

                return $this->response(200, $response);
            }
        }
    }

    public function show($id)
    {
        $data['obj'] = Admin::findOrFail($id);

        return view('admin_data.show', $data);
    }

    public function edit($id)
    {
        $data['obj'] = Admin::findOrFail($id);

        return view('admin_data.edit', $data);
    }
}
