<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ColDestino</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/icoLogo.ico')}}" />
        <meta name="autor" content="Juan Camilo Tique">
        <meta name="description" content="Crea tus propios contenidos sobre lo que te gustaría que los demás sepan de Colombia o consulta la mejor información sobre turismo del País"/>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/allmin.css') }}">
        <!-- CSS only -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.css" integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.js" integrity="sha512-tHimK/KZS+o34ZpPNOvb/bTHZb6ocWFXCtdGqAlWYUcz+BGHbNbHMKvEHUyFxgJhQcEO87yg5YqaJvyQgAEEtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
{{--             @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-3">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            <!-- Page Content -->
            <div class="container py-8 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4">
                <aside>
                    <h1 class="font-bold text-lg mb-4">Edicion del post</h1>
                    <ul class="text-sm text-gray-600">
                        <li class="hover:bg-gray-300 leading-7 mb-1 border-l-4 @routeIs('admin.posts.edit', $post) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('admin.posts.edit', $post)}}">
                                Informacion del Post
                            </a>
                        </li>
                        <li class="hover:bg-gray-300 leading-7 mb-1 border-l-4 @routeIs('admin.posts.curriculum', $post) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('admin.posts.curriculum', $post)}}">
                                Secciones del Post
                            </a>
                        </li>
                    </ul>

                     @switch($post->status)
                         @case(1)
                            <form action="{{route('admin.posts.status', $post)}}" method="POST">
                                @csrf
                                <button type="submit" class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Solicitar Revision
                                </button>
                            </form>

                             @break

                             @case(2)
                                 <div class="text-gray-500">
                                    <div class="order-1 lg:order-2 max-w-sm bg-white border-2 border-gray-300 p-6 rounded-md tracking-wide shadow-lg" >
                                        Esta en revisión
                                     </div>
                                 </div>
                             @break

                         @default

                     @endswitch


                </aside>
                <main class="col-span-1 md:col-span-2 lg:col-span-4">
                    {{$slot}}
                </main>
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)
            {{$js}}
        @endisset

        @stack('script')
    </body>
</html>
