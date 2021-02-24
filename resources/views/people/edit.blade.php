@extends('app')

@section('title', 'People')

@section('content')
<h1 class="text-3xl">People</h1>
<h5 class="text-sm text-gray-400">(CRUD with localstorage - txt file)</h5>

<nav class="border shadow bg-white px-5 py-4 my-4 text-gray-600 text-sm">
  <ol class="list-none p-0 inline-flex">
    <li class="flex items-center">
      <a href="{{ route('admin.people.index') }}">Data</a>
      <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
    </li>
    <li class="flex items-center">
      <a href="{{ route('admin.people.show', $filename) }}" class="text-gray-500">{{ $filename }}</a>
      <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
    </li>
    <li class="flex items-center">
      <a href="javascript:void(0)" class="text-gray-500">Edit</a>
    </li>
  </ol>
</nav>

<div id="block-alert"></div>

<div class="border shadow bg-white px-5 py-4 my-4 text-gray-600">
  <form class="ajax" data-action="{{ route('admin.people.update', $filename) }}" data-method="POST">
    @method('PUT')
    <div class="flex">
      <div class="w-1/4 p-4 text-right">
        <span class="align-middle text-gray-500 font-semibold">Name <span class="text-red-500 font-semibold">*</span></span>
      </div>
      <div class="w-3/4 p-4 text-left">
        <input name="name" type="text" class="appearance-none outline-none block border rounded px-4 py-1 w-2/3" value="{{ ($people[0] != 'null') ? $people[0] : '' }}">
      </div>
    </div>
    <div class="flex">
      <div class="w-1/4 p-4 text-right">
        <span class="align-middle text-gray-500 font-semibold">Email <span class="text-red-500 font-semibold">*</span></span>
      </div>
      <div class="w-3/4 p-4 text-left">
        <input name="email" type="email" class="appearance-none outline-none block border rounded px-4 py-1 w-2/3" value="{{ ($people[1] != 'null') ? $people[1] : '' }}">
      </div>
    </div>
    <div class="flex">
      <div class="w-1/4 p-4 text-right">
        <span class="align-middle text-gray-500 font-semibold">Date of Birth</span>
      </div>
      <div class="w-3/4 p-4 text-left">
        @php
        $dob = $people[2];

        $dob_date = ($dob != 'null') ? explode('-', $dob)[0] : '';
        $dob_month = ($dob != 'null') ? explode('-', $dob)[1] : '';
        $dob_year = ($dob != 'null') ? explode('-', $dob)[2] : '';
        @endphp

        {{-- date --}}
        <select name="dob_date" class="select2 appearance-none outline-none px-4 py-1 w-1/12" data-placeholder="Date">
          <option></option>
          @for ($i = 1; $i < 31; $i++)
          <option {{ ($i == $dob_date) ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
          @endfor
        </select>

        {{-- month --}}
        <select name="dob_month" class="select2 appearance-none outline-none px-4 py-1 w-1/6" data-placeholder="Month">
          <option></option>
          @foreach(months() as $i => $month)
          
          <option {{ ($i == $dob_month) ? 'selected' : '' }} value="{{ $i }}">{{ $month }}</option>

          @endforeach
        </select>

        {{-- year --}}
        <select name="dob_year" class="select2 appearance-none outline-none px-4 py-1 w-1/6" data-placeholder="Year">
          <option></option>
          @for ($i = 1900; $i <= date('Y'); $i++)
          <option {{ ($i == $dob_year) ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
          @endfor
        </select>

      </div>
    </div>
    <div class="flex">
      <div class="w-1/4 p-4 text-right">
        <span class="align-middle text-gray-500 font-semibold">Phone</span>
      </div>
      <div class="w-3/4 p-4 text-left">
        <input name="phone" type="text" class="appearance-none outline-none block border rounded px-4 py-1 w-2/3" value="{{ ($people[3] != 'null') ? $people[3] : '' }}">
      </div>
    </div>
    <div class="flex">
      <div class="w-1/4 p-4 text-right">
        <span class="align-middle text-gray-500 font-semibold">Gender</span>
      </div>
      <div class="w-3/4 p-4 text-left">
        <select name="gender" class="select2 appearance-none outline-none px-4 py-1 w-2/3" data-placeholder="Gender">
          <option></option>
          <option {{ ($people[4] == 'Male') ? 'selected' : '' }} value="Male">Male</option>
          <option {{ ($people[4] == 'Female') ? 'selected' : '' }} value="Female">Female</option>
        </select>
      </div>
    </div>
    <div class="flex">
      <div class="w-1/4 p-4 text-right">
        <span class="align-middle text-gray-500 font-semibold">Image</span>
      </div>
      <div class="w-3/4 p-4 text-left">
        <input type="file" id="image" name="image" data-max-file-size="2000" accept="image/png, image/jpeg" data-src="{{ \App\Helper\TXT::getImage($people[5]) }}">
      </div>
    </div>

    <div class="flex justify-between flex mt-10 mb-2">
      <div class="flex">
        <a href="{{ route('admin.people.index') }}" class="flex rounded bg-gray-400 px-5 py-1 text-white mr-4">Back</a>
        <button class="flex rounded bg-yellow-400 px-5 py-1 text-white" type="reset">Reset</button>
      </div>
      <button class="flex rounded bg-green-400 px-5 py-1 text-white" type="submit">Submit</button>
    </div>
  </form>
</div>
@endsection

@include('asset.plugin.bootstrap-fileinput')
@include('asset.plugin.select2')

@push('scripts')
<script src="{{ asset('js/form.js') }}"></script>
<script>
  $(document).ready(function () {
    $('.select2[name=gender]').select2({
      minimumResultsForSearch: -1
    });

    $('.select2[name^=dob]').select2();

    $('#image').fileinput({
      theme: 'explorer-fa',
      browseOnZoneClick: true,
      showCancel: false,
      showClose: false,
      showUpload: false,
      browseLabel: '',
      removeLabel: '',
      mainClass: 'hidden',
      layoutTemplates: { 
        modal: '',
        modalMain: '',
        caption: '',
      },
      fileActionSettings: {
        showDrag: false,
        showZoom: false,
        showRemove: false
      },
      initialPreview: $('#image').data('src'),
      initialPreviewAsData: true,
      initialPreviewConfig: [
        {
          caption: '{{ ($people[5] != "null") ? $people[5] : "image" }}'
        }
      ]
    });

    $('.file-input').addClass('w-2/3');

    $('button[type=reset]').click(function () {
      $('.select2').val('').trigger('change');
    })
  })
</script>
@endpush