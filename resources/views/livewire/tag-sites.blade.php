<div wire:init="loadPosts" class="container">
    @if (count($etiquetas))
        <div class="glider-contain">
            <ul class="glider">
                @foreach($etiquetas as $etiqueta)
                    <li class="mr-4">
                        <figure class="hover:opacity-90" style="object-fit: cover;
                            height: 250px;
                            width: 100%;
                            border-radius: 10px;
                            box-shadow: 0 2px 5px 0 rgba(0,0,0,.5);
                            transition: .3 ease-in-out;
                            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url('https://cdn.pixabay.com/photo/2016/05/27/00/33/laguna-1418870_960_720.jpg')">
                            <div class="px-2">
                                <h1 class="text-lg text-white leading-8 font-bold mt-2">
                                    <a href="#">{{$etiqueta->name}}</a>
                                </h1>
                                <p class="text-sm text-white">{{$etiqueta->post_count}} Publicaciones</p>
                            </div>
                        </figure>
                    </li>
                @endforeach
            </ul>

            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>
    @else
    <div class="flex justify-center items-center">
        <div class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-gray-900"></div>
     </div>
    @endif
</div>
