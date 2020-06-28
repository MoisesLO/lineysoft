<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  {{-- Tailwind Css --}}
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

  {{-- Alphine Js --}}
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js"></script>

  {{-- Axios --}}
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>

<h3 class="text-gray-600 mt-40 text-xl pt-2 text-center">Entrar al Sistema</h3>
<form action="/autenticacion" method="post">
  @csrf
  <div class="mx-auto max-w-sm shadow-lg rounded-md px-4 py-3 flex flex-col">
    <label class="text-base pb-1 pt-3 text-gray-600">Email</label>
    <input
        type="text"
        class="px-3 py-2 focus:outline-none border-gray-300 border-2 rounded-md text-base text-gray-600"
        name="email"
        value="{{ old('email') }}"
    >
    {!! $errors->first('email', '<small class="pt-1 text-red-600">:message</small>') !!}
    <label
        class="text-gray-600 text-base mt-3 pb-2"
    >Password</label>
    <input
        type="password"
        class="text-gray-600 text-base px-3 py-2 focus:outline-none border-gray-300 rounded-md border-2"
        name="password"
        value="{{ old('password') }}"
    >
    {!! $errors->first('password', '<small class="pt-1 text-red-600">:message</small>') !!}
    <button
        type="submit"
        class="bg-blue-600 text-white mt-4 px-3 py-2 rounded-md hover:bg-blue-700"
    >
      Entrar Sistema
    </button>
  </div>
</form>
</body>
</html>