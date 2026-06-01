<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white">
            Dashboard Tabungan & Belanja
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Hero Section -->
            <div class="bg-gradient-to-r from-slate-950 via-slate-900 to-indigo-950 rounded-3xl p-8 text-white shadow-2xl mb-8 border border-white/10">

                <div class="flex flex-col md:flex-row justify-between items-center">
                    
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold text-white">
                            Selamat Datang 👋
                        </h1>

                        <p class="mt-3 text-white text-lg">
                            Kelola tabungan dan rencana belanja Anda dengan tampilan eksklusif.
                        </p>
                    </div>

                    <div class="mt-6 md:mt-0 flex gap-3">

                        <button
                            class="bg-gradient-to-r from-cyan-500 to-blue-500 text-white px-5 py-3 rounded-xl font-bold shadow-lg hover:from-cyan-400 hover:to-blue-400 transition shadow-cyan-500/20">
                            + Setor Tabungan
                        </button>

                        <button
                            class="bg-white/5 backdrop-blur-md border border-white/10 text-white px-5 py-3 rounded-xl font-semibold hover:bg-white/10 transition">
                            Lihat Target
                        </button>

                    </div>
                </div>
            </div>

            <!-- Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                <!-- Saldo -->
                <div class="bg-gradient-to-br from-black to-amber-700 text-white rounded-3xl shadow-xl p-6 hover:scale-105 transition border border-amber-500/20">

                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-white font-medium">
                                Saldo Tabungan
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                Rp 5.000.000
                            </h3>
                        </div>

                        <div class="w-16 h-16 flex items-center justify-center rounded-full bg-white/20 text-4xl">
                            💰
                        </div>
                    </div>

                </div>

                <!-- Target -->
                <div class="bg-gradient-to-br from-black to-amber-600 text-white rounded-3xl shadow-xl p-6 hover:scale-105 transition border border-amber-500/20">

                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-white font-medium">
                                Target Aktif
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                3
                            </h3>
                        </div>

                        <div class="w-16 h-16 flex items-center justify-center rounded-full bg-white/20 text-4xl">
                            🎯
                        </div>
                    </div>

                </div>

                <!-- Pembelian -->
                <div class="bg-gradient-to-br from-black to-amber-800 text-white rounded-3xl shadow-xl p-6 hover:scale-105 transition border border-amber-500/20">

                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-white font-medium">
                                Pembelian
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                12
                            </h3>
                        </div>

                        <div class="w-16 h-16 flex items-center justify-center rounded-full bg-white/20 text-4xl">
                            🛒
                        </div>
                    </div>

                </div>

                <!-- Pencapaian -->
                <div class="bg-gradient-to-br from-black to-yellow-600 text-white rounded-3xl shadow-xl p-6 hover:scale-105 transition border border-amber-500/20">

                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-white font-medium">
                                Pencapaian
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                85%
                            </h3>
                        </div>

                        <div class="w-16 h-16 flex items-center justify-center rounded-full bg-white/20 text-4xl">
                            🚀
                        </div>
                    </div>

                </div>

            </div>

            <!-- SUMMARY KEUANGAN -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                <!-- Total Uang -->
                <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-lg">
                    <div class="text-4xl">💰</div>
                    <p class="text-white mt-4">Total Tabungan</p>
                    <h3 class="text-3xl font-bold text-white mt-2">
                        Rp 8.500.000
                    </h3>
                    <p class="text-white text-sm mt-2">
                        Total seluruh uang yang terkumpul
                    </p>
                </div>

                <!-- Wishlist Belum Terbeli -->
                <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-lg">
                    <div class="text-4xl">❤️</div>
                    <p class="text-white mt-4">Wishlist Belum Tercapai</p>
                    <h3 class="text-3xl font-bold text-white mt-2">
                        4 Barang
                    </h3>
                    <p class="text-white text-sm mt-2">
                        Target masih dalam proses tabungan
                    </p>
                </div>

                <!-- Barang Terbeli -->
                <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-lg">
                    <div class="text-4xl">✅</div>
                    <p class="text-white mt-4">Barang Sudah Dibeli</p>
                    <h3 class="text-3xl font-bold text-emerald-400 mt-2">
                        7 Barang
                    </h3>
                    <p class="text-white text-sm mt-2">
                        Wishlist yang sudah berhasil dicapai
                    </p>
                </div>

            </div>

            <!-- WISHLIST SECTION -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

                <!-- BELUM TERBELI -->
                <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6">

                    <h2 class="text-2xl font-bold text-white mb-6">
                        ❤️ Wishlist Belum Tercapai
                    </h2>

                    <!-- ITEM -->
                    <div class="space-y-5">

                        <div class="p-4 border border-slate-800 rounded-2xl">
                            <div class="flex justify-between">
                                <h3 class="text-white font-bold">iPhone 15</h3>
                                <span class="text-blue-400 font-semibold">53%</span>
                            </div>

                            <div class="h-2 bg-slate-800 rounded-full mt-3">
                                <div class="h-2 bg-blue-500 rounded-full w-[53%]"></div>
                            </div>

                            <div class="flex justify-between text-sm mt-3">
                                <span class="text-white">Rp 8.000.000</span>
                                <span class="text-red-400">Sisa Rp 7.000.000</span>
                            </div>
                        </div>

                        <div class="p-4 border border-slate-800 rounded-2xl">
                            <div class="flex justify-between">
                                <h3 class="text-white font-bold">Laptop Gaming</h3>
                                <span class="text-emerald-400 font-semibold">85%</span>
                            </div>

                            <div class="h-2 bg-slate-800 rounded-full mt-3">
                                <div class="h-2 bg-emerald-500 rounded-full w-[85%]"></div>
                            </div>

                            <div class="flex justify-between text-sm mt-3">
                                <span class="text-white">Rp 10.200.000</span>
                                <span class="text-red-400">Sisa Rp 1.800.000</span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- SUDAH TERBELI -->
                <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6">

                    <h2 class="text-2xl font-bold text-white mb-6">
                        ✅ Barang Sudah Dibeli
                    </h2>

                    <div class="space-y-4">

                        <div class="p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-2xl">
                            <div class="flex justify-between">
                                <h3 class="text-white font-bold">Laptop ASUS</h3>
                                <span class="text-emerald-400">✔</span>
                            </div>
                            <p class="text-white text-sm mt-2">
                                Dibeli: 20 Mei 2026
                            </p>
                            <p class="text-emerald-400 font-bold mt-2">
                                Rp 8.000.000
                            </p>
                        </div>

                        <div class="p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-2xl">
                            <div class="flex justify-between">
                                <h3 class="text-white font-bold">Smartwatch</h3>
                                <span class="text-emerald-400">✔</span>
                            </div>
                            <p class="text-white text-sm mt-2">
                                Dibeli: 10 Mei 2026
                            </p>
                            <p class="text-emerald-400 font-bold mt-2">
                                Rp 2.500.000
                            </p>
                        </div>

                    </div>

                </div>

            </div>

            <!-- TABEL TRANSAKSI -->
            <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6">

                <h2 class="text-2xl font-bold text-white mb-6">
                    📋 Ringkasan Transaksi
                </h2>

                <div class="overflow-x-auto">

                    <table class="w-full text-left">

                        <thead>
                            <tr class="border-b border-slate-800 text-white">
                                <th class="py-3">Tanggal</th>
                                <th>Jenis</th>
                                <th>Keterangan</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr class="border-b border-slate-800">
                                <td class="py-4 text-white">30 Mei 2026</td>
                                <td><span class="text-emerald-400">Setor</span></td>
                                <td class="text-white">Tabungan Bulanan</td>
                                <td class="text-emerald-400 font-bold">+ Rp 500.000</td>
                            </tr>

                            <tr class="border-b border-slate-800">
                                <td class="py-4 text-white">28 Mei 2026</td>
                                <td><span class="text-emerald-400">Bonus</span></td>
                                <td class="text-white">Tambahan Tabungan</td>
                                <td class="text-emerald-400 font-bold">+ Rp 250.000</td>
                            </tr>

                            <tr>
                                <td class="py-4 text-white">25 Mei 2026</td>
                                <td><span class="text-emerald-400">Pembelian</span></td>
                                <td class="text-white">Headset Gaming</td>
                                <td class="text-emerald-400 font-bold">- Rp 350.000</td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>