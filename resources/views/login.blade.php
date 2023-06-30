<!-- Extender el diseño de la aplicación principal -->
@extends('layouts.app')

<!-- Sección de contenido que se envía al contenedor (yield) -->
@section('contenido')
<div class="flex items-center justify-center mb-16">
<div class="flex w-1/2 p-10 flex-col justify-center px-6 py-12 lg:px-8 bg-white rounded-lg shadow-xl mt-10">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-44 w-auto" src="{{asset('img/user.png')}}" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Iniciar Sesión</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="{{route('login')}}" method="POST" novalidate>
      @csrf <!-- para que detecte token de envio seguro-->
      @if (session('mensaje'))
          <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
              {{session('mensaje')}}
          </p>
      @endif  
      <div>
        <div class="flex items-center justify-between">
          <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
        </div>
        <div class="mt-2">
          <input placeholder="Username" id="username" name="username" type="text" autocomplete="username" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error ('username') border-red-500 @enderror"  value="{{old('username')}}">
        </div>
        @error ('username')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">
                {{$message}}
            </p>
        @enderror
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
       
        </div>
        <div class="mt-2">
          <input placeholder="Password" id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error ('password') border-red-500 @enderror"  value="{{old('password')}}">
        </div>
        @error ('password')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">
                {{$message}}
            </p>
        @enderror
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600  text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]">Log In</button>
      </div>
    </form>

   
  </div>
</div>
</div>
@endsection
