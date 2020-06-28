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
<div
    x-data="pokeSearch()"
    class="mx-auto max-w-sm mt-32 shadow-lg rounded-lg px-4 py-4"
>
  <div class="flex flex-row">
    <input
        type="text"
        class="border-2 rounded-md w-2/3 text-base py-1 px-2 focus:outline-none text-gray-600"
        name="pokemonSearch"
        x-model="pokemonSearch"
    />
    <button
        type="submit"
        class="ml-2 bg-gray-200 w-1/3 px-3 py-1 rounded text-base text-gray-600 hover:bg-gray-300"
        @click="fetchPokemon()"
        :disabled="isLoading"
    >
      Search
    </button>
  </div>
  <template x-if="pokemon">
    <div class="flex flex-row items-center">
      <img :src="pokemon.sprites.front_default" alt="">
      <div>
        <h3 x-text="pokemon.name" class="text-lg text-gray-600 pb-2"></h3>
        <template x-for="abilityObj in pokemon.abilities" :key="abilityObj.ability.url">
          <span
              x-text="abilityObj.ability.name"
              class="text-base text-gray-600 bg-gray-200 px-2 py-1 rounded-lg"
          ></span>
        </template>
      </div>
    </div>
  </template>
</div>
</body>
</html>

<script>
  function pokeSearch() {
    return {
      isLoading: false,
      pokemon: null,
      fetchPokemon() {
        this.isLoading = true;
        axios.get(`https://pokeapi.co/api/v2/pokemon/${this.pokemonSearch}`).then(res => {
          this.isLoading = false;
          this.pokemon = res.data;
          console.log(res.data);
        })
        /*fetch(`https://pokeapi.co/api/v2/pokemon/${this.pokemonSearch}`)
          .then(res => res.json())
          .then(data => {
            this.isLoading = false;
            this.pokemon = data;
            console.log(data);
          });*/
      },
      pokemonSearch: '',
    }
  }
</script>