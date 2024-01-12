<x-layout>
  <a href="/" class="inline-block text-black ml-4 mb-4"> Powrót
  </a>
  <div class="mx-4">
    <x-card class="p-10">
      <div class="flex flex-col items-center justify-center text-center">
        

        <h3 class="text-2xl mb-2">
          {{$listing->movie}}
        </h3>
        <div class="text-xl font-bold mb-4">{{$listing->year}}</div>

        

        
           {{$listing->director}}
        
        <div class="border border-gray-200 w-full mb-6"></div>
        <div>
          <h3 class="text-3xl font-bold mb-4">Opis</h3>
          <div class="text-lg space-y-6">
            {{$listing->description}}
            <div class="text-lg my-4">
            <a href="{{$listing->website}}" target="_blank"
              class="block bg-black text-white py-2 rounded-xl hover:opacity-80">
              Zwiastun</a></div>
              
          </div>
        </div>
      </div>
    </x-card>

    {{-- <x-card class="mt-4 p-2 flex space-x-6">
      <a href="/listings/{{$listing->id}}/edit">
         Edit
      </a>

      <form method="POST" action="/listings/{{$listing->id}}">
        @csrf
        @method('DELETE')
        <button class="text-red-500"> Usuń</button>
      </form>
    </x-card> --}}
  </div>
</x-layout>