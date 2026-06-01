<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-white dark:text-white leading-tight">
                    {{ __('Edit Wishlist') }}
                </h2>
                <p class="mt-1 text-sm text-white dark:text-white opacity-80">
                    Perbarui informasi wishlist Anda.
                </p>
            </div>
            <a href="{{ route('wishlist.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition">
                {{ __('Kembali ke Wishlist') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-gray-700 shadow-sm sm:rounded-2xl p-6">
                <form action="{{ route('wishlist.update', $wishlist->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="nama_wishlist" class="block text-sm font-medium text-gray-300">
                            Nama Wishlist
                        </label>
                        <input
                            id="nama_wishlist"
                            name="nama_wishlist"
                            type="text"
                            value="{{ old('nama_wishlist', $wishlist->nama_wishlist) }}"
                            class="mt-1 block w-full rounded-lg border-gray-600 bg-gray-700 text-dark placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required
                        />
                        @error('nama_wishlist')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="deadline" class="block text-sm font-medium text-gray-300">
                            Tanggal Target Pembelian
                        </label>
                        <input
                            id="deadline"
                            name="deadline"
                            type="date"
                            value="{{ old('deadline', $wishlist->deadline) }}"
                            class="mt-1 block w-full rounded-lg border-gray-600 bg-gray-700 text-dark placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required
                        />
                        @error('deadline')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label for="jumlah_barang" class="block text-sm font-medium text-gray-300">
                                Jumlah Barang
                            </label>
                            <input
                                id="jumlah_barang"
                                name="jumlah_barang"
                                type="number"
                                min="1"
                                value="{{ old('jumlah_barang', $wishlist->jumlah_barang) }}"
                                class="mt-1 block w-full rounded-lg border-gray-600 bg-gray-700 text-dark placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required
                            />
                            @error('jumlah_barang')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="harga" class="block text-sm font-medium text-gray-300">
                                Total Harga (Rp)
                            </label>
                            <input
                                id="harga"
                                name="harga"
                                type="number"
                                min="0"
                                value="{{ old('harga', $wishlist->harga) }}"
                                class="mt-1 block w-full rounded-lg border-gray-600 bg-gray-700 text-dark placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required
                            />
                            @error('harga')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="gambar" class="block text-sm font-medium text-gray-300">
                            Gambar Target
                        </label>
                        <div class="mt-2 flex flex-col items-start gap-4">
                            <!-- Preview Container -->
                            <div id="preview-container" class="{{ $wishlist->gambar ? '' : 'hidden' }} relative group">
                                <img id="image-preview" src="{{ $wishlist->gambar ? Storage::url($wishlist->gambar) : '#' }}" alt="Pratinjau Gambar" class="h-24 w-24 rounded-lg border border-gray-600 object-cover shadow-sm transition-all duration-300 group-hover:scale-102" />
                                <button type="button" id="remove-preview" class="absolute -top-2 -right-2 bg-red-600 hover:bg-red-500 text-white rounded-full p-1.5 shadow-lg focus:outline-none transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                @if ($wishlist->gambar)
                                    <p id="current-image-label" class="mt-2 text-xs text-gray-500 dark:text-gray-400">Gambar saat ini</p>
                                @endif
                            </div>
                            <input
                                id="gambar"
                                name="gambar"
                                type="file"
                                accept="image/*"
                                class="block w-full text-white file:rounded-lg file:border-0 file:bg-indigo-600 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-indigo-500 cursor-pointer"
                            />
                        </div>
                        @error('gambar')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-3">
                        <a href="{{ route('wishlist.index') }}" class="inline-flex items-center justify-center rounded-lg bg-gray-700 border border-gray-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-gray-600 transition">
                            {{ __('Batal') }}
                        </a>
                        <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:from-indigo-500 hover:to-violet-500 focus:outline-none focus:ring-4 focus:ring-indigo-300/50">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                <path d="M10.5 1.5H4a2 2 0 00-2 2v14a2 2 0 002 2h12a2 2 0 002-2V9.5m-15 6h6m-3-4h.01M7 15h.01" />
                            </svg>
                            {{ __('Perbarui Wishlist') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const gambarInput = document.getElementById('gambar');
            const previewContainer = document.getElementById('preview-container');
            const imagePreview = document.getElementById('image-preview');
            const removePreviewBtn = document.getElementById('remove-preview');
            const currentImageLabel = document.getElementById('current-image-label');
            const originalSrc = "{{ $wishlist->gambar ? Storage::url($wishlist->gambar) : '#' }}";

            gambarInput.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        imagePreview.src = event.target.result;
                        previewContainer.classList.remove('hidden');
                        if (currentImageLabel) {
                            currentImageLabel.textContent = 'Pratinjau gambar baru';
                        }
                    };
                    reader.readAsDataURL(file);
                }
            });

            removePreviewBtn.addEventListener('click', function () {
                gambarInput.value = '';
                if (originalSrc !== '#') {
                    imagePreview.src = originalSrc;
                    previewContainer.classList.remove('hidden');
                    if (currentImageLabel) {
                        currentImageLabel.textContent = 'Gambar saat ini';
                    }
                } else {
                    imagePreview.src = '#';
                    previewContainer.classList.add('hidden');
                }
            });
        });
    </script>
</x-app-layout>
