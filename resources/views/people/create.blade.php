@extends('app')

@section('title', 'Admin')

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
      <a href="javascript:void(0)" class="text-gray-500">Create</a>
    </li>
  </ol>
</nav>

<div id="block-alert"></div>

<div class="border shadow bg-white px-5 py-4 my-4 text-gray-600">
  <form class="ajax" data-action="{{ route('admin.people.store') }}" data-method="POST">
    <div class="flex">
      <div class="w-1/4 p-4 text-right">
        <span class="align-middle text-gray-500 font-semibold">Name <span class="text-red-500 font-semibold">*</span></span>
      </div>
      <div class="w-3/4 p-4 text-left">
        <input name="name" type="text" class="appearance-none outline-none block border rounded px-4 py-1 w-2/3">
      </div>
    </div>
    <div class="flex">
      <div class="w-1/4 p-4 text-right">
        <span class="align-middle text-gray-500 font-semibold">Email <span class="text-red-500 font-semibold">*</span></span>
      </div>
      <div class="w-3/4 p-4 text-left">
        <input name="email" type="email" class="appearance-none outline-none block border rounded px-4 py-1 w-2/3">
      </div>
    </div>
    <div class="flex">
      <div class="w-1/4 p-4 text-right">
        <span class="align-middle text-gray-500 font-semibold">Date of Birth</span>
      </div>
      <div class="w-3/4 p-4 text-left">
        <input name="dob" type="text" class="appearance-none outline-none block border rounded px-4 py-1 w-2/3">
      </div>
    </div>
    <div class="flex">
      <div class="w-1/4 p-4 text-right">
        <span class="align-middle text-gray-500 font-semibold">Phone</span>
      </div>
      <div class="w-3/4 p-4 text-left">
        <input name="phone" type="text" class="appearance-none outline-none block border rounded px-4 py-1 w-2/3">
      </div>
    </div>
    <div class="flex">
      <div class="w-1/4 p-4 text-right">
        <span class="align-middle text-gray-500 font-semibold">Gender</span>
      </div>
      <div class="w-3/4 p-4 text-left">
        <input name="gender" type="text" class="appearance-none outline-none block border rounded px-4 py-1 w-2/3">
      </div>
    </div>
    <div class="flex">
      <div class="w-1/4 p-4 text-right">
        <span class="align-middle text-gray-500 font-semibold">Image</span>
      </div>
      <div class="w-3/4 p-4 text-left">
        <input name="image" type="file" class="appearance-none outline-none block border rounded px-4 py-1 w-2/3">
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

@push('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endpush