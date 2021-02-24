<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KLY Assessment</title>
    <link rel="shortcut icon" href="{{ asset('icon.png') }}">
    @include('asset.css')
  </head>
  <body class="bg-gradient-to-br from-indigo-400 to-transparent flex">
    <div class="my-auto mx-auto">
      <div class="-mt-36">

        <svg class="animate-bounce w-28 h-28 block m-auto text-pink-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div class="shadow-xl">
          <div class="bg-gradient-to-r from-pink-400 to-yellow-400 text-white rounded-t-lg px-8 py-2 flex flex-col w-96 text-center">
            <h1 class="text-3xl">Thank You</h1>
          </div>
          <div class="bg-white rounded-b-lg px-8 py-8 flex flex-col w-96 text-center">
            <h3 class="text-xl text-gray-600">
              Your data has been saved, redirecting...  
            </h1>
          </div>
        </div>
      </div>
    </div>
    @include('asset.js')
    <script>
      $(document).ready(function () {
        let to = getUrlParameter('to');

        if (to) {
          redirect(base_url + '/admin/people/' + to, 3000);
        }
      })
    </script>
  </body>
</html>

