<div>
    <div class="bg-gray-200 py-4">
        <div class="container flex">
            <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4">
                <i class="fab fa-buffer"></i>
                Todas las Publicaciones
            </button>
            <div x-data="{ dropdownOpen: true }" class="relative">
                <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block bg-white shadow h-12 px-4 rounded-lg text-gray-700">
                    <i class="fas fa-tags"></i> Categoría <i class="fas fa-angle-down"></i>
                </button>
            
                <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
            
                <div x-show="dropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-20">
                  <a href="#" class="block px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200">small <span class="text-gray-600">(640x426)</span></a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200">medium <span class="text-gray-600">(1920x1280)</span></a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200">large <span class="text-gray-600">(2400x1600)</span></a>
            </div>
        </div>
    </div>
</div>
