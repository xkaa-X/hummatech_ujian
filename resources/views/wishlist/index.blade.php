<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-200 pb-5 dark:border-slate-800">
                <div>
                    <h2 class="font-bold text-2xl text-slate-800 dark:text-slate-100">Daftar Impian Saya</h2>
                    <p class="text-sm text-slate-500 mt-1">Pantau target belanja dan tabungan Anda secara real-time.</p>
                </div>
                <a href="{{ route('wishlist.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:from-indigo-500 hover:to-violet-500 focus:outline-none focus:ring-4 focus:ring-indigo-300/50">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    {{ __('Tambah Wishlist') }}
                </a>
            </div>

            @if (session('success'))
                <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50/50 p-4 text-emerald-800 shadow-sm backdrop-blur-sm dark:border-emerald-800/80 dark:bg-emerald-950/20 dark:text-emerald-300">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 text-emerald-600 dark:text-emerald-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if ($wishlists->isEmpty())
                <div class="rounded-3xl border border-dashed border-slate-350 bg-white/80 p-12 text-center shadow-sm dark:border-slate-800 dark:bg-slate-900/80">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600 dark:bg-indigo-950/40 dark:text-indigo-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </div>
                    <h3 class="mt-6 text-lg font-bold text-slate-800 dark:text-slate-100">Belum ada wishlist</h3>
                    <p class="mx-auto mt-2 max-w-sm text-sm text-slate-500 dark:text-slate-400">Silakan tambahkan wishlist baru agar rencana tabungan Anda bisa terlihat dalam kartu yang lebih jelas.</p>
                    <a href="{{ route('wishlist.create') }}" class="mt-6 inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-md shadow-indigo-600/10 transition hover:bg-indigo-700 dark:bg-indigo-600 dark:hover:bg-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah Wishlist Pertama
                    </a>
                </div>
            @else
                <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                    @foreach ($wishlists as $wishlist)
                        @php
                            $deadlineDate = \Carbon\Carbon::parse($wishlist->deadline)->startOfDay();
                            $today = \Carbon\Carbon::now()->startOfDay();
                            $isOverdue = $today->gt($deadlineDate);
                            $daysDiff = $today->diffInDays($deadlineDate);
                        @endphp

                        <article class="group relative flex flex-col overflow-hidden rounded-2xl border border-slate-150 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-md dark:border-slate-800/80 dark:bg-slate-900">
                            <!-- Top Image Section -->
                            <div class="relative h-48 w-full overflow-hidden bg-slate-50 dark:bg-slate-800">
                                @if ($wishlist->gambar)
                                    <img src="{{ Storage::url($wishlist->gambar) }}" alt="{{ $wishlist->nama_wishlist }}" class="h-full w-full object-cover transition duration-500 ease-out group-hover:scale-105" />
                                @else
                                    <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-indigo-50/50 to-violet-50/50 text-indigo-400 dark:from-indigo-950/20 dark:to-violet-950/20 dark:text-indigo-300/60">
                                        <!-- Icon Placeholder -->
                                        <div class="rounded-2xl bg-white p-3 shadow-sm dark:bg-slate-800/50 dark:border dark:border-slate-700/50">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                            </svg>
                                        </div>
                                    </div>
                                @endif

                                <!-- Glassmorphic Status Badge on Top Right -->
                                <div class="absolute right-3 top-3 z-10">
                                    @if ($isOverdue)
                                        <span class="inline-flex items-center gap-1 rounded-lg bg-rose-50 px-2.5 py-1 text-xs font-semibold text-rose-700 shadow-sm ring-1 ring-inset ring-rose-600/15 dark:bg-rose-950/50 dark:text-rose-300 dark:ring-rose-500/20">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-3.5 w-3.5">
                                                <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                                            </svg>
                                            Lewat {{ $daysDiff }} hari
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 rounded-lg bg-indigo-50 px-2.5 py-1 text-xs font-semibold text-indigo-700 shadow-sm ring-1 ring-inset ring-indigo-600/15 dark:bg-indigo-950/50 dark:text-indigo-300 dark:ring-indigo-500/20">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-3.5 w-3.5 text-indigo-600 dark:text-indigo-400">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z" clip-rule="evenodd" />
                                            </svg>
                                            @if ($daysDiff == 0)
                                                Hari ini
                                            @elseif ($daysDiff == 1)
                                                Besok
                                            @else
                                                {{ $daysDiff }} hari lagi
                                            @endif
                                        </span>
                                    @endif
                                </div>

                                <!-- Dark Overlay Gradient at the bottom of the image -->
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 via-transparent to-transparent"></div>
                            </div>

                            <!-- Card Body -->
                            <div class="flex flex-1 flex-col p-5">
                                <div class="flex-1">
                                    <!-- Category/Badge & Quantity -->
                                    <div class="flex items-center justify-between text-xs font-semibold tracking-wider text-indigo-600 dark:text-indigo-400 uppercase">
                                        <span>Rencana Impian</span>
                                        <span class="inline-flex items-center gap-1 font-medium text-slate-500 dark:text-slate-400 normal-case">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-3.5 w-3.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                            </svg>
                                            {{ $wishlist->jumlah_barang }} barang
                                        </span>
                                    </div>

                                    <!-- Wishlist Name -->
                                    <h3 class="mt-2 text-lg font-bold text-slate-800 dark:text-slate-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors duration-200 line-clamp-2 leading-snug">
                                        {{ $wishlist->nama_wishlist }}
                                    </h3>

                                    <!-- Price - Big & Beautiful -->
                                    <div class="mt-3 flex items-baseline">
                                        <span class="text-2xl font-extrabold text-slate-900 dark:text-slate-50 tracking-tight">
                                            Rp{{ number_format($wishlist->harga, 0, ',', '.') }}
                                        </span>
                                    </div>

                                    <!-- Metadata Row: Target & Status -->
                                    <div class="mt-4 grid grid-cols-2 gap-2 border-t border-slate-100 pt-4 dark:border-slate-800/80">
                                        <div class="flex flex-col">
                                            <span class="text-[10px] font-semibold uppercase tracking-wider text-slate-400 dark:text-slate-500">Target Tanggal</span>
                                            <span class="mt-0.5 text-xs font-semibold text-slate-700 dark:text-slate-300 flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-3.5 w-3.5 text-slate-400 dark:text-slate-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75" />
                                                </svg>
                                                {{ $deadlineDate->format('d M Y') }}
                                            </span>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-[10px] font-semibold uppercase tracking-wider text-slate-400 dark:text-slate-500">Status</span>
                                            @if ($isOverdue)
                                                <span class="mt-0.5 text-xs font-semibold text-rose-600 dark:text-rose-400 flex items-center gap-1">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-rose-600"></span>
                                                    Terlewat
                                                </span>
                                            @else
                                                <span class="mt-0.5 text-xs font-semibold text-emerald-600 dark:text-emerald-400 flex items-center gap-1">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                                    Aktif
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons at bottom -->
                                <div class="mt-6 flex items-center gap-2">
                                    <a href="{{ route('wishlist.edit', $wishlist->id) }}" class="flex flex-1 items-center justify-center gap-1.5 rounded-xl border border-slate-100 bg-slate-50/50 py-2.5 text-xs font-semibold text-slate-700 transition-all duration-200 hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-100 dark:border-slate-800 dark:bg-slate-800/40 dark:text-slate-300 dark:hover:bg-indigo-950/30 dark:hover:text-indigo-400 dark:hover:border-indigo-900/50">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-3.5 w-3.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('wishlist.destroy', $wishlist->id) }}" method="POST" class="flex flex-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Hapus wishlist ini?')" class="flex w-full items-center justify-center gap-1.5 rounded-xl border border-transparent bg-rose-50/50 py-2.5 text-xs font-semibold text-rose-700 transition-all duration-200 hover:bg-rose-100 hover:text-rose-800 dark:bg-rose-950/20 dark:text-rose-400 dark:hover:bg-rose-950/40 dark:hover:text-rose-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-3.5 w-3.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
