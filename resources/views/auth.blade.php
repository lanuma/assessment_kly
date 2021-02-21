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
    @include('asset.plugin.iziToast')
    @stack('plugin-styles')
  </head>
  <body class="bg-gradient-to-br from-indigo-600 via-pink-500 to-yellow-400 flex">
    <div class="my-auto mx-auto">
      <div class="bg-white shadow-xl rounded px-8 py-6 flex flex-col my-2 w-96">
        <form class="ajax" data-action="{{ route('auth.login') }}" data-method="POST">
          <div class="-mx-3 md:flex mb-3">
            <div class="md:w-full px-3">
              <label class="block uppercase tracking-widest text-gray-600 text-xs font-bold mb-2" for="username">
                Username
              </label>
              <input class="appearance-none outline-none block w-full border rounded py-3 px-4 mb-3" name="username" id="username" type="text">
            </div>
          </div>
          <div class="-mx-3 md:flex mb-3">
            <div class="md:w-full px-3">
              <label class="block uppercase tracking-widest text-gray-600 text-xs font-bold mb-2" for="password">
                Password
              </label>
              <input class="appearance-none outline-none block w-full border rounded py-3 px-4 mb-3" name="password" id="password" type="password" placeholder="**********">
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="appearance-none focus:outline-none bg-gray-600 text-white rounded-full w-1/2 py-2 px-4">
              Log In
            </button>
          </div>
        </form>
      </div>
    </div>
    @include('asset.js')
    @stack('scripts')
    <script src="{{ asset('js/form.js') }}"></script>
  </body>
</html>

