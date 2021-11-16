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

                <div class="flex items-center bg-white mt-2" x-data="{ search: '' }">
                    <div class="w-full">
                        <input type="search" class="w-full px-4 text-gray-900 border-0 border-opacity-0 focus:outline-none"
                            placeholder="search" x-model="search">
                    </div>
                    <div>
                        <button type="submit" class="flex items-center justify-center w-12 h-12 text-gray-100"
                            :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-500 cursor-not-allowed'"
                            :disabled="search.length == 0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @livewire('post-index')
</x-app-layout>