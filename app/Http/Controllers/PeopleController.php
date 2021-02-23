<?php

namespace App\Http\Controllers;

use App\Helper\TXT;
use App\Helper\UploadMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Validator;

class PeopleController extends Controller
{
    public function index()
    {
        $data['peoples'] = TXT::getFiles();

        return view('people.index', $data);
    }

    public function create()
    {
        return view('people.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'dob_date' => 'nullable|string|required_with:dob_month,dob_year',
            'dob_month' => 'nullable|string|required_with:dob_date,dob_year',
            'dob_year' => 'nullable|string|required_with:dob_date,dob_month',
            'phone' => 'nullable|string',
            'male' => 'nullable|string|in:Male,Female',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($validator->fails()) {
            $response['notification'] = [
                'alert' => 'block',
                'type' => 'red',
                'title' => 'Error',
                'content' => $validator->errors()->all(),
            ];

            return $this->response(400, $response);
        }

        

        if($validator->passes()) {
            $data = $request->toArray();

            $txt_filename = Str::slug($data['name'], '_') . '-' . date('dmYHis');
            $image_filename = $txt_filename . '-image';

            if ($data['dob_date'] != NULL OR $data['dob_month'] != NULL OR $data['dob_year'] != NULL) {
                $data['dob'] = $data['dob_date'] . '-' . $data['dob_month'] . '-' . $data['dob_year'];
            } else {
                $data['dob'] = NULL;
            }

            Arr::forget($data, ['dob_date', 'dob_month', 'dob_year']);

            if (!empty($request->file('image'))) {
                $data['image'] = UploadMedia::image($request->file('image'), TXT::$directory_image, $image_filename);
            } else {
                $data['image'] = NULL;
            }

            $txt = new TXT;

            $filter = $txt->fillFields($data);

            $filter = implode(',', $filter);

            $txt->saveToFile($filter, $txt_filename . '.txt');

            $response['notification'] = [
                'alert' => 'toast',
                'type' => 'success',
                'title' => 'Success',
                'content' => 'Redirecting...',
            ];

            $response['redirect_to'] = route('admin.people.show', $txt_filename . '.txt');

            return $this->response(200, $response);
        }
    }

    public function show($filename)
    {
        $data['people'] = explode(',', TXT::getFile($filename));
        $data['filename'] = $filename;

        return view('people.show', $data);
    }
    
}
