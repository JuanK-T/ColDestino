<form class="flex items-center bg-white mt-2" x-data="{ search: '' }" autocomplete="off">
    <div class="w-full">
        <input wire:model="search" type="search" class="w-full px-4 text-gray-900 border-0 border-opacity-0 focus:outline-none"
            placeholder="search" x-model="search">

            @if ($search)
                <ul class="absolute z-50 w-2/5 bg-white mt-2 rounded-lg overflow-hidden">
                    @forelse ($this->results as $result)
                        <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                            <a href="{{route('posts.show', $result)}}">{{$result->name}}</a>
                        </li>
                    @empty
                        <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                            No hay ninguna coincidencia :c
                        </li>
                    @endforelse
                </ul>
            @endif
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
</form>
