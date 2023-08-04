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
                            <th scope="col" class="px-6 py-3">Wewenang</th>
                            <th scope="col" class="px-6 py-3">Telepon</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Cetak</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $pengajuan as $pengajuan)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->event->nama_event }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->sarpras->nama_sarpras }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->sarpras->wewenang->users->name }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->sarpras->wewenang->telp_wewenang }}</td>
                            <td class="px-6 py-4">
                                @if ($pengajuan->status_pengajuan == 0)
                                    <div class="bg-amber-300 rounded-md px-4 py-2">
                                        <span class="text-white">Persetujuan Admin</span>
                                    </div>
                                @elseif($pengajuan->status_pengajuan == 1)
                                    <div class="bg-amber-600 rounded-md px-4 py-2">
                                        <span class="text-white">Persetujuan Wewenang</span>
                                    </div>
                                @elseif($pengajuan->status_pengajuan == 2)
                                <div class="bg-green-500 rounded-md px-4 py-2">
                                    <span class="text-white">Disetujui</span>
                                </div>
                                @else
                                    <div class="bg-rose-500 rounded-md px-4 py-2">
                                        <span class="text-white">Ditolak</span>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($pengajuan->status_pengajuan == 2)
                                <a href="{{ route('cetak', $pengajuan->id) }}" target="_blank" class="py-2 px-3 rounded-lg text-white bg-indigo-500 shadow-lg hover:bg-indigo-600">
                                    Cetak</a>
                                @endif
                            </td>
                            
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>