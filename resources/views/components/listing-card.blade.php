@props(['listing'])

<x-card>
  <div class="flex">
   
    <div>
      <h3 class="text-2xl font-bold mb-4">
        <a href="/listings/{{$listing->id}}">{{$listing->movie}}</a>
      </h3>
      <div class="text-xl font-bold mb-4">{{$listing->year}}</div>
      <x-listing-tags :tagsCsv="$listing->tags" />
      <div class="text-lg mt-4">
        <i class="fa-solid fa-location-dot"></i> {{$listing->director}}
      </div>
    </div>
  </div>
</x-card>