<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <link rel="stylesheet" 
  
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
        theme: {
          extend: {
            colors: {
              laravel: '#4e62f5',
            },
          },
        },
      }
  </script>
  <title>WatchTime</title>
</head>

<body class="mb-48">
  <nav class="flex justify-between items-center mb-4">
  <ul class="flex space-x-6 mr-6 text-lg">
  <h1 class="text-5xl font-bold mb-4">
  <i class="font-bold uppercase"
                ></i>WatchTime</i></ul></h1>
    <ul class="flex space-x-6 mr-6 text-lg">
      @auth
      <li>
        <span class="font-bold">
          Użytkownik: {{auth()->user()->name}}
        </span>
      </li>
      <li>
        <a href="/listings/manage" class="hover:text-laravel"> Zarządzaj filmami</a>
      </li>
      <li>
        <form class="inline" method="POST" action="/logout">
          @csrf
          <button type="submit">
             Wyloguj
          </button>
        </form>
      </li>
      @else
      <li>
        <a href="/register" class="hover:text-laravel"> Rejestracja</a>
      </li>
      <li>
        <a href="/login" class="hover:text-laravel"> Login</a>
      </li>
      @endauth
    </ul>
  </nav>

  <main>
    {{$slot}}
  </main>
  <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-12 mt-24 opacity-90 md:justify-center">
    <p class="ml-2">MP &copy; 2023</p>

    <a href="/listings/create" class="absolute right-10 bg-black text-white py-2 px-5">Dodaj film</a>
  </footer>

  <x-flash-message />
</body>

</html>