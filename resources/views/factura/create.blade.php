<!-- Extender el diseño de la aplicación principal -->
@extends('layouts.app')
<!--directiva para integrar los estilos de dropzone-->
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
@endpush
<!-- Sección de contenido que se envía al contenedor (yield) -->
@section('contenido')
<div class="flex items-center justify-center mb-16">
<div class="flex w-1/2 flex-col justify-center px-6 py-12 bg-white rounded-lg shadow-xl mt-10">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-44 w-auto" src="{{asset('img/factura.png')}}" alt="User">
  </div>
  <div class="mt-2 ">
    <div class="md:w-full px-2 py-2">
        <form style="padding: 7px; border: 2px dashed rgba(63,131,248,.5); max-height:200px" action="{{route('pdf.store')}}" method="post" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded shadow-xl flex flex-col justify-center items-center  bg-white">
            @csrf
        </form> 
    </div>
    <div class="md:w-full px-2 py-2">
        <form style=" padding: 7px; border: 2px dashed rgba(63,131,248,.5); max-height:200px" action="{{route('xml.store')}}" method="post" enctype="multipart/form-data" id="dropzone2" class="dropzone border-dashed border-2 w-full h-96 rounded shadow-xl flex flex-col justify-center items-center  bg-white">
            @csrf
        </form> 
    </div>
    <form class="space-y-6" action="{{route('factura.store')}}" method="POST" novalidate>
      @csrf <!-- para que detecte token de envio seguro-->
      @if (session('agregada'))
        <div class="bg-green-200 p-2 rounded-lg mb-6 text-black text-center ">
              {{session('agregada')}}
        </div>
      @endif  
      <!--Agregar campo oculto para guardar el valor de la imagen-->
      <div class="mb-5">
          <input type="hidden" name="pdf"  value="{{old('pdf')}}">
          @error('pdf')
              <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}} </p>
          @enderror
      </div>

      <!--Agregar campo oculto para guardar el valor de la imagen-->
      <div class="mb-5">
          <input type="hidden" name="xml"  value="{{old('xml')}}">
          @error('xml')
              <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}} </p>
          @enderror
      </div>

      <div class="mb-4">
          <label for="emisora_id" class="mb-2 block uppercase font-bold">Empresa Emisora:</label>
          <select id="emisora_id" name="emisora_id" required class="w-full p-2 pl-8 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('emisora_id') border-red-500 @enderror">
              <option value="">Selecciona una empresa emisora</option>
              @foreach ($emisoras as $emisora)
                  <option value="{{ $emisora->id }}">{{ $emisora->razon }}</option>
              @endforeach
          </select>
          @error('emisora_id')
              <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}} </p>
          @enderror
      </div>

      <div class="mb-4">
          <label for="receptora_id" class="mb-2 block uppercase font-bold">Empresa Receptora:</label>
          <select id="receptora_id" name="receptora_id" required  class="w-full p-2 pl-8 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('receptora_id') border-red-500 @enderror">
              <option value="">Selecciona una empresa receptora</option>
              @foreach($receptoras as $receptora)
                  <option value="{{ $receptora->id }}">{{ $receptora->nombre }}</option>
              @endforeach
          </select>
          @error('receptora_id')
              <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}} </p>
          @enderror
      </div>

      <div class="mb-4">
          <label for="folio" class="mb-2 block uppercase font-bold">Folio de Factura:</label>
          <input type="text" id="folio" name="folio" placeholder="Escribe el folio de la factura" required class="w-full p-2 pl-8 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('folio') border-red-500 @enderror" value="{{ old('folio') }}">
          @error('folio')
              <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}} </p>
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
