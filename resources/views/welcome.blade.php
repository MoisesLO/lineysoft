<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  {{-- Tailwind Css --}}
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

  {{-- Alphine Js --}}
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js"></script>

</head>
<body>

<h1 class="pt-40 mx-auto text-center text-gray-500 text-xl">Entrar al Sistema</h1>
<div class="mx-auto max-w-sm pt-3">
  <form action="/autenticacion" method="post">
  <div
    class="shadow-lg px-3 py-4 flex flex-col rounded-lg"
    x-data="page()" data-reflect-root=""
  >

    {{ var_dump($errors->any()) }}
    <label for="" class="text-base text-gray-500">Email : </label>
    @csrf
    <input
      class="px-3 py-2
             text-gray-500
             text-sm rounded border
             border-gray-400 mb-2
             text-base leading-tight
             focus:outline-none
             focus:shadow-outline"
      name="email"
      type="text"
      value="{{ old('email') }}"
    >
    {!! $errors->first('email', '<small>:message</small>') !!}

    <label for="" class="text-base text-gray-500 pt-2">Password : </label>
    <input
        class="px-3 py-2
             text-gray-500
             text-sm rounded border
             border-gray-400 mb-2
             text-base leading-tight
             focus:outline-none
             focus:shadow-outline"
        name="password"
        value="{{ old('password') }}"
        type="password"
    >
    {{ $errors->first('password') }}


    <button
      type="submit"
      class="bg-blue-500 pt-2 px-3 py-2 rounded focus:border-blue-300 text-white hover:bg-blue-600"
      @click="access()">
      Entrar
    </button>


    <span x-ref="output"></span>

    <span></span>

    <script type="text/javascript">
      function page() {
        return {
          message: "Hello World",
          access(){
            this.$refs.output.innerText = this.message;
          }
        }
      }

    </script>

  </div>
  </form>
</div>
</body>
</html>
