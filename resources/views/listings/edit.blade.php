<x-layout>
<a href="/" class="inline-block text-black ml-4 mb-4"> Powrót
  </a>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Edytuj film</h2>
      <p class="mb-4">{{$listing->movie}}</p>
    </header>

    <form method="POST" action="/listings/{{$listing->id}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-6">
        <label for="movie" class="inline-block text-lg mb-2">Tytuł</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="movie"
          value="{{$listing->movie}}" />

        @error('movie')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="year" class="inline-block text-lg mb-2">Rok</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="year"
          value="{{$listing->year}}" />

        @error('year')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="director" class="inline-block text-lg mb-2">Rezyser</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="director"
           value="{{$listing->director}}" />

        @error('director')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>


      <div class="mb-6">
        <label for="website" class="inline-block text-lg mb-2">
          Link do zwiastunu
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
          value="{{$listing->website}}" />

        @error('website')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="tags" class="inline-block text-lg mb-2">
          Aktorzy
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" value="{{$listing->tags}}" />

        @error('tags')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="logo" class="inline-block text-lg mb-2">
          Logo
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
          placeholder="Include tasks, requirements, salary, etc">{{$listing->description}}</textarea>

        @error('description')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
          Zaktualizuj
        </button>

        <a href="/" class="text-black ml-4"> Powrót </a>
      </div>
    </form>
  </x-card>
</x-layout>
