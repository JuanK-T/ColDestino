
<article class="w-full h-80 bg-cover bg-center @if ($loop->first)
    md:col-span-2
    @endif" style="background-image:linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(@if ($post->image)
    {{Storage::url($post->image->url)}}
    @else
        https://cdn.pixabay.com/photo/2019/09/07/02/25/city-4457801_960_720.jpg
    @endif)">

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
            <a href="{{route('posts.show', $post)}}">
                {{Str::limit($post->name, 30)}}
            </a>
        </h1>
        <p class="text-base text-white">
            {{Str::limit($post->extract, 50)}}
        </p>
        <i><tt class="text-xs text-white"><Strong>By: </Strong> {{$post->user->name}}</tt></i>
    </div>
</article>