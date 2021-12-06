<x-app-layout>
    <section class="bg-cover" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url({{asset('img/post/fernanda-fierro-XV4XUU7gWlk-unsplash.jpg')}})">
        <div class="container py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-6xl">
                    ¿Deseas conocer a el país?
                </h1>
                <p class="text-white text-xl mt-2">
                    Sí buscabas informacion para a viajar, has llegado al lugar adecuado. Encuentra publicaciones ó crea las tuyas
                </p>

                @livewire('search')
            </div>
        </div>
    </section>

    @livewire('post-index')
</x-app-layout>
