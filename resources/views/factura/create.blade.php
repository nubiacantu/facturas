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
  <div class="mt-2 px-4 py-4">
  <div class="md:w-full px-10 p-10 ">
        <form action="{{route('pdf.store')}}" method="post" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded shadow-xl flex flex-col justify-center items-center  bg-white">
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
      

      <div class="flex justify-center">
        <button type="submit" class="flex w-1/2 justify-center rounded-md bg-blue-800 px-3 py-1.5  font-semibold leading-6 text-white  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600  text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]">Enviar</button>
      </div>
    </form>

   
  </div>
</div>
</div>
@endsection
