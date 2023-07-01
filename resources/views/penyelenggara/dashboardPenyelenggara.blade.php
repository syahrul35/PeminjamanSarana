<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <br>

    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Status Pengajuan Sarana dan Prasarana') }}
        </h2>
    </div>

    <!-- body -->
    <div>
        <div class="py-2">
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                    <thead class="text-xs uppercase bg-sky-200 dark:bg-gray-700">
                        <tr class="text-center">
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Acara</th>
                            <th scope="col" class="px-6 py-3">Nama Sarana</th>
                            <th scope="col" class="px-6 py-3">Nama Wewenang</th>
                            <th scope="col" class="px-6 py-3">Telepon</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Cetak</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $pengajuan as $pengajuan)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->nama_event }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->nama_sarpras }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->nama_wewenang }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->telp_wewenang }}</td>
                            <td class="px-6 py-4">
                                @if ($pengajuan->status_pengajuan == 0)
                                    <div class="bg-amber-300 rounded-md">
                                        <span class="text-white">Proses</span>
                                    </div>
                                @elseif($pengajuan->status_pengajuan == 1)
                                    <div class="bg-green-500 rounded-md">
                                        <span class="text-white">Diterima</span>
                                    </div>
                                @else
                                    <div class="bg-rose-500 rounded-md">
                                        <span class="text-white">Ditolak</span>
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if($pengajuan->status_pengajuan == 1)
                                {{-- <form action="{{ route('cetak', $pengajuan->id) }}" method="post" type="submit">
                                    @csrf
                                    @method('POST')
                                    <x-button class="justify-center gap-2 bg-green-400 hover:bg-green-700">
                                        <span>{{ __('Cetak') }}</span>
                                    </x-button>
                                </form> --}}
                                <a href="{{ route('cetak', $pengajuan->id) }}" target="_blank" class="py-2 px-3 rounded-lg text-white bg-indigo-500 shadow-lg hover:bg-indigo-600">Cetak Data</a>
                                @endif
                            </td>
                            
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>