@extends('app')

@section('title', 'Admin')

@section('content')
<h1 class="text-3xl">Admin</h1>
<h5 class="text-sm text-gray-400">(CRUD with DB)</h5>

<nav class="border shadow bg-white px-5 py-4 my-4 text-gray-600 text-sm">
  <ol class="list-none p-0 inline-flex">
    <li class="flex items-center">
      <a href="{{ route('admin.data.index') }}">Data</a>
      <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
    </li>
    <li class="flex items-center">
      <a href="javascript:void(0)" class="text-gray-500">{{ $obj->id }}</a>
    </li>
  </ol>
</nav>

<div class="border shadow bg-white px-5 py-4 my-4 text-gray-600">
  <div class="flex">
    <div class="w-2/5 p-4 text-right">
      <span class="align-middle text-gray-500 font-semibold">Username</span>
    </div>
    <div class="w-3/5 p-4 text-left">
      <span class="align-middle">{{ $obj->username }}</span>
    </div>
  </div>
  <div class="flex">
    <div class="w-2/5 p-4 text-right">
      <span class="align-middle text-gray-500 font-semibold">Name</span>
    </div>
    <div class="w-3/5 p-4 text-left">
      <span class="align-middle">{{ $obj->name }}</span>
    </div>
  </div>
  <div class="flex justify-between flex mt-10 mb-2">
    <a href="{{ route('admin.data.index') }}" class="flex rounded bg-gray-400 px-5 py-1 text-white mr-4">Back</a>
    <a href="{{ route('admin.data.edit', $obj) }}" class="flex rounded bg-yellow-400 px-5 py-1 text-white">Edit</a>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endpush