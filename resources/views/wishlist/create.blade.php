<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-white dark:text-white leading-tight">
                    {{ __('Tambah Wishlist') }}
                </h2>
                <p class="mt-1 text-sm text-white dark:text-white opacity-80">
                    Tambahkan daftar barang yang ingin dibeli untuk rencana tabungan Anda.
                </p>
            </div>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition">
                {{ __('Kembali ke Dashboard') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-gray-700 shadow-sm sm:rounded-2xl p-6">
                @if (session('success'))
                    <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-800 dark:border-green-700 dark:bg-green-900/20 dark:text-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('wishlist.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label for="nama_wishlist" class="block text-sm font-medium text-gray-300">
                            Nama Wishlist
                        </label>
                        <input
                            id="nama_wishlist"
                            name="nama_wishlist"
                            type="text"
                            value="{{ old('nama_wishlist') }}"
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
                            value="{{ old('deadline') }}"
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
                                value="{{ old('jumlah_barang') }}"
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
                                value="{{ old('harga') }}"
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
                            <!-- Preview Container (hidden by default) -->
                            <div id="preview-container" class="hidden relative group">
                                <img id="image-preview" src="#" alt="Pratinjau Gambar" class="h-24 w-24 rounded-lg border border-gray-600 object-cover shadow-sm transition-all duration-300 group-hover:scale-102" />
                                <button type="button" id="remove-preview" class="absolute -top-2 -right-2 bg-red-600 hover:bg-red-500 text-white rounded-full p-1.5 shadow-lg focus:outline-none transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
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

                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:from-indigo-500 hover:to-violet-500 focus:outline-none focus:ring-4 focus:ring-indigo-300/50">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            {{ __('Simpan Wishlist') }}
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

            gambarInput.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        imagePreview.src = event.target.result;
                        previewContainer.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });

            removePreviewBtn.addEventListener('click', function () {
                gambarInput.value = '';
                imagePreview.src = '#';
                previewContainer.classList.add('hidden');
            });
        });
    </script>
</x-app-layout>
