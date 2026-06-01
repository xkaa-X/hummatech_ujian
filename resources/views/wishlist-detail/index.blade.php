<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-gray-700 pb-5">
            <div>
                <h2 class="font-bold text-2xl text-white leading-tight">
                    {{ __('Kelola Tabungan: ') }} <span class="text-indigo-400">{{ $wishlist->nama_wishlist }}</span>
                </h2>
                <p class="mt-1 text-sm text-gray-400">
                    Catat dan pantau setiap pemasukan untuk mencapai target impian ini.
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('transaksi.index') }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-gray-600 bg-gray-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                    </svg>
                    Kembali
                </a>
                <a href="{{ route('wishlist-detail.create', $wishlist->id) }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:from-indigo-500 hover:to-violet-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Transaksi
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            @if (session('success'))
                <div class="rounded-2xl border border-emerald-500/20 bg-emerald-500/10 p-4 text-white shadow-sm backdrop-blur-sm">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-5 w-5 text-emerald-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="text-sm font-semibold">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="grid gap-6 md:grid-cols-3">
                <!-- Info Impian -->
                <div class="md:col-span-1 space-y-6">
                    <div class="bg-gray-800 border border-gray-700 rounded-2xl shadow-sm p-6">
                        <div class="flex items-start justify-between gap-4 mb-4">
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2">{{ $wishlist->nama_wishlist }}</h3>
                                <div class="flex items-center gap-2 text-[11px] font-semibold tracking-wider text-gray-400 uppercase">
                                    <span>{{ $wishlist->jumlah_barang }} barang</span>
                                </div>
                            </div>
                            
                            <div class="relative h-24 w-24 shrink-0 overflow-hidden rounded-xl border border-gray-700 bg-gray-900 shadow-sm">
                                @if ($wishlist->gambar)
                                    <img src="{{ Storage::url($wishlist->gambar) }}" alt="{{ $wishlist->nama_wishlist }}" class="h-full w-full object-cover transition duration-500 ease-out hover:scale-110" />
                                @else
                                    <div class="flex h-full w-full items-center justify-center bg-gray-800 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="space-y-3 mt-4">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-400">Target</span>
                                <span class="font-bold text-white">Rp{{ number_format($wishlist->harga, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-400">Terkumpul</span>
                                <span class="font-bold text-emerald-400">Rp{{ number_format($terkumpul, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-400">Sisa</span>
                                <span class="font-bold text-white">Rp{{ number_format(max(0, $wishlist->harga - $terkumpul), 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <div class="flex justify-between items-end mb-2">
                                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Progress</span>
                                <span class="text-sm font-bold text-emerald-400">{{ $progress }}%</span>
                            </div>
                            <div class="h-2.5 w-full bg-gray-900 rounded-full overflow-hidden">
                                <div class="h-full rounded-full bg-gradient-to-r from-indigo-500 to-emerald-500 transition-all duration-500" style="width: {{ min(100, $progress) }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Daftar Transaksi -->
                <div class="md:col-span-2">
                    <div class="bg-gray-800 border border-gray-700 shadow-sm rounded-2xl overflow-hidden h-full">
                        @if ($details->isEmpty())
                            <div class="p-12 text-center flex flex-col items-center justify-center h-full">
                                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-indigo-500/10 text-indigo-400 ring-1 ring-indigo-500/20 mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-white">Belum Ada Transaksi</h3>
                                <p class="mx-auto mt-2 max-w-sm text-sm text-gray-400">Mulai tabung uang Anda sekarang untuk mewujudkan impian ini.</p>
                                <a href="{{ route('wishlist-detail.create', $wishlist->id) }}" class="mt-6 inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-md transition hover:bg-indigo-700">
                                    Tambah Transaksi Pertama
                                </a>
                            </div>
                        @else
                            <div class="overflow-x-auto">
                                <table class="w-full border-collapse text-left align-middle">
                                    <thead class="bg-gray-900 border-b border-gray-700 text-xs font-bold uppercase tracking-wider text-gray-400">
                                        <tr>
                                            <th class="px-6 py-4 w-12 text-center">No</th>
                                            <th class="px-6 py-4">Tanggal</th>
                                            <th class="px-6 py-4">Kategori</th>
                                            <th class="px-6 py-4 text-emerald-400">Pemasukan</th>
                                            <th class="px-6 py-4 text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-700 text-sm text-gray-300">
                                        @foreach ($details as $index => $detail)
                                            <tr class="hover:bg-gray-700/50 transition-colors">
                                                <td class="px-6 py-4 text-center text-gray-400">{{ $index + 1 }}</td>
                                                <td class="px-6 py-4 font-medium text-white">
                                                    {{ \Carbon\Carbon::parse($detail->tanggal)->format('d M Y') }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <span class="inline-flex items-center rounded-full bg-indigo-500/10 px-2.5 py-0.5 text-xs font-medium text-indigo-400 ring-1 ring-indigo-500/20">
                                                        {{ $detail->kategori }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 font-bold text-emerald-400">
                                                    Rp{{ number_format($detail->pemasukan, 0, ',', '.') }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center justify-center gap-2">
                                                        <!-- Edit -->
                                                        <a href="{{ route('wishlist-detail.edit', ['wishlist_id' => $wishlist->id, 'detail_id' => $detail->id]) }}" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-gray-600 bg-gray-700 text-amber-400 transition hover:bg-gray-600" title="Edit Transaksi">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                            </svg>
                                                        </a>
                                                        <!-- Hapus -->
                                                        <form action="{{ route('wishlist-detail.destroy', ['wishlist_id' => $wishlist->id, 'detail_id' => $detail->id]) }}" method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Yakin ingin menghapus transaksi ini?')" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-gray-600 bg-gray-700 text-red-400 transition hover:bg-gray-600" title="Hapus Transaksi">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
