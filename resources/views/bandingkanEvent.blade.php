<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Bandingkan Event') }}
            </h2>
        </div>
    </x-slot>

    <!-- body -->
    <div>
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <x-button class="justify-center gap-2">
                <x-heroicon-s-plus-small class="w-6 h-6" aria-hidden="true" />
                <span>{{ __('Tambah') }}</span>
            </x-button>
        </div>

        <div class="py-2">
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                    <thead class="text-xs uppercase bg-sky-200 dark:bg-gray-700">
                        <tr class="text-center">
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Acara</th>
                            <th scope="col" class="px-6 py-3">Jumlah Peserta</th>
                            <th scope="col" class="px-6 py-3">Pemateri</th>
                            <th scope="col" class="px-6 py-3">Undangan</th>
                            <th scope="col" class="px-6 py-3">Biaya Pengeluaran</th>
                            <th scope="col" class="px-6 py-3">Biaya Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center">
                            <td class="px-6 py-4">1.</td>
                            <td class="px-6 py-4">sip</td>
                            <td class="px-6 py-4">100</td>
                            <td class="px-6 py-4">sip</td>
                            <td class="px-6 py-4">sip</td>
                            <td class="px-6 py-4">Rp 2000</td>
                            <td class="px-6 py-4">Rp 9000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <x-button class="justify-center gap-2">
                <x-heroicon-s-plus-small class="w-6 h-6" aria-hidden="true" />
                <span>{{ __('Hitung') }}</span>
            </x-button>
        </div>

        <div class="py-2 m-8 max-w-[50%]">
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                    <thead class="text-xs uppercase bg-sky-200 dark:bg-gray-700">
                        <tr class="text-center">
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Acara</th>
                            <th scope="col" class="px-6 py-3">Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center">
                            <td class="px-6 py-4">1.</td>
                            <td class="px-6 py-4">sip</td>
                            <td class="px-6 py-4">0,07868</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>