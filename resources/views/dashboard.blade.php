<!-- Extender el diseño de la aplicación principal -->
@extends('layouts.app')

<!-- Sección de contenido que se envía al contenedor (yield) -->
@section('contenido')

<!-- Sección de tarjetas -->
<div class="py-8">
  <div class="mx-auto max-w-7xl px-6 lg:px-8 ">
    <dl class="grid grid-cols-1 gap-x-2 gap-y-8 text-center lg:grid-cols-3">
      
      <!-- Tarjeta: emisora -->
      <a href="{{route('emisora.index')}}"><div class="mx-auto flex max-w-xs flex-col gap-y-4 shadow-lg rounded-xl p-16 bg-white hover:-translate-y-1 hover:scale-110 duration-300">
      <img class="mx-auto h-44 w-auto" src="{{asset('img/emisora.png')}}" alt="User">
        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Empresas Emisoras</dd>
      </div></a>

      <!-- Tarjeta: receptora -->
      <a href="{{route('receptora.index')}}"><div class="mx-auto flex max-w-xs flex-col gap-y-4 shadow-lg rounded-xl p-16 bg-white hover:-translate-y-1 hover:scale-110 duration-300">
      <img class="mx-auto h-44 w-auto" src="{{asset('img/receptora.png')}}" alt="User">
        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Empresas Receptoras</dd>
      </div></a>

      <!-- Tarjeta: facturas -->
      <a href="{{route('factura.index')}}"><div class="mx-auto flex max-w-xs flex-col gap-y-4 shadow-lg rounded-xl p-16 bg-white hover:-translate-y-1 hover:scale-110 duration-300">
      <img class="mx-auto h-44 w-auto" src="{{asset('img/factura.png')}}" alt="User">
        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Facturas</dd>
      </div></a>
      
    </dl>
  </div>
</div>

@endsection
