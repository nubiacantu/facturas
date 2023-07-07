<!-- Extender el diseño de la aplicación principal -->
@extends('layouts.app')

<!-- Sección de contenido que se envía al contenedor (yield) -->
@section('contenido')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="mx-auto flex max-w-80% flex-col shadow-lg p-8 bg-white rounded-xl">
        @if(session('success'))
            <div class="bg-blue-200 p-2 rounded-lg mb-6 text-black text-center ">
                {{ session('success') }}
            </div>
        @endif
        @if(session('agregada'))
            <div class="bg-blue-200 p-2 rounded-lg mb-6 text-black text-center ">
                {{ session('agregada') }}
            </div>
        @endif
        <a href="{{route('factura.create')}}" class="ml-auto mb-3 bg-indigo-800 hover:bg-indigo-700 transition-colors cursor-pointer font-bold px-3 py-2 text-white rounded-xl">
            Agregar Factura
        </a>
        <!--botones de exportar que llaman al js de app-->
        <div class="my-4 flex justify-end space-x-2">
            <button onclick="exportToPDF('factura')" class="inline-block px-2 py-1 rounded-lg font-bold text-sm text-white bg-red-600 hover:bg-red-700 transition-colors">
                Exportar a PDF
            </button>

            <button onclick="exportToExcel('factura')" class="inline-block px-2 py-1 rounded-lg font-bold text-sm text-white bg-green-600 hover:bg-green-700 transition-colors">
                Exportar a Excel
            </button>
        </div>
        <table class="table-auto " id="maintable">
            <thead>
                <tr class="bg-indigo-300 text-black">
                    <th class="px-4 py-4 border border-blue-400">ID</th>
                    <th class="px-4 py-4 border border-blue-400">Folio</th>
                    <th class="px-4 py-4 border border-blue-400">PDF</th>
                    <th class="px-4 py-4 border border-blue-400">XML</th>
                </tr>
            </thead>
            <tbody>
                
                @if($facturas->isEmpty())
                    <tr class="text-center">
                        <td colspan="6" class="px-4 py-2 border border-blue-300 text-center text-gray-500">Aún no hay facturas que mostrar.</td>
                    </tr>
                @else
                    @foreach($facturas as $factura)
                    <tr class="text-center">
                        <td class="px-4 py-2 border border-blue-300">{{ $factura->id }}</td>
                        <td class="px-4 py-2 border border-blue-300">{{ $factura->folio }}</td>
                        <td class="px-4 py-2 border border-blue-300"><a style="text-decoration:underline; color:rgba(63,131,248)" href="{{asset ('uploads_pdf/'. $factura->pdf )}}" target="_blank">{{ $factura->pdf }}</a></td>
                        <td class="px-4 py-2 border border-blue-300"><a style="text-decoration:underline; color:rgba(63,131,248)" href="{{asset ('uploads_xml/'. $factura->xml )}}" target="_blank">{{ $factura->xml }}</a></td>
                        <td class=" px-3 py-2 exclude-column">
                            <form action="{{route('factura.delete', $factura->id)}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="inline-block px-2 py-2 rounded-lg font-bold text-white bg-red-600 hover:bg-red-700 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
</div>



@endsection
