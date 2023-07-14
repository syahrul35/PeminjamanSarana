<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Hasil Bandingkan Event') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-2 mt-2 max-w-[50%]">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                <thead class="text-xs uppercase bg-sky-200 dark:bg-gray-700">
                    <tr class="text-center capitalize">
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Acara</th>
                        <th scope="col" class="px-6 py-3">Hasil</th>
                        <th scope="col" class="px-6 py-3">action</th>
                    </tr>
                </thead>
                <tbody>                    
                    @foreach($results as $result)
                    
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">Event {{$loop->iteration}}</td>
                        <td class="px-6 py-4">{{ $result[1] }}</td>
                        <td class="px-6 py-4">
                            <x-button variant="primary" x-data="" x-on:click.prevent="$dispatch('open-modal', '{{ $result[0] }}')"> {{ __('Detail Event') }}</x-button>
                        </td>
                    </tr>
                    <x-modal name="{{ $result[0] }}" focusable>
                        <h1>Daftar Pengajuan</h1>          
                        @foreach ( $result[2] as $hasil)
                        <ul class="bg-white rounded-lg border border-gray-200 w-full mb-2 text-gray-900 text-sm font-medium">
                            <li class="px-4 py-2 border-b border-gray-200 w-full rounded-t-lg">Nama Peminjam: {{ $hasil->name }}</li>
                            <li class="px-4 py-2 border-b border-gray-200 w-full">Nama Event: {{ $hasil->nama_event }}</li>
                            <li class="px-4 py-2 border-b border-gray-200 w-full">Nama Sarpras: {{ $hasil->nama_sarpras }}</li>
                            <li class="px-4 py-2 border-b border-gray-200 w-full">Tanggal Mulai: {{ $hasil->tgl_mulai }}</li>
                            <li class="px-4 py-2 w-full rounded-b-lg">Tanggal Berakhir: {{ $hasil->tgl_akhir }}</li>
                        </ul>
                        @endforeach
                    </x-modal>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
