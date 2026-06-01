<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-white leading-tight">
                    {{ __('Edit Pemasukan') }}
                </h2>
                <p class="mt-1 text-sm text-gray-400">
                    Perbarui catatan tabungan untuk wishlist: <span class="text-indigo-400 font-semibold">{{ $wishlist->nama_wishlist }}</span>
                </p>
            </div>
            <a href="{{ route('wishlist-detail.index', $wishlist->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-gray-600 text-white rounded-lg hover:bg-gray-600 transition">
                {{ __('Kembali') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-gray-700 shadow-sm sm:rounded-2xl p-6">
                
                <form action="{{ route('wishlist-detail.update', ['wishlist_id' => $wishlist->id, 'detail_id' => $detail->id]) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="pemasukan" class="block text-sm font-medium text-gray-300">
                            Jumlah Tabungan / Pemasukan (Rp)
                        </label>
                        <input
                            id="pemasukan"
                            name="pemasukan"
                            type="number"
                            min="0"
                            value="{{ old('pemasukan', $detail->pemasukan) }}"
                            class="mt-1 block w-full rounded-lg border-gray-600 bg-white text-gray-900 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required
                        />
                        @error('pemasukan')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="kategori" class="block text-sm font-medium text-gray-300">
                            Kategori / Sumber Dana
                        </label>
                        <input
                            id="kategori"
                            name="kategori"
                            type="text"
                            value="{{ old('kategori', $detail->kategori) }}"
                            class="mt-1 block w-full rounded-lg border-gray-600 bg-white text-gray-900 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required
                        />
                        @error('kategori')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-300">
                            Tanggal Menabung
                        </label>
                        <input
                            id="tanggal"
                            name="tanggal"
                            type="date"
                            value="{{ old('tanggal', $detail->tanggal) }}"
                            class="mt-1 block w-full rounded-lg border-gray-600 bg-white text-gray-900 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required
                        />
                        @error('tanggal')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-3 mt-8">
                        <a href="{{ route('wishlist-detail.index', $wishlist->id) }}" class="inline-flex items-center justify-center rounded-lg bg-gray-700 border border-gray-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-gray-600 transition">
                            {{ __('Batal') }}
                        </a>
                        <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:from-indigo-500 hover:to-violet-500 focus:outline-none focus:ring-4 focus:ring-indigo-300/50">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                            </svg>
                            {{ __('Perbarui Tabungan') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
