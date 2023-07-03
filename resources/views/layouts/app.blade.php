<!doctype html>
<html class="h-full">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite ('resources/css/app.css')
  @vite ('resources/js/app.js')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
  <!--styles-->
  @stack('styles')
  
</head>
<body class="h-full bg-blue-50">
    @auth   
        <!--ENCABEZADO DE LA PAGINA -->
        <header class="p-3 border-b bg-indigo-900 text-white shadow ">
            <div class="container mx-auto flex justify-center items-center">
                    <a href="{{route('dashboard')}}" class="flex items-center gap-2  p-2 text-white text-sm font-bold cursor-pointer mr-4  hover:border-b-4 hover:-translate-y-1 hover:scale-108 duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                        <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                        </svg>
                        Dashboard
                    </a>

                    <a href="{{route('emisora.index')}}" class="flex items-center gap-2  p-2 text-white text-sm font-bold cursor-pointer mr-4  hover:border-b-4 hover:-translate-y-1 hover:scale-108 duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M7.5 5.25a3 3 0 013-3h3a3 3 0 013 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0112 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 017.5 5.455V5.25zm7.5 0v.09a49.488 49.488 0 00-6 0v-.09a1.5 1.5 0 011.5-1.5h3a1.5 1.5 0 011.5 1.5zm-3 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        <path d="M3 18.4v-2.796a4.3 4.3 0 00.713.31A26.226 26.226 0 0012 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 01-6.477-.427C4.047 21.128 3 19.852 3 18.4z" />
                        </svg>

                        Empresa Emisora
                    </a>
                    <a href="{{route('receptora.index')}}" class="flex items-center gap-2  p-2 text-white text-sm font-bold cursor-pointer mr-4  hover:border-b-4 hover:-translate-y-1 hover:scale-108 duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                        </svg>

                        Empresa Receptora
                    </a>
                    <a href="{{route('factura.index')}}" class="flex items-center gap-2  p-2 text-white text-sm font-bold cursor-pointer mr-4  hover:border-b-4 hover:-translate-y-1 hover:scale-108 duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z" />
                        <path fill-rule="evenodd" d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z" clip-rule="evenodd" />
                        <path d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z" />
                        </svg>

                        Facturas
                    </a>
                    

                    
                    <!--Navegacion -->
                    <nav class="flex gap-2 item-center ">
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!--Hola:  <span class="ml-1 font-normal text-white">  {{auth()->user()->username}} </span>-->

                                <form method="post" action="{{route('logout')}}">
                                    @csrf
                                    <button type="submit" class="bg-teal-900 text-white rounded-md px-3 py-2 text-sm font-medium hover:bg-white hover:text-indigo-900" >Log Out </button>
                                
                                </form>
                            </div>    
                        </div>
                    </nav>
                

                
                
            </div>
        </header>
        <!--Contenido para cada una de las vistas-->
    @endauth
        <main class="bg-blue-50 p-2">
            @yield('contenido')
        </main>

        <!--Pie de pagina -->
        <footer class="text-center p-5 text-gray-400 font-bold ">
            Nubia Esmeralda Cantú Sánchez - Universidad Politécnica de Victoria - {{now()->year}}
        </footer>    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>  
    </body>
</html>
