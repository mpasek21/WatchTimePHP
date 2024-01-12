<x-layout>
<a href="/" class="inline-block text-black ml-4 mb-4"> Powrót
  </a>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">DODAJ NOWY FILM</h2>
    </header>

    <form method="POST" action="/listings" enctype="multipart/form-data">
      @csrf
      <div class="mb-6">
        <label for="movie" class="inline-block text-lg mb-2">Tytuł</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="movie"
          value="{{old('movie')}}" />

        @error('movie')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="year" class="inline-block text-lg mb-2">Rok produkcji</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="year"
          value="{{old('year')}}" />

        @error('year')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="director" class="inline-block text-lg mb-2">Reżyser</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="director"
           value="{{old('director')}}" />

        @error('director')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>


      <div class="mb-6">
        <label for="website" class="inline-block text-lg mb-2">
          Link do traileru
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
          value="{{old('website')}}" />

        @error('website')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="tags" class="inline-block text-lg mb-2">
          Aktorzy
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
          placeholder="np: Ford, Depp, Carell" value="{{old('tags')}}" />

        @error('tags')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="logo" class="inline-block text-lg mb-2">
          Logo filmu
        </label>
        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />

        @error('logo')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="description" class="inline-block text-lg mb-2">
          Opis filmu
        </label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
          placeholder="Krótki opis akcji filmu">{{old('description')}}</textarea>

        @error('description')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
          Dodaj
        </button>

        <a href="/" class="text-black ml-4"> Powrót </a>
      </div>
    </form>
  </x-card>
</x-layout>
