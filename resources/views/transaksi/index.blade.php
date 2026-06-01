<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-gray-700 pb-5">
            <div>
                <h2 class="font-bold text-2xl text-white leading-tight">
                    {{ __('Kelola Tabungan Impian') }}
                </h2>
                <p class="mt-1 text-sm text-gray-400">
                    Pantau target wishlist Anda dan kelola tabungan secara terpusat.
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('wishlist.index') }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-gray-600 bg-gray-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                    </svg>
                    Lihat Grid Impian
                </a>
                <a href="{{ route('wishlist.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:from-indigo-500 hover:to-violet-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Wishlist
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

            <!-- Ringkasan Statistik -->
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Card 1: Total Target -->
                <div class="relative overflow-hidden rounded-2xl border border-gray-700 bg-gray-800 p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-gray-400">Total Target Belanja</p>
                            <h3 class="mt-2 text-2xl font-extrabold text-white tracking-tight">
                                Rp{{ number_format($totalTarget, 0, ',', '.') }}
                            </h3>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-500/10 text-indigo-400 ring-1 ring-indigo-500/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5h16.5M5.25 18.75V9M18.75 18.75V9m-13.5 9h13.5m-10.5-5.25h6.75M12 9V4.5m-3 0h6" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-[11px] text-gray-400">
                        <span class="font-medium">Akumulasi seluruh impian aktif</span>
                    </div>
                </div>

                <!-- Card 2: Total Terkumpul -->
                <div class="relative overflow-hidden rounded-2xl border border-gray-700 bg-gray-800 p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-gray-400">Tabungan Terkumpul</p>
                            <h3 class="mt-2 text-2xl font-extrabold text-emerald-400 tracking-tight">
                                Rp{{ number_format($totalTerkumpul, 0, ',', '.') }}
                            </h3>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-500/10 text-emerald-400 ring-1 ring-emerald-500/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-[11px] text-emerald-400">
                        <span class="font-semibold">{{ $persentaseKeseluruhan }}%</span>
                        <span class="ml-1 text-gray-400">dari total target impian</span>
                    </div>
                </div>

                <!-- Card 3: Sisa Kekurangan -->
                <div class="relative overflow-hidden rounded-2xl border border-gray-700 bg-gray-800 p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-gray-400">Sisa Kekurangan</p>
                            <h3 class="mt-2 text-2xl font-extrabold text-white tracking-tight">
                                Rp{{ number_format($sisaKekurangan, 0, ',', '.') }}
                            </h3>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-rose-500/10 text-rose-400 ring-1 ring-rose-500/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-[11px] text-gray-400">
                        <span class="font-medium">Sisa dana yang harus dikumpulkan</span>
                    </div>
                </div>

                <!-- Card 4: Progress Akumulatif -->
                <div class="relative overflow-hidden rounded-2xl border border-gray-700 bg-gray-800 p-6 shadow-sm">
                    <div>
                        <div class="flex items-center justify-between">
                            <p class="text-xs font-bold uppercase tracking-wider text-gray-400">Progress Akumulatif</p>
                            <span class="text-xs font-bold text-indigo-400 bg-indigo-500/10 px-2 py-0.5 rounded-md ring-1 ring-indigo-500/20">{{ $persentaseKeseluruhan }}%</span>
                        </div>
                        <!-- Sleek progress indicator -->
                        <div class="mt-4 h-2 w-full rounded-full bg-gray-900 overflow-hidden">
                            <div class="h-full rounded-full bg-gradient-to-r from-indigo-500 to-emerald-500" style="width: {{ min(100, $persentaseKeseluruhan) }}%"></div>
                        </div>
                        <p class="mt-3 text-[11px] text-gray-400">
                            {{ $wishlists->count() }} Impian aktif terdaftar
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tabel Wishlist -->
            <div class="bg-gray-800 border border-gray-700 shadow-sm rounded-2xl overflow-hidden">
                @if ($wishlists->isEmpty())
                    <div class="p-12 text-center">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-indigo-500/10 text-indigo-400 ring-1 ring-indigo-500/20 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white">Belum Ada Wishlist</h3>
                        <p class="mx-auto mt-2 max-w-sm text-sm text-gray-400">Silakan tambahkan impian baru untuk mulai melacak dan mengelola tabungan Anda di sini.</p>
                        <a href="{{ route('wishlist.create') }}" class="mt-6 inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-md transition hover:bg-indigo-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Tambah Wishlist Pertama
                        </a>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse text-left align-middle">
                            <thead class="bg-gray-900 border-b border-gray-700 text-xs font-bold uppercase tracking-wider text-gray-400">
                                <tr>
                                    <th class="px-6 py-4 text-center w-12">No</th>
                                    <th class="px-6 py-4 w-20">Gambar</th>
                                    <th class="px-6 py-4">Nama Impian</th>
                                    <th class="px-6 py-4 text-center">Jumlah</th>
                                    <th class="px-6 py-4">Harga Target</th>
                                    <th class="px-6 py-4 text-emerald-400">Terkumpul</th>
                                    <th class="px-6 py-4 text-red-400">Kekurangan</th>
                                    <th class="px-6 py-4 w-48">Progress</th>
                                    <th class="px-6 py-4">Target Tanggal</th>
                                    <th class="px-6 py-4 text-center">Status</th>
                                    <th class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700 text-sm text-gray-300">
                                @foreach ($wishlists as $index => $wishlist)
                                    @php
                                        $terkumpul = $wishlist->details->sum('pemasukan');
                                        $kekurangan = max(0, $wishlist->harga - $terkumpul);
                                        $progress = $wishlist->harga > 0 ? round(($terkumpul / $wishlist->harga) * 100, 1) : 0;
                                        $isTercapai = $terkumpul >= $wishlist->harga;
                                        
                                        $deadlineDate = \Carbon\Carbon::parse($wishlist->deadline)->startOfDay();
                                        $today = \Carbon\Carbon::now()->startOfDay();
                                        $isOverdue = $today->gt($deadlineDate);
                                        $daysDiff = $today->diffInDays($deadlineDate);
                                    @endphp
                                    <tr class="hover:bg-gray-700/50 transition-colors">
                                        <td class="px-6 py-4 text-center font-medium text-gray-400">
                                            {{ $index + 1 }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="group relative">
                                                @if ($wishlist->gambar)
                                                    <img src="{{ Storage::url($wishlist->gambar) }}" alt="{{ $wishlist->nama_wishlist }}" class="h-14 w-14 rounded-lg object-cover ring-2 ring-gray-600 shadow-md transition-all duration-300 ease-out group-hover:scale-110 group-hover:ring-indigo-500/50 group-hover:shadow-lg cursor-pointer" />
                                                @else
                                                    <div class="flex h-14 w-14 items-center justify-center rounded-lg bg-gray-700 text-gray-400 ring-2 ring-gray-600 shadow-md transition-all duration-300 group-hover:bg-gray-600 group-hover:shadow-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-bold text-white max-w-xs truncate">
                                            {{ $wishlist->nama_wishlist }}
                                        </td>
                                        <td class="px-6 py-4 text-center font-semibold">
                                            {{ $wishlist->jumlah_barang }}
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-white">
                                            Rp{{ number_format($wishlist->harga, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-emerald-400">
                                            Rp{{ number_format($terkumpul, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-red-400">
                                            Rp{{ number_format($kekurangan, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="h-2 w-full rounded-full bg-gray-900 overflow-hidden">
                                                    <div class="h-full rounded-full bg-gradient-to-r {{ $isTercapai ? 'from-emerald-500 to-teal-500' : 'from-indigo-500 to-violet-500' }}" style="width: {{ min(100, $progress) }}%"></div>
                                                </div>
                                                <span class="text-xs font-bold shrink-0 {{ $isTercapai ? 'text-emerald-400' : 'text-gray-400' }}">{{ $progress }}%</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-col">
                                                <span class="font-medium text-gray-300">{{ $deadlineDate->format('d M Y') }}</span>
                                                @if ($isOverdue)
                                                    <span class="text-[10px] text-amber-500 font-semibold mt-0.5">Lewat {{ $daysDiff }} hari</span>
                                                @else
                                                    <span class="text-[10px] text-emerald-400 font-semibold mt-0.5">
                                                        @if ($daysDiff == 0) Hari ini @elseif ($daysDiff == 1) Besok @else {{ $daysDiff }} hari lagi @endif
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            @if ($isTercapai)
                                                <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-500/10 px-3 py-1 text-xs font-bold text-emerald-400 ring-1 ring-emerald-500/20">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                    Tercapai
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1.5 rounded-full bg-cyan-500/10 px-3 py-1 text-xs font-bold text-cyan-400 ring-1 ring-cyan-500/20">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-cyan-500 animate-pulse"></span>
                                                    Proses
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-2">
                                                <!-- Action: Kelola Tabungan -->
                                                <a href="{{ route('wishlist-detail.index', $wishlist->id) }}" class="inline-flex items-center justify-center gap-1.5 rounded-xl border border-gray-600 bg-gray-700 px-3.5 py-2 text-xs font-bold text-white transition hover:bg-gray-600" title="Kelola Tabungan">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-3.5 w-3.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33" />
                                                    </svg>
                                                    Kelola Tabungan
                                                </a>
                                                
                                                <!-- Action: Edit -->
                                                <a href="{{ route('wishlist.edit', $wishlist->id) }}" class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-gray-600 bg-gray-700 text-amber-400 transition hover:bg-gray-600" title="Edit Wishlist">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                    </svg>
                                                </a>
 
                                                <!-- Action: Hapus -->
                                                <form action="{{ route('wishlist.destroy', $wishlist->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus wishlist ini beserta seluruh riwayat tabungannya?')" class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-gray-600 bg-gray-700 text-red-400 transition hover:bg-gray-600" title="Hapus Wishlist">
                                                        <svg xmlns="http://www.w3.org/2500/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
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
</x-app-layout>
