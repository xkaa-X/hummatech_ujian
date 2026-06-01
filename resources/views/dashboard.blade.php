<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white">
            Dashboard
        </h2>
        <p class="mt-1 text-sm text-gray-400">
            Ringkasan keseluruhan tabungan dan target impian Anda.
        </p>
    </x-slot>

    <div class="py-8 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Welcome / Summary Section -->
            <div class="bg-gradient-to-r from-gray-800 to-gray-900 rounded-3xl p-8 text-white shadow-sm border border-gray-700 relative overflow-hidden">
                <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-6">
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-2">
                            Halo, Selamat Datang! 👋
                        </h1>
                        <p class="text-gray-400 text-sm max-w-xl">
                            Berikut adalah ringkasan dari semua tabungan yang sedang Anda kumpulkan. Semangat terus untuk mewujudkan barang impian Anda!
                        </p>
                    </div>
                </div>
                
                <!-- Decorative background elements -->
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
                <div class="absolute -bottom-24 -right-12 w-64 h-64 bg-emerald-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
            </div>

            <!-- Stats Grid -->
            <div class="grid gap-6 sm:grid-cols-2">
                <!-- Total Target Keseluruhan -->
                <div class="relative overflow-hidden rounded-2xl border border-gray-700 bg-gray-800 p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-gray-400">Total Target Keseluruhan</p>
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
                </div>

                <!-- Keseluruhan Tabungan User -->
                <div class="relative overflow-hidden rounded-2xl border border-gray-700 bg-gray-800 p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-gray-400">Keseluruhan Tabungan</p>
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
                </div>
            </div>

            <!-- Impian Tercapai -->
            <div class="mt-8">
                <h3 class="text-xl font-bold text-white mb-4 border-b border-gray-700 pb-2">🎉 Impian Sudah Tercapai ({{ $tercapai->count() }})</h3>
                
                @if ($tercapai->isEmpty())
                    <div class="bg-gray-800 border border-gray-700 rounded-2xl p-8 text-center">
                        <p class="text-gray-400">Belum ada impian yang tercapai. Ayo semangat menabung!</p>
                    </div>
                @else
                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($tercapai as $item)
                            <article class="group relative flex flex-col overflow-hidden rounded-2xl border border-emerald-500/30 bg-gray-800 p-5 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-md hover:border-emerald-500">
                                <div class="absolute inset-0 bg-emerald-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                
                                <div class="relative z-10 flex items-start justify-between gap-4">
                                    <div class="flex flex-1 flex-col">
                                        <div class="flex items-center gap-2 text-[11px] font-semibold tracking-wider text-gray-400 uppercase">
                                            <span>{{ $item->jumlah_barang }} barang</span>
                                        </div>
                                        <h4 class="mt-1.5 text-lg font-bold text-white group-hover:text-emerald-400 transition-colors duration-200 line-clamp-2 leading-snug">{{ $item->nama_wishlist }}</h4>
                                        <div class="mt-1.5 flex items-baseline">
                                            <span class="text-xl font-extrabold text-white tracking-tight">Rp{{ number_format($item->harga, 0, ',', '.') }}</span>
                                        </div>
                                        <div class="mt-3 inline-flex self-start">
                                            <span class="inline-flex items-center gap-1 rounded-lg bg-emerald-500/10 px-2 py-1 text-[10px] font-bold uppercase tracking-wider text-emerald-400 border border-emerald-500/20 shadow-sm">Goal Achieved</span>
                                        </div>
                                    </div>
                                    
                                    <div class="relative h-24 w-24 shrink-0 overflow-hidden rounded-xl border border-gray-700 bg-gray-900 shadow-sm">
                                        @if ($item->gambar)
                                            <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->nama_wishlist }}" class="h-full w-full object-cover transition duration-500 ease-out group-hover:scale-110">
                                        @else
                                            <div class="flex h-full w-full items-center justify-center text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" /></svg>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <a href="{{ route('wishlist-detail.index', $item->id) }}" class="absolute inset-0 z-20" title="Kelola Tabungan"></a>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Impian Belum Tercapai -->
            <div class="mt-8">
                <h3 class="text-xl font-bold text-white mb-4 border-b border-gray-700 pb-2">⏳ Impian Belum Tercapai ({{ $belumTercapai->count() }})</h3>
                
                @if ($belumTercapai->isEmpty())
                    <div class="bg-gray-800 border border-gray-700 rounded-2xl p-8 text-center">
                        <p class="text-gray-400">Semua impian Anda sudah tercapai!</p>
                    </div>
                @else
                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($belumTercapai as $item)
                            @php
                                $progress = $item->harga > 0 ? min(100, round(($item->terkumpul / $item->harga) * 100)) : 0;
                            @endphp
                            <article class="group relative flex flex-col overflow-hidden rounded-2xl border border-gray-700 bg-gray-800 p-5 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-md hover:border-gray-600">
                                <div class="relative z-10 flex items-start justify-between gap-4">
                                    <div class="flex flex-1 flex-col">
                                        <div class="flex items-center gap-2 text-[11px] font-semibold tracking-wider text-gray-400 uppercase">
                                            <span>{{ $item->jumlah_barang }} barang</span>
                                        </div>
                                        <h4 class="mt-1.5 text-lg font-bold text-white group-hover:text-indigo-400 transition-colors duration-200 line-clamp-2 leading-snug">{{ $item->nama_wishlist }}</h4>
                                        <div class="mt-1.5 flex items-baseline">
                                            <span class="text-xl font-extrabold text-white tracking-tight">Rp{{ number_format($item->harga, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="relative h-24 w-24 shrink-0 overflow-hidden rounded-xl border border-gray-700 bg-gray-900 shadow-sm">
                                        @if ($item->gambar)
                                            <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->nama_wishlist }}" class="h-full w-full object-cover transition duration-500 ease-out group-hover:scale-110">
                                        @else
                                            <div class="flex h-full w-full items-center justify-center text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" /></svg>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="mt-4 pt-3 border-t border-gray-700">
                                    <div class="flex justify-between items-end mb-1 text-xs">
                                        <span class="font-medium text-gray-400">Terkumpul: Rp{{ number_format($item->terkumpul, 0, ',', '.') }}</span>
                                        <span class="font-bold text-white">{{ $progress }}%</span>
                                    </div>
                                    <div class="h-1.5 w-full bg-gray-900 rounded-full overflow-hidden">
                                        <div class="h-full rounded-full bg-gradient-to-r from-indigo-500 to-indigo-400" style="width: {{ $progress }}%"></div>
                                    </div>
                                </div>
                                
                                <a href="{{ route('wishlist-detail.index', $item->id) }}" class="absolute inset-0 z-20" title="Kelola Tabungan"></a>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>