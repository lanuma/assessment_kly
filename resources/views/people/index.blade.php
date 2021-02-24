@extends('app')

@section('title', 'People')

@section('content')
<h1 class="text-3xl">People</h1>
<h5 class="text-sm text-gray-400">(CRUD with localstorage - txt file)</h5>

<nav class="border shadow bg-white px-5 py-4 my-4 text-gray-600 text-sm">
  <ol class="list-none p-0 inline-flex">
    <li class="flex items-center">
      <a href="javascript:void(0)">Data</a>
      {{-- <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg> --}}
    </li>
    {{-- <li>
      <a href="#" class="text-gray-500">Sub Menu</a>
    </li> --}}
  </ol>
</nav>

<div class="border shadow bg-white px-5 py-4 my-4 text-gray-600">
  <a href="{{ route('admin.people.create') }}">
    <button class="px-5 py-1 rounded bg-indigo-500 text-white mb-6">Create</button>
  </a>

  <table id="datatable" class="stripe hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Filename</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($peoples as $people)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $people }}</td>
        <td>
          <span class="inline-flex">
            <a href="{{ route('admin.people.show', $people) }}" title="View">
              <svg class="w-5 h-5"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
            </a>
          </span>
          <span class="inline-flex">
            <a href="{{ route('admin.people.edit', $people) }}" title="Edit">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </a>
          </span>
          <span class="inline-flex">
            <a href="javascript:deleteConfirmation('{{ route('admin.people.destroy', $people) }}')" title="Delete">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </a>
          </span>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

@include('asset.plugin.datatables')

@push('scripts')
<script>
$(document).ready(function() {
  $('#datatable').DataTable();
});
</script>
@endpush