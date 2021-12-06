<div>
    <div class="bg-gray-200 py-4">
        <div class="container flex">
            <button class="focus:bg-blue-700 focus:text-white hover:bg-blue-500 hover:text-white bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4" wire:click="resetFilters">
                <i class="fab fa-buffer"></i>
                Todas las Publicaciones
            </button>
            <div x-data="{ open: false }" class="relative mr-4">
                <button class="focus:bg-blue-700 focus:text-white hover:bg-blue-500 hover:text-white  relative z-10 block bg-white shadow h-12 px-4 rounded-lg text-gray-700" x-on:click="open = true">
                    <i class="fas fa-tags"></i> Categoría <i class="fas fa-angle-down"></i>
                </button>

                <div x-show="open" x-on:click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-20">

                    @foreach ($categories as $category)
                     <a class="cursor-pointer block px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200" wire:click="$set('category_id', {{$category->id}})" x-on:click="open = false">
                         <span class="text-gray-600">{{$category->name}}</span>
                    </a>
                    @endforeach
                </div>
            </div>

            <div x-data="{ open: false }" class="relative mr-4">
                <button class="focus:bg-blue-700 focus:text-white hover:bg-blue-500 hover:text-white relative z-10 block bg-white shadow h-12 px-4 rounded-lg text-gray-700" x-on:click="open = true">
                    <i class="fas fa-tag"></i> Etiquetas <i class="fas fa-angle-down"></i>
                </button>

                <div x-show="open" x-on:click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-20">
                    @foreach ($tags as $tag)
                        <a class="cursor-pointer block px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200" wire:click="$set('tag_id', {{$tag->id}})" x-on:click="open = false">
                            <span class="text-gray-600">{{$tag->name}}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-2">
        <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if ($loop->first)
                    md:col-span-2
                @endif" 
                style="background-image:linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(@if ($post->image) {{Storage::url($post->image->url)}}@else https://cdn.pixabay.com/photo/2019/09/07/02/25/city-4457801_960_720.jpg @endif)">

                <div class="w-full h-full px-8 flex flex-col justify-center">
                    <div class="flex">
                        <ul class="flex text-sm mr-auto">
                            <li class="mr-1"><i class="fas fa-star text-{{$post->rating >= 1 ? 'yellow' : 'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$post->rating >= 2 ? 'yellow' : 'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$post->rating >= 3 ? 'yellow' : 'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$post->rating >= 4 ? 'yellow' : 'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$post->rating == 5 ? 'yellow' : 'gray'}}-400"></i></li>
                        </ul>
                        <p class="text-sm text-gray-300 ml-auto">
                            <i class="fas fa-users"></i>
                            ({{$post->visits_count}})
                        </p>
                    </div>

                        <h1 class="text-4xl text-white leading-8 font-bold">
                            @auth
                                <form class="mr-auto flex text-right" action="{{route('posts.enrolled', $post)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="mr-auto text-left text-4xl text-white leading-8 font-bold">{{Str::limit($post->name, 30)}}</button>
                                </form>
                            @else
                                <a href="{{route('posts.show', $post)}}">
                                    {{Str::limit($post->name, 30)}}
                                </a>
                            @endauth
                        </h1>
                        <div class="text-base text-white">{!!Str::limit($post->extract, 50)!!}</div>
                        <i><tt class="text-xs text-white"><Strong>By: </Strong> {{$post->user->name}}</tt></i>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="my-4">
            {{$posts->links()}}
        </div>
    </div>
</div>
