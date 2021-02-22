<?php

namespace App\Http\Controllers;

use App\Helper\TXT;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    private $directory = 'peoples/';

    public function index()
    {
        $data['peoples'] = TXT::getFiles($this->directory);

        return view('people.index', $data);
    }

    public function create()
    {
        return view('people.create');
    }

    public function show($filename)
    {
        $data['obj'] = TXT::getFile($this->directory . $filename);

        dd($data['obj']);
        return view('people.show', $data);
    }
}
