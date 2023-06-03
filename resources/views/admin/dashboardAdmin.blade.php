<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        {{ __("You're logged in!")  }}
    </div>

    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between pt-4">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Daftar Pengajuan') }}
        </h2>
    </div>

    <div class="py-2">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                <thead class="text-xs uppercase bg-sky-200 dark:bg-gray-700">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Peminjam</th>
                        <th scope="col" class="px-6 py-3">Nama Sarana</th>
                        <th scope="col" class="px-6 py-3">Tanggal Mulai</th>
                        <th scope="col" class="px-6 py-3">Tanggal Berakhir</th>
                        <th scope="col" class="px-6 py-3">Acara</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center">
                        <td class="px-6 py-4">1.</td>
                        <td class="px-6 py-4">sip</td>
                        <td class="px-6 py-4">sip</td>
                        <td class="px-6 py-4">03/07/9099</td>
                        <td class="px-6 py-4">08/18/8077</td>
                        <td class="px-6 py-4">sip</td>
                        <td class="px-6 py-4">sip</td>
                        <td class="px-6 py-4">
                            <x-button class="justify-center gap-2 bg-yellow-400 hover:bg-yellow-500 py-2">
                                <span>{{ __('Edit') }}</span>
                            </x-button>
                            <x-button class="justify-center gap-2 bg-red-500 hover:bg-red-600 py-2 my-2">
                                <span>{{ __('Hapus') }}</span>
                            </x-button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between pt-4">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Daftar Peminjaman') }}
        </h2>
    </div>

    <div class="py-2">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                <thead class="text-xs uppercase bg-sky-200 dark:bg-gray-700">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Peminjam</th>
                        <th scope="col" class="px-6 py-3">Nama Sarana</th>
                        <th scope="col" class="px-6 py-3">Acara</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center">
                        <td class="px-6 py-4">1.</td>
                        <td class="px-6 py-4">sip</td>
                        <td class="px-6 py-4">sip</td>
                        <td class="px-6 py-4">sip</td>
                        <td class="px-6 py-4">sip</td>
                        <td class="px-6 py-4">
                            <x-button class="justify-center gap-2 bg-yellow-400 hover:bg-yellow-500">
                                <span>{{ __('Edit') }}</span>
                            </x-button>
                            <x-button class="justify-center gap-2 bg-red-500 hover:bg-red-600">
                                <span>{{ __('Hapus') }}</span>
                            </x-button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>