<!-- Extender el diseño de la aplicación principal -->
@extends('layouts.app')

<!-- Sección de contenido que se envía al contenedor (yield) -->
@section('contenido')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-5">

    <div class="mx-auto flex max-w-80% flex-col shadow-lg p-8 bg-white rounded-xl">
        <a href="{{route('portal.index') }}" class="flex items-center  text-gray-500 text-sm mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                <path d="M15 18l-6-6 6-6" />
            </svg>
            Volver al portal
        </a>    
        <h1 class=" text-center mb-4 text-4xl font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-4xl">Aquí puede ver <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-blue-500">sus facturas</span></h1>
        
        <table class="table-auto " >
            <thead>
                <tr class="bg-indigo-300 text-black">
                    <th class="px-4 py-4 border border-blue-400">Folio</th>
                    <th class="px-4 py-4 border border-blue-400">PDF</th>
                    <th class="px-4 py-4 border border-blue-400">XML</th>
                </tr>
            </thead>
            <tbody>
            @if ($facturas)
                @foreach($facturas as $factura)
                <tr class="text-center">
                    <td class="px-4 py-2 border border-blue-300">{{ $factura->folio }}</td>
                    <td class="px-4 py-2 border border-blue-300"><a style="text-decoration:underline; color:rgba(63,131,248)" href="{{asset ('uploads_pdf/'. $factura->pdf )}}" target="_blank">{{ $factura->pdf }}</a></td>
                    <td class="px-4 py-2 border border-blue-300"><a style="text-decoration:underline; color:rgba(63,131,248)" href="{{asset ('uploads_xml/'. $factura->xml )}}" target="_blank">{{ $factura->xml }}</a></td>
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>



@endsection
