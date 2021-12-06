<x-app-layout>
        <div class="container py-8">
            <h1 class="text-4xl font-bold text-gray-900">{{$post->name}}</h1>
            <div class="text-lg text-gray-500 mb-2">{!!$post->extract!!}</div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                {{-- Contenido Principal --}}
                <div class="lg:col-span-2">
                    <figure>
                        @if ($post->image)
                            <img class="w-full h-80 object-cover object-center" 
                            src="{{Storage::url($post->image->url)}}" 
                            alt="{{$post->name}}" 
                            title="imagen de {{$post->name}}">
                        @else
                            <img class="w-full h-80 object-cover object-center" 
                            src="https://cdn.pixabay.com/photo/2019/09/07/02/25/city-4457801_960_720.jpg" 
                            alt="Imagen {{$post->name}}" title="Imagen {{$post->name}}"> 
                        @endif
                        
                    </figure>

                    <div class="text-base text-gray-700 mt-4">
                        {!!$post->body!!}

                        <div class="mb-4">
                            @foreach ($post->sections as $section)
                                <h2 class="text-3xl text-gray-800 font-medium mt-6 mb-2">{{$section->subtitle}}</h2>
                                <p class="">{{$section->description}}</p>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Contenido Relacionado --}}
                <div>
                    <aside class="lg:col-span-1 order-2 hidden lg:block lg:order-1">
                        <h1 class="text-2xl text-bold text-gray-800 mb-4">Mas en {{$post->category->name}}</h1>
                        <ul>
                            @foreach ($similares as $similar)
                                <li class="mb-4">
                                    <a href="{{route('posts.show', $similar)}}" class="flex" title="{{$similar->name}}" alt="{{$similar->name}}">
                                        @if ($similar->image)
                                            <img class="w-40 h-28 object-cover object-center" 
                                            src="{{Storage::url($similar->image->url)}}" alt="{{$similar->name}}" title="{{$similar->name}}">

                                        @else
                                            <img class="w-40 h-28 object-cover object-center" 
                                            src="https://cdn.pixabay.com/photo/2019/09/07/02/25/city-4457801_960_720.jpg" 
                                            alt="Imagen {{$similar->name}}" title="Imagen {{$similar->name}}">    
                                        @endif
                                        <div class="ml-4 py-3">
                                            <span class="text-gray-700 font-light mb-3">{{Str::limit($similar->name, 40)}}</span>
                                            <div class="flex items-center mb-1">
                                                {{--<img class="w-8 h-8 object-cover rounded-full shadow-lg" src="{{$similar->user->profile_photo_url}}" alt="">--}}
                                                <tt class="text-xs text-gray-700">by: <i>{{$similar->user->name}}</i></tt>
                                            </div>
                                            <p class="text-sm mt-1"><i class="fas fa-star text-yellow-400 mr-2"></i>{{$similar->rating}}</p>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </aside>

                    {{-- Start of component --}}
                    <section class="order-1 lg:order-2 max-w-sm bg-white border-2 border-gray-300 p-6 rounded-md tracking-wide shadow-lg">
                        <div id="header" class="flex items-center mb-4">
                           <img class="w-14 h-14 rounded-full border-2 border-gray-300" src="{{$post->user->profile_photo_url}}" alt="{{$post->user->name}}" title="{{$post->user->name}}" />
                           <div id="header-text" class="leading-5 ml-6 sm">
                              <h4 class="text-xl font-bold text-gray-600">{{$post->user->name}}</h4>
                              <a href="" class="font-semibold text-blue-600 text-sm">{{'@'.Str::slug($post->user->name, '')}}</a>
                           </div>
                        </div>
                        <div id="quote">
                           <q class="italic text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</q>
                        </div>


                        {{-- @can('enrolled', $post)
                            <button type="submit" class="bg-red-500 text-white w-full rounded-md py-2 mt-2"><i class="fas fa-check"></i> Guardado</button>
                        @else --}}
                        <form action="" method="POST">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white w-full rounded-md py-2 mt-2">Seguir</button>
                        </form>
                    </section>
                </div>
            </div>

        </div>
</x-app-layout>
