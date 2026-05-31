<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Tambah Wishlist') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
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
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                @if (session('success'))
                    <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-800 dark:border-green-700 dark:bg-green-900/20 dark:text-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('wishlist.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label for="nama_wishlist" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Nama Wishlist
                        </label>
                        <input
                            id="nama_wishlist"
                            name="nama_wishlist"
                            type="text"
                            value="{{ old('nama_wishlist') }}"
                            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required
                        />
                        @error('nama_wishlist')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="deadline" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Tanggal Target Pembelian
                        </label>
                        <input
                            id="deadline"
                            name="deadline"
                            type="date"
                            value="{{ old('deadline') }}"
                            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required
                        />
                        @error('deadline')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label for="jumlah_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                Jumlah Barang
                            </label>
                            <input
                                id="jumlah_barang"
                                name="jumlah_barang"
                                type="number"
                                min="1"
                                value="{{ old('jumlah_barang') }}"
                                class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required
                            />
                            @error('jumlah_barang')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="harga" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                Total Harga (Rp)
                            </label>
                            <input
                                id="harga"
                                name="harga"
                                type="number"
                                min="0"
                                value="{{ old('harga') }}"
                                class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required
                            />
                            @error('harga')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="gambar" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Gambar Target
                        </label>
                        <input
                            id="gambar"
                            name="gambar"
                            type="file"
                            accept="image/*"
                            class="mt-1 block w-full text-gray-900 dark:text-gray-100 file:rounded-lg file:border-0 file:bg-indigo-600 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-indigo-500"
                        />
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
</x-app-layout>
