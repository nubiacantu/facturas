<!-- Extender el diseño de la aplicación principal -->
@extends('layouts.app')

<!-- Sección de contenido que se envía al contenedor (yield) -->
@section('contenido')
<div class="flex items-center justify-center mb-16">
<div class="flex w-1/2 flex-col justify-center px-6 py-12 bg-white rounded-lg shadow-xl mt-10">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-44 w-auto" src="{{asset('img/receptora.png')}}" alt="User">
  </div>
  <div class="mt-2 px-4 py-4">
    <form class="space-y-6" action="{{route('receptora.store')}}" method="POST" novalidate>
      @csrf <!-- para que detecte token de envio seguro-->
      @if (session('agregada'))
        <div class="bg-green-200 p-2 rounded-lg mb-6 text-black text-center ">
              {{session('agregada')}}
        </div>
      @endif  
      <div>
        <div class="flex items-center justify-between">
          <label for="nombre" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
        </div>
        <div class="mt-1">
          <input placeholder="Nombre" id="nombre" name="nombre" type="text" autocomplete="nombre" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error ('nombre') border-red-500 @enderror"  value="{{old('nombre')}}">
        </div>
        @error ('nombre')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">
                {{$message}}
            </p>
        @enderror
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="direccion" class="block text-sm font-medium leading-6 text-gray-900">Dirección</label>
       
        </div>
        <div class="mt-1">
          <input placeholder="Dirección" id="direccion" name="direccion" type="text" autocomplete="current-direccion" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error ('direccion') border-red-500 @enderror"  value="{{old('direccion')}}">
        </div>
        @error ('direccion')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">
                {{$message}}
            </p>
        @enderror
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="rfc" class="block text-sm font-medium leading-6 text-gray-900">RFC</label>
       
        </div>
        <div class="mt-1">
          <input placeholder="RFC" id="rfc" name="rfc" type="text" autocomplete="current-rfc" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error ('rfc') border-red-500 @enderror"  value="{{old('rfc')}}">
        </div>
        @error ('rfc')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">
                {{$message}}
            </p>
        @enderror
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="contacto" class="block text-sm font-medium leading-6 text-gray-900">Contacto</label>
       
        </div>
        <div class="mt-1">
          <input placeholder="Contacto" id="contacto" name="contacto" type="text" autocomplete="current-contacto" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error ('contacto') border-red-500 @enderror"  value="{{old('contacto')}}">
        </div>
        @error ('contacto')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">
                {{$message}}
            </p>
        @enderror
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
       
        </div>
        <div class="mt-1 mb-10">
          <input placeholder="Email" id="email" name="email" type="email" autocomplete="current-email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error ('email') border-red-500 @enderror"  value="{{old('email')}}">
        </div>
        @error ('email')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">
                {{$message}}
            </p>
        @enderror
      </div>

      <div class="flex justify-center">
        <button type="submit" class="flex w-1/2 justify-center rounded-md bg-blue-800 px-3 py-1.5  font-semibold leading-6 text-white  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600  text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]">Enviar</button>
      </div>
    </form>

   
  </div>
</div>
</div>
@endsection
