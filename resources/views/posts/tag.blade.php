<x-app-layout>
    <div class="hidden">
        <div class="bg-gray-600 top-16 top-14 top-20 top-11 top-10 top-9"></div>
        <div class="bg-red-600"></div>
        <div class="bg-yellow-600"></div>
        <div class="bg-green-600"></div>
        <div class="bg-blue-600"></div>
        <div class="bg-indigo-600"></div>
        <div class="bg-purple-600"></div>
        <div class="bg-pink-600"></div>
    </div>

    <section class="bg-gray-900">
        <div class="container py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-6xl">
                    Etiqueta: {{$tag->name}}
                </h1>

                @livewire('search')
            </div>
        </div>
    </section>
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: 
                url(@if ($post->image)
                        {{Storage::url($post->image->url)}}
                    @else
                        https://cdn.pixabay.com/photo/2019/09/07/02/25/city-4457801_960_720.jpg
                    @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            @foreach ($post->tags as $tag)
                                <a href="{{route('posts.tag', $tag)}}" class="bg-{{$tag->color}}-600 inline-block px-3 h-6 text-white rounded-full">
                                    {{$tag->name}}
                                </a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl text-white leading-8 font-bold mt-2">
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
                    </div>
                </article>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <h2 class="text-2xl font-medium text-center">Lo sentimos los posts para esta etiqueta no está disponible</h2>
                </div>
            @endforelse
        </div>
        <div class="my-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>
