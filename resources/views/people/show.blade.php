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
      <a href="javascript:void(0)" class="text-gray-500">{{ $filename }}</a>
    </li>
  </ol>
</nav>

<div class="border shadow bg-white px-5 py-4 my-4 text-gray-600">
  <div class="flex">
    <div class="w-1/4 p-4 text-right">
      <span class="align-middle text-gray-500 font-semibold">Name</span>
    </div>
    <div class="w-3/4 p-4 text-left">
      <span class="align-middle">{{ $people[0] }}</span>
    </div>
  </div>
  <div class="flex">
    <div class="w-1/4 p-4 text-right">
      <span class="align-middle text-gray-500 font-semibold">Email</span>
    </div>
    <div class="w-3/4 p-4 text-left">
      <span class="align-middle">{{ $people[1] }}</span>
    </div>
  </div>
  <div class="flex">
    <div class="w-1/4 p-4 text-right">
      <span class="align-middle text-gray-500 font-semibold">Date of Birth</span>
    </div>
    <div class="w-3/4 p-4 text-left">
      {{-- date --}}
      @if($people[2] != 'null')
      <span class="align-middle w-1/12">{{ explode('-', $people[2])[0] }}</span>
      @endif

      {{-- month --}}
      @if($people[2] != 'null')
      <span class="align-middle w-1/6">{{ months(explode('-', $people[2])[1]) }}</span>
      @endif

      {{-- year --}}
      @if($people[2] != 'null')
      <span class="align-middle w-1/6">{{ explode('-', $people[2])[2] }}</span>
      @endif

    </div>
  </div>
  <div class="flex">
    <div class="w-1/4 p-4 text-right">
      <span class="align-middle text-gray-500 font-semibold">Phone</span>
    </div>
    <div class="w-3/4 p-4 text-left">
      @if($people[3] != 'null')
      <span class="align-middle">{{ $people[3] }}</span>
      @endif
    </div>
  </div>
  <div class="flex">
    <div class="w-1/4 p-4 text-right">
      <span class="align-middle text-gray-500 font-semibold">Gender</span>
    </div>
    <div class="w-3/4 p-4 text-left">
      @if($people[4] != 'null')
      <span class="align-middle">{{ $people[4] }}</span>
      @endif
    </div>
  </div>
  <div class="flex">
    <div class="w-1/4 p-4 text-right">
      <span class="align-middle text-gray-500 font-semibold">Image</span>
    </div>
    <div class="w-3/4 p-4 text-left">
      <img class="w-1/4" src="{{ \App\Helper\TXT::getImage($people[5]) }}" alt="{{ $people[5] }}">
      {{-- <span class="align-middle">{{ $people[5] }}</span> --}}
    </div>
  </div>

  <div class="flex justify-between flex mt-10 mb-2">
    <a href="{{ route('admin.people.index') }}" class="flex rounded bg-gray-400 px-5 py-1 text-white mr-4">Back</a>
    <a href="{{ route('admin.people.edit', $filename) }}" class="flex rounded bg-yellow-400 px-5 py-1 text-white">Edit</a>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endpush