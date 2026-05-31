<x-app-layout>
    <x-slot name="header"></x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 flex justify-center">
                <a href="{{ route('wishlist.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:from-indigo-500 hover:to-violet-500 focus:outline-none focus:ring-4 focus:ring-indigo-300/50">
                    {{ __('Tambah Wishlist') }}
                </a>
            </div>


            @if (session('success'))
                <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-800 dark:border-green-700 dark:bg-green-900/20 dark:text-green-200">
                    {{ session('success') }}
                </div>
            @endif

            @if ($wishlists->isEmpty())
                <div></div>

            @else
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($wishlists as $wishlist)
                        <div class="overflow-hidden rounded-lg bg-white shadow-sm dark:bg-gray-800 hover:shadow-md transition">
                            @if ($wishlist->gambar)
                                <img src="{{ Storage::url($wishlist->gambar) }}" alt="{{ $wishlist->nama_wishlist }}" class="h-40 w-full object-cover">
                            @else
                                <div class="h-40 w-full bg-gradient-to-r from-indigo-100 to-violet-100 dark:from-indigo-900 dark:to-violet-900 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-12 w-12 text-indigo-300 dark:text-indigo-700">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-6-6 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-6-6-5.159 5.159a2.25 2.25 0 0 0 0 3.182l5.159 5.159m6-6 5.159 5.159a2.25 2.25 0 0 0 3.182 0l5.159-5.159" />
                                    </svg>
                                </div>
                            @endif
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-900 dark:text-gray-100">{{ $wishlist->nama_wishlist }}</h3>
                                <div class="mt-2 space-y-1 text-sm text-gray-600 dark:text-gray-400">
                                    <p>Jumlah: <span class="font-medium">{{ $wishlist->jumlah_barang }}</span></p>
                                    <p>Harga: <span class="font-medium">Rp {{ number_format($wishlist->harga, 0, ',', '.') }}</span></p>
                                    <p>Target: <span class="font-medium">{{ \Carbon\Carbon::parse($wishlist->deadline)->format('d M Y') }}</span></p>
                                </div>
                                <div class="mt-4 flex gap-2">
                                    <a href="{{ route('wishlist.edit', $wishlist->id) }}" class="flex-1 rounded-lg bg-blue-100 px-3 py-2 text-center text-xs font-medium text-blue-700 hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-200 dark:hover:bg-blue-800 transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('wishlist.destroy', $wishlist->id) }}" method="POST" class="flex-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Hapus wishlist ini?')" class="w-full rounded-lg bg-red-100 px-3 py-2 text-xs font-medium text-red-700 hover:bg-red-200 dark:bg-red-900 dark:text-red-200 dark:hover:bg-red-800 transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
