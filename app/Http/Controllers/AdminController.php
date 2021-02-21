<?php

namespace App\Http\Controllers;

use App\DataTables\AdminTable;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function json(Request $request, AdminTable $datatable) {
        return $datatable->build();
    }

    public function index()
    {
        return view('admin_data.index');
    }
}
