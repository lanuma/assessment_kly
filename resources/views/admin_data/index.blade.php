@extends('app')

@section('title', 'Admin')

@section('content')
<h1 class="text-3xl">Admin</h1>

<nav class="border shadow bg-white px-5 py-4 my-4 text-gray-600 text-sm">
  <ol class="list-none p-0 inline-flex">
    <li class="flex items-center">
      <a href="javascript:void(0)">Data</a>
      {{-- <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg> --}}
    </li>
    {{-- <li>
      <a href="#" class="text-gray-500">Third Level</a>
    </li> --}}
  </ol>
</nav>

<div class="border shadow bg-white px-5 py-4 my-4 text-gray-600">
  <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
    <thead>
      <tr>
        <th data-priority="1">Name</th>
        <th data-priority="2">Position</th>
        <th data-priority="3">Office</th>
        <th data-priority="4">Age</th>
        <th data-priority="5">Start date</th>
        <th data-priority="6">Salary</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Tina May</td>
        <td>Coffee Manager</td>
        <td>Ljubljana</td>
        <td>61</td>
        <td>2011/04/25</td>
        <td>$320,800</td>
      </tr>
      <tr>
        <td>Donna Snider</td>
        <td>Customer Support</td>
        <td>New York</td>
        <td>27</td>
        <td>2011/01/25</td>
        <td>$112,000</td>
      </tr>
    </tbody>
  </table>
</div>
@endsection

@include('asset.plugin.datatables')

@push('scripts')
<script>
$(document).ready(function() {
  var table = $('#example').DataTable( {
    responsive: true
  })
  .columns.adjust()
  .responsive.recalc();
    
});
</script>
@endpush