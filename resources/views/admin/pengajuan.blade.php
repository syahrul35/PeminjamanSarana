<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Daftar Pengajuan') }}
            </h2>
        </div>
    </x-slot>

    <!-- body -->
    <div>
        <div class="py-2">
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                    <thead class="text-xs uppercase bg-sky-200 dark:bg-gray-700">
                        <tr class="text-center">
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Peminjam</th>
                            <th scope="col" class="px-6 py-3">Acara</th>
                            <th scope="col" class="px-6 py-3">Nama Sarana</th>
                            <th scope="col" class="px-6 py-3">Tanggal Mulai</th>
                            <th scope="col" class="px-6 py-3">Tanggal Berakhir</th>
                            {{-- <th scope="col" class="px-6 py-3">Status</th> --}}
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $pengajuan as $pengajuan)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->name }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->nama_event }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->nama_sarpras }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->tgl_mulai }}</td>
                            <td class="px-6 py-4">{{ $pengajuan->tgl_akhir }}</td>
                            {{-- <td class="px-6 py-4">{{ $event->status_peminjaman }}</td> --}}
                            <td class="px-6 py-4">
                                <form  action="{{ route('hapusPeminjaman', $pengajuan->id) }}" method="POST">
                                    <x-button class="justify-center gap-2 bg-emerald-500 hover:bg-emerald-600">
                                        <span>{{ __('Terima') }}</span>
                                    </x-button>
                                    @csrf
                                    @method('DELETE')
                                    <x-button class="justify-center gap-2 bg-red-500 hover:bg-red-600 mt-2">
                                        <span>{{ __('Tolak') }}</span>
                                    </x-button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
</x-app-layout>